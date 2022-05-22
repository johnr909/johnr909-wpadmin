<?php
/**
 * Plugin Name:     JR custom admin
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
		remove_meta_box( 'e-dashboard-overview', 'dashboard', 'normal');
		remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
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

?>


<?php
// need to determine which site and load images from spaces account
function login_logo() { ?>
	<style type="text/css">
		body.login div#login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/wolf.png);
			padding-bottom: 30px;
		}
	</style>
<?php }
add_action( 'login_enqueue_scripts', 'login_logo' );

