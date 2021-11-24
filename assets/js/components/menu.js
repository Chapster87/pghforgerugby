'use strict';

/**
 * Behavior when mouse enters nav menu item
 */
function navMouseEnter() {
    $(this).find('.sub-menu').addClass('js-active');
}

/**
 * Behavior when mouse enters nav menu item
 */
function navMouseLeave() {
    $(this).find('.sub-menu').removeClass('js-active');
}

/**
 * Init the default menu states
 */
function navInit() {
    if($('body').is('.vp-desktop')) {
        $('.menu-item-has-children').hoverIntent({
            over: navMouseEnter,
            out: navMouseLeave,
            timeout: 200
        });
    }
}

module.exports = function () {
    navInit();

    $(window).smartresize(function () {
        menuInit();
    });
};