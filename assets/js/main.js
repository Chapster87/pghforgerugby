'use strict';

// Webpack Imports
import * as bootstrap from 'bootstrap';
var processInclude = require('./util');

$(document).ready(function () {

	// Focus input if Searchform is empty
	[].forEach.call( document.querySelectorAll( '.search-form' ), ( el ) => {
		el.addEventListener( 'submit', function ( e ) {
			var search = el.querySelector( 'input' );
			if ( search.value.length < 1 ) {
				e.preventDefault();
				search.focus();
			}
		} );
	} );

	// Initialize Popovers: https://getbootstrap.com/docs/5.0/components/popovers
	var popoverTriggerList = [].slice.call( document.querySelectorAll( '[data-bs-toggle="popover"]' ) );
	var popoverList = popoverTriggerList.map( function ( popoverTriggerEl ) {
		return new bootstrap.Popover( popoverTriggerEl, {
			trigger: 'focus',
		} );
	} );

    processInclude(require('./components/common'));
	processInclude(require('./components/header'));
	processInclude(require('./components/menu'));
	processInclude(require('./components/tooltip'));
	processInclude(require('./styleguide/styleguide'));
});

require('./thirdParty/smartResize');
require('./thirdParty/hoverIntent');