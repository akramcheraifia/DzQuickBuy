<?php
if (!defined('ABSPATH')) {
    exit;
}


// Change number of related products and columns
add_filter('woocommerce_output_related_products_args', 'wtwh_change_number_related_products', 9999);
function wtwh_change_number_related_products($args)
{
    // Determine the number of related products and columns based on device screen width
    $number_of_related_products = 5; // Default number of related products
    $columns = 5; // Default number of columns per row

    if (wp_is_mobile()) {
        // If it's a mobile device, adjust the number of related products and columns
        $number_of_related_products = 4; // Adjust as needed
        $columns = 2; // Adjust as needed
    }

    // Set the number of related products and columns
    $args['posts_per_page'] = $number_of_related_products;
    $args['columns'] = $columns;

    return $args;
}