<?php
	/*
		===============
		ADMIN ENQUEUE FUNCTIONS
		===============
	*/


function madd_script_enqueue(){

	wp_enqueue_style( 'bootstrap',get_template_directory_uri().'/css/bootstrap.min.css', array(),'3', 'all' );
	wp_enqueue_style( 'customstyle',get_template_directory_uri().'/css/main.css', array(),'1.0.0', 'all' );
	//js
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapjs', get_template_directory_uri().'/js/bootstrap.min.js', array(), '3', true);
	wp_enqueue_script('customjs', get_template_directory_uri().'/js/madd.js', array(), '1.0.0', true);
}

add_action( 'wp_enqueue_scripts', 'madd_script_enqueue');


function rem_admin_equeue( $hook ){

	if('toplevel_page_rem812_options' != $hook){
		return;
	}

	wp_register_style( 'rem_admin',get_template_directory_uri().'/css/rem.admin.css', $deps = array(), $ver = '1.0.0', $media = 'all' );		
	wp_enqueue_style('rem_admin');

	// enable media uploader
	wp_enqueue_media();

	wp_register_script( 'rem-admin-script', get_template_directory_uri().'/js/rem.admin.js', $deps = array('jquery'), $ver = '1.0.0', $in_footer = true );
	wp_enqueue_script('rem-admin-script');
}

add_action('admin_enqueue_scripts','rem_admin_equeue');