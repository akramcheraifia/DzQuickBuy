<?php
/**
 * Plugin Name: WooCommerce Quick Order Form
 * Plugin URI:  https://yourwebsite.com
 * Description: Adds a quick order form on product pages with customizable UI.
 * Version:     1.0
 * Author:      Your Name
 * Author URI:  https://yourwebsite.com
 * License:     GPL2
 */

if (!defined('ABSPATH')) {
    exit;
}

// Include necessary files
require_once plugin_dir_path(__FILE__) . 'includes/form-handler.php';
require_once plugin_dir_path(__FILE__) . 'admin/settings.php';

// Enqueue styles and scripts
function wcqof_enqueue_scripts()
{
    wp_enqueue_style('wcqof-style', plugin_dir_url(__FILE__) . 'assets/css/style.css');
    wp_enqueue_script('wcqof-script', plugin_dir_url(__FILE__) . 'assets/js/script.js', array('jquery'), null, true);

    wp_localize_script('wcqof-script', 'wcqof_ajax', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'wcqof_enqueue_scripts');

// Display the form on product pages
function wcqof_display_form()
{
    if (is_product()) {
        include plugin_dir_path(__FILE__) . 'templates/form.php';
    }
}
add_action('woocommerce_single_product_summary', 'wcqof_display_form', 25);
