<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_ajax_wcqof_submit_order', 'wcqof_submit_order');
add_action('wp_ajax_nopriv_wcqof_submit_order', 'wcqof_submit_order');

function wcqof_submit_order()
{
    if (!isset($_POST['wooecom_name'], $_POST['wooecom_phone'], $_POST['wooecom_state'], $_POST['wooecom_city'], $_POST['product_id'], $_POST['wooecom_qty'], $_POST['wooecom_total_price'], $_POST['wooecom_shipping'])) {
        wp_send_json_error("❌ Missing required fields.");
        return;
    }

    $full_name = sanitize_text_field($_POST['wooecom_name']);
    $phone_number = sanitize_text_field($_POST['wooecom_phone']);
    $state = sanitize_text_field($_POST['wooecom_state']);
    $city = sanitize_text_field($_POST['wooecom_city']);
    $product_id = intval($_POST['product_id']);
    $quantity = max(1, intval($_POST['wooecom_qty']));
    $product_price = wc_get_product($product_id)->get_price();
    $shipping_cost = floatval($_POST['wooecom_shipping']);
    $total_price = ($product_price * $quantity) + $shipping_cost; // Fix: Ensure correct total

    $product = wc_get_product($product_id);
    if (!$product) {
        wp_send_json_error('❌ Product not found.');
        return;
    }

    try {
        $order = wc_create_order();
        $order->add_product($product, $quantity);
        $order->set_address(array(
            'first_name' => $full_name,
            'phone' => $phone_number,
            'state' => $state,
            'city' => $city,
        ), 'billing');

        $order->set_total($total_price); // Set the correct total price
        $order->update_status('processing');

        wp_send_json_success('✅ تم تقديم الطلب بنجاح!');
    } catch (Exception $e) {
        wp_send_json_error('❌ Order Error: ' . $e->getMessage());
    }
}
