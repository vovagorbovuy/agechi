//Hiding the anchor in the url
const anchors = document.querySelectorAll('a[href*="#"]')

for (let anchor of anchors) {
    anchor.addEventListener('click', function(e) {
        e.preventDefault()

        const blockID = anchor.getAttribute('href').substr(1)

        document.getElementById(blockID).scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        })
    })
}
(function($) {
    //Hover of the active section in the menu
    $(window).scroll(function() {
        var $sections = $('section');
        $sections.each(function(i, el) {
            var top = $(el).offset().top - 150;
            var bottom = top + $(el).height();
            var scroll = $(window).scrollTop();
            var id = $(el).attr('id');
            if (scroll > top && scroll < bottom) {
                $('a.active').removeClass('active');
                $('a[href="#' + id + '"]').addClass('active');

            }
        })
    });

    //Slick
    $('.multiple-jobs').slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        prevArrow: '.arrow_prev',
        nextArrow: '.arrow_next',
    });

    $('.multiple-teams').slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        prevArrow: '.arrow_prev',
        nextArrow: '.arrow_next',
    });

})(jQuery);