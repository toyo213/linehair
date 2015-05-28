<?php
/**Shopping Cart System Olive-Cart.
 * @link http://www.cart-ya.com/
 * @copyright 2008-2009 Olive-Design, Corp.
 */
/* $Id: send_mail.php  2009-01-28 15:10:03 $ */

class CartMailAccess{


function mail_read($type=null){
	if($type == 'Customer') {
		$db=$GLOBALS['fileread']->DBcart_read('',$_POST[payment]);
		$GLOBALS['Mail_subject'] = $db['set05'];
		$str = $db['set06'];
	}elseif($type == 'Shop'){
		$GLOBALS['Mail_subject'] = get_option('s_subject');
		$str = get_option('s_mail_m'); 
	}elseif($type == 'Lost_send'){
		require_once( dirname(__FILE__)."/../../mail/lost_mail.php");
		$GLOBALS['Mail_subject'] = $subject;
		$str = $mail_m; 
	}
	return $str;
}

function maillist_read_session($list_tag,$personaldata){
	$goukeikakaku=$cart_in =null;
	foreach ($personaldata as $key => $val){
		$item	= 	$personaldata[$key]['title'];
		$count	= 	$personaldata[$key]['count'];
		$price	= 	$personaldata[$key]['price'];
		$option	= 	$personaldata[$key]['option'];
		$total	=	$price*$count;
		foreach ($list_tag as $value){
			$value = rtrim($value);
			$value = preg_replace("/<#S_Number#>/sm",$key,$value);
			$value = preg_replace("/<#S_Name#>/sm"  ,$item.$option,$value);
			$value = preg_replace("/<#S_Price#>/sm" ,$price,$value);
			$value = preg_replace("/<#S_Count#>/sm" ,$count,$value);
			$value = preg_replace("/<#S_Total#>/sm" ,$total,$value);
			$cart_in.=$value;
		}
	}
	return $cart_in;
}

function change_tag($str=null,$commission=null,$personaldata){
	$cartDB	=	new CartDBAccess;
	$pref = $GLOBALS['_pref'][$_POST['pref']];
	$order_number = time();
	$GLOBALS['order_number'] = $order_number;
	$GLOBALS['order_time'] = date('Y年m月d日 H時i分');

	$cart        = $cartDB->Cart_calculation($commission,$personaldata);
  if(!$cart['postage']){ $cart['postage']=0; }
	$total       = $cart['total'];
	$charge      = $cart['charge_total'];
	$consumption_tax = $cart['consumption_tax'];
	for($i =0; $i < 4; $i++){
		if($commission[$i]['name']){$comm.=$commission[$i]['name'].' '.$commission[$i]['post_form']."\n";}
	}
	if($_POST){
		$str = preg_replace("/<#Payment#>/sm",$cart['payment_name'],$str);
		$str = preg_replace("/<#Commission#>/sm",$comm,$str);
		$str = preg_replace("/<#Comment#>/sm",$_POST['comment'],$str);
		$str = preg_replace("/<#OrderTime#>/sm",$GLOBALS['order_time'],$str);
		$str = preg_replace("/<#OrderNumber#>/sm",$order_number,$str);
		$str = preg_replace("/<#Postage#>/sm",$cart['postage'],$str);
		$str = preg_replace("/<#Charge#>/sm",$charge,$str);
		$str = preg_replace("/<#ConsumptionTax#>/sm",$consumption_tax,$str);
		$str = preg_replace("/<#TotalAll#>/sm",$total,$str);
		$str = preg_replace("/<#CustomerName#>/sm",$_POST['name'],$str);
		$str = preg_replace("/<#CustomerKana#>/sm",$_POST['kana'],$str);
		$str = preg_replace("/<#CustomerEmail#>/sm",$_POST['mailaddress1'],$str);
		$str = preg_replace("/<#CustomerZip#>/sm",$_POST['zip'],$str);
		$str = preg_replace("/<#CustomerAddress#>/sm",$pref.$_POST['address'],$str);
		$str = preg_replace("/<#CustomerTel#>/sm",$_POST['tel'],$str);
		$str = preg_replace("/<#CustomerFax#>/sm",$_POST['fax'],$str);
	}
	if(empty($_POST['name2'])){
		$str = preg_replace("/<#DeliveryName#>/sm",$_POST['name'],$str);
		$str = preg_replace("/<#DeliveryZip#>/sm",$_POST['zip'],$str);
		$str = preg_replace("/<#DeliveryAddress#>/sm",$pref.$_POST['address'],$str);
		$str = preg_replace("/<#DeliveryTel#>/sm",$_POST['tel'],$str);
	}
	else {
		$pref2=$GLOBALS['_pref'][$_POST['pref2']];
		$str = preg_replace("/<#DeliveryName#>/sm",$_POST['name2'],$str);
		$str = preg_replace("/<#DeliveryZip#>/sm",$_POST['zip2'],$str);
		$str = preg_replace("/<#DeliveryAddress#>/sm",$pref2.$_POST['address2'],$str);
		$str = preg_replace("/<#DeliveryTel#>/sm",$_POST['tel2'],$str);
	}
 return $str;
}

function mail_send($str,$type){
	$sendmaill_address1 = get_option('sendmail_address1');
	$sendmaill_address2 = get_option('sendmail_address2');
	$mail =	$sendmaill_address1;
	$SHOP_MAILADDRESS=$mail;
	if($sendmaill_address2){
		$mail	=	$sendmaill_address1.','.$sendmaill_address2;
	}
	if(!$sendmaill_address1){
		$mail	=	get_option('admin_email');
		$SHOP_MAILADDRESS=$mail;
	}
	if($type=='Customer'){ $mail = $_POST['mailaddress1']; }
 # $return_path = '-f '.SHOP_MAILADDRESS;
	mb_send_mail($mail,$GLOBALS['Mail_subject'],$str, 'From: '.$SHOP_MAILADDRESS);
}


function Send_mail($type,$commission,$personaldata){
	$str=$this->mail_read($type);
	if(preg_match("/(.*)<OrderList>(.*)<\/OrderList>(.*)/sm",$str,$list_str)){
		$list_tag[]  = rtrim($list_str[2]);
		$list_str[1] = rtrim($list_str[1]);
		$list_str[3] = rtrim($list_str[3]);
	}
	else {
		die('mail tag error not found OrderList tag');
	}
	$list = $this->maillist_read_session($list_tag,$personaldata); 
	$str  = $list_str[1].$list.$list_str[3];
	$str  = $this->change_tag($str,$commission,$personaldata);
	$this->mail_send($str,$type);
}
}
?>
