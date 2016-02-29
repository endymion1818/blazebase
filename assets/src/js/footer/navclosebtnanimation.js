// adds a class to the nabar-toggle class so that the CSS animation will run
jQuery.noConflict();
(function( $ ) {
  $(function() {
	  $(".navbar-toggle").on("click", function () {
		    $(this).toggleClass("active");
	  });
    });
})(jQuery);