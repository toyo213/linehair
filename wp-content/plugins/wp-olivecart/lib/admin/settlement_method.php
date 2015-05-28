<?php 

$chage_array= explode('<>',$field_value[$method_type]->set02);
$chage1= explode(',',$chage_array[0]);
$chage2= explode(',',$chage_array[1]);
$chage3= explode(',',$chage_array[2]);
$chage4= explode(',',$chage_array[3]);
?>

<table class="wp-list-table fixed posts cartinfo"> 
<input type=hidden name="in_id[]" value="<?php echo $field_value[$method_type]->id;?>"> 
<thead>
<tr> 
<th colspan="2"><?php _e('Title','WP-OliveCart');?></th> 
</tr> 
</thead>
<tr>
<td colspan="2"><input type="text" value="<?php echo $field_value[$method_type]->set01;?>" name="set01[]" class="cartinputitem01" /> 
<a href="?page=olivecart_end_message&id=<?php echo $field_value[$method_type]->id;?>"><?php _e('End Message Setup','WP-OliveCart');?></a> 
 | <a href="?page=olivecart_auto_email&id=<?php echo $field_value[$method_type]->id;?>"><?php _e('Auto Reply Email Setup','WP-OliveCart');?></a> 
</td>
<thead>
<tr> 
<th colspan="2"><?php _e('Charge','WP-OliveCart');?></th> 
</tr> 
</thead>
<tr> 
<td><?php echo $From;?><input value="<?php echo $chage1[0];?>" name="chage1_1[]" type="text" class="cartinputitem01" /><?php echo $en;?></td> 
<td><?php echo $Postage;?><input type="text" value="<?php echo $chage1[1]; ?>" name="chage1_2[]" class="cartinputitem02" /><?php echo $en;?></td> 
</tr>
<tr> 
<td><?php echo $From;?><input value="<?php echo $chage2[0];?>" name="chage2_1[]" type="text" class="cartinputitem01" /><?php echo $en;?></td> 
<td><?php echo $Postage;?><input type="text" value="<?php echo $chage2[1]; ?>" name="chage2_2[]" class="cartinputitem02" /><?php echo $en;?></td> 
</tr>

<thead>
<tr> 
<th colspan="2"><?php _e('Comment','WP-OliveCart');?></th> 
</tr> 
</thead>
<tr>
<td colspan="2"><textarea name="set03[]" id="textArea1" class="cartinputitem03"><?php echo $field_value[$method_type]->set03;?></textarea></td> 
</tr> 
</table>
