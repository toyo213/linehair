<?php 
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10); 

add_action('woocommerce_before_main_content', 'webriti_rambo_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'webriti_rambo_wrapper_end', 10);

function webriti_rambo_wrapper_start() {?>
<!-- Header Strip -->
<div class="inner_top_mn">
  <div class="container">
    <div class="row-fluid about_space">
      <h2 class="about_head pull-left">
				<?php  the_title(); ?>
	  </h2>
      <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="search_box">
          <input type="text" class="search_input"   name="s" id="s" placeholder="<?php esc_attr_e( "Search", 'busi_prof' ); ?>" />
		  <input type="button" class="search_btn" value="">
          
        </div>
      </form>
    </div>
  </div>
</div>


<!-- /Header Strip -->
 <div class="container"><div class="row-fluid">
 <div class="<?php if( is_active_sidebar('sidebar-primary')) echo "span8"; else echo "span12";?>">
 <?php } 
function webriti_rambo_wrapper_end() {
if( is_active_sidebar('sidebar-primary')){ echo "</div>"; get_sidebar(); echo "</div></div>"; }
else { echo "</div></div></div>"; } }?>