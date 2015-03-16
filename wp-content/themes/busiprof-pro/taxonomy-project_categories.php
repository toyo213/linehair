<?php
get_header ();
get_template_part('index', 'bannerstrip');
 ?>
<?php require_once( BUSI_THEME_FUNCTIONS_PATH . '/scripts/portfolio-script.php' ); ?>
<?php $current_options=get_option('busiprof_pro_theme_options'); ?>

<!-- Container -->
<div class="container">
		<div class="row">
			<div class="row service_section">
					<?php $k=1;
					while( have_posts() ) : the_post(); ?>
                        <?php if($current_options['taxonomy_portfolio_list']==2) { ?>
						<div class="span6 rec_cols_mn">											
							<?php if(has_post_thumbnail()):?>
							<?php  $post_thumbnail_id = get_post_thumbnail_id();
								   $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );	 ?>
							<a class="hover_thumb" rel="lightbox[group]" href="<?php echo $post_thumbnail_url; ?>"><?php the_post_thumbnail('portfolio-2c-thumb'); ?></a> 
							<?php endif; ?>
							<h3><a href="<?php echo get_post_meta( get_the_ID(),'project_link', true ); ?>" <?php if(get_post_meta( get_the_ID(),'project_target', true )) { echo "target='_blank'"; } ?> > <?php the_title(); ?></a></h3>
							<p><?php echo get_post_meta( get_the_ID(),'project_title_description', true ); ?></p>
						</div>
						<?php } ?>
						
						<?php if($current_options['taxonomy_portfolio_list']==3) { ?>
							<div class="span4 rec_cols_mn">											
							<?php if(has_post_thumbnail()):?>
							<?php  $post_thumbnail_id = get_post_thumbnail_id();
								   $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );	 ?>
							<a class="hover_thumb" rel="lightbox[group]" href="<?php echo $post_thumbnail_url; ?>"><?php the_post_thumbnail('portfolio-2c-thumb'); ?></a> 
							<?php endif; ?>
							<h3><a href="<?php echo get_post_meta( get_the_ID(),'project_link', true ); ?>" <?php if(get_post_meta( get_the_ID(),'project_target', true )) { echo "target='_blank'"; } ?> > <?php the_title(); ?></a></h3>
							<p><?php echo get_post_meta( get_the_ID(),'project_title_description', true ); ?></p>
							</div>
						<?php } ?>
						
						<?php if($current_options['taxonomy_portfolio_list']==4) { ?>
							<div class="span3 rec_cols_mn">											
								<?php if(has_post_thumbnail()):?>
								<?php  $post_thumbnail_id = get_post_thumbnail_id();
									   $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );	 ?>
								<a class="hover_thumb" rel="lightbox[group]" href="<?php echo $post_thumbnail_url; ?>"><?php the_post_thumbnail('portfolio-2c-thumb'); ?></a> 
								<?php endif; ?>
								<h3><a href="<?php echo get_post_meta( get_the_ID(),'project_link', true ); ?>" <?php if(get_post_meta( get_the_ID(),'project_target', true )) { echo "target='_blank'"; } ?> > <?php the_title(); ?></a></h3>
								<p><?php echo get_post_meta( get_the_ID(),'project_title_description', true ); ?></p>
							</div>
						<?php } ?>
					
				
				 <?php if($k%$current_options['taxonomy_portfolio_list']==0) { echo "<div class='clearfix'></div>"; } $k++; endwhile; ?>
					  </div>
			<?php wp_reset_query(); ?>
				
		</div>
	</div>
<!-- /Container -->	
<?php get_footer(); ?>