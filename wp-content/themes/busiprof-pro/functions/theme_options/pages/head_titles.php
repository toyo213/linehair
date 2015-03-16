<div class="block ui-tabs-panel deactive" id="option-ui-id-15" >	
	<?php $current_options = get_option('spicy_pro_options');
	if(isset($_POST['webriti_settings_save_15']))
	{	
		if($_POST['webriti_settings_save_15'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{		
				$current_options['about_team_title']=sanitize_text_field($_POST['about_team_title']);
				$current_options['about_team_description']=sanitize_text_field($_POST['about_team_description']);
				$current_options['service_title']=sanitize_text_field($_POST['service_title']);
				$current_options['service_description']=sanitize_text_field($_POST['service_description']);		
				update_option('spicy_pro_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_15'] == 2) 
		{	
			$current_options['about_team_title']= __('Meet Our Great Team', 'spicy');	
			$current_options['about_team_description']=__('We provide best WordPress solutions for your business. Thanks to our framework you will get more happy customers.', 'spicy');
			$current_options['service_title']=__('Business World is an incredibly powerful & ultra responsive WP Theme.', 'spicy');	
			$current_options['service_description']=__('Take a tour on your touch sensitive environment or just resize the Browser..', 'spicy');
			update_option('spicy_pro_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_15">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Section Headings','spicy');?></h2></td>
				<td style="width:30%;">
					<div class="webriti_settings_loding" id="webriti_loding_15_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_15_success" ><?php _e('Options data successfully Saved','spicy');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_15_reset" ><?php _e('Options data successfully reset','spicy');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('15');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('15')" >
				</td>
				</tr>
			</table>	
		</div>	
		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		
		<div class="section">
			<h3><?php _e('About Us Page Team Heading','spicy');?></h3>
			<input class="webriti_inpute"  type="text" name="about_team_title" id="about_team_title" value="<?php if($current_options['about_team_title']!='') { echo esc_attr($current_options['about_team_title']); } ?>" >		
			<span class="explain"><?php  _e('Enter Team Heading For ABOUT US Page.','spicy');?></span>
		</div>
		<div class="section">
			<h3><?php _e('About Us Page Team Description','spicy');?></h3>
			<input class="webriti_inpute"  type="text" name="about_team_description" id="about_team_description" value="<?php if($current_options['about_team_description']!='') { echo esc_attr($current_options['about_team_description']); } ?>" >		
			<span class="explain"><?php  _e('Enter Team Description For ABOUT US Page.','spicy');?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Service section Heading on Home page','spicy');?></h3>
			<input class="webriti_inpute"  type="text" name="service_title" id="service_title" value="<?php if($current_options['service_title']!='') { echo esc_attr($current_options['service_title']); } ?>" >		
			<span class="explain"><?php  _e('Enter Service Heading for Service Section.','spicy');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Service section Description on Home page','spicy');?></h3>
			<input class="webriti_inpute"  type="text" name="service_description" id="service_description" value="<?php if($current_options['service_description']!='') { echo esc_attr($current_options['service_description']); } ?>" >		
			<span class="explain"><?php  _e('Enter Service Description for Service Section.','spicy');?></span>
		</div>
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_15" name="webriti_settings_save_15" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('15');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('15')" >
		</div>
	</form>
</div>