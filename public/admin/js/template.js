(function($) {
  'use strict';
  $(function() {
    var body = $('body');
    var contentWrapper = $('.content-wrapper');
    var scroller = $('.container-scroller');
    var footer = $('.footer');
    var sidebar = $('.sidebar');

    // Add active class to nav-link based on URL dynamically
    function addActiveClass(element) {
      if (current === "") {
        if (element.attr('href').indexOf("index.html") !== -1) {
          element.parents('.nav-item').last().addClass('active');
          if (element.parents('.sub-menu').length) {
            element.closest('.collapse').addClass('show');
            element.addClass('active');
          }
        }
      } else {
        if (element.attr('href').indexOf(current) !== -1) {
          element.parents('.nav-item').last().addClass('active');
          if (element.parents('.sub-menu').length) {
            element.closest('.collapse').addClass('show');
            element.addClass('active');
          }
          if (element.parents('.submenu-item').length) {
            element.addClass('active');
          }
        }
      }
    }

    var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
    $('.nav li a', sidebar).each(function() {
      var $this = $(this);
      addActiveClass($this);
    });

    // Close other submenu in sidebar on opening any
    sidebar.on('show.bs.collapse', '.collapse', function() {
      sidebar.find('.collapse.show').collapse('hide');
    });

    // Change sidebar
    $('[data-toggle="minimize"]').on("click", function() {
      body.toggleClass('sidebar-icon-only');
    });

    // Checkbox and radios
    $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');

    // Check if #proBanner exists before manipulating its class
    var proBanner = document.querySelector('#proBanner');
    if (proBanner) {
      if ($.cookie('majestic-free-banner') != "true") {
        proBanner.classList.add('d-flex');
        var navbar = document.querySelector('.navbar');
        if (navbar) {
          navbar.classList.remove('fixed-top');
        }
      } else {
        proBanner.classList.add('d-none');
        var navbar = document.querySelector('.navbar');
        if (navbar) {
          navbar.classList.add('fixed-top');
        }
      }
    }

    // Handle the navbar padding and margin based on fixed-top class
    var navbar = document.querySelector('.navbar');
    if (navbar) {
      if (navbar.classList.contains("fixed-top")) {
        document.querySelector('.page-body-wrapper').classList.remove('pt-0');
        navbar.classList.remove('pt-5');
      } else {
        document.querySelector('.page-body-wrapper').classList.add('pt-0');
        navbar.classList.add('pt-5');
        navbar.classList.add('mt-3');
      }
    }

    // Close pro banner and adjust navbar
    var bannerCloseButton = document.querySelector('#bannerClose');
    if (bannerCloseButton) {
      bannerCloseButton.addEventListener('click', function() {
        if (proBanner) {
          proBanner.classList.add('d-none');
          proBanner.classList.remove('d-flex');
        }
        if (navbar) {
          navbar.classList.remove('pt-5');
          navbar.classList.add('fixed-top');
        }
        document.querySelector('.page-body-wrapper').classList.add('proBanner-padding-top');
        navbar.classList.remove('mt-3');
        var date = new Date();
        date.setTime(date.getTime() + 24 * 60 * 60 * 1000); 
        $.cookie('majestic-free-banner', "true", { expires: date });
      });
    }

  });
})(jQuery);
