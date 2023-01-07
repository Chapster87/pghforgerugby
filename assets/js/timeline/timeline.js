'use strict';

let $story = document.querySelector('.story');
let $history = document.querySelector('.forge-history');

/**
 * Set up GSAP for main storyboard functionality
 */
function craftStory() {
    let story = gsap.timeline({
        scrollTrigger: {
            trigger: $story,
            invalidateOnRefresh: true,
            pin: true,
            start: 'top top',
            end: () => '+=' + $story.offsetWidth,
            scrub: 1
            // markers: true,
            // id: 'story'
        }
    });

    story.to($story, {
        x: () => -($story.scrollWidth - document.documentElement.clientWidth) + 'px',
        ease: 'none'
    });
}

/**
 * Set up GSAP with each of the story events
 */
function buildEvents() {
    let $events = gsap.utils.toArray('.story-event');

    $events.forEach((eventObj, index) => {
        console.log(index, eventObj);
        let i = index + 1;

        gsap.to('#dynamic-progress', {
            width: ((100 / $events.length) * i) + '%',
            attr: {
                'aria-valuenow': (100 / $events.length) * i
            },
            immediateRender: false,
            ease: 'none',
            scrollTrigger: {
                trigger: eventObj,
                start: 'top top',
                end: () => '+=' + eventObj.offsetWidth,
                scrub: true,
                markers: true,
                id: 'event-' + i
            }
        });
    });
}

/**
 * Progress Indicator for chronicle()
 */
function storyProgress() {
    const fullProgress = gsap.timeline({
        scrollTrigger: {
            scrub: true,
            trigger: $history,
            start: 0,
            end: 'max'
            // markers: true,
            // id: 'full-progress'
        }
    });

    fullProgress.to(
        '#full-progress',
        {
            width: '100%',
            ease: 'none',
            attr: {
                'aria-valuenow': '100'
            }
        }
    );
}

module.exports = {
    init: function () {
        gsap.registerPlugin(ScrollTrigger);

        craftStory();
        buildEvents();
        storyProgress();
    },

    resize: function () {
        $(window).smartresize(function () {
            // console.log('resize');
        });
    }
};
