$(function(){
	
	$('#options').change(function(e) {
		window.location = "http://localhost/projet/site/listing.php?orderby=" + $(this).val();
		//http://localhost/projet/site/listing.php?orderby=asc;
		//http://localhost/projet/site/listing.php?orderby=desc;
	});	
});				
// JavaScript Document