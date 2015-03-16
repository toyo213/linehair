<?php
/*	*
	* @Theme Name	:	BusiProf
	* @file         :	index-service.php
	* @package      :	Busiprof
	* @author       :	Hari Maliya
	* @license      :	license.txt
	* @filesource   :	wp-content/themes/Busiprof/index-service.php
*/
$current_options=get_option('busiprof_pro_theme_options'); ?>
<!-- Tagline & Service Section -->
<?php if($current_options['home_service_section_enabled']=='on') { ?>
<div style="margin:0 10px 0;"><div class="container">
		<div class="services_top_mn">
		<?php if( $current_options['service_tag_line']!='')
				{  $findme   = ' ';
					$pos =  strpos($current_options['service_tag_line'], $findme); 
					if($pos)
					{ echo "<h2>".substr($current_options['service_tag_line'],0,$pos)."<span>".substr($current_options['service_tag_line'],$pos)."</span></h2>"; }
					else
					{ echo "<h2>".$current_options['service_tag_line']."</h2>"; }
				} else {  ?>
					<h2><?php _e('Awesome','busi_prof'); ?> <span><?php _e('Services','busi_prof'); ?> </span></h2>
				<?php } ?>
			<?php if( $current_options['service_tag_desciption']!='') {?>
			<p><?php echo $current_options['service_tag_desciption'] ;?></p>
			<?php } else { ?>	
			<p><?php _e('We are a group of passionate designers and developers who really love to create awesome wordpress themes &amp; support' ,'busi_prof'); ?></p>
			<?php } ?>
		</div>		
		<div class="row service_section">	
		<?php 
		    $i=1;
		    $total_services = $current_options['service_list'];
			$args = array( 'post_type' => 'busiprof_service','posts_per_page' => $total_services); 	
			$service = new WP_Query( $args );
			
			if( $service->have_posts() )
			{	while ( $service->have_posts() ) : $service->the_post();
			    $link=1;
				?>		
				<div class="span3">
					<div class="services_cols_mn">
						<?php $service_icon_image =  get_post_meta( get_the_ID(),'service_icon_image', true ); ?>
						<?php $meta_service_description =  get_post_meta( get_the_ID(),'meta_service_description', true ); ?>
						<?php  
						   if(get_post_meta( get_the_ID(),'service_icon_link', true ))
						   $service_icon_link =  get_post_meta( get_the_ID(),'service_icon_link', true );
						   else 
						       $link=0;
						   ?>
						<span>
						<?php if($service_icon_image){?>
						<?php if($link==1) { ?>
						<a href="<?php echo $service_icon_link; ?>" <?php if(get_post_meta( get_the_ID(),'service_icon_target', true )) { echo "target='_blank'"; } ?> >
						<img alt="Web Design" src="<?php echo $service_icon_image; ?>" class="home_service" >
						</a>
						<?php } else { ?> <img alt="Web Design" style="border-radius:10px;" src="<?php echo $service_icon_image; ?>" class="home_service" >
						<?php } ?>
						<?php } else { ?>
						<img alt="Web Design" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/services_ic2.png" > 
						<?php } ?>
						</span>
						<?php if($link==1 ) {?>
						<a href="<?php echo $service_icon_link; ?>" <?php if(get_post_meta( get_the_ID(),'service_icon_target', true )) { echo "target='_blank'"; } ?> >
						<h2><?php echo the_title(); ?></h2></a>
						<?php  } else { ?> <h2><?php echo the_title(); ?></h2><?php } ?>
						<p><?php echo $meta_service_description ;?></p>
					</div>
				</div><?php if($i%4==0){	echo "<div class='clearfix'></div>";} $i++; endwhile;  
			} 
			else 
			{ for($totalservice=1; $totalservice<=4; $totalservice++)
				{ ?>
					<div class="span3">
							<div class="services_cols_mn">
								<span><img alt="Web Design" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/services_ic<?php echo $totalservice; ?>.png"></span>
								<h2><?php _e('Web Design','busi_prof'); ?></h2>
								<p><?php _e('We are a group of passionate designers and developers who really love to create awesome wordpress themes','busi_prof'); ?></p>
							</div>
					</div>	
			<?php } 
			} ?>
		</div>
		<?php
	    if($current_options['read_more_btn_enabled']=='on')
		{ ?> 
			<div class="services_more_btn">
					<?php if( $current_options['service_readmore_link']!='') 
							{ $link = $current_options['service_readmore_link']; }
							else { $link= "#"; }
					?>
					<a href="<?php echo $link; ?> ">
					<?php	if( $current_options['service_readmore_button']!='') 
							{ echo $current_options['service_readmore_button']; }
							else { _e('More services','busi_prof'); }
					?>
					</a>
			</div>
			<?php } else { ?>
			<div style="clear:both; height:80px;"></div>
			<?php } ?>
</div>
</div>
<?php } ?>