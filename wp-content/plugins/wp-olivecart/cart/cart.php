<?php
/**Shopping Cart System wp-olivecart.
 * @link http://www.wp-olivecart.com/
 * @copyright 2008-2013 Olive-Design
 * @package wp-olivecart
 */
require_once( dirname(__FILE__)."/../conf/user_conf.php");
require_once( dirname(__FILE__)."/../conf/php_ini_set.php");
require_once( dirname(__FILE__).'/../lib/db_access.php');
require_once( dirname(__FILE__).'/../lib/error_check.php');
require_once( dirname(__FILE__).'/../conf/form_conf.php');
require_once( dirname(__FILE__).'/../lib/cart/send_mail.php');
require_once( dirname(__FILE__)."/../lib/db_access2.php");
require_once( dirname(__FILE__)."/../lib/zipcode.php");
require_once( dirname(__FILE__).'/../lib/cart/session_connect.php');
#require_once( dirname(__FILE__)."/../lib/mypage/my-page.php");
require_once( dirname(__FILE__)."/../lib/mypage/cookie_check.php");

/* $Id: cart.php  2013-10-26 15:10:03 $ */
#require_once( dirname(__FILE__)."/../lib/cart/cart_step.php");
$cart_preview= new CartPreview;
if (!is_admin() ) { $cart_preview->get_pasonaldata(); }
add_filter( 'the_title','cart_title');
function cart_title($title){
	if(get_the_ID() == get_option('cart_page_id') and is_singular() and in_the_loop()){
			  $title =   get_cart_title();
	}
  return $title;
}
function get_cart_title(){
//change page title
	switch($_REQUEST['step']) {
		case '1';
			return __('Review your order','WP-OliveCart');
		case '2';
			return  __('Review your order','WP-OliveCart');
		case '3';
			return __('Please enter your contact details','WP-OliveCart');
		case '4';
			return __('Please enter your contact details','WP-OliveCart');
		case '5';
			return __('Please enter your contact details','WP-OliveCart');
		case '6';
			return __('Payment Options & Fees','WP-OliveCart');
		case '7';
			return __('Final Review','WP-OliveCart');;
		case '8';
			return __('Thank you for your order' ,'WP-OliveCart');;
		case 'lost';
			return __('Forgot your password?' ,'WP-OliveCart');
		case 'lost_send';
			return   __('Forgot your password?' ,'WP-OliveCart');;
		case 'mail';
			return   __('Inquiry Form' ,'WP-OliveCart');;
		default;
			return __('Review your order','WP-OliveCart');
	}
}
class CartPreview{
	function get_cart() { 
//Html page view
		switch($_REQUEST['step']) {
			case '1';
				$this->step1();
				break;
			case '2';
				$this->step2();
				break;
			case '3';
				$this->step3();
				break;
			case '4';
				$this->step4();
				break;
			case '5';
				$this->step5();
				break;
			case '6';
				$this->step6();
				break;
			case '7';
				$this->step7();
				break;
			case '8';
				$this->step8();
				break;
			default;
				$this->step2();
		}
	}

	function get_pasonaldata(){
		if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
		if(isset($_GET['mode'])){  $mode = $_GET['mode']; }
		//Cart POST Data session connection
		$GLOBALS['session']  = new session_connect;
		//Sql database connection
		$GLOBALS['fileread'] = new sql_connect;
		$GLOBALS['session']->sission_read();
		$personaldata = $GLOBALS['session']->sission_cart();

		//Shoping Cart Step2 Cart is empty
		if ($mode == 'empty') { $GLOBALS['session']->sission_delete(); }
		$GLOBALS['personaldata'] = $GLOBALS['session']->sission_cart();
		$GLOBALS['mode'] = $mode;
	}
	/* $Id: cart_step1  2009-02-12 15:10:03 $ */
	function step1(){
		require(dirname(__FILE__).'/'.$GLOBALS['cart_theme_type'].'/cart-step1.php');
	}

	/* $Id: cart_step2  2009-08-20 15:10:03 $ */
	function step2() {
		$sid	=	session_id();
		if(get_option('ssl_url')){ $url = get_option('ssl_url').'/'; }
		else{ $url = get_option('siteurl').'/'; }
		require(dirname(__FILE__).'/'.$GLOBALS['cart_theme_type'].'/cart-step2.php');
	}
	/* $Id: cart_step3  2009-08-20 17:10:03 $ */
	function step3($error=null) {
		#Session check 
		$cookie_check = new OliveCartCookie;
		$cookie_check->time_check();
		$cookie	=	$cookie_check->get_cookie();
		$cartDB	=	new CartDBAccess;
		if($cartDB->User_read($cookie['password1'],$cookie['mailaddress1'])){ return $this->step5(); }
		$session_check = $GLOBALS['session']->sission_cart();
		if( empty($session_check) ) { return $this->step2(); }
		if( $GLOBALS['mode']=='user_check' ){
			if(empty($_POST['mailaddress1'])) {		$error['mailaddress1']	= 'error';	}
			elseif(empty($_POST['password1'])) {	$error['password1'] 	= 'error';	}
			elseif($cartDB->User_read($_POST['password1'],$_POST['mailaddress1'])){	return $this->step5();	}
			else{	$error['error'] = 'error';	}
		}
		return $this->step4();
		#require(dirname(__FILE__).'/'.$GLOBALS['cart_theme_type'].'/cart-step3.php');
	}

	/* $Id: cart_step4  2013-01-13 13:30:03 $ */
	function step4(){ 
		$cartDB			=	new CartDBAccess;
		$cookie 		=	new OliveCartCookie;
		$_POST['name']	= $_POST['customer_name'];//wordpress name change
		if($_POST['zip_search']){ new WPOliveCartZipcodeSearch;}
		#Session check 
		if(get_the_ID() != get_option('member_regist')){
			$session_check=$GLOBALS['session']->sission_cart();
			if(empty($session_check)){ return $this->step2(); }
		}
		#Mode check
		if(empty($GLOBALS['mode'])){ $_POST['mode']='new_user'; }
		if( $GLOBALS['mode']=='edit_user' ){ $_POST['mode']='edit_write'; }
		$error	 		=	array();
		$form  			=	&$GLOBALS['_indispen'];
		$pref  			=	&$GLOBALS['_pref'];
		$error_check 	=	new error_check;
		$error			=	$error_check->postdata_check($form,$error);
		$error			=	$error_check->mailaddress_check($form,$error);
		if($_GET['member']){ $_POST['member'] = $_GET['member']; }
		if($_POST['member'] == 'yes'){ $error = $error_check->pass_check($form,$error); }
		$error			=	$error_check->deliver_check($deliver,$error);
		if(!empty($error)) { $error['error']="error";  }
		if($GLOBALS['mode'] == 'new_user' and empty($error) and !$_POST['zip_search']){
			$user=$cartDB->User_read($_POST['password1'],$_POST['mailaddress1']);
			if(isset($GLOBALS['mailerror'])){
				$error['error']     = "error";
				$error['mailerror'] = "error";
			} else {
				if($_POST['member']=='yes'){ $cartDB->User_insert(); }
				return $this->step5();
			}
		} 
		if( $GLOBALS['mode'] == 'edit_write' and empty($error) and !$_POST['zip_search']){
			if($_POST['member']=='yes'){ $cookie->set_cookie(); $cartDB->User_edit(); }
			return $this->step5();
		} 
		$count=0;
		require(dirname(__FILE__).'/'.$GLOBALS['cart_theme_type'].'/cart-step4.php');
	}

	/* $Id: cart_step5  2009-08-21 17:30:03 $ */
	function step5(){
		$cartDB			=	new CartDBAccess;
		$cookie_check	=	new OliveCartCookie;
		if($_POST['zip_search']){ new WPOliveCartZipcodeSearch;}
		$_POST['name'] = $_POST['customer_name'];//wordpress 
		//Session check 
		$session_check = $GLOBALS['session']->sission_cart();
		if(empty($session_check)){ return $this->step2(); }
		//User check
		$cookie	=	$cookie_check->get_cookie();
		if($cartDB->User_read($cookie['password1'],$cookie['mailaddress1']) and !$_POST['zip_search']){
			$user=$cartDB->User_read($cookie['password1'],$cookie['mailaddress1']);
			$user['member']='yes';
		} 
		elseif($cartDB->User_read($_POST['password1'],$_POST['mailaddress1']) and !$_POST['zip_search']){
			$user=$cartDB->User_read($_POST['password1'],$_POST['mailaddress1']);
			$user['member']='yes';
		}
		else {
			$user = $_POST;
		}
		if(!$user['name']){ return $this->step2(); }
		$error   = array();
		$form    = &$GLOBALS['_indispen'];
		$deliver = &$GLOBALS['_deliver'];
		if($_POST['mode'] == 'send_deliver' and  !$_POST['zip_search']){
			$error_check = new error_check;
			$error       = $error_check->postdata_check($form,$error);
			$error       = $error_check->deliver_check($deliver,$error);
			if(!empty($error)) { $error['error']="error"; $user=$_POST; }
			if(empty($error)){ return $this->step6(); } 
		}
		$count=0;
		$pref  = &$GLOBALS['_pref'];
		$pref1 = $pref[$user['pref']];
		$pref2 = $pref[$_POST['pref2']];
		require(dirname(__FILE__).'/'.$GLOBALS['cart_theme_type'].'/cart-step5.php');
	}

	/* $Id: cart_step6  2009-08-21 18:32:03 $ */
	function step6(){
		$session_check=$GLOBALS['session']->sission_cart();
		if(empty($session_check)){ return $this->step2(); }
		if(empty($_POST['mailaddress1'])){ return step3('post_error'); }
		if(empty($_POST['payment'])){ $_POST['payment'] = '1'; }
		$payment = $GLOBALS['fileread']->DBcart_read();
		$commission = $GLOBALS['fileread']->DBcommission_read();
		require(dirname(__FILE__).'/'.$GLOBALS['cart_theme_type'].'/cart-step6.php');
	}
	/* $Id: cart_step6  2009-08-21 20:01:03 $ */
	function step7(){
		$cartDB	=	new CartDBAccess;
		//Session check 
		$session=$GLOBALS['session']->sission_cart();
		if(empty($session)){ return $this->step2(); }
		if(empty($_POST['mailaddress1'])){ return $this->step3('post_error'); }
		#if(empty($_POST)){ return step2(); }

		//Post data format
		$error_check            = new error_check;
		$error_check->postdata_check();
		$commission             = $GLOBALS['fileread']->DBcommission_read();
		$pref                   = $GLOBALS['_pref'];
		$pref                   = $pref[$_POST['pref']];
		$pref2                  = $GLOBALS['_pref'];
		$pref2                  = $pref2[$_POST['pref2']];
		$user                   = $_POST;
		$personaldata           = $GLOBALS['personaldata'];
		$cart = $cartDB->Cart_calculation($commission,$session);
		require(dirname(__FILE__).'/'.$GLOBALS['cart_theme_type'].'/cart-step7.php');
	}

	/* $Id: cart_step8  2009-08-22 12:02:14 $ */
	function step8(){
		$cartDB		=	new CartDBAccess;
		$cartmail	=	new CartMailAccess;
		$_POST['name'] = $_POST['customer_name'];
		$commission = $GLOBALS['fileread']->DBcommission_read();
		//Session check 
		$session = $GLOBALS['session']->sission_cart();
		if(empty($session)){ return $this->step2(); }
		if(empty($_POST['mailaddress1'])){ return $this->step3('post_error'); }
		//User check
		if($_POST['mode']=='send_user'){ $_POST['name2'] = null;}
		if(empty($_POST)){ return $this->step2(); }
		$cartmail->Send_mail('Customer',$commission,$session);
		$cartmail->Send_mail('Shop',$commission,$session);
		$cartDB->Order_insert($commission,$session);
		$order_number	=	$GLOBALS['order_number'];
		$order_list		= 	$cartDB->Order_read($order_number);
		$print = $GLOBALS['fileread']->DBcart_read('',$_POST['payment']);
		$GLOBALS['fileread']->DBstock_update($session);
		$print['set04'] = preg_replace("/<#OrderNumber#>/sm",$order_number,$print['set04']);
		$print['set04'] = preg_replace("/<#TotalAll#>/sm",$order_list['total'],$print['set04']);
		$print['set04'] = preg_replace("/<#CustomerName#>/sm",$order_list['name'],$print['set04']);
		$print['set04'] = preg_replace("/<#CustomerTel#>/sm",$order_list['tel'],$print['set04']);
		$print['set04'] = preg_replace("/<#CustomerEmail#>/sm",$order_list['email'],$print['set04']);
		$GLOBALS['session']->sission_delete();
		$message        = $print['set04'];
		require(dirname(__FILE__).'/'.$GLOBALS['cart_theme_type'].'/cart-step8.php');
		$cartDB->Order_check();
	}
}
?>
