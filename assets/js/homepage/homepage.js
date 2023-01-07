'use strict';

module.exports = {
    bgVid: function () {
        var video = document.getElementById('bg-video');

        /**
         * Check if video can play, and play it
         */
        video.addEventListener('canplay', function () {
            video.play();
        });
    },
    cardSlider: function () {
        $('.post-cards-home .post-card-row').slick({
            infinite: true,
            mobileFirst: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4
                    }
                }
            ]
        });
    }
};
