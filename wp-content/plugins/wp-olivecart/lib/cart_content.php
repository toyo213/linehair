<?php
/**Shopping Cart System WP Olive-Cart.
 * @link http://www.wp-olivecart.com/
 * @copyright 2008-2013 Olive-Design.
 */
require_once( dirname(__FILE__).'/../cart/cart.php');

#require_once( dirname(__FILE__).'/mail_preview.php');

new CartContent;

class CartContent {
	function __construct() {
		add_filter( 'the_content', array($this,'cart_content' ));;
	}
	function cart_content($content){
		$cart_preview= new CartPreview;	
		if(get_the_ID() == get_option('cart_page_id') and is_singular() and in_the_loop()){
			$content = $cart_preview->get_cart();
		}
		return $content;
  	}

}
?>
