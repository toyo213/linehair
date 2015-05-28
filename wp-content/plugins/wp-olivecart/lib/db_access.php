<?php
/**Shopping Cart System WP Olive-Cart.
 * @link http://www.wp-olivecart.com/
 * @copyright 2008-2013 Olive-Design.
 */
#require_once( dirname(__FILE__)."/../conf/user_conf.php");
require_once( dirname(__FILE__)."/../conf/php_ini_set.php");
class sql_connect
{
/*Databaseserver mysql connection*/
	function DB_access(){
		$link = mysql_connect(DB_HOST, DB_USER,DB_PASSWORD) or die("MySQL connect error");
/* DB select */
		mysql_query("SET NAMES utf8",$link);
		mysql_select_db(DB_NAME,$link)or $link='error';
		return $link;
/*DB_NAME . ':host=' .DB_HOST. ';dbname= '. DB_NAME;*/
	}

	function DBstock_update($personaldata){
		global $wpdb;
		$this->table_name = $wpdb->prefix . 'cart_meta';
		foreach($personaldata as $key=>$value){
			$new_stock =$stock=null;
			list($number,$array_no)     = explode(':',$key);
			if(!$array_no){$array_no=0;}
			$db	=	$wpdb->get_row( "SELECT * FROM ".$this->table_name. " where meta_id='$number'");	
			$stock	=	explode(':',$db->item_option_stock);
	    if(($stock[$array_no] > 0 ) && ($stock[$array_no] >= $personaldata[$key]['count'])) {
				$stock[$array_no]=$stock[$array_no]-$personaldata[$key]['count'];
				foreach ($stock as $key2=>$value2){ $new_stock.=$value2.':';}
				$new_stock  =	rtrim($new_stock, ":");
				$wpdb->query("update ".$this->table_name. " set item_option_stock='$new_stock' where meta_id='$number'");
			}
		}
	}
	function DBcart_read($db_type=null,$id=null) {
		global $wpdb;
		$db    =  null;
		if($db_type=='edit'){
			for ($i =0; $i < count($_POST['set01']) ; $i++) {
				$set01 = $_POST['set01'][$i];
				$set02 = $_POST['set02'][$i];
				$set03 = $_POST['set03'][$i];
				$setid = esc_sql($_POST['id'][$i]);
				$wpdb->query("update `CART_cartedit` set set01='$set01',set02='$set02',set03='$set03' where id='$setid'");
			}
			$db='edit';
		}elseif($db_type=='tag_edit'){
			$set04 = $_POST['set04'];
			$set04 = preg_replace('/\'/mi',"’",$set04);
			$wpdb->query("update `CART_cartedit` set set04='$set04' where id='$id'");
		}else{
			if(!empty($id)){
				$db=$wpdb->get_row( "select * from `CART_cartedit` where id = '$id'", ARRAY_A);
				#$result = mysql_query($query,$link) or die("MySQL connect error");
				#$db = mysql_fetch_array($result);
				$db['set04']=preg_replace('/’/mi',"'",$db['set04']); 
			}else{
				$result=$wpdb->get_results("select * from `CART_cartedit`", ARRAY_A);
				foreach ($result as $row){$db[]=$row;}
			}
		}
		return $db;
	}

	function DBpostage_read($type=null,$id=null) {
		global $wpdb;
		$id    = esc_sql($id);
		#$link  = $this->DB_access();
		if($type=='edit'){
			for ($i =0; $i < count($_POST['postage01']) ; $i++) {
				$set01=$_POST['postage01'][$i];
				$set02=$_POST['postage02'][$i];
				$set03=$_POST['postage03'][$i];
				$setid=$_POST['postageid'][$i];
				$wpdb->query("update `CART_postage` set postage01='$set01',postage02='$set02',postage03='$set03' where id='$setid'");
			}
			$db='edit';
		}
		else{
			if(isset($id)){
				$db	=	$wpdb->get_row( "select * from `CART_postage`  where id = '$id'", ARRAY_A);
			}
			else{
				$db	=	$wpdb->get_row( "select * from `CART_postage`", ARRAY_A);
			}
		}
		return $db;
	}
	function DBcommission_read($type=null,$id=null) {
		global $wpdb;
		$id    = esc_sql($id);
		#$link  = $this->DB_access();
		if($type=='edit'){
			for ($i =0; $i < count($_POST['name']) ; $i++){
				$name    = $_POST['name'][$i];
				$form    = $_POST['form'][$i];
				$charge  = $_POST['charge'][$i];
				$comment = $_POST['comment'][$i];
				$setid   = $_POST['id'][$i];
				$wpdb->query("update `CART_commission` set name='$name',form='$form',charge='$charge',comment='$comment' where id='$setid'");
			}
			$db='edit';
		}
		else{
			$result=$wpdb->get_results("select * from `CART_commission`", ARRAY_A);
			foreach ($result as $row ){
        #if(empty($row['name'])){continue;}
				$row['form2']         = explode(',',$row['form']);
				$row['charge2']       = explode(',',$row['charge']);
				$row['commission_no'] = 'commission_no'.$row['id'];
				$i                    = $_POST[$row['commission_no']];
				$row['in_commission'] = $i;
				$row['price']         = $row['charge2'][$i];
				$row['post_form']     = $row['form2'][$i];
				$db[]= $row;
			}
		}
		return $db;
	}
}

?>