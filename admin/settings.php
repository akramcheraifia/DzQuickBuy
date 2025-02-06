<?php
if (!defined('ABSPATH')) {
    exit;
}

function wcqof_settings_menu()
{
    add_menu_page('Quick Order Settings', 'Quick Order', 'manage_options', 'wcqof-settings', 'wcqof_settings_page');
}
add_action('admin_menu', 'wcqof_settings_menu');

function wcqof_settings_page()
{
    if ($_POST['wcqof_save_settings']) {
        update_option('wcqof_border_color', sanitize_hex_color($_POST['border_color']));
        update_option('wcqof_button_bg', sanitize_hex_color($_POST['button_bg']));
        update_option('wcqof_button_text', sanitize_hex_color($_POST['button_text']));
        update_option('wcqof_button_hover', sanitize_hex_color($_POST['button_hover']));

        update_option('wcqof_variation_text', sanitize_text_field($_POST['variation_text']));
        update_option('wcqof_info_text', sanitize_text_field($_POST['info_text']));
        update_option('wcqof_place_order_text', sanitize_text_field($_POST['place_order_text']));
    }

    $border_color = get_option('wcqof_border_color', '#ccc');
    $button_bg = get_option('wcqof_button_bg', '#0073aa');
    $button_text = get_option('wcqof_button_text', '#ffffff');
    $button_hover = get_option('wcqof_button_hover', '#005177');

    $variation_text = get_option('wcqof_variation_text', 'Please select a variation');
    $info_text = get_option('wcqof_info_text', 'Fill out the form to place your order');
    $place_order_text = get_option('wcqof_place_order_text', 'Place Order');
    ?>
    <div class="wrap">
        <h1>Quick Order Settings</h1>

        <h2>Checkout Colors</h2>
        <form method="post">
            <label>Border Color: <input type="color" name="border_color" value="<?php echo $border_color; ?>"></label><br>
            <label>Button Background: <input type="color" name="button_bg" value="<?php echo $button_bg; ?>"></label><br>
            <label>Button Text Color: <input type="color" name="button_text"
                    value="<?php echo $button_text; ?>"></label><br>
            <label>Button Hover Color: <input type="color" name="button_hover"
                    value="<?php echo $button_hover; ?>"></label><br>

            <h2>Checkout Texts</h2>
            <label>Variation Selection Text: <input type="text" name="variation_text"
                    value="<?php echo $variation_text; ?>"></label><br>
            <label>Information Text: <input type="text" name="info_text" value="<?php echo $info_text; ?>"></label><br>
            <label>Place Order Button Text: <input type="text" name="place_order_text"
                    value="<?php echo $place_order_text; ?>"></label><br>

            <input type="submit" name="wcqof_save_settings" value="Save Settings">
        </form>
    </div>
    <?php
}
