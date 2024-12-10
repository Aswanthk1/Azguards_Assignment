require([
    'jquery',
    'slick'
], function ($) {
    $(document).ready(function () {
        // Initialize the Slick Slider
        $('.products-slider').slick({
            slidesToShow: 4,  // Show 4 products at a time
            slidesToScroll: 1,  // Scroll 1 product at a time
            autoplay: true,  // Enable auto-play
            autoplaySpeed: 3000,  // Slide change speed
            arrows: true,  // Enable arrows for navigation
            prevArrow: '<button type="button" class="slick-prev">Previous</button>',
            nextArrow: '<button type="button" class="slick-next">Next</button>',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    });
});
