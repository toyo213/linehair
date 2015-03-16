<?php   get_header();
//get_template_part('index', 'bannerstrip');
 ?>
 <div class="inner_top_mn">
	<div class="container">
		<div class="row-fluid about_space">
			<h2 class="about_head pull-left"><?php  _e( "Category  Archives:", 'busi_prof'); echo single_cat_title( '', false ); ?><br /><span><?php bloginfo('description');?></span></h2>
			<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="search_box">
					<input type="text"name="s" placeholder=<?php _e( 'Search', 'busi_prof' ); ?> class="search_input" id="appendedInputButton">
					<input type="button" class="search_btn" value="">
				</div>
			</form>
		</div>
	</div>
</div>

<div class="container"><!-- Main --> 
	<div class="row-fluid">
		<div class="<?php if( is_active_sidebar('sidebar-primary')) { echo 'span8'; } else { echo 'span12'; } ?> blog_left">
			<?php  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$category_id=get_query_var('cat');
				$args = array( 'post_type' => 'post','paged'=>$paged,'cat' => $category_id);
				$post_type_data = new WP_Query( $args );
				while($post_type_data->have_posts()):
				$post_type_data->the_post();
					global $more;
					$more = 0; ?>
				<div class="blog_section">
					<h2 class="blog_section_title">
						<a href="<?php the_permalink(); ?>"title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h2>
					<?php if(has_post_thumbnail()):?>
					<div class="blog_section_img">
						<a href="<?php the_permalink(); ?>"title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
					</div>
					<?php endif;?>  
					<div class="blog_con_mn"><p><?php the_content( __( 'Read More' , 'busi_prof' ) );?></p></div>
				</div>	
					
			<?php endwhile;?>
                    	<?php	$Webriti_pagination = new Webriti_pagination();
					$Webriti_pagination->Webriti_page($paged, $post_type_data);		?>			
		</div>
		<?php get_sidebar();?>
	</div>
</div>
<?php  get_footer(); 