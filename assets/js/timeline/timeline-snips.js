'use strict';

let $story = document.querySelector('.story');
let $history = document.querySelector('.forge-history');

/**
 * Set up GSAP with each of the story events
 */
function buildEvents() {
    let $events = gsap.utils.toArray('.story-event');

    let $event1 = document.querySelector('.event-index-0');
    let $event2 = document.querySelector('.event-index-1');

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

        // let event = gsap.timeline({
        //     paused: true,
        //     immediateRender: false,
        //     ease: 'none',
        //     scrollTrigger: {
        //         trigger: eventObj,
        //         pin: false,
        //         start: 'top top',
        //         end: 'bottom top',
        //         scrub: true,
        //         markers: true,
        //         id: 'event-' + i
        //     }
        // });

        // event
            // .to($event1, {
            //     x: () => -$event1.scrollWidth + 'px',
            //     ease: 'none'
            // })
            // .to(
            //     '#dynamic-progress',
            //     {
            //         width: ((100 / $events.length) * i) + '%',
            //         ease: 'none',
            //         attr: {
            //             'aria-valuenow': (100 / $events.length) * i
            //         }
            //     },
            //     0
            // );
    });

    let event1 = gsap.timeline({
        scrollTrigger: {
            trigger: $event1,
            pin: false,
            start: 'top top',
            end: () => '+=' + $event1.offsetWidth,
            scrub: true,
            markers: true,
            id: 'event-1'
        }
    });

    event1
        // .to($event1, {
        //     x: () => -$event1.scrollWidth + 'px',
        //     ease: 'none'
        // })
        .to(
            '#dynamic-progress2',
            {
                width: '33.3333%',
                ease: 'none',
                attr: {
                    'aria-valuenow': '33.3333'
                }
            },
            0
        );

    let event2 = gsap.timeline({
        paused: false,
        // start from updated progress value.
        immediateRender: false,
        scrollTrigger: {
            trigger: $event2,
            pin: false,
            start: 'top top',
            end: () => '+=' + $event2.offsetWidth,
            scrub: true,
            markers: true,
            id: 'event-2'
        }
    });

    event2
        // .to($event2, {
        //     x: () => -$event2.scrollWidth + 'px',
        //     ease: 'none'
        // })
        .to(
            '#dynamic-progress2',
            {
                width: '66.6666%',
                ease: 'none',
                attr: {
                    'aria-valuenow': '66.6666'
                }
            },
            0
        );
}

module.exports = {
    init: function () {
        gsap.registerPlugin(ScrollTrigger);

        buildEvents();
    },

    resize: function () {
        $(window).smartresize(function () {
            // console.log('resize');
        });
    }
};
