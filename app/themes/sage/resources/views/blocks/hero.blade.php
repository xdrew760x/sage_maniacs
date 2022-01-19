{{--
  Title: Hero
  Description: Hero Component for Static / Slider / Video
  Category: hero_blocks
  Icon: <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" id="footer-sample-full" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" class="iconify iconify--bx"><path d="M20 3H4a2 2 0 0 0-2 2v2a2 2 0 0 0 1 1.72V19a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8.72A2 2 0 0 0 22 7V5a2 2 0 0 0-2-2zM4 5h16v2H4zm1 14V9h14v10z" fill="currentColor"></path><path d="M8 11h8v2H8z" fill="currentColor"></path></svg>
  Keywords: Hero
  Mode: preview
  Align: full
  --}}

  @php
    $dot_nav = get_field('dot_navigation');
    $arrow_nav = get_field('arrow_nav');
    $c_width = get_field('width_content');
    $c_pos = get_field('position_content');
    $video = get_field('video_file_mp4');
    $video_mp4 = get_field('video_file_mp4');
    $video_webm = get_field('video_file_webm');
    $video_position = get_field('video_position');
    $remove_hero_nav = get_field('remove_hero_nav');
  @endphp

  <div class="block_preview hidden">
    <img src="/app/themes/sage/resources/assets/images/block-previews/hero.jpg" alt="{{ $block['keywords'][0] }}">
  </div>

  @if(is_admin())
  <script type="text/javascript" src="/app/themes/sage/resources/assets/scripts/slick.min.js"></script>
  @endif

  <script type="text/javascript">
  //// Carousel Hero
  jQuery(document).ready( function($){
    $('.hero-slider').slick({
      accessibility: true,
      infinite : false,
      autoplay: true,
      autoplaySpeed: 4000,
      fade: false,
      speed: 1000,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: {{ $dot_nav }},
      arrows: {{ $arrow_nav }},
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

  <section id="{{ $block['id'] }}" class="section-brm--hero relative {!! $remove_hero_nav !!} preview-none ">
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
      $hero_desktop = get_sub_field('image_hero');

      @endphp
      <div class="hero-item bg-cover bg-top @if(!$video) bg-gray @endif text-white">
        <div class="container">
          <div class="hero_content mx-auto block sm:w-full lg:{!! $c_width !!} {!! $c_pos !!} py-12">
            {!! $content !!}
          </div>
        </div>
      </div>
      @endwhile
      @endif
    </div>
  </section>

  <style>
    #{{ $block['id'] }} {
      --hero-height-desk: {{ get_field('height_desktop') }}px;
      --hero-height-mob: {{ get_field('height_mobile') }}px;
      --hero-clr: {{ get_field('hero_content_clr') }};
    }

    #{{ $block['id'] }} .hero-item {
      background-image: url({{ $hero_desktop }});
    }
  </style>
