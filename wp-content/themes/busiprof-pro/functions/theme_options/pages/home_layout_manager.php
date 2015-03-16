<div class="block ui-tabs-panel deactive" id="option-ui-id-10" >	
	<?php $current_options = get_option('spicy_pro_options');	
	if(isset($_POST['webriti_settings_save_10']))
	{	if($_POST['webriti_settings_save_10'] == 2) 
		{
			$current_options['front_page_data']= array('service','portfolio','blog','footercalout');
			update_option('spicy_pro_options', $current_options);
		}
	}
	
	if(isset($_POST['webriti_front_data']))
	{
		if($_POST['webriti_front_data'] ) 
		{		
			/*send data hold*/
			$datashowredify = $_POST['webriti_front_data'];
			$hold = strstr($datashowredify,'|');
			$datashowredify = str_replace('|', '' ,$hold);				
			$data = explode(",",$datashowredify);				
			/*data save*/
			$current_options['front_page_data']=$data;
			/*update all field*/
			update_option('spicy_pro_options' , $current_options);				
		}
	}
	?>
	<form method="post" id="webriti_theme_options_10">
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Front Page Layout','spicy');?></h2></td>
				<td>
					<div class="webriti_settings_loding" id="webriti_loding_10_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_10_success" ><?php _e('Options data successfully Saved','spicy');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_10_reset" ><?php _e('Options data successfully reset','spicy');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('10');">					
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('10')" id="webriti_front_enable_save1">
					
				</td>
				</tr>
			</table>	
		</div>		
		<div class="section">
			<table  class="form-table">						
				<div class="dhe-example-section-content"><!---dhe-example-section-content--->
					<div id="webriti_frontpage"><!--redify_frontpage--->
						<div class="column left first">
							<font color="#333333" size="+2"> <?php _e('Disabled','spicy');?></font><p></p>							
							<div class="sortable-list" id="disable">
								<?php 	
									$data = $current_options['front_page_data'];									
									$defaultenableddata = array('service','portfolio','blog','footercalout');;
									$todisable=array_diff($defaultenableddata,$data);
									if($todisable != '')
									{	foreach($todisable as $value)
										{ ?>
											<div class="sortable-item" id="<?php echo $value ?>"><?php echo $value ; ?></div>
								<?php 	}		 
									} ?>
							</div>
						</div>
						<div class="column left">
							<font color="#333333" size="+2"> <?php _e('Enabled','spicy'); ?></font><p></p>
							<div class="sortable-list" id="enable">
								<?php 
								$enable =$current_options['front_page_data'];								
								if($enable[0]!="")
								{	foreach($enable as $value)
									{ ?>
										<div class="sortable-item" id="<?php echo $value ?>"><?php echo $value ?></div> <?php 
									} 
								}								
								?>
							</div>
						</div>
					</div>			
				</div><!--end redify_frontpage--->
			</table>				
		</div>
		<div class="section">
		<p> <b><?php _e('Slider section always top on the home page','spicy'); ?></b></p>
		<p> <b><?php _e('Note:','spicy'); ?> </b> <?php _e('By default all the section are enable on homepage. If you do not want to display any section just drag that section to the disabled box.','spicy'); ?><p>
		</div>
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_10" name="webriti_settings_save_10" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('10');">
			<input class="btn btn-primary" type="button" value="Save Options" id="webriti_front_enable_save" onclick="webriti_option_data_save('10')">
		</div>
	</form>

<script type="text/javascript">
jQuery(document).ready(function(){	
	//drag drop tabs
	jQuery('#webriti_frontpage .sortable-list').sortable({ connectWith: '#webriti_frontpage .sortable-list' });	
	
	// Get items id you can chose
	function webritiItems(webriti)
	{
		var columns = [];
		jQuery(webriti + ' div.sortable-list').each(function(){
			columns.push(jQuery(this).sortable('toArray').join(','));
		});
		return columns.join('|');
	}
	
	//onclick check id
	jQuery('#webriti_front_enable_save').click(function(){ 
		var aa = webritiItems('#webriti_frontpage');		
		 var dataStringfirst = 'webriti_front_data='+ aa;
		 
			 var url = '?page=webriti';
     
			 	jQuery.ajax({
					dataType : 'html',
					type: 'POST',
					url : url,
			   		data : dataStringfirst,
					complete : function() {  },
					success: function(data) 
				  	{	
						jQuery("#webriti_settings_save_10_success").show();
						jQuery("#webriti_settings_save_10_success").fadeOut(5000);
					}
			 	});
	});
	
	//onclick check id
	jQuery('#webriti_front_enable_save1').click(function(){  
		var aa = webritiItems('#webriti_frontpage');		
		 var dataStringfirst = 'webriti_front_data='+ aa; 	
			 var url = '?page=webriti';     
			 	jQuery.ajax({
					dataType : 'html',
					type: 'POST',
					url : url,
			   		data : dataStringfirst,
					complete : function() {  },
					success: function(data) 
				  	{	
						jQuery("#webriti_settings_save_10_success").show();
						jQuery("#webriti_settings_save_10_success").fadeOut(5000);
					}
			 	});
	});
	
});
</script>
</div>