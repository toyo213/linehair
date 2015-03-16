<div class="block ui-tabs-panel active" id="option-ui-id-1" >
<?php $current_options = get_option('spicy_pro_options');
	if(isset($_POST['webriti_settings_save_1']))
	{	
		if($_POST['webriti_settings_save_1'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{	$current_options['front_page'] = sanitize_text_field($_POST['front_page']);
				$current_options['spicy_stylesheet']=sanitize_text_field($_POST['spicy_stylesheet']);
				$current_options['spicy_back_image'] =$_POST['spicy_back_image'];
				$current_options['upload_image_logo']=sanitize_text_field($_POST['upload_image_logo']);		
				$current_options['height']=sanitize_text_field($_POST['height']);
				$current_options['width']=sanitize_text_field($_POST['width']);
				$current_options['upload_image_favicon']=sanitize_text_field($_POST['upload_image_favicon']);
				$current_options['google_analytics'] = $_POST['google_analytics'];
				$current_options['webrit_custom_css'] =$_POST['webrit_custom_css'];			
				if($_POST['text_title'])
				{ echo $current_options['text_title']=sanitize_text_field($_POST['text_title']); } 
				else
				{ echo $current_options['text_title']="off"; }
				
				// Custom Background Enable
				if($_POST['custom_background_enabled'])
				{ echo $current_options['custom_background_enabled']=sanitize_text_field($_POST['custom_background_enabled']); } 
				else
				{ echo $current_options['custom_background_enabled']="off"; }
				
				update_option('spicy_pro_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_1'] == 2) 
		{
			$current_options['front_page'] = "on" ;
			$current_options['custom_background_enabled']="off";
			$current_options['spicy_stylesheet'] = "default.css";
			$current_options['spicy_back_image'] = "bg_img8.png";
			$current_options['upload_image_logo']="";
			$current_options['height']=50;
			$current_options['width']=250;
			$current_options['upload_image_favicon']="";
			$current_options['text_title']="on";			
			$current_options['google_analytics']="";
			$current_options['webrit_custom_css']="";		
			update_option('spicy_pro_options',$current_options);
		}
	}  ?>
	<?php $current_options['front_page']; ?>
	<form method="post" id="webriti_theme_options_1">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Quick Start Settings','spicy');?></h2></td>
				<td style="width:30%;">
					<div class="webriti_settings_loding" id="webriti_loding_1_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_1_success" ><?php _e('Options data successfully Saved','spicy');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_1_reset" ><?php _e('Options data successfully reset','spicy');?></div>
				</td>
				<td style="text-align:right;">					
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('1');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('1')" >
				</td>
				</tr>
			</table>			
		</div>	
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">
			<h3><?php _e('Enable Front Page','spicy'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['front_page']=='on') echo "checked='checked'"; ?> id="front_page" name="front_page" > <span class="explain"><?php _e('Enable front page .','spicy'); ?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Theme Color Schemes','spicy'); ?></h3>
			<?php $spicy_stylesheet = $current_options['spicy_stylesheet']; ?>	
			<select id="spicy_stylesheet" name="spicy_stylesheet" class="webriti_inpute">
				<option <?php echo selected($spicy_stylesheet, 'default.css' ); ?> ><?php _e('default.css','spicy'); ?></option>
				<option <?php echo selected($spicy_stylesheet, 'blue.css' ); ?> ><?php _e('blue.css','spicy'); ?></option>
				<option <?php echo selected($spicy_stylesheet, 'golden.css' ); ?> ><?php _e('golden.css','spicy'); ?></option>
				<option <?php echo selected($spicy_stylesheet, 'orange.css' ); ?> ><?php _e('orange.css','spicy'); ?></option>
				<option <?php echo selected($spicy_stylesheet, 'light-blue.css' ); ?> ><?php _e('light-blue.css','spicy'); ?></option>
				<option <?php echo selected($spicy_stylesheet, 'light-red.css' ); ?> ><?php _e('light-red.css','spicy'); ?></option>
				<option <?php echo selected($spicy_stylesheet, 'light-teal.css' ); ?> ><?php _e('light-teal.css','spicy'); ?></option>
				<option <?php echo selected($spicy_stylesheet, 'maroon.css' ); ?> ><?php _e('maroon.css','spicy'); ?></option>
			</select><span class="explain"><?php _e('Select color for you theme.','spicy');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Custom Background Enabled','spicy'); ?></h3>
			<input type="checkbox" <?php if($current_options['custom_background_enabled']=='on') echo "checked='checked'"; ?> id="custom_background_enabled" name="custom_background_enabled" ><span class="explain"><?php _e('Enable Custom Background (Add Custom Background Image)','spicy');?> <a href="<?php echo admin_url(); ?>themes.php?page=custom-background"><?php _e('Click Here','spicy');?></a>.</span>
		</div>
		<div class="section">
			<h3><?php _e('Default Background ','spicy');?></h3>
			<hr>
			<p><?php $spicy_back_image = $current_options['spicy_back_image']; ?>
			<input id="radio1" 	<?php if($spicy_back_image == "bg_img1.png") { echo "checked"; } ?> type="radio" name="spicy_back_image" value="bg_img1.png">
			<label for="radio1" <?php if($spicy_back_image == "bg_img1.png") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/bg-patterns/bg_img1.png" id="spicy_back_image" ></label>
			<input  id="radio2" <?php if($spicy_back_image == "bg_img2.png") { echo "checked"; } ?> type="radio" name="spicy_back_image" value="bg_img2.png">
			<label for="radio2" <?php if($spicy_back_image == "bg_img2.png") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/bg-patterns/bg_img2.png" id="spicy_back_image" ></label>
			<input  id="radio3" <?php if($spicy_back_image == "bg_img3.png") { echo "checked"; } ?> type="radio" name="spicy_back_image" value="bg_img3.png">
			<label for="radio3" <?php if($spicy_back_image == "bg_img3.png") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/bg-patterns/bg_img3.png" id="spicy_back_image" ></label>
			<input id="radio4" 	<?php if($spicy_back_image == "bg_img4.png") { echo "checked"; } ?> type="radio" name="spicy_back_image" value="bg_img4.png">
			<label for="radio4" <?php if($spicy_back_image == "bg_img4.png") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/bg-patterns/bg_img4.png" id="spicy_back_image" ></label>
			<br>
			<input  id="radio5" <?php if($spicy_back_image == "bg_img5.png") { echo "checked"; } ?> type="radio" name="spicy_back_image" value="bg_img5.png">
			<label for="radio5" <?php if($spicy_back_image == "bg_img5.png") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/bg-patterns/bg_img5.png" id="spicy_back_image" ></label>
			<input  id="radio6" <?php if($spicy_back_image == "bg_img6.png") { echo "checked"; } ?> type="radio" name="spicy_back_image" value="bg_img6.png">
			<label for="radio6" <?php if($spicy_back_image == "bg_img6.png") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/bg-patterns/bg_img6.png" id="spicy_back_image" ></label>
			<input id="radio7" 	<?php if($spicy_back_image == "bg_img7.png") { echo "checked"; } ?> type="radio" name="spicy_back_image" value="bg_img7.png">
			<label for="radio7" <?php if($spicy_back_image == "bg_img7.png") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/bg-patterns/bg_img7.png" id="spicy_back_image" ></label>
			<input  id="radio8" <?php if($spicy_back_image == "bg_img8.png") { echo "checked"; } ?> type="radio" name="spicy_back_image" value="bg_img8.png">
			<label for="radio8" <?php if($spicy_back_image == "bg_img8.png") { echo "checked"; } ?> ><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/bg-patterns/bg_img8.png" id="spicy_back_image" ></label>
			<p/>
		</div>
		
		<div class="section">
			<h3><?php _e('Custom Logo','spicy'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Add custom logo from here suggested size is 250X50 px','spicy');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['upload_image_logo']!='') { echo esc_attr($current_options['upload_image_logo']); } ?>" id="upload_image_logo" name="upload_image_logo" size="36" class="upload has-file"/>
			<input type="button" id="upload_button" value="Custom Logo" class="upload_image_button" />
			
			<?php if($current_options['upload_image_logo']!='') { ?>
			<p><img style="height:60px;width:100px;" src="<?php if($current_options['upload_image_logo']!='') { echo esc_attr($current_options['upload_image_logo']); } ?>" /></p>
			<?php } ?>
		</div>
		<div class="section">
			<h3><?php _e('Logo Height','spicy'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Default Logo Height : 50px, if you want to increase than specify your value','spicy'); ?></span></span>
			</h3>
			<input class="webriti_inpute"  type="text" name="height" id="height" value="<?php echo $current_options['height']; ?>" >						
		</div>
		<div class="section">
			<h3><?php _e('Logo Width','spicy'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Default Logo Width : 250px, if you want to increase than specify your value','spicy');?></span></span>
			</h3>
			<input  class="webriti_inpute" type="text" name="width" id="width"  value="<?php echo $current_options['width']; ?>" >			
		</div>
		<div class="section">
			<h3><?php _e('Text Title','spicy'); ?></h3>
			<input type="checkbox" <?php if($current_options['text_title']=='on') echo "checked='checked'"; ?> id="text_title" name="text_title" > <span class="explain"><?php _e('Enable text-based Site Title.   Setup title','spicy');?> <a href="<?php echo home_url( '/' ); ?>wp-admin/options-general.php"><?php _e('Click Here','spicy');?></a>.</span>
		</div>
		<div class="section">
			<h3><?php _e('Custom Favicon','spicy'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Make sure you upload .icon image type which is not more then 25X25 px.','spicy');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['upload_image_favicon']!='') { echo esc_attr($current_options['upload_image_favicon']); } ?>" id="upload_image_favicon" name="upload_image_favicon" size="36" class="upload has-file"/>
			<input type="button" id="upload_button" value="Favicon Icon" class="upload_image_button"  />			
			<?php if($current_options['upload_image_favicon']!='') { ?>
			<p><img style="height:60px;width:100px;" src="<?php  echo esc_attr($current_options['upload_image_favicon']);  ?>" /></p>
			<?php } ?>
		</div>
		<div class="section">
			<h3><?php _e('Google Tracking Code','spicy'); ?></h3>
			<textarea rows="8" cols="8" id="google_analytics" name="google_analytics" ><?php if($current_options['google_analytics']!='') { echo esc_attr($current_options['google_analytics']); } ?></textarea>
			<div class="explain"><?php _e('Paste your Google Analytics tracking code here. This will be added into themes footer. Copy only scripting code i.e no need to use script tag ','rambo'); ?><br></div>
		</div>
		<div class="section">
			<h3><?php _e('Custom css','spicy'); ?></h3>
			<textarea rows="8" cols="8" id="webrit_custom_css" name="webrit_custom_css"><?php if($current_options['webrit_custom_css']!='') { echo esc_attr($current_options['webrit_custom_css']); } ?></textarea>
			<div class="explain"><?php _e('This is a powerful feature provided here. No need to use custom css plugin, just paste your css code and see the magic.','spicy'); ?><br></div>
		</div>		
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_1" name="webriti_settings_save_1" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('1');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('1')" >
			<!--  alert massage when data saved and reset -->
		</div>
	</form>
	
	<style type="text/css">
		input[type=radio] {	display:none; margin:10px; }
		input[type=radio] + label {	display:inline-block;	margin:-2px;
			padding: 4px 12px;	background-color: #e7e7e7;	border-color: #ddd; }

		input[type=radio]:checked + label { 	background-image: none;
			background-color:#d0d0d0;
		}
		input[type=radio] + label, input[type=checkbox] + label {
			display:inline-block;	margin:-2px;	padding: 4px 12px;	margin-bottom: 0;
			font-size: 14px;	line-height: 20px;	color: #333;	text-align: center;
			text-shadow: 0 1px 1px rgba(255,255,255,0.75);
			vertical-align: middle;
			cursor: pointer;
			background-color: #f5f5f5;
			background-repeat: repeat-x;
			border: 0px solid #ccc;
			border-color: #e6e6e6 #e6e6e6 #bfbfbf;
			border-color: rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);
			border-bottom-color: #b3b3b3;
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff',endColorstr='#ffe6e6e6',GradientType=0);
			filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
			-webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
			-moz-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
			box-shadow: inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
		}

		 input[type=radio]:checked + label, input[type=checkbox]:checked + label{
			   background-image: none;
			outline: 0;
			-webkit-box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
			-moz-box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
			box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
				background-color:#e0e0e0;
		}
		#spicy_back_image
		{	border-radius: 7px;
			box-shadow: 0 0 2px #777777;
			cursor: pointer;
			display: block;
			height: 29px;
			width: 29px;"
		}
		</style>
	
</div>