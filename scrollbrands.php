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
	display: flex;
    align-items: center;
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
}
.brands-bx img{
    padding: 0px 1em;
}
</style>

<div class="instruction-content">
<div class="contentscroll" id="scrollElement">
<div class="scoll_animation-wrapper">
	<div class="sa_right" style="min-width: 480px">
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
 var add_width =  -500 + window.scrollY * 0.13;
// var add_width = (window.scrollY/30) * 150;
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