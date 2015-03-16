<?php  $current_options=get_option('busiprof_pro_theme_options'); ?>
<!-- Testimonials & Recent Blogs -->
	<div style="margin:0 10px 0;">
	<div class="container">
		<div class="row" style="margin-bottom: 15px;">
		<?php if($current_options['home_testimonial_section_enabled']=='on') { ?>
			<?php if($current_options['home_recentblog_section_enabled']=='off') { $span=12; } else { $span=6; } ?>
			<div class="span<?php echo $span; ?> testimonial_mn">
			<?php if($current_options['testimonial_head']!='') {?>
				<h2><?php echo $current_options['testimonial_head'] ; ?>
				<?php } else { ?>
				<?php _e('Testimonials','busi_prof');?>
				<?php } ?>
				<br>
				<span><?php if($current_options['testimonial_tagline']!='') { echo $current_options['testimonial_tagline'];  } else { ?>
				<?php _e("We are a group of passionate designers and developers who really love to create awesome wordpress themes &amp; support",'busi_prof');?>
				<?php  } ;?>
				</span>
				</h2>
				<?php
				$args = array( 'post_type' => 'busiprof_testimonial','posts_per_page' => 2,) ; 	
				$tesimonials = new WP_Query( $args ); 
				if( $tesimonials->have_posts() )
				{
				while ( $tesimonials->have_posts() ) : $tesimonials->the_post(); ?>	
				<div class="media" id="testimonial_mn_cols">
					<?php $defalt_arg =array('class' => "home_testimonial_img");?>
					<?php if(has_post_thumbnail()){?>
					<?php the_post_thumbnail('home_testimonial',$defalt_arg); 
					} else { ?>	
					<img class="home_testimonial_img"  src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/testimonial_img.png" style="width: 42px; height: 42px;" class="media-object img-circle pull-left img-polaroid">
					<?php } ;?>
					<div class="media-body">
					<?php $testimonial_description =  get_post_meta( get_the_ID(), 'testimonial_desc', true ); ?>
					<p><?php echo $testimonial_description; ?></p>					
					<?php 
					$testimonial_author_designation =  get_post_meta( get_the_ID(), 'author_designation', true ); 
					$testimonial_author_link =get_post_meta( get_the_ID(), 'author_link', true ) ;	?>					
					<a href="<?php echo $testimonial_author_link; ?>"  <?php if(get_post_meta( get_the_ID(),'author_link_target', true )) { echo "target='_blank'"; } ?> ><?php echo the_title(); ?>
					<span><?php echo "(".$testimonial_author_designation.")"; ?></span>
					</a>
					</div>
				</div>
				<?php endwhile;  
				} else {  for($i=1; $i<=2; $i++) { ?>
				<div class="media" id="testimonial_mn_cols">
					<img class="home_testimonial_img"  src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/default/testimonial.jpg">
					<div class="media-body">
					<p><?php _e('We are group of passionate designers and developers who really love to create awesome wordpress themes with amazing support & cooles video documentations....','busi_prof');?></p>
					<a href="#"><?php _e('Vibhor Purandare','busi_prof') ;?> <span><?php _e('(Theme Developer)','busi_prof');?></span></a>
					</div>
				</div>				
				<?php }  }?>
			</div>
			<?php } //end of home_testimonial_section_enabled  ?>
			<?php if($current_options['home_recentblog_section_enabled']=='on') { ?>
			<?php if($current_options['home_testimonial_section_enabled']=='off') { $span=12; } else { $span=6; } ?>
			<div class="span<?php echo $span; ?> recent_blog">
				<?php if($current_options['blog_head']!='') {?>
				<h2><?php echo $current_options['blog_head']; } else { ?>
					<?php _e('Recent Blog','busi_prof') ;?>
				<?php } ;?>
				<br/>
				<span><?php if($current_options['blog_tagline']!='') { echo $current_options['blog_tagline'];  } else { ?>
				<?php _e('We are a group of passionate designers and developers who really love to create awesome wordpress themes &amp; support','busi_prof'); 
				} ?>
				</span></h2>
				<div class="row">
				<?php 	$args = array( 'post_type' => 'post','posts_per_page' => 4,'post__not_in'=>get_option("sticky_posts")) ; 	
						query_posts( $args );
						if(query_posts( $args ))
					{	
						while(have_posts()):the_post();
					{ ?>
					
						<div class="span3">
							<div class="media" id="recent_blog_cols">
								 <?php $defalt_arg =array('class' => "home_testimonial_img");?>
								<?php if(has_post_thumbnail()){?>
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post_feature_recent_image_thumb',$defalt_arg);?></a>
								<?php } else { ?>	
								<a href="<?php the_permalink(); ?>"><img class="home_testimonial_img"  src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/default/testimonial.jpg"></a>
								<?php } ?>								
								<div class="media-body">
								<p><a href="<?php the_permalink(); ?>"><?php the_title() ;?></a></p>
								<span><?php echo get_the_date('M j,Y');?></span></a>
								
								</div>
							</div>
						</div>
					<?php } endwhile ;
					} else {	?>
					<div class="span3">
					<div class="media-body">
					<p><?php _e('No POST TO DISPLAY...','busi_prof');?></p>
					</div>
					</div>
					<?php } ;?>
				 </div>	
			</div>
			<?php } //end of home_recentblog_section_enabled ?>
		</div>
</div></div>