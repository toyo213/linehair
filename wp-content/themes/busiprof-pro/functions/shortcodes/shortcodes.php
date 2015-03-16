<?php
//get shortcodes pop-up editor == in the dashboard only, would be silly to load on the front end
if(defined('WP_ADMIN') && WP_ADMIN ) {	require_once('shortcode_popup.php'); }

/*--button--*/
add_shortcode('button', 'button_shortcode');
function button_shortcode( $atts,$content = null ){
   $atts = shortcode_atts(
    array('style' => '',
      	'size' => 'small',		
		'target'=> 'self',
		'url' => '#',
		'textdata' => 'Button'),
      $atts );
	  
	$size = $atts['size'];
	$style = $atts['style'];	
	$url = $atts['url'];
	$target = $atts['target'];	
	$target = ($target == 'blank') ? ' target="_blank"' : '';
	$style = ($style) ? ' '.$style : '';
	$out = '<a' .$target. ' class="' .$style.' '. $size.'  " href="' .$url. '" target="' .$target. '">' .do_shortcode($content). '</a>';
	return $out;
}



/*---------------- heading ----------------*/
add_shortcode( 'heading', 'heading_shortcode' );
function heading_shortcode( $atts, $content = null  ) {
	extract( shortcode_atts(
		array(
			'title' => __('Heading Title', 'busi_prof'),
			'heading_style' => 'h1',		
      	), $atts ));
	
    $heading_style=$atts['heading_style'];
	$title=$atts['title'];
	$out='';
	$out.='<'.$heading_style.' class="heading'.$heading_style.'">'.$title.'</'.$heading_style.'><br>';
	return $out;
}

/*-----------Tabs short code-----------*/

if (!function_exists('tabgroup')) {
	function tabgroup( $atts, $content = null ) {
		$tabs_style = $atts['tabs_style'];
		if($tabs_style=='Vartical'){ $tabs_style='tabbable tabs-left'; }
		  else{ $tabs_style='tabbable'; }

		// Extract the tab titles for use in the tab shortcode
		preg_match_all( '/tabs_title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }		
		$output = '';
	
		if( count($tab_titles) )
		{	$output .= '<div class="'.$tabs_style.'">
			        <ul class="nav nav-tabs" >';			
			$count=0;
			foreach( $tab_titles as $tabs_title )
			{	if($count==0)
				$output .= '<li class="active" style="list-style:none;"><a data-toggle="tab" href="#'.str_replace(' ', '_', $tabs_title[0]).'">'.$tabs_title[0].'</a></li>';
				else
				$output .= '<li class="" style="list-style:none;"><a data-toggle="tab" href="#'.str_replace(' ', '_', $tabs_title[0]).'">'.$tabs_title[0].'</a></li>';
				$count++;
			}			
		    $output .= '</ul><div class="tab-content" style=" border-radius: 4px 4px 4px 4px;border: 1px solid #dddddd;padding: 12px 12px 12px;" >';
		    $output .= do_shortcode( $content );			
		}		
		$output .= '</div></div>';
		return $output;
	}
	add_shortcode( 'tabgroup', 'tabgroup' );
}
/***************** tab shortcode ******************/
add_shortcode( 'tabs', 'tabs_shortcode' );	
function tabs_shortcode( $atts, $content = null )
{	$atts = shortcode_atts(array(
	'tabs_title' => 'This is tabs heading',
	'tabs_text' => 'Description',
	'tabs_style'=> 'style'
	), $atts );
	
	$tabs_title = $atts['tabs_title'];
	$tabs_text = $atts['tabs_text'];
	
	$out='<div id="'.str_replace(' ', '_', $tabs_title).'" class="tab-pane"> <p>'.$tabs_text.'</p>'.do_shortcode( $content ).'</div>';

	return $out;		
}


/* --------------- list shortcodes -----------------------*/
add_shortcode( 'list', 'list_shortcode_unorder' );
function list_shortcode_unorder( $atts, $content = null  ) {
	extract( shortcode_atts(
		array(
			'list_style' => __('1', 'busi_prof'),
		     'list_type'=>__('order','busi_prof'),
      	), $atts ));

    $list_style=$atts['list_style'];
	$list_type=$atts['list_type'];
    
	if($list_type=='unorder'){ 
		$output='';
		$output='<ul class="'.$list_style.'" >';
		$output .= do_shortcode( $content );
		$output.='</ul>';
		return $output;
	} else	{
	$output='';
	$output='<ul class="typo-integer">';
	$output .= do_shortcode( $content );
	$output.='</ul>';	
	return $output;
	}
}

function list_shortcodes( $atts, $content = null ) {
	extract( shortcode_atts( array(	'list_text' => ''), $atts ) );
	$list_text=$atts['list_text'];
	$output='<li>'.$list_text.'</li>';
	return $output;
}
add_shortcode('list_item', 'list_shortcodes');
	
/*--------------- Accordion -----------------------*/
add_shortcode( 'accordion', 'accordion_shortcode' );
function accordion_shortcode( $atts, $content = null  ) {
   return '<div id="accordion1" class="accordion"><div class="accordion-group">' . do_shortcode($content) . '</div></div>';
}

/*--------------- Accordion -----------------------*/
add_shortcode( 'accordion_section', 'accordion_section_shortcode' );
function accordion_section_shortcode( $atts, $content = null  ) {
    extract( shortcode_atts( array( 'title' => 'Title', 'id' =>'acc-id'), $atts ) );
   $title1 = str_replace(' ', '_', $title);
	$title1	   = preg_replace('~[^A-Za-z\d\s-]+~u', 'wbr', $title1);
   return ' <div class="accordion-heading"><a  href="#'. $title1 .'" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">'. $title .'</a></div>
	<div class="accordion-body collapse" id="'. $title1 .'" style="height: 0px;">
	<div class="accordion-inner">' . do_shortcode($content) . '</div></div>';
}

/*-----------Alert short code-----------*/
add_shortcode( 'alert', 'alert_shortcode' );
function alert_shortcode( $atts, $content = null ){
    $atts = shortcode_atts(
    array(
      	'alert_heading' => 'Please enter alert heading',     
		'alert_text' => 'Please enter text in alert text',
		'alert_style'=>'',
		'alert_color'=>'af706f'
		),$atts );
	$alert_heading = $atts['alert_heading'];
	$alert_text = $atts['alert_text'];
	$alert_style = $atts ['alert_style'];
	$alert_color = $atts ['alert_color'];
	$out='<div class="'.$alert_style.'"><button data-dismiss="alert" class="close" type="button" style="color:#'.$alert_color.'" >x</button>
	<strong>'.$alert_heading.'</strong>&nbsp;&nbsp;'.$alert_text. do_shortcode($content).'</div>';
	return $out;
}
	
/*--------------- Testimonial -----------------------*/
add_shortcode( 'testimonial', 'testimonial_shortcode' );
function testimonial_shortcode( $atts, $content = null  ) {
	extract( shortcode_atts( array('by' => '','image' => ''), $atts ) );
	
	$testimonial_content = '';
	$testimonial_content .= '	<div class="media testimonial_features_mn_row2"><div class="testimonial_features_mn_cols1 pull-left">
	<img  style="width: 40px; height: 40px;" src="'. $image .'"><br><a href="#" class="text-center">'. $by .'</a>
	</div><div class="media-body"><p style="margin-right:5px;">';
	$testimonial_content .= $content;
    $testimonial_content .= '</p></div></div><br>';
	return $testimonial_content;
}

/*------------ Blockquote --------------------------*/
add_shortcode( 'blockquote', 'blockquote_shortcode' );
function blockquote_shortcode( $atts, $content = null  ) {

	extract( shortcode_atts( array('by' => '','style' => ''), $atts ) );
	$style = $atts['style'];
	if($style=='style1'){
	$blockquote_content = '';
	$blockquote_content .= '<div class="block_quote_mn_con1" style="margin-bottom:10px;"><span><img src="'. get_template_directory_uri() .'/images/features_ic3.png" /></span><p style="margin-right:5px;">'.$content.'</p></div>';
	return $blockquote_content;
	}
	else {
	$blockquote_content = '';
	$blockquote_content .= '<span class="block_quote_mn_con_ic" ><img src="'. get_template_directory_uri() .'/images/features_ic3.png" /></span><p class="block_quote_mn_con" >'.$content.'<img src="'. get_template_directory_uri() .'/images/features_ic4.png" /></p>';
	return $blockquote_content;
	}
}

/*----------------- HR ---------------------*/
add_shortcode( 'hr', 'hr_shortcode' );
function hr_shortcode( $atts, $content = null ){
	extract(shortcode_atts(array('style' => '','margin_top' => '','margin_bottom' => ''), $atts ));	
	return '<div class="clear"></div><hr class="'.$style.'" style="margin-top: '.$margin_top.'; margin-bottom:'.$margin_bottom.';" />';
}

/*----------------- HR ---------------------*/
add_shortcode( 'portfolio', 'portfolio_shortcode' );
function portfolio_shortcode( $atts, $content = null ){
	extract(shortcode_atts(array('type' => 'portfolio', 'column' => 4), $atts ));
		$posts_per_page = 4;
		$span = 6;
		if($column == 2) {	$span = 6; 	}
		if($column == 3) {	$span = 4; 	}
		if($column == 4) {	$span = 3;	}		
		$posts_per_page =$column*2;		
		global $paged;
		$paged = $paged ? $paged : 1;				
		$args = array(
					'post_type' => 'busiprof_portfolio',
					'posts_per_page' => $posts_per_page,
					'paged' => $paged
				);					
			global $portfolio;
			$portfolio = new WP_Query( $args );			
			echo "<div class='row' id='shortcode_port'>";			
			if( $portfolio->have_posts() )
			{	while ( $portfolio->have_posts() ) : $portfolio->the_post();
				?>
				<div class="span<?php echo $span; ?> port_cols_mn">
					<?php if(has_post_thumbnail()):?>
					<?php  $post_thumbnail_id = get_post_thumbnail_id();
						 $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );	 ?>
						<a class="hover_thumb" rel="lightbox[group]" href="<?php echo $post_thumbnail_url; ?>"><?php the_post_thumbnail('portfolio-2c-thumb'); ?></a> 
					<?php endif; ?>
					<?php 	if(get_post_meta( get_the_ID(),'portfolio_link', true )) 
						{ $portfolio_link=get_post_meta( get_the_ID(),'portfolio_link', true ); }
						else { $portfolio_link = get_post_permalink(); } ?>
						
					<h3><a href="<?php echo $portfolio_link; ?>" <?php if(get_post_meta( get_the_ID(),'portfolio_target', true )) { echo "target='_blank'"; } ?> ><?php echo the_title(); ?></a></h3>
					<p><?php echo  get_post_meta( get_the_ID(),'portfolio_description', true ); ?></p>
				</div>
				<?php 	endwhile;  ?>
				<?php $count_posts_2c = wp_count_posts('busiprof_portfolio')->publish;
				if($count_posts_2c > 4) {
					$Webriti_pagination = new Webriti_pagination();
					$Webriti_pagination->Webriti_page($paged, $portfolio);
				} 
				wp_reset_postdata();
			} 
			?>
			<style>
				div#shortcode_port > *:nth-child(<?php echo $column; ?>n+1) {
					margin-left:0px;
				}				
			</style>
			</div>
<?php } ?>