<?php
new AddCartMetaTable;
class AddCartMetaTable {
	public function __construct() {
		global $wpdb;
	//Create a custom table
		add_action( 'add_meta_boxes', array($this, 'wp_olivecart_metabox'));
		$this->table_name = $wpdb->prefix . 'cart_meta';
	}
	function wp_olivecart_metabox( $post ) {
		add_meta_box('product_name',__('Item Title' ,'WP-OliveCart'), array($this, 'product_name'), 'cart','normal', 'high');
		add_meta_box('product_number',__('Item Number' ,'WP-OliveCart'), array($this, 'product_number'), 'cart', 'normal', 'high');
		add_meta_box('product_button_option', __('Item Option' ,'WP-OliveCart'), array($this, 'product_button_option'), 'cart','normal', 'high');
		#add_meta_box('product_edit', __('Item Information' ,'WP-OliveCart'),  array($this, 'product_edit'), 'cart', 'normal', 'high');
	}
	function my_meta_read(){
		#wp_nonce_field( plugin_basename( __FILE__ ), $this->table_name );
		global $post;
		global $wpdb;
		$get_meta = $wpdb->get_results(
			$wpdb->prepare( "SELECT * FROM ".$this->table_name. " WHERE post_id = %d", $post->ID )
		);
		$get_meta = isset($get_meta[0]) ? $get_meta[0] : null;
		$out['item_title'] 			= isset($get_meta->item_title)		 	? $get_meta->item_title : null;
		$out['item_number'] 		= isset($get_meta->item_number) 		? $get_meta->item_number : null;
		$item_option_name 			= isset($get_meta->item_option_name) 	? $get_meta->item_option_name : null;
		$item_option_stock 			= isset($get_meta->item_option_stock) 	? $get_meta->item_option_stock : null;
		$item_option_price 			= isset($get_meta->item_option_price) 	? $get_meta->item_option_price : null;
		#$item_option_charge 		= isset($get_meta->item_option_charge) 	? $get_meta->item_option_charge : null;
		$out['item_information'] 	= isset($get_meta->item_information) 	? $get_meta->item_information : null;
		$out['item_option_name'] 	= explode (":",$item_option_name);
		$out['item_option_stock'] 	= explode (":",$item_option_stock);
		$out['item_option_price'] 	= explode (":",$item_option_price);
		$out['item_option_charge'] 	= explode (":",$item_option_charge);
		return $out;
	}
	function product_name() {
		 $in = $this->my_meta_read();
		?>
<div class="inside">
<input type="hidden" name="olivecart_submit" value="1">
<p> <input name="item_title" id="item_title" value="<?php echo $in['item_title'];?>" type="text"  class="cartitem" /></p>
<p><?php _e('Example: Nifty blogging software','WP-OliveCart');?></p>
</div>
		<?php
	}
	function product_number() {
		 $in = $this->my_meta_read();
		?>
<div class="inside">
<input name="item_number" id="item_number" value="<?php echo $in['item_number'];?>" type="text"  class="cartitem" />
<p><?php _e('Example: <code>ab-123432-3334</code>','WP-OliveCart');?> </p>
</div>
		<?php
	}
	function product_button_option($field_value) {
		$in 				= $this->my_meta_read();
		$title				= get_option('cart_button_other_option1');
		#$option_max			= get_option('option_max');
		#if(!$option_max){	$option_max=5;	}
	?>
	
<div class="inside">
<script language="JavaScript">
<!--
    //var i = 1;
    var option_array1 = new Array();
    var option_array2 = new Array();
    var option_array3 = new Array();
    <?php
    $i=2;
    	foreach ($in['item_option_price'] as $key=>$value){
    		if($key == 0) {continue;}
			echo 'option_array1['.$i.']="'.$in['item_option_name'][$key].'";
			';
			echo 'option_array2['.$i.']="'.$in['item_option_stock'][$key].'";
			';
			echo 'option_array3['.$i.']="'.$in['item_option_price'][$key].'";
			';
			$i++;
		}
	?>

    window.onload = function(){
        ci=1;
    	while (ci < option_array3.length-1) {
            ci++;
        // Tbody get document id element
        var mybody=document.getElementById("histTablebody");
        // create 
        var mycurrent_row=document.createElement("TR");
            mycurrent_row.setAttribute("id","histrow"+ci);
            // create TD node
        var mycurrent_cell=document.createElement("TD");
            //create form node
        var mycurrent_form=document.createElement("INPUT");
            mycurrent_form.setAttribute("type","TEXT");
            mycurrent_form.setAttribute("name","item_option_name[]");
            mycurrent_form.setAttribute("value",option_array1[ci]);
            mycurrent_form.setAttribute("id", "item_option_name"+ ci);
  　        // add to td sell
    　  	mycurrent_cell.appendChild(mycurrent_form);
	　　	// add td sell
			mycurrent_row.appendChild(mycurrent_cell);
             // -------
             // create TD node
            mycurrent_cell=document.createElement("TD");
             //create form node
            mycurrent_form=document.createElement("INPUT");
            mycurrent_form.setAttribute("type","TEXT");
            mycurrent_form.setAttribute("name","item_option_stock[]");
            mycurrent_form.setAttribute("value",option_array2[ci]);
            mycurrent_form.setAttribute("id", "item_option_stock" + ci);
            // add to td sell
            mycurrent_cell.appendChild(mycurrent_form);
			// add td sell
			mycurrent_row.appendChild(mycurrent_cell);
            // -------
            // Create TD sell
            mycurrent_cell=document.createElement("TD");
            // Create form sell
            mycurrent_form=document.createElement("INPUT");
            mycurrent_form.setAttribute("type","TEXT");
            mycurrent_form.setAttribute("name","item_option_price[]");
            mycurrent_form.setAttribute("value",option_array3[ci]);
            mycurrent_form.setAttribute("id", "item_option_price" + ci);
            // add form sell
            mycurrent_cell.appendChild(mycurrent_form);
            //create form sell
            // Add to td sell
            mycurrent_row.appendChild(mycurrent_cell);
             // -------
        // add to  TR sell  for TBODY sell
        	mybody.appendChild(mycurrent_row);
        	
        }
        if(ci==1){
            document.post.delrow.disabled=true;
        }

    }
        var hage =    function() {
        ci++;
        
        // Tbody get document id element
        var mybody=document.getElementById("histTablebody");
        // create 
        var mycurrent_row=document.createElement("TR");
            mycurrent_row.setAttribute("id","histrow"+ci);
        // Create TD node
        var mycurrent_cell=document.createElement("TD");
        //create form node
        var mycurrent_form=document.createElement("INPUT");
            mycurrent_form.setAttribute("type","TEXT");
            mycurrent_form.setAttribute("name","item_option_name[]");
            mycurrent_form.setAttribute("value","");
            mycurrent_form.setAttribute("id", "item_option_name"+ ci);
			// add to td sell
            mycurrent_cell.appendChild(mycurrent_form);
			// add td sell
            mycurrent_row.appendChild(mycurrent_cell);
            // -------
			// Create TD node
            mycurrent_cell=document.createElement("TD");
			//create form node
            mycurrent_form=document.createElement("INPUT");
            mycurrent_form.setAttribute("type","TEXT");
            mycurrent_form.setAttribute("name","item_option_stock[]");
            mycurrent_form.setAttribute("value","");
            mycurrent_form.setAttribute("id", "item_option_stock" + ci);
			// add to td sell
            mycurrent_cell.appendChild(mycurrent_form);
			// add td sell
            mycurrent_row.appendChild(mycurrent_cell);
            // -------
            // Create TD sell
            mycurrent_cell=document.createElement("TD");
            // Create form sell
            mycurrent_form=document.createElement("INPUT");
            mycurrent_form.setAttribute("type","TEXT");
            mycurrent_form.setAttribute("name","item_option_price[]");
            mycurrent_form.setAttribute("value","");
            mycurrent_form.setAttribute("id", "item_option_price" + ci);
            // add form sell
            mycurrent_cell.appendChild(mycurrent_form);
            //create form sell
            // Add to td sell
            mycurrent_row.appendChild(mycurrent_cell);
 
                // -------
   
        // Add to TD for TBODY 
            mybody.appendChild(mycurrent_row);
         // delete button ture
            document.post.delrow.disabled=false;
        

    }
    var hige =    function() {
        var mytable=document.getElementById("histTablebody");
        var removeTable=document.getElementById("histrow"+ci);
        mytable.removeChild(removeTable);
        ci--;
        // if teble count 1
        // delete button false
        if(ci==1){
            document.post.delrow.disabled=true;
        }
        // add button true
        document.post.addrow.disabled=false;
    }

//-->
</script>
<table id="custom_table" summary="custom_table"> 
<tr> 
<th><?php echo $title; ?></th>
<th><?php _e('Stock' ,'WP-OliveCart'); ?></th> 
<th><?php _e('Price' ,'WP-OliveCart'); ?></th>

</tr> 
<tbody  id="histTablebody">
<?php
#for ($i =0; $i < $option_max; $i++){
?>
<tr id="histrow1"> 
<td><input type="text" id="item_option_name0" name="item_option_name[]" value="<?php echo$in['item_option_name'][0];?>" /></td>
<td><input type="text" id="item_option_stock0" name="item_option_stock[]" value="<?php echo $in['item_option_stock'][0];?>" /></td> 
<td><input type="text" id="item_option_price0" name="item_option_price[]" value="<?php echo $in['item_option_price'][0];?>" /></td> 

</tr> 
<?php 

if(!$title){break;}
#}
?>
 </tbody>
</table>
<input class="button-primary" type="button" id=addrow value="<?php _e('Add' ,'WP-OliveCart'); ?>" onClick="hage();">
<input type="button" class="button-primary" id=delrow value="<?php _e('Delete' ,'WP-OliveCart'); ?>" onClick="hige();" >
<p><a href="admin.php?page=olivecart_options#change_option"><?php _e('Change Options Title',  'WP-OliveCart');?> </a></p>

</div>
	<?php
	}

}

new AddCartMetaSaveTable;
class AddCartMetaSaveTable {
	public function __construct() {
		global $wpdb;
		add_action ('save_post', array($this, 'save_meta'));
		$this->table_name = $wpdb->prefix . 'cart_meta';
	}
   function post_check($in){
		  if (is_array($in)) {
        foreach($in as $key=>$value){
			    #$value       = preg_replace("/\,/sm",'',$value);
			    $value       = preg_replace("/:/sm",'',$value);
			    $in[$key] = $value;
		    }
      }
		return $in;
	}
	function save_meta($post_id) {
	if (!isset($_POST['olivecart_submit'])) return; 

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )  return;
 		#if ( !wp_verify_nonce( $_POST['olivecart_submit'], plugin_basename( __FILE__ ) ) )  return;

		global $wpdb;
		global $post;

	//Does not exist in revision
		if ($post->ID != $post_id) return;

		$temp_item_title = isset($_POST['item_title']) ? $_POST['item_title'] : null;
		$temp_item_number = isset($_POST['item_number']) ? $_POST['item_number'] : null;
		$item_option_name = isset($_POST['item_option_name']) ? $_POST['item_option_name'] : null;
		$item_option_stock = isset($_POST['item_option_stock']) ? $_POST['item_option_stock'] : null;
		$item_option_price = isset($_POST['item_option_price']) ? $_POST['item_option_price'] : null;
		$item_option_charge = isset($_POST['item_option_charge']) ? $_POST['item_option_charge'] : null;
		
		$temp_item_title = $this->post_check($temp_item_title);
		$temp_item_number = $this->post_check($temp_item_number);
		$item_option_name = $this->post_check($item_option_name );
		$item_option_stock = $this->post_check($item_option_stock);
		$item_option_price = $this->post_check($item_option_price);
		$item_option_charge = $this->post_check($item_option_charge);
		#$temp_item_information = isset($_POST['item_information']) ? $_POST['item_information'] : null;
		foreach ($item_option_stock as $key=>$value){ 
			$temp_item_option_name.= $item_option_name[$key].':';
			$temp_item_option_stock.= $item_option_stock[$key].':';
			$temp_item_option_price.= $item_option_price[$key].':';
			$temp_item_option_charge.= $item_option_charge[$key].':';
		}
		/*foreach ($item_option_name as $key=>$value){ 
			$temp_item_option_name.= $item_option_name[$key].':';
			$temp_item_option_stock.= $item_option_stock[$key].':';
			$temp_item_option_price.= $item_option_price[$key].':';
			$temp_item_option_charge.= $item_option_charge[$key].':';
		}*/
		$temp_item_option_stock   	= mb_convert_kana($temp_item_option_stock,"a");
		$temp_item_option_price   	= mb_convert_kana($temp_item_option_price,"a");
		#$temp_item_option_price   	= ltrim($temp_item_option_price, '0');
		$temp_item_option_name		= rtrim($temp_item_option_name, ":");
		$temp_item_option_stock		= rtrim($temp_item_option_stock, ":");
		$temp_item_option_price		= rtrim($temp_item_option_price, ":");
		$temp_item_option_charge	= rtrim($temp_item_option_charge, ":");
		$date_array					= getdate();
		$temp_item_post_date		= $date_array['year'].'/'.$date_array['mon'].'/'.$date_array['mday'];
	//Save array to database
		$set_arr = array(
			'item_title'			=> $temp_item_title,
			'item_number' 			=> $temp_item_number,
			'item_option_name' 		=> $temp_item_option_name,
			'item_option_stock' 	=> $temp_item_option_stock,
			'item_option_price' 	=> $temp_item_option_price,
			'item_option_charge' 	=> $temp_item_option_charge,
			'item_post_date' 		=> $temp_item_post_date
		);
		$get_id = $wpdb->get_var(
	            	$wpdb->prepare( "SELECT post_id FROM ".$this->table_name."  WHERE post_id = %d", $post_id)
				);
	//Save to database update or insert
		#$where = array( 'ID' => $post_id );
		#$title=$_POST['item_title'];
		#if(isset($title)){ 
			#$wpdb->update( $wpdb->posts, array( 'post_title' => $title,'post_content'=> $temp_item_information ), $where ); 
		#}
		if ($get_id) {
			$wpdb->update( $this->table_name, $set_arr, array('post_id' => $post_id));
		} else {
			$set_arr['post_id'] = $post_id;;
			$wpdb->insert( $this->table_name, $set_arr);
		}
		$wpdb->show_errors();
	}	
}


$olivecart_meta =new OliveCartMetaTable;
class OliveCartMetaTable {
	public function __construct() {
		global $wpdb;
		add_action ('delete_post', array($this, 'dalete_meta'));
		$this->table_name = $wpdb->prefix . 'cart_meta';
	}
	function dalete_meta($post_id) {
		global $wpdb;
		$wpdb->query( $wpdb->prepare( "DELETE FROM ".$this->table_name." WHERE post_id = %d", $post_id) );
	}

	function get_meta($post_id) {
	#return 'test11344';
		#if (!is_numeric($post_id)) return;
		global $wpdb;
		$get_meta = $wpdb->get_results(
						$wpdb->prepare( "SELECT * FROM ".$this->table_name."  WHERE post_id = %d", $post_id)
					);
		return isset($get_meta[0]) ? $get_meta[0] : null;
	}
}

?>