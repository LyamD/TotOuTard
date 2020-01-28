/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./owl.carousel');

window.Vue = require('vue');

const flatpickr = require("flatpickr");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component(
//     'example-component', {
//         data: function() {
//             return {
//                 message: 'olololo'
//             }
//         }
//     },
//     require('./components/ExampleComponent.vue').default
// );

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        elements: [
          { ccc: 'Learn JavaScript' },
          { ccc: 'Learn Vue' },
          { ccc: 'Build something awesome' }
        ],

        message: 'prara'
    },

    methods: {
        laFonction: function() {
            this.message = this.message.split('').reverse().join('')
        }
    }
});

// Non Vue related JS

//$(".lepicker").flatpickr(optional_config);

(function($) {
    "use strict"; // Start of use strict
  
    // Smooth scrolling using jQuery easing
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: (target.offset().top - 70)
          }, 1000, "easeInOutExpo");
          return false;
        }
      }
    });
  
    // Closes responsive menu when a scroll trigger link is clicked
    $('.js-scroll-trigger').click(function() {
      $('.navbar-collapse').collapse('hide');
    });
  
    // Activate scrollspy to add active class to navbar items on scroll
    $('body').scrollspy({
      target: '#mainNav',
      offset: 100
    });
  
    // Collapse Navbar
    var navbarCollapse = function() {
      if ($("#mainNav").offset().top > 100) {
        $("#mainNav").addClass("navbar-shrink");
      } else {
        $("#mainNav").removeClass("navbar-shrink");
      }
    };
    // Collapse now if page is not at top
    navbarCollapse();
    // Collapse the navbar when page is scrolled
    $(window).scroll(navbarCollapse);


    $('#owl-carousel').owlCarousel({
      loop: true,
      margin: 50,
      responsiveClass: true,
      responsive: {
          0: {
              items: 1,
              nav: true
          },
          600: {
              items: 2,
              nav: false
          },
          768: {
              items: 3,
              nav: false
          },
          1000: {
              items: 3,
              nav: true,
              loop: true
          }
      }
  });
  })(jQuery); // End of use strict
  

  


