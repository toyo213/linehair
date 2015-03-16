<?php
/*
* @Theme Name	:	spicy-Pro
 * Add custom taxonomies
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function webriti_portfolio_taxonomy() {
    register_taxonomy('portfolio_categories', 'spicy_portfolio',
    array(  'hierarchical' => true,
			'show_in_nav_menus' => false,
            'label' => 'Portfolio Categories',
            'query_var' => true));
	//Default category id		
	//$defualt_tex_id = get_option('custom_texo_spicy');
	if((isset($_POST['action'])) && (isset($_POST['taxonomy']))){		
		wp_update_term($_POST['tax_ID'], 'portfolio_categories', array(
		  'name' => $_POST['name'],
		  'slug' => $_POST['slug']
		));
		//update_option('custom_texo_spicy', $defualt_tex_id);
	} 
	else 
	{
	$myterms = get_terms( 'portfolio_categories',array('hide_empty'=>false) );
		if(empty($myterms)){
			$defaultterm=wp_insert_term('Show All','portfolio_categories', array('description'=> 'Default Category','slug' => 'show-all'));
			update_option('spicy_webriti_default_term_id', $defaultterm['term_id']);
		}
	}
	//update category
	if(isset($_POST['submit']) && isset($_POST['action']) )
	{	wp_update_term($_POST['tag_ID'], 'portfolio_categories', array(
		  'name' => $_POST['name'],
		  'slug' => $_POST['slug'],
		  'description' =>$_POST['description']
		));
	}
	// Delete default category
	if(isset($_POST['action']) && isset($_POST['tag_ID']) )
	{	if(($_POST['tag_ID'] == $defualt_tex_id) &&$_POST['action']	 =="delete-tag")
		{	
			delete_option('custom_texo_spicy'); 
		} 
	}	
	
}
add_action( 'init', 'webriti_portfolio_taxonomy' );
?>