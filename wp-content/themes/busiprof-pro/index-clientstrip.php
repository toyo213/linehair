<?php
/*	*
	* @Theme Name	:	BusiProf
	* @file         :	index-clientstrip.php
	* @package      :	Busiprof
	* @author       :	Hari Maliya
	* @license      :	license.txt
	* @filesource   :	wp-content/themes/Busiprof/index-clientstrip.php
*/
	$current_options=get_option('busiprof_pro_theme_options');
	$client_strip_total = $current_options['client_strip_total'];
	$client_strip_slide_speed = $current_options['client_strip_slide_speed'];
	require_once( BUSI_THEME_FUNCTIONS_PATH . '/scripts/clientjs-strip.php' );
?>	
<div class="container">
	<div class="row-fluid carusel_wrapper">
		<div id="our_client_product">
			<?php  
			if( $current_options['client_strip']!='')
				{ if( $current_options['client_strip']=="yes")
					{	/****check custom client strip*****/
						$count_posts = wp_count_posts( 'busiprof_clientstrip')->publish;
						$args = array( 'post_type' => 'busiprof_clientstrip','posts_per_page'=>$count_posts ) ; 	
						$clientstrip = new WP_Query( $args ); 
						if( $clientstrip->have_posts() )
						{	while ( $clientstrip->have_posts() ) : $clientstrip->the_post(); ?>
									<div>
									<?php if(has_post_thumbnail()) { ?>
									<?php  the_post_thumbnail('client_script_image');  } else {?>
									<img src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/140x60.jpg" alt="Busiprof" style="width:140px; height:60px;" />									
									<?php } ?></div>
									<?php
							endwhile; 
						} 
						else 
						{	for ($csi=1; $csi<12; $csi++)
							{ ?><div>
								<img src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/140x60.jpg" alt="Busiprof" style="width:140px; height:60px;" />
								</div><?php 
							}										
						}//end of busiprof_clientstrip	list if 
					} 
				} ?>
		</div>
    </div>
</div>