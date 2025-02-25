<?php
if (!defined('ABSPATH')) {
    exit;
}

// Admin Page UI
function dqb_settings_page()
{
    ?>
    <div class="wrap">
        <h1><?php _e('DzQuickBuy Settings', 'dzquickbuy'); ?></h1>
        <?php if (isset($_GET['reset_success'])): ?>
            <div class="notice notice-success is-dismissible">
                <p><?php _e('✅ All settings have been reset to default!', 'dzquickbuy'); ?></p>
            </div>
        <?php endif; ?>
        <!-- Tab Navigation -->
        <h2 class="nav-tab-wrapper">
            <a href="#" class="nav-tab nav-tab-active" data-tab="titles"><?php _e('🔤 Titles', 'dzquickbuy'); ?></a>
            <a href="#" class="nav-tab" data-tab="colors"><?php _e('🎨 Colors', 'dzquickbuy'); ?></a>
            <a href="#" class="nav-tab" data-tab="settings"><?php _e('⚙️ Settings', 'dzquickbuy'); ?></a>
            <a href="#" class="nav-tab" data-tab="spam"><?php _e('🚫 Spam Protection', 'dzquickbuy'); ?></a>
            <a href="#" class="nav-tab" data-tab="shipping"><?php _e('🚚 Shipping Prices', 'dzquickbuy'); ?></a>
        </h2>

        <form method="post" action="options.php">
            <?php settings_fields('dqb_settings_group'); ?>
            <?php do_settings_sections('dqb_settings_group'); ?>

            <!-- Titles Tab -->
            <div id="titles" class="tab-content active">
                <h2><?php _e('🔤 Titles', 'dzquickbuy'); ?></h2>
                <div class="tab-content-inner">
                    <div>
                        <label><?php _e('Place Order Button Text:', 'dzquickbuy'); ?></label>
                        <input type="text" name="wcqof_place_order_text"
                            value="<?php echo get_option('wcqof_place_order_text', 'اطلب الان'); ?>" />
                    </div>

                    <div>
                        <label><?php _e('Name Placeholder:', 'dzquickbuy'); ?></label>
                        <input type="text" name="wcqof_name_placeholder"
                            value="<?php echo get_option('wcqof_name_placeholder', '👦🏻 الاسم الكامل'); ?>" />
                    </div>

                    <div>
                        <label><?php _e('Phone Placeholder:', 'dzquickbuy'); ?></label>
                        <input type="text" name="wcqof_phone_placeholder"
                            value="<?php echo get_option('wcqof_phone_placeholder', 'رقم الهاتف 📞'); ?>" />
                    </div>

                    <div>
                        <label><?php _e('State Placeholder:', 'dzquickbuy'); ?></label>
                        <input type="text" name="wcqof_state_placeholder"
                            value="<?php echo get_option('wcqof_state_placeholder', '🏠 الولاية / المنطقة'); ?>" />
                    </div>

                    <div>
                        <label><?php _e('Information text:', 'dzquickbuy'); ?></label>
                        <input type="text" name="wcqof_name_info_title"
                            value="<?php echo get_option('wcqof_name_info_title', 'يمكنكم القيام بطلب عبر النموذج التالي أو الإتصال بنا على الرقم 2912931293'); ?>" />
                    </div>
                    <div class="dqb_store_notice_field">
                        <label><?php _e('Store Notices (One per Line):', 'dzquickbuy'); ?></label>
                        <textarea name="wcqof_store_notices" rows="4"
                            cols="50"><?php echo esc_textarea(get_option('wcqof_store_notices', '🔥 Welcome to our store! Enjoy great deals.')); ?></textarea>
                    </div>

                </div>

            </div>

            <!-- Colors Tab -->

            <div id="colors" class="tab-content">
                <h2><?php _e('🎨 Colors', 'dzquickbuy'); ?></h2>
                <div class="tab-content-inner">
                    <div>
                        <label><?php _e('Main Color:', 'dzquickbuy'); ?></label>
                        <input type="color" name="wcqof_product_summary_color"
                            value="<?php echo get_option('wcqof_product_summary_color', '#000000'); ?>" />
                    </div>
                    <div>
                        <label><?php _e('Button Text Color:', 'dzquickbuy'); ?></label>
                        <input type="color" name="wcqof_button_text_color"
                            value="<?php echo get_option('wcqof_button_text_color', '#ffffff'); ?>" />
                    </div>
                    <div>
                        <label><?php _e('Form Border Color:', 'dzquickbuy'); ?></label>
                        <input type="color" name="wcqof_form_border_color"
                            value="<?php echo get_option('wcqof_form_border_color', '#dddddd'); ?>" />
                    </div>

                </div>
            </div>

            <!-- Settings Tab -->
            <div id="settings" class="tab-content">
                <h2><?php _e('⚙️ Settings', 'dzquickbuy'); ?></h2>
                <div class="tab-content-inner">
                    <div>
                        <label><?php _e('Phone Number:', 'dzquickbuy'); ?></label>
                        <input type="text" name="wcqof_phone_number"
                            value="<?php echo get_option('wcqof_phone_number', '+213561571407'); ?>" />
                    </div>
                    <div>
                        <label><?php _e('WhatsApp Number:', 'dzquickbuy'); ?></label>
                        <input type="text" name="wcqof_whatsapp_number"
                            value="<?php echo get_option('wcqof_whatsapp_number', '+213561571407'); ?>" />
                    </div>
                    <div>
                        <label><?php _e('Thank You Page URL:', 'dzquickbuy'); ?></label>
                        <input type="text" name="wcqof_thank_you_url"
                            value="<?php echo get_option('wcqof_thank_you_url', home_url('/thank-you-page')); ?>" />
                    </div>

                </div>
            </div>
            <div id="spam" class="tab-content">
                <h2><?php _e('🚫 Spam Protection', 'dzquickbuy'); ?></h2>
                <div class="tab-content-inner">
                    <div>
                        <label><?php _e('Order Limit Per IP:', 'dzquickbuy'); ?></label>
                        <input type="number" name="wcqof_order_limit_per_ip"
                            value="<?php echo get_option('wcqof_order_limit_per_ip', 2); ?>" min="1" />
                    </div>
                    <div>
                        <label><?php _e('Ban Duration (in minutes):', 'dzquickbuy'); ?></label>
                        <input type="number" name="wcqof_ban_duration"
                            value="<?php echo get_option('wcqof_ban_duration', 60); ?>" min="1" />
                    </div>


                </div>
            </div>
            <div id="shipping" class="tab-content">
                <h2><?php _e('🚚 Shipping Prices', 'dzquickbuy'); ?></h2>
                <div class="tab-content-inner">
                    <?php
                    $states = array(
                        "Adrar-01" => "Adrar",
                        "Chlef-02" => "Chlef",
                        "Laghouat-03" => "Laghouat",
                        "Oum El Bouaghi-04" => "Oum El Bouaghi",
                        "Batna-05" => "Batna",
                        "Béjaïa-06" => "Béjaïa",
                        "Biskra-07" => "Biskra",
                        "Bechar-08" => "Bechar",
                        "Blida-09" => "Blida",
                        "Bouira-10" => "Bouira",
                        "Tamanrasset-11" => "Tamanrasset",
                        "Tébessa-12" => "Tébessa",
                        "Tlemcen-13" => "Tlemcen",
                        "Tiaret-14" => "Tiaret",
                        "Tizi Ouzou-15" => "Tizi Ouzou",
                        "Alger-16" => "Alger",
                        "Djelfa-17" => "Djelfa",
                        "Jijel-18" => "Jijel",
                        "Sétif-19" => "Sétif",
                        "Saïda-20" => "Saïda",
                        "Skikda-21" => "Skikda",
                        "Sidi Bel Abbès-22" => "Sidi Bel Abbès",
                        "Annaba-23" => "Annaba",
                        "Guelma-24" => "Guelma",
                        "Constantine-25" => "Constantine",
                        "Médéa-26" => "Médéa",
                        "Mostaganem-27" => "Mostaganem",
                        "MSila-28" => "MSila",
                        "Mascara-29" => "Mascara",
                        "Ouargla-30" => "Ouargla",
                        "Oran-31" => "Oran",
                        "El Bayadh-32" => "El Bayadh",
                        "Illizi-33" => "Illizi",
                        "Bordj Bou Arreridj-34" => "Bordj Bou Arreridj",
                        "Boumerdès-35" => "Boumerdès",
                        "El Tarf-36" => "El Tarf",
                        "Tindouf-37" => "Tindouf",
                        "Tissemsilt-38" => "Tissemsilt",
                        "El Oued-39" => "El Oued",
                        "Khenchela-40" => "Khenchela",
                        "Souk Ahras-41" => "Souk Ahras",
                        "Tipaza-42" => "Tipaza",
                        "Mila-43" => "Mila",
                        "Aïn Defla-44" => "Aïn Defla",
                        "Naâma-45" => "Naâma",
                        "Aïn Témouchent-46" => "Aïn Témouchent",
                        "Ghardaïa-47" => "Ghardaïa",
                        "Relizane-48" => "Relizane",
                        "Timimoun-49" => "Timimoun",
                        "Bordj Baji Mokhtar-50" => "Bordj Baji Mokhtar",
                        "Ouled Djellal-51" => "Ouled Djellal",
                        "Béni Abbès-52" => "Béni Abbès",
                        "Aïn Salah-53" => "Aïn Salah",
                        "In Guezzam-54" => "In Guezzam",
                        "Touggourt-55" => "Touggourt",
                        "Djanet-56" => "Djanet",
                        "El MGhair-57" => "El MGhair",
                        "El Menia-58" => "El Menia",
                    );
                    $shipping_prices = get_option('dqb_state_shipping_prices', array());

                    foreach ($states as $code => $name) {
                        $home_price = isset($shipping_prices[$code]['home']) ? $shipping_prices[$code]['home'] : 0;
                        $office_price = isset($shipping_prices[$code]['office']) ? $shipping_prices[$code]['office'] : 0;
                        $free_delivery = isset($shipping_prices[$code]['free_delivery']) ? $shipping_prices[$code]['free_delivery'] : 0;
                        ?>
                        <div class="shipping-card">
                            <h3><?php _e('🚚 ', 'dzquickbuy');
                            echo $name; ?></h3>
                            <label><?php _e('🏠 Home Delivery:', 'dzquickbuy'); ?></label>
                            <input type="number" name="dqb_state_shipping_prices[<?php echo $code; ?>][home]"
                                value="<?php echo esc_attr($home_price); ?>" min="0" step="100" />

                            <label><?php _e('🏢 Office Delivery:', 'dzquickbuy'); ?></label>
                            <input type="number" name="dqb_state_shipping_prices[<?php echo $code; ?>][office]"
                                value="<?php echo esc_attr($office_price); ?>" min="0" step="100" />

                            <label>
                                <input type="checkbox" name="dqb_state_shipping_prices[<?php echo $code; ?>][free_delivery]"
                                    value="1" <?php checked(1, $free_delivery); ?> />
                                <?php _e('🎁 Free Delivery', 'dzquickbuy'); ?>
                            </label>
                        </div>
                    <?php } ?>
                </div>
            </div>



            <?php submit_button(); ?>
        </form>
        <form method="post" action="<?php echo admin_url('admin-post.php'); ?>" style="display: inline;">
            <input type="hidden" name="action" value="dqb_reset_settings">
            <?php wp_nonce_field('dqb_reset_nonce'); ?>
            <button type="submit" class="button button-secondary"
                onclick="return confirm('<?php _e('Are you sure you want to reset all settings to default?', 'dzquickbuy'); ?>');">
                <?php _e('🔄 Reset to Default', 'dzquickbuy'); ?>
            </button>
        </form>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                setTimeout(function () {
                    let notice = document.querySelector(".notice-success");
                    if (notice) {
                        notice.style.transition = "opacity 1s";
                        notice.style.opacity = "0";
                        setTimeout(() => notice.remove(), 1000);
                    }
                }, 5000);
            });
        </script>
    </div>
    <?php
}
