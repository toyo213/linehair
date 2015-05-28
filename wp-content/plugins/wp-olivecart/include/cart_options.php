<?php
class Cart_Options_Setup {
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
			add_meta_box( 'show_box1' ,__('Mobile Theme Setup',  'WP-OliveCart'),
		array(&$this, 'show_box1'),   $this->pagehook, 'normal', 'core');
			add_meta_box( 'show_box2' ,__('Cart Security Setup',  'WP-OliveCart'),
		array(&$this, 'show_box2'),   $this->pagehook, 'normal', 'core');
			add_meta_box( 'show_box3' ,__('Add to Cart Button Option',  'WP-OliveCart'),
		array(&$this, 'show_box3'),   $this->pagehook, 'normal', 'core');
			#add_meta_box( 'show_box4' ,__('Consumption tax Setup',  'WP-OliveCart'),
	#	array(&$this, 'show_box4'),   $this->pagehook, 'normal', 'core');
			add_meta_box( 'show_box5' ,__('SendMail Address',  'WP-OliveCart'),
		array(&$this, 'show_box5'),   $this->pagehook, 'normal', 'core');
    }

    function on_show_page() {
		if( $_POST['action'] == 'edit'){
			if(!$_POST['cart_button_other_option1']){$_POST['option_max']=1;}
			update_option('cart_android_theme',$_POST['android_theme']);
			update_option('cart_iphone_theme', $_POST['iphone_theme']);
			update_option('cart_ipad_theme',   $_POST['ipad_theme']);
			update_option('ssl_url',$_POST['ssl_url']);
			update_option('shopping_member_option',$_POST['shopping_member_option']);
			update_option('cart_button_other_option1',$_POST['cart_button_other_option1']);
			update_option('auto_cart_add_button',$_POST['auto_cart_add_button']);
			update_option('cart_add_button_position',$_POST['cart_add_button_position']);
			update_option('consumption_tax',$_POST['consumption_tax']);
			update_option('sendmail_address1',$_POST['sendmail_address1']);
			update_option('sendmail_address2',$_POST['sendmail_address2']);
			$this->message  = '<div id="message" class="updated below-h2"><p>'.__('Cart Options Updated','WP-OliveCart').'</p></div>';
		}
		$this->ssl_url = get_option('ssl_url');
		$this->title   = __('Cart Options','WP-OliveCart');
		$this->icon    = 'cart';
		$this->action  = 'edit';
		add_meta_box('save_sidebox',__('Save','WP-OliveCart'), array(&$this, 'save_sidebox'), $this->pagehook, 'side', 'core');
		require( dirname(__FILE__).'../../lib/admin/on_showpage1.php');
	}

	function save_sidebox() {
		require( dirname(__FILE__).'../../lib/admin/on_sidebox.php');
	}
	function show_box1() {
		$android_Theme	= get_option('cart_android_theme');
		$iphone_Theme 	= get_option('cart_iphone_theme');
		$ipad_Theme		= get_option('cart_ipad_theme');
		$themes = wp_get_themes(); 
		?>
		<div class="inside">
		<p><?php _e('Android Phone Theme Setup','WP-OliveCart');?></p>
		<select name="android_theme">
     <?php
      foreach ($themes as $theme) {
      	if(($android_Theme == $theme['Name']) || (($android_Theme == '') && ($theme['Name'] == get_current_theme()))) {
					echo '<option value="'.$theme['Name'].'" selected="selected">'.$theme['Name'].'</option>';
				}
				else{
					echo '<option value="'.$theme['Name'].'">'.$theme['Name'].'</option>';
				}
			}       
			?>
     	</select>

		</div>
		<?php
	}
	function show_box2() {
		?>
<div class="inside">
<p><?php _e('SSL Domain URL Setup',  'WP-OliveCart');?></p>
<input name="ssl_url" tabindex="1" value="<?php echo $this->ssl_url; ?>" id="link_name" type="text" class="cartinputitem04" />
<p><?php _e('Example: https://www.cart-ya.com','WP-OliveCart');?></p>
<?php	$member_option	= get_option('shopping_member_option');
		if($member_option==1){ $select2='selected'; }
		elseif($member_option==2){ $select3='selected'; }
		else{$select1='selected';}
		?>

		</div>
		<?php
	}
	function show_box3() {

		$title1 = get_option('cart_button_other_option1');
		#$auto_cart_add_button	= get_option('auto_cart_add_button');
		#if($auto_cart_add_button){ $select3='selected'; }
		#else{$select4='selected';}
		$cart_add_button_position	= get_option('cart_add_button_position');
		if($cart_add_button_position=='left'){ $select5='selected'; }
		elseif($cart_add_button_position=='right'){$select6='selected'; }
		else{$select7='selected';}


		?>
		<div class="inside">
		<a name="change_option"></a>
		<p><?php _e('Button Position',  'WP-OliveCart');?></p>
		<select name="cart_add_button_position">
		<option value="left" <?php echo $select5;?>><?php _e('left','WP-OliveCart');?></option>
		<option value="right" <?php echo $select6;?>><?php _e('right','WP-OliveCart');?></option>
		<option value="center" <?php echo $select7;?>><?php _e('center','WP-OliveCart');?></option>
		</select>
		<p><?php _e('Other Options Title',  'WP-OliveCart');?></p>
		<input type="text" value="<?php echo $title1;?>" name="cart_button_other_option1" class="cartinputitem04" />
		</div>

		<?php
	}

	function show_box5() {
		$sendmail_address1 = get_option('sendmail_address1');
		$sendmail_address2 = get_option('sendmail_address2');
		?>
		<div class="inside">
		
		<p><?php _e('SendMail Address',  'WP-OliveCart');?></p>
		<input type="text" value="<?php echo $sendmail_address1;?>" name="sendmail_address1" class="cartinputitem04" />
		
		<p><a href="?page=olivecart_auto_email&id=<?php echo 'shop_mail';?>"><?php _e('Edit shop mail contents',  'WP-OliveCart');?></a></p>

		</div>

		<?php
	}

}


?>
