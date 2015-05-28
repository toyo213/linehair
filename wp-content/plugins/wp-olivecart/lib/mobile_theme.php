<?php

if(!is_admin()){
$cart_theme_type = 'pc';
#$cart_theme_type = 'mobile';
$theme_name=wp_get_theme();
	if (preg_match('/Android/',$_SERVER['HTTP_USER_AGENT'])){
		add_filter('stylesheet', 'get_android_theme');
		add_filter('template', 'get_android_theme');
		$cart_theme_type = 'mobile';
	}
}
function get_ipad_theme(){
	$ipad_theme =  get_option('cart_ipad_theme');
	if($GLOBALS['theme_name']==$ipad_theme){
		$GLOBALS['cart_theme_type'] = 'pc';
	}
  $themes = wp_get_themes();
	foreach ($themes as $theme) {
	  if ($theme['Name'] == $ipad_theme) {
	      return $theme['Stylesheet'];
	  }
	}	
}

function get_iphone_theme(){
	$iphone_theme =  get_option('cart_iphone_theme');
	if($GLOBALS['theme_name']==$iphone_theme){
		$GLOBALS['cart_theme_type'] = 'pc';
	}
    $themes = wp_get_themes();
	foreach ($themes as $theme) {
	  if ($theme['Name'] == $iphone_theme) {
	      return $theme['Stylesheet'];
	  }
	}	
}
function get_android_theme(){ 
	$android_theme =  get_option('cart_android_theme');
	if($GLOBALS['theme_name']==$android_theme ){
		$GLOBALS['cart_theme_type'] = 'pc';
	}
	$themes = wp_get_themes();
	foreach ($themes as $theme) {
	  if ($theme['Name'] == $android_theme) {
	      return $theme['Stylesheet'];
	  }
	}	
}
?>
