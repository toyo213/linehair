<?php
//Template Name:	service template 
/*	* @Theme Name	:	BusiProf
	* @file         :	service-template.php
	* @package      :	Busiprof
	* @author       :	Hari Maliya
	* @license      :	license.txt
	* @filesource   :	wp-content/themes/Busiprof/service-template.php
*/
get_header (); 
get_template_part('index', 'bannerstrip');
 require_once( BUSI_THEME_FUNCTIONS_PATH . '/scripts/service-script.php' ); ?>
<?php $current_options=get_option('busiprof_pro_theme_options'); ?>
<!-- Container -->
<div style="margin: 0 10px 0;">
<div class="container blank_space">
	<div class="row-fluid services_top_title">
		<div class="services_top_mn">
			<?php if( $current_options['service_tag_line']!='')
					{  $findme   = ' ';
						$pos =  strpos($current_options['service_tag_line'], $findme); 
						if($pos)
						{ echo "<h2>".substr($current_options['service_tag_line'],0,$pos)."<span>".substr($current_options['service_tag_line'],$pos)."</span></h2>"; }
						else
						{ echo "<h2>".$current_options['service_tag_line']."</h2>"; }
					} else {  ?>
						<h2><?php _e('Awesome','busi_prof'); ?> <span><?php _e('Services','busi_prof'); ?> </span></h2>
					<?php } ?>
				<?php if( $current_options['service_tag_desciption']!='') {?>
				<p><?php echo $current_options['service_tag_desciption'] ;?></p>
				<?php } else { ?>	
				<p><?php _e('We are a group of passionate designers and developers who really love to create awesome wordpress themes &amp; support' ,'busi_prof'); ?></p>
				<?php } ?>
		</div>
	</div>
	
	<!-- Sapeator --><!-- <div class="about_border_row"></div> --><!-- /Sapeator -->
	
	<!-- Service Section -->
	<div class="row-fluid service-template">
		<?php $i=1;
			$count_posts = wp_count_posts( 'busiprof_service')->publish;
			$args = array( 'post_type' => 'busiprof_service','posts_per_page'=>$count_posts) ; 	
			$service = new WP_Query( $args );
			if( $service->have_posts() )
			{	while ( $service->have_posts() ) : $service->the_post(); ?>		
				<div class="span3 services_cols_page_mn">
					<?php $service_icon_image =  get_post_meta( get_the_ID(),'service_icon_image', true ); ?>
					<?php $meta_service_description =  get_post_meta( get_the_ID(),'meta_service_description', true ); ?>
					<?php  $service_icon_link =  get_post_meta( get_the_ID(),'service_icon_link', true ); ?>
					<h2><?php if($service_icon_image){?>
					<a href="<?php echo $service_icon_link; ?>" target="_blank">
						<img alt="Web Design" src="<?php echo $service_icon_image; ?>"> <br>
					</a>
						<?php } ?>
					<a href="<?php echo $service_icon_link; ?>" target="_blank"><?php echo the_title(); ?></a>
					</h2>
					<p><?php echo $meta_service_description ;?></p>
				</div><?php if($i%4==0){	echo "<div class='clearfix'></div>";} $i++;	endwhile;  
			} else {  for($ts=1; $ts<=4; $ts++){?>
				<div class="span3 services_cols_page_mn">
					<h2>
						<img alt="Web Design" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/services<?php echo $ts; ?>.png"> <br>
						<a href="#"><?php _e('Web Development','busi_prof'); ?></a>
					</h2>
					<p><?php _e('We are a group of passionate designers and developers who really love to create awesome wordpress themes','busi_prof'); ?></p>
				</div>
			<?php } } ?>
	</div>
	
	<!-- Service Testimonial Section -->
	<div class="row-fluid services_testimonia_mn">
			<div class="row-fluid testimonial_border_row">	
				<div class="span11">
				<?php if($current_options['testimonial_head']!='') {?>
				<h2><?php echo $current_options['testimonial_head'] ; ?>
				<?php } else { ?>
				<?php _e('Testimonials','busi_prof');?>
				<?php } ?>
				<span>(<?php if($current_options['testimonial_tagline']!='') { echo $current_options['testimonial_tagline'];  } else { ?>
				<?php _e("What our customers think about us?",'busi_prof');?>
				<?php  } ;?>)
				</span>
				</h2>
				</div>
				<div class="span1 testimonial_btn">
					<a class="testimonial_prev" id="testimonial_prev" href="#"><span><?php _e('prev','busi_prof'); ?></span></a>
					<a class="testimonial_next" id="testimonial_next" href="#"><span><?php _e('next','busi_prof'); ?></span></a>
				</div>
			</div>
			
			<div class="testimonial_scroll_carousel">
				<div id="foo2">
				<?php
				$args = array( 'post_type' => 'busiprof_testimonial') ; 	
				$tesimonials = new WP_Query( $args ); 
				if( $tesimonials->have_posts() )
				{
				while ( $tesimonials->have_posts() ) : $tesimonials->the_post(); ?>	
					<div class="slide">
						<div>
							<div class="services_testimonia_mn_bo">
								<p><?php echo get_post_meta( get_the_ID(), 'testimonial_desc', true ); ?></p>
								<img alt="Icon" class="testimonial_aero_po" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/aero.png">
							</div>
							<div id="testimonia_blog_cols" class="media">
								<?php $defalt_arg =array('class' => "home_testimonial_img");?>
								<?php if(has_post_thumbnail()){?>
								<?php the_post_thumbnail('home_testimonial',$defalt_arg); 
								} else { ?>	
									<img src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/testimonial_img.png" style="width: 42px; height: 42px;" class="media-object img-circle pull-left img-polaroid">
									<?php } ?>
								
								<div class="media-body">
								<h3><?php echo the_title() ;?> <span>(<?php echo get_post_meta( get_the_ID(), 'author_designation', true ); ?>)</span></h3>
								<!--<p>Founder of the Themedesigner.in</p> -->
								</div>
							</div> 
						</div>
					</div>
					<?php endwhile;  
				} else { ?>
					<?php for($st=1; $st<=3; $st++ ) { ?>
					<div class="slide">
						<div>
							<div class="services_testimonia_mn_bo">
								<p><?php _e('Widest laborum dolo rumes fugats untras. Ethar omnis iste natus error sit voluptatem accusantiexplicabo. Nemo enim ipsam eque porro quisquam est, qui dolorem ipsum am quaerat voluptatem','busi_prof'); ?>. </p>
								<img alt="Icon" class="testimonial_aero_po" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/aero.png">
							</div>
							<div id="testimonia_blog_cols" class="media">
								<img src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/testimonial_img.png" style="width: 42px; height: 42px;" class="media-object img-circle pull-left img-polaroid">
								<div class="media-body">
								<h3><?php _e('Hari Maliya','busi_prof'); ?> <span>(<?php _e('CEO','busi_prof'); ?></span></h3>
								<p><?php _e('Founder of the Themedesigner.in','busi_prof'); ?></p>
								</div>
							</div> 
						</div>
					</div>
				
			<?php } } ?>
				</div>
				<div class="clearfix"></div>
			</div>
	</div>
	<!-- /Service Testimonial Section -->	<!-- Why Us & Other Services -->
	<div class="row-fluid" style="margin-bottom: 20px;">
		<div class="span6 services_why_mn">
			<?php  the_post(); ?>
			<?php the_content(); ?> 
		</div>
		<div class="span6 other_serices">
			<h2><?php  _e('Other Services','busi_prof'); ?> <span>(<?php _e('Related services','busi_prof'); ?>)</span></h2>
			<div class="about_border_row"></div>
			<ul>
			<?php 
			$args = array( 'post_type' => 'busiprof_service') ; 	
			$service = new WP_Query( $args );
			if( $service->have_posts() )
			{	while ( $service->have_posts() ) : $service->the_post(); ?>	
				<li class="others_services_cols">
					<?php $service_icon_image =  get_post_meta( get_the_ID(),'service_icon_image', true ); ?>
					<?php  $service_icon_link =  get_post_meta( get_the_ID(),'service_icon_link', true ); ?>
						<?php if($service_icon_image){?>
							<a href="<?php echo $service_icon_link; ?>">
							<img alt="Web Design" src="<?php echo $service_icon_image; ?>">
							</a>
						<?php } else { ?>
							<a href="#"><img src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/services7.png"></a>
						<?php } ?>
					<a class="other_service_title" href="<?php echo $service_icon_link; ?>"><?php echo the_title(); ?></a>					
				</li>
			 <?php
			 endwhile;  
			} else {  ?>
					<?php for($i=1; $i<=6; $i++) { ?>
					<li class="others_services_cols">
						<a href="#"><img src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/services7.png"></a>
						<a href="#"><?php _e('Web Design','busi_prof');?></a>
					</li>
					<?php } 
				} // end of other service ?>				
			</ul>			
		</div>
	</div>
	<!-- /Why Us & Other Services -->
</div>
</div>
<!-- /Container -->
<?php 	get_template_part('index', 'clientstrip');  /****** get service template ********/  ?>
<?php get_footer(); ?>