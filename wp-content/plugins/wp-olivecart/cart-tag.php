<?php

require_once('../../../wp-config.php');
load_plugin_textdomain( 'WP-OliveCart', false, 'wp-olivecart/languages' );
#if( is_user_logged_in() )
#{
	$page= new Cart_tag_list();
	$page->tag_page_list();
#}

class Cart_tag_list{
	function tablenav_pages() {
		global $wpdb;
		if($_GET['keyword']){
			$key = $_GET['keyword'];
			$key = esc_sql($key);
			$key_prev = '&keyword='.$key; 
		}
		if( isset( $_GET['paged'] ) ){ $paged=$_GET['paged']; }
		else{ $paged = 1; }
		$page_count  = 0;
		$_count      = $this->commodity_list_count();
		$page_max    = 10;
		$start       = 1;
		$end         = 5;
		$total_page  = ceil( $_count / $page_max );
		$page_start  = $paged * $page_max - $page_max+1;
		$page_end    = $paged * $page_max;
		if( $page_end > $_count ) { $page_end=$_count; }
		$this->page_start = $page_start;
		$this->page_end   = $page_end;
		print "<div class=\"tablenav-pages\"><span class=\"displaying-num\"> ${page_start}-${page_end}".__('items','WP-OliveCart')."($_count ".__('total items','WP-OliveCart').")".__('preview','WP-OliveCart')."</span>\n";
		if( $paged > 1) {
			$back_page=$paged-1;
			print "<a class=\"prev page-numbers page-numbers\" href=\"?paged=${back_page}$key_prev\">≪</a>\n";
		}
		if( $paged > 3 ) { $start = $paged-2; $end = $paged+2; }
		if( $end > $total_page ) { $start = $total_page - 4; }
		for ($j=1; $j <= $total_page; $j++) {
			$count++;
			if ( $count < $start ) { continue; }
			elseif ($count > $end ) { break; }
			if( !$_GET['paged'] && $j==1 || $_GET['paged']==$j){
				print "<span class=\"page-numbers current\">$j</span>\n";
			}
			else {
				print "<a class=\"page-numbers\" href=\"?paged=${j}${key_prev}\">$j</a>\n";
			}
		}
		if( $page_end < $_count ) {
			$next_page=$paged+1;
			print "<a class=\"next page-numbers\" href=\"?paged=${next_page}${key_prev}\">≫</a>";
		}
		print '</div>';
	}
	function commodity_list_count() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'cart_meta';
		if($_GET['keyword']){
			$key=$_GET['keyword'];
			$key_prev = '&keyword='.$key; 
				$query ="SELECT * FROM $table_name where item_title like '%$key%'  or item_title like '%$key%'";
			}
			else{
				$query = "SELECT * FROM $table_name ORDER BY post_id DESC";
			}
			$result =$wpdb->get_results($query);
			foreach( $result as $row ) {
			if(!$row->item_title){ continue;}
				#	$number      = explode(':',$row->number);
				#++$setnum[$number[0]];
				#if($setnum[$number[0]]>1){ $this->class[$number[0]]='itemop';continue;}
				$_count++;
			}
		return $_count;
	}
	function tag_page_list() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'cart_meta';
		$button_value=__('Add to Cart','WP-OliveCart');
		if($_GET['keyword']){ $serach='<span class="subtitle">“'.$_GET['keyword'].'” '.__('-Search result','WP-OliveCart').'</span>'; }

?>

<html>
<head>
<script type="text/javascript" src="./js/addtag.js"></script> 
<link rel="stylesheet" href="../../../wp-admin/load-styles.php?c=1&amp;dir=ltr&amp;load=global,wp-admin&amp;" type="text/css" media="all" /> 
<link rel="stylesheet" id="colors-css"  href="../../../wp-admin/css/colors-fresh.css" type="text/css" media="all" /> 
<link rel="stylesheet" href="./css/import.css" />
</head>
<body>
<div id="wrap-tag">
<h2><?php _e('Cart button','WP-OliveCart');echo $serach;?></h2>
<?php echo $this->message;?>
<div id="search-box_item">
<form class="search-form" action="" method="get">
<p>
<input type=hidden value="cart_commodity" name="page">
	<input id="link-search-input" name="keyword" value="<?php echo $_GET[keyword];?>" type="text">
	<input value="<?php _e('Search','WP-OliveCart');?>" class="button" type="submit"></p>
</form>
</div>

<div class="tablenav">
<?php
		if($this->commodity_list_count()) {
			$this->tablenav_pages();
$url = get_option('siteurl');
?>
<div class="clear"></div>

<table class="tag">
	<thead>
	<tr>
	<th scope="col" id="title" class="itemtag-title">  <?php _e('GoodsName',  'WP-OliveCart'); ?></th>
	<th scope="col" id="number" class="itemtag-number"><?php _e('GoodsNumber','WP-OliveCart'); ?></th>
	<th scope="col" id="stock" class="itemtag-source"> <?php _e('Add to Cart','WP-OliveCart'); ?></th>
	</tr>
	</thead>

	<tfoot>
	<tr>
	<th scope="col" class="itemtag-title" ><?php _e('GoodsName',  'WP-OliveCart'); ?></th>
	<th scope="col" class="itemtag-number"><?php _e('GoodsNumber','WP-OliveCart'); ?></th>
	<th scope="col" class="itemtag-source"><?php _e('Add to Cart','WP-OliveCart'); ?></th>
	</tr>
	</tfoot>
	<tbody>
<?php
			if($_GET['keyword']){
				$key=$_GET['keyword']; 
				$query ="SELECT * FROM $table_name where item_title like '%$key%'  or item_number like '%$key%'";
			}
			else{
				$query = "SELECT * FROM $table_name ORDER BY post_id DESC";
			}
			$result =$wpdb->get_results($query);
			foreach( $result as $row ) {
				if(!$row->item_title){ continue;}
				#$number      = explode(':',$row->number);
				#++$setnum[$number[0]];
				#if($setnum[$number[0]]>1){ continue;}
				#$row->number=$number[0];
				$page_count++;
				if ( $page_count < $this->page_start ) { continue; }
				elseif ($page_count > $this->page_end ) { break; }
				
?>
<tr id="post-1" class="alternate author-self status-publish iedit" valign="top">

<td class="itemtag-title"><?php echo $row->item_title; ?></td>
<td class="itemtag-number"><?php echo $row->item_number;?></td>

<td class="itemtag-source"><input value="<?php _e('Insert Button', 'WP-OliveCart'); ?>" class="button" type="submit" onclick="addtag('<?php echo $row->item_number;?>','<?php _e('Add to Cart','WP-OliveCart');?>')"></td>
</tr>
<?php
			}
				print <<<HTML
	</tbody>
</table>
<div class="tablenav">

HTML;
			$this->tablenav_pages();
			print <<<HTML
<br class="clear">
</div>
</form>
HTML;
		}
			else { print '<p>'.__('Not found', 'WP-OliveCart').'</p>';}
			print '</div>';
			print <<<HTML
</div>
</body>
</html>
HTML;
	}



}
?>
