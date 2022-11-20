'use strict';

module.exports = function () {
    $('.code-switch').on('change', function () {
        if ($(this).prop('checked') === true) {
            $(this).parents('.guide-block').addClass('code-active');
        } else {
            $(this).parents('.guide-block').removeClass('code-active');
        }
    });
};
