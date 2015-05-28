<h3><?php _e('Review your order','WP-OliveCart');?></h3>

<?php
foreach ( $personaldata as $key=>$value ) {
	$item	= 	$personaldata[$key]['title'];
	$count	= 	$personaldata[$key]['count'];
	$price	= 	$personaldata[$key]['price'];
	$option	= 	$personaldata[$key]['option'];
	$total	=	$price*$count;
	$total_all += $total;
	print '
	<ul class="mobileUL">
<li class="name">'.$item.''.$option.'</li>
<li>￥'.$price.'</li>
<li>'.__('Quantity' ,'WP-OliveCart').'：'.$count.'</li>
<li>￥'.$total.'</li>
</ul>
';

}
echo '<ul class="mobileUL">';

if($cart['payment_charge']){
	print '<li>'.$cart['payment_name'].__(':charge commission','WP-OliveCart').'￥'.$cart['payment_charge'].'</li>';
}

foreach ($commission as $row){
	if($row['price']){
		print '<li>'.$row['name'].__(':charge commission','WP-OliveCart').'￥'.$row['price'].'</li>';
	}
}
if(!$cart['postage']){ $cart['postage']=0; }
?>

<li><?php echo __('Postage ' ,'WP-OliveCart').'￥'.$cart['postage'];?></li>
<?php
if(get_option('consumption_tax')){
		$consumption_tax=floor((get_option('consumption_tax')/100)*$total_all);
?>
<li><?php echo __('Consumption Tax' ,'WP-OliveCart').'￥'.$consumption_tax;?></li>
<?php
}
?>
<li class="total"><?php echo __('Total' ,'WP-OliveCart').'￥'.$cart['total'];?></li>
</ul>


<h3><?php _e('Contact details:','WP-OliveCart');?></h3>
<p><?php _e('First Name','WP-OliveCart');?>：<?php echo $user['customer_name']; ?></p>
<p><?php _e('Last Name','WP-OliveCart');?>：<?php echo $user['kana']; ?></p>
<p><?php _e('Postal Code','WP-OliveCart');?>：<?php echo $user['zip']; ?></p>
<p><?php _e('Address','WP-OliveCart');?>：<?php echo $pref.$user['address']; ?></p>
<p><?php _e('Phone','WP-OliveCart');?>：<?php echo $user['tel']; ?></p>
<p><?php _e('Email','WP-OliveCart');?>：<?php echo $user['mailaddress1']; ?></p>

<h3><?php _e('Shipping details:','WP-OliveCart');?></h3>
<?php
 if ($user['mode'] == "send_user") { echo '<p>'.__('Billing address is same as shipping address','WP-OliveCart').'</p>';}
else{
	print '
<p>'.__('Name','WP-OliveCart').'：'.$user[name2].'</p>
<p>'.__('Postal Code','WP-OliveCart').'：'.$user[zip2].'</p>
<p>'.__('Address','WP-OliveCart').'：'.${pref2}.$user[address2].'</p>
<p>'.__('Phone','WP-OliveCart').'：'.$user[tel2].'</p>
';
}
?>
<h3><?php _e('Payment Method','WP-OliveCart');?></h3>
<p><?php echo $cart['payment_name']; ?></p>
<?php 
foreach ( $commission as $row ){
	if($row['name']){
		print "<h3>$row[name]</h3>"."\n"."<p>$row[post_form]</p>\n";
	}
}
?>
<h3><?php _e('Comment Message','WP-OliveCart');?></h3>
<p><?php echo $user['comment']; ?></p>
<p><?php _e('This is your final review. Please check all information carefully. If everything is correct, click "submit order".' ,'WP-OliveCart'); ?></p>


<form name="Form"  method="post" action="" data-ajax="false">
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
<div id="submit_entry">
<input type="submit" value="<?php _e('Back' ,'WP-OliveCart'); ?>" onClick="history.back();" /> 
<input type="submit" value="<?php _e('Submit Order' ,'WP-OliveCart'); ?>" onClick="document.Form.submit();" />
</div>
