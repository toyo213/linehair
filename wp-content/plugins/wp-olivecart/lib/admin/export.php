<?php
/**Shopping Cart System WP-OliveCart.
 * @link http://www.wp-olivecart.com/
 * @copyright 2008-2012 Olive-Design.
 * @package WP-Olive-Cart
 */

require_once( '../../../../../wp-config.php' ); 
if( is_user_logged_in() ){
	new OliveCart_data_export();
}
else {
	die('access error');
}
class OliveCart_data_export{

	function __construct(){ 
		if( $_GET['type']=='item' ) {
			$Entry_all_data = $this->item();
			$filename       = 'CartItemData.csv';
		}
		if( $_GET['type']=='order' )     {
			$Entry_all_data = $this->order();
			$filename       = 'OrderData.csv';
		}
		if( $_GET['type']=='customer' )  {
			$Entry_all_data = $this->customer();
			$filename       = 'CustomerData.csv';
		}

		header("Content-Disposition: attachment; filename=$filename");
		header('Content-Type: application/octet-stream');
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: '.strlen($Entry_all_data));
		echo $Entry_all_data;
	}

	function customer() {
		require('../../conf/form_conf.php'); 
		global $wpdb;
		$query = "select * from CART_customerlist ORDER BY id DESC";
		$result =$wpdb->get_results($query);
			foreach( $result as $row ) {
				if( $row->pref ) { $pref1 = $_pref[$row->pref]; }
				else { $pref1 = '';}
				if( $row->pref2 ){ $pref2 = $_pref[$row->pref2]; }
				else { $pref2 = '';}
				$Entry_all_data.="$row->id,$row->name,$row->kana,$row->zip,$pref1,$row->address,$row->tel,$row->fax,$row->mailaddress1,$row->password1,$row->name2,$row->zip2,$pref2,$row->address2,$row->tel2\n";
			}
		$Entry_all_data=mb_convert_encoding($Entry_all_data,'SHIFT-JIS','UTF-8');
		return $Entry_all_data;
	}

	function order() {
		global $wpdb;
		#$Entry_all_data='-- OLIVE-CART SQL Dump'."Data var2.0 $times"."\n";
		$query = "select * from CART_orderlist ORDER BY id DESC";
		$result =$wpdb->get_results($query);
		foreach( $result as $row ) {
			$row->comment    = preg_replace("/\n/sm","",$row->comment);
  		$row->comment    = preg_replace("/\r/sm","",$row->comment);
			$row->orderdata  = preg_replace("/\,/sm",":",$row->orderdata);
			$row->orderdata  = preg_replace("/<>/sm","|",$row->orderdata);
			$row->orderdata  = preg_replace("/\n/sm","",$row->orderdata);
			$row->orderdata  = preg_replace("/\r/sm","",$row->orderdata);
			$row->commission = preg_replace("/\,/sm","|",$row->commission);
			$row->commission = preg_replace("/\n/sm","",$row->commission);
			$row->commission = preg_replace("/\r/sm","",$row->commission);
			$Entry_all_data.="$row->date,$row->customer_id,$row->ordernumber,$row->name,$row->kana,$row->zip,$row->addr,$row->tel,$row->email,$row->name2,$row->zip2,$row->addr2,$row->tel2,$row->payment,$row->comment,$row->orderdata,$row->charge,$row->postage,$row->commission,$row->total\n";
		}
		$Entry_all_data=mb_convert_encoding($Entry_all_data,'SHIFT-JIS','UTF-8');
		return $Entry_all_data;
	}

	function item() {
		global $wpdb;
		$this->table_name = $wpdb->prefix . 'cart_meta';
		$query = "select * from `".$this->table_name. "`";
		$result =$wpdb->get_results($query);
		foreach( $result as $row ) {
			  if(strstr($row->item_option_name,':')){
				  $array['item_option_name'] 	= explode (":",$row->item_option_name);
				  $array['item_option_stock'] 	= explode (":",$row->item_option_stock);
				  $array['item_option_price'] 	= explode (":",$row->item_option_price);
				 foreach($array['item_option_name'] as $key=>$value){
				 	$Entry_all_data.=$row->item_post_date.','.$row->item_number.':'.$value.','.$row->item_title.','.$array['item_option_stock'][$key].','.$array['item_option_price'][$key].','.$row->post_id."\n";
				 }
				 continue;
			  }
		#$edit_time=getdate(strtotime($row->date));
			#$row->comment=(rtrim($row->comment));
			$Entry_all_data.=$row->item_post_date.','.$row->item_number.':'.$row->item_option_name.','.$row->item_title.','.$row->item_option_stock.','.$row->item_option_price.','.$row->post_id."\n";
		}
		$Entry_all_data=mb_convert_encoding($Entry_all_data,'SHIFT-JIS','UTF-8');
		return $Entry_all_data;
	}


}

?>
