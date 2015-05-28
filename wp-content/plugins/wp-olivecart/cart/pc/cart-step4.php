<?php
$_POST['name'] = $_POST['customer_name'];
if ($error['error'] == 'error' and !$_POST['zip_search']) {
	echo '<div id="error"><p>'.__('Error Required field is missing ','WP-OliveCart').'</p></div>';
}
?>

<form name=Form  method="post" action="">
<input type=hidden name="step" value="4">
<input type=hidden name="id" value="<?php echo $_POST['id']; ?>">
<input type=hidden name="member" value="<?php echo $_POST['member']; ?>">
<input type=hidden name="mode" value="<?php echo $_POST['mode']; ?>">
<input type=hidden name="zip_search" value="">
<input type=hidden name=page_id value="<?php echo get_option('cart_page_id');?>">

<table id="cart">
<tr>
<th class="th03"><?php _e('First Name','WP-OliveCart');?></th>
<td><input type="text" name="customer_name" class="inputitem02" value="<?php echo $_POST['name']; ?>" />
<?php 
if ( $error['customer_name'] == "error" and !$_POST['zip_search']) {
	echo '<br /><span class="red">'. __('Missing First Name field. Please correct and try again.','WP-OliveCart').'</span>'; 
}
 ?>
</td>
</tr>
<tr>
<th class="th03"> <?php _e('Last Name','WP-OliveCart');?></th>
<td><input type="text" name="kana" class="inputitem02" value="<?php echo $_POST['kana']; ?>" />
<?php
if ( $error['kana'] == "error" and !$_POST['zip_search']) {
	echo '<br /><span class="red">'. __('Missing Last Name field. Please correct and try again.','WP-OliveCart').'</span>'; 
}
?>
</td>
</tr>
<tr>
<th class="th03"><?php _e('Postal Code','WP-OliveCart');?> </th>
<td><input type="text" name="zip" class="inputitem03" value="<?php echo $_POST['zip']; ?>" />
<input type="button" value="<?php _e('Find an address','WP-OliveCart');?>" onClick="zip_list_search();" />
<?php
if ( $error['zip'] == "error" and !$_POST['zip_search']) {
	echo '<br /><span class="red">'. __('Missing Postal Code. Please correct and try again.','WP-OliveCart').'</span>';
}
?>
</td>
</tr>
<tr>
<th class="th03"><?php _e('Prefecture','WP-OliveCart'); ?></th>
<td>
<select name="pref"> 

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
	echo '<br /><span class="red">'. __('Missing prefecture. Please correct and try again.','WP-OliveCart').'</span>';
} 
?>
</td>
</tr>
<tr>
<th class="th03"><?php _e('Address','WP-OliveCart');?> </th>
<td>
<textarea name="address" class="inputitem04"><?php echo $_POST['address']; ?></textarea>
<?php
if ( $error['address'] == "error" and !$_POST['zip_search'] ) {
	echo '<br /><span class="red">'. __('Missing Address. Please correct and try again.','WP-OliveCart').'</span>'; 
}
?>
</td>
</tr>
<tr>
<th class="th03"> <?php _e('Phone','WP-OliveCart');?></th>
<td><input type="text" name="tel" class="inputitem02" value="<?php echo $_POST['tel']; ?>" />
<?php _e('(Example: 000-000-000)','WP-OliveCart');?>
<?php
if ( $error['tel'] == "error" and !$_POST['zip_search']) { 
	echo '<br /><span class="red">'. __('Missing phone number. Please correct and try again.','WP-OliveCart').'</span>'; 
}
?>
</td>
</tr>
<tr>
<th class="th03"><?php _e('Email','WP-OliveCart');?></th>
<td><input type="text" name="mailaddress1" class="inputitem02" value="<?php echo $_POST['mailaddress1']; ?>" />
<?php
if ( $error['mailaddress1'] == "error" or $error['mailaddress1'] == "wrong" and !$_POST['zip_search']) {
	echo '<br/><span class="red">'. __('Missing email address. Please correct and try again.','WP-OliveCart').'</span>';
}
elseif ($error['mailerror'] == "error" and !$_POST['zip_search']) {
	echo ' <br/><span class="red">'. __('E-mail address is already registered.','WP-OliveCart').'</span>'; 
}
?>
</td>
</tr>
<tr>
<th class="th03"><?php _e('Confirm Email','WP-OliveCart');?></th>
<td><input type="text" name="mailaddress2" class="inputitem02" value="<?php echo $_POST['mailaddress2']; ?>" />
<?php _e('(Check Emailaddress)','WP-OliveCart');?>
<?php
if ( ($error['mailaddress2'] == "error" or $error['mailaddress2'] == "wrong" or $error['mailaddress2'] == "different" ) and (!$_POST['zip_search'])){ echo '<br /><span class="red">'. __('Missing confirm email. Please correct and try again.','WP-OliveCart').'</span>'; } 
?>
</td>
</tr>
<?php
if ( $_POST['member'] == "yes") {
	print '
<tr>
<th class="th03">'. __('Password','WP-OliveCart').'</th>
<td><input type="password" name="password1" value="'.$_POST[password1].'" maxlength="8" />'.__('(4 English words under 8 letters.)','WP-OliveCart');
	if ($error['password1'] == "error" or $error['password1'] == "wrong" and !$_POST['zip_search']) { echo '<br/><span class="red">'. __('Missing password. Please correct and try again.','WP-OliveCart').'</span>';}

	print '
</td>
</tr>
<tr>
<th class="th03">'. __('Confirm Password','WP-OliveCart').'</th>
<td><input type="password" name="password2" value="'.$_POST[password2].'" maxlength="8" />'.__('(Check password)','WP-OliveCart');
if (($error['password2'] == "error" or $error['password2'] == "wrong" or $error['password2'] == "different" )and (!$_POST['zip_search'])) { echo '<br /><span class="red">'. __('Missing confirm password. Please correct and try again.','WP-OliveCart').'</span>'; }

	print <<<HTML
</td>
</tr>
HTML;
}

?>
</table>


</form>
<div id="submit">
<p><input type="submit" value="<?php _e('Back','WP-OliveCart');?>" onClick="history.back();" /> 
&nbsp;
<?php
if ($_POST['member'] == "yes"){
	echo '<input type="submit" value="'.__('Member registration','WP-OliveCart').'" onClick="document.Form.submit();" /> ';
}
else{
	echo '<input type="submit" value="'.__('Continue','WP-OliveCart').'" onClick="document.Form.submit();" /> ';
}
?>
</p>
</div>
