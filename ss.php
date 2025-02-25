<form class="dqb_instant_order" id="dqb_instant_order">
    <div class="dqb_instant_order_form">
        <div id="dqb_message_box" class="dqb_hidden"></div>
        <p class="dqb_notice hidden">قم بإدخال المعلومات ثم إرسال الطلب</p>
        <p class="dqb_information_title">
            <?php echo get_option('wcqof_name_info_title', 'يمكنكم القيام بطلب عبر النموذج التالي أو الإتصال بنا على الرقم 0123456789'); ?>

        </p>
        <input type="text" name="dqb_name" id="dqb_name"
            placeholder="<?php echo get_option('wcqof_name_placeholder', '👦🏻 الاسم الكامل'); ?>" required=""
            maxlength="30" />
        <input type="tel" name="dqb_phone" id="dqb_phone" pattern="[0-9]+"
            placeholder="<?php echo get_option('wcqof_phone_placeholder', 'رقم الهاتف 📞'); ?>" required=""
            maxlength="14" />
        <select name="dqb_state" id="dqb_state" class="dqb_select"
            placeholder="<?php echo get_option('wcqof_state_placeholder', '🏠 الولاية / المنطقة'); ?>" required="">

            <option value=""><?php echo get_option('wcqof_state_placeholder', '🏠 الولاية / المنطقة'); ?></option>
            <option value="Adrar-01">01 Adrar - أدرار</option>
            <option value="Chlef-02">02 Chlef - الشلف</option>
            <option value="Laghouat-03">03 Laghouat - الأغواط</option>


        </select>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                var cities = {
                    "Adrar-01": [
                        "Adrar",
                        "Tamest",
                        "Charouine",
                        "Sbaa",
                        "Ouled Aissa",
                        "Timiaouine",
                    ],

                    "El Menia-58": ["El Meniaa", "Hassi Gara", "Hassi Fehal"],
                };
                var placeholder = "📍 البلدية";
                var city_field_template =
                    '<select name="dqb_city" id="dqb_city" class="select " data-placeholder="' +
                    placeholder +
                    '" required="required"><option value="">' +
                    placeholder +
                    "</option>";

                function createCityField(options) {
                    return city_field_template + options + "</select>";
                }

                function updateCityField(states) {
                    var city_options = "";
                    $.each(cities[states], function (city_id, city_name) {
                        city_options +=
                            '<option value="' + city_name + '">' + city_name + "</option>";
                    });

                    // Remove the existing city field
                    $("#dqb_city").remove();

                    // Add the new city field to the form
                    var city_field =
                        city_options.length > 1
                            ? createCityField(city_options)
                            : createCityField("");
                    $("#dqb_state").after(city_field);
                }

                // Initial city field
                $("#dqb_state").after(createCityField(""));

                // Update city field on state change
                $("select#dqb_state").change(function () {
                    updateCityField($(this).val());
                });
            });
        </script>

        <div id="dqb_delivery_section" class="delivery-section">
            <h3>🚚 سعر التوصيل</h3>

            <label class="delivery-option">
                <input type="radio" name="dqb_delivery_type" value="home" required />
                <span class="delivery-text">🏠 توصيل إلى المنزل</span>
                <span class="delivery-price" id="home_delivery_price">د.ج 0</span>
            </label>

            <label class="delivery-option">
                <input type="radio" name="dqb_delivery_type" value="office" required />
                <span class="delivery-text">🏢 توصيل إلى المكتب</span>
                <span class="delivery-price" id="office_delivery_price">د.ج 0</span>
            </label>
        </div>
        <ul class="dqb_variations modern_ui">
            <?php
            $product_id = get_the_ID();
            $product = wc_get_product($product_id);
            $attributes = $product->get_attributes();

            foreach ($attributes as $attribute_name => $attribute) {
                // ✅ Get the human-readable attribute label
                $attribute_label = wc_attribute_label($attribute_name);

                // ✅ Handle Global Attributes (Taxonomy-based attributes)
                if ($attribute->is_taxonomy()) {
                    $terms = wp_get_post_terms($product_id, $attribute->get_name());

                    if (!empty($terms)) {
                        echo '<li class="attribute_modern_ui"><h4>' . esc_html($attribute_label) . ' :</h4>';
                        foreach ($terms as $term) {
                            $term_name = esc_html($term->name); // ✅ Display Arabic correctly
                            $term_slug = esc_attr($term->slug);

                            echo '<div class="attribute_inner">
                            <input type="radio" name="dqb_' . esc_attr($attribute_name) . '" value="' . esc_attr($term_name) . '" id="' . esc_attr($term_slug) . '" required>
                            <label for="' . esc_attr($term_slug) . '">' . esc_html($term_name) . '</label>
                          </div>';
                        }
                        echo '</li>';
                    }
                }
                // ✅ Handle Custom Attributes (Local Attributes)
                else {
                    $custom_values = array_map('trim', explode('|', implode('|', $attribute->get_options()))); // ✅ Ensure all options are retrieved correctly
            
                    if (!empty($custom_values)) {
                        echo '<li class="attribute_modern_ui"><h4>' . esc_html($attribute_label) . ' :</h4>';
                        foreach ($custom_values as $custom_value) {
                            $custom_value_clean = sanitize_text_field($custom_value); // ✅ Prevents encoding issues
            
                            echo '<div class="attribute_inner">
                            <input type="radio" name="dqb_' . esc_attr($attribute_name) . '" value="' . esc_attr($custom_value_clean) . '" id="' . esc_attr($custom_value_clean) . '" required>
                            <label for="' . esc_attr($custom_value_clean) . '">' . esc_html($custom_value_clean) . '</label>
                          </div>';
                        }
                        echo '</li>';
                    }
                }
            }
            ?>
        </ul>

        <input type="hidden" name="dqb_delivery_price" id="dqb_delivery_price" value="0" />

        <div class="dqb_placeholder"></div>
        <div class="dqb_quantity_container">
            <div class="dqb_quantity">
                <span class="dqb_minus"><i class="fa-solid fa-minus"></i></span>
                <input type="number" value="1" min="1" name="dqb_qty" id="dqb_qty" required="" readonly="" />
                <span class="dqb_plus"><i class="fa-solid fa-plus"></i></span>
            </div>
            <button type="submit" class="dqb_checkout" id="wcqof-place-order-btn">
                <span><?php echo get_option('wcqof_place_order_text', 'اطلب الان'); ?></span>
                <span class="dqb_btn_loader"></span>
            </button>
        </div>
        <!-- Order summary -->
    </div>
    <input type="hidden" name="product_id" value="<?php echo get_the_ID(); ?>">
    <div class="dqb_order_summary active">
        <div class="dqb_order_summary_head">
            <div class="dqb_order_summary_title">
                <i class="fa-solid fa-cart-shopping"></i>
                <span>ملخص الطلب</span>
            </div>
            <i class="fa-solid fa-chevron-down woocommerce_toggle_icon"></i> <!-- Added a class to the icon -->
        </div>

        <div class="dqb_price_table">
            <div class="order_loader_container">
                <span class="dqb_order_loader"></span>
            </div>

            <table>
                <tbody>
                    <!-- Product Name -->
                    <tr>
                        <td class="product_name"><?php echo get_the_title(); ?></td>
                        <td class="product_price">
                            <span class="dqb_order_qty">x<span id="dqb_qty_display">1</span></span>
                            <span class="dqb_price"><?php echo wc_get_product(get_the_ID())->get_price(); ?>
                                <span id="dqb_product_price">د.ج </span>
                            </span>

                            <input type="hidden" id="dqb_price"
                                value="<?php echo wc_get_product(get_the_ID())->get_price(); ?>" />
                        </td>
                    </tr>

                    <!-- Shipping -->
                    <tr>
                        <td>سعر الشحن
                            <div class="dqb_shipping_prices">
                            </div>
                        </td>
                        <td class="shipping_price"><span id="dqb_shipping_price">0</span>د.ج </td>
                    </tr>
                    <!-- Total Price -->
                    <tr class="dqb_row_total_price">
                        <td>السعر الإجمالي</td>
                        <td class="total_price">
                            <span class="dqb_price"><span
                                    id="dqb_total_price"><?php echo wc_get_product(get_the_ID())->get_price(); ?></span>د.ج
                            </span>
                            <input type="hidden" id="dqb_total_price_input"
                                value="<?php echo wc_get_product(get_the_ID())->get_price(); ?>" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <input type="hidden" id="dqb_total_price_input" name="dqb_total_price"
        value="<?php echo wc_get_product(get_the_ID())->get_price(); ?>" />

</form>
<div class="dqb_sticky_footer">
    <a href="#dqb_instant_order" class="dqb_buy_now">اشتري الان</a>
    <div class="dqb_footer_icons">
        <a href="tel:<?php echo get_option('wcqof_phone_number', '+213561571407'); ?>" class="href">
            <i class="fa-solid fa-phone"></i>
        </a>
        <a target="_blank" href="https://wa.me/<?php echo get_option('wcqof_whatsapp_number', '+213561571407'); ?>"
            class="href">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </div>
</div>