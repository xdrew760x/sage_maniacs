{{--
  Title: Testimonial Slider
  Description: Testimonial slider with various controls
  Category: test_blocks
  Icon: <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="48" height="48" role="img" aria-hidden="true" focusable="false"><path d="M19 6H6c-1.1 0-2 .9-2 2v9c0 1.1.9 2 2 2h13c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-4.1 1.5v10H10v-10h4.9zM5.5 17V8c0-.3.2-.5.5-.5h2.5v10H6c-.3 0-.5-.2-.5-.5zm14 0c0 .3-.2.5-.5.5h-2.6v-10H19c.3 0 .5.2.5.5v9z"></path></svg>
  Keywords: column
  Mode: preview
  Align: full
  --}}

  @if(is_admin())
  <script type="text/javascript" src="/app/themes/sage/resources/assets/scripts/slick.min.js"></script>
  @endif
  <script type="text/javascript">
  //// Carousel Hero
  jQuery(document).ready( function($){
    $('.testimonial-slider').slick({
      accessibility: true,
      autoplay: true,
      autoplaySpeed: 4000,
      fade: false,
      speed: 1000,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      nextArrow: '<div class="next"><i class="fal fa-chevron-right"></i></div>',
      prevArrow: '<div class="prev"><i class="fal fa-chevron-left"></i></div>',

      responsive: [
        {
          breakpoint: 1023,
          settings: {
            dots: true,
            arrows: false,
          },
        },
      ],
    });
  });
  </script>


  <div class="block_preview hidden w-full">
    <img src="/app/themes/sage/resources/assets/images/block-previews/hero.png" class="w-full" alt="{{ $block['keywords'][0] }}">
  </div>

  @php
  $pad_y = get_field('padding_y');
  $background_image = get_field('background_image');
  $color_bg = get_field('color_back');
  $content_full = get_field('content_full');
  $text_white = get_field('font_white');

  //// Post Query and Args
  //
  $reviews = new WP_Query([
  'post_type'       =>  array('testimonials'),
  'posts_per_page'  =>  -1,
  'orderby'         => 'date',
  'order'         	=> 'ASC',
  ]);
  @endphp

  <section class="preview-none section-col-full section-testimonials bg-cover bg-center {!! $text_white !!} relative z-40 text-center" style="padding: {!! $pad_y !!}px 0; background-color: {!! $color_bg !!}; background-image: url('{!! $background_image !!}')">
    <div class="container">
      <svg class="block mx-auto mb-8" width="78px" height="69px" viewBox="0 0 78 69" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
          <path d="M790.053847,60 C796.969231,60 801.876923,55.2985062 801.876923,47.6865684 C801.876923,40.2985062 796.076923,36.268656 790.053847,36.268656 C789.384615,36.268656 788.715385,36.268656 788.046154,36.492537 C788.046154,23.9552238 793.623077,16.1194038 805,8.7313434 L799.646153,0 C784.253847,8.9552238 776,21.9402978 776,39.850746 C776,52.83582 781.130769,60 790.053847,60 Z M829.053847,60 C835.969231,60 840.876923,55.2985062 840.876923,47.6865684 C840.876923,40.2985062 835.076923,36.268656 829.053847,36.268656 C828.384615,36.268656 827.715385,36.268656 827.046154,36.492537 C827.046154,23.9552238 832.623077,16.1194038 844,8.7313434 L838.646153,0 C823.253847,8.9552238 815,21.9402978 815,39.850746 C815,52.83582 820.130769,60 829.053847,60 Z" id="path-1"></path>
          <filter x="-11.0%" y="-12.5%" width="122.1%" height="125.0%" filterUnits="objectBoundingBox" id="filter-2">
            <feOffset dx="0" dy="0" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
            <feGaussianBlur stdDeviation="2.5" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
            <feComposite in="shadowBlurOuter1" in2="SourceAlpha" operator="out" result="shadowBlurOuter1"></feComposite>
            <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.5019608 0" type="matrix" in="shadowBlurOuter1"></feColorMatrix>
          </filter>
        </defs>
        <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g id="testimonials" transform="translate(-921.000000, -97.000000)">
            <g transform="translate(150.000000, 101.054300)" id="“">
              <use fill="black" fill-opacity="1" filter="url(#filter-2)" xlink:href="#path-1"></use>
              <use fill="#FFFFFF" fill-rule="evenodd" xlink:href="#path-1"></use>
            </g>
          </g>
        </g>
      </svg>
      <div class="testimonial-slider lg:px-24">
        @while ($reviews->have_posts()) @php $reviews->the_post(); @endphp
        @php
        $source = get_post_field('source');
        @endphp

        <div class="testimonial-card">
          <p>{!! the_content() !!}</p>

          <strong class="mt-12 block">{!! the_title() !!}</strong>
          <p>{!! $source !!}</p>
        </div>
        @endwhile
        @php wp_reset_postdata() @endphp
      </div>
    </div>
  </section>
