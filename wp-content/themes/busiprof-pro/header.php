<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>   
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">  
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>" charset="<?php bloginfo('charset'); ?>" />
		<meta name="generator" content="WordPress <?php bloginfo('version'); ?>"/>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php 	//get theme options here
			$busiprof_current_options=get_option('busiprof_pro_theme_options'); 
			
			if($busiprof_current_options['upload_image_favicon']!='')
			{ ?><link rel="shortcut icon" href="<?php  echo $busiprof_current_options['upload_image_favicon']; ?>" /> 
				<?php } else {?>	
				<link   rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/images/fevicon.icon">
			<?php } ?>
				<link rel="profile" href="http://gmpg.org/xfn/11" />
				<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
			<?php wp_head(); ?>
			<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
</head>
<body <?php body_class(); ?>>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=216286761727505&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


	<div class="container">
		<div class="navbar" style="margin-bottom: 0px;">
			<div class="navbar-inner">
				<div class="container">
					<a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>						
					<?php 	if($busiprof_current_options['upload_image']!='') {
						if($busiprof_current_options['height'])
						{ $height=$busiprof_current_options['height']; }else { $height="40"; }
						
						if($busiprof_current_options['width'])
						{ $width=$busiprof_current_options['width']; }else { $width="115"; }
					?>
				
					<a href="<?php echo home_url( '/' ); ?>" class="brand">
					<img  src="<?php echo $busiprof_current_options['upload_image']; ?>" alt="Logo" class="logo_imgae"  style="height:<?php echo $height; ?>px;width:<?php echo $width; ?>px;"/>
					</a>
					<?php   } else { ?>
					<a href="<?php echo home_url( '/' ); ?>" class="brand">
					<img src="<?php echo get_template_directory_uri();?>/images/logo.png" class="logo_imgae">
					</a>
					<?php } ?>
					<div class="nav-collapse collapse navbar-responsive-collapse">
						<?php	wp_nav_menu( array(  
									'theme_location' => 'primary',
									'container'  => 'nav-collapse collapse navbar-inverse-collapse',
									'menu_class' => 'nav',
									'fallback_cb' => 'busiprof_fallback_page_menu',
									'walker' => new busiprof_nav_walker()
									));	?> 
					</div>			<!-- /.nav-collapse -->
				</div>
			</div><!-- /navbar-inner -->
		</div>
	</div>