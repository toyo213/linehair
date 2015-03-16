<?php 
/* 	* Template Name: Home
	*/
?>
<?php 
$current_options = get_option('busiprof_pro_theme_options');
if (  $current_options['front_page'] != 'yes' ) {
get_template_part('index');
}
else {
		get_header();
		
		/****** get slider template  ********/
		 		
		$data = $current_options['front_page_data'];		
		if($data) 
		{
			foreach($data as $key=>$value)
			{
				switch($value) 
				{
					
					case 'slider': 					
					/******  get service template ********/ 
					get_template_part('index', 'slider');
					break;
					
					case 'Service Section': 					
					/******  get service template ********/ 
					get_template_part('index', 'service');
					break;
					
					
					case 'Project Section':
					/****** get index project  ********/
					get_template_part('index', 'project');						
					break;
					
					case 'Testimonials section': 			
					/****** get service template ********/ 
					get_template_part('index', 'testimonials');				
					break; 
					
					case 'Client strip': 			
					/****** get service template ********/ 
					get_template_part('index', 'clientstrip');					
					break; 								
				}	
			}
		} 
		get_footer();
}	
?>