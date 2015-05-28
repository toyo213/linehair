<?php
/**Wordpress Shopping Cart Plugin WP-OliveCart.
 * @link http://www.wp-olivecart.com/
 * @copyright 2008-2014 Olive-Design.
 */
/* $Id: mini_cart.php  2014-7-20 15:10:03 $ */
new MiniCart;

class MiniCart {
	public function __construct() {
		add_filter('mini_cart',array($this,'minicart'));
	}
	function minicart() {
		require( dirname(__FILE__).'/../../cart/'.$GLOBALS['cart_theme_type'].'/cart-step1.php');
	}
}

?>
