{{--
  Title: RV Hero Two Column
  Description: Hero Component for RV Style Websites with Two Columns
  Category: hero_blocks
  Icon: <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" id="footer-sample-full" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20" class="iconify iconify--dashicons"><path d="M14.08 12.864V9.216h3.648V7.424H14.08V3.776h-1.728v3.648H8.64v1.792h3.712v3.648zM0 17.92V0h20.48v17.92H0zM6.4 1.28H1.28v3.84H6.4V1.28zm0 5.12H1.28v3.84H6.4V6.4zm0 5.12H1.28v3.84H6.4v-3.84zM19.2 1.28H7.68v14.08H19.2V1.28z" fill="currentColor"></path></svg>
  Keywords: Hero
  Mode: preview
  Align: full
  --}}

  <div class="block_preview hidden w-full">
    <img src="/app/themes/sage/resources/assets/images/block-previews/hero-two-col.jpg" class="w-full" alt="{{ $block['keywords'][0] }}">
  </div>

  @if(is_admin())
  <script type="text/javascript" src="/app/themes/sage/resources/assets/scripts/slick.min.js"></script>
  @endif
  <script type="text/javascript">
  jQuery(document).ready( function($){
    if ($('.parent-slide').length) {
      $('.parent-slide').slick({
        arrows: false,
        autoplay: true,
        autoplaySpeed: 8000,
        asNavFor: '.child-slide',
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
      });
    }

    if ($('.child-slide').length) {
      $('.child-slide').slick({
        arrows: true,
        asNavFor: '.parent-slide',
        autoplay: true,
        autoplaySpeed: 8000,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        nextArrow: '<div class="next mr-15"><i class="fal fa-chevron-right text-white"></i></div>',
        prevArrow: '<div class="prev ml-15"><i class="fal fa-chevron-left text-white"></i></div>',
      });
    }
  });
  </script>

  @php
  $font_white = get_field('font_white_hero');
  @endphp

  <section id="{!! wp_unique_id('hero-two-col-') !!}" class="preview-none section-brm--hero rv-hero--col bg-gray flex flex-row flex-wrap justify-end {!! $font_white !!}">
    <div class="hero_content h-full p-4 flex justify-center items-center" style="background-color: {{get_field('content_clr_col')}}">
      <div class="child-slide w-full py-12">
        @while( have_rows('hero_column') )  @php the_row() @endphp
        <div class="content-slide">
          @php
          $content_col = get_sub_field('rv_col_content');
          @endphp
          {!! $content_col !!}
        </div>
        @endwhile
      </div>
    </div>
    <div class="hero_image_field">
      <div class="parent-slide">
        @while( have_rows('hero_column') )  @php the_row() @endphp
        @php
        $image_col = get_sub_field('image_col');
        $video_mp4 = get_sub_field('two_col_video');
        $video_webm = get_sub_field('two_col_webm');
        @endphp
        <div class="hero_image bg-cover bg-top" style="background-image: url('{!! $image_col !!}')">
          <!-- Work in progress, pretty jank if you try to mix video and image in slider. Works great when individual -->
          @if($video_mp4)
          <video class="hero__video" preload="auto" autoplay loop muted playsinline>
            <source src="{!! $video_mp4 !!}" type="video/mp4"/>
            <source src="{!! $video_webm !!}" type="video/webm"/>
          </video>
          @endif
          <!-- image -->
        </div>
        @endwhile
      </div>
    </div>
  </section>

  <style>
  :root {
    --rv-hero-col-desk: {{ get_field('height_col_rv') }}px;
    --rv-hero-col-mob: {{ get_field('height_mobile_col') }}px;
  }
  </style>
