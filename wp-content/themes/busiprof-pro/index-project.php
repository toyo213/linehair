<?php $current_options=get_option('busiprof_pro_theme_options'); ?>
<?php if($current_options['home_project_section_enabled']=='on') { ?>
<!-- Recent Project -->
	<div class="services_mid_mn">
		<div class="container">
			<div class="services_top_mn">
				<?php if( $current_options['project_tag_line']!='')
						{  $findmeproject   = ' ';
							$pos =  strpos($current_options['project_tag_line'], $findmeproject); 
							if($pos)
							{ echo "<h2>".substr($current_options['project_tag_line'],0,$pos)."<span>".substr($current_options['project_tag_line'],$pos)."</span></h2>"; }
							else
							{ echo "<h2>".$current_options['project_tag_line']."</h2>"; }
						} else {  ?>
							<h2><?php _e('Recent','busi_prof'); ?> <span><?php _e('Projects','busi_prof'); ?> </span></h2>
						<?php } ?>
					<?php if( $current_options['project_tag_desciption']!='') {?>
					<p><?php echo $current_options['project_tag_desciption']; ?></p>
					<?php } else { ?>	
					<p><?php _e('We are a group of passionate designers and developers who really love to create awesome wordpress themes &amp; support' ,'busi_prof'); ?></p>
					<?php } ?>
			</div><?php
				//for a given post type, return all
				$post_type = 'busiprof_project';
				$tax = 'project_categories'; 
				$tax_terms = get_terms($tax);
				//echo  $defualt_tex_id = get_option('custom_texoid_busiprof');
				$busiprof_active=1;
				if($tax_terms) 
				{?>
				<div class="row"><div class="span12">
				<ul class="bs-docs-tooltip-examples rec_project"><?php
					foreach ($tax_terms  as $tax_term)						
					{
						$tax_name =str_replace(' ', '_', $tax_term->name); 
						$tax_name=preg_replace('~[^A-Za-z\d\s-]+~u', 'wbr', $tax_name); ?>
					  <li <?php if($busiprof_active==1) echo "class='active'"; ?>><a data-toggle="tab" href="#<?php echo $tax_name; ?>" ><?php echo $tax_term->name; ?></a></li>
					<?php  $busiprof_active++; } ?>
				</ul></div></div><?php
				}else {  
				?>
				<div class="row"><div class="span12">
				<ul class="bs-docs-tooltip-examples rec_project">			
				  <li class="selected"><a data-toggle="tab" href="#all"><?php _e('All','busi_prof'); ?></a></li>
				  <li><a data-toggle="tab" href="#webdesign" ><?php _e('Web Design','busi_prof'); ?></a></li>
				  <li><a data-toggle="tab" href="#webdevelopment" ><?php _e('Web Development','busi_prof'); ?></a></li>
				  <li><a data-toggle="tab" href="#graphic" ><?php _e('Graphic Design','busi_prof'); ?></a></li>
				  <li><a data-toggle="tab" href="#multimedia" ><?php _e('Multimedia','busi_prof'); ?></a></li>
				</ul>
				</div></div>
				<?php } ?>
				<?php
				if ($tax_terms) 
				{
				 
				?><div class="row"><div class="tab-content" id="myTabContent">	
					<?php  $busiprof_in=1;
					foreach ($tax_terms  as $tax_term)
					  {
						$args=array(
						  'post_type' => $post_type,
						  "$tax" => $tax_term->slug,
						  'post_status' => 'publish',
						);
						$home_project_query = null;
						$home_project_query = new WP_Query($args);
						if( $home_project_query->have_posts() )
						{ 	
						$tax_name =str_replace(' ', '_', $tax_term->name);
						$tax_name=preg_replace('~[^A-Za-z\d\s-]+~u', 'wbr', $tax_name);
						?>
							<div id="<?php echo $tax_name; ?>" class="tab-pane fade <?php if($busiprof_in == 1) echo "in"; ?>">
								<div class="service_section">	
								<?php $k=1;
									while ($home_project_query->have_posts()) : $home_project_query->the_post(); ?>
										<div class="span3 rec_cols_mn">											
											<?php if(has_post_thumbnail()) { ?>
											<?php  the_post_thumbnail(); } 
											else { ?>
											<img alt="Web Design" src="<?php echo BUSI_TEMPLATE_DIR_URI ?>/images/business-meeting2.jpg" style="width: 100%">
											<?php }  ?>									
											<h3><a href="<?php echo get_post_meta( get_the_ID(),'project_link', true ); ?>" <?php if(get_post_meta( get_the_ID(),'project_target', true )) { echo "target='_blank'"; } ?> > <?php the_title(); ?></a></h3>
											<p><?php echo get_post_meta( get_the_ID(),'project_title_description', true ); ?></p>
										</div> 
								<?php  if($k%4==0){ echo '<div class="clearfix"></div>' ; }  $k++; endwhile; ?>
								</div>
							</div> <?php
						}
						
						wp_reset_query();
					  }?>
					  </div></div><?php
				} else {  ?>
			<div class="tab-content" id="myTabContent">			
			  <div id="all" class="tab-pane fade active in">
					<div class="row-fluid service_section">
					<?php for($y=1; $y<=4; $y++) { ?>
						<div class="span3 rec_cols_mn">
							<a class="hover_thumb" href="#">
							<img alt="Web Design" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/default/rec_project.jpg" style="width: 100%">
							</a>
							<h3><a href="#"><?php _e('Business Cards','busi_prof'); ?></a></h3>
							<p><?php _e('Graphic Design & Web Design.','busi_prof'); ?></p>
						</div>
						<?php } ?>
					</div>	
			  </div>
			  
			  <div id="webdesign" class="tab-pane fade ">
					<div class="row-fluid service_section">
					<?php for($y=1; $y<=3; $y++) { ?>
						<div class="span3 rec_cols_mn">
							<a class="hover_thumb" href="#">
							<img alt="Web Design" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/img_ho.png" style="width: 100%"></a>
							<h3><a href="#"><?php _e('Business Cards','busi_prof'); ?></a></h3>
							<p><?php _e('Graphic Design & Web Design.','busi_prof'); ?></p>
						</div>
					<?php } ?>
					</div>	
			  </div>			  
			  <div id="webdevelopment" class="tab-pane fade ">
					<div class="row-fluid service_section">
					<?php for($y=1; $y<=2; $y++) { ?>
						<div class="span3 rec_cols_mn">
							<a class="hover_thumb" href="#">
							<img alt="Web Design" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/img_ho.png" style="width: 100%"></a>
							<h3><a href="#"><?php _e('Business Cards','busi_prof'); ?></a></h3>
							<p><?php _e('Graphic Design & Web Design.','busi_prof'); ?></p>
						</div>
					<?php } ?>						
					</div>	
			  </div>			  
			  <div id="graphic" class="tab-pane fade ">
					<div class="row-fluid service_section">
						<div class="span3 rec_cols_mn">
							<a class="hover_thumb" href="#">
							<img alt="Web Design" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/img_ho.png" style="width: 100%"></a>
							<h3><a href="#"><?php _e('Business Cards','busi_prof'); ?></a></h3>
							<p><?php _e('Graphic Design & Web Design.','busi_prof'); ?></p>
						</div>
					</div>	
			  </div>			  
			  <div id="multimedia" class="tab-pane fade">
					<div class="row-fluid service_section">
						<?php for($y=1; $y<=3; $y++) { ?>
						<div class="span3 rec_cols_mn">
							<a class="hover_thumb" href="#">
							<img alt="Web Design" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/business-meeting2.jpg" style="width: 100%">
							</a>
							<h3><a href="#"><?php _e('Business Cards','busi_prof'); ?></a></h3>
							<p><?php _e('Graphic Design & Web Design.','busi_prof'); ?></p>
						</div>
						<?php } ?>
					</div>	
			  </div>
            </div>
			<?php } ?>
					
		</div>	
</div>	<!-- /Recent Project -->
<?php } ?>