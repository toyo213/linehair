<?php 			
/*
	*Theme Name	: BusiProf
	
 * @file           page.php
 * @package        Busiprof
 * @author         Priyanshu Mittal
 * @copyright      2013 Webriti
 * @license        license.txt
 * @filesource     wp-content/themes/Busiprof/page.php
*/
	get_header();
	get_template_part('index', 'bannerstrip');
	$image_uri=get_template_directory_uri(). '/images';
?>
<div class="container">
	<div class="row-fluid">
        <div class="<?php if( is_active_sidebar('sidebar-primary')) { echo 'span8'; } else { echo 'span12'; } ?> blog_left"> 	
			  <?php 	global $more;
						$more = 0;
						the_post(); ?>
				<div class="blog_section">		   
			 
				<?php if(has_post_thumbnail()):?>
				<div style="margin-top:0px;" class="blog_section_img"><a  href="<?php the_permalink(); ?>"title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?>
				</a></div>
			 <?php endif;?>
			 <div class="blog_con_mn">
			 <?php  the_content( __( 'Read More' , 'busi_prof' ) ); ?>
			 </div>
			<div class="blog_bot_mn">
					<span><?php the_tags('<b>'.__('Tags:','busi_prof').'</b>','');?></span>
			</div>
			<?php if(wp_link_pages(array('echo'=>0))):?>
					<div class="pagination_blog"><ul><?php 
						$args=array('before' => '<li>', ' after' => '</li>');
						wp_link_pages($args); ?></ul>
					</div>
				<?php endif;?>


<div class="fb-like" data-href="<?php the_permalink()?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>


				<?php comments_template( '', true );?>
			</div>			
		</div>

<?php get_sidebar();?>
</div>
</div>
<?php get_footer();?>