<div class="block ui-tabs-panel deactive" id="option-ui-id-5" >	
	<?php $current_options = get_option('spicy_pro_options');
	if(isset($_POST['webriti_settings_save_5']))
	{	
		if($_POST['webriti_settings_save_5'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else
			{
				$current_options['footer_call_out_title'] = sanitize_text_field($_POST['footer_call_out_title']);
				$current_options['footer_call_out_description'] = sanitize_text_field($_POST['footer_call_out_description']);
				$current_options['footer_call_out_btn_text'] = sanitize_text_field($_POST['footer_call_out_btn_text']);	
				$current_options['footer_call_out_btn_link']=esc_url_raw($_POST['footer_call_out_btn_link']);
				// Call Out Area Button Link Target
				if($_POST['footer_call_out_btn_link_target'])
				{ echo $current_options['footer_call_out_btn_link_target']=sanitize_text_field($_POST['footer_call_out_btn_link_target']); } 
				else
				{ echo $current_options['footer_call_out_btn_link_target']="off"; } 
				// Call Out Area Enabled on About us or Service Section or Front Page
				if($_POST['footer_call_out_area_enabled'])
				{ echo $current_options['footer_call_out_area_enabled']= sanitize_text_field($_POST['footer_call_out_area_enabled']); } 
				else { echo $current_options['footer_call_out_area_enabled']="off"; }
				
				update_option('spicy_pro_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_5'] == 2) 
		{	
			$current_options['footer_call_out_area_enabled'] = 'on';
			$current_options['footer_call_out_title']="Want to say Hey or find out more?";
			$current_options['footer_call_out_description']="Reprehen derit in voluptate velit cillum dolore eu fugiat nulla pariaturs  sint occaecat proidentse.";
			$current_options['footer_call_out_btn_text']="Buy It Now!";
			$current_options['footer_call_out_btn_link']="";	
			$current_options['footer_call_out_btn_link_target']= 'on';					
			update_option('spicy_pro_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_5">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Footer Call Out Area','spicy');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_5_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_5_success" ><?php _e('Options data successfully Saved','spicy');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_5_reset" ><?php _e('Options data successfully reset','spicy');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('5');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('5')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">
			<h3><?php _e('Enable Footer Call Out Area Section :','spicy'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['footer_call_out_area_enabled']=='on') echo "checked='checked'"; ?> id="footer_call_out_area_enabled" name="footer_call_out_area_enabled" > <span class="explain"><?php _e('Enable footer call out area on front page.','spicy'); ?></span>
		</div>
		
		<div class="section">		
			<h3><?php _e('Footer Call Out Title','spicy'); ?></h3>
			<input class="webriti_inpute"  type="text" name="footer_call_out_title" id="footer_call_out_title" placeholder="Enter http://example.com"  value="<?php if(isset($current_options['footer_call_out_title'])) { echo $current_options['footer_call_out_title']; } ?>">
			<span class="explain"><?php _e('Enter the footer call out title.','spicy'); ?></span>
		</div>
		
		<div class="section">		
			<h3><?php _e('Footer Call Out Description','spicy'); ?></h3>
			<textarea rows="4" cols="8" id="footer_call_out_description" name="footer_call_out_description"><?php if($current_options['footer_call_out_description']!='') { echo esc_attr($current_options['footer_call_out_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the footer call out description.','spicy'); ?></span>
		</div>
		
		<div class="section">		
			<h3><?php _e('Footer Call Out Button Text','spicy'); ?></h3>
			<input class="webriti_inpute"  type="text" name="footer_call_out_btn_text" id="footer_call_out_btn_text" placeholder="Enter http://example.com"  value="<?php if(isset($current_options['footer_call_out_btn_text'])) { echo $current_options['footer_call_out_btn_text']; } ?>">
			<span class="explain"><?php _e('Enter the footer call out button text.','spicy'); ?></span>
		</div>

		<div class="section">	
		<h3><?php _e('Footer Call Out Button Link','spicy'); ?></h3>			
			<input class="webriti_inpute"  type="text" name="footer_call_out_btn_link" id="footer_call_out_btn_link" placeholder="Enter http://example.com"  value="<?php if(isset($current_options['footer_call_out_btn_link'])) { echo $current_options['footer_call_out_btn_link']; } ?>" >
			<span class="explain"><?php _e('Enter the footer call out button link.','spicy'); ?></span>
			<p><input type="checkbox" id="footer_call_out_btn_link_target" name="footer_call_out_btn_link_target" <?php if($current_options['footer_call_out_btn_link_target']=='on') echo "checked='checked'"; ?> > <?php _e('Open link in a new window/tab','spicy'); ?></p>
		</div>		
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_5" name="webriti_settings_save_5" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('5');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('5')" >
		</div>
	</form>
</div>