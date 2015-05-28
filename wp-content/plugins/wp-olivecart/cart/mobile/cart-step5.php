
<script type="text/javascript">
function Form_submit(Step_value,Mode_value){
  document.Form2.step.value=Step_value;
  document.Form2.mode.value=Mode_value;
  document.Form2.submit();
}
</script>


<form name="Form2"  method="post" action="" data-ajax="false">
<input type=hidden name="page_id" value="<?php echo get_option('cart_page_id');?>">
<input type=hidden name="id" value="<?php echo $user['id']; ?>">
<input type=hidden name="member" value="<?php echo $user['member']; ?>">
<input type=hidden name="mailaddress1" value="<?php echo $user['mailaddress1']; ?>">
<input type=hidden name="mailaddress2" value="<?php echo $user['mailaddress2']; ?>">
<input type=hidden name="password1" value="<?php echo $user['password1']; ?>">
<input type=hidden name="password2" value="<?php echo $user['password2']; ?>">

<input type=hidden name="customer_name" value="<?php echo $user['name']; ?>">
<input type=hidden name="kana" value="<?php echo $user['kana']; ?>">
<input type=hidden name="zip" value="<?php echo $user['zip']; ?>">
<input type=hidden name="pref" value="<?php echo $user['pref']; ?>">
<input type=hidden name="address" value="<?php echo $user['address']; ?>">
<input type=hidden name="tel" value="<?php echo $user['tel']; ?>">
<input type=hidden name="fax" value="<?php echo $user['fax']; ?>">
<input type=hidden name="step" value="">
<input type=hidden name="mode" value="">
</form>
<h3><?php _e('Billing address is same as shipping address','WP-OliveCart');?></h3>
<p><?php _e('Name','WP-OliveCart');?>：<?php echo $user['name']; ?>&nbsp;<?php echo $user['kana']; ?></p>
<p><?php _e('Address','WP-OliveCart');?>：<?php echo $user['zip'].'&nbsp;'.$pref1.$user['address'];?></p>

<div id="submit_entry">
<input type="submit" value="<?php _e('Same as shipping address','WP-OliveCart');?>" onClick="Form_submit('6','send_user');" /> 
<input type="submit" value="<?php _e('Change your contact details','WP-OliveCart');?>" onClick="Form_submit('4','edit_user');" /> 
</div>


<h3><?php _e('Shipping address','WP-OliveCart');?></h3>
<?php
if ( $error['error'] == 'error' ) {
	echo '<div class="error"><p>'.__('Error Required field is missing ','WP-OliveCart').'</p></div>';
}
?>
<form name="Form"  method="post" action="" data-ajax="false">
<input type=hidden name="id" value="<?php echo $user['id']; ?>">
<input type=hidden name="page_id" value="<?php echo get_option('cart_page_id');?>">
<input type=hidden name="step" value="5">
<input type=hidden name="mode" value="send_deliver">
<input type=hidden name="mailaddress1" value="<?php echo $user['mailaddress1']; ?>">
<input type=hidden name="mailaddress2" value="<?php echo $user['mailaddress2']; ?>">
<input type=hidden name="password1" value="<?php echo $user['password1']; ?>">
<input type=hidden name="password2" value="<?php echo $user['password2']; ?>">
<input type=hidden name="customer_name" value="<?php echo $user['name']; ?>">
<input type=hidden name="kana" value="<?php echo $user['kana']; ?>">
<input type=hidden name="zip" value="<?php echo $user['zip']; ?>">
<input type=hidden name="pref" value="<?php echo $user['pref']; ?>">
<input type=hidden name="address" value="<?php echo $user['address']; ?>">
<input type=hidden name="tel" value="<?php echo $user['tel']; ?>">
<input type=hidden name="fax" value="<?php echo $user['fax']; ?>">
<input type=hidden name="zip_search" value="">

<fieldset>
<label for="name" class="labelform"><?php _e('Name','WP-OliveCart');?></label>
<input type="text" name="name2" value="<?php echo $user['name2']; ?>" />
<?php if ($error['name2'] == "error") { echo '<br /><span class="red">'. __('Missing Name field. Please correct and try again.','WP-OliveCart').'</span>';} ?>
</fieldset>
<fieldset>
<label for="zip" class="labelform"><?php _e('Postal Code','WP-OliveCart');?></label>
<input type="text" name="zip2" value="<?php echo $user['zip2']; ?>" />
<input type="button" value="<?php _e('Find an address','WP-OliveCart');?>" onClick="zip_list_search();" />
<?php if ($error['zip2'] == "error") { echo '<br /><span class="red">'. __('Missing Postal Code. Please correct and try again.','WP-OliveCart').'</span>'; } ?>
</fieldset>
<fieldset>
<label for="pref2" class="labelform"><?php _e('Prefecture','WP-OliveCart'); ?></label>
<select name="pref2"> 

<?php
foreach ($pref as $value ) { 
	if( $count== $user['pref2'] ) { echo "<option value=\"$count\" selected>$value</option> \n"; }
	else { echo "<option value=\"$count\">$value</option> \n"; }
	$count++;
}

?>
</select> 
<?php if ($error['pref2'] == "error") { echo '<br /><span class="red">'. __('Missing prefecture. Please correct and try again.','WP-OliveCart').'</span>'; } ?>

</fieldset>
<fieldset>
<label for="address2" class="labelform"><?php _e('Address','WP-OliveCart');?></label>
<textarea name="address2"><?php echo $user['address2']; ?></textarea>
<?php if ($error['address2'] == "error") {
	echo '<br /><span class="red">'. __('Missing Address. Please correct and try again.','WP-OliveCart').'</span>'; } 
?>
</fieldset>
<fieldset>
<label for="tel2" class="labelform"><?php _e('Phone','WP-OliveCart');?></label>
<input type="text" name="tel2" value="<?php echo $user['tel2']; ?>" />      
<?php if ($error['tel2'] == "error") { echo '<br /><span class="red">'. __('Missing phone number. Please correct and try again.','WP-OliveCart').'</span>'; } ?>
</fieldset>

<div id="submit_entry">
<input type="submit" value="<?php _e('Please send it to this address','WP-OliveCart');?>" /> 
</div>
</form>
