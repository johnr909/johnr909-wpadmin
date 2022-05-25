<?php
function add_box() {
 	if( current_user_can( 'manage_options' ) ) {
   		add_meta_box(
         'dashboard_widget_id',
         esc_html__( 'An announcement', 'wporg' ),
         'custom_dashboard',
         'dashboard',
         'side', 'high'
   		);
    }
}

function custom_dashboard() {
  echo "This site's plugins are managed with Composer so just keep that in mind, right?";
}

add_action( 'admin_init', 'add_box' );
