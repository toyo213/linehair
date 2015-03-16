<?php 
$current_options=get_option('easy_custom_css_webriti');
if(isset($_POST['custom_css_submit']))
{
	$current_options =$_POST['easy_custom_css_webriti'];
	update_option('easy_custom_css_webriti' , $current_options);
	echo "<script>alert('Custom CSS successfully Saved');</script>";
}
?>
<div id="wpbody">
	<div id="wpbody-content">
		<div id="easy_css-themepromo">
			<h2><?php _e('Welcome to Easy Custom CSS','easy_css'); ?></h2>
			<p><?php _e('Use Easy Custom CSS plugin to customize the look of your site without editing theme files. It is a easy but very useful plugin.','easy_css'); ?>  </p>
		</div>
		<div  class="wrap"> 
			<div id="icon-options-general" class="icon32"><br></div>
			<h2 class="nav-tab-wrapper">
				<a href="#easy-option-wpbsetting"  class="nav-tab nav-tab-active" id="easy-option-wpbsetting-tab"><?php _e('Easy Custom CSS Options','easy_css'); ?></a>
				<a href="#easy-option-help" class="nav-tab" id="easy-option-help-tab"><?php _e("Help and Support",'easy_css');?></a>
			</h2>
		
			<div id="easy_optionsframework-metabox" class="metabox-holder">
				<div id="easy_optionsframework" class="postbox">
					<div class="group postbox"style="display: active; background:white" id="easy-option-wpbsetting" >
						<div title="Click to toggle" class="handlediv"><br></div>
						<h3 class="hndle"><span><?php _e('Enter the CSS Code','easy_css'); ?><span class="postbox-title-action"></h3>
						<div class="inside">
							<form method="post" action="#">
							<p>
							<textarea name="easy_custom_css_webriti" id="easy_custom_css_webriti"  style="width:100%;height:350px;"><?php echo get_option('easy_custom_css_webriti'); ?></textarea>
							<script language="javascript">var editor = CodeMirror.fromTextArea(document.getElementById("easy_custom_css_webriti"), { lineNumbers: true });</script>
							<br><input type="submit" name="custom_css_submit" id="custom_css_submit" class="button-primary" value="<?php _e('Save','easy_css'); ?>" />
							<div style="display:none; margin-left:100px; margin-top:-40px; padding:10px; color: #468847; background-color: #DFF0D8; border-color: #D6E9C6;" id="webiti_custom_css_saved" ><?php _e('Custom css successfully Saved','busi_prof');?></div>
							</form>
							<p>									
						</div>
					</div>
					<div class="group postbox" style="display: none; background:white" id="easy-option-help" >
						<div title="Click to toggle" class="handlediv"><br></div>
						<h3 class="hndle"><span><?php _e('Help And Support','easy_css'); ?><span class="postbox-title-action"></h3>
						<div class="inside">				
							<p style = "font-size: 15px;"><strong>1. <?php _e('Get Support','easy_css'); ?> </strong></p>
							<p style = "font-size: 14px;"><?php _e("If you have any question or need support then feel free to contact us ",'busi_prof');?> <?php _e("via the",'easy_css');?> <?php _e("WordPress Support Forums",'easy_css');?>.</p>
							<p style = "font-size: 15px;"><strong>2. <?php _e('Join Our Newsletter','easy_css');?> </strong></p>
							<p style = "font-size: 14px;">
								<a target="_blank" href="http://webriti.com/news/">
									<img src="<?php echo EASY_PLUGIN_DIR_URL_INC; ?>/images/Subscribe_newsletter82.jpg">
								</a> 
							</p>
						</div>
					</div>			
				</div>
			</div>			
		</div>
	</div>
</div>