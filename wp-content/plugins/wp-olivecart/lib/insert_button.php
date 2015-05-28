<?php
function get_cart_button(){
		$id=get_the_ID();
	$insertButton= new InsertCartButton;
	$content='<!--cart_button-->';
	if(!$GLOBALS['olive_cart_button'][$id]){
		echo $insertButton->insert_button($content);
	}
}
class InsertCartButton{
	public function __construct() {
		add_filter( 'the_content', array($this,'insert_button' )); 
	}
	function insert_button($content){	
		global $wpdb;
		$table_name 				= $wpdb->prefix . 'cart_meta';
		$id=get_the_ID();
		$cart_add_button_position	= get_option('cart_add_button_position');
		while (1){
		if(preg_match("/(.*)<!--cart_button([0-9a-zA-Z-_]*)-->(.*)/sm",$content,$match)){
			if($match[2] ){
				$items_number=$match[2];
				$query ="SELECT * FROM ".$table_name." where item_number='$items_number'";
				$GLOBALS['olive_cart_button'][$id] =true;	
			}
			elseif(!$GLOBALS['olive_cart_button'][$id] && !$match[2]){
				$query ="SELECT * FROM ".$table_name." where post_id='$id'";
				$GLOBALS['olive_cart_button'][$id] =true;			
				
			}
			
			
			$option1 = get_option('cart_button_other_option1');
			$result =$wpdb->get_results($query);
			
			if(!$result){break;}

			foreach( $result as $row ) {
				$cart_option1		=	explode(':',$row->item_option_name);
				$stock				=	explode(':',$row->item_option_stock);
				$items_number		=	$row->meta_id;
				foreach($stock as $key=>$value){
					if($value or $value==='' or $value=='*'){
				  		$cart_stock[$key] = true; 
				  	}
				 }

  		}
  		if($cart_option1){
  			foreach($cart_option1 as $key=>$value){
  		 		if($stock[$key]==='' || $stock[$key]=='*'){ $stock[$key]=10;} 
  		 		if(isset($stock[$key])){ $item_count[$key]=$stock[$key];  } 
  		
  		 	}
  		}

  		$button_id= rand();
  		$button="\n".'<form name="form1'.$button_id.'" data-ajax="false">';
			if($option1 && $cart_option1[0]){
			$onchange='onChange="change2_'.$button_id.'(this)"';
				$button.='
<div class="cart_option1"  align="'.$cart_add_button_position.'">
'.$option1.'
<select name="selA'.$button_id.'" id="option1_'.$button_id.'" '.$onchange.'>
<option value="">'.__('Select' ,'WP-OliveCart').'</option>
';
				foreach ($cart_option1 as $key=>$value){
					if($item_count[$key]){$button.='<option value="'.$key.'">'.$value.'</option>'."\n";$all_stock=true;}
					else{$button.='<option disabled="disabled">'.$value.'</option>'."\n";}
				}
$button.='
</select>
</div>';
			}
			
			if($cart_stock){
				$button2='';
				$button.='
<div class="cart_count"  align="'.$cart_add_button_position.'">
'.__('Quantity' ,'WP-OliveCart').'：
<select  name="selC'.$button_id.'" id="count_'.$button_id.'">
<option value="">'.__('Select' ,'WP-OliveCart').'</option>
';


$button.='
</select>
</div>
<script type="text/javascript" language="JavaScript">
';
if($cart_option1[0]){
$button.='
var bunruiC'.$button_id.'   = new Array();'."\n";
				foreach ($item_count as $key=>$value){
					$button2='';
					$button.='bunruiC'.$button_id.'["'.$key.'"]  = new Array(';
					for ($f =1; $f <= $value ; $f++){ $button2.='"'.$f.'"'.','; }
					$button2 = rtrim($button2, ",");
					$button.=$button2;
					$button.=');'."\n";
				}
				$button.='
function change2_'.$button_id.'(obj){
  createSelection(form1'.$button_id.'.elements[\'selC'.$button_id.'\'], "'.__('Select' ,'WP-OliveCart').'", bunruiC'.$button_id.'[obj.value], bunruiC'.$button_id.'[obj.value]);
}';
}
else{

$button.='
var bunruiC'.$button_id.'  = new Array(';
				foreach ($item_count as $key=>$value){ 
					$all_stock=true;
					$button2=''; 
					for ($f =2; $f <= $value ; $f++){ $button2.='"'.$f.'"'.','; }
					$button2 = rtrim($button2, ",");
					$button.=$button2;
					$button.=');'."\n";
				}
$button.='
createSelection(form1'.$button_id.'.elements[\'selC'.$button_id.'\'], "1", bunruiC'.$button_id.', bunruiC'.$button_id.');';
}
$button.='
</script>
';
		}
				if($all_stock){
					if(get_option('ssl_url') && $GLOBALS['is_ssl']){ $url=get_option('ssl_url');}
					else{$url=get_option('siteurl');}
					$pluginDirUrl =  $url. "/wp-content/plugins/wp-olivecart/gif/cart.gif";
					$button.='
<div class="cart_button" align="'.$cart_add_button_position.'">
<a href="javascript:void(0)" onclick="postIn(\''.$button_id.'\',\''.$items_number.'\')"/><img border=0 src="'.$pluginDirUrl.'"></a>
</div>
</form>
';				}
				else{
					$button='<div class="cart_button" align="'.$cart_add_button_position.'"><p>'.__('SOLD OUT' ,'WP-OliveCart').'</p></div>'."\n";
				}
				$content=$match[1].$button.$match[3];
				$stock_total=$button=$button2=$cart_stock=$items_number='';
				$item_count=$cart_option1=$cart_option2=$match=array();
			}
			else
			{
				break;
			}
		}
	return $content;
	}
}
?>
