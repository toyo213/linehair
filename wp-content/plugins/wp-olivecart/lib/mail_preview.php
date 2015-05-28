<?php
/**Shopping Cart System Olive-Cart.
 * @link http://www.cart-ya.com/
 * @copyright 2008-2009 Olive-Design, Corp.
 * @package Olive-Cart
 */
/* $Id: mail_preview.php  2009-08-21 15:10:03 $ */

class mailform{
//* Template
	var $template      = null;
//* folder
	var $folder        = null;
	var $subfolder     = null;
//* EntryList
	var $SslUrl        = '<\$SslUrl\$>';
	var $CmsTitle      = '<\$CmsTitle\$>';
	var $PageTitle     = '<\$PageTitle\$>';
	var $FolderTitle   = '<\$FolderTitle\$>';
	var $CmsUrl        = '<\$CmsUrl\$>';
	var $MailForm      = '<\$MailForm\$>';
	var $name          = '<\$name\$>';
	var $company       = '<\$company\$>';
	var $zip           = '<\$zip\$>';
	var $address       = '<\$address\$>';
	var $tel           = '<\$tel\$>';
	var $email1        = '<\$email1\$>';
	var $email2        = '<\$email2\$>';
	var $comment       = '<\$comment\$>';
	var $error_name    = '<\$error_name\$>';
	var $error_tel     = '<\$error_tel\$>';
	var $error_email1  = '<\$error_email1\$>';
	var $error_email2  = '<\$error_email2\$>';
	var $error_comment = '<\$error_comment\$>';
	function read_template($file){
		$line = file($file);
		for ($i =0; $i < count($line) ; $i++){ $str.= $line[$i]; }
		return $str;
	}
	function Preview(){
		$error=array();
		$mailform_text=dirname(__FILE__).'/../mail/mailform/mail_form1.txt';
		if($_POST){
			if($_POST['mode']=='submit'){
				$_POST['comment'] = preg_replace("/<br>/sm","\n",$_POST['comment']);
			}
			foreach($_POST as $key=>$value){
				$_POST[$key]= strip_tags($value);
			}
			$_POST['name']   = $_POST['name1'];
			$_POST['comment'] = preg_replace("/\\r/sm","",$_POST['comment']);
			$_POST['comment'] = preg_replace("/\\n/sm",'<br>',$_POST['comment']);
			if(!$_POST['name']){$error['name']='<br/><font color="red">'.__('Missing Name field. Please correct and try again.' ,'WP-OliveCart').'</font>';}
			if(!$_POST['tel']){$error['tel']='<br/><font color="red">'. __('Missing phone number. Please correct and try again.','WP-OliveCart').'</font>';}
			if(!$_POST['comment']){$error['comment']='<font color="red">'. __('Missing comments field. Please correct and try again.','WP-OliveCart').'</font>';}
			if(!$this->mail_check($_POST['email1'])){$error['email1']='<br><font color="red">'. __('Missing email address. Please correct and try again.','WP-OliveCart').'</font>';}
			if($_POST['email1'] !=$_POST['email2']){$error['email2']='<br><font color="red">'. __('Missing confirm email. Please correct and try again.','WP-OliveCart').'</font>';}
			if(!$error){$mailform_text=dirname(__FILE__).'/../mail/mailform/mail_form2.txt';}
			if($_POST['mode']=='submit'){
				$this->Send_mail();
				$mailform_text=dirname(__FILE__).'/../mail/mailform/mail_form3.txt';
			}
		}

		$str = $this->read_template($mailform_text);
		$str = preg_replace("/$this->SslUrl/sm",$Config[sslurl],$str);
		$str = preg_replace("/$this->CmsTitle/sm",$Config[webtitle],$str);
		$str = preg_replace("/$this->PageTitle/sm","Mail form",$str);
		$str = preg_replace("/$this->FolderTitle/sm","MailForm",$str);
		$str = preg_replace("/$this->CmsUrl/sm",$Config[weburl],$str);

		$str = preg_replace("/$this->name/sm",$_POST[name],$str);
		$str = preg_replace("/$this->company/sm",$_POST[company],$str);
		$str = preg_replace("/$this->zip/sm",$_POST[zip],$str);
		$str = preg_replace("/$this->address/sm",$_POST[address],$str);
		$str = preg_replace("/$this->tel/sm",$_POST[tel],$str);
		$str = preg_replace("/$this->email1/sm",$_POST[email1],$str);
		$str = preg_replace("/$this->email2/sm",$_POST[email2],$str);
		$str = preg_replace("/$this->comment/sm",$_POST[comment],$str);
		$str = preg_replace("/$this->error_name/sm",$error[name],$str);
		$str = preg_replace("/$this->error_tel/sm",$error[tel],$str);
		$str = preg_replace("/$this->error_email1/sm",$error[email1],$str);
		$str = preg_replace("/$this->error_email2/sm",$error[email2],$str);
		 $str = preg_replace("/$this->error_comment/sm",$error[comment],$str);

		return $str;
	}
//_POST check for Email address
	function mail_check($email=null){ 
		if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+([\.][a-z0-9-]+)+$/i',$email)){ return true; }
		else { return false; }
  }
	function Send_mail(){
//Sql database connection
		$cart_url['cart_url'] = get_option('siteurl');
		$cart_url['ssl_url']  = get_option('ssl_url');
		$strHttpReferer = $_SERVER["HTTP_REFERER"];
		if(mb_eregi($cart_url['cart_url'],$strHttpReferer)){$sendmail=true;}
		if($cart_url['ssl_url']){
			if(mb_eregi($cart_url['ssl_url'],$strHttpReferer)){$sendmail=true;}
		}
		$address= get_option('admin_email');
		$subject='Olive Cart Mailform';
		$date_array=getdate();
		$comment=$subject."\n\n";
		foreach ($_POST as $key=>$value) {
			$value = preg_replace("/<br>/sm","\n",$value);
			if($key=='email2' or $key=='mode'){continue;}
			if($value){$comment.="$key : $value\n\n";} 
		}
		$mailfooter="
Date:
$date_array[year]/$date_array[mon]/$date_array[mday] $date_array[hours]:$date_array[minutes]
---------------------------
Olive Cart MAILFORM
http://www.cart-ya.com/
---------------------------
";
	$m_honbun=$comment.$mailfooter;
  #sendmail
		if($sendmail){
      mb_send_mail($address,$subject,$m_honbun, 'From: '.$_POST[email1]."\nContent-Type: text/plain; charset=iso-2022-jp");
		}
	}
}
?>
