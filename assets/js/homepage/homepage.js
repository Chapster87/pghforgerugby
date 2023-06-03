'use strict';

/* global Swiper */

/**
 * Init homepage bg video
 */
function bgVid() {
    var video = document.getElementById('bg-video');

    /**
     * Check if video can play, and play it
     */
    video.addEventListener('canplay', function () {
        video.play();
    });
}

/**
 * Homepage Card Slider
 */
function cardSlider() {
    const $cardSlider = document.querySelector('.post-cards-home .post-card-row');

    /* eslint no-unused-vars: ["error", { "varsIgnorePattern": "cardSliderObj" }] */
    const cardSliderObj = new Swiper($cardSlider, {
        direction: 'horizontal',
        loop: false,
        slidesPerView: 1,
        autoHeight: true,
        spaceBetween: 20,
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-nav-next-hp-card',
            prevEl: '.swiper-nav-prev-hp-card'
        },
        scrollbar: {
            el: '.swiper-scrollbar',
            draggable: true,
            hide: false,
            enabled: false
        },
        breakpoints: {
            480: {
                slidesPerView: 2
            },
            768: {
                slidesPerView: 3
            },
            1200: {
                slidesPerView: 4
            }
        }
    });
}

module.exports = function () {
    bgVid();
    cardSlider();
};
