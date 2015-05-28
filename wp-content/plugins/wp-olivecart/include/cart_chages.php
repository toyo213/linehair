<?php
class Cart_Charges_Setup {
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
		add_meta_box( 'show_box1'  ,__('Other Items No1','WP-OliveCart'),
		array(&$this, 'show_box1'),  $this->pagehook, 'normal', 'core');
		add_meta_box( 'show_box2'  ,__('Other Items No2','WP-OliveCart'),
		array(&$this, 'show_box2'),  $this->pagehook, 'normal', 'core');
		add_meta_box( 'show_box3',  __('Other Items No3','WP-OliveCart'),
		array(&$this, 'show_box3'),  $this->pagehook, 'normal', 'core');


    }

	function on_action(){
		global $wpdb;
		if($_POST['action']=='edit'){
			for ($i =0; $i < count($_POST['name']) ; $i++){
				$name    = $_POST['name'][$i];
				$form    = $_POST['form'][$i];
				$charge  = $_POST['charge'][$i];
				$comment = $_POST['comment'][$i];
				$setid   = $_POST['id'][$i];
				$query   =  "update CART_commission set name='$name',form='$form',charge='$charge',comment='$comment' where id=$setid";
				$wpdb->query($query);
			}
			$this->message = '<div id="message" class="updated below-h2">
			<p>'.__('Othre Items and Charges data updated','WP-OliveCart').'</p>
			</div>';
		}	
		$mylink =$wpdb->get_results('select * from CART_commission');
		$this->title      = __('Othre Items and Charges Setup','WP-OliveCart');
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

	function show_box1($field_value){
		$method_type = '0';
		require( dirname(__FILE__).'../../lib/admin/charges.php');
	}
	function show_box2($field_value) {
		$method_type = '1';
		require( dirname(__FILE__).'../../lib/admin/charges.php');
	}
	function show_box3($field_value) {
		$method_type = '2';
		require( dirname(__FILE__).'../../lib/admin/charges.php');
	}



}


?>
