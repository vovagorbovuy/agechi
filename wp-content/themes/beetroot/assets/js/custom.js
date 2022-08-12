(function($) {
    //Hover of the active section in the menu
    $(window).scroll(function() {
        var $sections = $('section');
        $sections.each(function(i, el) {
            var id = $(el).attr('id');
            // if (scroll > top && scroll < bottom) {
            //     console.log(id);
            // }
        })
    });

    $(document).ready(function() {
        $('#fullpage').fullpage({
            anchors: ['home', 'about', 'jobs', 'teams'],
            menu: '#main_menu',
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
            slidesToScroll: 3,
            dots: false,
            focusOnSelect: false,
            infinite: false,
            prevArrow: '.jobs_prev',
            nextArrow: '.jobs_next',
            // responsive: [{
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
            //     breakpoint: 420,
            //     settings: {
            //         slidesToShow: 3,
            //         slidesToScroll: 3,
            //     }
            // }]
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

    $('.multiple-teams').slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        prevArrow: '.arrow_prev_t',
        nextArrow: '.arrow_next_t',
    });

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