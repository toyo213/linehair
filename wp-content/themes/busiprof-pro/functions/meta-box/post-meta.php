<?php
/************ Home slider meta post ****************/
add_action('admin_init','busiprof_slider_init');
function busiprof_slider_init()
	{
		add_meta_box('home_slider_meta', 'Description', 'busiprof_meta_slider', 'busiprof_slider', 'normal', 'high');
		add_meta_box('home_service_meta', 'featured Service', 'busiprof_meta_service', 'busiprof_service', 'normal', 'high');
		add_meta_box('home_project_meta', 'featured Project', 'busiprof_meta_project', 'busiprof_project', 'normal', 'high');
		add_meta_box('busiprof_testimonial_meta', 'Testimonial Service', 'busiprof_testimonial_meta_box', 'busiprof_testimonial', 'normal', 'high');
		add_meta_box('busiprof_team_meta', 'Our Team', 'busiprof_team_meta_box', 'busiprof_team', 'normal', 'high');		
		add_meta_box('busiprof_client_strip', 'Client Image', 'busiprof_clientstrip_meta_box', 'busiprof_clientstrip', 'normal', 'high');
		add_meta_box('busiprof_portfolio_meta', 'Portfolio ', 'busiprof_portfolio_meta_box', 'busiprof_portfolio', 'normal', 'high');
		
		add_action('save_post','busiprof_meta_save');
	}
	// code for slider banner description
	function busiprof_meta_slider()
	{	global $post ;
		$image_caption=sanitize_text_field( get_post_meta( get_the_ID(), 'image_description', true ));
		$readmorelink =sanitize_text_field( get_post_meta( get_the_ID(), 'readmore_link', true ));
		$readmorebutton =sanitize_text_field( get_post_meta( get_the_ID(), 'readmore_button', true ));
		$readmore_link_target =sanitize_text_field( get_post_meta( get_the_ID(), 'readmore_link_target', true ));
	?>	<p><label><?php _e('Image Caption','busi_prof');?></label></p>
		<p><textarea name="meta_image_description" id="meta_image_description" style="width: 480px; height: 56px; padding: 0px;" placeholder="Enter product banner description (Use max word length 150 words)"  rows="3" cols="10" ><?php if (!empty($image_caption)) echo esc_textarea( $image_caption ); ?></textarea></p>	
		<p>	<label><?php _e('Read More Button','busi_prof');?></label></p> 
		<p><input class="inputwidth"  name="readmore_button" id="readmore_button" placeholder="Enter lable for button" type="text" value="<?php if (!empty($readmorebutton)) echo esc_attr($readmorebutton);?>"> </p>
		<p><label><?php _e('Read More Link','busi_prof');?></label></p> 
		<p><input class="inputwidth" name="readmore_link" id="readmore_link" placeholder="Enter link or url for button" type="text" value="<?php if (!empty($readmorelink)) echo esc_attr($readmorelink);?>"> </p>
		<p><input type="checkbox" id="readmore_link_target" name="readmore_link_target" <?php if($readmore_link_target) echo "checked"; ?> > <?php _e('Open link in a new window/tab','busi_prof'); ?></p>
<?php }

	// code for service description
	function busiprof_meta_service()
	{	global $post;		
		$service_icon_image =sanitize_text_field( get_post_meta( get_the_ID(), 'service_icon_image', true ));
		$service_icon_link =sanitize_text_field( get_post_meta( get_the_ID(), 'service_icon_link', true ));
		$service_icon_target =sanitize_text_field( get_post_meta( get_the_ID(), 'service_icon_target', true ));
		$meta_service_description =sanitize_text_field( get_post_meta( get_the_ID(), 'meta_service_description', true ));
		
	?>	
		<p><h4 class="heading"><?php _e('Service Icon Image','busi_prof');?></h4></p>
		<p><input class="inputwidth" type="text" value="<?php if($service_icon_image!='') { echo $service_icon_image; } ?>" id="service_icon_image" name="service_icon_image" size="36" class="upload has-file" placeholder="Upload service icon image size(35X45)" />
		<input type="button" id="upload_button" value="Upload" class="upload_image_button" class="upload_button" />	</p>
		<p><h4 class="heading"><?php _e('Service Icon link','busi_prof');?></h4></p>
		<p><input style="width:600px;" name="service_icon_link" id="service_icon_link" placeholder="Enter the service icon link" type="text" value="<?php if (!empty($service_icon_link)) echo esc_attr($service_icon_link);?>"></p>
		<p><?php _e('Enter the service link. For example','busi_prof'); ?> -: <b> https://www.webriti.com</b></p>
		<p><input type="checkbox" id="service_icon_target" name="service_icon_target" <?php if($service_icon_target) echo "checked"; ?> > <?php _e('Open link in a new window/tab','busi_prof'); ?></p>
		<p><h4 class="heading"><?php _e('Service Descritpion','busi_prof');?></h4>
		<p><textarea name="meta_service_description" id="meta_service_description" style="width: 600px; height: 56px; padding: 0px;" placeholder="Enter Service description (Use max-word 115)"  rows="3" cols="10" ><?php if (!empty($meta_service_description)) echo esc_textarea( $meta_service_description ); ?></textarea> </p>	
<?php }

// code for project description
	function busiprof_meta_project()
	{	global $post ;
		
		$project_link =sanitize_text_field( get_post_meta( get_the_ID(), 'project_link', true ));
		$project_target =sanitize_text_field( get_post_meta( get_the_ID(), 'project_target', true ));
		$project_title_description =sanitize_text_field( get_post_meta( get_the_ID(), 'project_title_description', true ));
	?>	<p><h4 class="heading"><?php _e('Project link','busi_prof');?></h4></p>
		<p><input style="width:600px;" name="project_link" id="project_link" placeholder="Enter the project link" type="text" value="<?php if (!empty($project_link)) echo esc_attr($project_link);?>"> </p>
		<p><span><?php _e('Enter the project link. For example','busi_prof'); ?> -: <b> http://www.webriti.com</b> </span>		</p>
		<p><input type="checkbox" id="project_target" name="project_target" <?php if($project_target) echo "checked"; ?> > <?php _e('Open link in a new window/tab','busi_prof'); ?></p>
		<p><h4 class="heading"><?php _e('Project Descritpion','busi_prof');?></h4>
		<p><textarea name="project_title_description" id="project_title_description" style="width: 480px; height: 56px; padding: 0px;" placeholder="Enter product banner description (Use max-word 80)"  rows="3" cols="10" ><?php if (!empty($project_title_description)) echo esc_attr($project_title_description);?></textarea></p>	
<?php }

// code for testimonial description
function busiprof_testimonial_meta_box()
	{	global $post ;
		$testimonial_description = sanitize_text_field( get_post_meta( get_the_ID(), 'testimonial_desc', true ));
		$testimonial_author_designation = sanitize_text_field( get_post_meta( get_the_ID(), 'author_designation', true ));
		$testimonial_author_link = sanitize_text_field( get_post_meta( get_the_ID(), 'author_link', true ));
		$testimonial_author_link_target = sanitize_text_field( get_post_meta( get_the_ID(), 'author_link_target', true ));
	?>	
		<p><label><?php _e('Testimonial Description','busi_prof');?></label></p>
		<p><textarea name="meta_testimonial_desc" id="meta_testimonial_desc" style="width: 480px; height: 56px; padding: 0px;" placeholder="Enter testimonial descritpion user max word 150"  rows="3" cols="10" ><?php if (!empty($testimonial_description)) echo esc_textarea( $testimonial_description ); ?></textarea></p>
		<p><label><?php _e('Author Designation','busi_prof');?></label></p>
		<p><input  name="meta_testimonial_author_designation" id="meta_testimonial_designation" placeholder="Enter author designation" type="text" value="<?php if (!empty($testimonial_author_designation)) echo esc_attr($testimonial_author_designation);?>"></p>
		<p>	<label><?php _e('Author Designation Link','busi_prof');?></label></p>
		<p><input  name="meta_testimonial_author_link" id="meta_testimonial_link" placeholder="Enter author designation link" type="text" value="<?php if (!empty($testimonial_author_link)) echo esc_attr($testimonial_author_link);?>"></p>
		<p><input type="checkbox" id="meta_testimonial_author_link_target" name="meta_testimonial_author_link_target" <?php if($testimonial_author_link_target) echo "checked"; ?> > <?php _e('Open link in a new window/tab','busi_prof'); ?></p>
<?php }

// code for team description
function busiprof_team_meta_box()
	{	global $post ;
		$team_designation = sanitize_text_field( get_post_meta( get_the_ID(), 'busi_designation', true ));
		$team_description = sanitize_text_field( get_post_meta( get_the_ID(), 'busi_desc', true ));
		$team_twitter_url = sanitize_text_field (get_post_meta(get_the_ID(),'twitter_url',true));
		$team_fb_url = sanitize_text_field(get_post_meta(get_the_ID(),'fb_url',true));
		$team_linked_url = sanitize_text_field (get_post_meta(get_the_ID(),'linked_url',true));	
		
	?>	
		<p><label><?php _e('Member Designation','busi_prof');?></label></p>
		<p><input  name="meta_team_member_designation" id="meta_team_designation" placeholder="Enter Member's designation"	type="text" value="<?php if (!empty($team_designation)) echo esc_attr($team_designation);?>"></p>
		<p><label><?php _e('Team Member,s Description','busi_prof');?></label></p>
		<p><textarea name="meta_team_member_desc" id="meta_team_desc" style="width: 480px; height: 56px; padding: 0px;" placeholder="Enter Team Member Description (Use max-word 150)"  rows="3" cols="10" ><?php if (!empty($team_description)) echo esc_textarea( $team_description ); ?></textarea></p>
		<p><label><?php _e('Member Twitter Address','busi_prof');?></label></p>
		<p><input  name="meta_team_member_twitter" id="meta_team_twitter" placeholder="Enter Member's twitter address" type="text" value="<?php if (!empty($team_twitter_url)) echo esc_attr($team_twitter_url); ?>"></p>
		<p><label><?php _e('Member Facebook Address','busi_prof');?></label></p>
		<p><input  name="meta_team_member_fb" id="meta_team_fb" placeholder="Enter Member's facebook address" type="text" value="<?php if (!empty($team_fb_url)) echo esc_attr($team_fb_url);?>"></p>
		<p><label><?php _e('Member LinkedIn Address','busi_prof');?></label></p>
		<p><input  name="meta_team_member_linked" id="meta_team_linked" placeholder="Enter Member's LinkedIn address" type="text" value="<?php if (!empty($team_linked_url)) echo esc_attr($team_linked_url);?>"></p>
<?php }

function busiprof_clientstrip_meta_box()
	{	?>	
		<p><label><?php _e('Upload Client image using Featured Image','busi_prof');?></label></p>
		<?php
	}
	// portfolio 
	function busiprof_portfolio_meta_box()
	{	
		global $post ;
		$portfolio_description = sanitize_text_field( get_post_meta( get_the_ID(), 'portfolio_description', true ));
		$portfolio_link = sanitize_text_field( get_post_meta( get_the_ID(), 'portfolio_link', true ));
		$portfolio_target = sanitize_text_field( get_post_meta( get_the_ID(), 'portfolio_target', true ));		
	?>	
		<p><label><?php _e('Portfolio Descritpion','busi_prof');?></label></p>
		<p><textarea name="portfolio_description" id="portfolio_description" style="width: 480px; height: 56px; padding: 0px;" placeholder="Enter portfolio description (Use max word length 150 words)"  rows="3" cols="10" ><?php if (!empty($portfolio_description)) echo esc_textarea( $portfolio_description ); ?></textarea></p>
		<p><h4 class="heading"><?php _e('Portfolio link','busi_prof');?></h4></p>
		<p><input style="width:480px;" name="portfolio_link" id="portfolio_link" placeholder="Enter the Portfolio link" type="text" value="<?php if (!empty($portfolio_link)) echo esc_attr($portfolio_link);?>"></p>
		<p><?php _e('Enter the Portfolio link. For example','busi_prof'); ?> -: <b> https://www.webriti.com</b> </p>
		<p><input type="checkbox" id="portfolio_target" name="portfolio_target" <?php if($portfolio_target) echo "checked"; ?> > <?php _e('Open link in a new window/tab','busi_prof'); ?></p>
	<?php
	}

function busiprof_meta_save($post_id) 
{	 
	if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit']))
        return;
		
	if ( ! current_user_can( 'edit_page', $post_id ) )
	{   return ;	} 
		
	if(isset( $_POST['post_ID']))
	{ 	
		$post_ID = $_POST['post_ID'];				
		$post_type=get_post_type($post_ID);
		if($post_type=='busiprof_slider')
		{	//if($_POST) { print_r($_POST); die(); }
			update_post_meta($post_ID, 'image_description', sanitize_text_field($_POST['meta_image_description']));					 
			update_post_meta($post_ID, 'readmore_button', sanitize_text_field($_POST['readmore_button']));				
			update_post_meta($post_ID, 'readmore_link', sanitize_text_field($_POST['readmore_link']));
			update_post_meta($post_ID, 'readmore_link_target', sanitize_text_field($_POST['readmore_link_target']));
			
		}
		else if($post_type=='busiprof_service')
		{
			update_post_meta($post_ID, 'service_icon_image', sanitize_text_field($_POST['service_icon_image']));
			update_post_meta($post_ID, 'service_icon_link', sanitize_text_field($_POST['service_icon_link']));
			update_post_meta($post_ID, 'meta_service_description',$_POST['meta_service_description']);
			update_post_meta($post_ID, 'service_icon_target', sanitize_text_field($_POST['service_icon_target']));
			
		}
		else if($post_type=='busiprof_project')
		{	
			update_post_meta($post_ID, 'project_title_description', sanitize_text_field($_POST['project_title_description']));
			update_post_meta($post_ID, 'project_link', sanitize_text_field($_POST['project_link']));	
			update_post_meta($post_ID, 'project_target', sanitize_text_field($_POST['project_target']));								
		}
		else if($post_type=='busiprof_testimonial')
		{
			update_post_meta($post_ID, 'testimonial_desc', sanitize_text_field($_POST['meta_testimonial_desc']));				
			update_post_meta($post_ID, 'author_designation', sanitize_text_field($_POST['meta_testimonial_author_designation']));				
			update_post_meta($post_ID, 'author_link',sanitize_text_field($_POST['meta_testimonial_author_link']));				
			update_post_meta($post_ID, 'author_link_target',sanitize_text_field($_POST['meta_testimonial_author_link_target']));				
		}
		
		else if($post_type=='busiprof_team')
		{
			update_post_meta($post_ID, 'busi_designation', sanitize_text_field($_POST['meta_team_member_designation']));				
			update_post_meta($post_ID, 'busi_desc', sanitize_text_field($_POST['meta_team_member_desc']));				
			update_post_meta($post_ID, 'twitter_url', sanitize_text_field($_POST['meta_team_member_twitter']));				
			update_post_meta($post_ID, 'fb_url', sanitize_text_field($_POST['meta_team_member_fb']));				
			update_post_meta($post_ID, 'linked_url', sanitize_text_field($_POST['meta_team_member_linked']));
		}
		else if($post_type=='busiprof_portfolio')
		{
			update_post_meta($post_ID, 'portfolio_description', sanitize_text_field($_POST['portfolio_description']));
			update_post_meta($post_ID, 'portfolio_link', sanitize_text_field($_POST['portfolio_link']));
			update_post_meta($post_ID, 'portfolio_target', sanitize_text_field($_POST['portfolio_target']));		
		}
					
	}				
} 
?>