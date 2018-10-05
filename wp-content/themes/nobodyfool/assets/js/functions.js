/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

( function($) {

    // owl carousel
    $('.owl-carousel').owlCarousel({
        items: 1,
        nav: true,
        navText: [],
        dots: true
    });

    // magnific popup
    $('.popup-with-form').magnificPopup({
        type: 'inline',
        preloader: false,
        focus: '#wpforms-65-field_0',

        // When elemened is focused, some mobile browsers in some cases zoom in
        // It looks not nice, so we disable it:
        callbacks: {
            beforeOpen: function() {
                if($(window).width() < 700) {
                    this.st.focus = false;
                } else {
                    this.st.focus = '#wpforms-65-field_0';
                }
            }
        }
    });

    // navigation top toggle
    $('.navigation-toggle').on('click', function() {
       $('.top-custom-nav').toggleClass('to-up');
    });
} )(jQuery);