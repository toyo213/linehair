<?php

class OliveCartCookie{
	function set_cookie() {
		$_POST['mailaddress1']    = strip_tags($_POST['mailaddress1']);
		$_POST['password1']       = strip_tags($_POST['password1']);
		$_SESSION['time']         = time();
		$_SESSION['password1']    = $_POST['password1'];
		$_SESSION['mailaddress1'] = $_POST['mailaddress1'];
	}
	function cookie_clear($setcookie=null) {
		$_SESSION['password1']    = '';
		$_SESSION['mailaddress1'] = '';
	}
	function get_cookie($cookie=null) {
		$cookie = $_SESSION;
		return $cookie;
	}
	function cookie_check( $cookie=null ) {
		$cartDB	=	new CartDBAccess;
		$user	=	null;
		$cookie	=	$this->get_cookie();
		$user	=	$cartDB->User_read($cookie['password1'],$cookie['mailaddress1']);
	#if(!$user) {return Mypage_login(); } 
		return $user;
	}
	function time_check() {
		if($_SESSION['time']){
			$timelimit               = $_SESSION['time']+600;
			if($timelimit<time()) { $this->cookie_clear(); $GLOBALS['timeout']=true;}
			else{ 	$_SESSION['time'] = time(); }
		}
	}
}
?>
