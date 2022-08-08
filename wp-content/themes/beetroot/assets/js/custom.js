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
            console.log(id);
            if (scroll > top && scroll < bottom) {
                $('a.active').removeClass('active');
                $('a[href="#' + id + '"]').addClass('active');

            }
        })
    });

})(jQuery);