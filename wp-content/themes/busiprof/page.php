<?php 			
	get_template_part('banner','header');
	$image_uri=get_template_directory_uri(). '/images' ;
?>
<div class="container">
	<div class="row-fluid">
       <div class="<?php if( is_active_sidebar('sidebar-primary')) { echo "span8"; } else { echo "span12"; } ?> blog_left"> 		 
		  <?php 	global $more;
					$more = 0;
					the_post(); ?>
			<div class="blog_section">		
			       <h2 class="blog_section_title"><a><?php the_title(); ?></a></h2>				   
				<div class="blog_link">
						
						
					</div>				   
			  <?php $defalt_arg =array('class' => "blog_section_img" )?>
				<?php if(has_post_thumbnail()):?>
				<a  href="<?php the_permalink(); ?>"title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('', $defalt_arg); ?>
				</a>
			 <?php endif;?>
				<div class="blog_con_mn"> <?php  the_content( __( 'Read More' , 'busi_prof' ) ); ?></div>
				<div class="blog_bot_mn"><span><?php the_tags('<b>'.__('Tags:','busi_prof').'</b>','');?></span></div>
				<?php if(wp_link_pages(array('echo'=>0))):?>
						<div class="pagination_blog"><ul><?php 
							$args=array('before' => '<li>', ' after' => '</li>');
							wp_link_pages($args); ?></ul>
						</div>
					<?php endif;?>
					<?php comments_template( '', true );?>
			</div>				
		</div>
		<?php get_sidebar();?>
	</div>
</div>
<?php get_footer();?>