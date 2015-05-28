<?php
/**Wordpress Shopping Cart Plugin WP-OliveCart.
 * @link http://www.wp-olivecart.com/
 * @copyright 2008-2012 Olive-Design.
 */
/* $Id: user_login.php  2014-07-26 15:10:03 $ */
if (! is_admin()){
	add_filter('user_login','cart_user_login');
	add_filter('user_login_form','cart_user_login_form');
	session_cache_limiter('none');  
	if (isset($_POST['sid'])) {  session_id($_POST['sid']); }
	if (isset($_GET['sid']))  {  session_id($_GET['sid']);  }
	session_start();
}

function session_time_check() {
	if($_SESSION['time']) {
		$timelimit = $_SESSION['time']+600;
		if($timelimit<time()) { cart_session_clear(); $GLOBALS['timeout']=true;}
		else{ $_SESSION['time'] = time(); }
	}
}

function set_session() {
	$_POST['mailaddress1']=strip_tags($_POST['mailaddress1']);
	$_POST['password1']=strip_tags($_POST['password1']);
	$_SESSION['time']=time();
	$_SESSION['password1']=$_POST['password1'];
	$_SESSION['mailaddress1']=$_POST['mailaddress1'];
}

function cart_session_clear($setcookie=null){
	$_SESSION['password1']    = null;
	$_SESSION['mailaddress1'] = null;
	$_SESSION['time']         = null;
}
?>
