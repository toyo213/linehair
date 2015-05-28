<?php
/*
Plugin Name: WP Olive Cart
Plugin URI: http://www.wp-olivecart.com
Description: Simple Shopping Cart System WP-OliveCart.
Version: 3.0.1
Author: Olive Design.
Author URI: http://www.wp-olivecart.com
License: GPL2
*/

load_plugin_textdomain( 'WP-OliveCart', false, 'wp-olivecart/languages' );
require_once( dirname(__FILE__).'/lib/cart/mini_cart.php');
require_once( dirname(__FILE__).'/lib/mypage/user_login.php');
require_once( dirname(__FILE__).'/button.php');
require_once( dirname(__FILE__).'/widget.php');
require_once( dirname(__FILE__).'/lib/mobile_theme.php');
require_once( dirname(__FILE__).'/lib/insert_button.php');
require_once( dirname(__FILE__).'/lib/help.php');
#require_once( dirname(__FILE__).'/lib/login.php');
require_once( dirname(__FILE__).'/lib/cart_content.php');
require_once( ABSPATH . "wp-includes/pluggable.php" );
require_once( dirname(__FILE__).'/lib/cart-table.php');
require_once( dirname(__FILE__).'/lib/cart-taxonomy.php');
#require_once( dirname(__FILE__).'/page_archive.php');
require_once( dirname(__FILE__).'/lib/install.php');
add_theme_support( 'post-thumbnails' );




$WPOliveCartInstall = new WPOliveCartInstall();
register_activation_hook(__FILE__, array(&$WPOliveCartInstall,'cart_install'));
register_deactivation_hook(__FILE__,array(&$WPOliveCartInstall,'cart_remove'));

if (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] != 'off')  {
	$is_ssl=true;
}
elseif (isset($_SERVER['HTTP_VIA']) and $_SERVER['HTTP_VIA'] != 'off')  {
	$is_ssl=true;

}

if($is_ssl && !is_admin() && !mb_eregi('wp-login.php',$_SERVER["REQUEST_URI"])){
	if($default_permalink) { update_option('permalink_structure',''); }
	add_filter( 'site_url','fix_site_url',10,3);
	add_filter( 'bloginfo_url', 'fix_bloginfo_url',8, 2 );
	add_filter('template_directory_uri', 'fix_bloginfo_url');
	add_filter( 'home_url', 'fix_home_url');
	add_filter('stylesheet_uri', 'fix_bloginfo_url');
	add_filter('plugins_url', 'fix_bloginfo_url');
}


function fix_site_url($url){

		$sslurl = get_option('ssl_url');
		if(!$sslurl){ $sslur=$url; }
		return $sslurl;
}
function fix_bloginfo_url($output)
{
		$siteurl=get_option('siteurl');
		$sslurl = get_option('ssl_url');
		if($sslurl){
			if(mb_eregi('https:',$output)){
				$output = str_replace('https:', 'http:', $output);
			}
  		$output = str_replace($siteurl,$sslurl, $output);
  	}
	return $output;
}
#検索にカスタム投稿タイプを含める。
function search_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ($query->is_search) {
      $query->set('post_type', array( 'cart' ) );
    }
  }
}

add_action('pre_get_posts','search_filter');


function portfolio_page_template( $template ) {
	if (is_tax( 'product_category' ) ){
		$new_template = locate_template( array( 'taxonomy.php','category.php' ,'archive.php','index.php') );
		if ( '' != $new_template ) {
			return $new_template ;
		}
	}

	return $template;
}

add_filter( 'template_include', 'portfolio_page_template');

function fix_home_url($output){ 
		$siteurl=get_option('siteurl');
		$sslurl = get_option('ssl_url');
		
		if($sslurl){
			if(mb_eregi('https://',$output )){
				$output    = str_replace( 'https://', "http://", $output );
				$output = str_replace($sslurl,$siteurl, $output);
			}
		}
    return $output;
}


add_action('wp_head','cart_js');
function cart_js(){
		if(get_option('ssl_url') && $GLOBALS['is_ssl']){ $url=get_option('ssl_url');}
		else{$url=get_option('siteurl');}
	$pluginDirUrl =  $url. "/wp-content/plugins/wp-olivecart/";
    echo '<script type="text/javascript" src="'.$pluginDirUrl.'js/cart.js"></script> 
<script type="text/javascript">Url=\''.$url.'/\'; page_id=\''.get_option('cart_page_id').'\';</script>'."\n"; 
	  echo '<link rel="stylesheet" href="'.$pluginDirUrl.'cart/'.$GLOBALS['cart_theme_type'].'/style_cart.css" type="text/css" /> '."\n";
	  echo '<link rel="stylesheet" href="'.$pluginDirUrl.'mypage/'.$GLOBALS['cart_theme_type'].'/style_mypage.css" type="text/css" /> '."\n"; 
}

if ( is_admin() or is_user_logged_in()) {
	wp_olivecart_read('include');
}
else{
//sec
		if(!mb_eregi('wp-login.php',$_SERVER["REQUEST_URI"])){
			#if(get_option('shopping_member_option')=='1'){ add_action('get_header', 'member_login');}
	}
}


function wp_olivecart_read($foldaname){
	$defaultdir = opendir(dirname(__FILE__).'/'.$foldaname);
	while ($default_file = readdir ($defaultdir)){
	
		if($default_file != '.' AND $default_file != '..'){
			if(!isset($file[$default_file])){
			if(!mb_eregi('.php',$default_file)){ continue; }
					$file[$default_file]=dirname(__FILE__).'/'.$foldaname.'/'.$default_file;
		 	}
		}
	}
	closedir($defaultdir);
	@ksort($file);
	if($file){
		foreach ($file as $key => $value){
  			if (file_exists($value)){  require_once($value); }
		}
	}
}

new InsertCartButton;




?>
