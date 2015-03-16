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
					<h2 class="blog_section_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="blog_link">
					<span><img src="<?php echo $image_uri. '/blog_ic.png' ?>">&nbsp;&nbsp;<?php the_time('M j,Y');?></span> 
					<span><a><img  src="<?php echo $image_uri. '/blog_ic2.png'?>">&nbsp;&nbsp;<?php  comments_popup_link( __( 'Leave a comment', 'busi_prof' ) ); ?></a></span>
					<span><a><img class="post-cate" src="<?php echo $image_uri. '/blog_ic3.png'?>"><?php the_category(',  '); ?></a></span>
				</div>
					<?php if(has_post_thumbnail()):?>
					<div class="blog_section_img">
					<a href="<?php the_permalink(); ?>"title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
					</div>
					<?php endif;?>

					 <div class="blog_con_mn">
					<?php  the_content( __( 'Read More' , 'busi_prof' ) ); ?>
					</div>
					<?php comments_template( '', true );?>
				</div>



&nbsp;&nbsp;
<div class="fb-like" data-href="<?php the_permalink()?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>

<div class="blog_post_section"> <?php next_post_link('%link','次の記事') ?> &nbsp;&nbsp;
<?php previous_post_link('%link','前の記事') ?>
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