<h3><?php _e('Review your order','WP-OliveCart');?></h3>
<table id="cart">
<tr>
<th><?php _e('Items','WP-OliveCart');?></th>
<th class="th01"><?php _e('Price' ,'WP-OliveCart'); ?></th>
<th class="th02"><?php _e('Quantity' ,'WP-OliveCart'); ?></th>
<th class="th01"><?php _e('Subtotal' ,'WP-OliveCart'); ?></th>
</tr>
<?php
foreach ( $personaldata as $key=>$value ) {
	$item		= 	$personaldata[$key]['title'];
	$count		= 	$personaldata[$key]['count'];
	$price		= 	$personaldata[$key]['price'];
	$option		= 	$personaldata[$key]['option'];
	$post_id	= 	$personaldata[$key]['post_id'];
	$total		=	$price*$count;
	$total_all += $total;
	//サムネイル画像
	#$image		=	get_the_post_thumbnail(
	#	$post_id ,array(50,50), 'thumbnail'
	#);
	print <<<HTML
	<tr>
    <td>$item $option</td>
    <td class="item01">￥$price</td>
    <td class="item02">$count</td>
    <td class="item01">￥$total</td>
  </tr>
HTML;
}

if($cart['payment_charge']){
	print '
  <tr>
    <td colspan="3">'.$cart['payment_name'].__(':charge commission','WP-OliveCart').'</td>
    <td class="item01">￥'.$cart['payment_charge'].'</td>
  </tr>
';
}

foreach ($commission as $row){
	if($row['price']){
		print '
<tr>
<td colspan="3">'.$row[name].__(':charge commission','WP-OliveCart').'</td>
<td class="item01">￥'.$row[price].'</td>
</tr>
';
	}
}
if(!$cart['postage']){ $cart['postage']=0; }
?>
<tr>
<td colspan="3"><?php _e('Postage ' ,'WP-OliveCart');?></td>
<td class="item01">￥<?php echo $cart['postage']; ?></td>
</tr>
<?php
if(get_option('consumption_tax')){
		$consumption_tax=floor((get_option('consumption_tax')/100)*$total_all);
?>
<tr>
<td colspan="3"><?php _e('Consumption Tax' ,'WP-OliveCart');?></td>
<td class="item01">￥<?php echo $consumption_tax; ?></td>
</tr>
<?php
}
?>
<tr>
<td colspan="3"><?php _e('Total' ,'WP-OliveCart');?></td>
<td class="item01">￥<?php echo $cart['total']; ?></td>
</tr>
</table>

<h3><?php _e('Contact details:','WP-OliveCart');?></h3>
<p><span class="labelform02"><?php _e('First Name','WP-OliveCart');?>：</span><span class="editbox02"><?php echo $user['customer_name']; ?></span></p>
<p><span class="labelform02"><?php _e('Last Name','WP-OliveCart');?>：</span><span class="editbox02"><?php echo $user['kana']; ?></span></p>
<p><span class="labelform02"><?php _e('Postal Code','WP-OliveCart');?>：</span><span class="editbox02"><?php echo $user['zip']; ?></span></p>
<p><span class="labelform02"><?php _e('Address','WP-OliveCart');?>：</span><span class="editbox02"><?php echo $pref.$user['address']; ?></span></p>
<p><span class="labelform02"><?php _e('Phone','WP-OliveCart');?>：</span><span class="editbox02"><?php echo $user['tel']; ?></span></p>
<p><span class="labelform02"><?php _e('Email','WP-OliveCart');?>：</span><span class="editbox02"><?php echo $user['mailaddress1']; ?></span></p>

<h3 class="oc_step7"><?php _e('Shipping details:','WP-OliveCart');?></h3>
<?php
 if ($user['mode'] == "send_user") { echo '<p>'.__('Billing address is same as shipping address','WP-OliveCart').'</p>';}
else{
	print '
<p><span class="labelform02">'.__('Name','WP-OliveCart').'：</span><span class="editbox02">'.$user[name2].'</span></p>
<p><span class="labelform02">'.__('Postal Code','WP-OliveCart').'：</span><span class="editbox02">'.$user[zip2].'</span></p>
<p><span class="labelform02">'.__('Address','WP-OliveCart').'：</span><span class="editbox02">'.${pref2}.$user[address2].'</span></p>
<p><span class="labelform02">'.__('Phone','WP-OliveCart').'：</span><span class="editbox02">'.$user[tel2].'</span></p>
';
}
?>
<h3 class="oc_step7"><?php _e('Payment Method','WP-OliveCart');?></h3>
<p><?php echo $cart['payment_name']; ?></p>
<?php 
foreach ( $commission as $row ){
	if($row['name']){
		print "<h3>$row[name]</h3><p>$row[post_form]</p>\n";
	}
}
?>
<h3 class="oc_step7"><?php _e('Comment Message','WP-OliveCart');?></h3>
<p><?php echo $user['comment']; ?></p>
<p><?php _e('This is your final review. Please check all information carefully. If everything is correct, click "submit order".' ,'WP-OliveCart'); ?></p>


<form name="Form"  method="post" action="">
<input type=hidden name="id" value="<?php echo $user['id']; ?>">
<input type=hidden name="page_id" value="<?php echo get_option('cart_page_id');?>">
<input type=hidden name="mode" value="<?php echo $user['mode']; ?>">
<input type=hidden name="mailaddress1" value="<?php echo $user['mailaddress1']; ?>">
<input type=hidden name="customer_name" value="<?php echo $user['customer_name']; ?>">
<input type=hidden name="kana" value="<?php echo $user['kana']; ?>">
<input type=hidden name="zip" value="<?php echo $user['zip']; ?>">
<input type=hidden name="pref" value="<?php echo $user['pref']; ?>">
<input type=hidden name="address" value="<?php echo $user['address']; ?>">
<input type=hidden name="tel" value="<?php echo $user['tel']; ?>">
<input type=hidden name="name2" value="<?php echo $user['name2']; ?>">
<input type=hidden name="zip2" value="<?php echo $user['zip2']; ?>">
<input type=hidden name="pref2" value="<?php echo $user['pref2']; ?>">
<input type=hidden name="address2" value="<?php echo $user['address2']; ?>">
<input type=hidden name="tel2" value="<?php echo $user['tel2']; ?>">
<input type="hidden" name="payment" value="<?php echo $user['payment']; ?>">
<?php
foreach ($commission as $row){
	if ($row['name'] ){
 		echo '<input type="hidden" name="'.$row['commission_no'].'" value="'.$row['in_commission'].'">'."\n";
	}
}
?>


<input type="hidden" name="comment" value="<?php echo $user['comment']; ?>">
<input type="hidden" name="step" value="8">
</form>
<div id="submit">
<p><input type="submit" value="<?php _e('Back' ,'WP-OliveCart'); ?>" onClick="history.back();" /> 
&nbsp;<input type="submit" value="<?php _e('Submit Order' ,'WP-OliveCart'); ?>" onClick="document.Form.submit();" /> </p>
</div>
