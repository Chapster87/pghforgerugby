'use strict';

module.exports = function () {
    var formsForValidation = document.querySelectorAll('.needs-validation');
    var $contactPage = $('body.page-template-page-contact');

    Array.prototype.slice.call(formsForValidation).forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        });
    });

    // Prevent email resend on refresh
    if (window.history.replaceState && $contactPage.length > 0) {
        window.history.replaceState(null, null, window.location.href);
    }

    var captchaRefreshBtn = document.querySelector('.refresh-captcha');
    var captchaImg = document.querySelector('.captcha-image');
    if (captchaImg) {
        var captchaImgSrc = document.querySelector('.captcha-image').src;
        captchaRefreshBtn.addEventListener('click', function () {
            document.querySelector('.captcha-image').src = captchaImgSrc + '?' + Date.now();
        });
    }
};
