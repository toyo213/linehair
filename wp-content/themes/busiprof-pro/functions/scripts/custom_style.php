<?php $current_options=get_option('spicy_pro_options'); 
if($current_options['enable_custom_typography']=="on")
{
?>
<style> 
/****** custom typography *********/
 .hc_post_area p,
 .hc_blog_wrapper p
 {
	font-size:<?php echo $current_options['general_typography_fontsize'].'px'; ?> ;
	font-family:<?php echo $current_options['general_typography_fontfamily']; ?> ;
	font-style:<?php echo $current_options['general_typography_fontstyle']; ?> ;
	line-height:<?php echo ($current_options['general_typography_fontsize']+5).'px'; ?> ;
	
}
/*** Menu title */
.navbar .navbar-nav > li > a{
	font-size:<?php echo $current_options['menu_title_fontsize'].'px' ; ?> !important;
	font-family:<?php echo $current_options['menu_title_fontfamily']; ?> !important;
	font-style:<?php echo $current_options['menu_title_fontstyle']; ?> !important;
}
/*** post and Page title */
.hc_blog_wrapper h2 a{
	font-size:<?php echo $current_options['post_title_fontsize'].'px'; ?>;
	font-family:<?php echo $current_options['post_title_fontfamily']; ?>;
	font-style:<?php echo $current_options['post_title_fontstyle']; ?>;
}
/*** service title */
.hc_service_section h3
{
	font-size:<?php echo $current_options['service_title_fontsize'].'px'; ?>;
	font-family:<?php echo $current_options['service_title_fontfamily']; ?>;
	font-style:<?php echo $current_options['service_title_fontstyle']; ?>;
}

/******** portfolio title ********/
.hc_portfolio_caption h3{ 
	font-size:<?php echo $current_options['portfolio_title_fontsize'].'px'; ?>;
	font-family:<?php echo $current_options['portfolio_title_fontfamily']; ?>;
	font-style:<?php echo $current_options['portfolio_title_fontstyle']; ?>;
}
/******* footer widget title*********/
.hc_footer_widget_title{
	font-size:<?php echo $current_options['widget_title_fontsize'].'px'; ?>;
	font-family:<?php echo $current_options['widget_title_fontfamily']; ?>;
	font-style:<?php echo $current_options['widget_title_fontstyle']; ?>;
}
.hc_sidebar_widget_title h2{
	font-size:<?php echo $current_options['widget_title_fontsize'].'px'; ?> !important;
	font-family:<?php echo $current_options['widget_title_fontfamily']; ?>;
	font-style:<?php echo $current_options['widget_title_fontstyle']; ?>;
}
.footer-callout-section h2{
	font-size:<?php echo $current_options['calloutarea_title_fontsize'].'px'; ?>;
	font-family:<?php echo $current_options['calloutarea_title_fontfamily']; ?>;
	font-style:<?php echo $current_options['calloutarea_title_fontstyle']; ?>;
}
.footer-callout-section p{
	font-size:<?php echo $current_options['calloutarea_description_fontsize'].'px'; ?>;
	font-family:<?php echo $current_options['calloutarea_description_fontfamily']; ?>;
	font-style:<?php echo $current_options['calloutarea_description_fontstyle']; ?>;
}
.footer-callout-section a {	
	font-size:<?php echo $current_options['calloutarea_purches_fontsize'].'px'; ?>;
	font-family:<?php echo $current_options['calloutarea_purches_fontfamily']; ?>;
	font-style:<?php echo $current_options['calloutarea_purches_fontstyle']; ?>;
}
</style>
<?php } ?>