(function($){



/* ***** When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar  ***** */
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  var cyb_scroll_position = 0;
  cyb_scroll_position = $(this).scrollTop();
  if (prevScrollpos > currentScrollPos) {
  		if ($('#wpadminbar').length){
			if (cyb_scroll_position > 220) {
				document.getElementById("navbar-scroll").style.top = "32px";
			} else {
				document.getElementById("navbar-scroll").style.top = "-152px";
			}
		} else {
			if (cyb_scroll_position > 220) {
				document.getElementById("navbar-scroll").style.top = "0";
			} else {
				document.getElementById("navbar-scroll").style.top = "-130px";
			}
		}
  } else {
  		if ($('#wpadminbar').length){
    		document.getElementById("navbar-scroll").style.top = "-152px";
		} else {
    		document.getElementById("navbar-scroll").style.top = "-130px";
		}
  }
  prevScrollpos = currentScrollPos;
}




// kick off the polyfill!
var scroll = new SmoothScroll('a[href*="#"]', {
  speed: 700
});
var easeInQuint = new SmoothScroll('[data-easing="easeInQuint"]', {easing: 'easeInQuint'});

}(jQuery));