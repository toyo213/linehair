<?php
class Cart_Settlement_Setup {
var $pagehook;
	//load page
	function on_load() {
		$help_message = new help_message;
		$current_screen = get_current_screen();
		$this->pagehook=$current_screen->id;
		$admin_screen = WP_Screen::get($current_screen->id);
		/*Help option*/
		$admin_screen->add_help_tab(
			array(
				'title'    => __('help','WP-OliveCart'),
				'id'       => 'help_tab',
				'content'  => $help_message->message(),
				'callback' => false
			)
		);
		wp_enqueue_script('postbox');
		add_meta_box( 'settlement_method1'  ,__('Settlement Method No1',  'WP-OliveCart'),
		array(&$this, 'settlement_method1'),   $this->pagehook, 'normal', 'core');
		add_meta_box( 'settlement_method2'  ,__('Settlement Method No2','WP-OliveCart'),
		array(&$this, 'settlement_method2'), $this->pagehook, 'normal', 'core');
		add_meta_box( 'settlement_method3',  __('Settlement Method No3' ,'WP-OliveCart'),
		array(&$this, 'settlement_method3'),  $this->pagehook, 'normal', 'core');


    }

	function on_action(){	
		global $wpdb;
		function check($post){
			$post = preg_replace("/\,/sm","",$post);
			$post = preg_replace("/<>/sm","",$post);
			return $post;
		}
		if($_POST['action'] =='edit'){
			for ($i =0; $i < count($_POST['set01']) ; $i++){
				$set01 = $_POST['set01'][$i];
				$set02  = check($_POST['chage1_1'][$i]).','.check($_POST['chage1_2'][$i]).'<>';
				$set02 .= check($_POST['chage2_1'][$i]).','.check($_POST['chage2_2'][$i]).'<>';
				$set02 .= check($_POST['chage3_1'][$i]).','.check($_POST['chage3_2'][$i]).'<>';
				$set02 .= check($_POST['chage4_1'][$i]).','.check($_POST['chage4_2'][$i]);
				$set03  = $_POST['set03'][$i];
				$setid  = $_POST['in_id'][$i];
				$query  = "update CART_cartedit set set01='$set01',set02='$set02',set03='$set03' where id=$setid";
				$wpdb->query($query);
			}
			$this->message = '<div id="message" class="updated below-h2">
			<p>'.__('Settlement Method Setup data updated','WP-OliveCart').'</p>
			</div>';
		}

		$mylink =$wpdb->get_results('SELECT * FROM CART_cartedit');
		$this->title      = __('Settlement Method Setup','WP-OliveCart');
		$this->action     = 'edit';
		$this->icon       = 'cart';
		return $mylink;
	}
    

    function on_show_page() {
		global $wpdb;
		$field_value = $this->on_action();
		add_meta_box('save_sidebox',__('Save','WP-OliveCart'), array(&$this, 'save_sidebox'), $this->pagehook, 'side', 'core');
		require( dirname(__FILE__).'../../lib/admin/on_showpage1.php');
	}

	function save_sidebox() {
		require( dirname(__FILE__).'../../lib/admin/on_sidebox.php');
	}

	function settlement_method1($field_value) {
		$method_type='0';
		$From    = __('Total:',   'WP-OliveCart');
		$Postage = __('Over   Charge:','WP-OliveCart');
		$en      = __('JPY', 'WP-OliveCart');
		
		require( dirname(__FILE__).'../../lib/admin/settlement_method.php');
	}
	function settlement_method2($field_value) {
		$method_type='1';
		$From    = __('Total:',   'WP-OliveCart');
		$Postage = __('Over   Charge:','WP-OliveCart');
		$en      = __('JPY', 'WP-OliveCart');
		require( dirname(__FILE__).'../../lib/admin/settlement_method.php');
	}
	function settlement_method3($field_value) {
		$method_type='2';
		$From    = __('Total:',   'WP-OliveCart');
		$Postage = __('Over   Charge:','WP-OliveCart');
		$en      = __('JPY', 'WP-OliveCart');
		require( dirname(__FILE__).'../../lib/admin/settlement_method.php');
	}



}


?>
