{{--
  Title: Hero
  Description: Hero Component for Static / Slider / Video
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
  //// Carousel Hero
  jQuery(document).ready( function($){
    $('.hero-slider').slick({
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
          breakpoint: 1023,
          settings: {
            dots: false,
            arrows: false,
          },
        },
      ],
    });
  });
  </script>


  @php
  $c_width = get_field('width_content');
  $c_pos = get_field('position_content');
  $video = get_field('video_file_mp4');
  $video_mp4 = get_field('video_file_mp4');
  $video_webm = get_field('video_file_webm');
  $video_position = get_field('video_position');

  @endphp


  <section class="preview-none section-brm--hero relative">
    @if($video)
    <video class="hero__video {!! $video_position ?: 'absolute' !!}" preload="auto" autoplay loop muted playsinline>
      <source src="{!! $video_mp4 !!}" type="video/mp4"/>
      <source src="{!! $video_webm !!}" type="video/webm"/>
    </video>
    @endif
    <div class="hero-slider relative z-40">
      @if( have_rows('hero_slide') )
      @while( have_rows('hero_slide') ) @php the_row() @endphp
      @php
      $content = get_sub_field('content_hero');
      $hero_bg = get_sub_field('image_hero');

      // Set hero background
      $hero_mobile = get_sub_field('image_hero')['sizes']['w960x800'];
      $hero_desktop = get_sub_field('image_hero')['sizes']['w1920x800'];

      @endphp
      <div class="hero-item bg-cover bg-top @if(!$video) bg-gray @endif text-white" style="background: -webkit-image-set( url({!! $hero_desktop !!}) 1x, url({!! $hero_mobile !!}) 2x );">
        <div class="container flex justify-center items-center">
          <div class="hero_content mx-auto block {!! $c_width !!} {!! $c_pos !!} p-12">
            {!! $content !!}
          </div>
        </div>
      </div>
      @endwhile
      @endif
    </div>
  </section>

  <style>
  :root {
    --hero-height-desk: {{ get_field('height_desktop') }}px;
    --hero-height-mob: {{ get_field('height_mobile') }}px;
    --hero-clr: {{ get_field('hero_content_clr') }};
  }
  </style>
