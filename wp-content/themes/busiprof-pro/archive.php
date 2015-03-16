<?php 
/**Theme Name	: BusiProf
 * @file           achive.php
 * @package        Busiprof
 * @author         Priyanshu Mittal
 * @copyright      2013 Webriti
 * @license        license.txt
 * @filesource     wp-content/themes/Busiprof/archive.php
*/
?>
<?php   get_header();
//get_template_part('index', 'bannerstrip'); ?>
<?php $image_uri=get_template_directory_uri(). '/images' ; ?>
 <div class="inner_top_mn">
	<div class="container">
		<div class="row-fluid about_space">
			<h2 class="about_head pull-left"><?php if ( is_day() ) : 						 
						  _e( "Daily Archives: ", 'busi_prof' ); echo (get_the_date()); 
						 elseif ( is_month() ) : 
							 _e( "Monthly Archives: ", 'busi_prof' ); echo (get_the_date( 'F Y' )); 
						 elseif ( is_year() ) : 
						 _e( "Yearly Archives: ", 'busi_prof' );  echo (get_the_date( 'Y' )); 
						else : 
							 _e( "Blog Archives: ", 'busi_prof' ); 		 
						 endif; ?>
						 <br /><span><?php bloginfo('description');?></span></h2>
			<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="search_box">
					<input type="text"name="s" placeholder=<?php _e( 'Search', 'busi_prof' ); ?> class="search_input" id="appendedInputButton">
					<input type="button" class="search_btn" value="">
				</div>
			</form>
		</div>
	</div>
</div>


<div class="container">
	<div class="row-fluid">
		<div class="<?php if( is_active_sidebar('sidebar-primary')) { echo 'span8'; } else { echo 'span12'; } ?> blog_left">
			
					   
                <!--page_blog_row_mn-->
                <?php   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$archive_id=get_query_var('m');
				$args = array( 'post_type' => 'post','paged'=>$paged,'m' => $archive_id);
				$post_type_data = new WP_Query( $args );
				while($post_type_data->have_posts()):
				$post_type_data->the_post();
					global $more;
					$more = 0; ?>
					<div class="blog_section">
                 <h2 class="blog_section_title">
					 <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to ', 'busi_prof' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php $title = get_the_title();
					if (strlen($title) == 0)  _e('no title','busi_prof'); 
					else  echo $title; ?>
					</a>
				</h2>
				<div class="blog_link">
					<span><img src="<?php echo $image_uri. '/blog_ic.png' ?>">&nbsp;&nbsp;<?php the_time('M j,Y');?></span> 
					<span><a><img  src="<?php echo $image_uri. '/blog_ic2.png'?>">&nbsp;&nbsp;<?php  comments_popup_link( __( 'Leave a comment', 'busi_prof' ) ); ?></a></span>
					<span><a><img class="post-cate" src="<?php echo $image_uri. '/blog_ic3.png'?>"><?php the_category(',  '); ?></a></span>
				</div>
				<?php if(has_post_thumbnail()):?>					
		
					<div class="blog_section_img"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
					<?php the_post_thumbnail();?>
					</a></div>
			
				<?php endif;?>					
				<div class="blog_con_mn">					
					<?php  the_content( __( 'Read More' , 'busi_prof' ) ); ?>
				</div></div>	
				<?php endwhile;?>
				   	<?php	$Webriti_pagination = new Webriti_pagination();
					$Webriti_pagination->Webriti_page($paged, $post_type_data);		?>
			 
		</div>
		<?php get_sidebar();?>
	</div><!--blog_right_bg_mn_con-->
</div><!--page_wi-->
<?php get_footer();?>