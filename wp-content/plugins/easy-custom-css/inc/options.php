<?php
/***Plugin Name	: Easy Custom CSS
 *  @file           options.php
 *  @author         Hari Maliya
 *  @copyright      2013 Webriti
 *  @license        license.txt
 *  @filesource     wp-content/plugin/easy-custom-css/options.php
 */
	/*** Add the options page ***/
	function easy_custom_css_admin_menu()
	{	
		$menu = add_options_page( __('Easy Custom css', 'easy_css'), __('Easy custom css', 'easy_css'), 'manage_options', 'easy_custom_css_panels', 'easy_custom_css_options_panels_page');
		add_action( 'admin_print_styles-' . $menu, 'load_easy_custom_css_js' );
			
			// Disable "WP Editor" in this page if is active: http://wordpress.org/extend/plugins/wp-editor/
			If (is_plugin_active("wp-editor/wpeditor.php") && $_SERVER['QUERY_STRING'] == 'page=easy_custom_css_panels')
			{
				function remove_wpeditor_header_info()
				{
				// Wp Editor Style
				wp_deregister_style('wpeditor');
				wp_deregister_style('fancybox');
				wp_deregister_style('codemirror');
				wp_deregister_style('codemirror_dialog');
				wp_deregister_style('codemirror_themes');
				// Wp Editor Script
				wp_deregister_script('wpeditor');
				wp_deregister_script('wp-editor-posts-jquery');
				wp_deregister_script('fancybox');
				wp_deregister_script('codemirror');
				wp_deregister_script('codemirror_php');
				wp_deregister_script('codemirror_javascript');
				wp_deregister_script('codemirror_css');
				wp_deregister_script('codemirror_xml');
				wp_deregister_script('codemirror_clike');
				wp_deregister_script('codemirror_dialog');
				wp_deregister_script('codemirror_search');
				wp_deregister_script('codemirror_searchcursor');
				wp_deregister_script('codemirror_mustache');
				}
			add_action('admin_init', 'remove_wpeditor_header_info', 20);
			}
	}
	add_action( 'admin_menu', 'easy_custom_css_admin_menu' );	
	//easy custom css and js
	function load_easy_custom_css_js()
	{	
		wp_enqueue_style('easy-custom-css-style', EASY_PLUGIN_DIR_URL_INC . '/css/style.css' );
		wp_enqueue_style('easy-custom-css-admin', EASY_PLUGIN_DIR_URL_INC . '/css/codemirror.css' );
		wp_enqueue_script('easy-custom-css-codemirror', EASY_PLUGIN_DIR_URL_INC . '/js/codemirror.js');
		wp_enqueue_script('easycss', EASY_PLUGIN_DIR_URL_INC .'/js/easycss.js');
		wp_enqueue_script('easytab', EASY_PLUGIN_DIR_URL_INC .'/js/easy_tab.js');		
	}
	function easy_custom_css_options_panels_page()
	{	require_once(EASY_PLUGIN_DIR_PATH_INC .'/easy_options.php'); }