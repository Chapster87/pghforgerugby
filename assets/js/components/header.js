'use strict';

var $scrollTop = $(window).scrollTop();
var $body = $('body');
var $siteWrapper = $('#wrapper');
var $header = $('header#header');
var $menuBtn = $('.navbar-toggler');
var $navMenu = $menuBtn.next('#navbar');

/**
 * Set Scroll Fix
 * @param {number} scrollPos - The current scroll position.
 * @param {number} offset - The current header offset.
 * @param {string} device - The device size to test against.
 */
function setScrollFx(scrollPos, offset, device) {
    // var scrollDir = scrollPos > $scrollTop ? 'down' : 'up';
    // var hOffset = parseInt($header.css('top'), 10);

    // Toggle utility class on scroll
    if (scrollPos > 1) {
        $body.addClass('is-scrolled');
    } else {
        $body.removeClass('is-scrolled');
    }

    if ($body.is('.admin-bar')) {
        // subtract admin bar height
        $('#main').css('padding-top', $header.outerHeight() - 32);
    } else {
        $('#main').css('padding-top', $header.outerHeight());
    }

    // Reset scroll position, prevent negative scroll
    $scrollTop = scrollPos <= 0 ? 0 : scrollPos;
}

/**
 * Set Header state
 */
function setHeader() {
    var scrollPos = $(window).scrollTop();
    var offsetH = -($header.outerHeight());
    var deviceSize = $body.is('.vp-desktop') ? 'desktop' : 'mobile';

    if ($body.is('.vp-mobile')) {
        $navMenu.css('height', $(window).height() - $header.outerHeight());
    } else {
        $navMenu.css('height', '');
    }

    // Set Header FX
    setScrollFx(scrollPos, offsetH, deviceSize);
}

/**
 * Reset state of navigation
 */
function resetNav() {
    $navMenu.removeClass('js-active');
    $menuBtn.attr('aria-expanded', 'false').removeClass('is-active');
    $siteWrapper.removeClass('js-screen-sized');
}

/**
 * Mobile Menu Toggle
 */
function mobileMenuToggle() {
    $menuBtn.on('click', function () {
        if (!$navMenu.is('.js-active')) {
            // open menu
            $navMenu.addClass('js-active');
            $menuBtn.attr('aria-expanded', 'open').addClass('is-active');
            $siteWrapper.addClass('js-screen-sized');
        } else {
            // close menu
            resetNav();
        }
    })
}

module.exports = function () {
    setHeader();
    mobileMenuToggle();

    $(window).smartresize(function () {
        setHeader();
        resetNav();
    });

    var throttledHeader = _.throttle(setHeader, 200);
    $(window).on('scroll', throttledHeader);
};
