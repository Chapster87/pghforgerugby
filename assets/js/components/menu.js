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
 * Return Nav to basic state
 */
function resetNav() {
    // unbind the hoverIntent
    $('.menu-item-has-children').unbind('mouseenter').unbind('mouseleave');
    $('.menu-item-has-children').removeProp('hoverIntent_t');
    $('.menu-item-has-children').removeProp('hoverIntent_s');

    $('.menu-item-has-children .sub-menu').removeClass('js-active');
}

/**
 * Init the default menu states
 */
function navInit() {
    resetNav();

    if ($('body').is('.vp-desktop')) {
        $('.menu-item-has-children').hoverIntent({
            over: navMouseEnter,
            out: navMouseLeave,
            timeout: 200
        });
    } else {
        $('.menu-item-has-children .sub-menu-toggle').on('click', function () {
            if ($(this).siblings('.sub-menu').is('.js-active')) {
                $(this).siblings('.sub-menu').removeClass('js-active');
            } else {
                $('.menu-item-has-children .sub-menu').removeClass('js-active');
                $(this).siblings('.sub-menu').addClass('js-active');
            }
        });
    }
}

module.exports = function () {
    navInit();

    $(window).smartresize(function () {
        navInit();
    });
};
