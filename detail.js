$(function () {
	$('.imgdetail img').click(function() {
		$('#main-image').attr('src', $(this).attr('src'));
	});	
});
