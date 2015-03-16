<?php
$current_options = get_option( 'busiprof_pro_theme_options' );
if(isset($_POST['busiprof_settings_save_tax']))
{		
	if($_POST['busiprof_settings_save_tax'] == 1) 
	{
		if ( empty($_POST) || !wp_verify_nonce($_POST['busiprof_gernalsetting_nonce_customization'],'busiprof_customization_nonce_gernalsetting') )
		{
			print 'Sorry, your nonce did not verify.';
			exit;
		}

		else  
		{					
			
			$current_options['taxonomy_portfolio_list']=sanitize_text_field($_POST['taxonomy_portfolio_list']);			
			update_option('busiprof_pro_theme_options' , $current_options);
		}
     }	
	 if($_POST['busiprof_settings_save_tax'] == 2) 
	 {	do_action('busiprof_restore_data','tax'); }
 }
 ?>
<form method="post" action = ""  id="theme_options_home_tax">
	<?php wp_nonce_field('busiprof_customization_nonce_gernalsetting','busiprof_gernalsetting_nonce_customization'); ?>
	<div class="postbox" id="Basic_setting_1">
		<div title="Click to toggle" class="handlediv"><br></div>		
		
		<div class="inside">			
			<p><h4 class="heading"><?php _e('Taxonomy Archive : ','busi_prof');?></h4>
				<?php $taxonomy_portfolio_list = $current_options['taxonomy_portfolio_list']; ?>		
					<select name="taxonomy_portfolio_list" >					
						<option value="2" <?php selected($taxonomy_portfolio_list, '2' ); ?>>2</option>
						<option value="3" <?php selected($taxonomy_portfolio_list, '3' ); ?>>3</option>
						<option value="4" <?php selected($taxonomy_portfolio_list, '4' ); ?>>4</option>
					</select>
				<span class="icon help">
					<span class="tooltip"><?php  _e('Select the Taxonomy Archive Column','busi_prof');?></span>
				</span>
			</p>
			
		</div>	
	</div>
	
	
<!---DATA SAVE------>
    <div id="busiprof_optionsframework-submit">         
		<input type="hidden" value="1" id="busiprof_settings_save_tax" name="busiprof_settings_save_tax" />
		<input type="button" class="button-primary"  value= "<?php _e('Save Changes', 'busi_prof');?>" onclick="datasave_home('tax')"/>									
		<input type="button" class="reset-button button-secondary"  value="<?php _e('Restore Defaults','busi_prof');?>" onclick="reset_data_home('tax')" />
		<div style="display:none; margin-left:300px; margin-top:-25px; padding:10px; color: #468847; background-color: #DFF0D8; border-color: #D6E9C6;" id="busiprof_settings_save_tax_reset" ><?php _e('Options data successfully reset','busi_prof');?></div>
		<div style="display:none; margin-left:300px; margin-top:-25px; padding:10px; color: #468847; background-color: #DFF0D8; border-color: #D6E9C6;" id="busiprof_settings_save_tax_success" ><?php _e('Options data successfully Saved','busi_prof');?></div>
	</div>
</form>