<form name="Form"  method="post" action="">
<input type=hidden name="page_id" value="<?php echo get_option('cart_page_id');?>">
<input type=hidden name="id" value="<?php echo $_POST['id']; ?>">
<input type=hidden name="mailaddress1" value="<?php echo $_POST['mailaddress1']; ?>">
<input type=hidden name="customer_name" value="<?php echo $_POST['customer_name']; ?>">
<input type=hidden name="kana" value="<?php echo $_POST['kana']; ?>">
<input type=hidden name="zip" value="<?php echo $_POST['zip']; ?>">
<input type=hidden name="pref" value="<?php echo $_POST['pref']; ?>">
<input type=hidden name="address" value="<?php echo $_POST['address']; ?>">
<input type=hidden name="tel" value="<?php echo $_POST['tel']; ?>">
<input type=hidden name="fax" value="<?php echo $_POST['fax']; ?>">
<input type=hidden name="name2" value="<?php echo $_POST['name2']; ?>">
<input type=hidden name="zip2" value="<?php echo $_POST['zip2']; ?>">
<input type=hidden name="pref2" value="<?php echo $_POST['pref2']; ?>">
<input type=hidden name="address2" value="<?php echo $_POST['address2']; ?>">
<input type=hidden name="tel2" value="<?php echo $_POST['tel2']; ?>">
<input type="hidden" name="mode" value="<?php echo $_POST['mode']; ?>">
<input type="hidden" name="step" value="7">
<h3><?php _e('Payment Method','WP-OliveCart');?></h3>
<?php

foreach ($payment as $key) {
	if (!$key[set01] ) { continue ;}
	if ($_POST['payment'] == $key['id']){ $checked ='checked';	}
	else { $checked = null; }
	if(!$count){ $checked = 'checked';}
	print <<<HTML
<div class="payment">
<input class="inputitemradio" value="$key[id]" id="payment$key[id]" name="payment" type="radio" $checked />
<label for="payment$key[id]" class="labelname">$key[set01]</label>
<p>$key[set03]</p>
</div>
HTML;
	$count++;
}


foreach ( $commission as $row ){
	if (!$row['name'] ) { continue ;}
	print <<<HTML
<h3>$row[name]</h3>
<div class="op">
<select name="$row[commission_no]">
HTML;
	$count=0;
	foreach ( $row['form2'] as $value ){
		if ($_POST['commission'] == $value){ $selected ='selected';}
		else {$selected =null;}
		echo "<option value=\"$count\" $selected>$value</option>\n";
		$count++;
	}
print <<<HTML
</select>
<p class="op_txt">$row[comment]</p>
</div>
HTML;
}
?>

<h3><?php _e('Comment Message','WP-OliveCart');?></h3>
<div class="op">
<textarea name="comment" class="inputitem05"></textarea>
</div>
</form>
<div id="submit">
<p><input type="submit" value="<?php _e('Back','WP-OliveCart');?>" onClick="history.back();" /> 
&nbsp;<input type="submit" value="<?php _e('Continue','WP-OliveCart');?>" onClick="document.Form.submit();" /> </p>
</div>