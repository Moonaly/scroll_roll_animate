<?php
function scroll_brands($atts) {
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
		/*display: flex;*/
		display: inline-block;
		align-items: center;
		/*transition: all .1s linear;*/
		transition: width .1s 
	}
	.sa_item, .arrow_img {
		max-width: 180px;
	}
	.sa_right {
		display: inline-block;
		vertical-align: middle;
		text-align: right;
		background: #D5DFFF;
		border-radius: 0 130px 130px 0;
		transition: width .1s 
	}
	.brands-bx{
	    display:inline-block;
	    -webkit-transition: width .1s; 
	    transition: width .1s;
	    vertical-align:middle;
	}
	.brands-bx img{
		padding: 0px 1em;
	}
	.sa_right {
		min-width: 480px;
	}
	@media only screen and (max-width: 767px) {
		.sa_right {
			min-width:100px;
			max-height:70px;
			height:100%;
		}	
		.brands-bx img {
			max-width:100px;
			width:100%;
		}
		.sa_item, .arrow_img {
			max-height:70px;
		}
	}	
</style>

<div class="instruction-content">
	<div class="contentscroll" id="scrollElement">
		<div class="scoll_animation-wrapper">
			<div class="sa_right" style="">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/blue_arrow.png" class="arrow_img">
			</div>
			<div class="brands-bx">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/brand01.png" class="sa_item brandimg">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/brand02.png" class="sa_item brandimg">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/brand03.png" class="sa_item brandimg">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/brand04.png" class="sa_item brandimg">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/brand05.png" class="sa_item brandimg">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/brand06.png" class="sa_item brandimg">
			</div>
		</div>
	</div>
</div>

<script>
	var elems = document.querySelectorAll('.sa_item');
	var width_ele = document.querySelector('.sa_right');
	var startScrollElement = document.querySelector('#start-scroll');

	window.addEventListener('scroll', function() {
		var scroll = window.pageYOffset;
		if (scroll > startScrollElement.offsetTop - 800) {
			var rotate_deg = window.scrollY * 0.55;
			//var add_width =  -500 + window.scrollY * 0.13;
			// var add_width = (window.scrollY/30) * 150;

			if( jQuery(window).width() > 1200){
				// var add_width = -500 + window.scrollY * 0.13;
				var add_width = (window.scrollY - startScrollElement.offsetTop + 450 ) * 0.18;
			} else if( jQuery(window).width() > 992 && jQuery(window).width() <= 1200){
			    var add_width = (window.scrollY - startScrollElement.offsetTop + 500 ) * 0.18;
				// var add_width = -450 + window.scrollY * 0.2;
			} else {
				// var add_width = -400 + window.scrollY * 0.18;
				var add_width = (window.scrollY - startScrollElement.offsetTop + 600 ) * 0.18;
			}

			width_ele.style.width = add_width + '%';
			elems.forEach(function(elem) {
				elem.style.transform = 'rotate(' + rotate_deg + 'deg)';
			});
		}
	});

</script>

<?php
	return ob_get_clean();
}
add_shortcode('scroll_brands','scroll_brands');