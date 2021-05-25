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
            dots: true,
            arrows: false,
          },
        },
      ],
    });
  });
  </script>


  @php
  $c_width = get_field('width_content', 'options');
  $c_pos = get_field('position_content', 'options');
  @endphp


  <section class="section-brm--hero hero-blog">
    <div class="hero-slider relative z-40">
      @if( have_rows('hero_slide', 'options') )
      @while( have_rows('hero_slide', 'options') ) @php the_row() @endphp
      @php
      $content = get_sub_field('content_hero', 'options');
      $hero_bg = get_sub_field('image_hero', 'options');
      @endphp
      <div class="hero-item bg-cover bg-center @if(!$video) bg-gray @endif text-white" @if($hero_bg) style="background-image: url('{!! $hero_bg !!}')" @endif>
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
    --hero-height-desk: {{ get_field('height_desktop', 'options') }}px;
    --hero-height-mob: {{ get_field('height_mobile', 'options') }}px;
    --hero-clr: {{ get_field('hero_content_clr', 'options') }};
  }
  </style>
