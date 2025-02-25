<?php
if (!defined('ABSPATH')) {
    exit;
}

// ✅ Change "Add to Cart" button text on the single product page
add_filter('woocommerce_product_single_add_to_cart_text', function () {
    return __('اضغط هنا للطلب', 'woocommerce');
});

// ✅ Change "Add to Cart" button on shop pages & ensure styling consistency
add_filter('woocommerce_loop_add_to_cart_link', function ($button, $product) {
    $button_text = __('اضغط هنا للطلب', 'woocommerce');
    $button_url = $product->get_permalink();
    return '<a href="' . esc_url($button_url) . '" class="button product_type_simple add_to_cart_button">' . esc_html($button_text) . '</a>';
}, 10, 2);
