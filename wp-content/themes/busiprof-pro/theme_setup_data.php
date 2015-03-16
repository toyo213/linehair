<?php
/*---------------------------------------------------------------------------------*
 * @file           theme_stup_data.php
 * @package        Busiprof
 * @copyright      2013 Appointment
 * @license        license.txt
 * @filesource     wp-content/themes/Busiprof/theme_setup_data.php
 *	Admin  & front end defual data file 
 *-----------------------------------------------------------------------------------*/ 
	function theme_data_setup()
	{
		$template_uri=BUSI_TEMPLATE_DIR_URI. '/images/default/' ;		
		return $busiprof_pro_theme_options=array(
			'front_page'  => 'yes',
			//Logo and Fevicon
			'upload_image'=>'',
			'height'=>'40',
			'width'=>'115',
			'upload_image_favicon'=>'',
			'intro_tag_line' => __('Backend as a Service Plateform for Any App Developer','busi_prof')  ,
			
			'home_banner_strip_enabled'=>'on',
			'home_page_slider_enabled'=>'on',			
			'home_service_section_enabled'=>'on',
			'home_project_section_enabled'=>'on',
			'home_testimonial_section_enabled'=>'on',
			'home_recentblog_section_enabled'=>'on',
			'footer_social_media_enabled'=>'on',
			'contact_google_map_enabled'=>'on',
			
			'front_page_data'=>array('slider','Service Section','Project Section','Testimonials section','Client strip'),	
			
			
			//Slide Heading								
			'animation' => 'slide',
			'slide_direction' => 'horizontal',
			'animation_speed' => '1000',
			'slideshow_speed' => '2000',
			
			'client_strip'=>'yes',
			'client_strip_slide_speed'=>'2000',
			'client_strip_total' =>4,
			'busiprof_pro_custom_css' =>"",
			
			'protfolio_tag_line'=>'Recent Portfolio ',
			'protfolio_description_tag' =>"Portfolio for select your column webdesign & auto adjust ",
								
			'slider_readmore'=>'#',
			'service_list' => 4,
			'service_tag_line'=>__('Awesome Services','busi_prof'),
			'service_tag_desciption'=>__('We are a group of passionate designers and developers who really love to create awesome wordpress themes & support','busi_prof'),
			'read_more_btn_enabled' => 'on',
			'service_readmore_button'=>__('More services','busi_prof'),
			'service_readmore_link'=>'#',
			'protfolio_tag_line' => 'Portfolio for select your column webdesign',
			'protfolio_description_tag'=>'Recent Portfolio',
			'project_tag_line'=>'Recent Projects ',
			'project_tag_desciption'=>'We are a group of passionate designers and developers who really love to create awesome wordpress themes & support',
			
			'testimonial_head' => __('Testimonials','busi_prof'),
			'testimonial_tagline' => __('We are a group of passionate designers & developers','busi_prof'),
			'blog_head' =>__('Recent Blog','busi_prof'),
			'blog_tagline' =>__('We are a group of passionate designers & developers','busi_prof'),
			
			'footer_copyright_text'=> '<p>All Rights Reserved by BusiProf. Designed and Developed by <a href="http://www.webriti.com/" target="_blank">Wordpress Theme</a>.</p>',
			
			'footer_twitter_link' =>"#",
			'footer_facebook_link' =>"#",
			'footer_linkedin_link' =>"#",	
			
			//contact page settings
			'contact_address_1'=>'378 Kingston Court',
			'contact_address_2'=>'West New York, NJ 07093',
			'contact_number'=>'973-960-4715',
			'contact_fax_number'=>'0276-758645',
			'contact_email'=>'info@busiprof.com',
			'contact_website'=>'https://www.busiprof.com',
			'google_map_url' => 'https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Kota+Industrial+Area,+Kota,+Rajasthan&amp;aq=2&amp;oq=kota+&amp;sll=25.003049,76.117499&amp;sspn=0.020225,0.042014&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Kota+Industrial+Area,+Kota,+Rajasthan&amp;z=13&amp;ll=25.142832,75.879538',
			
			//Post Type slug Options
			'busiprof_slider_slug' => 'busiprof-slider',
			'busiprof_service_slug' => 'busiprof-service',
			'busiprof_project_slug' => 'busiprof-project',
			'busiprof_testimonial_slug' => 'busiprof-testimonial',
			'busiprof_team_slug' => 'busiprof-team',
			'busiprof_portfolio_slug' => 'busiprof-portfolio',
			
			//Taxonomy Archive Setting
			'taxonomy_portfolio_list' => 2
			
		);
		$current_theme_options = get_option('busiprof_pro_theme_options'); 		
		if($current_theme_options)
		{ 	
			$busiprof_pro_theme_options = array_merge($busiprof_pro_theme_options, $current_theme_options);
			update_option('busiprof_pro_theme_options',$busiprof_pro_theme_options);				
		}
		else
		{
			add_option('busiprof_pro_theme_options',$busiprof_pro_theme_options); 
		}
	}
?>