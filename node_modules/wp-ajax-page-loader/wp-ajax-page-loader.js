// ==== WP AJAX PAGE LOADER 0.2.1 ==== //

// WP AJAX Page Loader documentation: https://github.com/synapticism/wp-ajax-page-loader
// Based on Ajaxinate: https://github.com/synapticism/ajaxinate
// With some help from: http://www.problogdesign.com/wordpress/load-next-wordpress-posts-with-ajax/

// Global namespace object; inspiration for the design of this via Ryan Florence: http://ryanflorence.com/authoring-jquery-plugins-with-object-oriented-javascript/
var PG8 = {};

(function($, document, window, undefined){
  'use strict';

  // Exit early if WordPress script variables aren't available
  if (typeof PG8Data === 'undefined') {
    return;
  }

  // Initialize HTML5-History-API polyfill with this single line
  var location = window.history.location || window.location;

  // Constructor function
  var PageLoader = this.PageLoader = function(opts){
    this.thisLink = location.href;
    this.nextLink = PG8Data.nextLink;
    this.thisPage = parseInt(PG8Data.startPage, 10);
    this.nextPage = this.thisPage + 1;
    this.maxPages = parseInt(PG8Data.maxPages, 10);
    this.maxedOut = 0; // A flag to determine whether all pages have been loaded
    this.opts     = $.extend({}, $.fn.ajaxPageLoader.defaults, opts);
    this.content  = $(this.opts.content);

    // Initialize page loader only if there are pages to load
    if (this.nextPage <= this.maxPages) {
      this.init();
    }
  };



  // Prototype functionality
  PageLoader.prototype = {
    init: function(){

      // Wrap all the children of the main element in a way that is consistent with how content is loaded
      this.content.children().wrapAll('<div id="content-page-'+this.thisPage+'" class="clear" data-href="'+this.thisLink+'"></div>');

      // Create the first (place)holder div that content will be loaded into
      this.holder();

      // Bind event handlers
      this.handler();

      // Initialize spinner
      this.spinner();
    },



    // Create a placeholder; abstracted into a function for DRYness
    holder: function(){
      this.content.append('<div id="content-page-' + this.nextPage + '" class="clear" data-href="'+this.nextLink+'"></div>');
    }, // end holder()



    // Event handlers
    handler: function(){
      var
        self    = this,
        $window = $(window);

      // Bind to click events on the body element to ensure compatibility with other forms of DOM manipulation we may be doing
      $('body').on('click', self.opts.next, function(event){

        // Are there more posts to load? This has to be checked again as nextPage increments
        if (self.nextPage <= self.maxPages) {

          // Cancel page request
          event.preventDefault();

          // Invoke spinner
          $(this).parents('nav:first').before($('#spinner').show());

          // Load content
          self.loader(self.nextPage, self.nextLink);
        }
      }); // end .on('click')



      // Watch scroll position and change URL accordingly
      $window.on('scroll', this.content, function(event){

        // Clear previously set timer
        clearTimeout($.data(this, 'pushTimer'));
        clearTimeout($.data(this, 'infinTimer'));

        // Manage push state based on scroll position; keeps the URL updated wherever the window position is
        $.data(this, 'pushTimer', setTimeout(function() {

          // Setup some useful variables including info about the top-most page
          var
            firstPage = self.content.children(':first'),
            firstTop  = firstPage.offset().top,
            firstLink = firstPage.data('href'),
            winTop    = $window.scrollTop();

          // Push state if the top of the window is above the first page
          if ( winTop <= firstTop ) {
            self.pusher(firstLink);
          } else {

            // Monitor the children of the main content selector; should be a bunch of divs representing each page of content
            self.content.children().each(function(){
              var
                $this   = $(this),
                top     = $this.offset().top - self.opts.scrollOffset,
                bottom  = $this.outerHeight()+top;

              // Push state if the top of the window falls into the range of a given page
              if ( top <= winTop && winTop < bottom ) {
                self.pusher($this.data('href'));
              }
            }); // end each()
          } // end if
        }, self.opts.pushDelay)); // end $.data()

        // Infinite scroll, a lazy (yet smart) implementation
        if ( self.maxedOut === 0 && self.opts.infinScroll === true ) { // Only bother with this if there are more pages to load AND infinite scroll is on
          $.data(this, 'infinTimer', setTimeout(function() {
            var
              $document       = $(document),
              scrollHeight    = $document.height(),
              scrollPosition  = $window.height() + $window.scrollTop(), // Position of the bottom of the window
              scrollLastPage  = self.content.children(':last').offset().top, // Bottom of the content area
              scrollDiff      = scrollHeight - scrollPosition; // How close to the absolute bottom of the document

            // Trigger a click when the bottom of the window is just below the contents of the last page
            // But not the absolute bottom; we'd like to be able to reach the footer if we can!
            if ( scrollPosition > scrollLastPage + self.opts.scrollOffset && scrollPosition <= scrollLastPage + self.opts.scrollOffset + self.opts.infinOffset && scrollDiff >= self.opts.infinFooter ) {
              $(self.opts.next).trigger('click');
            }
          }, self.opts.infinDelay)); // end $.data()
        } // end infinite scroll
      }); // end $window.on('scroll')
    }, // end handler()



    // Conditionally initialize spinner div; degrades gracefully if spin.js not found
    spinner: function(){
      if ( $.isFunction(window.Spinner) ) {
        this.content.after('<div id="spinner" style="position: relative;"></div>');
        $('#spinner').spin(this.opts.spinOpts).hide();
      }
    }, // end spinner()



    pusher: function(url){
      if (typeof url !== 'undefined' && url !== location.href) {
        history.pushState(null,null,url);
      }
    }, // end pusher()



    // Page loader
    loader: function(page, link){
      var self = this;

      // Load content into the appropriate container
      $('#content-page-'+page).load(link+' '+self.opts.content+' > *', function() {

        // Cache the next selector
        var $navLink = $(self.opts.next);

        // Update page number and nextLink
        self.thisPage = page;
        self.thisLink = link;
        self.nextPage = page + 1;
        self.nextLink = link.replace(/\/page\/[0-9]*/, '/page/'+self.nextPage);

        // @TODO: load scripts necessary to display content on new pages e.g. MediaElement.js
        // Presently this script assumes all scripts are already loaded
        // Follow the link for an example: https://github.com/Automattic/jetpack/blob/master/modules/infinite-scroll/infinity.js

        // Change the URL
        self.pusher(self.thisLink);

        // Create another placeholder
        self.holder();

        // Navigation link handling: 1) have we reached the last page? 2) if not, update the link
        if (self.nextPage > self.maxPages) {
          $navLink.remove(); // No more content can be loaded; hide the next button or link
          self.maxedOut = 1; // Set a flag to avoid further processing
        } else {
          if ( $navLink.is('[href]') ) {
            $navLink.attr('href', self.nextLink); // Next selector has href; update it for right-clicking etc.
          } else {
            $('[href]', $navLink).attr('href', self.nextLink); // Next selector contains href
          }
        }

        // Hide spinner
        $('#spinner').hide();

        // Hide previous link (if one exists)
        $(self.opts.prev).hide();

        // Emit loaded event
        self.loaded();

        // Scroll to the appropriate location
        self.scroll();

        // Update analytics with relative URL on load (not on scroll)
        self.analytics('/'+location.href.replace(self.root(), ''));
      });
    }, // end loader()



    // Emit the DOMContentLoaded event (for compatibility with Prism.js and other scripts)
    loaded: function(){
      var loaded = document.createEvent("Event");
      loaded.initEvent("DOMContentLoaded", true, true);
      window.document.dispatchEvent(loaded);
    },



    // Scroll to the top of the new content container
    scroll: function(){
      var top = $('#content-page-'+this.thisPage).children(':first').offset().top - this.opts.scrollOffset;
      $('body, html').animate({ scrollTop: top }, this.opts.scrollDelay, "swing");
    }, // end scroll()



    // Update Google Analytics on content load, not on scroll
    analytics: function(url){
      // Inform Google Analytics of the change; compatible with the new Universal Analytics script
      if ( typeof window.ga !== 'undefined' ) {
        window.ga('send', 'pageview', url);
      } else if ( typeof window._gaq !== 'undefined' ) {
        window._gaq.push(['_trackPageview', url]); // Legacy analytics; ref: https://github.com/browserstate/ajaxify/pull/25
      }
    }, // end analytics()



    // Utility function to get the root URL with trailing slash e.g. http(s)://yourdomain.com/
    root: function(){
      var
        port = document.location.port ? ':' + document.location.port : '',
        url = document.location.protocol + '//' + (document.location.hostname || document.location.host) + port + '/';
      return url;
    } // end root()
  };



  $.fn.ajaxPageLoader = function (opts){
    return this.each(function(){
      if (!$.data(this, 'ajaxPageLoader')) {
        $.data(this, 'ajaxPageLoader', new PageLoader(opts));
      }
    });
  };



  // Extensible default settings
  $.fn.ajaxPageLoader.defaults = {
    content:      'main'        // The content selector; this varies from theme to theme
  , next:         '.next-page'  // Selector for the "next" navigation link; this is also theme-dependent
  , prev:         '.prev-page'  // Selector for the "next" navigation link; this is also theme-dependent
  , scrollDelay:  300           // Smooth scrolling delay; use a larger value for a smoother scroll (s)
  , scrollOffset: 30            // Scroll offset from the top of the new page to account for margins (px)
  , pushDelay:    250           // How long to wait before attempting to update history state (s)
  , infinScroll:  true          // Switch for infinite scrolling functionality (true/false)
  , infinDelay:   600           // How long to wait before requesting new content automatically (s)
  , infinOffset:  300           // Height of the area below the last page in which infinite scrolling will be triggered (px)
  , infinFooter:  1             // Height from the bottom of the page from which infinite scrolling *won't* be triggered (px)
  , spinOpts: {                 // spin.js options; reference: https://fgnass.github.io/spin.js/
      lines:  25
    , length: 0
    , width:  4
    , radius: 25
    , speed:  1.5
    , trail:  40
    , top:    '15px'
    }
  };
}).apply(PG8, [jQuery, document, window]);
