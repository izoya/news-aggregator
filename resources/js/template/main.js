(function($) {
  "use strict";

  $(window).on('load', function() {
      // Material
      $.material.init();

      // Sticky Nav
      $(window).on('scroll', function () {
          if ($(window).scrollTop() > 200) {
              $('.scrolling-navbar').addClass('top-nav-collapse');
          } else {
              $('.scrolling-navbar').removeClass('top-nav-collapse');
          }
      });

      //WOW Scroll Spy
      var wow = new WOW({
          //disabled for mobile
          mobile: false
      });
      wow.init();

      // Slick Nav
      $('.wpb-mobile-menu').slicknav({
          prependTo: '.navbar-header',
          parentTag: 'span',
          allowParentLinks: true,
          duplicate: false,
          label: '',
          closedSymbol: '<i class="mdi mdi-chevron-right"></i>',
          openedSymbol: '<i class="mdi mdi-chevron-down"></i>',
      });

  });
}(jQuery));


