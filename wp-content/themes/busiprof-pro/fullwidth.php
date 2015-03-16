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
//Template Name: FullWIdth
			
	get_header();
	get_template_part('index', 'bannerstrip');	 
	$image_uri=get_template_directory_uri(). '/images' ;
?>
<div class="container blank_space"><!-- Main --> 	
	<div class="row-fluid cont_space">
			  <?php 	global $more;
						$more = 0;
						the_post(); ?>
				
			    <div class="span12 fullwidth-area">		
			    <?php $defalt_arg =array('class' => "blog_section_img" )?>
				<?php if(has_post_thumbnail()):?>
				<a  href="<?php the_permalink(); ?>"title="<?php the_title(); ?>"><?php the_post_thumbnail('', $defalt_arg); ?>
				</a>
			 <?php endif;?>
				</div>
		
			  
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
				
			</div>
</div>
</div>
<?php get_footer();?>