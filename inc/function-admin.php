<?php

	/*
		===============
		ADMIN PAGE
		===============
	*/

	function rem_add_admin_page(){

		// Generate admin page
		add_menu_page( 'Rem812 Theme Options', 'Rem812', 'manage_options', 'rem812_options', 'rem_theme_create_page', '', 110 );

		// Generate subpages
		add_submenu_page( 'rem812_options', 'Rem812 Theme Options', 'Settings', 'manage_options', 'rem812_options' , 'rem_theme_create_page' );

		add_submenu_page('rem812_options','Rem812 Css options','Custom css','manage_options','rem12_css_options','rem812_settings_page');

			//Active custom settings
			add_action('admin_init','rem_custom_settings');
	}


	add_action( 'admin_menu', 'rem_add_admin_page' );

	function rem_custom_settings(){
		register_setting( 'rem-setting-group', 'first_name');
		add_settings_section( 'rem-sidebar-options','Sidebar options','rem_sidebar_options', 'rem812_options' );
		add_settings_field( 'sidebar-name', 'Name', 'rem_sidebar_name','rem812_options','rem-sidebar-options');
	}


	function rem_sidebar_options(){
		echo "Customize your sidebar info";
	}

	function rem_sidebar_name(){
		$firstName = esc_attr(get_option('first_name'));
		echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="Name"/>';
	}

	function rem_theme_create_page(){
		// generation of the admin page

		require_once(get_template_directory() . '/inc/templates/rem812-admin.php');
 		
	}	

	function rem812_settings_page(){
		// generation 
		echo '<h1>Rem8k12 Css Options</h1>';

	}					