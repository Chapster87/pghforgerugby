'use strict';

module.exports = function () {
    $('[data-toggle="tooltip"]').tooltip({
        container: 'body',
        html: true
    });

    // shim to utilize bootstrap tooltips with OOTB info icons
    $('.info-icon').each(function () {
        var tooltipContent = $(this).find('.tooltip').html();

        $(this).attr('title', tooltipContent);

        $(this).tooltip({
            container: 'body',
            html: true
        });
    });
};
