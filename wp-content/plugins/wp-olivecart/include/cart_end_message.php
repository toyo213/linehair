<?php
class Cart_End_Message_Setup {
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
		#add_meta_box( 'show_box1'  ,__('Create the "Pay with PayPal" button',  'WP-OliveCart'),
		#array(&$this, 'show_box1'),   $this->pagehook, 'normal', 'core');
		add_meta_box( 'show_box2'  ,__('Custom Message (HTML Tags)',  'WP-OliveCart'),
		array(&$this, 'show_box2'),   $this->pagehook, 'normal', 'core');
    }

	function on_action(){
		global $wpdb;
		if( $_POST['action'] == 'edit'){
			$query   = "update CART_cartedit set set04='$_POST[set04]' where id=".$_POST['id'];
			$wpdb->query($query);
			$this->message  = '<div id="message" class="updated below-h2"><p>'.__('Custom messages on cart end page updated','WP-OliveCart').'</p></div>';
		}

		$mylink           = $wpdb->get_row( "select * from CART_cartedit where id = $_REQUEST[id]" );
		$this->title      = __('Edit custom messages on cart end page','WP-OliveCart');
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


	function show_box2($field_value) {
		?>
		<div class="inside">
		<textarea name="set04" id="set04" class="endtaginputitem"><?php echo $field_value->set04;?></textarea>
		</div> 
		<?php
	}

}


?>
