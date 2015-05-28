<?php
/**Shopping Cart System WP Olive-Cart.
 * @link http://www.wp-olivecart.com/
 * @copyright 2008-2013 Olive-Design.
 */
require_once( dirname(__FILE__).'/version_check.php');
class WPOliveCartInstall{
	function cart_remove() {
			global $wpdb;
			$page_id1 = get_option('cart_page_id');
			wp_delete_post($page_id1);
	}
	function cart_install () {
		global $wpdb;
		$table_name = $wpdb->prefix . 'cart_meta';
		$olive_cart_version = '3.0.0';
		//get olivecart version
		$installed_ver = get_option( 'olive_cart_version' );
  		// create mysql talbe
  		if( $installed_ver != $olive_cart_version ) {
  			$sql = "CREATE TABLE " . $table_name . " (
			  meta_id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			  post_id bigint(20) UNSIGNED DEFAULT '0' NOT NULL,
			  item_title text,
			  item_number text,
			  item_option_name text,
			  item_option_stock text,
			  item_option_price text,
			  item_option_charge text,
			  item_post_date text,
			  UNIQUE KEY meta_id (meta_id)
			)
			CHARACTER SET 'utf8';";
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		//save olivecart version
			update_option("olive_cart_version", $olive_cart_version);
  		}

		$post_value = array(
			'post_author' => 1,
			'comment_status' =>'closed',
			'post_title' => 'ショッピングカートの内容',
			'post_content' => 'このページにショッピングカートの内容が表示されます。<br/>このページを削除するとショッピングカートが動作しません。', 
			'post_category' => array(1,5),
			'tags_input' => array('タグ1','タグ2'),
			'post_status' => 'publish', 
			'post_type' => 'page',
		); 
		$insert_id = wp_insert_post($post_value); //$insert_id is page_id
		update_option('cart_page_id',$insert_id);
		/*$post_value = array(
			'post_author' => 1,
			'comment_status' =>'closed',
			'post_title' => '商品一覧',
			'post_content' => 'このページに内容が表示されます。<br/>このページを削除するとショッピングカートが動作しません。', 
			'post_category' => array(1,5),
			'tags_input' => array('タグ1','タグ2'),
			'post_status' => 'publish', 
			'post_type' => 'page',
		);
		$insert_id = wp_insert_post($post_value); //$insert_id is page_id
		update_option('items_page',$insert_id);*/

		require_once(dirname(__FILE__)."/create_table.php");
		#update_option('subject',$subject);
		#update_option('mail_m',$mail_m);
		require_once(dirname(__FILE__)."/../mail/shop_mail.php");
		update_option('s_subject',$subject);
		update_option('s_mail_m',$mail_m);
		require_once(dirname(__FILE__)."/../mail/create_mail.php");
		$wpdb->query($CART_cartedit);
		$query = "INSERT INTO CART_cartedit VALUES('1','銀行振込','','銀行振込はこちらで指定した口座番号にお振込みください。','<p>本日はご注文いただきありがとうございました。</p>','$subject','$mail_m') ON DUPLICATE KEY UPDATE id = 1";
		$wpdb->query($query);
		$query = "INSERT INTO CART_cartedit VALUES('2','郵便振替','','商品を一緒に振込用紙をお送りいたします。','<p>本日はご注文いただきありがとうございました。</p>','$subject','$mail_m') ON DUPLICATE KEY UPDATE id = 2";
		$wpdb->query($query);
		$query = "INSERT INTO CART_cartedit VALUES('3','代金引換','0,500','  代金引き換えは手数料が５００円かかります。御了承ください。','<p>本日はご注文いただきありがとうございました。</p>','$subject','$mail_m') ON DUPLICATE KEY UPDATE id = 3";
		$wpdb->query($query);
		#$query = "INSERT INTO CART_cartedit VALUES('4','','','','','$subject','$mail_m') ON DUPLICATE KEY UPDATE id = 4";
		#$wpdb->query($query);
		//CREATE TABLE CART_postage
		$wpdb->query($CART_postage);
		$query="INSERT INTO CART_postage VALUES('1','600','','') ON DUPLICATE KEY UPDATE id=1";
		$wpdb->query($query);
		//CREATE TABLE CART_commission
		$wpdb->query($CART_commission);
		$query="INSERT INTO CART_commission VALUES('1','配達時間指定','午前中,１２時～１４時,１４時～１６時,１６時～１８時,１８時～２０時,２０時～２１時','','') ON DUPLICATE KEY UPDATE id=1";
		$wpdb->query($query);
		$query="INSERT INTO CART_commission VALUES('2','クール便','使用しない,使用する','0,300','クール便を使用する場合、手数料が300円かかります。') ON DUPLICATE KEY UPDATE id=2";
		$wpdb->query($query);
		$query="INSERT INTO CART_commission VALUES('3','ギフトラッピング','使用しない,使用する','0,300','ラッピングする場合、手数料が300円かかります。') ON DUPLICATE KEY UPDATE id=3";
		$wpdb->query($query);
		$query="INSERT INTO CART_commission VALUES('4','','','','') ON DUPLICATE KEY UPDATE id =4";
		$wpdb->query($query);
		//CREATE TABLE CART_orderlist
		$wpdb->query($CART_orderlist);
		$query="INSERT INTO CART_orderlist VALUES('1','2009年02月21日 ','1','10001','山田太郎','やまだたろう','123-456','品川区0123','0123','test_user@test.com','','','','','銀行振込','','1-M-white,カップ＆ソーサー,2500,1,2500',0,600,'',3100,'') ON DUPLICATE KEY UPDATE id=1";
		$wpdb->query($query);
		//CREATE TABLE CART_customerlist
		$wpdb->query($CART_customerlist);
		$query="INSERT INTO CART_customerlist VALUES('1','山田太郎','やまだたろう','011-0101','13','品川区','0123','','test_user@test.com','0123','','','','','') ON DUPLICATE KEY UPDATE id=1";
		$wpdb->query($query);
		$theme_name		=	wp_get_theme();
		$admin_email	= 	get_option('admin_email');
		update_option("olive_cart_version", $olive_cart_version);
		update_option("cart_android_theme",$theme_name);
		update_option('cart_button_other_option1','サイズ カラー');
		update_option('shopping_member_option','2');
		update_option('sendmail_address1',$admin_email);
		update_option('consumption_tax','');

  }
}
?>
