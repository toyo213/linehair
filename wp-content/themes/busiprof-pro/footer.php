<?php
/*	*
	* @Theme Name	:	BusiProf
	* @file         :	footer.php
	* @package      :	Busiprof
	* @author       :	Hari Maliya
	* @license      :	license.txt
	* @filesource   :	wp-content/themes/Busiprof/footer.php
*/
?>
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
			<h2><?php _e('店舗情報','busi_prof'); ?></h2>
			<ul>
			<li>ウィッグサロン　Line Hair ラインヘアー</li>
	       		<li>〒070-0033 北海道旭川市3条7丁目          ヨシタケパークビル１階　</li>       
			<li>0166-27-8099 </li>
			</ul>
			</div>		


			<div class="span3"> 
			<h2><?php _e('お買い物'); ?></h2>
			<ul>
                        <li>
			<p><a href="http://linehair.thebase.in/">オンラインショップ</a></p>
			</li>			
			<li>
			<p><a href="http://line-hair.net/free-try-out/">無料お試し</a></p>
			</li>
			<li>
			<p><a href="http://line-hair.net/after-service/">オーダーメード</a></p>
			</li>
                        <li>
			<p><a href="http://line-hair.net/rental-wig/">レンタルウィッグ</a></p>
			</li>
			<li>
			<p><a href="http://line-hair.net/faq/">よくあるご質問</a></p>
			</li>
			<li>
			<p><a href="http://line-hair.net/free-consulting-2/">無料相談</a></p>
			</li>
			<li>
			<p><a href="http://line-hair.net/contact-us/">お問い合わせ</a></p>
			</li>
                        </ul>
                        </div>


			<div class="span3"> 
			<h2><?php _e('事業情報'); ?></h2>
			<ul>
			<li><p><a href="http://line-hair.net/who-we-are/">ラインヘアーとは</a></p></li>
			<li><p><a href="http://line-hair.net/about-us/open-position/">採用情報</a></p></li>
			<li><p><a href="http://line-hair.net/privacy-policy/">プライバシーポリシー</a></p></li>
			</ul>
			</div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&appId=216286761727505&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="span3"> 
<div class="fb-like-box" data-href="https://www.facebook.com/linehairjapan" data-colorscheme="dark" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
</div>


<?php /*
		<div class="span3">
			<h2><?php _e('Twitter','busi_prof'); ?></h2>
				<ul><li>
						<p><?php _e('Check out this great #themeforest Theme','busi_prof'); ?> <a href="#"><?php _e('http://t.co/sYStotrd','busi_prof'); ?></a></p>
						<?php _e('2 hours ago','busi_prof'); ?>
					</li>
					<li>
						<p><?php _e('Check out this great #themeforest Theme','busi_prof'); ?> <a href="#"><?php _e('http://t.co/sYStotrd','busi_prof'); ?></a></p>
						<?php _e('2 hours ago','busi_prof'); ?>
					</li>
				</ul>   
			</div>		
			<div class="span3">
			<h2><?php _e('Flickr Photos','busi_prof'); ?></h2>
				<span><a href="#"><img alt="Flickr Photos" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/photo1.png"></a></span>
				<span><a href="#"><img alt="Flickr Photos" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/photo1.png"></a></span>
				<span><a href="#"><img alt="Flickr Photos" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/photo1.png"></a></span>
				<span><a href="#"><img alt="Flickr Photos" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/photo1.png"></a></span>
				<span><a href="#"><img alt="Flickr Photos" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/photo1.png"></a></span>
				<span><a href="#"><img alt="Flickr Photos" src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/photo1.png"></a></span>
			</div> 

*/ ?>
			<?php /*
			<div class="span3">
				<h2><?php _e('Quick Contact','busi_prof'); ?></h2>
				<form>
					<input class="input-medium span9" type="text" placeholder="User Name">
					<input class="input-medium span9" type="text" placeholder="Email">
					<textarea class="span11" rows="2" placeholder="Message"></textarea>
					<a class="submit_btn" href="#"><?php _e('Submit','busi_prof'); ?></a>
				</form>
			</div>  */ ?>
			<?php } ?>
		
		</div>
	</div>
</div>
<!-- /Widget Section -->

<!-- /Footer Section -->
<?php $current_options=get_option('busiprof_pro_theme_options'); ?>
<div class="footer-section">
	<div class="container">
		<div class="row">
			<div class="span8">
				<p><?php if( $current_options['footer_copyright_text']!='')
					echo $current_options['footer_copyright_text']; 
					else
					 _e('All Rights Reserved by BusiProf. Designed and Developed by','busi_prof');
					 ?>	
			</div>
			<?php if($current_options['footer_social_media_enabled']=='on') { ?>
			<div class="span4">
				<div class="footer_social pull-right">
					<a class="twitter" href="<?php if( $current_options['footer_twitter_link']!='') echo $current_options['footer_twitter_link']; else echo "https://twitter.com/"; ?>">&nbsp;</a>
					<a class="facebook" href="<?php if( $current_options['footer_facebook_link']!='') echo $current_options['footer_facebook_link']; else echo "http://facebook.com/"; ?>">&nbsp;</a>
					<a class="social_new" href="<?php if( $current_options['footer_linkedin_link']!='') echo $current_options['footer_linkedin_link']; else echo "http://in.linkedin.com/"; ?>">&nbsp;</a>
				</div>	
			</div>	
			<?php } ?>
		</div>
	</div>
</div>
<?php  // use custom css
if( $current_options['busiprof_pro_custom_css']!='')
	{
		echo "<style type='text/css'>/***** Busiprof-pro custom css ******/\n".$current_options['busiprof_pro_custom_css']."</style>"; 
	}
?>
<?php wp_footer(); ?> 
<!-- /Footer Section -->
</body>
</html>