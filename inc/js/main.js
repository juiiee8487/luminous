// the main js file

//responsive menu toggle
jQuery(document).ready(function($) {
		
	jQuery(".menu-trigger").click(function() {
		
		jQuery(".menu-mob").slideToggle(400, function() {
		jQuery(this).toggleClass("nav-expanded").css('display', '');
		
		});
			
	});
	
});