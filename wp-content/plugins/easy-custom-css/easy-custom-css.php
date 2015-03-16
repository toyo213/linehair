<?php
/*
Plugin Name: Easy Custom CSS by Webriti
Plugin URI: http://webriti.com/
Description: Use this plugin to write your own Custom CSS. No need to modify the Theme files. 
Version: 1.0
Author: Hari Maliya
Author URI: http://webriti.com
License: GPL3
License URI: http://www.gnu.org/licenses/gpl.html
Donate link: http://webriti.com/easy-custom-css/donate/
*/

/*** The instantiated version of this plugin's class ***/
				
$GLOBALS['easy_custom_css'] = new easy_custom_css; 

class easy_custom_css
{
	/*** This plugin's identifier ***/	 
	const ID = 'easy-custom-css';
	
	/*** This plugin's name ***/
	const NAME = 'easy custom css';
	
	/*** This plugin's version ***/
	const VERSION = '0.8';
	
	
	
	/*** Has the internationalization text domain been loaded?  @var bool ***/
	protected $loaded_textdomain = false;
	
	
	/*** Declares the WordPress action and filter callbacks ***/
	public function __construct() 
	{
		if (is_admin())
		{
			/** Define Directory Location Constants */
			define('EASY_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
			define('EASY_PLUGIN_DIR_PATH_INC', plugin_dir_path(__FILE__).'inc');
			
			/** Define https file Location Constants */
			define('EASY_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ));
			define('EASY_PLUGIN_DIR_URL_INC', plugin_dir_url(__FILE__).'inc');
			
			/******** base class function for Simple Custom CSS *******/
			$this->load_plugin_textdomain();
			$this->load_plugin_directory_file();				
		}
		//add Custom css 
		$this->easy_custom_css_add();
	}
	
	
	/*** A centralized way to load the plugin's textdomain for
	 * 	internationalization * 	@return void
	 */
	protected function load_plugin_textdomain() {
		if (!$this->loaded_textdomain) {
			load_plugin_textdomain('easy_css', false, self::ID . '/lang');
		}
	}	

	protected function load_plugin_directory_file()
	{	require_once(EASY_PLUGIN_DIR_PATH_INC .'/options.php'); }
	
	protected function easy_custom_css_add()
	{
		$easy_custom_css_webriti = strip_tags(get_option('easy_custom_css_webriti'));
		if($easy_custom_css_webriti!='')
		{	//add_action('wp_head', 'add_easy_custom_css', 9999);
			add_action('wp_footer', 'add_easy_custom_css', 9999);
			function add_easy_custom_css()
			{
				$easy_custom_css_webriti = strip_tags(get_option('easy_custom_css_webriti'));
				echo "<style type='text/css'>/* Plugin Author: Hari Maliya */\n\n".$easy_custom_css_webriti."\n\n</style>";
			}
		}
	}	
	
} /// class end 

	
?>