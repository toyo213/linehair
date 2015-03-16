
			
			jQuery(document).ready(function () {
					jQuery('.accordion .accordion-toggle').each(function () {
					jQuery(this).html('<span class="plus">+</span>' + jQuery(this).text());
				});
				jQuery('.accordion a').on('click', function () {
					if (jQuery(this).children('.plus').text() === '+') {
						jQuery(this).children('.plus').text('-');
						jQuery(this).css({
							'color': '#3F82A9',
							'font-weight': 'bold'		
						});
						jQuery('.accordion a').not(this).children('.plus').text('+');
						jQuery('.accordion a').not(this).css({
							'color': '#666'
						});
						jQuery('.in').collapse("hide").removeClass("in");
					} else {
						jQuery(this).children('.plus').text('+');
						jQuery(this).css({
							'color': '#666',
							'font-weight': 'normal'
						});
						
					}
				});
			});																				
