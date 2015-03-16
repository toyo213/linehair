<div class="block ui-tabs-panel deactive" id="option-ui-id-24" >	
	<?php $current_options = get_option('spicy_pro_options');
	if(isset($_POST['webriti_settings_save_24']))
	{	
		if($_POST['webriti_settings_save_24'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{
				$i=0;
				$val=($_POST['front_blog_selected_category_id']);
				foreach($val as $value)
				{
					$arr[$i]=$value;
					$i++;
				}
				$current_options['front_blog_title'] = sanitize_text_field($_POST['front_blog_title']);
				$current_options['front_blog_description']= sanitize_text_field($_POST['front_blog_description']);
				$current_options['front_blog_link_text'] = sanitize_text_field($_POST['front_blog_link_text']);
				$current_options['front_blog_link'] = esc_url_raw($_POST['front_blog_link']);
				$current_options['front_blog_link_target']=sanitize_text_field($_POST['front_blog_link_target']);
				$current_options['front_post_display_count']=sanitize_text_field($_POST['front_post_display_count']);
				$current_options['front_blog_selected_category_id']=$arr;
				
				// blog section enabled yes ya on
				if($_POST['front_blog_section_enabled'])
				{ echo $current_options['front_blog_section_enabled']= sanitize_text_field($_POST['front_blog_section_enabled']); } 
				else { echo $current_options['front_blog_section_enabled']="off"; }
				
				
				update_option('spicy_pro_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_24'] == 2) 
		{
			$current_options['front_blog_section_enabled']="on";
			$current_options['front_post_display_count']=3;
			$current_options['front_blog_title'] = __('Latest Work', 'spicy');
			$current_options['front_blog_description'] =__('Maecenas a mi nibh, eu euismod orc vivamus viverra lacus vitae tortor molestie malesuada. eu euismod orci. Vivamus viverra lacus vitae tortor molestie.', 'spicy');
			$current_options['front_blog_link_text'] = __('See all Works', 'spicy');
			$current_options['front_blog_link'] = "";
			$current_options['front_blog_link_target'] = "off";
			$current_options['front_blog_selected_category_id']=array(get_option('default_category'));
			
			update_option('spicy_pro_options',$current_options);
		}
	} 
	?>
	<form method="post" id="webriti_theme_options_24">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Blog','spicy');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_24_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_24_success" ><?php _e('Options data successfully Saved','spicy');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_24_reset" ><?php _e('Options data successfully reset','spicy');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('24');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('24')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		
		<div class="section">
			<h3><?php _e('Enable Home Blog Section','spicy'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['front_blog_section_enabled']=='on') echo "checked='checked'"; ?> id="front_blog_section_enabled" name="front_blog_section_enabled">
			<span class="explain"><?php _e('Enable blog on front page.','spicy'); ?></span>
		</div>
		
		<div class="section">
		<h3><?php _e('Number of blog on blog section','spicy');?></h3>
			<?php $front_post_display_count = $current_options['front_post_display_count']; ?>		
			<select name="front_post_display_count" class="webriti_inpute" >					
				<option value="3" <?php selected($front_post_display_count, '3' ); ?>>3</option>
				<option value="6" <?php selected($front_post_display_count, '6' ); ?>>6</option>
				<option value="9" <?php selected($front_post_display_count, '9' ); ?>>9</option>
				<option value="12" <?php selected($front_post_display_count, '12' ); ?>>12</option>
				<option value="15" <?php selected($front_post_display_count, '15' ); ?>>15</option>
				<option value="18" <?php selected($front_post_display_count, '18' ); ?>>18</option>
			</select>
			<span class="explain"><?php _e('Select number of blogs','spicy'); ?></span>
		</div>
		
		<div class="section">		
			<h3><?php _e('Blog Title','spicy'); ?></h3>
			<input class="webriti_inpute"  type="text" name="front_blog_title" id="front_blog_title" value="<?php echo $current_options['front_blog_title']; ?>" >
			<span class="explain"><?php _e('Enter the blog Title.','spicy'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Blog Description','spicy'); ?></h3>			
			<textarea rows="3" cols="8" id="front_blog_description" name="front_blog_description"><?php if($current_options['front_blog_description']!='') { echo esc_attr($current_options['front_blog_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the Blog Description.','spicy'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Blog More Button Text','spicy'); ?></h3>
			<input  class="webriti_inpute" type="text" name="front_blog_link_text" id="front_blog_link_text"  value="<?php echo $current_options['front_blog_link_text']; ?>" >
			<span class="explain"><?php _e('Enter the blog more button text.','spicy'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Blog More Link','spicy'); ?></h3>
			<input type="checkbox" <?php if($current_options['front_blog_link_target']=='on') echo "checked='checked'"; ?> id="front_blog_link_target" name="front_blog_link_target" > <span class="explain"><?php _e('Open link in a new window/tab.','spicy'); ?></span>
			<p>
			<input  class="webriti_inpute" type="text" name="front_blog_link" id="front_blog_link"  placeholder="Enter http://example.com" value="<?php echo $current_options['front_blog_link']; ?>" >
			<span class="explain"><?php _e('Enter the blog more button link.','spicy'); ?></span>
			</p>
		</div>
		
		<div class="section">
			<h3><?php _e('Select blog Category','spicy'); ?></h3>
			<select multiple id="front_blog_category" name="front_blog_selected_category_id[]"  style="height:auto;width:300px;" >
			<?php	
			$val=$current_options['front_blog_selected_category_id'];
			$cat_list = get_categories();
			foreach($cat_list as $value)
			{
			?>
			<option value="<?php echo $value->term_id; ?>" <?php if(in_array($value->term_id, $val)){ echo 'selected';} ?>  ><?php echo $value->name; ?></option>
			<?php } ?>
			</select>
		</div>

		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_24" name="webriti_settings_save_24" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('24');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('24')" >
		</div>
		<div class="webriti_spacer"></div>
	</form>
</div>