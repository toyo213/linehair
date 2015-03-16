<?php 
$current_options = get_option('spicy_pro_options');
if($current_options['total_slide']){
$total_slide = $current_options['total_slide'];
} else { $total_slide = 0; }
if(isset($_POST['webriti_settings_save_6']))
{	
	if($_POST['webriti_settings_save_6'] == 1) 
	{
			$total_slide = $_POST['total_slide'];
			$slider_list=array();
			for($i=1; $i<= $total_slide; $i++)
			{	$slider_image ='slider_image_'.$i;
				$slider_title ='slider_title_'.$i;
				$slider_description ='slider_description_'.$i;
				$slider_title = $_POST[$slider_title];					
				$slider_description = $_POST[$slider_description];	
				$slider_image = $_POST[$slider_image];					
				$slider_list[$i]=array('slider_title'=> $slider_title,'slider_description'=>$slider_description, 'slider_image_url'=>$slider_image);
				
			}
			$current_options['slider_list']= $slider_list;
			$current_options['total_slide']= $_POST['total_slide'];
			
			
			$current_options['animation']=sanitize_text_field($_POST['animation']);
			$current_options['animationSpeed']=sanitize_text_field($_POST['animationSpeed']);
			$current_options['slide_direction']=sanitize_text_field($_POST['slide_direction']);
			$current_options['slideshowSpeed']=sanitize_text_field($_POST['slideshowSpeed']);
			
			// slider section enabled yes ya on
			if($_POST['home_slider_enabled'])
			{ echo $current_options['home_slider_enabled']= sanitize_text_field($_POST['home_slider_enabled']); } 
			else { echo $current_options['home_slider_enabled']="off"; } 
			
			update_option('spicy_pro_options', stripslashes_deep($current_options));
	}
	if($_POST['webriti_settings_save_6'] == 2) 
	{
		$current_options['slider_list']='';
		$current_options['total_slide']='';

		$current_options['home_slider_enabled']="on";
		$current_options['animation']='slide';
		$current_options['animationSpeed']='1500';
		$current_options['slide_direction']='horizontal';
		$current_options['slideshowSpeed']='2500';
		update_option('spicy_pro_options',$current_options);
	}
} // end of submit slider list  

?>
<script type="text/javascript">
	function addInput() 
	{	
	  var slider =jQuery('#total_slide').val();
	  slider++;
	  jQuery('#webriti_slider').append('<div id="slider-slider-'+slider+'" class="section" ><h3>slider Title '+slider+' </h3><input class="webriti_inpute" type="text" value="" id="slider_title_'+slider+'" name="slider_title_'+slider+'" size="36"/><h3>slider description '+slider+' </h3><input class="webriti_inpute" type="text" value="" id="slider_description_'+slider+'" name="slider_description_'+slider+'" size="36"/><h3>slider Image '+slider+' </h3><input class="webriti_inpute" type="text" value="" id="slider_image_'+slider+'" name="slider_image_'+slider+'" size="36"/><input type="button" id="upload_image_button_'+slider+'" value="upload slider image" class="upload_image_button_'+slider+'" onClick="webriti_slider('+slider+')" /></div>');
	  jQuery("#remove_button").show();
	  jQuery('#total_slide').val(slider);
	}

	function remove_field()
	{
		var slider =jQuery('#total_slide').val();
		if(slider){
		jQuery("#slider-slider-"+slider).remove();
		slider=slider-1;
		jQuery('#total_slide').val(slider);
		}
	}

	function webriti_slider(slider_id)
	{
		// media upload js
		var uploadID = ''; /*setup the var*/
		//jQuery('.upload_image_button').click(function() {
		var upload_image_button="#upload_image_button_"+slider_id;
			uploadID = jQuery(upload_image_button).prev('input'); /*grab the specific input*/			
			formfield = jQuery('.upload').attr('name');
			tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
			
			window.send_to_editor = function(html)
			{
				imgurl = jQuery('img',html).attr('src');
				uploadID.val(imgurl); /*assign the value to the input*/
				tb_remove();
			};		
			return false;
		//});
	}
</script>
<div class="block ui-tabs-panel deactive" id="option-ui-id-6" >
	<form method="post" id="webriti_theme_options_6">
		<div id="heading">			
			<table style="width:100%;">
				<tr><td><h2><?php _e('Slider','spicy');?></h2></td>
					<td style="width:30%;">
						<div class="webriti_settings_loding" id="webriti_loding_6_image"></div>
						<div class="webriti_settings_massage" id="webriti_settings_save_6_success" ><?php _e('Options data successfully Saved','spicy');?></div>
						<div class="webriti_settings_massage" id="webriti_settings_save_6_reset" ><?php _e('Options data successfully reset','spicy');?></div>
					</td>
					<td style="text-align:right;">
						<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('6');">
						<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('6')" >
					</td>
				</tr>				
			</table>	
		</div>
		<div id="webriti_slider">
		<?php if($current_options['slider_list'])
		{
			$i=1;
			foreach($current_options['slider_list'] as $slider_list)
			{	?>
				<div class="section" id="slider-slider-<?php echo $i ?>"> 
					<h3><?php _e('Slider Title','spicy'); ?> <?php echo $i ?></h3>
					<input type="text" value="<?php echo $slider_list['slider_title']; ?>" id="slider_title_<?php echo $i ?>" name="slider_title_<?php echo $i ?>" class="webriti_inpute">
					<h3><?php _e('Slider Description','spicy'); ?><?php echo $i ?></h3>
					<input type="text" value="<?php echo $slider_list['slider_description']; ?>" id="slider_description_<?php echo $i ?>" name="slider_description_<?php echo $i ?>" class="webriti_inpute">
					<h3><?php _e('Slider Image','spicy');?> <?php echo $i ?> </h3>
					<input type="text" value="<?php echo $slider_list['slider_image_url']; ?>" id="slider_image_<?php echo $i ?>" name="slider_image_<?php echo $i ?>" class="webriti_inpute">
					<input type="button" id="upload_button" value="slider Image" class="upload_image_button"  />			<BR>
					<img src="<?php echo $slider_list['slider_image_url']; ?>" style="height:150px; width:250px;">
				</div>	
			<?php	$i=$i+1;
			}	
		} ?>
		</div>
		<div class="section" style="margin-bottom:30px;">
			<a onclick="addInput()" href="#" class="btn btn-primary" name="add" id="more_faq" ><?php _e('Add Slide','spicy');?></a>
			<a onclick="remove_field()" href="#" class="btn btn-inverse"  id="remove_button" style="display:<?php if(!$total_slide) { ?>none<?php } ?>;"><?php _e('Remove Last Slide','spicy'); ?></a>		
		</div>
		<input type="hidden" class="webriti_inpute" type="text" id="total_slide" name="total_slide" value="<?php echo $total_slide; ?> " />
		
		<div class="section">
			<h3><?php _e('Enable Home Slider','spicy'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['home_slider_enabled']=='on') echo "checked='checked'"; ?> id="home_slider_enabled" name="home_slider_enabled">
			<span class="explain"><?php _e('Enable slider on front page.','spicy'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Animation','spicy'); ?></h3>
			<?php $animation = $current_options['animation']; ?>		
			<select name="animation" class="webriti_inpute" >					
				<option value="fade"  <?php echo selected($animation, 'fade' ); ?>><?php _e('fade','spicy');?></option>
				<option value="slide" <?php echo selected($animation, 'slide' ); ?>><?php _e('slide','spicy');?></option> 
			</select>
			<span class="explain"><?php _e('Select the Animation Type.','spicy'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Slide direction','spicy'); ?></h3>
			<?php $slide_direction = $current_options['slide_direction']; ?>		
				<select name="slide_direction" class="webriti_inpute" >					
					<option value="vertical"  <?php echo selected($slide_direction, 'vertical' ); ?>><?php _e('vertical','spicy');?></option>
					<option value="horizontal" <?php echo selected($slide_direction, 'horizontal' ); ?>><?php _e('horizontal','spicy');?></option> 
				</select>
				<span class="explain"><?php _e('Select Slide direction.','spicy'); ?></span>	
		</div>
		<div class="section">
			<h3><?php _e('Animation speed','spicy') ?></h3>
			<?php $animationSpeed = $current_options['animationSpeed']; ?>		
				<select name="animationSpeed" class="webriti_inpute" >					
					<option value="500" <?php selected($animationSpeed, '500' ); ?>>0.5</option>
					<option value="1000" <?php selected($animationSpeed, '1000' ); ?>>1.0</option>
					<option value="1500" <?php selected($animationSpeed, '1500' ); ?>>1.5</option>
					<option value="2000" <?php selected($animationSpeed, '2000' ); ?>>2.0</option>
					<option value="2500" <?php selected($animationSpeed, '2500' ); ?>>2.5</option>
					<option value="3000" <?php selected($animationSpeed, '3000' ); ?>>3.0</option>
					<option value="3500" <?php selected($animationSpeed, '3500' ); ?>>3.5</option>
					<option value="4000" <?php selected($animationSpeed, '4000' ); ?>>4.0</option>
					<option value="4500" <?php selected($animationSpeed, '4500' ); ?>>4.5</option>
					<option value="5000" <?php selected($animationSpeed, '5000' ); ?>>5.0</option>
					<option value="5500" <?php selected($animationSpeed, '5500' ); ?>>5.5</option>
				</select>
				<span class="explain"><?php _e('Select Slide Animation speed.','spicy'); ?></span>	
		</div>
		<div class="section">
			<h3><?php _e('Slideshow speed','spicy'); ?></h3>
			<?php $slideshowSpeed = $current_options['slideshowSpeed']; ?>		
			<select name="slideshowSpeed" class="webriti_inpute">					
				<option value="500" <?php selected($slideshowSpeed, '500' ); ?>>0.5</option>
				<option value="1000" <?php selected($slideshowSpeed, '1000' ); ?>>1.0</option>
				<option value="1500" <?php selected($slideshowSpeed, '1500' ); ?>>1.5</option>
				<option value="2000" <?php selected($slideshowSpeed, '2000' ); ?>>2.0</option>
				<option value="2500" <?php selected($slideshowSpeed, '2500' ); ?>>2.5</option>
				<option value="3000" <?php selected($slideshowSpeed, '3000' ); ?>>3.0</option>
				<option value="3500" <?php selected($slideshowSpeed, '3500' ); ?>>3.5</option>
				<option value="4000" <?php selected($slideshowSpeed, '4000' ); ?>>4.0</option>
				<option value="4500" <?php selected($slideshowSpeed, '4500' ); ?>>4.5</option>
				<option value="5000" <?php selected($slideshowSpeed, '5000' ); ?>>5.0</option>
				<option value="5500" <?php selected($slideshowSpeed, '5500' ); ?>>5.5</option>
			</select>
			<span class="explain"><?php _e('Select the Slide Show Speed.','spicy'); ?></span>
		</div>
		
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_6" name="webriti_settings_save_6" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('6');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('6')" >
		</div>		
	</form>	
</div>