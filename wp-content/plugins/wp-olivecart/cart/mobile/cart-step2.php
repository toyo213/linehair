<form name=Form2  method="post" action="" data-ajax="false">
<input type=hidden name=mode value="empty">
<input type=hidden name=step value="2">
<input type=hidden name=page_id value="<?php echo get_option('cart_page_id');?>">
</form>

<form name="Form4"  method="post" action="" data-ajax="false">
<input type=hidden name=mode value="retry">
<input type=hidden name=step value="2">
<input type=hidden name=page_id value="<?php echo get_option('cart_page_id');?>">
<?php
$personaldata = $GLOBALS['session']->sission_cart();
if ( $personaldata ) {
	foreach ( $personaldata as $key=>$value ) {
		$item		= 	$personaldata[$key]['title'];
		$count		= 	$personaldata[$key]['count'];
		$price		= 	$personaldata[$key]['price'];
		$option		= 	$personaldata[$key]['option'];
		$post_id	= 	$personaldata[$key]['post_id'];
		$total		=	$price*$count;
		$total_all += 	$total;
		print '
<input type=hidden name=number[] value="'.$key.'">
<ul class="mobileUL">
<li class="name">'.$item.''.$option.'</li>
<li>￥'.$price.'</li>
<li class-"quantity">
<div data-role="fieldcontain">
<label for="quantity">'.__('Quantity' ,'WP-OliveCart').'：</label>
<input name="count[]" type="text" value="'.$count.'" data-mini="true" />
</div>
</li>
<li>￥'.$total.'</li>
</ul>';
	}
	print '<ul class="mobileUL">';
	if(get_option('consumption_tax')){
		$consumption_tax=floor((get_option('consumption_tax')/100)*$total_all);
		$total_all = $total_all+$consumption_tax;
		print '
<li>'.__('Consumption Tax' ,'WP-OliveCart').':￥'.$consumption_tax.'</li>';
  }
			print '
<li class="total">'.__('Total' ,'WP-OliveCart').'：￥'.$total_all.'</li>
</ul>';

}else {
print '

<p>'.__('Your Shopping Cart is Empty' ,'WP-OliveCart').'</p>

';
}
?>
</form>
<div id="submit">
<input type="submit" class="iPhoneButton" value="<?php _e('Update' ,'WP-OliveCart'); ?>" onClick="document.Form4.submit();"  data-inline="true" /> 
<input type="submit" class="iPhoneButton" value="<?php _e('Empty your cart' ,'WP-OliveCart'); ?>" onClick="document.Form2.submit();"  data-inline="true" />
<input type="submit" class="iPhoneButton" value="<?php _e('Go to Checkout' ,'WP-OliveCart'); ?>" onClick="location.href =('<?php echo $url;?>?page_id=<?php echo get_option('cart_page_id');?>&step=3&sid=<?php echo $sid;?>')"  data-inline="true" />
</div>

