/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/

//var siteThemeURL = themeURL.template_url; <!-- Not being used

/*
 * Register Service Workers
*/
if('serviceWorker' in navigator){
	navigator.serviceWorker
		.register('/sw.js')
		.then(function() {
			console.log('Service Worker Registered!');
		})
		.catch(function(err) {
			console.log(err);
		});
}

/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *	// update the viewport, in case the window size has changed
 *	viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
	jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
} // end function

////////////////////////////////////////////////////////////////////////////////////////////////////////////
(function($,sr){
  // debouncing function from John Hann
  // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
  var debounce = function (func, threshold, execAsap) {
	var timeout;
	return function debounced () {
		var obj = this, args = arguments;
		function delayed () {
		  if (!execAsap){
			func.apply(obj, args);
		 	timeout = null;
		  }
		}
  
		if (timeout){
		  clearTimeout(timeout);
		}
		else if (execAsap){
		  func.apply(obj, args);
		}
  
		timeout = setTimeout(delayed, threshold || 500);
	};
  };
  // smartresize
  jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };
}(jQuery,'smartresize'));
/////////////////////////////////////////////////////////////////////////////////////////////////////////////

//since multiple events can trigger a slider adjustment, we will control that adjustment here
function jbResizeSlider(){
	var $slickSlider = jQuery('.home-posts');
	$slickSlider.find('.slick-slide').height('auto');

	var slickTrack = $slickSlider.find('.slick-track');
	var slickTrackHeight = jQuery(slickTrack).height();

	$slickSlider.find('.slick-slide').css('height', slickTrackHeight + 'px');
}


/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {
	var $mainMenu = $('.main-nav #menu-main');
	var video = document.getElementById("bg-video");

	$(".main-nav .mm-btn").on('click', function(event) {
		event.preventDefault();
		$mainMenu.toggleClass('active');
	});

	$(".main-nav .submenu-toggle").on('click', function(event) {
		event.preventDefault();
		$(this).siblings('.sub-menu').toggleClass('active');
		$(this).children('i.fas').toggleClass('fa-caret-right fa-caret-down');
	});

	$('.home-posts').slick({
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 1,
		responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        slidesToShow: 1,
		      }
		    }
		    // You can unslick at a given breakpoint now by adding:
		    // settings: "unslick"
		    // instead of a settings object
		  ]
	});

	//when the slick slide initializes we want to set all of our slides to the same height
	$('.home-posts').on('setPosition', function () {
		jbResizeSlider();
	});

	/**
	 * Check if video can play, and play it
	 */
	video.addEventListener( "canplay", function() {
		video.play();
	});

  /*
   * Let's fire off the gravatar function
   * You can remove this if you don't need it
  */
  loadGravatars();

}); /* end of as page load scripts */

jQuery(window).smartresize(function($) {
	var wrapWidth = jQuery('#inner-header.wrap').outerWidth();

	if(wrapWidth >= 1024){
		jQuery('#menu-main, .sub-menu').removeClass('active');
	}

	jbResizeSlider();

});
