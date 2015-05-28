<h3><?php _e('I\'m A New Customer','WP-OliveCart');?></h3>
<?php
if ($error== "post_error") { echo '<div class="error"><p>Error: System error, please try agein.</p></div>'; }
?>
<input type="button" value="<?php _e('Register an account','WP-OliveCart');?>" onClick="location.href =('?page_id=<?php echo get_option('cart_page_id');?>&step=4&member=yes');" /> 
<input type="button" value="<?php _e('Checkout as a guest','WP-OliveCart');?>" onClick="location.href =('?page_id=<?php echo get_option('cart_page_id');?>&step=4&member=no');" /> 


<h3><?php _e('I\'m A Returning Customer','WP-OliveCart');?></h3>
<?php
if ($error['mailaddress1'] == "error") { echo '<div class="error"><p>'.__('Error:The email address you entered is not valid, please try again.','WP-OliveCart').'</p></div>'; }
elseif($error['password1'] == "error") { echo '<div class="error"><p>'.__('Error:The password you entered is not valid, please try again.','WP-OliveCart').'</p></div>'; }
elseif($error['error'] == 'error') { echo '<div class="error"><p>'.__('Error: The Email Address or Password is not registered.','WP-OliveCart').'</p></div>'; }
?>
<form name=Form  method="post" action="" data-ajax="false">
<input type=hidden name=step value="3">
<input type=hidden name=mode value="user_check">
<input type=hidden name=page_id value="<?php echo get_option('cart_page_id');?>">

<label for="useremail" class="labelform"><?php _e('Email Address' ,'WP-OliveCart'); ?>:</label>

<input type="text" name="mailaddress1" id="useremail"  value="<?php echo $_POST['mailaddress1']; ?>"/>
<br/>
<label for="password" class="labelform"><?php _e('Password' ,'WP-OliveCart'); ?>:

<input type="password" name="password1" id="password"  value="<?php echo $_POST['password1']; ?>" />

<br/>
<input type="submit" value="<?php _e('Login' ,'WP-OliveCart'); ?>" /> 

</form>
<form name=Form3  method="post" action="">
<input type=hidden name="mypage_mode" value="lost">
<input type=hidden name="page_id" value="<?php echo get_option('user_login_page');?>">
</form>
<a href="javascript:void(0)" onClick="document.Form3.submit();return false;" ><?php _e('Forgot your password? Click here' ,'WP-OliveCart'); ?></a>
