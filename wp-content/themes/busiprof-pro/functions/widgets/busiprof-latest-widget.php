<?php
add_action( 'widgets_init','busiprof_latest_widget'); 
   function busiprof_latest_widget() { return   register_widget( 'busiprof_latest_widget' ); }

/**
 * Adds busiprof_latest_widget widget.
 */
class busiprof_latest_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'busiprof_latest_widget', // Base ID
			__('Busiprof Latest Blog', 'busi_prof'), // Name
			array( 'description' => __( 'This widget show latest post and comment or popular blog', 'busi_prof' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) { ?>
	
	<?php if($args['id'] == 'sidebar-primary') { ?>
		<div class="sidebar_widget">			
				<ul class="sidebar_tab rec_tab" id="myTab">
				  <li class="active"><a href="#popular" data-toggle="tab"><?php _e("Popular",'busi_prof');?></a></li>
				  <span>|</span>
				  <li><a href="#recent" data-toggle="tab"><?php _e("Recent",'busi_prof');?></a></li>
				  <span>|</span>
				  <li><a href="#comment1" data-toggle="tab"><?php _e("Comment",'busi_prof');?></a></li>
				</ul>				
				<div id="myTabContent" class="tab-content">					
					<div id="popular" class="tab-pane fade active in">
					<?php global $wpdb;
						$pop = $wpdb->get_results("SELECT id,guid,post_date,post_content, comment_count FROM {$wpdb->prefix}posts WHERE post_type='post' AND post_status='publish' ORDER BY comment_count DESC LIMIT 5");
						foreach($pop as $post): ?>
							<div class="row-fluid">						
								<div class="media pull-space">
									  <a href="<?php echo $post->guid; ?>">
										<?php $atts=array('class' => 'media-object img-polaroid'	);?>
									<?php echo get_the_post_thumbnail( $post->id,'post_feature_image_thumb', $atts); ?>								 
									  </a>
									  <div class="media-body">
										<p><?php echo $post->post_content; ?></p>
										<span><?php echo date("M j,Y",strtotime($post->post_date)) ; ?></span>
									  </div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<div id="recent" class="tab-pane fade">
					<?php 
						$args = array( 'post_type' => 'post','posts_per_page' => 4) ; 	
						query_posts( $args );
						if(query_posts( $args ))
						{	while(have_posts()):the_post();
							{ ?><div class="row-fluid">						
									<div class="media pull-space">
										  <a href="<?php the_permalink(); ?>">
											 <?php $defalt_arg =array('class' => "media-object img-polaroid");?>
										<?php if(has_post_thumbnail()){?>
										<?php the_post_thumbnail('post_feature_image_thumb',$defalt_arg);
										} else { ?>	
										<img class="media-object img-polaroid" style="width: 80px; height: 60px; max-width: none;"  src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/testimonial_img.png">
										<?php } ;?>
										  </a>
										  <div class="media-body">
											<p><?php the_content() ;?></p>
											<span><?php echo get_the_date('M j,Y');?></span>
										  </div>
									</div>
								</div><?php
							} endwhile; 
						} ?>						
					</div>					
					<div id="comment1" class="tab-pane fade">					
						<?php	$args = array('number' => '5');
						$comments = get_comments($args);
						foreach($comments as $comment) 
						{	$pop1 = $wpdb->get_results("SELECT guid  FROM {$wpdb->prefix}posts WHERE id='$comment->comment_post_ID' ORDER BY comment_count DESC LIMIT 5");
							foreach($pop1 as $post1) { ?>
							<div class="row-fluid" style="border-bottom: 1px dotted #B4BFC5;margin-bottom: 0;padding: 15px 0;">
								<div class="media pull-space-no">
									<a  href="<?php echo $post1->guid; ?>">
										<?php echo get_avatar( $comment, 70 ); ?>
									</a>
									<div class="media-body">
										<p><?php  echo( $comment->comment_author . '<br />' . $comment->comment_content ); ?>
										</p>
										<span><?php  $cm_date = $comment->comment_date; echo date("M j,Y",strtotime($cm_date)); ?> 
										</span>
									</div>
								</div>
							</div><?php 
							}  
						}  ?>									
					</div>					
				</div>
	</div>	<?php } ?>
	
	<?php if($args['id'] == 'footer-widget-area') { ?>
		<div id="footer_widget_busipro" class="span3">			
				<ul class="sidebar_tab rec_tab" id="myTab">
				  <li class="active"><a href="#popular-item" data-toggle="tab"><?php _e("Popular",'busi_prof');?></a></li>
				  <span>|</span>
				  <li><a href="#recent-item" data-toggle="tab"><?php _e("Recent",'busi_prof');?></a></li>
				  <span>|</span>
				  <li><a href="#comment-item" data-toggle="tab"><?php _e("Comment",'busi_prof');?></a></li>
				</ul>				
				<div id="myTabContent" class="tab-content">					
					<div id="popular-item" class="tab-pane fade active in">
					<?php global $wpdb;
						$pop = $wpdb->get_results("SELECT id,guid,post_date,post_content, comment_count FROM {$wpdb->prefix}posts WHERE post_type='post' AND post_status='publish' ORDER BY comment_count DESC LIMIT 5");
						foreach($pop as $post): ?>
							<div class="row-fluid">						
								<div class="media pull-space">
									  <a href="<?php echo $post->guid; ?>">
										<?php $atts=array('class' => 'media-object img-polaroid'	);?>
									<?php echo get_the_post_thumbnail( $post->id,'post_feature_image_thumb', $atts); ?>								 
									  </a>
									  <div class="media-body">
										<p><?php echo $post->post_content; ?></p>
										<span><?php echo date("M j,Y",strtotime($post->post_date)) ; ?></span>
									  </div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<div id="recent-item" class="tab-pane fade">
					<?php 
						$args = array( 'post_type' => 'post','posts_per_page' => 4) ; 	
						query_posts( $args );
						if(query_posts( $args ))
						{	while(have_posts()):the_post();
							{ ?><div class="row-fluid">						
									<div class="media pull-space">
										  <a href="<?php the_permalink(); ?>">
											 <?php $defalt_arg =array('class' => "media-object img-polaroid");?>
										<?php if(has_post_thumbnail()){?>
										<?php the_post_thumbnail('post_feature_image_thumb',$defalt_arg);
										} else { ?>	
										<img class="media-object img-polaroid" style="width: 80px; height: 60px; max-width: none;"  src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/testimonial_img.png">
										<?php } ;?>
										  </a>
										  <div class="media-body">
											<p><?php the_content() ;?></p>
											<span><?php echo get_the_date('M j,Y');?></span>
										  </div>
									</div>
								</div><?php
							} endwhile; 
						} ?>						
					</div>					
					<div id="comment-item" class="tab-pane fade">					
						<?php	$args = array('number' => '5');
						$comments = get_comments($args);
						foreach($comments as $comment) 
						{	$pop1 = $wpdb->get_results("SELECT guid  FROM {$wpdb->prefix}posts WHERE id='$comment->comment_post_ID' ORDER BY comment_count DESC LIMIT 5");
							foreach($pop1 as $post1) { ?>
							<div class="row-fluid" style="border-bottom: 1px dotted #B4BFC5;margin-bottom: 0;padding: 15px 0;">
								<div class="media pull-space-no">
									<a  href="<?php echo $post1->guid; ?>">
										<?php echo get_avatar( $comment, 70 ); ?>
									</a>
									<div class="media-body">
										<p><?php  echo( $comment->comment_author . '<br />' . $comment->comment_content ); ?>
										</p>
										<span><?php  $cm_date = $comment->comment_date; echo date("M j,Y",strtotime($cm_date)); ?> 
										</span>
									</div>
								</div>
							</div><?php 
							}  
						}  ?>									
					</div>					
				</div>
	</div>	<?php } ?>
	
	<?php		
	}	
} // class Foo_Widget
?>