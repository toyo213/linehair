
<?php
$_POST['name'] = $_POST['customer_name'];
if ($error['error'] == 'error' and !$_POST['zip_search']) {
	echo '<div class="error"><p>'.__('Error Required field is missing ','WP-OliveCart').'</p></div>';
}
?>
<form name=Form  method="post" action="" data-ajax="false">
<input type=hidden name=step value="4">
<input type=hidden name=id value="<?php echo $_POST['id']; ?>">
<input type=hidden name=member value="<?php echo $_POST['member']; ?>">
<input type=hidden name=mode value="<?php echo $_POST['mode']; ?>">
<input type=hidden name="zip_search" value="">
<input type=hidden name=page_id value="<?php echo get_option('cart_page_id');?>">
<h3><?php _e('Please enter your contact details','WP-OliveCart');?></h3>
<fieldset>
<label for="name"><?php _e('First Name','WP-OliveCart');?></label>
<input type="text" id="name" name="customer_name"  value="<?php echo $_POST['name']; ?>" />
<?php 
if ( $error['customer_name'] == "error" and !$_POST['zip_search']) {
	echo '<br/><span class="red">'. __('Missing First Name field. Please correct and try again.','WP-OliveCart').'</span>'; 
}
 ?>
</fieldset>
<fieldset>
<label for="ruby"><?php _e('Last Name','WP-OliveCart');?></label>
<input type="text" id="ruby" name="kana"  value="<?php echo $_POST['kana']; ?>" />
<?php
if ( $error['kana'] == "error" and !$_POST['zip_search']) {
	echo '<br/><span class="red">'. __('Missing Last Name field. Please correct and try again.','WP-OliveCart').'</span>'; 
}
?>
</fieldset>
<fieldset>
<label for="zip"><?php _e('Postal Code','WP-OliveCart');?> </label>
<input type="text" id="zip" name="zip"  value="<?php echo $_POST['zip']; ?>" />
<input type="button" value="<?php _e('Find an address','WP-OliveCart');?>" onClick="zip_list_search();" />
<?php
if ( $error['zip'] == "error" and !$_POST['zip_search']) {
	echo '<br/><span class="red">'. __('Missing Postal Code. Please correct and try again.','WP-OliveCart').'</span>';
}
?>
</fieldset>
<fieldset>
<label for="pref"><?php _e('Prefecture','WP-OliveCart'); ?></label>
<select name="pref" id="pref"> 

<?php
foreach ($pref as $value ) { 
	if( $count== $_POST['pref'] ) { echo "<option value=\"$count\" selected>$value</option> \n"; }
	else { echo "<option value=\"$count\">$value</option> \n"; }
	$count++;
}

?>
</select> 
<?php 
if ( $error['pref'] == "error" and !$_POST['zip_search']) {
	echo '<br/><span class="red">'. __('Missing prefecture. Please correct and try again.','WP-OliveCart').'</span>';
} 
?>
</fieldset>
<fieldset>
<label for="address"><?php _e('Address','WP-OliveCart');?> </label>

<textarea name="address" id="address"><?php echo $_POST['address']; ?></textarea>
<?php
if ( $error['address'] == "error" and !$_POST['zip_search']) {
	echo '<br/><span class="red">'. __('Missing Address. Please correct and try again.','WP-OliveCart').'</span>'; 
}
?>
</fieldset>
<fieldset>
<label for="tel"><?php _e('Phone','WP-OliveCart');?></label>
<input type="text" id="tel" name="tel" value="<?php echo $_POST['tel']; ?>" />
<?php
if ( $error['tel'] == "error" and !$_POST['zip_search']) { 
	echo '<br/><span class="red">'. __('Missing phone number. Please correct and try again.','WP-OliveCart').'</span>'; 
}
?>
</fieldset>
<fieldset>
<label for="mail1"><?php _e('Email','WP-OliveCart');?></label>
<input type="text" id="mail1" name="mailaddress1"  value="<?php echo $_POST['mailaddress1']; ?>" />
<?php
if ( $error['mailaddress1'] == "error" or $error['mailaddress1'] == "wrong" and !$_POST['zip_search']) {
	echo '<br/><span class="red">'. __('Missing email address. Please correct and try again.','WP-OliveCart').'</span>';
}
elseif ($error['mailerror'] == "error") {
	echo '<br/><span class="red">'. __('E-mail address is already registered.','WP-OliveCart').'</span>'; 
}
?>
</fieldset>
<fieldset>
<label for="mail2"><?php _e('Confirm Email','WP-OliveCart');?></label>
<input type="text" id="mail2" name="mailaddress2"  value="<?php echo $_POST['mailaddress2']; ?>" />
<?php _e('(Check Emailaddress)','WP-OliveCart');?>
<?php
if ( ($error['mailaddress2'] == "error" or $error['mailaddress2'] == "wrong" or $error['mailaddress2'] == "different") and (!$_POST['zip_search'])) { echo '<br/><span class="red">'. __('Missing confirm email. Please correct and try again.','WP-OliveCart').'</span>'; } 
?>
</fieldset>
&nbsp;
<?php
if ( $_POST['member'] == "yes") {
	print '
<fieldset>
<label for="passward">'. __('Password','WP-OliveCart').'</label>
<input type="password" id="password" name="password1" value="'.$_POST[password1].'" maxlength="8" />'.__('(4 English words under 8 letters.)','WP-OliveCart');
	if ($error['password1'] == "error" or $error['password1'] == "wrong" and !$_POST['zip_search']) { echo '<br/><span class="red">'. __('Missing password. Please correct and try again.','WP-OliveCart').'</span>';}

	print '
</fieldset>
<fieldset>
<label for="passward2">'. __('Confirm Password','WP-OliveCart').'</label>
<input type="password" id="password2" name="password2"  value="'.$_POST[password2].'" maxlength="8" />'.__('(Check password)','WP-OliveCart');
if (($error['password2'] == "error" or $error['password2'] == "wrong" or $error['password2'] == "different") and (!$_POST['zip_search'])) { echo '<br/><span class="red">'. __('Missing confirm password. Please correct and try again.','WP-OliveCart').'</span>'; }

	print <<<HTML
</fieldset>
HTML;
}

?>
</table>


</form>
<div id="submit_entry">
<input type="submit" value="<?php _e('Back','WP-OliveCart');?>" onClick="history.back();" /> 
&nbsp;
<?php
if ($_POST['member'] == "yes"){
	echo '<input type="submit" value="'.__('Member registration','WP-OliveCart').'" onClick="document.Form.submit();" /> ';
}
else{
	echo '<input type="submit" value="'.__('Continue','WP-OliveCart').'" onClick="document.Form.submit();" /> ';
}
?>
</div>
