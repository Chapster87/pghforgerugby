# WP AJAX Page Loader

This lightweight jQuery plugin is a modern implementation of AJAX page loading (sometimes known as infinite scrolling) for use with WordPress. I created it in part to address [some issues with using history.js](https://stackoverflow.com/questions/11230581/is-there-an-alternative-to-history-js) (which is commonly used in infinite scrolling implementations) as well as to provide a raw script for theme and plugin developers to easily integrate into their own workflow. [Read the original announcement on my blog](http://synapticism.com/dev/an-ajax-page-loading-script-for-wordpress/).

Requires: [jQuery](https://jquery.com/) (included in WordPress by default), [HTML5 History API](https://github.com/devote/HTML5-History-API), and [spin.js](https://github.com/fgnass/spin.js).

Footprint: **16 Kb** minified with core dependencies, 3.5 Kb without.

* Loads new content on click *and* when the scroll position falls between specified points.
* Displays a configurable loading spinner while content is loading.
* Smoothly scrolls to the top of the new page's contents.
* Updates URL with current page whenever scrolling stops.
* "Footer safe" mode: infinite scrolling won't be triggered at the very bottom of the page by default.
* Compatible with Google Analytics (universal and legacy support).
* Designed to be easily integrated and configured.

Have a look at [Pendrell](https://github.com/synapticism/pendrell) for an example of integration and usage and check out [my blog](http://synapticism.com) for a **live demo** (just scroll almost *but not quite to the bottom* of the index and you should see it in action).



## Installation

### Bower

`bower install wp-ajax-page-loader -D`

### npm

`npm install wp-ajax-page-loader --save-dev`



## Setup

Integrate this script into your existing asset pipeline or simply copy the desired script bundle (probably `wp-ajax-page-loader-core.min.js`) into your theme.

To activate this script you will need to add some code to your `functions.php` file (or equivalent) to enqueue the script and output the required `PG8Data` script variables. Here is an example (to be wrapped in a function called by the `wp_enqueue_scripts` action):

```php
function wp_ajax_page_loader() {
  global $wp_query;

  $max = $wp_query->max_num_pages;
  $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;

  $wp_ajax_page_loader_vars = array(
    'startPage'   => $paged,
    'maxPages'    => $max,
    'nextLink'    => next_posts( $max, false )
  );

  $wp_ajax_page_loader_path = get_stylesheet_directory_uri() . '/wp-ajax-page-loader-core.min.js';

  wp_enqueue_script( 'wp-ajax-page-loader', $wp_ajax_page_loader_path, array( 'jquery' ), filemtime( $wp_ajax_page_loader_path ), true );
  wp_localize_script( 'wp-ajax-page-loader', 'PG8Data', $wp_ajax_page_loader_vars );
}
add_action( 'wp_enqueue_scripts', 'wp_ajax_page_loader' );
```

You will also need to instantiate the plugin with a bit of JavaScript. Place this (or something like it) in a script loaded by your theme:

```javascript
;(function($){ // Immediately invoked function expression (IIFE)
  $(function(){ // Shortcut to $(document).ready():
    $(document.body).ajaxPageLoader();
  });
}(jQuery));
```

Some help for JavaScript/jQuery beginners: this code sample includes an [immediately-invoked function expression (IIFE)](http://benalman.com/news/2010/11/immediately-invoked-function-expression/) that aliases `jQuery` to `$` (necessary as [WordPress runs jQuery](https://api.jquery.com/jquery.noconflict/) in `noConflict` mode) and [a shortcut](https://learn.jquery.com/using-jquery-core/document-ready/) to `$(document).ready()`.



## Configuration

Pass an options object to the plugin at runtime to modify any of the default settings (view source and scroll to the bottom of the file for a full list). So, for example, if you'd like a snappier scroll and your theme doesn't have a footer:

```javascript
$(document.body).ajaxPageLoader({ scrollDelay: 100, infinFooter: 0 });
```

This script relies on a particular markup pattern, namely that content (and only content) is wrapped in a single element (the `main` element by default). This can be problematic as many themes (including some of the more popular starter themes) also include navigational elements inside the primary content wrapper. The solution to this is to create an additional `div` element to wrap content and then pass that to the `ajaxPageLoader` function.

Sample template markup (adapted from [_s](https://github.com/Automattic/_s)):

```php
<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <?php if ( have_posts() ) : ?>
      <div class="content-wrapper">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'content', get_post_format() ); ?>
        <?php endwhile; ?>
      </div>
      <?php the_posts_navigation(); ?>
    <?php endif; ?>
  </main>
</div>
```

Sample script instantiation matching the markup above (the next selector is superfluous since it matches the default for this particular starter theme but I'm including it here for the sake of clarity):

```javascript
$(document.body).ajaxPageLoader({ content: '.content-wrapper', next: '.nav-next' });
```



## Events

This script emits `DOMContentLoaded` after loading new content. Need to trigger one of your own scripts after loading? Easy:

```
document.addEventListener("DOMContentLoaded", function(event){
  // do something
});
```



## Development

Interested in hacking on this script? Install dependencies with `npm install` and then run Gulp: `gulp`. This will lint the main script, assemble the script bundles, and minify the results.

*Pull requests, issues, and comments are welcome!*



## To Do

* Load additional scripts as needed. Currently the AJAX request only saves content, not scripts or anything else, and this might create some problems for blogs that rely on conditional script loading.



## Alternatives

* The original [Infinite Scroll](https://github.com/infinite-scroll/infinite-scroll) (no longer maintained)
* [Waypoints Infinite Scroll](http://imakewebthings.com/waypoints/shortcuts/infinite-scroll/)
* [jScroll](https://github.com/pklauzinski/jscroll) (even more minimal)



## Credits

* Originally based on my own work with [Ajaxinate](https://github.com/synapticism/ajaxinate) (which is itself based on many other projects).
* With some help from [Pro Blog Design](http://www.problogdesign.com/wordpress/load-next-wordpress-posts-with-ajax/).
* jQuery plugin design pattern inspired by [Ryan Florence](http://ryanflorence.com/authoring-jquery-plugins-with-object-oriented-javascript/).



## License

MIT/GPLv3.

You are welcome to bundle this script into your themes and plugins, commercial or otherwise. Some credit and a link back to this repository would be appreciated, of course :)
