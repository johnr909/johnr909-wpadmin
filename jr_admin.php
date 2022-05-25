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
	if( current_user_can('edit_posts')) {
		remove_meta_box('dashboard_welcome', 'dashboard', 'core');
		remove_meta_box('dashboard_primary', 'dashboard', 'core');
		remove_meta_box('dashboard_secondary', 'dashboard', 'core');
		remove_meta_box('dashboard_quick_press', 'dashboard','side');
		remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
		remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
		remove_meta_box( 'e-dashboard-overview', 'dashboard', 'normal'); // if you're using Elementor
		remove_meta_box( 'beta_tester_dashboard_widget', 'dashboard', 'normal' );
	}

}

add_action( 'admin_init', 'remove_dashboard_meta');

// hide the redis cache dashboard from non-admins
function remove_dashboard_redis_cache() {
	if( !current_user_can( 'manage_options' ) ) {
		remove_meta_box( 'dashboard_rediscache', 'dashboard', 'normal' );
	}
}

add_action( 'admin_init', 'remove_dashboard_redis_cache' );

function add_box() {
 	if( current_user_can( 'manage_options' ) ) {
   		add_meta_box(
         'dashboard_widget_id',
         esc_html__( 'Composer Managed Site', 'johnr909-wpadmin' ),
         'custom_dashboard',
         'dashboard',
         'side', 'high'
   		);
    }
}

function custom_dashboard() {
  echo "<p>This site and it's plugins and themes are managed with Composer so just keep that in mind, right?</p>";
  echo "<img style='float: right;' src='https://getcomposer.org/img/logo-composer-transparent.png' width='145' height='178'>";
  echo "<br style='clear: right;'>";
}

add_action( 'admin_init', 'add_box' );

// off with the welcome panel too
remove_action('welcome_panel', 'wp_welcome_panel');

// custom admin footer
function remove_footer_admin () {
	echo '<p>Built by johnr909</p>';
}

function style_tool_bar() {
    echo '
    <style type="text/css">
	#wpadminbar {
		background: linear-gradient(to right, navy, purple);
	}
    </style>';
}
add_action( 'admin_head', 'style_tool_bar' );
add_action( 'wp_head', 'style_tool_bar' );

add_filter( 'admin_footer_text', 'remove_footer_admin' );


function load_custom_admin_styles() {
	$plugin_dir = plugins_url('admin-styles.css', __FILE__);
	wp_enqueue_style( 'custom_wp_admin_css', $plugin_dir );
}

add_action( 'admin_enqueue_scripts', 'load_custom_admin_styles' );


function more_admin_styles() { ?>
	<style type="text/css">
		body.wp-admin {
			background: linear-gradient(to right, navy, purple);
		}

		#wpbody h1 {
			color:  #fff;
		}

		#wpfooter p {
			color:  #fff;
		}

		#wpbody .subsubsub li a {
			color:  #fff !important;
		}

		#wpbody .subsubsub a .count,
		#wpbody .subsubsub a.current .count {
  			color:  #fff;
  		}

  		#wpbody .form-table th,
  		#wpbody .form-wrap label {
  			color: #fff;
 	 	}

 	 	#wpbody a {
 	 		color:  #fff;
 	 	}

 	 	#wpbody label {
 	 		color: #fff;
 	 	}

 	 	#wpbody p.description,
 	 	#wpbody .form-wrap p {
			color: #fff;
		}

		#wpbody {
			color:  #fff;
		}
	</style>
<?php }

add_action( 'admin_init', 'more_admin_styles' );

$dir = plugin_dir_path( __DIR__ );
require $dir . '/johnr909-wpadmin/plugins/plugins-admin.php';
