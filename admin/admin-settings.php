<?php
if (!defined('ABSPATH')) {
    exit;
}

// ✅ Register settings for DzQuickBuy plugin
function dqb_register_settings()
{
    // Titles Section
    register_setting('dqb_settings_group', 'wcqof_place_order_text');
    register_setting('dqb_settings_group', 'wcqof_name_placeholder');
    register_setting('dqb_settings_group', 'wcqof_phone_placeholder');
    register_setting('dqb_settings_group', 'wcqof_state_placeholder');
    register_setting('dqb_settings_group', 'wcqof_name_info_title');

    // Colors Section
    register_setting('dqb_settings_group', 'wcqof_button_text_color');
    register_setting('dqb_settings_group', 'wcqof_form_border_color');
    register_setting('dqb_settings_group', 'wcqof_product_summary_color');

    // Settings Section (Phone & WhatsApp)
    register_setting('dqb_settings_group', 'wcqof_phone_number');
    register_setting('dqb_settings_group', 'wcqof_whatsapp_number');
    register_setting('dqb_settings_group', 'wcqof_thank_you_url');

    // ✅ Order Limit Per IP Setting
    register_setting('dqb_settings_group', 'wcqof_order_limit_per_ip');
    // ✅ Register Ban Duration Setting
    register_setting('dqb_settings_group', 'wcqof_ban_duration');
    // Register State-Based Shipping Prices
    register_setting('dqb_settings_group', 'dqb_state_shipping_prices');
    register_setting('dqb_settings_group', 'wcqof_store_notices');




}
add_action('admin_init', 'dqb_register_settings');

if (isset($_POST['wcqof_reset_settings']) && check_admin_referer('dqb_reset_nonce')) {
    dqb_reset_all_settings();
}

function dqb_reset_all_settings()
{
    // ✅ Define Default Values
    $default_values = array(
        'wcqof_place_order_text' => 'اطلب الان',
        'wcqof_name_placeholder' => '👦🏻 الاسم الكامل',
        'wcqof_phone_placeholder' => 'رقم الهاتف 📞',
        'wcqof_state_placeholder' => '🏠 الولاية / المنطقة',
        'wcqof_name_info_title' => 'يمكنكم القيام بطلب عبر النموذج التالي أو الإتصال بنا على الرقم 2912931293',
        'wcqof_button_text_color' => '#ffffff',
        'wcqof_form_border_color' => '#dddddd',
        'wcqof_product_summary_color' => '#000000',
        'wcqof_phone_number' => '+213561571407',
        'wcqof_whatsapp_number' => '+213561571407',
        'wcqof_thank_you_url' => home_url('/thank-you-page'),
        'wcqof_order_limit_per_ip' => 3,
        'wcqof_ban_duration' => 1,

    );

    // ✅ Reset all settings
    foreach ($default_values as $key => $value) {
        update_option($key, $value);
    }
    // ✅ Reset Shipping Prices to 0
    $states = array(
        "Adrar-01",
        "Chlef-02",
        "Laghouat-03",
        "Oum El Bouaghi-04",
        "Batna-05",
        "Béjaïa-06",
        "Biskra-07",
        "Bechar-08",
        "Blida-09",
        "Bouira-10",
        "Tamanrasset-11",
        "Tébessa-12",
        "Tlemcen-13",
        "Tiaret-14",
        "Tizi Ouzou-15",
        "Alger-16",
        "Djelfa-17",
        "Jijel-18",
        "Sétif-19",
        "Saïda-20",
        "Skikda-21",
        "Sidi Bel Abbès-22",
        "Annaba-23",
        "Guelma-24",
        "Constantine-25",
        "Médéa-26",
        "Mostaganem-27",
        "MSila-28",
        "Mascara-29",
        "Ouargla-30",
        "Oran-31",
        "El Bayadh-32",
        "Illizi-33",
        "Bordj Bou Arreridj-34",
        "Boumerdès-35",
        "El Tarf-36",
        "Tindouf-37",
        "Tissemsilt-38",
        "El Oued-39",
        "Khenchela-40",
        "Souk Ahras-41",
        "Tipaza-42",
        "Mila-43",
        "Aïn Defla-44",
        "Naâma-45",
        "Aïn Témouchent-46",
        "Ghardaïa-47",
        "Relizane-48",
        "Timimoun-49",
        "Bordj Baji Mokhtar-50",
        "Ouled Djellal-51",
        "Béni Abbès-52",
        "Aïn Salah-53",
        "In Guezzam-54",
        "Touggourt-55",
        "Djanet-56",
        "El MGhair-57",
        "El Menia-58"
    );

    $reset_shipping_prices = [];
    foreach ($states as $state) {
        $reset_shipping_prices[$state] = [
            'home' => 0,
            'office' => 0,
            'free_delivery' => 0
        ];
    }
    update_option('dqb_state_shipping_prices', $reset_shipping_prices);

    // ✅ Redirect Back with Success Message
    wp_safe_redirect(admin_url('admin.php?page=dqb_settings&reset_success=1'));
    exit;
}
// ✅ Hook into WordPress Admin Actions
add_action('admin_post_dqb_reset_settings', 'dqb_reset_all_settings');
