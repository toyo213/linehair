<div class="block ui-tabs-panel deactive" id="option-ui-id-12" >	
	<?php $current_options = get_option('spicy_pro_options');
	if(isset($_POST['webriti_settings_save_12']))
	{	
		if($_POST['webriti_settings_save_12'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{		
				if($_POST['enable_custom_typography'])
				{ 	$current_options['enable_custom_typography']= sanitize_text_field($_POST['enable_custom_typography']); } 
				else
				{  $current_options['enable_custom_typography']="off"; } 
				
				// general typography
				$current_options['general_typography_fontsize']=sanitize_text_field($_POST['general_typography_fontsize']);	
				$current_options['general_typography_fontfamily']=sanitize_text_field($_POST['general_typography_fontfamily']);	
				$current_options['general_typography_fontstyle']=sanitize_text_field($_POST['general_typography_fontstyle']);
				
				// menu title
				$current_options['menu_title_fontsize']=sanitize_text_field($_POST['menu_title_fontsize']);	
				$current_options['menu_title_fontfamily']=sanitize_text_field($_POST['menu_title_fontfamily']);	
				$current_options['menu_title_fontstyle']=sanitize_text_field($_POST['menu_title_fontstyle']);
				
				// post title
				$current_options['post_title_fontsize']=sanitize_text_field($_POST['post_title_fontsize']);	
				$current_options['post_title_fontfamily']=sanitize_text_field($_POST['post_title_fontfamily']);	
				$current_options['post_title_fontstyle']=sanitize_text_field($_POST['post_title_fontstyle']);
								
				// Service  title
				$current_options['service_title_fontsize']=sanitize_text_field($_POST['service_title_fontsize']);	
				$current_options['service_title_fontfamily']=sanitize_text_field($_POST['service_title_fontfamily']);	
				$current_options['service_title_fontstyle']=sanitize_text_field($_POST['service_title_fontstyle']);
				
				// Potfolio  title Widget Heading Title
				$current_options['portfolio_title_fontsize']=sanitize_text_field($_POST['portfolio_title_fontsize']);	
				$current_options['portfolio_title_fontfamily']=sanitize_text_field($_POST['portfolio_title_fontfamily']);	
				$current_options['portfolio_title_fontstyle']=sanitize_text_field($_POST['portfolio_title_fontstyle']);
				
				// Widget Heading Title
				$current_options['widget_title_fontsize']=sanitize_text_field($_POST['widget_title_fontsize']);	
				$current_options['widget_title_fontfamily']=sanitize_text_field($_POST['widget_title_fontfamily']);	
				$current_options['widget_title_fontstyle']=sanitize_text_field($_POST['widget_title_fontstyle']);
				
				// Call out area Title   
				$current_options['calloutarea_title_fontsize']=sanitize_text_field($_POST['calloutarea_title_fontsize']);	
				$current_options['calloutarea_title_fontfamily']=sanitize_text_field($_POST['calloutarea_title_fontfamily']);	
				$current_options['calloutarea_title_fontstyle']=sanitize_text_field($_POST['calloutarea_title_fontstyle']);
				
				// Call out area title     
				$current_options['calloutarea_description_fontsize']=sanitize_text_field($_POST['calloutarea_description_fontsize']);	
				$current_options['calloutarea_description_fontfamily']=sanitize_text_field($_POST['calloutarea_description_fontfamily']);	
				$current_options['calloutarea_description_fontstyle']=sanitize_text_field($_POST['calloutarea_description_fontstyle']);
								
				// Call out area purches button      
				$current_options['calloutarea_purches_fontsize']=sanitize_text_field($_POST['calloutarea_purches_fontsize']);	
				$current_options['calloutarea_purches_fontfamily']=sanitize_text_field($_POST['calloutarea_purches_fontfamily']);	
				$current_options['calloutarea_purches_fontstyle']=sanitize_text_field($_POST['calloutarea_purches_fontstyle']);
			
				update_option('spicy_pro_options', stripslashes_deep($current_options));
			
		}	
		}	
		if($_POST['webriti_settings_save_12'] == 2) 
		{
				
				// typography enabled yes ya on
				$current_options['enable_custom_typography']="off";
				// general typography
				$current_options['general_typography_fontsize']='15';
				$current_options['general_typography_fontfamily']='OpenSansRegular';
				$current_options['general_typography_fontstyle']="";
				
				// menu title
				$current_options['menu_title_fontsize']='14';
				$current_options['menu_title_fontfamily']='OpenSansSemiBold';
				$current_options['menu_title_fontstyle']="";
				
				// post title
				$current_options['post_title_fontsize']='22';
				$current_options['post_title_fontfamily']='OpenSansRegular';
				$current_options['post_title_fontstyle']= "";				
				
				// Service  title
				$current_options['service_title_fontsize']='18';
				$current_options['service_title_fontfamily']='OpenSansSemiBold';
				$current_options['service_title_fontstyle']="";
				
				// Potfolio  title Widget Heading Title
				$current_options['portfolio_title_fontsize']='14';
				$current_options['portfolio_title_fontfamily']='OpenSansRegular';
				$current_options['portfolio_title_fontstyle']="";
				
				// Widget Heading Title
				$current_options['widget_title_fontsize']='22';
				$current_options['widget_title_fontfamily']='OpenSansRegular';
				$current_options['widget_title_fontstyle']="";
				
				// Call out area Title   
				$current_options['calloutarea_title_fontsize']='30';
				$current_options['calloutarea_title_fontfamily']='OpenSansRegular';
				$current_options['calloutarea_title_fontstyle']="";
				
				// Call out area descritpion      
				$current_options['calloutarea_description_fontsize']='18';
				$current_options['calloutarea_description_fontfamily']='OpenSansRegular';
				$current_options['calloutarea_description_fontstyle']="";
				
				// Call out area purches button      
				$current_options['calloutarea_purches_fontsize'] = '15';	
				$current_options['calloutarea_purches_fontfamily'] = 'OpenSansBold';	
				$current_options['calloutarea_purches_fontstyle'] = '';
				
			update_option('spicy_pro_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_12">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Typography','spicy');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_12_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_12_success" ><?php _e('Options data successfully Saved','spicy');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_12_reset" ><?php _e('Options data successfully reset','spicy');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('12');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('12')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">
			<h3><?php _e('Enable Custom Typography','spicy');?></h3>
			<input type="checkbox" <?php if($current_options['enable_custom_typography']=='on') echo "checked='checked'"; ?> id="enable_custom_typography" name="enable_custom_typography" > <span class="explain"><?php _e('Enable the use of custom typography for your site.','spicy'); ?></span>
		</div>	
		<div class="section" id="General_Typography">
			<h3><?php _e('General Typography','spicy');?></h3>
			<?php $general_typography_fontsize = $current_options['general_typography_fontsize']; ?>
			<p><select name="general_typography_fontsize" id="general_typography_fontsize" class="select" >
					<?php for ($i = 9; $i <= 100; $i++) { ?><option value="<?php echo $i; ?>" <?php if ( $general_typography_fontsize == $i ) echo selected($general_typography_fontsize, $i ); ?> name=""><?php echo $i; ?></option><?php } ?>
				</select>
				<select  id="main_navigation"  class="select">
					<option value="px"><?php _e('px','spicy');?></option>
				</select>
			</p>
			<p><?php $general_typography_fontfamily = $current_options['general_typography_fontfamily']; ?>				
				<select id="" name="general_typography_fontfamily" class="select">
					<option value="DroidSansRegular" <?php selected($general_typography_fontfamily, 'DroidSansRegular' ); ?>>DroidSansRegular</option>
					<option value="OpenSansBold" <?php selected($general_typography_fontfamily, 'OpenSansBold' ); ?>>OpenSansBold</option>
					<option value="OpenSansSemiBold" <?php selected($general_typography_fontfamily, 'OpenSansSemiBold' ); ?>>OpenSansSemiBold</option>
					<option value="OpenSansBoldItalic" <?php selected($general_typography_fontfamily, 'OpenSansBoldItalic' ); ?>>OpenSansBoldItalic</option>
					<option value="OpenSansExtraBold" <?php selected($general_typography_fontfamily, 'OpenSansExtraBold' ); ?>>OpenSansExtraBold</option>
					<option value="OpenSansExtraBoldItalic" <?php selected($general_typography_fontfamily, 'OpenSansExtraBoldItalic' ); ?>>OpenSansExtraBoldItalic</option>
					<option value="OpenSansItalic" <?php selected($general_typography_fontfamily, 'OpenSansItalic' ); ?>>OpenSansItalic</option>
					<option value="OpenSansLight" <?php selected($general_typography_fontfamily, 'OpenSansLight' ); ?>>OpenSansLight</option>
					<option value="OpenSansLightItalic" <?php selected($general_typography_fontfamily, 'OpenSansLightItalic' ); ?>>OpenSansLightItalic</option>
					<option value="OpenSansRegular" <?php selected($general_typography_fontfamily, 'OpenSansRegular' ); ?>>OpenSansRegular</option>
					<option value="OpenSansSemiboldItalic" <?php selected($general_typography_fontfamily, 'OpenSansSemiboldItalic' ); ?>>OpenSansSemiboldItalic</option>
					<option value="dosisBold" <?php selected($general_typography_fontfamily, 'dosisBold' ); ?>>dosisBold</option>
					<option value="dosisBook" <?php selected($general_typography_fontfamily, 'dosisBook' ); ?>>dosisBook</option>
					<option value="dosisExtraBold" <?php selected($general_typography_fontfamily, 'dosisExtraBold' ); ?>>dosisExtraBold</option>
					<option value="dosisExtraLight" <?php selected($general_typography_fontfamily, 'dosisExtraLight' ); ?>>dosisExtraLight</option>
					<option value="dosisLight" <?php selected($general_typography_fontfamily, 'dosisLight' ); ?>>dosisLight</option>
					<option value="dosisMedium" <?php selected($general_typography_fontfamily, 'dosisMedium' ); ?>>dosisMedium</option>
					<option value="dosisSemiBold" <?php selected($general_typography_fontfamily, 'dosisSemiBold' ); ?>>dosisSemiBold</option>
					<option value="Philosopher-Regular" <?php selected($general_typography_fontfamily, 'Philosopher-Regular' ); ?>>Philosopher-Regular</option>
					<option value="Glametrix" <?php selected($general_typography_fontfamily, 'Glametrix' ); ?>>Glametrix</option>
					<option value="GlametrixBold" <?php selected($general_typography_fontfamily, 'GlametrixBold' ); ?>>GlametrixBold</option>
					<option value="GlametrixLight" <?php selected($general_typography_fontfamily, 'GlametrixLight' ); ?>>GlametrixLight</option>
					<option value="Courgette" <?php selected($general_typography_fontfamily, 'Courgette' ); ?>>Courgette</option>
					<option value="Fely" <?php selected($general_typography_fontfamily, 'Fely' ); ?>>Fely</option>
					<option value="Montserrat" <?php selected($general_typography_fontfamily, 'Montserrat' ); ?>>Montserrat</option>
					<option value="Roadway" <?php selected($general_typography_fontfamily, 'Roadway' ); ?>>Roadway</option>
					<option value="libelsuit" <?php selected($general_typography_fontfamily, 'libelsuit' ); ?>>libelsuit</option>
					<option value="DustismoRegular" <?php selected($general_typography_fontfamily, 'DustismoRegular' ); ?>>DustismoRegular</option>
					<option value="DustismoItalic" <?php selected($general_typography_fontfamily, 'DustismoItalic' ); ?>>DustismoItalic</option>
					<option value="DustismoBold" <?php selected($general_typography_fontfamily, 'DustismoBold' ); ?>>DustismoBold</option>
					<option value="dustismoBoldItalic" <?php selected($general_typography_fontfamily, 'dustismoBoldItalic' ); ?>>dustismoBoldItalic</option>
					<option value="AlegreyaSansRegular" <?php selected($general_typography_fontfamily, 'AlegreyaSansRegular' ); ?>>AlegreyaSansRegular</option>
					
					<option value="AlegreyaSansMedium" <?php selected($general_typography_fontfamily, 'AlegreyaSansMedium' ); ?>>AlegreyaSansMedium</option>
					<option value="AlegreyaSansItalic" <?php selected($general_typography_fontfamily, 'AlegreyaSansItalic' ); ?>>AlegreyaSansItalic</option>
					<option value="AlegreyaSansBold" <?php selected($general_typography_fontfamily, 'AlegreyaSansBold' ); ?>>AlegreyaSansBold</option>
				</select>	
					<?php $general_typography_fontstyle = $current_options['general_typography_fontstyle']; ?>
				<select id="general_typography_fontstyle" name="general_typography_fontstyle" class="select">
					<option value="normal" <?php selected($general_typography_fontstyle, 'normal' ); ?>><?php _e('Normal','spicy'); ?></option>
					<option value="italic" <?php selected($general_typography_fontstyle, 'italic' ); ?>><?php _e('Italic','spicy'); ?></option>
				</select>
			</p>			
		</div>	
		<div class="section" id="menus_title">
			<h3><?php _e('Menu','spicy');?></h3>
			<?php $menu_title_fontsize = $current_options['menu_title_fontsize']; ?>
			<p>	<select name="menu_title_fontsize" id="menu_title_fontsize" class="select" >
					<?php for ($i = 9; $i <= 100; $i++) { ?><option value="<?php echo $i; ?>" <?php if ( $menu_title_fontsize == $i ) echo selected($menu_title_fontsize, $i ); ?> name=""><?php echo $i; ?></option><?php } ?>
				</select>
				<select  id="main_navigation"  class="select">
					<option value="px"><?php _e('px','spicy');?></option>
				</select>
			</p>
			<p><?php $menu_title_fontfamily = $current_options['menu_title_fontfamily']; ?>
				<select id="" name="menu_title_fontfamily" class="select">
					<option value="DroidSansRegular" <?php selected($menu_title_fontfamily, 'DroidSansRegular' ); ?>>DroidSansRegular</option>
					<option value="OpenSansBold" <?php selected($menu_title_fontfamily, 'OpenSansBold' ); ?>>OpenSansBold</option>
					<option value="OpenSansSemiBold" <?php selected($menu_title_fontfamily, 'OpenSansSemiBold' ); ?>>OpenSansSemiBold</option>
					<option value="OpenSansBoldItalic" <?php selected($menu_title_fontfamily, 'OpenSansBoldItalic' ); ?>>OpenSansBoldItalic</option>
					<option value="OpenSansExtraBold" <?php selected($menu_title_fontfamily, 'OpenSansExtraBold' ); ?>>OpenSansExtraBold</option>
					<option value="OpenSansExtraBoldItalic" <?php selected($menu_title_fontfamily, 'OpenSansExtraBoldItalic' ); ?>>OpenSansExtraBoldItalic</option>
					<option value="OpenSansItalic" <?php selected($menu_title_fontfamily, 'OpenSansItalic' ); ?>>OpenSansItalic</option>
					<option value="OpenSansLight" <?php selected($menu_title_fontfamily, 'OpenSansLight' ); ?>>OpenSansLight</option>
					<option value="OpenSansLightItalic" <?php selected($menu_title_fontfamily, 'OpenSansLightItalic' ); ?>>OpenSansLightItalic</option>
					<option value="OpenSansRegular" <?php selected($menu_title_fontfamily, 'OpenSansRegular' ); ?>>OpenSansRegular</option>
					<option value="OpenSansSemiboldItalic" <?php selected($menu_title_fontfamily, 'OpenSansSemiboldItalic' ); ?>>OpenSansSemiboldItalic</option>
					<option value="dosisBold" <?php selected($menu_title_fontfamily, 'dosisBold' ); ?>>dosisBold</option>
					<option value="dosisBook" <?php selected($menu_title_fontfamily, 'dosisBook' ); ?>>dosisBook</option>
					<option value="dosisExtraBold" <?php selected($menu_title_fontfamily, 'dosisExtraBold' ); ?>>dosisExtraBold</option>
					<option value="dosisExtraLight" <?php selected($menu_title_fontfamily, 'dosisExtraLight' ); ?>>dosisExtraLight</option>
					<option value="dosisLight" <?php selected($menu_title_fontfamily, 'dosisLight' ); ?>>dosisLight</option>
					<option value="dosisMedium" <?php selected($menu_title_fontfamily, 'dosisMedium' ); ?>>dosisMedium</option>
					<option value="dosisSemiBold" <?php selected($menu_title_fontfamily, 'dosisSemiBold' ); ?>>dosisSemiBold</option>
					<option value="Philosopher-Regular" <?php selected($menu_title_fontfamily, 'Philosopher-Regular' ); ?>>Philosopher-Regular</option>
					<option value="Glametrix" <?php selected($menu_title_fontfamily, 'Glametrix' ); ?>>Glametrix</option>
					<option value="GlametrixBold" <?php selected($menu_title_fontfamily, 'GlametrixBold' ); ?>>GlametrixBold</option>
					<option value="GlametrixLight" <?php selected($menu_title_fontfamily, 'GlametrixLight' ); ?>>GlametrixLight</option>
					<option value="Courgette" <?php selected($menu_title_fontfamily, 'Courgette' ); ?>>Courgette</option>
					<option value="Fely" <?php selected($menu_title_fontfamily, 'Fely' ); ?>>Fely</option>
					<option value="Montserrat" <?php selected($menu_title_fontfamily, 'Montserrat' ); ?>>Montserrat</option>
					<option value="Roadway" <?php selected($menu_title_fontfamily, 'Roadway' ); ?>>Roadway</option>
					<option value="libelsuit" <?php selected($menu_title_fontfamily, 'libelsuit' ); ?>>libelsuit</option>
					<option value="DustismoRegular" <?php selected($menu_title_fontfamily, 'DustismoRegular' ); ?>>DustismoRegular</option>
					<option value="DustismoItalic" <?php selected($menu_title_fontfamily, 'DustismoItalic' ); ?>>DustismoItalic</option>
					<option value="DustismoBold" <?php selected($menu_title_fontfamily, 'DustismoBold' ); ?>>DustismoBold</option>
					<option value="dustismoBoldItalic" <?php selected($menu_title_fontfamily, 'dustismoBoldItalic' ); ?>>dustismoBoldItalic</option>
					<option value="AlegreyaSansRegular" <?php selected($menu_title_fontfamily, 'AlegreyaSansRegular' ); ?>>AlegreyaSansRegular</option>
					<option value="AlegreyaSansMedium" <?php selected($menu_title_fontfamily, 'AlegreyaSansMedium' ); ?>>AlegreyaSansMedium</option>
					<option value="AlegreyaSansItalic" <?php selected($menu_title_fontfamily, 'AlegreyaSansItalic' ); ?>>AlegreyaSansItalic</option>
					<option value="AlegreyaSansBold" <?php selected($menu_title_fontfamily, 'AlegreyaSansBold' ); ?>>AlegreyaSansBold</option>
				</select>
				<?php $menu_title_fontstyle = $current_options['menu_title_fontstyle']; ?>
				<select id="menu_title_fontstyle" name="menu_title_fontstyle" class="select">
					<option value="normal" <?php selected($menu_title_fontstyle); ?>><?php _e('Normal','spicy'); ?></option>
					<option value="italic" <?php selected($menu_title_fontstyle); ?>><?php _e('Italic','spicy'); ?></option>
				</select>
			</p>
		</div>
		<div class="section" id="Post_title">
			<h3><?php _e('Post And Page Title','spicy');?></h3>
			<?php $post_title_fontsize = $current_options['post_title_fontsize']; ?>
			<p>	<select name="post_title_fontsize" id="post_title_fontsize" class="select" >
					<?php for ($i = 9; $i <= 100; $i++) { ?><option value="<?php echo $i; ?>" <?php if ( $post_title_fontsize == $i ) echo selected($post_title_fontsize, $i ); ?> name=""><?php echo $i; ?></option><?php } ?>
				</select>
				<select  id="main_navigation"  class="select">
					<option value="px"><?php _e('px','spicy');?></option>
				</select>
			</p>
			<p><?php $post_title_fontfamily = $current_options['post_title_fontfamily']; ?>	
				<select id="" name="post_title_fontfamily" class="select">
					<option value="DroidSansRegular" <?php selected($post_title_fontfamily, 'DroidSansRegular' ); ?>>DroidSansRegular</option>
					<option value="OpenSansBold" <?php selected($post_title_fontfamily, 'OpenSansBold' ); ?>>OpenSansBold</option>
					<option value="OpenSansSemiBold" <?php selected($post_title_fontfamily, 'OpenSansSemiBold' ); ?>>OpenSansSemiBold</option>
					<option value="OpenSansBoldItalic" <?php selected($post_title_fontfamily, 'OpenSansBoldItalic' ); ?>>OpenSansBoldItalic</option>
					<option value="OpenSansExtraBold" <?php selected($post_title_fontfamily, 'OpenSansExtraBold' ); ?>>OpenSansExtraBold</option>
					<option value="OpenSansExtraBoldItalic" <?php selected($post_title_fontfamily, 'OpenSansExtraBoldItalic' ); ?>>OpenSansExtraBoldItalic</option>
					<option value="OpenSansItalic" <?php selected($post_title_fontfamily, 'OpenSansItalic' ); ?>>OpenSansItalic</option>
					<option value="OpenSansLight" <?php selected($post_title_fontfamily, 'OpenSansLight' ); ?>>OpenSansLight</option>
					<option value="OpenSansLightItalic" <?php selected($post_title_fontfamily, 'OpenSansLightItalic' ); ?>>OpenSansLightItalic</option>
					<option value="OpenSansRegular" <?php selected($post_title_fontfamily, 'OpenSansRegular' ); ?>>OpenSansRegular</option>
					<option value="OpenSansSemiboldItalic" <?php selected($post_title_fontfamily, 'OpenSansSemiboldItalic' ); ?>>OpenSansSemiboldItalic</option>
					<option value="dosisBold" <?php selected($post_title_fontfamily, 'dosisBold' ); ?>>dosisBold</option>
					<option value="dosisBook" <?php selected($post_title_fontfamily, 'dosisBook' ); ?>>dosisBook</option>
					<option value="dosisExtraBold" <?php selected($post_title_fontfamily, 'dosisExtraBold' ); ?>>dosisExtraBold</option>
					<option value="dosisExtraLight" <?php selected($post_title_fontfamily, 'dosisExtraLight' ); ?>>dosisExtraLight</option>
					<option value="dosisLight" <?php selected($post_title_fontfamily, 'dosisLight' ); ?>>dosisLight</option>
					<option value="dosisMedium" <?php selected($post_title_fontfamily, 'dosisMedium' ); ?>>dosisMedium</option>
					<option value="dosisSemiBold" <?php selected($post_title_fontfamily, 'dosisSemiBold' ); ?>>dosisSemiBold</option>
					<option value="Philosopher-Regular" <?php selected($post_title_fontfamily, 'Philosopher-Regular' ); ?>>Philosopher-Regular</option>
					<option value="Glametrix" <?php selected($post_title_fontfamily, 'Glametrix' ); ?>>Glametrix</option>
					<option value="GlametrixBold" <?php selected($post_title_fontfamily, 'GlametrixBold' ); ?>>GlametrixBold</option>
					<option value="GlametrixLight" <?php selected($post_title_fontfamily, 'GlametrixLight' ); ?>>GlametrixLight</option>
					<option value="Courgette" <?php selected($post_title_fontfamily, 'Courgette' ); ?>>Courgette</option>
					<option value="Fely" <?php selected($post_title_fontfamily, 'Fely' ); ?>>Fely</option>
					<option value="Montserrat" <?php selected($post_title_fontfamily, 'Montserrat' ); ?>>Montserrat</option>
					<option value="Roadway" <?php selected($post_title_fontfamily, 'Roadway' ); ?>>Roadway</option>
					<option value="libelsuit" <?php selected($post_title_fontfamily, 'libelsuit' ); ?>>libelsuit</option>
					<option value="DustismoRegular" <?php selected($post_title_fontfamily, 'DustismoRegular' ); ?>>DustismoRegular</option>
					<option value="DustismoItalic" <?php selected($post_title_fontfamily, 'DustismoItalic' ); ?>>DustismoItalic</option>
					<option value="DustismoBold" <?php selected($post_title_fontfamily, 'DustismoBold' ); ?>>DustismoBold</option>
					<option value="dustismoBoldItalic" <?php selected($post_title_fontfamily, 'dustismoBoldItalic' ); ?>>dustismoBoldItalic</option>
					<option value="AlegreyaSansRegular" <?php selected($post_title_fontfamily, 'AlegreyaSansRegular' ); ?>>AlegreyaSansRegular</option>
					<option value="AlegreyaSansMedium" <?php selected($post_title_fontfamily, 'AlegreyaSansMedium' ); ?>>AlegreyaSansMedium</option>
					<option value="AlegreyaSansItalic" <?php selected($post_title_fontfamily, 'AlegreyaSansItalic' ); ?>>AlegreyaSansItalic</option>
					<option value="AlegreyaSansBold" <?php selected($post_title_fontfamily, 'AlegreyaSansBold' ); ?>>AlegreyaSansBold</option>
				</select>
				<?php $post_title_fontstyle = $current_options['post_title_fontstyle']; ?>
				<select id="post_title_fontstyle" name="post_title_fontstyle" class="select">
					<option value="normal" <?php selected($post_title_fontstyle); ?>><?php _e('Normal','spicy'); ?></option>
					<option value="italic" <?php selected($post_title_fontstyle); ?>><?php _e('Italic','spicy'); ?></option>
				</select>
			</p>
		</div>		
		<div class="section" id="service_title">
			<h3><?php _e('Service Title','spicy');?></h3>
			<?php $service_title_fontsize = $current_options['service_title_fontsize']; ?>
			<p>	<select name="service_title_fontsize" id="service_title_fontsize" class="select" >
					<?php for ($i = 9; $i <= 100; $i++) { ?><option value="<?php echo $i; ?>" <?php if ( $service_title_fontsize == $i ) echo selected($service_title_fontsize, $i ); ?> name=""><?php echo $i; ?></option><?php } ?>
				</select>
				<select  id="main_navigation"  class="select">
					<option value="px"><?php _e('px','spicy');?></option>
				</select>
			</p>
			<p><?php $service_title_fontfamily = $current_options['service_title_fontfamily']; ?>	
				<select id="" name="service_title_fontfamily" class="select">
					<option value="DroidSansRegular" <?php selected($service_title_fontfamily, 'DroidSansRegular' ); ?>>DroidSansRegular</option>
					<option value="OpenSansBold" <?php selected($service_title_fontfamily, 'OpenSansBold' ); ?>>OpenSansBold</option>
					<option value="OpenSansSemiBold" <?php selected($service_title_fontfamily, 'OpenSansSemiBold' ); ?>>OpenSansSemiBold</option>
					<option value="OpenSansBoldItalic" <?php selected($service_title_fontfamily, 'OpenSansBoldItalic' ); ?>>OpenSansBoldItalic</option>
					<option value="OpenSansExtraBold" <?php selected($service_title_fontfamily, 'OpenSansExtraBold' ); ?>>OpenSansExtraBold</option>
					<option value="OpenSansExtraBoldItalic" <?php selected($service_title_fontfamily, 'OpenSansExtraBoldItalic' ); ?>>OpenSansExtraBoldItalic</option>
					<option value="OpenSansItalic" <?php selected($service_title_fontfamily, 'OpenSansItalic' ); ?>>OpenSansItalic</option>
					<option value="OpenSansLight" <?php selected($service_title_fontfamily, 'OpenSansLight' ); ?>>OpenSansLight</option>
					<option value="OpenSansLightItalic" <?php selected($service_title_fontfamily, 'OpenSansLightItalic' ); ?>>OpenSansLightItalic</option>
					<option value="OpenSansRegular" <?php selected($service_title_fontfamily, 'OpenSansRegular' ); ?>>OpenSansRegular</option>
					<option value="OpenSansSemiboldItalic" <?php selected($service_title_fontfamily, 'OpenSansSemiboldItalic' ); ?>>OpenSansSemiboldItalic</option>
					<option value="dosisBold" <?php selected($service_title_fontfamily, 'dosisBold' ); ?>>dosisBold</option>
					<option value="dosisBook" <?php selected($service_title_fontfamily, 'dosisBook' ); ?>>dosisBook</option>
					<option value="dosisExtraBold" <?php selected($service_title_fontfamily, 'dosisExtraBold' ); ?>>dosisExtraBold</option>
					<option value="dosisExtraLight" <?php selected($service_title_fontfamily, 'dosisExtraLight' ); ?>>dosisExtraLight</option>
					<option value="dosisLight" <?php selected($service_title_fontfamily, 'dosisLight' ); ?>>dosisLight</option>
					<option value="dosisMedium" <?php selected($service_title_fontfamily, 'dosisMedium' ); ?>>dosisMedium</option>
					<option value="dosisSemiBold" <?php selected($service_title_fontfamily, 'dosisSemiBold' ); ?>>dosisSemiBold</option>
					<option value="Philosopher-Regular" <?php selected($service_title_fontfamily, 'Philosopher-Regular' ); ?>>Philosopher-Regular</option>
					<option value="Glametrix" <?php selected($service_title_fontfamily, 'Glametrix' ); ?>>Glametrix</option>
					<option value="GlametrixBold" <?php selected($service_title_fontfamily, 'GlametrixBold' ); ?>>GlametrixBold</option>
					<option value="GlametrixLight" <?php selected($service_title_fontfamily, 'GlametrixLight' ); ?>>GlametrixLight</option>
					<option value="Courgette" <?php selected($service_title_fontfamily, 'Courgette' ); ?>>Courgette</option>
					<option value="Fely" <?php selected($service_title_fontfamily, 'Fely' ); ?>>Fely</option>
					<option value="Montserrat" <?php selected($service_title_fontfamily, 'Montserrat' ); ?>>Montserrat</option>
					<option value="Roadway" <?php selected($service_title_fontfamily, 'Roadway' ); ?>>Roadway</option>
					<option value="libelsuit" <?php selected($service_title_fontfamily, 'libelsuit' ); ?>>libelsuit</option>
					<option value="DustismoRegular" <?php selected($service_title_fontfamily, 'DustismoRegular' ); ?>>DustismoRegular</option>
					<option value="DustismoItalic" <?php selected($service_title_fontfamily, 'DustismoItalic' ); ?>>DustismoItalic</option>
					<option value="DustismoBold" <?php selected($service_title_fontfamily, 'DustismoBold' ); ?>>DustismoBold</option>
					<option value="dustismoBoldItalic" <?php selected($service_title_fontfamily, 'dustismoBoldItalic' ); ?>>dustismoBoldItalic</option>
					<option value="AlegreyaSansRegular" <?php selected($service_title_fontfamily, 'AlegreyaSansRegular' ); ?>>AlegreyaSansRegular</option>
					<option value="AlegreyaSansMedium" <?php selected($service_title_fontfamily, 'AlegreyaSansMedium' ); ?>>AlegreyaSansMedium</option>
					<option value="AlegreyaSansItalic" <?php selected($service_title_fontfamily, 'AlegreyaSansItalic' ); ?>>AlegreyaSansItalic</option>
					<option value="AlegreyaSansBold" <?php selected($service_title_fontfamily, 'AlegreyaSansBold' ); ?>>AlegreyaSansBold</option>
				</select>
				<?php $service_title_fontstyle = $current_options['service_title_fontstyle']; ?>
				<select id="service_title_fontstyle" name="service_title_fontstyle" class="select">
					<option value="normal" <?php selected($service_title_fontstyle); ?>><?php _e('Normal','spicy'); ?></option>
					<option value="italic" <?php selected($service_title_fontstyle); ?>><?php _e('Italic','spicy'); ?></option>
				</select>
			</p>
		</div>
		<div class="section" id="portfolio_title">
			<h3><?php _e('Portfolio Title','spicy');?></h3>
			<?php  $portfolio_title_fontsize = $current_options['portfolio_title_fontsize']; ?>
			<p>	<select name="portfolio_title_fontsize" id="portfolio_title_fontsize" class="select" >
					<?php for ($i = 9; $i <= 100; $i++) { ?><option value="<?php echo $i; ?>" <?php if ( $portfolio_title_fontsize == $i ) echo selected($portfolio_title_fontsize, $i ); ?> ><?php echo $i; ?></option><?php } ?>
				</select>
				<select  id="main_navigation"  class="select">
					<option value="px"><?php _e('px','spicy');?></option>
				</select>
			</p>
			<p><?php $portfolio_title_fontfamily = $current_options['portfolio_title_fontfamily']; ?>	
				<select id="" name="portfolio_title_fontfamily" class="select">
					<option value="DroidSansRegular" <?php selected($portfolio_title_fontfamily, 'DroidSansRegular' ); ?>>DroidSansRegular</option>
					<option value="OpenSansBold" <?php selected($portfolio_title_fontfamily, 'OpenSansBold' ); ?>>OpenSansBold</option>
					<option value="OpenSansSemiBold" <?php selected($portfolio_title_fontfamily, 'OpenSansSemiBold' ); ?>>OpenSansSemiBold</option>
					<option value="OpenSansBoldItalic" <?php selected($portfolio_title_fontfamily, 'OpenSansBoldItalic' ); ?>>OpenSansBoldItalic</option>
					<option value="OpenSansExtraBold" <?php selected($portfolio_title_fontfamily, 'OpenSansExtraBold' ); ?>>OpenSansExtraBold</option>
					<option value="OpenSansExtraBoldItalic" <?php selected($portfolio_title_fontfamily, 'OpenSansExtraBoldItalic' ); ?>>OpenSansExtraBoldItalic</option>
					<option value="OpenSansItalic" <?php selected($portfolio_title_fontfamily, 'OpenSansItalic' ); ?>>OpenSansItalic</option>
					<option value="OpenSansLight" <?php selected($portfolio_title_fontfamily, 'OpenSansLight' ); ?>>OpenSansLight</option>
					<option value="OpenSansLightItalic" <?php selected($portfolio_title_fontfamily, 'OpenSansLightItalic' ); ?>>OpenSansLightItalic</option>
					<option value="OpenSansRegular" <?php selected($portfolio_title_fontfamily, 'OpenSansRegular' ); ?>>OpenSansRegular</option>
					<option value="OpenSansSemiboldItalic" <?php selected($portfolio_title_fontfamily, 'OpenSansSemiboldItalic' ); ?>>OpenSansSemiboldItalic</option>
					<option value="dosisBold" <?php selected($portfolio_title_fontfamily, 'dosisBold' ); ?>>dosisBold</option>
					<option value="dosisBook" <?php selected($portfolio_title_fontfamily, 'dosisBook' ); ?>>dosisBook</option>
					<option value="dosisExtraBold" <?php selected($portfolio_title_fontfamily, 'dosisExtraBold' ); ?>>dosisExtraBold</option>
					<option value="dosisExtraLight" <?php selected($portfolio_title_fontfamily, 'dosisExtraLight' ); ?>>dosisExtraLight</option>
					<option value="dosisLight" <?php selected($portfolio_title_fontfamily, 'dosisLight' ); ?>>dosisLight</option>
					<option value="dosisMedium" <?php selected($portfolio_title_fontfamily, 'dosisMedium' ); ?>>dosisMedium</option>
					<option value="dosisSemiBold" <?php selected($portfolio_title_fontfamily, 'dosisSemiBold' ); ?>>dosisSemiBold</option>
					<option value="Philosopher-Regular" <?php selected($portfolio_title_fontfamily, 'Philosopher-Regular' ); ?>>Philosopher-Regular</option>
					<option value="Glametrix" <?php selected($portfolio_title_fontfamily, 'Glametrix' ); ?>>Glametrix</option>
					<option value="GlametrixBold" <?php selected($portfolio_title_fontfamily, 'GlametrixBold' ); ?>>GlametrixBold</option>
					<option value="GlametrixLight" <?php selected($portfolio_title_fontfamily, 'GlametrixLight' ); ?>>GlametrixLight</option>
					<option value="Courgette" <?php selected($portfolio_title_fontfamily, 'Courgette' ); ?>>Courgette</option>
					<option value="Fely" <?php selected($portfolio_title_fontfamily, 'Fely' ); ?>>Fely</option>
					<option value="Montserrat" <?php selected($portfolio_title_fontfamily, 'Montserrat' ); ?>>Montserrat</option>
					<option value="Roadway" <?php selected($portfolio_title_fontfamily, 'Roadway' ); ?>>Roadway</option>
					<option value="libelsuit" <?php selected($portfolio_title_fontfamily, 'libelsuit' ); ?>>libelsuit</option>
					<option value="DustismoRegular" <?php selected($portfolio_title_fontfamily, 'DustismoRegular' ); ?>>DustismoRegular</option>
					<option value="DustismoItalic" <?php selected($portfolio_title_fontfamily, 'DustismoItalic' ); ?>>DustismoItalic</option>
					<option value="DustismoBold" <?php selected($portfolio_title_fontfamily, 'DustismoBold' ); ?>>DustismoBold</option>
					<option value="dustismoBoldItalic" <?php selected($portfolio_title_fontfamily, 'dustismoBoldItalic' ); ?>>dustismoBoldItalic</option>
					<option value="AlegreyaSansRegular" <?php selected($portfolio_title_fontfamily, 'AlegreyaSansRegular' ); ?>>AlegreyaSansRegular</option>
					<option value="AlegreyaSansMedium" <?php selected($portfolio_title_fontfamily, 'AlegreyaSansMedium' ); ?>>AlegreyaSansMedium</option>
					<option value="AlegreyaSansItalic" <?php selected($portfolio_title_fontfamily, 'AlegreyaSansItalic' ); ?>>AlegreyaSansItalic</option>
					<option value="AlegreyaSansBold" <?php selected($portfolio_title_fontfamily, 'AlegreyaSansBold' ); ?>>AlegreyaSansBold</option>
				</select>
				<?php $portfolio_title_fontstyle = $current_options['portfolio_title_fontstyle']; ?>	
				<select id="portfolio_title_fontstyle" name="portfolio_title_fontstyle" class="select">
					<option value="normal" <?php selected($portfolio_title_fontstyle); ?>><?php _e('Normal','spicy'); ?></option>
					<option value="italic" <?php selected($portfolio_title_fontstyle); ?>><?php _e('Italic','spicy'); ?></option>
				</select>
			</p>
		</div>
		<div class="section" id="widget_title">
			<h3><?php _e('Widget Heading Title','spicy');?></h3>
			<?php  $widget_title_fontsize = $current_options['widget_title_fontsize']; ?>
			<p>	<select name="widget_title_fontsize" id="widget_title_fontsize" class="select" >
					<?php for ($i = 9; $i <= 100; $i++) { ?><option value="<?php echo $i; ?>" <?php if ( $widget_title_fontsize == $i ) echo selected($widget_title_fontsize, $i ); ?> ><?php echo $i; ?></option><?php } ?>
				</select>
				<select  id="main_navigation"  class="select">
					<option value="px"><?php _e('px','spicy');?></option>
				</select>
			</p>
			<p><?php $widget_title_fontfamily = $current_options['widget_title_fontfamily']; ?>
				<select id="" name="widget_title_fontfamily" class="select">
					<option value="DroidSansRegular" <?php selected($widget_title_fontfamily, 'DroidSansRegular' ); ?>>DroidSansRegular</option>
					<option value="OpenSansBold" <?php selected($widget_title_fontfamily, 'OpenSansBold' ); ?>>OpenSansBold</option>
					<option value="OpenSansSemiBold" <?php selected($widget_title_fontfamily, 'OpenSansSemiBold' ); ?>>OpenSansSemiBold</option>
					<option value="OpenSansBoldItalic" <?php selected($widget_title_fontfamily, 'OpenSansBoldItalic' ); ?>>OpenSansBoldItalic</option>
					<option value="OpenSansExtraBold" <?php selected($widget_title_fontfamily, 'OpenSansExtraBold' ); ?>>OpenSansExtraBold</option>
					<option value="OpenSansExtraBoldItalic" <?php selected($widget_title_fontfamily, 'OpenSansExtraBoldItalic' ); ?>>OpenSansExtraBoldItalic</option>
					<option value="OpenSansItalic" <?php selected($widget_title_fontfamily, 'OpenSansItalic' ); ?>>OpenSansItalic</option>
					<option value="OpenSansLight" <?php selected($widget_title_fontfamily, 'OpenSansLight' ); ?>>OpenSansLight</option>
					<option value="OpenSansLightItalic" <?php selected($widget_title_fontfamily, 'OpenSansLightItalic' ); ?>>OpenSansLightItalic</option>
					<option value="OpenSansRegular" <?php selected($widget_title_fontfamily, 'OpenSansRegular' ); ?>>OpenSansRegular</option>
					<option value="OpenSansSemiboldItalic" <?php selected($widget_title_fontfamily, 'OpenSansSemiboldItalic' ); ?>>OpenSansSemiboldItalic</option>
					<option value="dosisBold" <?php selected($widget_title_fontfamily, 'dosisBold' ); ?>>dosisBold</option>
					<option value="dosisBook" <?php selected($widget_title_fontfamily, 'dosisBook' ); ?>>dosisBook</option>
					<option value="dosisExtraBold" <?php selected($widget_title_fontfamily, 'dosisExtraBold' ); ?>>dosisExtraBold</option>
					<option value="dosisExtraLight" <?php selected($widget_title_fontfamily, 'dosisExtraLight' ); ?>>dosisExtraLight</option>
					<option value="dosisLight" <?php selected($widget_title_fontfamily, 'dosisLight' ); ?>>dosisLight</option>
					<option value="dosisMedium" <?php selected($widget_title_fontfamily, 'dosisMedium' ); ?>>dosisMedium</option>
					<option value="dosisSemiBold" <?php selected($widget_title_fontfamily, 'dosisSemiBold' ); ?>>dosisSemiBold</option>
					<option value="Philosopher-Regular" <?php selected($widget_title_fontfamily, 'Philosopher-Regular' ); ?>>Philosopher-Regular</option>
					<option value="Glametrix" <?php selected($widget_title_fontfamily, 'Glametrix' ); ?>>Glametrix</option>
					<option value="GlametrixBold" <?php selected($widget_title_fontfamily, 'GlametrixBold' ); ?>>GlametrixBold</option>
					<option value="GlametrixLight" <?php selected($widget_title_fontfamily, 'GlametrixLight' ); ?>>GlametrixLight</option>
					<option value="Courgette" <?php selected($widget_title_fontfamily, 'Courgette' ); ?>>Courgette</option>
					<option value="Fely" <?php selected($widget_title_fontfamily, 'Fely' ); ?>>Fely</option>
					<option value="Montserrat" <?php selected($widget_title_fontfamily, 'Montserrat' ); ?>>Montserrat</option>
					<option value="Roadway" <?php selected($widget_title_fontfamily, 'Roadway' ); ?>>Roadway</option>
					<option value="libelsuit" <?php selected($widget_title_fontfamily, 'libelsuit' ); ?>>libelsuit</option>
					<option value="DustismoRegular" <?php selected($widget_title_fontfamily, 'DustismoRegular' ); ?>>DustismoRegular</option>
					<option value="DustismoItalic" <?php selected($widget_title_fontfamily, 'DustismoItalic' ); ?>>DustismoItalic</option>
					<option value="DustismoBold" <?php selected($widget_title_fontfamily, 'DustismoBold' ); ?>>DustismoBold</option>
					<option value="dustismoBoldItalic" <?php selected($widget_title_fontfamily, 'dustismoBoldItalic' ); ?>>dustismoBoldItalic</option>
					<option value="AlegreyaSansRegular" <?php selected($widget_title_fontfamily, 'AlegreyaSansRegular' ); ?>>AlegreyaSansRegular</option>
					<option value="AlegreyaSansMedium" <?php selected($widget_title_fontfamily, 'AlegreyaSansMedium' ); ?>>AlegreyaSansMedium</option>
					<option value="AlegreyaSansItalic" <?php selected($widget_title_fontfamily, 'AlegreyaSansItalic' ); ?>>AlegreyaSansItalic</option>
					<option value="AlegreyaSansBold" <?php selected($widget_title_fontfamily, 'AlegreyaSansBold' ); ?>>AlegreyaSansBold</option>
				</select>
				<?php $widget_title_fontstyle = $current_options['widget_title_fontstyle']; ?>
				<select id="widget_title_fontstyle" name="widget_title_fontstyle" class="select">
					<option value="normal" <?php selected($widget_title_fontstyle); ?>><?php _e('Normal','spicy'); ?></option>
					<option value="italic" <?php selected($widget_title_fontstyle); ?>><?php _e('Italic','spicy'); ?></option>
				</select>
			</p>
		</div>
		<div class="section" id="calloutarea_title">
			<h3><?php _e('Call out area Title','spicy');?></h3>			
			<?php $calloutarea_title_fontsize = $current_options['calloutarea_title_fontsize']; ?>
			<p>	<select name="calloutarea_title_fontsize" id="calloutarea_title_fontsize" class="select" >
					<?php for ($i = 9; $i <= 100; $i++) { ?><option value="<?php echo $i; ?>" <?php if ( $calloutarea_title_fontsize == $i ) echo selected($calloutarea_title_fontsize, $i ); ?> name=""><?php echo $i; ?></option><?php } ?>
				</select>
				<select  id="main_navigation"  class="select">
					<option value="px"><?php _e('px','spicy');?></option>
				</select>
			</p>
			<p><?php $calloutarea_title_fontfamily = $current_options['calloutarea_title_fontfamily']; ?>
				<select id="" name="calloutarea_title_fontfamily" class="select">
					<option value="DroidSansRegular" <?php selected($calloutarea_title_fontfamily, 'DroidSansRegular' ); ?>>DroidSansRegular</option>
					<option value="OpenSansBold" <?php selected($calloutarea_title_fontfamily, 'OpenSansBold' ); ?>>OpenSansBold</option>
					<option value="OpenSansSemiBold" <?php selected($calloutarea_title_fontfamily, 'OpenSansSemiBold' ); ?>>OpenSansSemiBold</option>
					<option value="OpenSansBoldItalic" <?php selected($calloutarea_title_fontfamily, 'OpenSansBoldItalic' ); ?>>OpenSansBoldItalic</option>
					<option value="OpenSansExtraBold" <?php selected($calloutarea_title_fontfamily, 'OpenSansExtraBold' ); ?>>OpenSansExtraBold</option>
					<option value="OpenSansExtraBoldItalic" <?php selected($calloutarea_title_fontfamily, 'OpenSansExtraBoldItalic' ); ?>>OpenSansExtraBoldItalic</option>
					<option value="OpenSansItalic" <?php selected($calloutarea_title_fontfamily, 'OpenSansItalic' ); ?>>OpenSansItalic</option>
					<option value="OpenSansLight" <?php selected($calloutarea_title_fontfamily, 'OpenSansLight' ); ?>>OpenSansLight</option>
					<option value="OpenSansLightItalic" <?php selected($calloutarea_title_fontfamily, 'OpenSansLightItalic' ); ?>>OpenSansLightItalic</option>
					<option value="OpenSansRegular" <?php selected($calloutarea_title_fontfamily, 'OpenSansRegular' ); ?>>OpenSansRegular</option>
					<option value="OpenSansSemiboldItalic" <?php selected($calloutarea_title_fontfamily, 'OpenSansSemiboldItalic' ); ?>>OpenSansSemiboldItalic</option>
					<option value="dosisBold" <?php selected($calloutarea_title_fontfamily, 'dosisBold' ); ?>>dosisBold</option>
					<option value="dosisBook" <?php selected($calloutarea_title_fontfamily, 'dosisBook' ); ?>>dosisBook</option>
					<option value="dosisExtraBold" <?php selected($calloutarea_title_fontfamily, 'dosisExtraBold' ); ?>>dosisExtraBold</option>
					<option value="dosisExtraLight" <?php selected($calloutarea_title_fontfamily, 'dosisExtraLight' ); ?>>dosisExtraLight</option>
					<option value="dosisLight" <?php selected($calloutarea_title_fontfamily, 'dosisLight' ); ?>>dosisLight</option>
					<option value="dosisMedium" <?php selected($calloutarea_title_fontfamily, 'dosisMedium' ); ?>>dosisMedium</option>
					<option value="dosisSemiBold" <?php selected($calloutarea_title_fontfamily, 'dosisSemiBold' ); ?>>dosisSemiBold</option>
					<option value="Philosopher-Regular" <?php selected($calloutarea_title_fontfamily, 'Philosopher-Regular' ); ?>>Philosopher-Regular</option>
					<option value="Glametrix" <?php selected($calloutarea_title_fontfamily, 'Glametrix' ); ?>>Glametrix</option>
					<option value="GlametrixBold" <?php selected($calloutarea_title_fontfamily, 'GlametrixBold' ); ?>>GlametrixBold</option>
					<option value="GlametrixLight" <?php selected($calloutarea_title_fontfamily, 'GlametrixLight' ); ?>>GlametrixLight</option>
					<option value="Courgette" <?php selected($calloutarea_title_fontfamily, 'Courgette' ); ?>>Courgette</option>
					<option value="Fely" <?php selected($calloutarea_title_fontfamily, 'Fely' ); ?>>Fely</option>
					<option value="Montserrat" <?php selected($calloutarea_title_fontfamily, 'Montserrat' ); ?>>Montserrat</option>
					<option value="Roadway" <?php selected($calloutarea_title_fontfamily, 'Roadway' ); ?>>Roadway</option>
					<option value="libelsuit" <?php selected($calloutarea_title_fontfamily, 'libelsuit' ); ?>>libelsuit</option>
					<option value="DustismoRegular" <?php selected($calloutarea_title_fontfamily, 'DustismoRegular' ); ?>>DustismoRegular</option>
					<option value="DustismoItalic" <?php selected($calloutarea_title_fontfamily, 'DustismoItalic' ); ?>>DustismoItalic</option>
					<option value="DustismoBold" <?php selected($calloutarea_title_fontfamily, 'DustismoBold' ); ?>>DustismoBold</option>
					<option value="dustismoBoldItalic" <?php selected($calloutarea_title_fontfamily, 'dustismoBoldItalic' ); ?>>dustismoBoldItalic</option>
					<option value="AlegreyaSansRegular" <?php selected($calloutarea_title_fontfamily, 'AlegreyaSansRegular' ); ?>>AlegreyaSansRegular</option>
					<option value="AlegreyaSansMedium" <?php selected($calloutarea_title_fontfamily, 'AlegreyaSansMedium' ); ?>>AlegreyaSansMedium</option>
					<option value="AlegreyaSansItalic" <?php selected($calloutarea_title_fontfamily, 'AlegreyaSansItalic' ); ?>>AlegreyaSansItalic</option>
					<option value="AlegreyaSansBold" <?php selected($calloutarea_title_fontfamily, 'AlegreyaSansBold' ); ?>>AlegreyaSansBold</option>
				</select>
				<?php $calloutarea_title_fontstyle = $current_options['calloutarea_title_fontstyle']; ?>
				<select id="calloutarea_title_fontstyle" name="calloutarea_title_fontstyle" class="select">
					<option value="normal" <?php selected($calloutarea_title_fontstyle); ?>><?php _e('Normal','spicy'); ?></option>
					<option value="italic" <?php selected($calloutarea_title_fontstyle); ?>><?php _e('Italic','spicy'); ?></option>
				</select>
			</p>
			</div>
			<div class="section" id="calloutarea_title">
			<h3><?php _e('Call Out Area Description','spicy');?></h3>		
			<?php  $calloutarea_description_fontsize = $current_options['calloutarea_description_fontsize']; ?>
			<p>	<select name="calloutarea_description_fontsize" id="calloutarea_description_fontsize" class="select" >
					<?php for ($i = 9; $i <= 100; $i++) { ?><option value="<?php echo $i; ?>" <?php if ( $calloutarea_description_fontsize == $i ) echo selected($calloutarea_description_fontsize, $i ); ?> ><?php echo $i; ?></option><?php } ?>
				</select>
				<select  id="main_navigation"  class="select">
					<option value="px"><?php _e('px','spicy');?></option>
				</select>
			</p>
			<p><?php $calloutarea_description_fontfamily = $current_options['calloutarea_description_fontfamily']; ?>	
				<select id="" name="calloutarea_description_fontfamily" class="select">
					<option value="DroidSansRegular" <?php selected($calloutarea_description_fontfamily, 'DroidSansRegular' ); ?>>DroidSansRegular</option>
					<option value="OpenSansBold" <?php selected($calloutarea_description_fontfamily, 'OpenSansBold' ); ?>>OpenSansBold</option>
					<option value="OpenSansSemiBold" <?php selected($calloutarea_description_fontfamily, 'OpenSansSemiBold' ); ?>>OpenSansSemiBold</option>
					<option value="OpenSansBoldItalic" <?php selected($calloutarea_description_fontfamily, 'OpenSansBoldItalic' ); ?>>OpenSansBoldItalic</option>
					<option value="OpenSansExtraBold" <?php selected($calloutarea_description_fontfamily, 'OpenSansExtraBold' ); ?>>OpenSansExtraBold</option>
					<option value="OpenSansExtraBoldItalic" <?php selected($calloutarea_description_fontfamily, 'OpenSansExtraBoldItalic' ); ?>>OpenSansExtraBoldItalic</option>
					<option value="OpenSansItalic" <?php selected($calloutarea_description_fontfamily, 'OpenSansItalic' ); ?>>OpenSansItalic</option>
					<option value="OpenSansLight" <?php selected($calloutarea_description_fontfamily, 'OpenSansLight' ); ?>>OpenSansLight</option>
					<option value="OpenSansLightItalic" <?php selected($calloutarea_description_fontfamily, 'OpenSansLightItalic' ); ?>>OpenSansLightItalic</option>
					<option value="OpenSansRegular" <?php selected($calloutarea_description_fontfamily, 'OpenSansRegular' ); ?>>OpenSansRegular</option>
					<option value="OpenSansSemiboldItalic" <?php selected($calloutarea_description_fontfamily, 'OpenSansSemiboldItalic' ); ?>>OpenSansSemiboldItalic</option>
					<option value="dosisBold" <?php selected($calloutarea_description_fontfamily, 'dosisBold' ); ?>>dosisBold</option>
					<option value="dosisBook" <?php selected($calloutarea_description_fontfamily, 'dosisBook' ); ?>>dosisBook</option>
					<option value="dosisExtraBold" <?php selected($calloutarea_description_fontfamily, 'dosisExtraBold' ); ?>>dosisExtraBold</option>
					<option value="dosisExtraLight" <?php selected($calloutarea_description_fontfamily, 'dosisExtraLight' ); ?>>dosisExtraLight</option>
					<option value="dosisLight" <?php selected($calloutarea_description_fontfamily, 'dosisLight' ); ?>>dosisLight</option>
					<option value="dosisMedium" <?php selected($calloutarea_description_fontfamily, 'dosisMedium' ); ?>>dosisMedium</option>
					<option value="dosisSemiBold" <?php selected($calloutarea_description_fontfamily, 'dosisSemiBold' ); ?>>dosisSemiBold</option>
					<option value="Philosopher-Regular" <?php selected($calloutarea_description_fontfamily, 'Philosopher-Regular' ); ?>>Philosopher-Regular</option>
					<option value="Glametrix" <?php selected($calloutarea_description_fontfamily, 'Glametrix' ); ?>>Glametrix</option>
					<option value="GlametrixBold" <?php selected($calloutarea_description_fontfamily, 'GlametrixBold' ); ?>>GlametrixBold</option>
					<option value="GlametrixLight" <?php selected($calloutarea_description_fontfamily, 'GlametrixLight' ); ?>>GlametrixLight</option>
					<option value="Courgette" <?php selected($calloutarea_description_fontfamily, 'Courgette' ); ?>>Courgette</option>
					<option value="Fely" <?php selected($calloutarea_description_fontfamily, 'Fely' ); ?>>Fely</option>
					<option value="Montserrat" <?php selected($calloutarea_description_fontfamily, 'Montserrat' ); ?>>Montserrat</option>
					<option value="Roadway" <?php selected($calloutarea_description_fontfamily, 'Roadway' ); ?>>Roadway</option>
					<option value="libelsuit" <?php selected($calloutarea_description_fontfamily, 'libelsuit' ); ?>>libelsuit</option>
					<option value="DustismoRegular" <?php selected($calloutarea_description_fontfamily, 'DustismoRegular' ); ?>>DustismoRegular</option>
					<option value="DustismoItalic" <?php selected($calloutarea_description_fontfamily, 'DustismoItalic' ); ?>>DustismoItalic</option>
					<option value="DustismoBold" <?php selected($calloutarea_description_fontfamily, 'DustismoBold' ); ?>>DustismoBold</option>
					<option value="dustismoBoldItalic" <?php selected($calloutarea_description_fontfamily, 'dustismoBoldItalic' ); ?>>dustismoBoldItalic</option>
					<option value="AlegreyaSansRegular" <?php selected($calloutarea_description_fontfamily, 'AlegreyaSansRegular' ); ?>>AlegreyaSansRegular</option>
					<option value="AlegreyaSansMedium" <?php selected($calloutarea_description_fontfamily, 'AlegreyaSansMedium' ); ?>>AlegreyaSansMedium</option>
					<option value="AlegreyaSansItalic" <?php selected($calloutarea_description_fontfamily, 'AlegreyaSansItalic' ); ?>>AlegreyaSansItalic</option>
					<option value="AlegreyaSansBold" <?php selected($calloutarea_description_fontfamily, 'AlegreyaSansBold' ); ?>>AlegreyaSansBold</option>
				</select>
				<?php $calloutarea_description_fontstyle = $current_options['calloutarea_description_fontstyle']; ?>
				<select id="calloutarea_description_fontstyle" name="calloutarea_description_fontstyle" class="select">
					<option value="normal" <?php selected($calloutarea_description_fontstyle); ?>><?php _e('Normal','spicy'); ?></option>
					<option value="italic" <?php selected($calloutarea_description_fontstyle); ?>><?php _e('Italic','spicy'); ?></option>
				</select>
			</p>
			</div>
			
			
			
			<div class="section" id="calloutarea_button">
			<h3><?php _e('Call Out Area Button','spicy');?></h3>
			<?php $calloutarea_purches_fontsize = $current_options['calloutarea_purches_fontsize']; ?>
			<p>	<select name="calloutarea_purches_fontsize" id="calloutarea_purches_fontsize" class="select" >
					<?php for ($i = 9; $i <= 100; $i++) { ?><option value="<?php echo $i; ?>" <?php if ( $calloutarea_purches_fontsize == $i ) echo selected($calloutarea_purches_fontsize, $i ); ?> name=""><?php echo $i; ?></option><?php } ?>
				</select>
				<select  id="main_navigation"  class="select">
					<option value="px"><?php _e('px','spicy');?></option>
				</select>
			</p>
			<p><?php $calloutarea_purches_fontfamily = $current_options['calloutarea_purches_fontfamily']; ?>	
				<select id="" name="calloutarea_purches_fontfamily" class="select">
					<option value="DroidSansRegular" <?php selected($calloutarea_purches_fontfamily, 'DroidSansRegular' ); ?>>DroidSansRegular</option>
					<option value="OpenSansBold" <?php selected($calloutarea_purches_fontfamily, 'OpenSansBold' ); ?>>OpenSansBold</option>
					<option value="OpenSansSemiBold" <?php selected($calloutarea_purches_fontfamily, 'OpenSansSemiBold' ); ?>>OpenSansSemiBold</option>
					<option value="OpenSansBoldItalic" <?php selected($calloutarea_purches_fontfamily, 'OpenSansBoldItalic' ); ?>>OpenSansBoldItalic</option>
					<option value="OpenSansExtraBold" <?php selected($calloutarea_purches_fontfamily, 'OpenSansExtraBold' ); ?>>OpenSansExtraBold</option>
					<option value="OpenSansExtraBoldItalic" <?php selected($calloutarea_purches_fontfamily, 'OpenSansExtraBoldItalic' ); ?>>OpenSansExtraBoldItalic</option>
					<option value="OpenSansItalic" <?php selected($calloutarea_purches_fontfamily, 'OpenSansItalic' ); ?>>OpenSansItalic</option>
					<option value="OpenSansLight" <?php selected($calloutarea_purches_fontfamily, 'OpenSansLight' ); ?>>OpenSansLight</option>
					<option value="OpenSansLightItalic" <?php selected($calloutarea_purches_fontfamily, 'OpenSansLightItalic' ); ?>>OpenSansLightItalic</option>
					<option value="OpenSansRegular" <?php selected($calloutarea_purches_fontfamily, 'OpenSansRegular' ); ?>>OpenSansRegular</option>
					<option value="OpenSansSemiboldItalic" <?php selected($calloutarea_purches_fontfamily, 'OpenSansSemiboldItalic' ); ?>>OpenSansSemiboldItalic</option>
					<option value="dosisBold" <?php selected($calloutarea_purches_fontfamily, 'dosisBold' ); ?>>dosisBold</option>
					<option value="dosisBook" <?php selected($calloutarea_purches_fontfamily, 'dosisBook' ); ?>>dosisBook</option>
					<option value="dosisExtraBold" <?php selected($calloutarea_purches_fontfamily, 'dosisExtraBold' ); ?>>dosisExtraBold</option>
					<option value="dosisExtraLight" <?php selected($calloutarea_purches_fontfamily, 'dosisExtraLight' ); ?>>dosisExtraLight</option>
					<option value="dosisLight" <?php selected($calloutarea_purches_fontfamily, 'dosisLight' ); ?>>dosisLight</option>
					<option value="dosisMedium" <?php selected($calloutarea_purches_fontfamily, 'dosisMedium' ); ?>>dosisMedium</option>
					<option value="dosisSemiBold" <?php selected($calloutarea_purches_fontfamily, 'dosisSemiBold' ); ?>>dosisSemiBold</option>
					<option value="Philosopher-Regular" <?php selected($calloutarea_purches_fontfamily, 'Philosopher-Regular' ); ?>>Philosopher-Regular</option>
					<option value="Glametrix" <?php selected($calloutarea_purches_fontfamily, 'Glametrix' ); ?>>Glametrix</option>
					<option value="GlametrixBold" <?php selected($calloutarea_purches_fontfamily, 'GlametrixBold' ); ?>>GlametrixBold</option>
					<option value="GlametrixLight" <?php selected($calloutarea_purches_fontfamily, 'GlametrixLight' ); ?>>GlametrixLight</option>
					<option value="Courgette" <?php selected($calloutarea_purches_fontfamily, 'Courgette' ); ?>>Courgette</option>
					<option value="Fely" <?php selected($calloutarea_purches_fontfamily, 'Fely' ); ?>>Fely</option>
					<option value="Montserrat" <?php selected($calloutarea_purches_fontfamily, 'Montserrat' ); ?>>Montserrat</option>
					<option value="Roadway" <?php selected($calloutarea_purches_fontfamily, 'Roadway' ); ?>>Roadway</option>
					<option value="libelsuit" <?php selected($calloutarea_purches_fontfamily, 'libelsuit' ); ?>>libelsuit</option>
					<option value="DustismoRegular" <?php selected($calloutarea_purches_fontfamily, 'DustismoRegular' ); ?>>DustismoRegular</option>
					<option value="DustismoItalic" <?php selected($calloutarea_purches_fontfamily, 'DustismoItalic' ); ?>>DustismoItalic</option>
					<option value="DustismoBold" <?php selected($calloutarea_purches_fontfamily, 'DustismoBold' ); ?>>DustismoBold</option>
					<option value="dustismoBoldItalic" <?php selected($calloutarea_purches_fontfamily, 'dustismoBoldItalic' ); ?>>dustismoBoldItalic</option>
					<option value="AlegreyaSansRegular" <?php selected($calloutarea_purches_fontfamily, 'AlegreyaSansRegular' ); ?>>AlegreyaSansRegular</option>
					<option value="AlegreyaSansMedium" <?php selected($calloutarea_purches_fontfamily, 'AlegreyaSansMedium' ); ?>>AlegreyaSansMedium</option>
					<option value="AlegreyaSansItalic" <?php selected($calloutarea_purches_fontfamily, 'AlegreyaSansItalic' ); ?>>AlegreyaSansItalic</option>
					<option value="AlegreyaSansBold" <?php selected($calloutarea_purches_fontfamily, 'AlegreyaSansBold' ); ?>>AlegreyaSansBold</option>
				</select>
				<?php $calloutarea_purches_fontstyle = $current_options['calloutarea_purches_fontstyle']; ?>
				<select id="calloutarea_purches_fontstyle" name="calloutarea_purches_fontstyle" class="select">
					<option value="normal" <?php selected($calloutarea_purches_fontstyle); ?>><?php _e('Normal','spicy'); ?></option>
					<option value="italic" <?php selected($calloutarea_purches_fontstyle); ?>><?php _e('Italic','spicy'); ?></option>
				</select>
			</p>
		</div>

		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_12" name="webriti_settings_save_12" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('12');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('12')" >
		</div>
	</form>
</div>