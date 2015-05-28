<?php
/**Shopping Cart System Olive-Cart.
 * @link http://www.wp-olivecart.com/
 * @copyright 2008-2012 Olive-Design, Corp.
 * @package Olive-Cart
 */

/* $Id: cart.php  2009-02-12 15:10:03 $ */

require_once(dirname(__FILE__).'/../../../wp-config.php');

require_once(dirname(__FILE__).'/cart/cart.php');
if ($_POST['step'] !=1 ){
	$page_id = get_option('cart_page_id');
	$url     = get_option('siteurl')."?page_id=$page_id";
	header("Location: ".$url."");exit;
}
else{
	$cart_preview= new CartPreview;	
	$cart_preview->get_cart();
}

?>
