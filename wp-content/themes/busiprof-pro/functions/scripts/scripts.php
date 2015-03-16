<?php
// front end css and js Scripts Enqueue here
	function busiprof_scripts(){
	
		// following css requirement all pages
		wp_enqueue_style('font', get_template_directory_uri().'/css/font/font.css');
		wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css');
		wp_enqueue_style('bootstrap-responsive', get_template_directory_uri().'/css/bootstrap-responsive.css');
		wp_enqueue_style('media-responsive', get_template_directory_uri().'/css/media-responsive.css');
		wp_enqueue_style('docs', get_template_directory_uri().'/css/docs.css');

	
		// following js requirement all pages
		wp_enqueue_script('bootstrapmin',get_template_directory_uri().'/js/menu/bootstrap.min.js',array('jquery')); //Responsive JS
		wp_enqueue_script('menu',get_template_directory_uri().'/js/menu/menu.js'); //Menu JS			 
		wp_enqueue_script('bootstrap-transition',get_template_directory_uri().'/js/bootstrap-transition.js');
		wp_enqueue_script('bootstrap-tab',get_template_directory_uri().'/js/bootstrap-tab.js');
		wp_enqueue_script('accordian',get_template_directory_uri().'/js/bootstrap-accordian.js'); // service tamplate
		
		wp_enqueue_script('webriti-tab-js', get_template_directory_uri().'/js/webriti-tab-js.js'); // Webriti tab js
		
		
		
		//font page js 
		if(is_front_page())
		{	wp_enqueue_style('flexslider', get_template_directory_uri().'/css/flex_css/flexslider.css');
			wp_enqueue_script('flex',get_template_directory_uri().'/js/flex_slider/jquery.flexslider.js'); //front page
			wp_enqueue_script('flex',get_template_directory_uri().'/js/application.js');
		}
		
		//font page and service template
		if(is_front_page() || is_page_template('service-template.php') )
		{	
			wp_enqueue_script('carufredsel',get_template_directory_uri().'/js/carufredsel/jquery.carouFredSel-6.0.4-packed.js');
		}
		
		
		//potfolio	
		if(is_page_template('portfolio-2-column.php') || is_page_template('portfolio-3-column.php') || is_page_template('portfolio-4-column.php') || is_tax('project_categories'))
		{
			wp_enqueue_script('prettyPhotojs',get_template_directory_uri().'/js/lightbox/jquery.prettyPhoto.js');
			wp_enqueue_style('main', get_template_directory_uri().'/css/lightbox/main.css');
			wp_enqueue_style('prettyPhotocss', get_template_directory_uri().'/css/lightbox/prettyPhoto.css');
		}
		
		if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
		
		//blog 	
		if(is_page_template('blog.php')){
			wp_enqueue_style('tooltip', get_template_directory_uri().'/css/css-tooltips.css');
		}
	}
	add_action( 'wp_enqueue_scripts', 'busiprof_scripts' );
	
	
	function busiprof_shortcode_detect() {
    global $wp_query;	
    $posts = $wp_query->posts;
    $pattern = get_shortcode_regex();
	//print_r($pattern); die;
	foreach ($posts as $post){
        if (   preg_match_all( '/'. $pattern .'/s', $post->post_content, $matches ) && array_key_exists( 2, $matches ) && in_array( 'portfolio', $matches[2] ) ) {
			wp_enqueue_script('prettyPhoto',get_template_directory_uri().'/js/lightbox/jquery.prettyPhoto.js',array('jquery'));
			wp_enqueue_script('short_code',get_template_directory_uri().'/js/lightbox/shortcode_light.js');
			wp_enqueue_style('main', get_template_directory_uri().'/css/lightbox/main.css');
			wp_enqueue_style('prettyPhoto', get_template_directory_uri().'/css/lightbox/prettyPhoto.css');
			 
        }
    }
	}
	add_action( 'wp', 'busiprof_shortcode_detect' );

?>