<script type="text/javascript">
jQuery(function() {
	jQuery('#our_client_product').carouFredSel({
		responsive: true,
		auto: {	pauseOnHover: 'immediate' },
		scroll : {  items : 1,
				  duration : <?php echo $client_strip_slide_speed; ?>,
				  timeoutDuration : 1
				},				
		items: {
			width: 150,
			height:'variable',
			visible: {
				min: 1,
				max: <?php echo $client_strip_total; ?>
			}
		}
	});
});
</script>