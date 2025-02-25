<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_ajax_wcqof_submit_order', 'wcqof_submit_order');
add_action('wp_ajax_nopriv_wcqof_submit_order', 'wcqof_submit_order');

function wcqof_submit_order()
{
    if (!isset($_POST['dqb_name'], $_POST['dqb_phone'], $_POST['dqb_state'], $_POST['dqb_city'], $_POST['product_id'], $_POST['dqb_qty'], $_POST['dqb_delivery_type'])) {
        wp_send_json_error("❌ الحقول المطلوبة مفقودة.");
        return;
    }

    // ✅ Sanitize User Inputs
    $full_name = sanitize_text_field($_POST['dqb_name']);
    $phone_number = sanitize_text_field($_POST['dqb_phone']);
    $state = sanitize_text_field($_POST['dqb_state']);
    $city = sanitize_text_field($_POST['dqb_city']);
    $delivery_type = sanitize_text_field($_POST['dqb_delivery_type']);
    $product_id = intval($_POST['product_id']);
    $quantity = max(1, intval($_POST['dqb_qty']));
    $product_price = wc_get_product($product_id)->get_price();
    $shipping_prices = get_option('dqb_state_shipping_prices', array());

    // ✅ Validate User Inputs
    if (empty($full_name) || empty($phone_number) || empty($state) || empty($city)) {
        wp_send_json_error("❌ الرجاء ملء جميع الحقول المطلوبة.");
        return;
    }

    if (!is_numeric($phone_number) || strlen($phone_number) < 8) {
        wp_send_json_error("❌ الرجاء إدخال رقم هاتف صالح.");
        return;
    }

    // ✅ Validate Selected Attributes
    $product_id = $_POST['product_id'] ?? null;
    $product = wc_get_product($product_id);
    $attributes = $product->get_attributes();


    foreach ($attributes as $attribute_name => $attribute) {
        $field_name = "dqb_" . $attribute_name;
        $attribute_label = wc_attribute_label(rawurldecode($attribute_name));
        $attribute_label = mb_convert_encoding($attribute_label, 'UTF-8', 'auto');

        if (!isset($_POST[$field_name]) || empty($_POST[$field_name])) {
            wp_send_json_error("يرجى اختيار قيمة لـ " . $attribute_label);// Arabic error message
        }
    }

    if (!isset($shipping_prices[$state])) {
        wp_send_json_error("❌ لا توجد أسعار توصيل لهذه الولاية.");
        return;
    }


    $home_delivery_price = isset($shipping_prices[$state]['home']) ? floatval($shipping_prices[$state]['home']) : 0;
    $office_delivery_price = isset($shipping_prices[$state]['office']) ? floatval($shipping_prices[$state]['office']) : 0;
    $is_free_delivery = isset($shipping_prices[$state]['free_delivery']) && $shipping_prices[$state]['free_delivery'] == 1;

    $delivery_price = $is_free_delivery ? 0 : ($delivery_type === 'home' ? $home_delivery_price : $office_delivery_price);
    $total_price = ($product_price * $quantity) + $delivery_price;





    if (!$product) {
        wp_send_json_error('❌ المنتج غير موجود.');
        return;
    }

    // ✅ Get User's IP
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $order_limit = get_option('wcqof_order_limit_per_ip', 100); // Default: 2 orders per IP
    $ban_duration = get_option('wcqof_ban_duration', 60) * 60; // Convert minutes to seconds

    // ✅ Fetch stored order counts and bans
    $order_counts = get_option('wcqof_ip_orders', array());
    $banned_ips = get_option('wcqof_banned_ips', array()); // Store banned IPs
    $current_time = time();

    // ✅ Remove expired bans **before checking if user is banned**
    if (isset($banned_ips[$user_ip]) && $current_time >= $banned_ips[$user_ip]) {
        unset($banned_ips[$user_ip]); // ✅ Remove ban
        unset($order_counts[$user_ip]); // ✅ Reset order count
        update_option('wcqof_banned_ips', $banned_ips);
        update_option('wcqof_ip_orders', $order_counts);
    }

    // ✅ Check if the IP is currently banned
    if (isset($banned_ips[$user_ip])) {
        $ban_time_remaining = ceil(($banned_ips[$user_ip] - $current_time) / 60);
        wp_send_json_error("❌ لقد تم حظرك مؤقتًا بسبب تجاوز حد الطلبات. حاول مرة أخرى بعد $ban_time_remaining دقيقة.");
        exit;
    }

    // ✅ Get the Current Order Count for this IP
    $current_count = isset($order_counts[$user_ip]) ? intval($order_counts[$user_ip]) : 0;

    if ($current_count >= $order_limit) {
        // ✅ Ban the IP for the set duration
        $banned_ips[$user_ip] = $current_time + $ban_duration;
        update_option('wcqof_banned_ips', $banned_ips);

        wp_send_json_error("❌ لقد تم حظرك مؤقتًا بسبب تجاوز حد الطلبات. حاول مرة أخرى بعد " . ($ban_duration / 60) . " دقيقة.");
        exit;
    }

    try {
        // ✅ Create Order
        $order = wc_create_order();
        $order->add_product($product, $quantity);
        $order->set_address(array(
            'first_name' => $full_name,
            'phone' => $phone_number,
            'state' => $state,
            'city' => $city,
        ), 'billing');
        foreach ($order->get_items() as $item_id => $item) {
            foreach ($attributes as $attribute_name => $attribute) {
                $field_name = "dqb_" . $attribute_name;
                $attribute_label = wc_attribute_label(rawurldecode($attribute_name));
                $attribute_label = mb_convert_encoding($attribute_label, 'UTF-8', 'auto');
                $attribute_value = sanitize_text_field($_POST[$field_name]);
                wc_add_order_item_meta($item_id, $attribute_label, $attribute_value);
            }
            wc_add_order_item_meta($item_id, __('Delivery Type', 'dzquickbuy'), $delivery_type === 'home' ? __('Home Delivery', 'dzquickbuy') : __('Office Delivery', 'dzquickbuy'));
            wc_add_order_item_meta($item_id, __('Delivery Price', 'dzquickbuy'), $delivery_price > 0 ? $delivery_price . ' DZD' : __('Free', 'dzquickbuy'));

        }

        $order->set_total($total_price); // Set the correct total price
        $order->update_status('processing');

        // ✅ Store the IP in Order Meta
        update_post_meta($order->get_id(), '_customer_ip_address', $user_ip);

        // ✅ Update Order Count for This IP
        $order_counts[$user_ip] = $current_count + 1;
        update_option('wcqof_ip_orders', $order_counts);

        wp_send_json_success('✅ تم تقديم الطلب بنجاح!');
    } catch (Exception $e) {
        wp_send_json_error('❌ خطأ في الطلب: ' . $e->getMessage());
    }
}
