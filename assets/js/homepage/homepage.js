'use strict';

module.exports = {
    cardSlider: function () {
        console.log('test');
        $('.post-cards-home .post-card-row').slick({
            infinite: true,
            mobileFirst: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4
                    }
                }
            ]
        });
    }
};
