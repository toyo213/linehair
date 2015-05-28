<?php
/**Shopping Cart System WP Olive-Cart.
 * @link http://www.wp-olivecart.com/
 * @copyright 2008-2013 Olive-Design.
 */
class CartDBAccess{
	function User_insert() {
		global $wpdb;
  	} 
  	function User_edit() {
		global $wpdb;

	} 
	function Deliver_edit( $mode=null,$user=null ) {
		global $wpdb;
	} 
	function User_read( $password,$mailaddress=null ) {
		global $wpdb;

		return $db;
	}
	function Plugin_DB_read( $user=null,$type=null,$maxall=null ) {
		global $wpdb;

		return $db;
	}
	function Form_read( $id=null,$type=null ) {
		global $wpdb;

		return $db;
	}
	function Order_read( $id=null ) {
		global $wpdb;

		return $db;
	}

	function Order_check() {
		global $wpdb;

	}
	function Cart_calculation($commission=null,$personaldata) { //cart total calculation
		$default_charge	= false;
		foreach ( $personaldata as $key=>$value ) { 
				if($special_charge > $personaldata[$key]['charge']){
					$special_charge = $special_charge;
				}
				else{
					$special_charge	=	$personaldata[$key]['charge'];
				}
			$count	= 	$personaldata[$key]['count'];
			$price	= 	$personaldata[$key]['price'];
			$total	=	$price*$count;
			$total_all += $total; 
			if($personaldata[$key]['charge']) {	continue; }
			$default_charge	= true;
		}
		$cart['total_all']=$total_all;
				#if (isset($_POST['payment'])) {
  		$postage = $GLOBALS['fileread']->DBpostage_read('',"1");
  		$payment = $GLOBALS['fileread']->DBcart_read('',$_POST['payment']);//payment Read
  		$postage_price=explode(',',$postage['postage01']);
  		if( $_POST['pref2']){ $post_pref = $_POST['pref2']-1; }
  		else{ $post_pref = $_POST['pref']-1; }
  		$postage_all_price01   = explode(',',$postage['postage02']);
  		$postage_all_price02   = explode(',',$postage['postage03']);
  		@$postage['postage01'] = $postage_price[$post_pref];
  		if( $postage_all_price01[0] or $postage_all_price01[1] ){
			if( $total_all >= $postage_all_price01[0] ){
				$postage['postage01'] = $postage_all_price01[1];
			}
		}
		if( $postage_all_price02[0] or $postage_all_price02[1] ){
			if( $total_all >= $postage_all_price02[0] ){
				$postage['postage01'] = $postage_all_price02[1];
			}
		}
	#$commission             = $GLOBALS['fileread']->DBcommission_read();
		$cart['payment_name']   = $payment['set01'];//paymant name
		if($postage['postage01'] < $special_charge ){
			$cart['postage'] = $special_charge;
		}
		elseif(!$default_charge && isset($special_charge)){
			$cart['postage'] = $special_charge;
		}
		else{
			$cart['postage']        = $postage['postage01'];
		}
	#$cart['payment_charge'] = $GLOBALS['payment']['set02'];//payment charge
		$chage_array= explode('<>',$payment['set02']);
		$chage[]                = explode(',',$chage_array[0]);
		$chage[]                = explode(',',$chage_array[1]);
		$chage[]                = explode(',',$chage_array[2]);
		$chage[]                = explode(',',$chage_array[3]);
		sort($chage);
		$comm_price             = $commission[0]['price'];
		$comm_price            += $commission[1]['price'];
		$comm_price            += $commission[2]['price'];
		$comm_price            += $commission[3]['price'];
		$cart1['total']         = $total_all + $cart['postage']+$comm_price;//cart total
		foreach ($chage as $value){
 			if($value[0] <= $cart1['total']){ $cart['payment_charge'] =$value[1]; }
 		}
 		$cart['charge_total']   = $comm_price + $cart['payment_charge'];
 		$cart['total']          =$cart1['total']+$cart['payment_charge'];
 		if(get_option('consumption_tax')){
			$cart['consumption_tax']=floor((get_option('consumption_tax')/100)*$total_all);
			$cart['total'] = $cart['total']+$cart['consumption_tax'];
		}
		return $cart;
	}
	function Order_insert($commission=null,$personaldata=null) {
		global $wpdb;
	}	 
}
?>
