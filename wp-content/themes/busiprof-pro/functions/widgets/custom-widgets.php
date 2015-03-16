<?php	
add_action( 'widgets_init', 'busiprof_widgets_init');
function busiprof_widgets_init() {

/*sidebar*/
register_sidebar( array(
		'name' => __( ' Sidebar', 'busi_prof' ),
		'id' => 'sidebar-primary',
		'description' => __( 'The primary widget area', 'busi_prof' ),
		'before_widget' => '<div id="%1$s" class="sidebar_widget widget_link">',
		'after_widget' => '</div><div class="sidebar_seprator"></div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );

register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'busi_prof' ),
		'id' => 'footer-widget-area',
		'description' => __( 'footer widget area', 'busi_prof' ),
		'before_widget' => '<div id="footer_widget_busipro" class="span3">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	
}	                     
?>