<div class="block ui-tabs-panel deactive" id="option-ui-id-13" >	
	<?php $current_options = get_option('spicy_pro_options');
	if(isset($_POST['webriti_settings_save_13']))
	{	
		if($_POST['webriti_settings_save_13'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{
				$current_options['webriti_service_slug']=sanitize_text_field($_POST['webriti_service_slug']);
				$current_options['webriti_portfolio_slug']=sanitize_text_field($_POST['webriti_portfolio_slug']);
				$current_options['webriti_team_slug']=sanitize_text_field($_POST['webriti_team_slug']);
				
				update_option('spicy_pro_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_13'] == 2) 
		{
			$current_options['webriti_service_slug']= "webriti_service";		
			$current_options['webriti_portfolio_slug']= "webriti_project";
			$current_options['webriti_team_slug']= "webriti_team";
			
			update_option('spicy_pro_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_13">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Post Type Slug','spicy');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_13_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_13_success" ><?php _e('Options data successfully Saved','spicy');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_13_reset" ><?php _e('Options data successfully reset','spicy');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('13');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('13')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">		
			<h3><?php _e('Service Slug','spicy'); ?></h3>
			<input class="webriti_inpute"  type="text" name="webriti_service_slug" id="webriti_service_slug" value="<?php echo $current_options['webriti_service_slug']; ?>" >
			<span class="explain"><?php _e('Enter service slug.','spicy'); ?></span>
		</div>
		<div class="section">		
			<h3><?php _e('Portfolio/Project Slug','spicy'); ?></h3>
			<input class="webriti_inpute"  type="text" name="webriti_portfolio_slug" id="webriti_portfolio_slug" value="<?php echo $current_options['webriti_portfolio_slug']; ?>" >
			<span class="explain"><?php _e('Enter portfolio slug.','spicy'); ?></span>
		</div>
		<div class="section">		
			<h3><?php _e('Our Team Slug','spicy'); ?></h3>
			<input class="webriti_inpute"  type="text" name="webriti_team_slug" id="webriti_team_slug" value="<?php echo $current_options['webriti_team_slug']; ?>" >
			<span class="explain"><?php _e('Enter our team slug.','spicy'); ?></span>
		</div>
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_13" name="webriti_settings_save_13" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('13');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('13')" >
		</div>
	</form>
</div>