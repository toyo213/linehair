<?php
/*
 * @file           theme_option.php
 * @package        Busiprof
 * @copyright      2013 Appointment
 * @license        license.txt
 * @filesource     wp-content/themes/Busiprof/functions/theme_option.php
*/	
?>
<?php
add_action('admin_menu', 'busi_admin_menu_pannel');  
function busi_admin_menu_pannel()
 {
	//wp_enqueue_script( 'dashboard');	
	wp_enqueue_script( 'wpb_option_pannel', get_template_directory_uri() . '/functions/theme_options/js/busiprof_option_pannel.js',array('media-upload','thickbox','jquery-ui-sortable'));
	wp_enqueue_style('thickbox');	
	wp_enqueue_style( 'wpb_option_pannel', get_template_directory_uri() . '/functions/theme_options/css/busiprof_option_pannel.css' );
	wp_enqueue_style('optionpanal-dragdrop',get_template_directory_uri().'/functions/theme_options/css/optionpanal-dragdrop.css');	
	
	
	$page=add_theme_page( 'theme', 'Option Panel', 'edit_theme_options', 'busi_prof', 'busiprof_option_panal_function' ); 
}
function busiprof_option_panal_function () 
{	
	require_once('css/tooltip_css.php');
	require_once('webr_options_pannel.php');
}
?>