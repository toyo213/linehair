<?php
class Cart_button_Setup {
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
				'content'  =>  $help_message->message(),
				'callback' => false
			)
		);
		wp_enqueue_script('postbox');
		add_meta_box( 'show_box1' ,__('Quantity Button Option',  'WP-OliveCart'),
		array(&$this, 'show_box1'),   $this->pagehook, 'normal', 'core');
		add_meta_box( 'show_box2' ,__('Insert Add to Cart button',  'WP-OliveCart'),
		array(&$this, 'show_box2'),   $this->pagehook, 'normal', 'core');
		add_meta_box( 'show_box3' ,__('Button Position',  'WP-OliveCart'),
		array(&$this, 'show_box3'),   $this->pagehook, 'normal', 'core');
		add_meta_box( 'show_box4' ,__('Other Options Title',  'WP-OliveCart'),
		array(&$this, 'show_box4'),   $this->pagehook, 'normal', 'core');
			
    }

    function on_show_page() {
		if( $_POST['action'] == 'edit'){
			update_option('cart_button_quantity_option',$_POST['cart_button_quantity_option']);
			update_option('cart_button_other_option1',$_POST['cart_button_other_option1']);
			update_option('auto_cart_add_button',$_POST['auto_cart_add_button']);
			update_option('cart_add_button_position',$_POST['cart_add_button_position']);
			$this->message  = '<div id="message" class="updated below-h2"><p>'.__('Cart Button Option Updated','WP-OliveCart').'</p></div>';
		}
		$this->title   = __('Add to Cart Button Option','WP-OliveCart');
		$this->icon    = 'cart';
		$this->action  = 'edit';
		add_meta_box('save_sidebox',__('Save','WP-OliveCart'), array(&$this, 'save_sidebox'), $this->pagehook, 'side', 'core');
		require( dirname(__FILE__).'../../lib/admin/on_showpage1.php');
	}

	function save_sidebox() {
		require( dirname(__FILE__).'../../lib/admin/on_sidebox.php');
	}
	function show_box1() {
		$cart_button_quantity_option	= get_option('cart_button_quantity_option');
		if($cart_button_quantity_option){ $select1='selected'; }
		else{$select2='selected';}
		?>
		<div class="inside">
		<select name="cart_button_quantity_option">
		<option value="1" <?php echo $select1;?>><?php _e('Show','WP-OliveCart');?></option>
		<option value="0" <?php echo $select2;?>><?php _e('Hide','WP-OliveCart');?></option>
		</select>
		</div>
		<?php
	}
	function show_box2() {
		$auto_cart_add_button	= get_option('auto_cart_add_button');
		if($auto_cart_add_button){ $select1='selected'; }
		else{$select2='selected';}
		?>
		<div class="inside">
		<select name="auto_cart_add_button">
		<option value="1" <?php echo $select1;?>><?php _e('Auto','WP-OliveCart');?></option>
		<option value="0" <?php echo $select2;?>><?php _e('Manual','WP-OliveCart');?></option>
		</select>
		</div>
		<?php
	}
	function show_box4() {
		$title = get_option('cart_button_other_option1');
		?>
<div class="inside">
<input type="text" value="<?php echo $title;?>" name="cart_button_other_option1" class="cartinputitem04" />
</div>
		<?php
	}
	function show_box3() {
		$cart_add_button_position	= get_option('cart_add_button_position');
		if($cart_add_button_position=='left'){ $select1='selected'; }
		elseif($cart_add_button_position=='right'){$select2='selected'; }
		else{$select3='selected';}
		?>
		<div class="inside">
		<select name="cart_add_button_position">
		<option value="left" <?php echo $select1;?>><?php _e('left','WP-OliveCart');?></option>
		<option value="right" <?php echo $select2;?>><?php _e('right','WP-OliveCart');?></option>
		<option value="center" <?php echo $select3;?>><?php _e('center','WP-OliveCart');?></option>
		</select>
		</div>
		<?php
	}
}


?>
