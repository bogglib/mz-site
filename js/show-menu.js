jQuery(document).ready(function($) {
	$('.show-menu').click(function(event) {
		$(this).next().slideToggle();
	});
});