<?php $current_options=get_option('busiprof_pro_theme_options'); ?>
<?php require( BUSI_THEME_FUNCTIONS_PATH . '/scripts/indexslider-script.php' ); ?>
<?php if($current_options['home_banner_strip_enabled']=='on') { ?>
<div class="header_top_slide">
	<div class="container"><?php if( $current_options['intro_tag_line']!=''){?><?php echo $current_options['intro_tag_line'] ;?><?php } else { ?><?php _e('Backend as a Service Plateform for Any App Developer','busi_prof') ;?>
	<?php }?>
	</div>
</div>
<?php } ?>
<?php if($current_options['home_page_slider_enabled']=='on') { ?>
<div class="main_slider">
	<div class="flexslider">
        <div class="flex-viewport" style="overflow: hidden; position: relative;">
			<ul class="slides">		
				<?php 
				$count_posts = wp_count_posts( 'busiprof_slider')->publish;
				$args = array( 'post_type' => 'busiprof_slider','posts_per_page' =>$count_posts) ; 	
				$slider = new WP_Query( $args ); 
				if( $slider->have_posts() )
				{
					while ( $slider->have_posts() ) : $slider->the_post();?>
					<li>
							<?php if(has_post_thumbnail()):?>
							<?php the_post_thumbnail('home_slide'); ?>
							<?php endif;?>
							<?php
							$img_description = sanitize_text_field( get_post_meta( get_the_ID(),'image_description', true )); 
							$readmorelink = sanitize_text_field( get_post_meta( get_the_ID(),'readmore_link', true )) ;
							$readmore_button = sanitize_text_field( get_post_meta( get_the_ID(),'readmore_button', true )) ;
							?>
							<?php if($img_description) { ?>	
							<div class="banner_con">
								<h2><?php echo the_title(); ?></h2>
								<p><?php echo $img_description ;?></p>
								<?php if($readmore_button ) { ?>
								<a href="<?php echo $readmorelink ;?>" <?php if(get_post_meta( get_the_ID(),'readmore_link_target', true )) { echo "target='_blank'"; } ?> class="flex_btn">
								<?php echo $readmore_button ?>
								</a>
								<?php } ?>
							</div>
							<?php } ?>
					</li>
					<?php 	endwhile;  
				}   else {
						for($i=1; $i<=2; $i++) { ?>
						<li class="clone" >
							<img src="<?php echo BUSI_TEMPLATE_DIR_URI .'/images/slide1.png' ?>">
							<div class="banner_con">
								<h2><?php _e("Simpler Landing",'busi_prof');?></h2>								
								<p><?php _e("We are a group of passionate designers and developers who really love to create awesome wordpress themes with amazing support and cooles video documentations....",'busi_prof');?></p>
								<a href="#" class="flex_btn"><?php _e("Read More",'busi_prof');?></a>							
							</div>
						</li>
					<?php	} } ?>
			</ul>
		</div>	
	</div>
</div>
<?php } ?>