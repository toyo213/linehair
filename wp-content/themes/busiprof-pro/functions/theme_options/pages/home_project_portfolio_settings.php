<div class="block ui-tabs-panel deactive" id="option-ui-id-4" >	
	<?php $current_options = get_option('spicy_pro_options');
	if(isset($_POST['webriti_settings_save_4']))
	{	
		if($_POST['webriti_settings_save_4'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{
				$i=0;
				$val=($_POST['front_portfolio_selected_category_id']);
				foreach($val as $value)
				{
					$arr[$i]=$value;
					$i++;
				}
				$current_options['front_portfolio_title'] = sanitize_text_field($_POST['front_portfolio_title']);
				$current_options['front_portfolio_description']= sanitize_text_field($_POST['front_portfolio_description']);
				$current_options['front_portfolio_link_text'] = sanitize_text_field($_POST['front_portfolio_link_text']);
				$current_options['front_portfolio_link'] = sanitize_text_field($_POST['front_portfolio_link']);
				$current_options['front_portfolio_link_target']=sanitize_text_field($_POST['front_portfolio_link_target']);
				$current_options['front_portfolio_list']=sanitize_text_field($_POST['front_portfolio_list']);
				$current_options['front_portfolio_selected_category_id']=$arr;
				
				// portfolio section enabled yes ya on
				if($_POST['front_portfolio_section_enabled'])
				{ echo $current_options['front_portfolio_section_enabled']= sanitize_text_field($_POST['front_portfolio_section_enabled']); } 
				else { echo $current_options['front_portfolio_section_enabled']="off"; } 
			
				update_option('spicy_pro_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_4'] == 2) 
		{
			$current_options['front_portfolio_section_enabled']="on";
			$current_options['front_portfolio_list']=3;
			$current_options['front_portfolio_title'] = __('Latest Work','spicy');
			$current_options['front_portfolio_description'] = __('Maecenas a mi nibh, eu euismod orc vivamus viverra lacus vitae tortor molestie malesuada. eu euismod orci. Vivamus viverra lacus vitae tortor molestie.', 'spicy');
			$current_options['front_portfolio_link_text'] = __('See all Works', 'spicy');
			$current_options['front_portfolio_link'] = "";
			$current_options['front_portfolio_link_target'] = "off";
			$current_options['front_portfolio_selected_category_id']=array(get_option('spicy_webriti_default_term_id'));
			
			update_option('spicy_pro_options',$current_options);
		}
	} 
	?>
	<form method="post" id="webriti_theme_options_4">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Portfolio ','spicy');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_4_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_4_success" ><?php _e('Options data successfully Saved','spicy');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_4_reset" ><?php _e('Options data successfully reset','spicy');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('4');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('4')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		
		<div class="section">
			<h3><?php _e('Enable Home Portfolio Section','spicy'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['front_portfolio_section_enabled']=='on') echo "checked='checked'"; ?> id="front_portfolio_section_enabled" name="front_portfolio_section_enabled">
			<span class="explain"><?php _e('Enable portfolio on front page.','spicy'); ?></span>
		</div>
		
		<div class="section">
		<h3><?php _e('Number of Portfolio on  project/portfolio section','spicy');?></h3>
			<?php $front_portfolio_list = $current_options['front_portfolio_list']; ?>		
			<select name="front_portfolio_list" class="webriti_inpute" >					
				<option value="3" <?php selected($front_portfolio_list, '3' ); ?>>3</option>
				<option value="6" <?php selected($front_portfolio_list, '6' ); ?>>6</option>
				<option value="9" <?php selected($front_portfolio_list, '9' ); ?>>9</option>
				<option value="12" <?php selected($front_portfolio_list, '12' ); ?>>12</option>
				<option value="15" <?php selected($front_portfolio_list, '15' ); ?>>15</option>
				<option value="18" <?php selected($front_portfolio_list, '18' ); ?>>18</option>
			</select>
			<span class="explain"><?php _e('Select number of potfolios','spicy'); ?></span>
		</div>
		
		<div class="section">		
			<h3><?php _e('Portfolio Title','spicy'); ?></h3>
			<input class="webriti_inpute"  type="text" name="front_portfolio_title" id="front_portfolio_title" value="<?php echo $current_options['front_portfolio_title']; ?>" >
			<span class="explain"><?php _e('Enter the Portfolio Title.','spicy'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Portfolio Description','spicy'); ?></h3>			
			<textarea rows="3" cols="8" id="front_portfolio_description" name="front_portfolio_description"><?php if($current_options['front_portfolio_description']!='') { echo esc_attr($current_options['front_portfolio_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the Portfolio Description.','spicy'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Portfolio More Button Text','spicy'); ?></h3>
			<input  class="webriti_inpute" type="text" name="front_portfolio_link_text" id="front_portfolio_link_text"  value="<?php echo $current_options['front_portfolio_link_text']; ?>" >
			<span class="explain"><?php _e('Enter the Portfolio more button text.','spicy'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Portfolio More Link','spicy'); ?></h3>
			<input type="checkbox" <?php if($current_options['front_portfolio_link_target']=='on') echo "checked='checked'"; ?> id="front_portfolio_link_target" name="front_portfolio_link_target" > <span class="explain"><?php _e('Open link in a new window/tab.','spicy'); ?></span>
			<p>
			<input  class="webriti_inpute" type="text" name="front_portfolio_link" id="front_portfolio_link"  placeholder="Enter http://example.com" value="<?php echo $current_options['front_portfolio_link']; ?>" >
			<span class="explain"><?php _e('Enter the Portfolio more button link.','spicy'); ?></span>
			</p>
		</div>
		
		<div class="section">		
			<h3><?php _e('Select Portfolio Category','spicy'); ?></h3>
			<select multiple id="front_portfolio_category" name="front_portfolio_selected_category_id[]"  style="height:auto;width:300px;" >
			<?php	
			$tax_terms=webriti_get_portfolio_terms();	
			
			$val=$current_options['front_portfolio_selected_category_id'];
			if(!$val)
			{
			$default_term_id=get_option('spicy_webriti_default_term_id');
			$arr[0]=$default_term_id;
			
			}	print_r($val);		
			foreach ($tax_terms  as $tax_term) { 
				$i=0;
				if($val){
				foreach($val as $value)
				{
				$arr[$i]=$value;
				$i++;
				}}
			?>
			<option value="<?php echo $tax_term->term_id; ?>" <?php if(in_array($tax_term->term_id,$arr) ){ echo 'selected'; } ?> ><?php echo $tax_term->name; ?></option>
			<?php
			
			} ?>
			</select>
		</div>

		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_4" name="webriti_settings_save_4" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('4');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('4')" >
		</div>
		<div class="webriti_spacer"></div>
	</form>
</div>