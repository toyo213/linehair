<?php

add_action( 'admin_menu', 'wp_olivecart_setup_menu' );
function wp_olivecart_setup_menu(){
	global $menu,$submenu;
	$cart_postage		= new  Cart_Postage_Setup();
	$cart_settlement	= new  Cart_Settlement_Setup();
	$cart_charges		= new  Cart_Charges_Setup();
	#$cart_ssl         = new  Cart_SSL_Setup();
	$cart_end_message	= new  Cart_End_Message_Setup();
	$cart_auto_email	= new  Cart_Auto_Email_Setup();
	#$cart_mobile      = new  Cart_Moblie_Setup();
	#$cart_button      = new  Cart_Button_Setup();
	$cart_options		= new  Cart_Options_Setup();
	#$item_backup		= new Cart_Item_Backup();
	$hook1 = add_menu_page(__('Shopping Cart Setup','WP-OliveCart'),'OliveCart_Setup','administrator', 'olivecart_postage',array(&$cart_postage, 'on_show_page'),WP_PLUGIN_URL.'/wp-olivecart/images/icon_cart.png');
	$hook2 = add_submenu_page('olivecart_postage', __('Settlement Method','WP-OliveCart'), __('Settlement','WP-OliveCart'), 'administrator','olivecart_settlement', array(&$cart_settlement, 'on_show_page'));
	$hook3 = add_submenu_page('olivecart_postage', __('Othre Items','WP-OliveCart'), __('Othre Items','WP-OliveCart'),'administrator','olivecart_charges', array(&$cart_charges, 'on_show_page'));
	#$hook4 = add_submenu_page('olivecart_postage', __('Cart Security','WP-OliveCart'), __('Cart Security','WP-OliveCart'), 'administrator','olivecart_ssl', array(&$cart_ssl, 'on_show_page'));
	$hook5 = add_submenu_page(''                 , __('Cart End Message','WP-OliveCart'), __('Cart End Message','WP-OliveCart'), 'administrator','olivecart_end_message', array(&$cart_end_message, 'on_show_page'));
	$hook6 = add_submenu_page(''                 , __('Cart Auto Reply Email','WP-OliveCart'), __('Cart Auto Reply Email','WP-OliveCart'), 'administrator','olivecart_auto_email', array(&$cart_auto_email, 'on_show_page'));
	#$hook7 = add_submenu_page('olivecart_postage', __('Mobile','WP-OliveCart'), __('Mobile','WP-OliveCart'), 'administrator','olivecart_mobile', array(&$cart_mobile, 'on_show_page'));
	#$hook8 = add_submenu_page('olivecart_postage', __('Button','WP-OliveCart'), __('Button','WP-OliveCart'), 'administrator','olivecart_button', array(&$cart_button, 'on_show_page'));
	$hook9 = add_submenu_page('olivecart_postage', __('Cart Options','WP-OliveCart'), __('Cart Options','WP-OliveCart'), 'administrator','olivecart_options', array(&$cart_options, 'on_show_page'));
	
	add_menu_page('Item info',__('Item','WP-OliveCart'), 'administrator', 'edit.php?post_type=cart','',WP_PLUGIN_URL.'/wp-olivecart/images/icon_commodity.png');
	#add_submenu_page('edit.php?post_type=cart', __('Export','WP-OliveCart'), __('Export','WP-OliveCart'),'administrator','item_backup', array(&$item_backup, 'on_show_page'));

	add_action( 'load-'.$hook1, array(&$cart_postage,    'on_load'));
	add_action( 'load-'.$hook2, array(&$cart_settlement, 'on_load'));
	add_action( 'load-'.$hook3, array(&$cart_charges,    'on_load'));
	#add_action( 'load-'.$hook4, array(&$cart_ssl,        'on_load'));
	add_action( 'load-'.$hook5, array(&$cart_end_message,'on_load'));
	add_action( 'load-'.$hook6, array(&$cart_auto_email, 'on_load'));
	#add_action( 'load-'.$hook7, array(&$cart_mobile,     'on_load'));
	#add_action( 'load-'.$hook8, array(&$cart_button,     'on_load'));
	add_action( 'load-'.$hook9, array(&$cart_options,    'on_load'));

	foreach ( $menu as $key=>$value ){
		if ($menu[$key][0] == 'OliveCart_Setup' ) {
			$menu[$key][0]                       = 'OliveCart';
			$submenu['olivecart_postage'][0][0]  = __( 'Postage','WP-OliveCart' );
		}
	}
	

}
function remove_menus(){
    remove_menu_page('edit.php?post_type=cart');
}
add_action('admin_menu', 'remove_menus');

class Cart_Postage_Setup {
var $pagehook;
	//load page
	function on_load() {
		$help_message = new help_message;
		$current_screen = get_current_screen();
		$admin_screen   = WP_Screen::get($current_screen->id);
		$this->pagehook = $current_screen->id;

		/*Help option*/
		$admin_screen->add_help_tab(
			array(
				'title'    => __('help','WP-OliveCart'),
				'id'       => 'help_tab',
				'content'  => $help_message->message(),
				'callback' => false
			)
		);
		wp_enqueue_script('postbox');
		#if(WPLANG == 'ja'){	
		#add_meta_box( 'pref_postage_setup'  ,__('Pref Postage Setup','WP-OliveCart'),
		#array(&$this, 'pref_postage_setup'),   $this->pagehook, 'normal', 'core');
		#}
		add_meta_box( 'total_postage_setup' ,__('Total Postage Setup','WP-OliveCart'),
		array(&$this, 'total_postage_setup'),  $this->pagehook, 'normal', 'core');

    }
	function on_action(){
	require(dirname(__FILE__)."/postage-set.php");
		global $wpdb;
		if( $_POST['action'] == 'edit'){
			$query =  "update CART_postage set postage01='$postage_set01',postage02='$postage_set02',postage03='$postage_set03' where id=1";
			$wpdb->query($query);
			$this->message  = '<div id="message" class="updated below-h2"><p>'.__('Postage data updated','WP-OliveCart').'</p></div>';
		}
		$mylink  = $wpdb->get_row( "SELECT * FROM CART_postage WHERE id = 1" );
		$this->title      = __('Postage Setup','WP-OliveCart');
		$this->icon       = 'cart';
		return $mylink;
	}
    

    function on_show_page() {
		global $wpdb;
		$field_value = $this->on_action();
			$this->action     = 'edit';
		add_meta_box('save_sidebox',__('Save','WP-OliveCart'), array(&$this, 'save_sidebox'), $this->pagehook, 'side', 'core');
		require( dirname(__FILE__).'../../lib/admin/on_showpage1.php');

	}

	function save_sidebox() {
		require( dirname(__FILE__).'../../lib/admin/on_sidebox.php');
	}


	function total_postage_setup($field_value) {
		$total01 = explode(',',$field_value->postage02 );
		$total02 = explode(',',$field_value->postage03 );
		$From    = __('Total:',   'WP-OliveCart');
		$Postage = __('Over   Postage:','WP-OliveCart');
		$en      = __('JPY', 'WP-OliveCart');
		require( dirname(__FILE__).'../../lib/admin/total_postage_setup.php');
	}


}


?>
