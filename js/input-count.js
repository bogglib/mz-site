jQuery(document).ready(function($) {
	$('.glyphicon-plus').click(function(event) {
		var sum = +$(this).prev().val() + 1;
		$(this).prev().val(sum);
	});
	$('.glyphicon-minus').click(function(event) {
		var sum = $(this).next().val();
		if (sum>1) {
			$(this).next().val(sum-1);
		};
	});
});