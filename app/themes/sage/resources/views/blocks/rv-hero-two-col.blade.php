{{--
  Title: RV Hero Two Column
  Description: Hero Component for RV Style Websites with Two Columns
  Category: hero_blocks
  Icon:
  Keywords: Hero
  Mode: preview
  Align: full
  --}}

  <div class="block_preview hidden w-full">
    <img src="/app/themes/sage/resources/assets/images/block-previews/hero.png" class="w-full" alt="{{ $block['keywords'][0] }}">
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

  <section class="preview-none section-brm--hero rv-hero--col bg-gray flex flex-row flex-wrap justify-end">
    <div class="hero_content p-4 flex justify-center items-center">
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
        @endphp

        <div class="hero_image bg-cover bg-top"  @if($image_col) style="background-image: url('{!! $image_col !!}')" @endif>
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
    --rv-color--hero: {{ get_field('content_clr_col') }};
  }
  </style>
