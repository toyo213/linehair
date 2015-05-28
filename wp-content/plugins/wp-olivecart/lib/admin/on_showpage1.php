		
		<div class="wrap">
		<h2><?php echo $this->title; ?></h2>
		<?php echo $this->message; ?>
		<form name="Form" id="addlink" method="post" onSubmit="<?php echo $this->check; ?>">
		<input type=hidden value="<?php echo $this->action; ?>" name="action" id="action">
		<input type=hidden value="<?php echo $_REQUEST[id]; ?>" name="id">
		<?php wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false ); ?>
		<?php wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false ); ?>
		<div id="poststuff" class="metabox-holder has-right-sidebar : ">
		<div id="side-info-column" class="inner-sidebar">
		<?php do_meta_boxes($this->pagehook, 'side',$field_value); ?>
		</div>
		<div id="post-body" class="has-sidebar">
		<div id="post-body-content" class="has-sidebar-content">
		<?php do_meta_boxes($this->pagehook, 'normal',$field_value); ?>
		</div>
		</div>
		<br class="clear"/>
		</div>
		</div></form>
		<!-- end poststuff -->
		<script type="text/javascript">
		//<![CDATA[
		jQuery(document).ready( function($) {
			// close postboxes that should be closed
			$('.if-js-closed').removeClass('if-js-closed').addClass('closed');
			// postboxes setup
			postboxes.add_postbox_toggles('<?php echo $this->pagehook; ?>');
		});
		//]]>
		</script>
