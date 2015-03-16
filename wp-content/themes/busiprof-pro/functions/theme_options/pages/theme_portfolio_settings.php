<?php
$current_options = get_option( 'busiprof_pro_theme_options' );
if(isset($_POST['busiprof_settings_save_5']))
{		
	if($_POST['busiprof_settings_save_5'] == 1) 
	{
		if ( empty($_POST) || !wp_verify_nonce($_POST['busiprof_gernalsetting_nonce_customization'],'busiprof_customization_nonce_gernalsetting') )
		{
			print 'Sorry, your nonce did not verify.';
			exit;
		}

		else  
		{	$current_options['protfolio_tag_line']= sanitize_text_field($_POST['protfolio_tag_line']);
			$current_options['protfolio_description_tag']= sanitize_text_field($_POST['protfolio_description_tag']);
			update_option('busiprof_pro_theme_options' , $current_options);
		}
     }	
	 if($_POST['busiprof_settings_save_2'] == 2) 
	 {
		do_action('busiprof_restore_data','5');
	 }
 }
 ?>
<form method="post" action = ""  id="theme_options_home_5">
	<?php wp_nonce_field('busiprof_customization_nonce_gernalsetting','busiprof_gernalsetting_nonce_customization'); ?>
		<div class="postbox" id="Basic_setting_1">
		<div title="Click to toggle" class="handlediv"><br></div>		
		<h3 class="hndle"><span><?php _e('Protfolio','busi_prof');?><span class="postbox-title-action">
		</h3>
		<div class="inside">
			<p><h4 class="heading"><?php _e('Portfolio tag line','busi_prof');?></h4>
				<input type="text" class="inputwidth" name="protfolio_tag_line" id="protfolio_tag_line" value="<?php if($current_options['protfolio_tag_line']!='') { echo esc_attr($current_options['protfolio_tag_line']); } ?>"/>
				<span class="icon help">
					<span class="tooltip"><?php  _e('Enter portfolio tag line','busi_prof');?></span>
				</span>
			</p>
			<p><h4 class="heading"><?php _e('Protfolio description : ','busi_prof');?></h4>
				<input type="text" class="inputwidth" name="protfolio_description_tag" id="protfolio_description_tag" value="<?php if($current_options['protfolio_description_tag']!='') { echo esc_attr($current_options['protfolio_description_tag']); } ?>"/>
				<span class="icon help">
					<span class="tooltip"><?php  _e('Enter portfolio tag description','busi_prof');?></span>
				</span>
			</p>
		</div>	
	</div>	
	
<!---DATA SAVE------>
    <div id="busiprof_optionsframework-submit">         
		<input type="hidden" value="1" id="busiprof_settings_save_5" name="busiprof_settings_save_5" />
		<input type="button" class="button-primary"  value= "<?php _e('Save Changes', 'busi_prof');?>" onclick="datasave_home('5')"/>									
		<input type="button" class="reset-button button-secondary"  value="<?php _e('Restore Defaults','busi_prof');?>" onclick="reset_data_home('2')" />
		<div style="display:none; margin-left:300px; margin-top:-25px; padding:10px; color: #468847; background-color: #DFF0D8; border-color: #D6E9C6;" id="busiprof_settings_save_5_reset" ><?php _e('Options data successfully reset','busi_prof');?></div>
		<div style="display:none; margin-left:300px; margin-top:-25px; padding:10px; color: #468847; background-color: #DFF0D8; border-color: #D6E9C6;" id="busiprof_settings_save_5_success" ><?php _e('Options data successfully Saved','busi_prof');?></div>
	</div>
</form>