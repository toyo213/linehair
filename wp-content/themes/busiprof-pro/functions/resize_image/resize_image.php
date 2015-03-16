<?php
 if ( function_exists( 'add_image_size' ) ) 
 { 
	add_image_size('home_slide',1600,500,true);
	add_image_size('home_service',34,44,true);
	add_image_size('home_testimonial',80,80,true);	
	add_image_size('client_script_image',140,60,true);

	//About image size
	add_image_size('aboutus_img',350,225,true);
	add_image_size('about_team_img',160,160,true);
	
	// image size preset for post feature image
	add_image_size('post_feature_image_thumb',80,60,true);
	add_image_size('post_feature_recent_image_thumb',80,80,true);
}
// code for home slider post types 
add_filter( 'intermediate_image_sizes', 'busiprof_image_presets');
function busiprof_image_presets($sizes){

   $type = get_post_type($_REQUEST['post_id']);
	
    foreach($sizes as $key => $value){
    	if($type =='post'  &&  $value != 'post_feature_image_thumb' && $value != 'post_feature_recent_image_thumb')
		{	unset($sizes[$key]);	}	
		else  if($type=='aboutus_img')
		{   unset($sizes[$key]);	}
		else  if($type=='about_team_img')
		{   unset($sizes[$key]);	}
		else  if($type=='busiprof_slider'  &&  $value != 'home_slide' )
		{   unset($sizes[$key]);	}
		else   if($type=='busiprof_service'  &&  $value != 'home_service' )
		{   unset($sizes[$key]);	}
		else   if($type=='busiprof_testimonial'   &&  $value != 'home_testimonial' )
		{	unset($sizes[$key]);	}	
		else  if($type=='busiprof_testimonial'   &&  $value != 'home_testimonial' )
		{	unset($sizes[$key]);	}
		else  if($type=='busiprof_clientstrip'	&&	$value != 'client_script_image')
		{	 unset($sizes[$key]);	}		
    }
    return $sizes;
}
?>