<?php

function remove_adminbar_stuff($wp_admin_bar)
{
    $wp_admin_bar->remove_node('wp-logo');
    $wp_admin_bar->remove_node('search');
    $wp_admin_bar->remove_node('themes');
    $wp_admin_bar->remove_node('customize');
}
add_action('admin_bar_menu', 'remove_adminbar_stuff', 999);

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Tillbaka till startsidan';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

function replace_footer_admin ()
{
    echo '<span id="footer-thankyou">Developed and designed by <a href="http://www.careofhaus.se" target="_blank">Care of Haus</a></span>';
}
add_filter('admin_footer_text', 'replace_footer_admin');

function remove_dashboard_meta() {
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
}
add_action( 'admin_init', 'remove_dashboard_meta' );

function remove_tags()
{
    remove_meta_box('tagsdiv-post_tag', 'post', 'normal'); // Tags Metabox
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag'); // Tags
}

add_action('admin_menu', 'remove_tags');