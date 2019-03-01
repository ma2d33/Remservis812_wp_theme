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
		add_submenu_page( 'rem812_options', 'Rem812 Sidebar Options', 'Sidebar', 'manage_options', 'rem812_options' , 'rem_theme_create_page' );
		add_submenu_page( 'rem812_options', 'Rem812 Theme options', 'Theme Options', 'manage_options', 'rem_theme_options_menu' , 'rem_theme_support_page' );
		add_submenu_page('rem812_options','Rem812 Css options','Custom css','manage_options','rem12_css_options','rem812_settings_page');
			//Active custom settings
			add_action('admin_init','rem_custom_settings');
	}


	add_action( 'admin_menu', 'rem_add_admin_page' );

	function rem_custom_settings(){
		
		// sidebar options
		register_setting( 'rem-setting-group', 'sidebar_picture');
		register_setting( 'rem-setting-group', 'first_name');
		register_setting('rem-setting-group','last_name');
		register_setting('rem-setting-group','side_description');
		register_setting('rem-setting-group','twitter_link','rem_sanitize_twitter_link');
		register_setting('rem-setting-group','facebook_link');
		register_setting('rem-setting-group','vk_link');

		add_settings_section( 'rem-sidebar-options','Sidebar options','rem_sidebar_options', 'rem812_options' );
		add_settings_field( 'rem-sidebar-picture','Sidebar Image','rem_sidebar_picture', 'rem812_options','rem-sidebar-options');
		add_settings_field( 'sidebar-name', 'Name', 'rem_sidebar_name','rem812_options','rem-sidebar-options');
		add_settings_field( 'sidebar-description', 'Description', 'rem_sidebar_description','rem812_options','rem-sidebar-options');
		add_settings_field( 'sidebar-twitter', 'Twitter link', 'rem_sidebar_twitter','rem812_options','rem-sidebar-options');
		add_settings_field( 'sidebar-facebook', 'Facebook link', 'rem_sidebar_facebook','rem812_options','rem-sidebar-options');
		add_settings_field( 'sidebar-vk', 'Vk link', 'rem_sidebar_vk','rem812_options','rem-sidebar-options');

		// theme support options
		register_setting('rem-theme-support','post_formats', 'rem_post_format_callback');
		add_settings_section( 'rem-theme-options', $title = 'Theme Options', 'rem_theme_options' , 'rem_theme_support_page' );
		add_settings_field( 'post-formats', 'Post Formats', 'rem_post_formats', 'rem_theme_support_page', 'rem-theme-options');
	}


	//post formats callback function 
	function rem_post_format_callback($input){
			return $input;
	}

	function rem_theme_options(){
		echo "Active Theme Support";
	}

	function rem_post_formats(){
		$options = get_option('post_formats');
		$formats = array('aside','gallery','link','image', 'quote' , 'status','video','audio','chat');
		$output = '';
		foreach ($formats as $format) {
			$checked = ( @$options[$format] == 1 ? 'checked' : '');
			$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.'>'.$format.'</label><br>';
		}
		echo $output;
	}

	/*Sidebar Options*/


	function rem_sidebar_options(){
		echo "Customize your sidebar info";
	}

	function rem_sidebar_picture(){
		$picture = esc_attr(get_option('sidebar_picture'));
		echo '<input type="button" class="button button-secondary" value="Upload sidebar picture" id="upload-button" /> <input type="hidden" id="sidebar-picture" name="sidebar_picture" value="'.$picture.'"/>';
	}

	function rem_sidebar_description(){
		$description = esc_attr(get_option('side_description'));
		echo '<input type="text" name="side_description" value="'.$description.'" placeholder="Sidebar description"/>';
	}

	function rem_sidebar_twitter(){
		$Twitter = esc_attr(get_option('twitter_link'));
		echo '<input type="text" name="twitter_link" value="'.$Twitter.'" placeholder="Twitter Link"/><p class="description">Enter Twitter name without the @ character</p>';
	}

	function rem_sidebar_vk(){
		$Vk = esc_attr(get_option('vk_link'));
		echo '<input type="text" name="vk_link" value="'.$Vk.'" placeholder="Vk Link"/>';
	}

	function rem_sidebar_facebook(){
		$Facebook = esc_attr(get_option('facebook_link'));
		echo '<input type="text" name="facebook_link" value="'.$Facebook.'" placeholder="Facebook Link"/>';
	}

	function rem_sidebar_name(){
		$firstName = esc_attr(get_option('first_name'));
		$lastName = esc_attr(get_option('last_name'));
		echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="Name"/> 
		<input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name"/>';
	}


	// Template submenu functions
	function rem_theme_create_page(){
		// generation of the admin page
		require_once(get_template_directory() . '/inc/templates/rem812-admin.php');
	}	
	function rem_theme_support_page(){
		require_once(get_template_directory() . '/inc/templates/rem812-theme-support.php');
	}
	function rem812_settings_page(){
		// generation 
		echo '<h1>Rem8k12 Css Options</h1>';

	}					


	// sanitisation options

	function rem_sanitize_twitter_link($input){
		$output = sanitize_text_field( $input );
		$output = str_replace('@','', $output);
		return $output;
	}