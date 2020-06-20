<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/
if ( ! defined('ABSPATH')) exit;  // if direct access 


class class_social_share_button_settings  {
	
	
    public function __construct(){

		add_action( 'admin_menu', array( $this, 'admin_menu' ), 12 );
    }
	

	
	
	public function admin_menu() {

		$social_share_button_migrate_2_1_1 = get_option('social_share_button_migrate_2_1_1');
		
		add_menu_page('social_share_button', __('Social Share Button','social_share_button'), 'manage_options', 'social_share_button', array( $this, 'settings_page' ),'dashicons-share');
		

		if($social_share_button_migrate_2_1_1!='done')
		add_submenu_page( 'social_share_button', __( 'Migrate', 'social_share_button' ), __( 'Migrate', 'social_share_button' ), 'manage_options', 'social_share_button_migrate', array( $this, 'migrate' ) );
	

		do_action( 'social_share_button_action_admin_menus' );
		
	}
	
	public function settings_page(){
		
		include( 'menu/settings.php' );
		}

	public function migrate(){

		include( 'menu/migrate.php' );
	}


	}


new class_social_share_button_settings();

