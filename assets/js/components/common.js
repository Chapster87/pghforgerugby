'use strict';


function getDeviceSize() {
    $('body').removeClass('vp-desktop').removeClass('vp-mobile');
    if (window.matchMedia('(max-width: 62em)').matches) {
        $('body').addClass('vp-mobile');
    } else {
        $('body').addClass('vp-desktop');
    }
}

module.exports = function () {
    // remove body preload class that prevents animations on page load
    setTimeout(function () {
        $('body').removeClass('preload');
    }, 500);

    getDeviceSize();

    $(window).smartresize(function () {
        getDeviceSize();
    });

};