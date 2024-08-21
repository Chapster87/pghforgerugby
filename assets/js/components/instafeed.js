'use strict';

/* global Swiper */

const accessToken = 'IGQWRNVlBLNmxKRkM0OVdiYXNkM2NBNE9jSUZAlUzNQNFNpN1duMC1DQ1FwSTlhUjJJdGVuZA2dPWmtlNnV3LUtabUJnMnowRkFHX0RHUVpfTDh0MGRuaTk2Y1Q5S01vY0pFcFl1WHhrcGhXWGVRc3NsaE5FVnpPTVkZD';

/**
 * Instagram Album Slider
 */
function albumSlider() {
    const $instaAlbums = document.querySelectorAll('#social-feed .insta-album .swiper');

    $instaAlbums.forEach((album) => {
        /* eslint no-unused-vars: ["error", { "varsIgnorePattern": "albumSliderObj" }] */
        const albumSliderObj = new Swiper(album, {
            direction: 'horizontal',
            loop: false,
            slidesPerView: 1,
            autoHeight: true,
            spaceBetween: 0,
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true
            },
            navigation: {
                nextEl: '.swiper-nav-next-insta-card',
                prevEl: '.swiper-nav-prev-insta-card'
            },
            scrollbar: {
                el: '.swiper-scrollbar',
                draggable: true,
                hide: false,
                enabled: false
            }
        });
    });
}

/**
 * Function to fetch and display Instagram feed
 */
function getInstagramFeed() {
    fetch(`https://graph.instagram.com/v12.0/me/media?fields=id,caption,media_type,media_url,permalink,timestamp,children{media_url,thumbnail_url}&access_token=${accessToken}`)
        .then(response => response.json())
        .then(feed => {
            const feedContainer = document.querySelector('#social-feed .feed-main');

            feed.data.forEach(post => {
                console.log(post);
                const swiperPagination = `<div class="swiper-pagination"></div>`;
                const swiperControls = `<div class="swiper-button-prev swiper-nav-prev-insta-card"></div>
                    <div class="swiper-button-next swiper-nav-next-insta-card"></div>`;

                const instaCard = document.createElement('a');
                instaCard.href = post.permalink;
                instaCard.target = '_blank';
                instaCard.classList = 'card card-insta';

                const postMedia = document.createElement('div');
                postMedia.classList = 'card-img-top';

                if (post.media_type === 'IMAGE') {
                    instaCard.classList.add('insta-image');
                    let postMediaImg = `<img src="${post.media_url}" alt="${post.caption}" />`;
                    postMedia.insertAdjacentHTML('beforeend', postMediaImg);
                }

                if (post.media_type === 'CAROUSEL_ALBUM') {
                    instaCard.classList.add('insta-album');
                    postMedia.classList.add('swiper', 'slider-core-css');

                    const mediaAlbum = document.createElement('div');
                    mediaAlbum.classList = 'swiper-wrapper';

                    post.children.data.forEach((img) => {
                        let albumImage = `<img src="${img.media_url}" alt="${post.caption}" class="swiper-slide" />`;
                        mediaAlbum.insertAdjacentHTML('beforeend', albumImage);
                    });

                    postMedia.appendChild(mediaAlbum);
                    postMedia.insertAdjacentHTML('beforeend', swiperPagination);
                    postMedia.insertAdjacentHTML('beforeend', swiperControls);
                }

                if (post.media_type === 'VIDEO') {
                    instaCard.classList.add('insta-video');
                    let postMediaVideo = `<video src="${post.media_url}" alt="${post.caption}" />`;
                    postMedia.insertAdjacentHTML('beforeend', postMediaVideo);
                }

                const postBody = `<div class="card-body"><p class="card-text">${post.caption}</p></div>`;

                instaCard.appendChild(postMedia);
                instaCard.insertAdjacentHTML('beforeend', postBody);
                feedContainer.appendChild(instaCard);
            });
            albumSlider();
        })
        .catch(error => {
            console.error(error);
            const feedContainer = document.querySelector('#social-feed');

            feedContainer.remove();
        });
}

module.exports = function () {
    getInstagramFeed();

    const $socialFeed = $('#social-feed');
    let feedRibbonHeight = $socialFeed.find('.feed-ribbon').outerHeight();

    $socialFeed.find('.feed-main').css('padding-bottom', feedRibbonHeight);

    $('.feed-trigger').on('click', function () {
        $('#social-feed').toggleClass('js-active');
    });
};
