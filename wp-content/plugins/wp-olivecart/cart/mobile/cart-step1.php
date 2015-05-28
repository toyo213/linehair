<?php
	print '
<table id="minicart">
<tr>
<th class="thitem">'.__('Items','WP-OliveCart').'</th>
<th class="thcount"> '.__('Quantity','WP-OliveCart').'</th>
</tr>
';
$personaldata = $GLOBALS['session']->sission_cart();
if ( $personaldata ) {
	foreach ( $personaldata as $key=>$value ) {
		$item		= 	$personaldata[$key]['title'];
		$count		= 	$personaldata[$key]['count'];
		$price		= 	$personaldata[$key]['price'];
		$option		= 	$personaldata[$key]['option'];
		$total		+=	$price*$count;
		print <<<HTML
<tr>
<td class="item">$item $option</td>
<td class="count">$count</td>
</tr>
HTML;
}
		print '
<tr>
<td colspan="2" class="total">'.__('Total:￥','WP-OliveCart').$total.'</td>
</tr>
</tr>
</table>
<p><input type="submit" value="'.__('Checkout' ,'WP-OliveCart').'" onClick="get_cartstep2();" />
</p>

';
}
else{
 print '<tr> <td  colspan="2" class="empty">'.__('Cart is Empty','WP-OliveCart').'</td></tr>';
}

?>
</table>
