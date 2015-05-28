<form name=Form1  method="post" action="">
<input type=hidden name=member value="yes">
<input type=hidden name=step value="4">
<input type=hidden name=page_id value="<?php echo get_option('cart_page_id');?>">
</form>
<form name=Form2  method="post" action="">
<input type=hidden name=member value="no">
<input type=hidden name=step value="4">
<input type=hidden name=page_id value="<?php echo get_option('cart_page_id');?>">

</form>

<h3><?php _e('I\'m A New Customer','WP-OliveCart');?></h3>
<?php
if ($error== "post_error") { echo '<div class="error"><p>Error: System error, please try agein.</p></div>'; }
?>
<div id="newentry">
<p>
<input type="submit" value="<?php _e('Register an account','WP-OliveCart');?>" onClick="document.Form1.submit();" /> 
<input type="submit" value="<?php _e('Checkout as a guest','WP-OliveCart');?>" onClick="document.Form2.submit();" /> 
</p>
</div>

<h3><?php _e('I\'m A Returning Customer','WP-OliveCart');?></h3>
<?php
if ($error['mailaddress1'] == "error") { echo '<div id="error"><p>'.__('Error:The email address you entered is not valid, please try again.','WP-OliveCart').'</p></div>'; }
elseif($error['password1'] == "error") { echo '<div id="error"><p>'.__('Error:The password you entered is not valid, please try again.','WP-OliveCart').'</p></div>'; }
elseif($error['error'] == 'error') { echo '<div id="error"><p>'.__('Error: The Email Address or Password is not registered.','WP-OliveCart').'</p></div>'; }
?>
<form name=Form  method="post" action="">
<input type=hidden name=step value="3">
<input type=hidden name=mode value="user_check">
<input type=hidden name=page_id value="<?php echo get_option('cart_page_id');?>">
<fieldset>
<label for="useremail" class="labelform01"><?php _e('Email Address' ,'WP-OliveCart'); ?>:</label>
<span class="editbox01">
<input type="text" name="mailaddress1" id="useremail"  value="<?php echo $_POST['mailaddress1']; ?>"/>
</span>
</fieldset>

<fieldset>
<label for="password" class="labelform01"><?php _e('Password' ,'WP-OliveCart'); ?>:</label>
<span class="editbox01">
<input type="password" name="password1" id="password"  value="<?php echo $_POST['password1']; ?>" />
</span>
</fieldset>

<div id="login">
<p><input type="submit" value="<?php _e('Login' ,'WP-OliveCart'); ?>" /> </p>
</div>
</form>
<form name=Form3  method="post" action="">
<input type=hidden name="mypage_mode" value="lost">
<input type=hidden name="page_id" value="<?php echo get_option('user_login_page');?>">
</form>
<p><a href="javascript:void(0)" onClick="document.Form3.submit();return false;" ><?php _e('Forgot your password? Click here' ,'WP-OliveCart'); ?></a></p>
