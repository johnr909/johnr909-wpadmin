<?php
/**
 * Plugin Name:     JR custom admin
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     A place for testing custom admin code
 * Author:          John Rose
 * Author URI:      YOUR SITE HERE
 * Text Domain:     jr_admin
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Jr_admin
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

remove_action('welcome_panel', 'wp_welcome_panel');

// Custom Admin footer
function wp_remove_footer_admin () {
	echo '<p>Built by johnr909</p>';
}

add_filter( 'admin_footer_text', 'wp_remove_footer_admin' );

?>

<?php
function wpexplorer_login_logo() { ?>
	<style type="text/css">
		body.login div#login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/wolf.png);
			padding-bottom: 30px;
		}
	</style>
<?php }
add_action( 'login_enqueue_scripts', 'wpexplorer_login_logo' );

