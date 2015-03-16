<div class="block ui-tabs-panel deactive" id="option-ui-id-7" >	
	<?php $current_options = get_option('spicy_pro_options');	
	if(isset($_POST['webriti_settings_save_7']))
	{	
		if($_POST['webriti_settings_save_7'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{	
				//Contact Us Address Settings
				$current_options['contact_address_title']=sanitize_text_field($_POST['contact_address_title']);
				$current_options['contact_address_designation_one']=sanitize_text_field($_POST['contact_address_designation_one']);
				$current_options['contact_address_designation_two']=sanitize_text_field($_POST['contact_address_designation_two']);
				$current_options['contact_phone_number']=sanitize_text_field($_POST['contact_phone_number']);
				$current_options['contact_fax']=sanitize_text_field($_POST['contact_fax']);
				$current_options['contact_email']=sanitize_text_field($_POST['contact_email']);
				
				//Contact Us Form Settings
				$current_options['contact_form_title']=sanitize_text_field($_POST['contact_form_title']);
				$current_options['contact_social_media_title']=sanitize_text_field($_POST['contact_social_media_title']);
				
				// Address Section Enable in Contact page
				if($_POST['contact_address_settings'])
				{ echo $current_options['contact_address_settings']= sanitize_text_field($_POST['contact_address_settings']); } 
				else { echo $current_options['contact_address_settings']="off"; }
				
				update_option('spicy_pro_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_7'] == 2) 
		{	
			//Contact Us Address Settings
			$current_options['contact_address_settings']= 'on';
			$current_options['contact_address_title']= 'Get in Touch';
			$current_options['contact_address_designation_one']= '25, Lorem Lis Street,';
			$current_options['contact_address_designation_two']= 'Dhanmandi California, US';
			$current_options['contact_phone_number']= '800 123 3456';
			$current_options['contact_fax']= '800 123 3456';
			$current_options['contact_email']= 'www.webriti.com';
			
			//Contact Us Form Settings
			$current_options['contact_form_title']= 'Send Us a Message';
			$current_options['contact_social_media_title'] = 'Social Network';			
			
			update_option('spicy_pro_options', $current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_7">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Contact Information','spicy');?></h2></td>
				<td style="width:30%;">
					<div class="webriti_settings_loding" id="webriti_loding_7_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_7_success" ><?php _e('Options data successfully Saved','spicy');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_7_reset" ><?php _e('Options data successfully reset','spicy');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('7');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('7')" >
				</td>
				</tr>
			</table>	
		</div>	
		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		
		<!---Contact Address Section Settings--->
		
		<div class="section">
			<h3><?php _e('Contact Page Address Section Settings','spicy'); ?>  </h3>
		</div>
		<div class="section">
			<h3><?php _e('Enable Contact Page Address Section:','spicy'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['contact_address_settings']=='on') echo "checked='checked'"; ?> id="contact_address_settings" name="contact_address_settings" > 
		</div>
		<div class="section">
			<h3><?php _e('Contact Address Title:','spicy');?></h3>
			<input class="webriti_inpute"  type="text" name="contact_address_title" id="contact_address_title" value="<?php if($current_options['contact_address_title']!='') { echo esc_attr($current_options['contact_address_title']); } ?>" >
		</div>
		<div class="section">
			<h3><?php _e('Contact Aaddress Designation One:','spicy');?></h3>
			<input class="webriti_inpute"  type="text" name="contact_address_designation_one" id="contact_address_designation_one" value="<?php if($current_options['contact_address_designation_one']!='') { echo esc_attr($current_options['contact_address_designation_one']); } ?>" >
		</div>
		<div class="section">
			<h3><?php _e('Contact Address Designation Two:','spicy');?></h3>
			<input class="webriti_inpute"  type="text" name="contact_address_designation_two" id="contact_address_designation_two" value="<?php if($current_options['contact_address_designation_two']!='') { echo esc_attr($current_options['contact_address_designation_two']); } ?>" >
		</div>
		<div class="section">
			<h3><?php _e('Contact Phone Number:','spicy');?></h3>
			<input class="webriti_inpute"  type="text" name="contact_phone_number" id="contact_phone_number" value="<?php if($current_options['contact_phone_number']!='') { echo esc_attr($current_options['contact_phone_number']); } ?>" >
		</div>
		<div class="section">
			<h3><?php _e('Contact Fax Number:','spicy');?></h3>
			<input class="webriti_inpute"  type="text" name="contact_fax" id="contact_fax" value="<?php if($current_options['contact_fax']!='') { echo esc_attr($current_options['contact_fax']); } ?>" >
		</div>
		<div class="section">
			<h3><?php _e('Contact Email:','spicy');?></h3>
			<input class="webriti_inpute"  type="text" name="contact_email" id="contact_email" value="<?php if($current_options['contact_email']!='') { echo esc_attr($current_options['contact_email']); } ?>" >
		</div>
		<div class="section">
			<h3><?php _e('Contact Form Title:','spicy');?></h3>
			<input class="webriti_inpute"  type="text" name="contact_form_title" id="contact_form_title" value="<?php if($current_options['contact_form_title']!='') { echo esc_attr($current_options['contact_form_title']); } ?>" >
		</div>
		<div class="section">
			<h3><?php _e('Contact Social Media Title:','spicy');?></h3>
			<input class="webriti_inpute"  type="text" name="contact_social_media_title" id="contact_social_media_title" value="<?php if($current_options['contact_social_media_title']!='') { echo esc_attr($current_options['contact_social_media_title']); } ?>" >
		</div>
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_7" name="webriti_settings_save_7" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('7');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('7')" >
		</div>
	</form>
</div>