<?php
function scroll_animation($atts) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'postid' => get_the_ID(),
		), 
		$atts
	);
	// Attributes in var
	$post_id = $atts['postid']; 
	ob_start();
	?>
	<style>
		.scoll_animation-wrapper {
			white-space: nowrap;
			overflow: hidden;
			padding: 20px 0;
		}
		.sa_item, .arrow_img {
			max-width: 180px;
		}
		.sa_right {
			display: inline-block;
			vertical-align: middle;
			text-align: right;
			background: #ddd;
			border-radius: 0 100px 100px 0;
		}
	</style>
	
	<div class="instruction-content">
	<h4>Scroll Animation</h4>
	<div class="code">
		<div style="height: 100vh;"></div>
	</div>
	<div class="content" style="background: #cc1212;" id="scrollElement">
		<div class="scoll_animation-wrapper">
			<div class="sa_right" style="min-width: 200px">
				<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2023/07/pokeball.png" class="arrow_img">
			</div>
			<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2023/07/pokeball.png" class="sa_item">
			<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2023/07/pokeball.png" class="sa_item">
			<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2023/07/pokeball.png" class="sa_item">
			<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2023/07/pokeball.png" class="sa_item">
			<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2023/07/pokeball.png" class="sa_item">
		</div>
	</div>
	<div class="code">
		<div style="height: 100vh;"></div>
	</div>
	
	<script>
	var elems = document.querySelectorAll('.sa_item');
	var width_ele = document.querySelector('.sa_right');
	jQuery(window).scroll(function (event) {
		var scroll = jQuery(window).scrollTop();
		if(scroll > jQuery('#scrollElement').offset().top - 800) {
			window.addEventListener('scroll', function() {
				var rotate_deg = window.scrollY * 0.25;
				var add_width = 180 + window.scrollY * 0.25;
				width_ele.style.width = add_width+'px';
				elems.forEach(function(elem) {
					elem.style.transform = 'rotate('+rotate_deg+'deg)'; ; 
				});
			});
		}
	});
	</script>
	
	<?php
	return ob_get_clean();
		}
add_shortcode('scroll_animation','scroll_animation');