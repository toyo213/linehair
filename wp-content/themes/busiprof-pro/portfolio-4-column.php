<?php
//Template Name:	portfolio-4-column 
/*	* @Theme Name	:	BusiProf
	* @file         :	portfolio-4-column.php
	* @package      :	Busiprof
	* @author       :	Hari Maliya
	* @license      :	license.txt
	* @filesource   :	wp-content/themes/Busiprof/portfolio-4-column.php
*/
get_header ();
get_template_part('index', 'bannerstrip');
?>
<?php require_once( BUSI_THEME_FUNCTIONS_PATH . '/scripts/portfolio-script.php' ); ?>
<?php $current_options=get_option('busiprof_pro_theme_options'); ?>
<!-- Container -->
	<div style="margin:0 10px 0;"><div class="container">
		<div class="portfolio_tab">
				<h2><?php if( $current_options['protfolio_tag_line']!='')
					{ echo $current_options['protfolio_tag_line']; } else {?>
					<?php _e('Recent Portfolio','busi_prof');  } ?>
					<br /><span>
					<?php if( $current_options['protfolio_description_tag']!='')
					{ echo $current_options['protfolio_description_tag'];  } else {?><?php _e('Display Portfolio in a Responsive Four Column Layout','busi_prof');  } ?> </span></h2>
		</div>
		<div class="row">
		<?php 	//$args = array( 'post_type' => 'busiprof_portfolio','posts_per_page' =>8,) ; 	
				global $paged;
				$j=1;
				$curpage = $paged ? $paged : 1;
				$args = array(
					'post_type' => 'busiprof_portfolio',
					'posts_per_page' => 8,
					'paged' => $paged
				);
				$portfolio = new WP_Query( $args );
				if( $portfolio->have_posts() )
				{	while ( $portfolio->have_posts() ) : $portfolio->the_post();
				?>	<div class="span3 port_cols_mn">
						<?php if(has_post_thumbnail()):?>
						<?php 	$post_thumbnail_id = get_post_thumbnail_id();
								$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );	 ?>
						<a class="hover_thumb" rel="lightbox[group]" href="<?php echo $post_thumbnail_url; ?>"><?php the_post_thumbnail(); ?></a>
						<?php endif; ?>
						<?php
						if(get_post_meta( get_the_ID(),'portfolio_link', true )) 
						{ $portfolio_link=get_post_meta( get_the_ID(),'portfolio_link', true ); }
						else { $portfolio_link = get_post_permalink(); } 
						?>
						<h3><a href="<?php echo  $portfolio_link; ?>" <?php if(get_post_meta( get_the_ID(),'portfolio_target', true )) { echo "target='_blank'"; } ?> ><?php echo the_title(); ?></a></h3>
						<p><?php echo  get_post_meta( get_the_ID(),'portfolio_description', true ); ?></p>
					</div>
					<?php if($j%4==0){ echo "<div class='clearfix'></div>"; } $j++; 	endwhile;  
					$count_posts_4c = wp_count_posts('busiprof_portfolio')->publish;
						if($count_posts_4c > 8) {
							$Webriti_pagination = new Webriti_pagination();
							$Webriti_pagination->Webriti_page($paged, $portfolio);
						} else {
						 /*No Pagination*/
						}
					wp_reset_postdata(); 
				} else {
					for($dp=1; $dp<=6; $dp++) { ?>
					<div class="span3 port_cols_mn">
						<a class="hover_thumb" rel="lightbox[group]" href="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/img_ho.png"><img style="width: 100%" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/img_ho.png"></a>
						<h3><a href="#"><?php _e('Business Cards','busi_prof'); ?></a></h3>
						<p><?php _e('Graphic Design','busi_prof'); ?> &amp; <?php _e('Web Design','busi_prof');?>.</p>
					</div><?php
					} ?>
					<div class="pagination_blog">	
						<ul>
							<li class="paginanext"><a href="#"><?php _e('Prev','busi_prof');?></a></li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li class="paginanext"><a href="#"><?php _e('Next','busi_prof');?></a></li>
						</ul>
					</div>
				<?php
				} // end of portfolio ?>
		</div>
		<!--Seperator--><div class="row portfolio-seperator"></div><!--/Seperator-->		
	</div></div>
<!-- /Container -->	
<?php get_footer(); ?>