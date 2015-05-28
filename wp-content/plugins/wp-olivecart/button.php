<?php
if( is_admin() ) {new Cart_button();}

class Cart_button {
    function __construct() {
		add_action('admin_print_footer_scripts',  array($this, 'et_add_quicktag2'));
		add_action('admin_print_footer_scripts',   array($this, 'et_add_quicktag1'));
		add_filter( "admin_footer", array($this, 'onAdminFooter' ));
		add_filter( "admin_head", array($this, 'onAdminHeader' ));
    }
	function et_add_quicktag1() {
		 global $post_type;
		if($post_type !='cart'){
   ?>
   <script type="text/javascript">
        QTags.addButton('ed_tag_cart','<?php _e('Cart button','WP-OliveCart');?>',WpMyPluginInsertShortCode,'','', '<?php _e('Add to Cart','WP-OliveCart');?>');
    </script>
        <?php
        }
}

function et_add_quicktag2() {
		global $post_type;
		if($post_type =='cart'&&!get_option('auto_cart_add_button')){
?>
	<script type="text/javascript">
		QTags.addButton('ed_tag_cart2', '<?php _e('Add to Cart button','WP-OliveCart');?>', '<!--cart_button-->', '');
	</script>
<?php
}
}



function canAddQuickTagButton()
{
	return ( strpos( $_SERVER[ "REQUEST_URI" ], "post.php"     ) ||
			 strpos( $_SERVER[ "REQUEST_URI" ], "post-new.php" ) ||
			 strpos( $_SERVER[ "REQUEST_URI" ], "page-new.php" ) ||
			 strpos( $_SERVER[ "REQUEST_URI" ], "page.php"     ) 
			);
}
function cartAddCss()
{
	return ( strpos( $_SERVER[ "REQUEST_URI" ], "admin.php"     ) ||
			 strpos( $_SERVER[ "REQUEST_URI" ], "edit.php" )
			);
}

function onAdminFooter()
{
	if( $this->canAddQuickTagButton() )
	{
		$pluginDirUrl = '../wp-content/plugins/wp-olivecart/';
		echo '<script type="text/javascript" src="' . $pluginDirUrl . 'js/quicktag.js"></script>'."\n";
	}

}

function onAdminHeader()
{

	if( $this->cartAddCss() )
	{
		$pluginDirUrl = '../wp-content/plugins/wp-olivecart/';
		echo '<link rel="stylesheet" href="' . $pluginDirUrl . 'css/import.css" />'."\n";
		echo '<script type="text/javascript" src="' . $pluginDirUrl . 'js/cart_admin.js"></script>'."\n";
	}
}

}
?>
