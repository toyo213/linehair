<!-- Widget Section -->	

<div class="widget_section">
	<div class="container">
		<div class="row-fluid" id="footer_widget">		
				<?php if ( is_active_sidebar( 'footer-widget-area' ) )
						{?>
					  <div id="busiprof_area">
						   <?php dynamic_sidebar( 'footer-widget-area' ); ?>
					  </div>
				<?php }else { ?>
                
			<div class="span3">
				<h2>About Us</h2>
				<p>We are a group of passionate designers and developers who really love to create awesome wordpress themes with amazing support and cooles video documentations...</p>
			</div>
						
			<div class="span3">
				<h2>Twitter Updates</h2>
				<ul>
					<li>
						<p>Check out this great #themeforest Theme' <a href="#">http://t.co/sYStotrd</a></p>
						2 hours ago
					</li>
					<li>
						<p>Check out this great #themeforest Theme' <a href="#">http://t.co/sYStotrd</a></p>
						2 hours ago
					</li>
				</ul>
			</div>
			
			<div class="span3">
				<h2>Flickr Photos</h2>
				<span><a href="#"><img alt="Flickr Photos" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/photo1.png"></a></span>
				<span><a href="#"><img alt="Flickr Photos" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/photo1.png"></a></span>
				<span><a href="#"><img alt="Flickr Photos" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/photo1.png"></a></span>
				<span><a href="#"><img alt="Flickr Photos" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/photo1.png"></a></span>
				<span><a href="#"><img alt="Flickr Photos" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/photo1.png"></a></span>
				<span><a href="#"><img alt="Flickr Photos" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/photo1.png"></a></span>
			</div>
			
			<div class="span3">
				<h2>Quick Contact</h2>
				<form>
					<input class="input-medium span9" type="text" placeholder="User Name">
					<input class="input-medium span9" type="text" placeholder="Email">
					<textarea class="span11" rows="2" placeholder="Message"></textarea>
					<a class="submit_btn" href="#">Submit</a>
				</form>
			</div>
			<?php } ?>
		
		</div>
	</div>
</div>

<!-- /Widget Section -->