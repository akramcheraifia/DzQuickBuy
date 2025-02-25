<?php
/**
 * Plugin Name: Dz Quick Buy
 * Plugin URI:  https://akracoding.site
 * Description: Adds a quick order form on product pages with customizable UI.
 * Version:     1.0
 * Author:      Akram Cheraifia
 * Author URI:  https://akracoding.site
 * License:     GPL2
 */

if (!defined('ABSPATH')) {
    exit;
}

// Include necessary files
require_once plugin_dir_path(__FILE__) . 'includes/form-handler.php';
// ✅ Include WooCommerce Custom Button Modifications
require_once plugin_dir_path(__FILE__) . 'includes/woocommerce-custom-buttons.php';
require_once plugin_dir_path(__FILE__) . 'includes/number-of-related-products.php';
require_once plugin_dir_path(__FILE__) . 'includes/hide-additional-info-tab.php';
// Include Editor Customizations
require_once plugin_dir_path(__FILE__) . 'includes/editor-customizations.php';



// ✅ Include Admin Files
if (is_admin()) {
    require_once plugin_dir_path(__FILE__) . 'admin/admin-menu.php';
    require_once plugin_dir_path(__FILE__) . 'admin/admin-settings.php';
    require_once plugin_dir_path(__FILE__) . 'admin/admin-page.php';

    // ✅ Enqueue Admin Scripts & Styles
    function dqb_enqueue_admin_assets($hook)
    {
        if ($hook === 'toplevel_page_dqb_settings') {
            wp_enqueue_script('dqb-tabs', plugin_dir_url(__FILE__) . 'admin/admin-tabs.js', array(), '1.0', true);
            wp_enqueue_style('dqb-admin-style', plugin_dir_url(__FILE__) . 'admin/admin-style.css', array(), '1.1');
        }
    }
    add_action('admin_enqueue_scripts', 'dqb_enqueue_admin_assets');
}

// ✅ Enqueue styles and scripts
function wcqof_enqueue_scripts()
{
    wp_enqueue_style('wcqof-style', plugin_dir_url(__FILE__) . 'assets/css/style.css');
    wp_enqueue_script('wcqof-script', plugin_dir_url(__FILE__) . 'assets/js/script.js', array('jquery'), null, true);

    wp_localize_script('wcqof-script', 'wcqof_ajax', array('ajax_url' => admin_url('admin-ajax.php')));
    wp_localize_script('wcqof-script', 'wcqof_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'thank_you_url' => get_option('wcqof_thank_you_url', home_url('/thank-you-page')) // Default: /thank-you
    ));
}
add_action('wp_enqueue_scripts', 'wcqof_enqueue_scripts');

// ✅ Display the form on product pages
function wcqof_display_form()
{
    if (is_product()) {
        include plugin_dir_path(__FILE__) . 'templates/form.php';
    }
}
add_action('woocommerce_single_product_summary', 'wcqof_display_form', 25);

// ✅ Handle AJAX Request to Fetch State-Based Shipping Price
add_action('wp_ajax_get_state_shipping_price', 'get_state_shipping_price');
add_action('wp_ajax_nopriv_get_state_shipping_price', 'get_state_shipping_price');

function get_state_shipping_price()
{
    if (!isset($_POST['state'])) {
        wp_send_json_error(["message" => "❌ لا يوجد ولاية محددة."]);
        return;
    }

    $state = sanitize_text_field($_POST['state']);
    $shipping_prices = get_option('dqb_state_shipping_prices', array());

    $home_price = isset($shipping_prices[$state]['home']) ? floatval($shipping_prices[$state]['home']) : null;
    $office_price = isset($shipping_prices[$state]['office']) ? floatval($shipping_prices[$state]['office']) : null;
    $free_delivery = isset($shipping_prices[$state]['free_delivery']) && $shipping_prices[$state]['free_delivery'] == 1;

    wp_send_json_success([
        'home_price' => $home_price,
        'office_price' => $office_price,
        'free_delivery' => $free_delivery
    ]);
}
function wcqof_enqueue_custom_css()
{
    // Enqueue the static CSS file
    wp_enqueue_style('wcqof-custom-style', plugin_dir_url(__FILE__) . 'assets/css/custom-style.css');

    // Get color options from the database

    $button_bg = get_option('wcqof_product_summary_color', '#57b63f');
    $button_txt = get_option('wcqof_button_text_color', '#57b63f');


    // Print the dynamic CSS variables
    $custom_css = ":root {
        --button-bg: {$button_bg};
        --button-text: {$button_txt};
    }  
    ";

    wp_add_inline_style('wcqof-custom-style', $custom_css);
}
add_action('wp_enqueue_scripts', 'wcqof_enqueue_custom_css');

// ✅ Force the website language to always be Arabic
function dqb_force_arabic_frontend($locale)
{
    if (!is_admin()) {
        return 'ar'; // Force Arabic on frontend
    }
    return $locale;
}
add_filter('locale', 'dqb_force_arabic_frontend');

function dqb_replace_menu_phone_number($items, $args)
{
    $saved_phone = get_option('wcqof_phone_number', '0123456789');

    // Replace all instances of the hardcoded phone number with the dynamic one
    $items = preg_replace('/tel:\d+/', 'tel:' . esc_attr($saved_phone), $items);
    $items = preg_replace('/هاتف : \d+/', 'هاتف : ' . esc_html($saved_phone), $items);

    return $items;
}
add_filter('wp_nav_menu_items', 'dqb_replace_menu_phone_number', 10, 2);

function dqb_store_notice()
{
    $store_notices = get_option('wcqof_store_notices', ''); // Get the stored notices

    if (!empty($store_notices)) {
        // Convert saved notices into an array
        $notices = array_filter(array_map('trim', explode("\n", $store_notices)));

        if (!empty($notices)) {
            echo '<div class="dqb-store-notice-container">
                    <div class="dqb-store-notice">';
            foreach ($notices as $notice) {
                echo '<div class="dqb-store-notice-item">' . esc_html($notice) . '</div>';
            }
            echo '</div>
                  </div>';
        }
    }
}
add_action('wp_body_open', 'dqb_store_notice'); // Displays the store notice

function dqb_load_textdomain()
{
    load_plugin_textdomain('dzquickbuy', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'dqb_load_textdomain');

