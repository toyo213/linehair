<div class="wrap" id="framework_wrap">   		
    <div id="content_wrap">
		<div class="webriti-header">
			<h2 style="padding-top: 0px;font-size: 23px;line-height: 10px;"><a href="http://www.webriti.com/" style="margin-bottom:0px;"><img style="margin-left:10px;" src="<?php echo get_template_directory_uri(); ?>/functions/theme_options/images/png.png"></a></h2>
		</div>
		<div class="webriti-submenu">
		<div id="icon-themes" class="icon32"></div>
			<h2><?php _e('spicy','spicy'); ?>
				<div class="webriti-submenu-links">
					<a target="_blank" href="http://webriti.com/support/categories/spicy" class="btn btn-primary"><?php _e('Support Desk','spicy'); ?></a>
					<a target="_blank" href="http://webriti.com/themes/documentation/spicy/" class="btn btn-info"> <?php _e('Theme Documentation','spicy'); ?></a>
					<a target="_blank" href="http://webriti.com/support/discussion/355/spicy-change-log/" class="btn btn-success" ><?php _e('View Changelog','spicy'); ?></a>				
				</div><!-- webriti-submenu-links -->
			</h2>
          <div class="clear"></div>
        </div>
        <div id="content">
			<div id="options_tabs" class="ui-tabs ">
				<ul class="options_tabs ui-tabs-nav" role="tablist" id="nav">
					<div id="nav-shadow"></div>
					<li class="active" >
						<div class="arrow"><div></div></div><a href="#" id="1"><span class="icon home-page"></span><?php _e('Home Page','spicy');?></a>
						<ul><li class="currunt" ><a href="#" class="ui-tabs-anchor" id="ui-id-1"><?php _e('Quick Start','spicy');?> </a><span></span></li>
							
							<li><a href="#"  id="ui-id-6"><?php _e('Slider Setting','spicy');?></a><span></span></li>
							<li><a href="#"  id="ui-id-3"><?php _e('Service Setting','spicy');?></a><span></span></li> 
							<li><a href="#"  id="ui-id-4"><?php _e('Project Portfolio','spicy');?></a><span></span></li>
							<li><a href="#"  id="ui-id-24"><?php _e('Home Blog Settings','spicy');?></a><span></span></li>
							<li><a href="#"  id="ui-id-5"><?php _e('Footer call out area','spicy');?></a><span></span></li>
						</ul>
					</li>
					<li>
						<div class="arrow"><div></div></div><a href="#" id="ui-id-12"><span class="icon typography"></span><?php _e('Typography','spicy');?></a><span></span>
					</li>
					<li>
						<div class="arrow"><div></div></div><a href="#" id="ui-id-13"><span class="icon post_type"></span><?php _e('Post Type Slug','spicy');?></a><span></span>
					</li>
					<li>
						<div class="arrow"><div></div></div><a href="#" id="7"><span class="icon contact-page"></span><?php _e('Contact Page','spicy');?></a>
						<ul><li ><a href="#" class="ui-tabs-anchor" id="ui-id-7"><?php _e('Contact Information','spicy');?> </a><span></span></li>
							<li><a href="#"  id="ui-id-8"><?php _e('Google Maps','spicy');?></a><span></span></li>
						</ul>
					</li>
					<li>
						<div class="arrow"><div></div></div><a href="#" id="ui-id-15"><span class="icon heading"></span><?php _e('Section Headings','spicy');?></a><span></span>
					</li>
					<li>
						<div class="arrow"><div></div></div><a href="#" id="22"><span class="icon footer"></span><?php _e('Social Media Links','spicy');?></a>
					</li>
					<li>
						<div class="arrow"><div></div></div><a href="#" id="ui-id-10"><span class="icon home_layout_manger"></span><?php _e('Layout Manager','spicy');?></a><span></span>
					</li>
					<li>
						<div class="arrow"><div></div></div><a href="#" id="ui-id-23"><span class="icon footer"></span><?php _e('Footer Customization','spicy');?></a><span></span>
					</li>
					
										
					<div id="nav-shadow"></div>
                </ul>
				<!--         Home Page   -------->
				<!--most 1 tabs home_page_settings --> 
				<?php require_once('pages/home_page_settings.php'); ?>				
				<!--most 2 tabs home_page_settings --> 
				<?php require_once('pages/home_slider_settings.php'); ?>				
				<!--most 3 home_service_settings tabs s --> 
				<?php require_once('pages/home_service_settings.php'); ?>				
				<!--most 4 tabs home_project_portfolio_settings --> 
				<?php require_once('pages/home_project_portfolio_settings.php'); ?>
				<!--most 5 tabs home_page_settings --> 
				<?php require_once('pages/footer_call_out_settings.php'); ?>
				<!--most 24 tabs Theme Features Settings  -->
				<?php require_once('pages/home_blog_settings.php'); ?>
				<!--most 7 tabs home_page_settings --> 
				<?php require_once('pages/contact_page_settings.php'); ?>
				<!--most 8 tabs home_page_settings --> 
				<?php require_once('pages/google_maps_settings.php'); ?>
				<!--most 10 tabs home_page_settings --> 
				<?php require_once('pages/home_layout_manager.php'); ?>
				<!--most 22 tabs home_page_settings --> 
				<?php require_once('pages/footer_copyright_settings.php'); ?>
				<!--most 15 tabs home_page_settings --> 
				<?php require_once('pages/head_titles.php'); ?>
				<!--most 12 tabs home_page_settings --> 
				<?php require_once('pages/typography.php'); ?>
				<!--most 13 tabs home_page_settings --> 
				<?php require_once('pages/post_type_slug.php'); ?>
				<!--footer social media Settings  -->
				<?php require_once('pages/social_media_links.php'); ?>				
				
			</div>		
        </div>
		<div class="webriti-submenu" style="height:35px;">			
            <div class="webriti-submenu-links" style="margin-top:5px;">
			<form method="POST">
				<input type="submit" onclick="return confirm( 'Click OK to reset theme data. Theme settings will be lost!' );" value="Restore All Defaults" name="restore_all_defaults" id="restore_all_defaults" class="reset-button btn">
			<form>
            </div><!-- webriti-submenu-links -->
        </div>
		<div class="clear"></div>
    </div>
</div>
<?php
// Restore all defaults
if(isset($_POST['restore_all_defaults'])) 
	{
		$spicy_pro_theme_options = theme_data_setup();	
		update_option('spicy_pro_options',$spicy_pro_theme_options);
	}
?>