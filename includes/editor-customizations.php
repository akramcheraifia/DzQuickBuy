<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// ✅ Remove "Edit Page" button from the WordPress admin bar
function dqb_remove_edit_page_button($wp_admin_bar)
{
    $wp_admin_bar->remove_node('edit');
}
add_action('admin_bar_menu', 'dqb_remove_edit_page_button', 999);

// ✅ Disable Gutenberg (Block Editor) for Pages and Posts
function dqb_disable_default_editor()
{
    remove_post_type_support('page', 'editor'); // Removes editor from Pages
    remove_post_type_support('post', 'editor'); // Removes editor from Posts
}
add_action('init', 'dqb_disable_default_editor');

// ✅ Force Elementor Editor for Pages (Avoid redirect loops)
function dqb_force_elementor_editor()
{
    if (isset($_GET['post'])) {
        $post_id = $_GET['post'];

        // Check if Elementor is active and the post type is 'page'
        if (get_post_type($post_id) === 'page' && !isset($_GET['action'])) {
            $elementor_url = admin_url('post.php?post=' . $post_id . '&action=elementor');

            // Prevent redirect loop by checking if already on Elementor page
            if ($_SERVER['REQUEST_URI'] !== parse_url($elementor_url, PHP_URL_PATH)) {
                wp_redirect($elementor_url);
                exit;
            }
        }
    }
}
add_action('load-post.php', 'dqb_force_elementor_editor');
