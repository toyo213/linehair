<?php
/**WordPress Shopping Cart System Plugin WP-OliveCart.
 * @link http://www.wp-olivecart.com/
 */
/* $Id: session_connect.php  2012-11-20 15:10:03 $ */

class session_connect
{
	function sission_cart(){
		$session=null;
		if($_SESSION){
			foreach($_SESSION as $key=>$value){
				if(!strstr($key,':')){continue;}
				#$key = preg_replace("/cart_/sm",'',$key);
				#if(!$GLOBALS['db']['dbname'][$key]){continue;}
				$session[$key]=$value;
			}
			return $session;
		}
	}
 
	function sission_read(){

		$newkazu=null;
		
		if(isset($_REQUEST['number'],$_REQUEST['count'])){

			if($_POST['mode'] =='retry'){ // _POST entry retry
				for ($i =0; $i < count($_POST['number']) ; $i++){
					$_POST['count'][$i]= mb_convert_kana($_POST['count'][$i],"a") ;
					$post_number = $_POST['number'][$i];
					if($_POST['count'][$i]==0){
						unset($_SESSION[$post_number]);continue;
					}
					if($_SESSION[$post_number]['stock']=='*' or $_SESSION[$post_number]['stock']===''){
						$_SESSION[$post_number]['count'] = $_POST['count'][$i];
					}
					elseif($_POST['count'][$i] <= $_SESSION[$post_number]['stock']){ //Stock check
						$_SESSION[$post_number]['count'] = $_POST['count'][$i];
					}
				}
			}
			else{
				$number	= $_REQUEST['number'].':'.$_REQUEST['option'];
				if(!empty($_SESSION[$number])){  //Old_regist 
					$newkazu=$_SESSION[$number]['count'] + $_REQUEST['count'];
					if($_SESSION[$number]['stock']=='*' or $_SESSION[$number]['stock']===''){ //Stock check
						$_SESSION[$number]['count']= $newkazu;
					}
					elseif($newkazu <= $_SESSION[$number]['stock']){ //Stock check
						$_SESSION[$number]['count']= $newkazu;
					}	
				}
				else{ //New_regis 
					global $post;
					global $wpdb;
					$get_number					= esc_sql($_REQUEST['number']);
					$option				 		= $_REQUEST['option'] ? $_REQUEST['option'] : 0;
					$table_name 				= $wpdb->prefix . 'cart_meta';
					$query  					= "SELECT * FROM ".$table_name." where meta_id='$get_number'";	
					$get_meta 					= $wpdb->get_results($query);
					$get_meta					= isset($get_meta[0]) ? $get_meta[0] : null;
					$item_title 				= isset($get_meta->item_title)	? $get_meta->item_title : null;
					$item_number 				= isset($get_meta->item_number)	? $get_meta->item_number : null;
					$item_post_id 				= isset($get_meta->post_id)	? $get_meta->post_id : null;
					$array_item_option_name		= explode (":",$get_meta->item_option_name);
					$array_item_option_stock 	= explode (":",$get_meta->item_option_stock);
					$array_item_option_price 	= explode (":",$get_meta->item_option_price);
					$array_item_option_charge 	= explode (":",$get_meta->item_option_charge);
					$item_option_name			= $array_item_option_name[  $option ];
					$item_option_stock 			= $array_item_option_stock[ $option ];
					$item_option_price 			= $array_item_option_price[ $option ];
					$item_option_charge 		= $array_item_option_charge[$option ];
					if(@$item_option_stock=='*' or $item_option_stock==='' && is_numeric($_REQUEST['count']) && $item_option_price) { 
						//Stock check
						$_SESSION[$number][ 'count' ] 	= 	$_REQUEST['count']; 
						$_SESSION[$number][ 'title' ] 	= 	$item_title;
						$_SESSION[$number][ 'number' ] 	= 	$item_number;
						$_SESSION[$number][ 'price' ] 	= 	$item_option_price;
						$_SESSION[$number][ 'charge']	= 	$item_option_charge;
						$_SESSION[$number][ 'post_id'] 	=	$item_post_id;
						$_SESSION[$number][ 'stock' ] 	= 	100;
					}
					elseif($_REQUEST['count'] <= @$item_option_stock && $item_option_price && is_numeric($_REQUEST['count'])) {
						//Stock check
						$_SESSION[$number][ 'count' ]	= 	$_REQUEST['count'];
						$_SESSION[$number][ 'title' ]	= 	$item_title;
						$_SESSION[$number][ 'number' ] 	= 	$item_number;
						$_SESSION[$number][ 'price' ]	=	$item_option_price;
						$_SESSION[$number][ 'stock' ] 	= 	$item_option_stock;
						$_SESSION[$number][ 'option'] 	=	$item_option_name;
						$_SESSION[$number][ 'post_id'] 	=	$item_post_id;
						$_SESSION[$number][ 'charge'] 	= 	$item_option_charge;
					}
				} 
			}
		}

	}

	function sission_delete(){
		$mailaddress1             = $_SESSION['mailaddress1'];
		$password1                = $_SESSION['password1'];
		$_SESSION                 = array() ;//Session  format
		$_SESSION['mailaddress1'] = $mailaddress1;
		$_SESSION['password1']    = $password1;
		$_SESSION['time']         = time();
	}
} 
?>
