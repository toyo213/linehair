<?php
class Cart_Auto_Email_Setup {
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
		add_meta_box( 'show_box1'  ,__('Auto Reply Email Reset',  'WP-OliveCart'),
		array(&$this, 'show_box1'),   $this->pagehook, 'normal', 'core');
		add_meta_box( 'show_box2'  ,__('Subject',  'WP-OliveCart'),
		array(&$this, 'show_box2'),   $this->pagehook, 'normal', 'core');
		add_meta_box( 'show_box3'  ,__('Contents',  'WP-OliveCart'),
		array(&$this, 'show_box3'),   $this->pagehook, 'normal', 'core');
    }

	function on_action(){
		global $wpdb;
		$mylink = new stdClass;
		$this->title   = __('Auto Reply Email Setup','WP-OliveCart');
		$this->icon        = 'cart';
		$eflag = null;	
		if( $_POST['action'] == 'edit'){
			if(strstr($_POST[textarea],'<OrderList>')){  $eflag	=	true; }
			if(strstr($_POST[textarea],'</OrderList>')){ $eflag	=	true; }
			if($eflag){
				$query = "update CART_cartedit set set05='$_POST[subject]',set06='$_POST[textarea]' where id=$_POST[id]";
				$wpdb->query($query);
				$this->message = '<div id="message" class="updated below-h2"><p>'.__('Mail data updated','WP-OliveCart').'</p></div>';
			}
			else{
				$this->message = '<div id="message" class="updated below-h2"><p>'.__('Error:OrderList Tag Error','WP-OliveCart').'</p></div>';
			}
		}
		if( $_POST['action'] == 's_edit'){
			if(strstr($_POST[textarea],'<OrderList>')){  $eflag	=	true; }
			if(strstr($_POST[textarea],'</OrderList>')){ $eflag	=	true; }
			if($eflag){
				update_option('s_subject',$_POST['subject']);
				update_option('s_mail_m',$_POST['textarea']);
				$this->message = '<div id="message" class="updated below-h2"><p>'.__('Mail data updated','WP-OliveCart').'</p></div>';
			}
			else{
				$this->message = '<div id="message" class="updated below-h2"><p>'.__('Error:OrderList Tag Error','WP-OliveCart').'</p></div>';
			}
		}
		if($_REQUEST['id']=='shop_mail'){
			$mylink->set05	= get_option('s_subject');
			$mylink->set06 	= get_option('s_mail_m');
			$this->action    = 's_edit';
		}
		else{
			$mylink        = $wpdb->get_row( "select * from CART_cartedit where id = $_REQUEST[id]" );
			$this->action      = 'edit';
		}

		if( $_POST['action'] == 'mail_reset'){ 
			require_once(dirname(__FILE__)."../../mail/create_mail.php");
			$mylink->set05 = $subject; $mylink->set06 = $mail_m;
			$this->message = '<div id="message" class="updated below-h2"><p>'.__('Mail data reseted','WP-OliveCart').'</p></div>';
			
		}
		if( $_POST['action'] == 's_mail_reset'){ 
			require_once(dirname(__FILE__)."../../mail/shop_mail.php");
			#$mylink->set05 = $subject; $mylink->set06 = $mail_m;
			$this->message = '<div id="message" class="updated below-h2"><p>'.__('Mail data reseted','WP-OliveCart').'</p></div>';
			
		}

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

	function show_box1($field_value) {
		?>
		<div class="inside">
		<input type="button" class="button" value="<?php _e('Reset your Email Contents','WP-OliveCart');?>" onclick="Mail_reset('<?php echo $this->action;?>')" /> 
		</div> 
		<?php
	}
		function show_box2($field_value) {
		?>
		<div class="inside">
		<input name="subject" type="text" class="subject" value="<?php echo $field_value->set05;?>">
		</div> 
		<?php
	}
		function show_box3($field_value) {
		?>
		<div class="inside">
		<textarea name="textarea" class="sendinputitem"><?php echo $field_value->set06;?></textarea>
		</div>
		<?php
	}

}


?>
