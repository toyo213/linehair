<?php  get_header();
	get_template_part('index', 'bannerstrip');
	$image_uri=BUSI_TEMPLATE_DIR_URI. '/images' ;?>
<!-- Main_area -->
	<div class="container">
		<div class="row-fluid">
		
			<!-- Main_content -->
			<div class="<?php if( is_active_sidebar('sidebar-primary')) { echo 'span8'; } else { echo 'span12'; } ?> blog_left">
			
				<div class="blog_section" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php  the_post(); ?>
					
					
					<?php //$defalt_arg =array('class' => "blog_section_img" )?>
					<?php if(has_post_thumbnail()):?>
					<div class="blog_section_img">
					<?php  $post_thumbnail_id = get_post_thumbnail_id();
					 $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );	 ?>
					<a href="<?php echo $post_thumbnail_url; ?>"><?php the_post_thumbnail(); ?></a> 
					
					</div>
					<?php endif;?>
					<div class="blog_con_mn">
					<p><?php echo  get_post_meta( get_the_ID(),'portfolio_description', true ); ?></p>
					</div>
					
				</div>
				<?php if(wp_link_pages(array('echo'=>0))):?>
					<div class="pagination_blog"><ul><?php 
						$args=array('before' => '<li>', ' after' => '</li>');
						wp_link_pages($args); ?></ul>
					</div>
				<?php endif;?>								
			</div>
			<?php get_sidebar(); ?>
		</div>
</div>
<!-- Footer -->
<?php get_footer(); ?>