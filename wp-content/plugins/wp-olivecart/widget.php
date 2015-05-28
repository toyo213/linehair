<?php
/**Shopping Cart System WP Olive-Cart.
 * @link http://www.wp-olivecart.com/
 * @copyright 2008-2013 Olive-Design.
 */
 
add_action('widgets_init', create_function('', 'return register_widget("CartWidget2");'));
add_action('widgets_init', create_function('', 'return register_widget("CartWidget3");'));

class CartWidget3 extends WP_Widget {

	function CartWidget3() {
		 $widget_ops= array( 'description'=>__('Item Categories List','WP-OliveCart')) ;
		 parent::WP_Widget(false, __('Item Categories','WP-OliveCart'),$widget_ops);
		 wp_reset_query();
	}
	function widget($args, $instance) {
 		extract( $args );
 		$title = apply_filters('widget_title', $instance['title']);
 		$arg = array(
			'orderby' 		=> $orderby,
			'show_count' 	=> $show_count,
			'pad_counts' 	=> $pad_counts,
			'hierarchical'	=> $hierarchical,
			'taxonomy' 		=> 'product_category',
			'title_li'		=> ''
		);
			?>
        <?php echo $before_widget; ?>
        <?php if ( $title ){ echo $before_title . $title . $after_title;} ?>
      <div id="sidecatlist" class="side-widget">
        <ul>
          <?php wp_list_categories($arg); ?>
        </ul>
      </div>
	  <?php echo $after_widget;
	  }
	 function update( $new_instance, $old_instance ) {
	  	$instance['title']= strip_tags(stripslashes($new_instance['title']));
		return $instance;
	}
 	function form($instance) {
 		$title= esc_attr($instance['title']);
 		?>
 		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?>
 		 <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
 <?php
	}
}

// class CartWidget2
class CartWidget2 extends WP_Widget {
    function CartWidget2() {
		$widget_ops= array( 'description'=>__('Shopping Cart Preview','WP-OliveCart')) ;
        parent::WP_Widget(false, $name = __('Olive Cart Mini Cart','WP-OliveCart'),$widget_ops);	
    }

    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $ajax = $instance['ajax'];

        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
                  <?php if(!$ajax){ echo '<div id="maincart">'; apply_filters('mini_cart', $main); echo '</div>';}
                        else {echo '<div id="maincart_ajax"></div>'; }
                  ?>
              <?php echo $after_widget; ?>
        <?php
    }

    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    function form($instance) {				
        $title = esc_attr($instance['title']);
        $ajax = $instance['ajax'];
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"  /></label></p>


<p><input class="checkbox" id="<?php echo $this->get_field_id('ajax'); ?>" name="<?php echo $this->get_field_name('ajax'); ?>" value="1" type="checkbox" <?php if($ajax == 1){echo ' checked';} ?>> <label for="<?php echo $this->get_field_id('ajax'); ?>" ><?php _e('use ajax','WP-OliveCart')?></label></p>
          
        <?php 
    }

} 
?>
