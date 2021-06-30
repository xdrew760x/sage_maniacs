{{--
  Title: Two Column
  Description: Two half width Columns with various Controls
  Category: column_blocks
  Icon: <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="48" height="48" role="img" aria-hidden="true" focusable="false"><path d="M19 6H6c-1.1 0-2 .9-2 2v9c0 1.1.9 2 2 2h13c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-4.1 1.5v10H10v-10h4.9zM5.5 17V8c0-.3.2-.5.5-.5h2.5v10H6c-.3 0-.5-.2-.5-.5zm14 0c0 .3-.2.5-.5.5h-2.6v-10H19c.3 0 .5.2.5.5v9z"></path></svg>
  Keywords: column
  Mode: preview
  Align: full
  --}}

  <div class="block_preview hidden w-full">
    <img src="/app/themes/sage/resources/assets/images/block-previews/hero.png" class="w-full" alt="{{ $block['keywords'][0] }}">
  </div>

  @php
  $pad_y = get_field('col_padding_y');
  $contain = get_field('add_container');
  $master_bg = get_field('master_bg_color');
  $margin_bottom = get_field('margin_bottom');
  $margin_top = get_field('margin_top');


  // Column one  -
  $col_image = get_field('col_image');
  $enable_image_float = get_field('enable_image_float');
  $col_bg_clr = get_field('col_bg_clr');
  $col_content = get_field('col_content');
  $slide_one = get_field('apply_slider_one');
  $img_left = get_field('images_left');
  $bleed_left = get_field('bleed_left');
  $bleed_color_left = get_field('bleed_color_left');
  $text_white = get_field('font_white');


  // Column two
  $col_image_two = get_field('col_image_two');
  $enable_image_float_two = get_field('enable_image_float_sec');
  $col_bg_clr_two = get_field('col_bg_clr_two');
  $col_content_two = get_field('col_content_two');
  $text_white_two = get_field('font_white_two');
  $slide_two = get_field('apply_slider');
  $img_right = get_field('images_right');
  $bleed_color_right = get_field('bleed_color_right');
  $bleed_right = get_field('bleed_right');
  @endphp

  @if(is_admin())
  <script type="text/javascript" src="/app/themes/sage/resources/assets/scripts/slick.min.js"></script>

  <script type="text/javascript">
  //// Carousel Hero
  jQuery(document).ready( function($){

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
      });
    }
  });
  </script>
  @endif

  <section class="preview-none section-col-split {!! $master_bg !!}" style="margin-bottom: {!! $margin_bottom !!}px; margin-top: {!! $margin_top !!}px">
    <div class="{!! $contain !!} flex flex-row flex-wrap relative @if($enable_image_float) lg:justify-end @else lg:justify-between @endif ">
      <!-- Column one  -->
      @if($slide_one)
      <div class="{!! $slide_one !!} column-one w-full lg:w-1/2 py-4 lg:py-0 @if($col_image) bg-image @endif {!! $enable_image_float !!}-l-col">
        @if($col_image)
        <div class="column w-full h-full mx-2 lg:mx-0 bg-cover {!! $text_white !!}" style="background-image: url('{!! $col_image !!}'); padding: {!! $pad_y !!}px 0;"></div>
        @endif
        @foreach( $img_left as $image_left )
        <div class="column w-full h-full mx-2 lg:mx-0 bg-cover {!! $text_white !!}" style="background-image: url('{!! $image_left !!}'); padding: {!! $pad_y !!}px 0;">
          <!-- Image  -->
        </div>
        @endforeach
      </div>
      @else
      <div class="column column-one w-full lg:w-1/2 bg-cover {!! $text_white !!} @if($col_image) bg-image @endif @if($col_bg_clr) bg-color @endif flex justify-center items-start {!! $enable_image_float !!}-l-col {!! $col_bg_clr !!} {!! $bleed_left !!} {!! $bleed_color_left !!}" style="background-image: url('{!! $col_image !!}'); padding: {!! $pad_y !!}px 0;">
        <div class="@if(!$contain) inner px-5 @endif @if($contain) lg:pr-5 @endif">
          {!! $col_content !!}
        </div>
      </div>
      @endif
      <!-- Column two  -->
      @if($slide_two)
      <div class="{!! $slide_two !!} column-two w-full lg:w-1/2 py-4 lg:py-0 @if($col_image_two) bg-image @endif @if($col_bg_clr_two) bg-color @endif {!! $enable_image_float_two !!}-r-col {!! $bleed_right !!} {!! $bleed_color_right !!}">
        @if($col_image_two)
        <div class="column w-full mx-2 lg:mx-0 bg-cover {!! $text_white_two !!} " style="background-image: url('{!! $col_image_two !!}');padding: {!! $pad_y !!}px 0;"></div>
        @endif
        @foreach( $img_right as $image_right )
        <div class="column w-full mx-2 lg:mx-0 bg-cover {!! $text_white_two !!} " style="background-image: url('{!! $image_right !!}');padding: {!! $pad_y !!}px 0;">
          <!-- Image  -->
        </div>
        @endforeach
      </div>
      @else
      <div class="column column-two w-full lg:w-1/2 bg-cover {!! $text_white_two !!} @if($col_image_two) bg-image @endif @if($col_bg_clr_two) bg-color @endif {!! $enable_image_float_two !!}-r-col {!! $col_bg_clr_two !!} {!! $bleed_right !!} {!! $bleed_color_right !!}" style="background-image: url('{!! $col_image_two !!}');padding: {!! $pad_y !!}px 0;">
        <div class="@if(!$contain) inner px-5 @endif @if($contain) lg:pl-5 @endif">
          {!! $col_content_two !!}
        </div>
      </div>
      @endif
    </div>
  </section>
