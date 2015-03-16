<?php
/*
	*Theme Name	: BusiProf
	*Theme Core Functions and Codes
 * @file           functions.php
 * @package        Busiprof
 * @author         Priyanshu Mittal, Hari Maliya,Shahid,Vibhor
 * @copyright      2013 Webriti
 * @license        license.txt
 * @filesource     wp-content/themes/Busiprof/functions.php
*/
	/**Includes reqired resources here**/
	define('BUSI_TEMPLATE_DIR_URI',get_template_directory_uri());
	define('BUSI_TEMPLATE_DIR',get_template_directory());
	define('BUSI_THEME_FUNCTIONS_PATH',BUSI_TEMPLATE_DIR.'/functions');

	//Files for custom - defaults menus
	require( BUSI_THEME_FUNCTIONS_PATH . '/menu/busiprof_nav_walker.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/woo/woocommerce.php' );

	//theme ckeck plugin required 	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	//content width
	if ( ! isset( $content_width ) ) $content_width = 750;	
	//wp title tag starts here
	function busiprof_head( $title, $sep )
	{	global $paged, $page;		
		if ( is_feed() )
			return $title;
		// Add the site name.
		$title .= get_bloginfo( 'name' );
		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( _e( 'Page', 'busi_prof' ), max( $paged, $page ) );
		return $title;
	}	
	add_filter( 'wp_title', 'busiprof_head', 10, 2 );		
	global $resetno;	
	add_action( 'after_setup_theme', 'busiprof_setup' ); 	
	function busiprof_setup()
	{	// Load text domain for translation-ready
		load_theme_textdomain( 'busi_prof', BUSI_THEME_FUNCTIONS_PATH . '/lang' );	
		
		add_theme_support( 'post-thumbnails' ); //supports featured image
		//add_theme_support( 'automatic-feed-links' ); //feed links enabled
		add_theme_support( 'custom-header');		
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', __( 'Primary Menu', 'busi_prof' ) );
		
		//do_action('busiprof_init');//load admin pannal file	
		require_once('theme_setup_data.php');
		require_once(BUSI_THEME_FUNCTIONS_PATH.'/theme_options/theme_options.php');	// admin options panel
		
		// setup admin pannel defual data for index page
		$busiprof_pro_theme=theme_data_setup(); 		
		//add_option('busiprof_pro_theme_options',$busiprof_pro_theme_options); 
		
		$current_theme_options = get_option('busiprof_pro_theme_options'); // get existing option data 		
		if($current_theme_options)
		{ 	$busiprof_pro_theme_options = array_merge($busiprof_pro_theme, $current_theme_options);
			update_option('busiprof_pro_theme_options',$busiprof_pro_theme_options);	// marage option data 			
		}
		else
		{
			add_option('busiprof_pro_theme_options',$busiprof_pro_theme); // new default data option 
		}		
		
	}
	
	require( BUSI_THEME_FUNCTIONS_PATH . '/pagination/webriti_pagination.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/post-type/custom-post-type.php' );// for cpt
	require( BUSI_THEME_FUNCTIONS_PATH . '/meta-box/post-meta.php' );// for meta box
	require( BUSI_THEME_FUNCTIONS_PATH . '/taxonomies/taxonomie.php' );// for taxonomie
	require( BUSI_THEME_FUNCTIONS_PATH . '/resize_image/resize_image.php' ); //for image resize
	require( BUSI_THEME_FUNCTIONS_PATH . '/scripts/scripts.php' ); // for js and css file 
	require( BUSI_THEME_FUNCTIONS_PATH . '/widgets/custom-widgets.php' ); // for footer widget
	require( BUSI_THEME_FUNCTIONS_PATH . '/widgets/busiprof-widget-contact.php' ); // for custom contact widget 
	require( BUSI_THEME_FUNCTIONS_PATH . '/commentbox/comment-function.php' ); // for custom contact widget
	require( BUSI_THEME_FUNCTIONS_PATH . '/widgets/busiprof-latest-widget.php' );
	// admin restore options page	
	add_action('busiprof_restore_data', 'busiprof_restore_data_function', $resetno );		
	function busiprof_restore_data_function($resetno)
	{	$busiprof_pro_theme_options = theme_data_setup();	
		update_option('busiprof_pro_theme_options',$busiprof_pro_theme_options);
	}		
	//code for shortcode .....................
	define( 'WPEX_FRAMEWORK_DIR', get_template_directory_uri().'/functions' ); 
	//require_once('functions/wpex_framework.php');
	
	// webriti shortcode 
	require_once('functions/shortcodes/shortcodes.php');
	
?>