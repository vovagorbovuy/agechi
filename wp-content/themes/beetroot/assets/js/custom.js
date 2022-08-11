//Hiding the anchor in the url
// const anchors = document.querySelectorAll('a[href*="#"]')

// for (let anchor of anchors) {
//     anchor.addEventListener('click', function(e) {
//         e.preventDefault()

//         const blockID = anchor.getAttribute('href').substr(1)

//         document.getElementById(blockID).scrollIntoView({
//             behavior: 'smooth',
//             block: 'start'
//         })
//     })
// }
(function($) {
    //Hover of the active section in the menu
    $(window).scroll(function() {
        var $sections = $('section');
        $sections.each(function(i, el) {
            var id = $(el).attr('id');
            console.log(id);
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

    //Slick
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.multiple-jobs').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '.arrow_prev',
        nextArrow: '.arrow_next',
        // asNavFor: '.slider-for',
    });
    // $('.multiple-jobs').slick({
    //     infinite: false,
    //     slidesToShow: 3,
    //     slidesToScroll: 3,
    //     prevArrow: '.arrow_prev',
    //     nextArrow: '.arrow_next',
    // });

    $('.multiple-teams').slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        prevArrow: '.arrow_prev_t',
        nextArrow: '.arrow_next_t',
    });

    // Popup
    var modal = document.getElementById("myModal");
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