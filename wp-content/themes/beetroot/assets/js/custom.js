mobileMenu();

function mobileMenu() {

    let el = document.querySelector('.menu-toggle')
    if (el) {
        el.addEventListener('click', function() {
            document.querySelector('.menu-mobile-wrap').classList.toggle('active');
        });

        let remove = document.querySelector('.menu-remove')
        remove.addEventListener('click', function() {
            document.querySelector('.menu-mobile-wrap').classList.toggle('active');
        });
    }
}

(function($) {

    $(document).ready(function() {
        $('#fullpage').fullpage({
            anchors: ['home', 'about', 'jobs', 'teams'],
            menu: '.menu',
            loopTop: true,
            loopBottom: true
        });
    });

    $('.slider-single').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '.job_prev',
        nextArrow: '.job_next',
        fade: false,
        adaptiveHeight: true,
        infinite: false,
        useTransform: true,
        speed: 400,

    });

    //Slick settings
    $('.slider-nav')
        .on('init', function(event, slick) {
            $('.slider-nav .slick-slide.slick-current').addClass('is-active');
        })
        .slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            centerMode: true,
            focusOnSelect: true,
            infinite: false,
            prevArrow: '.jobs_prev',
            nextArrow: '.jobs_next',
            responsive: [{
                //     breakpoint: 1024,
                //     settings: {
                //         slidesToShow: 5,
                //         slidesToScroll: 5,
                //     }
                // }, {
                //     breakpoint: 640,
                //     settings: {
                //         slidesToShow: 4,
                //         slidesToScroll: 4,
                //     }
                // }, {
                breakpoint: 420,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }]
        });

    $('.slider-single').on('afterChange', function(event, slick, currentSlide) {
        $('.slider-nav').slick('slickGoTo', currentSlide);
        var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
        $('.slider-nav .slick-slide.is-active').removeClass('is-active');
        $(currrentNavSlideElem).addClass('is-active');
    });

    $('.slider-nav').on('click', '.slick-slide', function(event) {
        event.preventDefault();
        var goToSingleSlide = $(this).data('slick-index');

        $('.slider-single').slick('slickGoTo', goToSingleSlide);
    });

    $('.slider-nav').slick('slickGoTo', 1);

    $('.multiple-teams').slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '.arrow_prev_t',
        nextArrow: '.arrow_next_t',
        centerMode: true,
        focusOnSelect: true,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        }, {
            breakpoint: 420,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,

            }
        }]
    });
    $('.multiple-teams').slick('slickGoTo', 1);

    // Popup Job
    var modalJob = document.getElementById("modalJob");
    var spanJob = document.getElementsByClassName("close-job")[0];
    $('.jobs-item').on("click", function() {
        $('#modalJob').css('display', 'block');
        $('#jobs-post').get(0).slick.setPosition()
    });
    spanJob.onclick = function() {
        modalJob.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modalJob) {
            modalJob.style.display = "none";
        }
    }

    // Popup Get in touch
    var modal = document.getElementById("modalTouch");
    var btn = document.getElementById("touch");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

})(jQuery);