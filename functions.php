<?php



	/*
		==========
		 INCLUDES
		==========
	*/

	require get_template_directory() . '/inc/function-admin.php';		

	/*
	======================
		add script and css
	======================
	*/ 

function madd_script_enqueue(){
	//css
	wp_enqueue_style( 'bootstrap',get_template_directory_uri().'/css/bootstrap.min.css', array(),'3', 'all' );
	wp_enqueue_style( 'customstyle',get_template_directory_uri().'/css/main.css', array(),'1.0.0', 'all' );
	//js
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapjs', get_template_directory_uri().'/js/bootstrap.min.js', array(), '3', true);
	wp_enqueue_script('customjs', get_template_directory_uri().'/js/madd.js', array(), '1.0.0', true);
}

add_action( 'wp_enqueue_scripts', 'madd_script_enqueue');


/*
	===================
		theme support
	===================
*/


add_theme_support( 'custom-logo' );
add_theme_support('custom-background');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('aside','image','video'));

/*
	===================
		header image
	===================
*/


function remservis_custom_header_setup() {
    $args = array(
        // 'default-image'      => get_template_directory_uri() . 'img/default-image.jpg',
        'default-text-color' => '000',
        'width'              => 1950,
        'height'             => 250,
        'flex-width'         => true,
        'flex-height'        => true,
    );
    add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'remservis_custom_header_setup' );

/*
	===================
		menu support
	===================
*/

function rem_menu_init(){
	add_theme_support( 'menus' );
	register_nav_menu( 'primary', 'Header nav menu' );
	register_nav_menu( 'secondary', 'Side nav menu' );
}

add_action( 'init', 'rem_menu_init');


/*
	===================
		widget init
	===================
*/
	function madd_widget_setup(){
		register_sidebar( 
			array(
				 'name' => 'footer',
				 'id' => 'sidebar-1',
				 'class' => 'custom',
				 'description' => 'main side bar',
				 'before_widget' => '<div id="%1$s" class="widget %2$s">',
				 'after_widget'  => '</div>',
				 'before_title'  => '<h1 class="widgettitle">',
				 'after_title'   => '</h1>'
			) 
		);

		register_sidebar( 
			array(
				 'name' => 'advert',
				 'id' => 'sidebar-2',
				 'class' => 'custom',
				 'description' => 'main side bar',
				 'before_widget' => '<div id="%1$s" class="widget %2$s">',
				 'after_widget'  => '</div>',
				 'before_title'  => '<h1 class="widgettitle">',
				 'after_title'   => '</h1>'
			) 
		);
}

add_action( 'widgets_init', 'madd_widget_setup');