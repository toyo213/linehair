<?php
/***Theme Name	: BusiProf
	
 * @file           search.php
 * @package        Busiprof
 * @author         Priyanshu Mittal
 * @copyright      2013 Webriti
 * @license        license.txt
 * @filesource     wp-content/themes/Busiprof/search.php
 * 

 */
	get_header();
	get_template_part('index', 'bannerstrip');
	$image_uri=get_template_directory_uri(). '/images' ; ?>
<div class="container"> <!-- Main --> 
	<div class="row-fluid">
          <div class="<?php if( is_active_sidebar('sidebar-primary')) { echo 'span8'; } else { echo 'span12'; } ?> blog_left">
			<?php if ( have_posts() ) : ?>
			
				<?php while ( have_posts() ) : the_post(); ?>
			<div class="blog_section" id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
			<h2 class="blog_section_title" style="margin-bottom: 10px;" ><?php printf( __( 'Search Results for: %s', 'busi_prof' ), get_search_query() ); ?></h2>	
				<?php if(has_post_thumbnail()):?>				
				<a href="<?php the_permalink(); ?>"title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
				<?php endif;?>              
				<div class="blog_link">
					<span><img src="<?php echo $image_uri. '/blog_ic.png' ?>">&nbsp;&nbsp;<?php the_time('M j,Y');?></span> 
					<span><a><img  src="<?php echo $image_uri. '/blog_ic2.png'?>">&nbsp;&nbsp;<?php  comments_popup_link( __( 'Leave a comment', 'busi_prof' ) ); ?></a></span>
					<span><a><img class="post-cate" src="<?php echo $image_uri. '/blog_ic3.png'?>"><?php the_category(',  '); ?></a></span>
				</div>
				<h2 class="blog_section_title"><a href="<?php the_permalink(); ?>"title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="blog_con_mn">					
					<?php  the_content( __( 'Read More' , 'busi_prof' ) ); ?>
				</div>				
            </div>
	<?php endwhile; ?>
	<?php else : ?>
		<!--<article id="post-0" class="post no-results not-found">-->
					<div class="">
						<h2><?php _e( "Nothing Found", 'busi_prof' ); ?></h2>
						<p><?php _e( "Sorry, but nothing matched your search criteria. Please try again with some different keywords.", 'busi_prof' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .blog_con_mn -->
			<?php endif; ?>
		</div>
<?php get_sidebar();?>
</div>
</div>	
<?php  get_footer() ?>