<div style="padding-left:20px;" id="webriti_Home_layout">
<?php $current_options = get_option('busiprof_pro_theme_options');
	if(isset($_POST['busiprof_settings_save_6']))
	{	if($_POST['busiprof_settings_save_6'] == 2) 
		{
			$current_options['front_page_data']=array('slider','Service Section','Project Section','Testimonials section','Client strip');		
			update_option('busiprof_pro_theme_options',$current_options);
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
				update_option('busiprof_pro_theme_options' , $current_options);
				
		}
	}
	?>
	<form method="post" id="theme_options_home_6">
		<?php wp_nonce_field('busiprof_customization_nonce_gernalsetting','busiprof_gernalsetting_nonce_customization'); ?>
		<div class="section">
			<table  class="form-table">						
				<div class="dhe-example-section-content"><!---dhe-example-section-content--->
					<div id="webriti_frontpage"><!--redify_frontpage--->
						<div class="column left first">
							<font color="#333333" size="+2"> <?php _e('Disabled','busi_prof');?></font><p></p>							
							<div class="sortable-list" id="disable">
								<?php 	
									$data = $current_options['front_page_data'];									
									$defaultenableddata=array('slider','Service Section','Project Section','Testimonials section','Client strip');
									$todisable=array_diff($defaultenableddata,$data);
									if($todisable != '')
									{	foreach($todisable as $value)
										{ ?>
											<div class="sortable-item" id="<?php echo $value ?>"><?php _e($value,'busi_prof'); ?></div>
								<?php 	}		 
									} ?>
							</div>
						</div>
						<div class="column left">
							<font color="#333333" size="+2"> <?php _e('Enabled','busi_prof'); ?></font><p></p>
							<div class="sortable-list" id="enable">
								<?php 
								$enable =$current_options['front_page_data'];								
								if($enable[0]!="")
								{	foreach($enable as $value)
									{ ?>
										<div class="sortable-item" id="<?php echo $value ?>"><?php _e($value,'busi_prof'); ?></div> <?php 
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
		<p> <b><?php _e('Slider section always top on the home page','busi_prof'); ?></b></p>
		<p> <b><?php _e('Note:','busi_prof'); ?> </b> <?php _e('By default all the section are enable on homepage. If you do not want to display any section just drag that section to the disabled box.','busi_prof'); ?><p>
		</div>		
		<div id="busiprof_optionsframework-submit">         
			<input type="hidden" name="busiprof_settings_save_6" id="busiprof_settings_save_6" value="1">
			<input type="button"  value="Save Changes" class="button-primary" id="busiprof_pro_front_enable_save">
			<input type="button" class="reset-button button-secondary"  value="<?php _e('Restore Defaults','busi_prof');?>" onclick="reset_data_home('6')" />
			<div id="busiprof_settings_save_6_reset" style="display:none; margin-left:300px; margin-top:-25px; padding:10px; color: #468847; background-color: #DFF0D8; border-color: #D6E9C6;">Options data successfully reset</div>
			<div id="busiprof_settings_save_6_success" style="display:none; margin-left:300px; margin-top:-25px; padding:10px; color: #468847; background-color: #DFF0D8; border-color: #D6E9C6;">Options data successfully Saved</div>
		</div>
	</form>
	

<script type="text/javascript">

jQuery(document).ready(function(){	
	//drag drop tabs
	jQuery('#webriti_frontpage .sortable-list').sortable({ connectWith: '#webriti_frontpage .sortable-list' });	
	
	// Get items id you can chose
	function webritiItems(webritidata)
	{
		var columns = [];
		jQuery(webritidata + ' div.sortable-list').each(function(){
			columns.push(jQuery(this).sortable('toArray').join(','));
		});
		return columns.join('|');
	}
	
	//onclick check id
	jQuery('#busiprof_pro_front_enable_save').click(function(){
		var aa = webritiItems('#webriti_frontpage');		
		 var dataStringfirst = 'webriti_front_data='+ aa;
		 
			 var url = '?page=busi_prof';
     
			 	jQuery.ajax({
					dataType : 'html',
					type: 'POST',
					url : url,
			   		data : dataStringfirst,
					complete : function() {  },
					success: function(data) 
				  	{	
						jQuery("#busiprof_settings_save_6_success").show();
						jQuery("#busiprof_settings_save_6_success").fadeOut(5000);
					}
			 	});
	});	
	
});
</script>
</div>