jQuery(document).ready(function($) {
	$('.btn-confirm').click(function(event) {
		$(this).css({"background-image":"linear-gradient(#fff, #d6d6d6)","color":"#111017","border":"1px solid #222"});
		$(this).html("added to cart");
	});
});