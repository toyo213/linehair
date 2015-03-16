<?php
$current_options = get_option( 'busiprof_pro_theme_options' );
if(isset($_POST['busiprof_settings_save_2']))
{		
	if($_POST['busiprof_settings_save_2'] == 1) 
	{
		if ( empty($_POST) || !wp_verify_nonce($_POST['busiprof_gernalsetting_nonce_customization'],'busiprof_customization_nonce_gernalsetting') )
		{
			print 'Sorry, your nonce did not verify.';
			exit;
		}

		else  
		{					
			$current_options['animation']= $_POST['animation'];
			$current_options['slide_direction']= $_POST['slide_direction'];
			$current_options['animation_speed'] = $_POST['animation_speed'];
			$current_options['slideshow_speed']= $_POST['slideshow_speed'];			
					
			$current_options['client_strip_total']= sanitize_text_field($_POST['client_strip_total']);
			$current_options['client_strip_slide_speed']= sanitize_text_field($_POST['client_strip_slide_speed']);			
			$current_options['busiprof_pro_custom_css']= $_POST['busiprof_pro_custom_css'];	
			
			update_option('busiprof_pro_theme_options' , $current_options);
		}
     }	
	 if($_POST['busiprof_settings_save_2'] == 2) 
	 {	do_action('busiprof_restore_data','2'); }
 }
 ?>
<form method="post" action = ""  id="theme_options_home_2">
	<?php wp_nonce_field('busiprof_customization_nonce_gernalsetting','busiprof_gernalsetting_nonce_customization'); ?>
	<div class="postbox" id="Basic_setting_1">
		<div title="Click to toggle" class="handlediv"><br></div>		
		<h3 class="hndle"><span><?php _e('Slider Effects','busi_prof');?><span class="postbox-title-action">
		</h3>
		<div class="inside">			
			<p><h4 class="heading"><?php _e('Animation Type : ','busi_prof');?></h4>				
				<?php $animation = $current_options['animation']; ?>		
					<select name="animation" >					
					<option value="fade"  <?php echo selected($animation, 'fade' ); ?>><?php _e('fade','busi_prof');?></option>
					<option value="slide" <?php echo selected($animation, 'slide' ); ?>><?php _e('slide','busi_prof');?></option> 
					</select>
				<span class="icon help">
					<span class="tooltip"><?php  _e('Select the Animation Type','busi_prof');?></span>
				</span>
			</p>
			<p><h4 class="heading"><?php _e('Slider Direction : ','busi_prof');?></h4>
				<?php $slide_direction = $current_options['slide_direction']; ?>		
					<select name="slide_direction" >					
					<option value="vertical"  <?php echo selected($slide_direction, 'vertical' ); ?>><?php _e('vertical','busi_prof');?>
					</option>
					<option value="horizontal" <?php echo selected($slide_direction, 'horizontal' ); ?>><?php _e('horizontal','busi_prof');?>
					</option> 
					</select>
				<span class="icon help">
					<span class="tooltip"><?php  _e('Select the Slider Direction','busi_prof');?></span>
				</span>
			</p>
			<p><h4 class="heading"><?php _e('Animation Speed : ','busi_prof');?></h4>
				<?php $animation_speed = $current_options['animation_speed']; ?>		
					<select name="animation_speed" >					
						<option value="1000" <?php selected($animation_speed, '1000' ); ?>>1.0</option>
						<option value="1500" <?php selected($animation_speed, '1500' ); ?>>1.5</option>
						<option value="2000" <?php selected($animation_speed, '2000' ); ?>>2.0</option>
						<option value="2500" <?php selected($animation_speed, '2500' ); ?>>2.5</option>
						<option value="3000" <?php selected($animation_speed, '3000' ); ?>>3.0</option>
						<option value="3500" <?php selected($animation_speed, '3500' ); ?>>3.5</option>
						<option value="4000" <?php selected($animation_speed, '4000' ); ?>>4.0</option>
						<option value="4500" <?php selected($animation_speed, '4500' ); ?>>4.5</option>
						<option value="5000" <?php selected($animation_speed, '5000' ); ?>>5.0</option>
						<option value="5500" <?php selected($animation_speed, '5500' ); ?>>5.5</option>
						<option value="6000" <?php selected($animation_speed, '6000' ); ?>>6.0</option>
					</select>
				<span class="icon help">
					<span class="tooltip"><?php  _e('Select the Animation Speed','busi_prof');?></span>
				</span>
			</p>
			<p><h4 class="heading"><?php _e('Slide Show Speed : ','busi_prof');?></h4>
				<?php $slideshow_speed = $current_options['slideshow_speed']; ?>		
					<select name="slideshow_speed" >					
						<option value="1000" <?php selected($slideshow_speed, '1000' ); ?>>1.0</option>
						<option value="1500" <?php selected($slideshow_speed, '1500' ); ?>>1.5</option>
						<option value="2000" <?php selected($slideshow_speed, '2000' ); ?>>2.0</option>
						<option value="2500" <?php selected($slideshow_speed, '2500' ); ?>>2.5</option>
						<option value="3000" <?php selected($slideshow_speed, '3000' ); ?>>3.0</option>
						<option value="3500" <?php selected($slideshow_speed, '3500' ); ?>>3.5</option>
						<option value="4000" <?php selected($slideshow_speed, '4000' ); ?>>4.0</option>
						<option value="4500" <?php selected($slideshow_speed, '4500' ); ?>>4.5</option>
						<option value="5000" <?php selected($slideshow_speed, '5000' ); ?>>5.0</option>
						<option value="5500" <?php selected($slideshow_speed, '5500' ); ?>>5.5</option>
						<option value="6000" <?php selected($slideshow_speed, '6000' ); ?>>6.0</option>
					</select>
				<span class="icon help">
					<span class="tooltip"><?php  _e('Select the Slide Show Speed','busi_prof');?></span>
				</span>
			</p>
		</div>	
	</div>
	<div class="postbox" id="Basic_setting_1">
		<div title="Click to toggle" class="handlediv"><br></div>		
		<h3 class="hndle"><span><?php _e('Client Strip','busi_prof');?><span class="postbox-title-action">
		</h3>
		<div class="inside">			
			<p><h4 class="heading"><?php _e('No of Client: ','busi_prof');?></h4>
				<?php $client_strip_total = $current_options['client_strip_total']; ?>
				<select name="client_strip_total" >	
					<?php for ($csl=2; $csl<=12; $csl++) {  ?>
					
					<option value="<?php echo $csl ?>"  <?php selected($csl, $client_strip_total ); ?>><?php echo $csl; ?></option>
					<?php } ?>
				</select>
				<span class="icon help">
					<span class="tooltip"><?php  _e('How much Client you want to display at list on client list slider','busi_prof');?></span>
				</span>
			</p>
			<p><h4 class="heading"><?php _e('Client Strip slide Speed : ','busi_prof');?></h4>
				<?php $client_strip_slide_speed = $current_options['client_strip_slide_speed']; ?>		
					<select name="client_strip_slide_speed" >					
						<option value="1000" <?php selected($client_strip_slide_speed, '1000' ); ?>>1000</option>						
						<option value="2000" <?php selected($client_strip_slide_speed, '2000' ); ?>>2000</option>						
						<option value="3000" <?php selected($client_strip_slide_speed, '3000' ); ?>>3000</option>						
						<option value="4000" <?php selected($client_strip_slide_speed, '4000' ); ?>>4000</option>						
						<option value="5000" <?php selected($client_strip_slide_speed, '5000' ); ?>>5000</option>					
						<option value="6000" <?php selected($client_strip_slide_speed, '6000' ); ?>>6000</option>
					</select>
				<span class="icon help">
					<span class="tooltip"><?php  _e('Select the client strip slide Speed','busi_prof');?></span>
				</span>
			</p>
		</div>	
	</div>
	<div class="postbox" id="Basic_setting_1">
		<div title="Click to toggle" class="handlediv"><br></div>		
		<h3 class="hndle"><span><?php _e('Custom CSS','busi_prof');?><span class="postbox-title-action">
		</h3>
		<div class="inside">
			<p><h4 class="heading"><?php _e('Enter Custom css code ','busi_prof');?></h4>
				
				<textarea name="busiprof_pro_custom_css"  id="busiprof_pro_custom_css" style="width: 500px; height: 100px; padding: 0px;" placeholder="Enter custom css "  rows="3" cols="10" ><?php if($current_options['busiprof_pro_custom_css']!='') { echo esc_attr($current_options['busiprof_pro_custom_css']); } ?></textarea>
				
			</p>		
		</div>	
	</div>	
<!---DATA SAVE------>
    <div id="busiprof_optionsframework-submit">         
		<input type="hidden" value="1" id="busiprof_settings_save_2" name="busiprof_settings_save_2" />
		<input type="button" class="button-primary"  value= "<?php _e('Save Changes', 'busi_prof');?>" onclick="datasave_home('2')"/>									
		<input type="button" class="reset-button button-secondary"  value="<?php _e('Restore Defaults','busi_prof');?>" onclick="reset_data_home('2')" />
		<div style="display:none; margin-left:300px; margin-top:-25px; padding:10px; color: #468847; background-color: #DFF0D8; border-color: #D6E9C6;" id="busiprof_settings_save_2_reset" ><?php _e('Options data successfully reset','busi_prof');?></div>
		<div style="display:none; margin-left:300px; margin-top:-25px; padding:10px; color: #468847; background-color: #DFF0D8; border-color: #D6E9C6;" id="busiprof_settings_save_2_success" ><?php _e('Options data successfully Saved','busi_prof');?></div>
	</div>
</form>