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
    if (window.matchMedia('(max-width: 1023px)').matches) {
      if (hamburger) {
        hamburger.addEventListener('click', () => {
          document.body.classList.toggle('nav-is-open')
        })
      }
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
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
