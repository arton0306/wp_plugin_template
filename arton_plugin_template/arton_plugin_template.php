<?php /*

**************************************************************************

Plugin Name:  arton_plugin_template
Plugin URI:   none
Version:      1.0
Description:  This is a WordPress plugin template.
Author:       Arton
Author URI:   https://arton0306blog.wordpress.com/

**************************************************************************

*/

if (!defined('ABSPATH')) die();

// test simple title hook
function arton_add_atat_before_title($title) {
    return "@@:" . $title;
}
add_filter("the_title", "arton_add_atat_before_title");

// test adding an option page on menu
function arton_setting_page() {
    echo "<h3>page from setting menu</h3>";
}

function arton_add_setting_menu() {
    add_options_page("arton page title",
                     "arton menu title",
                     "manage_options",
                     "arton_plugin_template_settings",
                     "arton_setting_page",
                     null,
                     66);
}
add_action('admin_menu', 'arton_add_setting_menu');

// test adding an option beside the activate/deactivate links
function arton_add_action_link ($links) {
    $mylinks = array(
        '<a href="' . admin_url( 'options-general.php?page=arton_plugin_template_settings' ) . '">Settings</a>',
    );  
    return array_merge( $links, $mylinks );
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'arton_add_action_link' );

?>
