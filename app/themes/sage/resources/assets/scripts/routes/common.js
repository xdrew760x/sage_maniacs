import { isExternal, isEmpty } from '../util/helpers'

export default {
  init() {
    // JavaScript to be fired on all pages
    const anchors = document.querySelectorAll('a')
    const paragraphs = document.querySelectorAll('p')
    const hamburger = document.querySelector('.nav-control')
    const galleryThumbs = document.querySelectorAll('.gallery-icon')


    // Handle external urls
    anchors.forEach(anchor => {
      if (isExternal(anchor)) {
        // Define attributes to set
        const attributes = {
          target: '__blank',
          rel: 'noopener',
        }

        // Set attributes
        Object.keys(attributes).forEach(attribute => {
          anchor.setAttribute(attribute, attributes[attribute])
        })
      }
    })

    // Handle empty p tags
    paragraphs.forEach(isEmpty)

    $('.toggle__main--nav').click(function() {
      $(this).toggleClass('activated');
      $('.primary-nav-a').toggleClass('hidden');
    });

    // Handle hamburger toggle
      if (hamburger) {
        hamburger.addEventListener('click', () => {
          document.body.classList.toggle('nav-is-open')
        })
      }

    // Handle dropdowns visibility state
    $(function () {
      var children = $('nav > ul > li > a').filter(function () { return $(this).nextAll().length > 0 ;});
      $('<span class="drop-menu"><i class="fas fa-angle-down"></i></span>').insertAfter(children);
      $('nav ul .drop-menu').click(function () {
        $(this).toggleClass('activated');
        $(this).next().slideToggle(300);
        return false;
      });
    });


    // Handle gallery lightbox
    if (galleryThumbs) {
      galleryThumbs.forEach(galleryThumb => {
        const galleryAnchor = galleryThumb.children[0]

        galleryAnchor.setAttribute('data-fancybox', 'gallery')
      })

      $('[data-fancybox]').fancybox()
    }

    // Handle Scroll Class for Header
    $(window).scroll(function() {
      var scrolled = $(this).scrollTop();

      if (scrolled >= 100) {
        $('body').addClass('scrolled');
      } else {
        $('body').removeClass('scrolled');
      }
    });

    if (jsPopup && !Cookies.get('popup')) {
      setTimeout(() => {
        $.fancybox.open({
          autoFocus: false,
          src: '.js-popup',
          type: 'inline',
        })

        Cookies.set('popup', 'true', { expires: 7 })
      }, 5000)
    }

    // Slick Homes for sale gallery
    if ($('.js-carousel-gallery').length) {
      $('.js-carousel-gallery').slick({
        arrows: false,
        dots: false,
        fade: false,
        rows: 0,
        autoplay: true,
        autoplaySpeed: 15000,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
      });
    }

    if ($('.js-carousel-nav').length) {
      $('.js-carousel-nav').slick({
        arrows: true,
        asNavFor: '.js-carousel-gallery',
        dots: false,
        focusOnSelect: true,
        rows: 0,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 1000,
        slidesToShow: 3,
        slidesToScroll: 1,
        centerPadding: '60px',
        nextArrow: '<div class="next mr-15"><i class="fas fa-chevron-right text-white"></i></div>',
        prevArrow: '<div class="prev ml-15"><i class="fas fa-chevron-left text-white"></i></div>',
        responsive: [
          {
            breakpoint: 768,
            settings: {
              centerMode: true,
              slidesToShow: 1,
              centerPadding: '60px',
            },
          },
        ],
      });
    }

    /// Column
    if ($('.col-slider').length) {
      $('.col-slider').slick({
        accessibility: true,
        autoplay: true,
        autoplaySpeed: 15000,
        fade: false,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        nextArrow: '<div class="next"><i class="fal fa-chevron-right"></i></div>',
        prevArrow: '<div class="prev"><i class="fal fa-chevron-left"></i></div>',

        responsive: [
          {
            breakpoint: 768,
            settings: {
              centerMode: true,
              slidesToShow: 1,
              centerPadding: '15px',
            },
          },
        ],
      });
    }

    if ($('.col-slider-two').length) {
      $('.col-slider-two').slick({
        accessibility: true,
        autoplay: true,
        autoplaySpeed: 15000,
        fade: false,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        nextArrow: '<div class="next"><i class="fal fa-chevron-right"></i></div>',
        prevArrow: '<div class="prev"><i class="fal fa-chevron-left"></i></div>',

        responsive: [
          {
            breakpoint: 768,
            settings: {
              centerMode: true,
              slidesToShow: 1,
              centerPadding: '15px',
            },
          },
        ],
      });
    }

    if ($('.col-slider-three').length) {
      $('.col-slider-three').slick({
        accessibility: true,
        autoplay: true,
        autoplaySpeed: 15000,
        fade: false,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        nextArrow: '<div class="next"><i class="fal fa-chevron-right"></i></div>',
        prevArrow: '<div class="prev"><i class="fal fa-chevron-left"></i></div>',

        responsive: [
          {
            breakpoint: 768,
            settings: {
              centerMode: true,
              slidesToShow: 1,
              centerPadding: '15px',
            },
          },
        ],
      });
    }
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
