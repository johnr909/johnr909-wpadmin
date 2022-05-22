<?php
function remove_dashboard_meta() {
	if( current_user_can('manage_options')) {
		remove_meta_box('dashboard_welcome', 'dashboard', 'core');
		remove_meta_box('dashboard_primary', 'dashboard', 'core');
		remove_meta_box('dashboard_secondary', 'dashboard', 'core');
		remove_meta_box('dashboard_quick_press', 'dashboard','side');
		remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
		remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
		remove_meta_box( 'e-dashboard-overview', 'dashboard', 'normal');
		remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
	}

}

add_action( 'admin_init', 'remove_dashboard_meta');

remove_action('welcome_panel', 'wp_welcome_panel');
