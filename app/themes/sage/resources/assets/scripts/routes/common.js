import { isExternal, isEmpty, dropdownState, observeBackgrounds } from '../util/helpers'

export default {
  init() {
    // JavaScript to be fired on all pages
    const anchors = document.querySelectorAll('a')
    const paragraphs = document.querySelectorAll('p')
    const hamburger = document.querySelector('.js-hamburger')
    const schedule = document.querySelector('.button--schedule')
    const schedule_two = document.querySelector('.button--close')
    const dropdowns = document.querySelectorAll('.menu-item-has-children')
    const hero = document.querySelector('.js-hero')
    const jsBackgrounds = document.querySelectorAll('.js-background')
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
    if (window.matchMedia('(max-width: 1023px)').matches) {
      if (hamburger) {
        hamburger.addEventListener('click', () => {
          document.body.classList.toggle('nav-is-open')
        })
      }
    }

    if (schedule) {
      schedule.addEventListener('click', () => {
        document.body.classList.toggle('display_form')
      })
    }

    if (schedule_two) {
      schedule_two.addEventListener('click', () => {
        document.body.classList.toggle('display_form')
      })
    }

    // Handle dropdowns visibility state
    if (window.matchMedia('(max-width: 1023px)').matches) {
      dropdowns.forEach(dropdown => {
        dropdown.setAttribute('data-state', 'closed')

        dropdown.addEventListener('click', dropdownState)
      })
    }

    // Handle gallery lightbox
    if (galleryThumbs) {
      galleryThumbs.forEach(galleryThumb => {
        const galleryAnchor = galleryThumb.children[0]

        galleryAnchor.setAttribute('data-fancybox', 'gallery')
      })

      $('[data-fancybox]').fancybox()
    }

    // Handle hero background
    if (hero) {
      const mblHero = hero.dataset.mobile
      const dskHhero = hero.dataset.desktop

      if (mblHero && dskHhero) {
        if (window.matchMedia('(min-width: 1024px)').matches) {
          hero.style.backgroundImage = `url(${dskHhero})`
        } else {
          hero.style.backgroundImage = `url(${mblHero})`
        }
      }
    }

    // Handle js backgrounds
    if (jsBackgrounds) {
      if (('IntersectionObserver' in window)) {
        let observer = new IntersectionObserver(observeBackgrounds);

        jsBackgrounds.forEach(jsBackground => {
          observer.observe(jsBackground)
        })
      }
    }

    /// Form date field
    $('.gfield .datepicker').each(function () {
      $(this).attr('autocomplete', 'off'); });

      //// Carousel Hero
      if ($('.js-carousel-hero').length) {
        $('.js-carousel-hero').slick({
          accessibility: true,
          adaptiveHeight: false,
          autoplay: true,
          autoplaySpeed: 150000,
          fade: true,
          pauseOnFocus: false,
          pauseOnHover: false,
          speed: 1000,
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true,
          arrows: true,
          nextArrow: '<div class="next"><i class="fas fa-chevron-right"></i></div>',
          prevArrow: '<div class="prev"><i class="fas fa-chevron-left"></i></div>',
          responsive: [
            {
              breakpoint: 768,
              settings: {
                arrows: false,
              },
            },
          ],
        });
      }



      // Handle portals & featured listings
      if (window.matchMedia('(max-width: 1023px)').matches) {

        // Columns Becomes Slider on mobile
        if ($('.js-columns-1').length) {
          $('.js-columns-1').slick({
            accessibility: true,
            adaptiveHeight: true,
            autoplay: true,
            autoplaySpeed: 5000,
            arrows: false,
            dots: true,
            fade: false,
            pauseOnFocus: false,
            pauseOnHover: false,
            speed: 1000,
            slidesToShow: 2,
            slidesToScroll: 2,
            responsive: [
              {
                breakpoint: 560,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                },
              },
            ],
          })
        }

        // Columns Becomes Slider on mobile
        if ($('.js-columns-2').length) {
          $('.js-columns-2').slick({
            accessibility: true,
            adaptiveHeight: true,
            autoplay: true,
            autoplaySpeed: 8000,
            arrows: false,
            dots: true,
            fade: false,
            pauseOnFocus: false,
            pauseOnHover: false,
            speed: 1000,
            slidesToShow: 2,
            slidesToScroll: 2,
            responsive: [
              {
                breakpoint: 560,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                },
              },
            ],
          })
        }

        // Columns Becomes Slider on mobile
        if ($('.js-columns-3').length) {
          $('.js-columns-3').slick({
            accessibility: true,
            adaptiveHeight: true,
            autoplay: true,
            autoplaySpeed: 10000,
            arrows: false,
            dots: true,
            fade: false,
            pauseOnFocus: false,
            pauseOnHover: false,
            speed: 1000,
            slidesToShow: 2,
            slidesToScroll: 2,
            responsive: [
              {
                breakpoint: 560,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                },
              },
            ],
          })
        }
      }


      // JavaScript to be fired on the home page, after the init JS
      // Slick
      if ($('.js-carousel-gallery').length) {
        $('.js-carousel-gallery').slick({
          arrows: true,
          asNavFor: '.js-carousel-nav',
          dots: false,
          fade: true,
          nextArrow: '<div class="next mr-15"><i class="fas fa-chevron-right text-white"></i></div>',
          prevArrow: '<div class="prev ml-15"><i class="fas fa-chevron-left text-white"></i></div>',
          rows: 0,
          speed: 1000,
          slidesToShow: 1,
          slidesToScroll: 1,
        });
      }

      if ($('.js-carousel-nav').length) {
        $('.js-carousel-nav').slick({
          arrows: false,
          asNavFor: '.js-carousel-gallery',
          autoplay: true,
          dots: false,
          focusOnSelect: true,
          rows: 0,
          speed: 1000,
          slidesToShow: 3,
          slidesToScroll: 3,
        });
      }


    },
    finalize() {
      // JavaScript to be fired on all pages, after page specific JS is fired
    },
  };
