<?php
if (!defined('ABSPATH')) {
    exit;
}


/**
 * @snippet       Remove Additional Information Tab @ WooCommerce Single Product Page
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.8
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

add_filter('woocommerce_product_tabs', 'bbloomer_remove_product_tabs', 9999);

function bbloomer_remove_product_tabs($tabs)
{
    unset($tabs['additional_information']);
    return $tabs;
}