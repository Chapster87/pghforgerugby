'use strict';

function setHeader() {
    var deviceSize = $('body').is('.vp-desktop') ? 'desktop' : 'mobile';
    var headerHeight = $('header').outerHeight();

    // if (deviceSize === 'desktop') {
    $('#main').css('padding-top', headerHeight);
    // }
}

module.exports = function () {

    setHeader();

    $(window).smartresize(function () {
        setHeader();
    });

};