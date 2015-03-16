<?php //Template Name: About Us 
  
get_header ();
get_template_part('index', 'bannerstrip');
?>
<div style="margin:0 10px 0;"><div class="container blank_space">					
	<div class="row about_top_mn"><div class="span12">
		<div class="media">			  
			<?php if(has_post_thumbnail()){?>
			<a class="pull-left" href="<?php the_permalink();?>"><?php the_post_thumbnail('aboutus_img'); ?></a>
			<?php } else { ?>
			<a class="pull-left" href="#">
				<img src="<?php echo BUSI_TEMPLATE_DIR_URI . '/images/about.jpg'?>"  class="media-object img-polaroid about_main_def_img">
			</a>
			<?php  } 						
			the_post();?>		
			<div class="media-body">
				<h2 class="about_top_tile"><?php _e('Welcome to','busi_prof');?> <span><?php the_title(); ?></span></h2>
				<p><?php the_content() ;?></p>
			 </div>
		</div>
	</div></div>
	
	<!-- Sapeator --><div class="row"><div class="span12"><div class="about_border_row"></div></div></div><!-- /Sapeator -->
	
	<!-- About Section -->
	<div class="row cont_space">		
		<?php  $arg = array( 'post_type' => 'busiprof_team', 'posts_per_page'=> 4);
				$team = new WP_Query( $arg ); 				
				if($team->have_posts())
				{
					$i=1;
					while ( $team->have_posts() ) : $team->the_post();	?>						
		<div class="span6 about_cols">
				<div class="about_cols_img">
				<?php $twitter_url = sanitize_text_field( get_post_meta( get_the_ID(),'twitter_url', true ));  ?>
					<?php if ($twitter_url !='') { ; ?>
					<div class="twitter_about"><a href="<?php echo $twitter_url ?>">&nbsp;</a></div>
					<?php } else { ;?>
					<div class="twitter_about"><a href="#">&nbsp;</a></div>
					<?php } ;?>
					
					<div>
						<?php $defalt_arg =array('class' => "aboutroundimg about_cols_img_mid" )?>
						<?php if(has_post_thumbnail()):?>
						<?php the_post_thumbnail('about_team_img', $defalt_arg); 
						 endif ;?>
					</div>
					<?php $team_fb_url = sanitize_text_field(get_post_meta(get_the_ID(),'fb_url',true)); ?>
					<?php if (isset($team_fb_url)) {?>
					<div class="facebook_about"><a href="<?php echo $team_fb_url ?>">&nbsp;</a></div>
					<?php } else { ?>
					<div class="facebook_about"><a href="#">&nbsp;</a></div>
					<?php } ?>
					<?php $team_linked_url = sanitize_text_field (get_post_meta(get_the_ID(),'linked_url',true)); ?>
					<?php if(isset($team_linked_url)) {?>
					<div class="rss_about"><a href="<?php echo $team_linked_url ;?>">&nbsp;</a></div>
					<?php } else {?>
					<div class="rss_about"><a href="#">&nbsp;</a></div>
					<?php }?>
				</div>
				<div class="about_cols_con">
					<?php $team_designation = sanitize_text_field( get_post_meta( get_the_ID(), 'busi_designation', true )); ?>
						<h2><?php the_title() ;?><span><?php echo "(".$team_designation.")" ;?></span></h2>
					<?php $team_description = sanitize_text_field( get_post_meta( get_the_ID(), 'busi_desc', true )); ?>	
					<p><?php echo $team_description ;?></p>
				</div>
				<!-- Seperator --><div class="about_border_row"></div><!-- /Seperator -->				
		</div>		
		
		<?php $i++; endwhile; ?>
		<?php	} else {  
		require_once('default-team.php');  
		} ?>		
	</div>
</div>
</div>
<?php get_footer(); ?>