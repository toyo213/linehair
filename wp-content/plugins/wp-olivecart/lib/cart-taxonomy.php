<?php
/**Shopping Cart System WP Olive-Cart.
 * @link http://www.wp-olivecart.com/
 * @copyright 2008-2013 Olive-Design.
 */
 
$OliveCartItemList=new OliveCartItemList();
add_filter( 'manage_edit-cart_columns',	 array($OliveCartItemList ,'manage_posts_columns' ));
add_action( 'manage_posts_custom_column', array($OliveCartItemList,'add_column'), 10, 2 );
add_action( 'contextual_help', 'add_help_text', 10, 3 );

function add_help_text($contextual_help, $screen_id, $screen) { 
	$help_message		=	new help_message;
    $contextual_help	=	$help_message->message() ;
  return $contextual_help;
}

class OliveCartItemList{
	function manage_posts_columns($columns) {
		$columns['items_title']		= __('Item Title' ,'WP-OliveCart');
		$columns['items_number']	= __('Item Number' ,'WP-OliveCart');
		$columns['thumbnail']		= __('Thumbnail');
		$columns['date']			= __('Date');
		unset($columns['comments']);
		unset($columns['date']);
		return $columns;
	}
	function add_column($column_name,$post_id) {
		global $wpdb;
		//get custom field value
		$this->table_name = $wpdb->prefix . 'cart_meta';
		$mylink           = $wpdb->get_row( "SELECT * FROM ".$this->table_name. " WHERE post_id = '$post_id'" );
		if( $column_name == 'items_title' ) {
			$stitle = $mylink->item_title;
		}
		if( $column_name == 'items_number' ) {
			$stitle = $mylink->item_number;
		}
		//get thumbnail 
    	if ( 'thumbnail' == $column_name) {
    		$thum = get_the_post_thumbnail($post_id, array(50,50), 'thumbnail');
		}
    	if ( isset($stitle) && $stitle ) { echo esc_attr($stitle);}
		else if ( isset($thum) && $thum ) { echo $thum;}
		else { echo __('None');}
	}
}

class OliveCart_Taxonomy {
    function __construct() {
     	add_action('admin_print_scripts',array($this, 'admin_print_scripts'), 20);
        add_action('admin_head',array($this,'plugin_header'));
        add_action('init',array($this, 'my_work_init'));
    }
    function mymeta_setup(){
	 	$meta_arr['item_title'] 		= 'true';
	 	$meta_arr['item_number'  ]		= 'true';
	 	$meta_arr['item_option_name']	= 'false';
	 	$meta_arr['item_option_stock']	= 'false';
	 	$meta_arr['item_option_price'] 	= 'false';
	 	$meta_arr['myeditor']			= 'true';
	 	return $meta_arr;
	 }
    function manage_posts_columns($columns) {
        $columns['category'] = __('Item Category' ,'WP-OliveCart');
        $columns['thumbnail'] = __('Thumbnail','WP-OliveCart');
        unset($columns['comments']);
        unset($columns['date']);
        $columns['date'] = __('Date');
        return $columns;
	}
	function add_column($column_name, $post_id) {
		//get custom field value
    	if( $column_name == 'category' ) {
        	$stitle = get_the_term_list($post_id, 'product_category'); 
			$stitle  = preg_replace("/<[^>]+>(.+)<\/a>/","$1",$stitle );
		}
		//get thumbnail
    	if ( 'thumbnail' == $column_name) {
        	$thum = get_the_post_thumbnail($post_id, array(50,50), 'thumbnail');
		}
    	if ( isset($stitle) && $stitle ) { echo esc_attr($stitle);}
    	else if ( isset($thum) && $thum ) { echo $thum;}
		else { echo __('None');}
	}
	function my_work_init() {
		$labels = array(
			'name' 				=> __('Items Page List' ,'WP-OliveCart'),
			'singular_name'		=> __('Items List' ,'WP-OliveCart'),
			'add_new' 			=> __('Add new' ,'WP-OliveCart'),
			'add_new_item' 		=> __('Add new item' ,'WP-OliveCart'),
			'edit_item' 		=> __('Edit item' ,'WP-OliveCart'),
			'new_item' 			=> __('Add new item' ,'WP-OliveCart'),
			'view_item' 		=> __('View item' ,'WP-OliveCart'),
			'search_items' 		=> __('Search items' ,'WP-OliveCart'),
			'not_found' 		=> __('Not found' ,'WP-OliveCart'),
			'not_found_in_trash'=> __('Not found in trash' ,'WP-OliveCart'),
			'parent_item_colon' => ''
		);
		$args = array(
			'labels'			=> $labels,
			'public'			=> true,
			'publicly_queryable'=> true,
			'show_ui'			=> true,
			'query_var'			=> true,
			'rewrite'			=> true,
			'capability_type'	=> 'post',
			'hierarchical' 		=> false,
			'menu_position' 	=> 100,
			#'supports' => array('title','editor','thumbnail','custom-fields','trackbacks','author','excerpt','comments')
			'supports' => array('title','editor','thumbnail')
		);
		register_post_type('cart',$args);
		flush_rewrite_rules( false );
		//Category type
  		$args = array(
  			'label' => __('Item Category' ,'WP-OliveCart'),
  			'public' => true,
  			'show_ui' => true,
  			'hierarchical' => true
  		);
  		register_taxonomy('product_category','cart',$args);
  	}
  	function plugin_header() {
        global $post_type;
    ?>
    <?php
    $url=get_option('siteurl');
	$pluginDirUrl =  $url. "/wp-content/plugins/wp-olivecart/css/"; 
    if (($_GET['post_type'] == 'cart') || ($post_type == 'cart')) : ?>
   <link rel="stylesheet" href="<?php echo $pluginDirUrl;?>import.css" type="text/css" />
    <?php endif; ?>
        <?php
	}
    function admin_print_scripts() {

?>
<script>
function inputCheck( str ,message){
    var Seiki=/^[*-_,a-z\d]+$/i;
    if(str.match(Seiki)){
      return true;
    }else{
      alert(message);
      return false;
    } 
}
 jQuery("#publish").live("click", function(e){
		if(!document.getElementById('item_title').value ){
			alert('<?php _e('Missing item title. Please correct and try again',  'WP-OliveCart');?>');
		    jQuery("#ajax-loading").hide();
			jQuery("#publish").removeClass("button-primary-disabled");
			jQuery("#save-post").removeClass("button-disabled");
			document.getElementById('item_title').focus();
			return false;
		}
		else if( inputCheck( document.getElementById('item_number').value,'<?php _e('Missing item number. Please correct and try again',  'WP-OliveCart');?>') == false ){
		     jQuery("#ajax-loading").hide();
			 jQuery("#publish").removeClass("button-primary-disabled");
			 jQuery("#save-post").removeClass("button-disabled");
			 document.getElementById('item_number').focus();
			 return false;
		}
		else if( inputCheck( document.getElementById('item_option_price0').value,'<?php _e('Missing item price. Please correct and try again',  'WP-OliveCart');?>') == false ){
		    jQuery("#ajax-loading").hide();
			jQuery("#publish").removeClass("button-primary-disabled");
			jQuery("#save-post").removeClass("button-disabled");
			document.getElementById('item_option_price0').focus();
			return false;
		}

 });

</script>
<?php
    }
}
new OliveCart_Taxonomy();