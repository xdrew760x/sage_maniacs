import { isExternal, isEmpty, dropdownState } from '../util/helpers'

export default {
  init() {
    // JavaScript to be fired on all pages
    const anchors = document.querySelectorAll('a')
    const paragraphs = document.querySelectorAll('p')
    const hamburger = document.querySelector('.js-hamburger')
    const dropdowns = document.querySelectorAll('.menu-item-has-children')
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
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
