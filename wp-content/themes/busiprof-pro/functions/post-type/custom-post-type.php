<?php
/************* Home slider custom post type ************************/
		$current_options = get_option('busiprof_pro_theme_options');
		$slug_slide = $current_options['busiprof_slider_slug'];
		$slug_service = $current_options['busiprof_service_slug'];
		$slug_portfolio = $current_options['busiprof_portfolio_slug'];
		$slug_team = $current_options['busiprof_team_slug'];
		$slug_testimonial = $current_options['busiprof_testimonial_slug'];
		$slug_project = $current_options['busiprof_project_slug'];
		function busiprof_slider() {
			register_post_type( 'busiprof_slider',
				array(
				'labels' => array(
				'name' => 'Featured Slider',
				//'singular_name' => 'Featured Services',
				'add_new' => __('Add New Slide', 'busi_prof'),
                'add_new_item' => __('Add New Slider','busi_prof'),
				'edit_item' => __('Add New Slide','busi_prof'),
				'new_item' => __('New Link','busi_prof'),
				'all_items' => __('All Featured Sliders','busi_prof'),
				'view_item' => __('View Link','busi_prof'),
				'search_items' => __('Search Links','busi_prof'),
				'not_found' =>  __('No Links found','busi_prof'),
				'not_found_in_trash' => __('No Links found in Trash','busi_prof'), 
				
			),
				'supports' => array('title','thumbnail'),
				'show_in_nav_menus' => false,				
				'rewrite' => array('slug' => $GLOBALS['slug_slide']),
				'public' => true,
				'menu_position' => 11,
				'public' => true,
				'menu_icon' => BUSI_TEMPLATE_DIR_URI . '/images/slides.png',

			
		)
	);
}
add_action( 'init', 'busiprof_slider' );
/************* Home Service custom post type ************************/		
		function busiprof_service_type()
		{	register_post_type( 'busiprof_service',
				array(
				'labels' => array(
				'name' => 'Service',
				//'singular_name' => 'Featured Services',
				'add_new' => __('Add New service', 'busi_prof'),
                'add_new_item' => __('Add New Service','busi_prof'),
				'edit_item' => __('Add New service','busi_prof'),
				'new_item' => __('New Link','busi_prof'),
				'all_items' => __('All Services','busi_prof'),
				'view_item' => __('View Link','busi_prof'),
				'search_items' => __('Search Links','busi_prof'),
				'not_found' =>  __('No Links found','busi_prof'),
				'not_found_in_trash' => __('No Links found in Trash','busi_prof'), 
				
			),
				'supports' => array('title'),
				'show_in_nav_menus' => false,
				'public' => true,
				'rewrite' => array('slug' => $GLOBALS['slug_service']),
				'menu_position' => 11,
				'public' => true,
				'menu_icon' => BUSI_TEMPLATE_DIR_URI . '/images/service.png',
			)
	);
}
add_action( 'init', 'busiprof_service_type' );

/************* Home project custom post type ************************/		
		function busiprof_project_type()
		{	register_post_type( 'busiprof_project',
				array(
				'labels' => array(
				'name' => ' Project',
				//'singular_name' => 'Featured Services',
				'add_new' => __('Add New project', 'busi_prof'),
                'add_new_item' => __('Add New Project','busi_prof'),
				'edit_item' => __('Add New project','busi_prof'),
				'new_item' => __('New Link','busi_prof'),
				'all_items' => __('All Project','busi_prof'),
				'view_item' => __('View Link','busi_prof'),
				'search_items' => __('Search Links','busi_prof'),
				'not_found' =>  __('No Links found','busi_prof'),
				'not_found_in_trash' => __('No Links found in Trash','busi_prof'), 
				
			),
				'supports' => array('title','thumbnail'),
				'show_in_nav_menus' => false,
				'public' => true,
				'rewrite' => array('slug' => $GLOBALS['slug_project']),
				'menu_position' => 11,
				'public' => true,
				'menu_icon' => BUSI_TEMPLATE_DIR_URI . '/images/project.png',
			)
	);
}
add_action( 'init', 'busiprof_project_type' );

/******************************Testimonial POST TYPE*******************************************************/
function busiprof_testimonials_type()
		{	register_post_type( 'busiprof_testimonial',
				array(
				'labels' => array(
				'name' => 'Testimonials',
				//'singular_name' => 'Featured Services',
				'add_new' => __('Add New Testimonial', 'busi_prof'),
                'add_new_item' => __('Add New Testimonial','busi_prof'),
				'edit_item' => __('Add New Testimonial','busi_prof'),
				'new_item' => __('New Link','busi_prof'),
				'all_items' => __('All Testimonials','busi_prof'),
				'view_item' => __('View Link','busi_prof'),
				'search_items' => __('Search Links','busi_prof'),
				'not_found' =>  __('No Links found','busi_prof'),
				'not_found_in_trash' => __('No Links found in Trash','busi_prof'), 
				
			),
				'supports' => array('title','thumbnail'),
				'show_in_nav_menus' => false,
				'public' => true,
				'rewrite' => array('slug' => $GLOBALS['slug_testimonial']),
				'menu_position' => 12,
				'public' => true,
				'menu_icon' => get_template_directory_uri() . '/images/testimonial.png',
			)
	);
}
add_action( 'init', 'busiprof_testimonials_type' );


/******************************Team POST TYPE*******************************************************/
function busiprof_team_type()
		{	register_post_type( 'busiprof_team',
				array(
				'labels' => array(
				'name' => 'Our Team',
				//'singular_name' => 'Featured Services',
				'add_new' => __('Add New Team Member', 'busi_prof'),
                'add_new_item' => __('Add New Member','busi_prof'),
				'edit_item' => __('Add New Member','busi_prof'),
				'new_item' => __('New Link','busi_prof'),
				'all_items' => __('All Team Member','busi_prof'),
				'view_item' => __('View Link','busi_prof'),
				'search_items' => __('Search Links','busi_prof'),
				'not_found' =>  __('No Links found','busi_prof'),
				'not_found_in_trash' => __('No Links found in Trash','busi_prof'), 
				
			),
				'supports' => array('title','thumbnail'),
				'show_in_nav_menus' => false,
				'public' => true,
				'rewrite' => array('slug' => $GLOBALS['slug_team']),
				'menu_position' => 13,
				'public' => true,
				'menu_icon' => get_template_directory_uri() . '/images/team.png',
			)
	);
}
add_action( 'init', 'busiprof_team_type' );

/************* Home project custom post type ************************/		
		function busiprof_client_strip()
		{	register_post_type( 'busiprof_clientstrip',
				array(
				'labels' => array(
				'name' => ' Client',
				//'singular_name' => 'Featured Services',
				'add_new' => __('Add New Client', 'busi_prof'),
                'add_new_item' => __('Add New Client','busi_prof'),
				'edit_item' => __('Add New Client','busi_prof'),
				'new_item' => __('New Link','busi_prof'),
				'all_items' => __('All Client','busi_prof'),
				'view_item' => __('View Link','busi_prof'),
				'search_items' => __('Search Links','busi_prof'),
				'not_found' =>  __('No Links found','busi_prof'),
				'not_found_in_trash' => __('No Links found in Trash','busi_prof'), 
				
			),
				'supports' => array('title','thumbnail'),
				'show_in_nav_menus' => false,
				'public' => true,
				'menu_position' => 11,
				'public' => true,
				'menu_icon' => BUSI_TEMPLATE_DIR_URI . '/images/satisfied-clients.jpg',
			)
	);
}
add_action( 'init', 'busiprof_client_strip' );


/******************************Portfolio POST TYPE*******************************************************/
function busiprof_custom_portfolio()
		{	register_post_type( 'busiprof_portfolio',
				array(
				'labels' => array(
				'name' => 'Portfolio',
				//'singular_name' => 'Featured Services',
				'add_new' => __('Add New Portfolio', 'busi_prof'),
                'add_new_item' => __('Add New Portfolio','busi_prof'),
				'edit_item' => __('Add New Portfolio','busi_prof'),
				'new_item' => __('New Link','busi_prof'),
				'all_items' => __('All Portfolio','busi_prof'),
				'view_item' => __('View Link','busi_prof'),
				'search_items' => __('Search Links','busi_prof'),
				'not_found' =>  __('No Links found','busi_prof'),
				'not_found_in_trash' => __('No Links found in Trash','busi_prof'), 
				
			),
				'supports' => array('title','thumbnail'),
				'show_in_nav_menus' => false,
				'rewrite' => array('slug' => $GLOBALS['slug_portfolio']),
				'public' => true,
				'menu_position' => 12,
				'public' => true,
				//'menu_icon' => get_template_directory_uri() . '/images/Portfolio.png',
			)
	);
}
add_action( 'init', 'busiprof_custom_portfolio' );
?>