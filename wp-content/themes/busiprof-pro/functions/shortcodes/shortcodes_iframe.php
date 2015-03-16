<?php
/* FindWPConfig - searching for a root of wp */
function FindWPConfig($directory){
	global $confroot;
	foreach(glob($directory."/*") as $f){
		if (basename($f) == 'wp-config.php' ){
			$confroot = str_replace("\\", "/", dirname($f));
			return true;
		}
		if (is_dir($f)){
		$newdir = dirname(dirname($f));
		}
	}
	if (isset($newdir) && $newdir != $directory){
		if (FindWPConfig($newdir)){
			return false;
		}	
	}
	return false;
}
if (!isset($table_prefix)){
	global $confroot;
	FindWPConfig(dirname(dirname(__FILE__)));
	include_once $confroot."/wp-load.php";

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php _e("Insert Shortcode",'busi_rpof');?></title>
<script type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/jquery/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<style type="text/css" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/themes/advanced/skins/wp_theme/dialog.css"></style>
<link rel="stylesheet" href="css/shortcode_tinymce.css" />

<script>
 jQuery(document).ready(function($){
	 
	//select shortcode
	$("#shortcode-select").change(function () {
		  var shortcodeSelectVal = "";
		  var shortcodeSelectText = "";
		  $("#shortcode-select option:selected").each(function () {
				shortcodeSelectVal += $(this).val();
				shortcodeSelectText += $(this).text();
			  });
			  if( shortcodeSelectVal != 'default') {
				$('#selected-shortcode').load('types/'+shortcodeSelectVal+'.php', function(){
					$('.shortcode-editor-title').text(shortcodeSelectText + ' Editor');
				});
			  } else {
			  	$('#selected-shortcode').text('Select Your Shortcode Above To Get Started').addClass('padding-bottom');
				$('.shortcode-editor-title').text('Shortcode Editor');
			  }
		})
		.trigger('change');
	
 });
</script>
    
</head>
<body>
<div id="wpex-shortcodes-popup">
	<h2 id="shortcode-selector-title"><?php _e("Shortcode Selector",'busi_rpof');?></h2>
	<div id="select-shortcode">
    	<div id="select-shortcode-inner">    
			<form action="/" method="get" accept-charset="utf-8">
				<div>
					<select name="shortcode-select" id="shortcode-select" size="1">
						<option value="default" selected="selected"><?php _e("Shortcodes",'busi_rpof');?></option>						
						<option value="accordion"><?php _e("Accordion",'busi_rpof');?></option>
						<option value="alert"><?php _e("Alert",'busi_rpof');?></option>
						<option value="button"><?php _e("Button",'busi_rpof');?></option>
						<option value="blockquote"><?php _e("Blockquote",'busi_rpof');?></option>
						 <option value="heading"><?php _e("Heading",'busi_rpof');?></option>
						 <option value="hr"><?php _e("Hr(divider)",'busi_rpof');?></option>
						 <option value="order_list"><?php _e("Order List",'busi_rpof');?></option>
						<option value="unorder_list"><?php _e("Unorder List",'busi_rpof');?></option>
						<option value="testimonial"><?php _e("Testimonial",'busi_rpof');?></option>
						<option value="tabs"><?php _e("Tabs",'busi_rpof');?></option>
						<option value="portfolio"><?php _e("Portfolio",'busi_rpof');?></option>
					</select>
				</div>
			</form>
        </div>
        <!-- /select-shortcode-inner -->
	</div>
    <!-- /select-shortcode-wrap -->    
    <h2 class="shortcode-editor-title"></h2>
		<div id="shortcode-editor">
    		<div id="shortcode-editor-inner" class="clearfix">
			<div id="selected-shortcode"> </div>
		</div>
        <!-- /shortcode-dialog-inner -->
	</div>
    <!-- /shortcode-dialog -->     
</div>
<!-- /wpex-shortcodes-popup -->
</body>
</html>