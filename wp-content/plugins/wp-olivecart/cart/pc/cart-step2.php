<form name=Form2  method="post" action="">
<input type=hidden name=mode value="empty">
<input type=hidden name=step value="2">
<input type=hidden name=page_id value="<?php echo get_option('cart_page_id');?>">
</form>

<form name="Form4"  method="post" action="">
<input type=hidden name=mode value="retry">
<input type=hidden name=step value="2">
<input type=hidden name=page_id value="<?php echo get_option('cart_page_id');?>">
<table id="cart">
<tr>
<th><?php _e('Items','WP-OliveCart');?></th>
<th class="th01"><?php _e('Price' ,'WP-OliveCart'); ?></th>
<th class="th02"><?php _e('Quantity' ,'WP-OliveCart'); ?></th>
<th class="th01"><?php _e('Subtotal' ,'WP-OliveCart'); ?></th>
</tr>
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
		//サムネイル画像を表示
		#$image		=	get_the_post_thumbnail($post_id,array(50,50));
		#if($image)	{ $image = $image; }
      print  '
      <tr>
      <input type=hidden name=number[] value="'.$key.'">
      <td>'.$image.$item.' '.$option.'</td>
      <td class="item01">￥'.$price.'</td>
      <td class="item02"><input name="count[]" type="text" value="'.$count.'" class="inputitem01" /></td>
      <td class="item01">￥'.$total.'</td>
    </tr>';
	}
	if(get_option('consumption_tax')){
		$consumption_tax=floor((get_option('consumption_tax')/100)*$total_all);
		$total_all = $total_all+$consumption_tax;
		print '
<tr>
<td colspan="3">'.__('Consumption Tax' ,'WP-OliveCart').'</td>
<td class="item01">￥'.$consumption_tax.'</td>
</tr>';
  }
	
		print '
<tr>
    <td colspan="3">'.__('Total' ,'WP-OliveCart').'</td>
    <td class="item01">￥'.$total_all.'</td>
</tr>
';
}
else {
print '
<tr> 
<td colspan="4">'.__('Your Shopping Cart is Empty' ,'WP-OliveCart').'</td>
</tr>
';
}
?>
</table>

</form>
<div id="submit">
<p><input type="submit" value="<?php _e('Update' ,'WP-OliveCart'); ?>" onClick="document.Form4.submit();" /> 
<input type="submit" value="<?php _e('Empty your cart' ,'WP-OliveCart'); ?>" onClick="document.Form2.submit();" />
<input type="submit" value="<?php _e('Go to Checkout' ,'WP-OliveCart'); ?>" onClick="location.href =('<?php echo $url;?>?page_id=<?php echo get_option('cart_page_id');?>&step=3&sid=<?php echo $sid;?>')" /></p>
</div>

