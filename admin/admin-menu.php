<?php
if (!defined('ABSPATH')) {
    exit;
}

// Add DzQuickBuy Settings menu to WordPress admin
function dqb_add_admin_menu()
{
    add_menu_page(
        'DzQuickBuy Settings',
        'DzQuickBuy Settings',
        'manage_options',
        'dqb_settings',
        'dqb_settings_page',
        'dashicons-admin-generic'
    );
}
add_action('admin_menu', 'dqb_add_admin_menu');
