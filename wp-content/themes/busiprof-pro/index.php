<?php
/*
 *Theme Name	: BusiProf
 * @file           index.php
 * @package        Busiprof
 * @copyright      2013 Webriti
 * @license        license.txt
 * @filesource     wp-content/themes/Busiprof/index.php
*/
	get_header();
	get_template_part('index', 'bannerstrip');
	$image_uri=BUSI_TEMPLATE_DIR_URI. '/images' ;?>		
<div style="margin:0 10px 0;"><div class="container">
		<div class="row-fluid"> <!-- Blog Section -->
			<div class="<?php if( is_active_sidebar('sidebar-primary')) { echo 'span8'; } else { echo 'span12'; } ?> blog_left">							
				<?php global $more;
						$more = 0;
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$args = array( 'post_type' => 'post','paged'=>$paged);	
						$post_type = new WP_Query( $args );
						query_posts( $args );
						while(have_posts()):the_post();	?>
				<div class="blog_section" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>				
					<div class="blog_left_img">
					<label class="john_bg" ><a data-tip="<?php the_author() ;?>" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?></a></label>
				</div> 
			   <h2 class="blog_section_title">
				 <a href="<?php the_permalink(); ?>"title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h2>
				<!--Link Section-->
				<div class="blog_link">
					<span><img src="<?php echo $image_uri. '/blog_ic.png' ?>">&nbsp;&nbsp;<?php the_time('M j,Y');?></span> 
					<span><a><img  src="<?php echo $image_uri. '/blog_ic2.png'?>">&nbsp;&nbsp;<?php  comments_popup_link( __( 'Leave a comment', 'busi_prof' ) ); ?></a></span>
					<span><a><img class="post-cate" src="<?php echo $image_uri. '/blog_ic3.png'?>"><?php the_category(',  '); ?></a></span>
				</div>
				<!--Link Section-->
				<?php if(has_post_thumbnail()):?>
				<div class="blog_section_img"><a  href="<?php the_permalink(); ?>"title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?>
				</a></div>
					<?php endif;?>
					<div class="blog_con_mn">
						<?php  the_content( __( 'Read More' , 'busi_prof' ) ); ?>
					</div>
					<div class="blog_bot_mn">
					<span><?php the_tags('<b>'.__('Tags:','busi_prof').'</b>','');?></span>
					</div>				
				</div>	
			<?php endwhile ?>
			<?php	$Webriti_pagination = new Webriti_pagination();
					$Webriti_pagination->Webriti_page($paged, $post_type); ?>
             </div>	
			 <?php get_sidebar();?>
		</div>	
	</div></div>			
<?php  get_footer();?>