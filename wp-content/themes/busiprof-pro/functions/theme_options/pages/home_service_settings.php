<div class="block ui-tabs-panel deactive" id="option-ui-id-3" >	
	<?php $current_options = get_option('spicy_pro_options');
	if(isset($_POST['webriti_settings_save_3']))
	{	
		if($_POST['webriti_settings_save_3'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{	
			$current_options['service_list']= sanitize_text_field($_POST['service_list']);
			
			// service section enabled yes ya on
			if($_POST['front_service_section_enabled'])
			{ echo $current_options['front_service_section_enabled']= sanitize_text_field($_POST['front_service_section_enabled']); } 
			else { echo $current_options['front_service_section_enabled']="off"; } 
				
			update_option('spicy_pro_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_3'] == 2) 
		{
			// Other Service Section in Service Template
			$current_options['front_service_section_enabled']="on";
			$current_options['service_list']= 4;
			update_option('spicy_pro_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_3">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Service Settings','spicy');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_3_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_3_success" ><?php _e('Options data successfully Saved','spicy');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_3_reset" ><?php _e('Options data successfully reset','spicy');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('3');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('3')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		
		<div class="section">
			<h3><?php _e('Enable Home Service Section','spicy'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['front_service_section_enabled']=='on') echo "checked='checked'"; ?> id="front_service_section_enabled" name="front_service_section_enabled">
			<span class="explain"><?php _e('Enable service on front page.','spicy'); ?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Services Section','spicy'); ?></h3>
			<hr>
			<h3><?php _e('Number of services on home service section','spicy');?></h3>
			<?php $service_list = $current_options['service_list']; ?>		
			<select name="service_list" class="webriti_inpute" >					
				<option value="4" <?php selected($service_list, '4' ); ?>>4</option>
				<option value="8" <?php selected($service_list, '8' ); ?>>8</option>
				<option value="12" <?php selected($service_list, '12' ); ?>>12</option>
				<option value="16" <?php selected($service_list, '16' ); ?>>16</option>
				<option value="20" <?php selected($service_list, '20' ); ?>>20</option>
				<option value="24" <?php selected($service_list, '24' ); ?>>24</option>
			</select>
			<span class="explain"><?php _e('Select number of services','spicy'); ?></span>
		</div>
		
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_3" name="webriti_settings_save_3" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('3');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('3')" >
		</div>
	</form>
</div>