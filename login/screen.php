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
