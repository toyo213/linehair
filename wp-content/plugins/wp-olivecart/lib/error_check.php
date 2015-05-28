<?php
/**Shopping Cart System Olive-Cart.
 * @link http://www.cart-ya.com/
 * @copyright 2008-2009 Olive-Design, Corp.
 */
/* $Id: error_check.php  2009-01-28 15:10:03 $ */
class error_check
{

  function deliver_check($form,$error=null){
  //_POST form data receive
      $flag=0;
      foreach ($_POST as $key=>$value){
        if(empty($form[$key])) { continue; }
        if(empty($value)) {
          $error[$key] = "error"; //Form Data empty = ErrorMessage send
        }
      }
    return $error;
   }
  function postdata_check($form=null,$error=null){
    if(isset($_POST['mode']) == 'send_user' or isset($_POST['mode']) == 'send_deliver'){
      if(!empty($_POST['_indispen'])) { // Option Input form data hidden _indispan[] 
        foreach ($_POST['_indispen'] as $key => $value){ $form[$key] =$value; }
       }
      //Form POST DATA receive
      foreach ($_POST as $key=>$value){  
        $_POST[$key]=strip_tags($value);//POST Data conver
        #$_POST[$key]= mb_convert_kana($value,"K");
        if(empty($form[$key])) { continue; }
        if(empty($value)) {
          $error[$key] = "error"; //Form Data empty = ErrorMessage send
        }
      }
    }
    return $error;//return to error message
   }

function mailaddress_check($form,$error=null){
    if(isset($_POST['mailaddress1'])) {
      $_POST['mailaddress1']=mb_convert_kana($_POST['mailaddress1'],"a") ;
      $emailcheck=$this->mail_check1($_POST['mailaddress1']); 
      if(empty($emailcheck)) {
        $error['mailaddress1'] = "wrong";//Form Data is wrong = ErrorMessage
      }
    }
    if(isset($_POST['mailaddress2'])) {
      $_POST['mailaddress2']=mb_convert_kana($_POST['mailaddress2'],"a") ;
      $emailcheck = $this->mail_check1($_POST['mailaddress2']); 
      if(empty($emailcheck)){
        $error['mailaddress2'] = "wrong";//Form Data is "wrong" = ErrorMessage
      }
    }
    if(isset($_POST['mailaddress1'],$_POST['mailaddress2'])){
      $emailcheck = $this->check2($_POST['mailaddress1'],$_POST['mailaddress2']); 
      if(empty($emailcheck)){
        $error['mailaddress2'] = "different";//Form Data is "different" = ErrorMessage
      }
    }
    return $error;
  }

function pass_check($form,$error=null){

    if(isset($_POST['password1'])) {
      $passwordcheck=$this->password_check1($_POST['password1']);
      if(!empty($passwordcheck)) {
        $passwordcheck=$this->password_check2($_POST['password1']);
      }
      if(empty($passwordcheck)) {
        $error['password1'] = "wrong";//Form Data is wrong = ErrorMessage
      }
    }
    if(isset($_POST['password2'])) {
      $passwordcheck = $this->password_check1($_POST['password2']); 
      if(empty($passwordcheck)){
        $error['password2'] = "wrong";//Form Data is "wrong" = ErrorMessage
      }
    }
    if(isset($_POST['password1'],$_POST['password2'])){
      #$_POST['password1']=strval($_POST['password1']);
      #$_POST['password2']=strval($_POST['password2']);
      $passwordcheck = $this->check2($_POST['password1'],$_POST['password2']); 
      if(empty($passwordcheck)){
        $error['password2'] = "different";//Form Data is "different" = ErrorMessage
      }
    }
    return $error;
  }
//_POST check for Email address
  function mail_check1($email=null){ 
    if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+([\.][a-z0-9-]+)+$/i',$email)){
      return true;
    } else {
      return false;
    }
  }
//_POST check for Password
  function password_check1($password=null){ 
    if(preg_match('/^[a-z\d\.-_]+$/i',$password)){
      return true;
    } else {
      return false;
    }

  }
//_POST check for Password
  function password_check2($password=null){
   if(strlen($password) > 3){
      return true;
    } else {
      return false;
    }

  }
//retry POST email address check
  function check2($num1=null,$num2=null){
    if($num1===$num2){
      return true;
    } else {
      return false;
    }
  }

}
?>