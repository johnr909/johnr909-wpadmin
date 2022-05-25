<?php

  function remove_plugins_controls( $actions, $plugin_file, $plugin_data, $context ) {
    if( array_key_exists( 'edit', $actions) ) {
      unset( $actions['edit'] );
    }

    if(array_key_exists( 'deactivate', $actions ) ) {
      unset( $actions['deactivate'] );
    }

    if( array_key_exists( 'activate', $actions ) ) {
      unset( $actions['activate'] );
    }

    if( array_key_exists('delete', $actions ) ) {
      unset( $actions['delete'] );
    }

    return $actions;
  }

  add_filter( 'plugin_action_links', 'remove_plugins_controls', 10, 4 );

  function disable_plugins_bulk_actions( $actions ) {
    if( array_key_exists( 'deactivate-selected', $actions ) ) {
      unset( $actions['deactivate-selected'] );
    }


    if( array_key_exists( 'activate-selected', $actions ) ) {
      unset( $actions['activate-selected'] );
    }

    if( array_key_exists( 'delete-selected', $actions ) ) {
      unset( $actions['delete-selected'] );
    }

    if( array_key_exists( 'update-selected', $actions ) ) {
      unset( $actions['update-selected'] );
    }

  }

  add_action('bulk_actions-plugins', 'disable_plugins_bulk_actions');

  function remove_plugins_submenus() {
    if( current_user_can( 'manage_options' ) ) {
      remove_submenu_page( 'plugins.php', 'plugin-install.php' );
      remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
    }
  }

  add_action( 'admin_init', 'remove_plugins_submenus' );


  // function remove_themes_submenus() {
  //   if( current_user_can( 'manage_options' ) ) {
  //     remove_menu_page( 'theme-install.php' );
  //   }
  // }


  // add_action( 'admin_menu', 'remove_themes_submenus', 999 );
  //

