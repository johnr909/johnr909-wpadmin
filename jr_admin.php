<?php
/**
 * Plugin Name:     johnr909-wpadmin
 * Description:     WP Admin customizations for plugin management with Composer, the dashboard, footer, and login screen content.
 * Author:          John Rose
 * Text Domain:     johnr909-wpadmin
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package
 */

// Your code starts here.
function remove_dashboard_meta() {
	if( current_user_can('manage_options')) {
		remove_meta_box('dashboard_welcome', 'dashboard', 'core');
		remove_meta_box('dashboard_primary', 'dashboard', 'core');
		remove_meta_box('dashboard_secondary', 'dashboard', 'core');
		remove_meta_box('dashboard_quick_press', 'dashboard','side');
		remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
		remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
		remove_meta_box( 'e-dashboard-overview', 'dashboard', 'normal'); // if you're using Elementor
	}

}

add_action( 'admin_init', 'remove_dashboard_meta');

// off with the welcome panel too
remove_action('welcome_panel', 'wp_welcome_panel');

// custom admin footer
function remove_footer_admin () {
	echo '<p>Built by johnr909</p>';
}

add_filter( 'admin_footer_text', 'remove_footer_admin' );

$dir = plugin_dir_path( __DIR__ );
require $dir . '/johnr909-wpadmin/plugins/plugins-admin.php';
