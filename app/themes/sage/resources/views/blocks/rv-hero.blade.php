{{--
  Title: RV Hero
  Description: Hero Component for RV Style Websites
  Category: hero_blocks
  Icon: <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" id="footer-sample-full" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20" class="iconify iconify--dashicons"><path d="M6.4 3.776v3.648H2.752v1.792H6.4v3.648h1.728V9.216h3.712V7.424H8.128V3.776zM0 17.92V0h20.48v17.92H0zM12.8 1.28H1.28v14.08H12.8V1.28zm6.4 0h-5.12v3.84h5.12V1.28zm0 5.12h-5.12v3.84h5.12V6.4zm0 5.12h-5.12v3.84h5.12v-3.84z" fill="currentColor"></path></svg>
  Keywords: Hero
  Mode: preview
  Align: full
  --}}

  <div class="block_preview hidden w-full">
    <img src="/app/themes/sage/resources/assets/images/block-previews/hero-rv.jpg" class="w-full" alt="{{ $block['keywords'][0] }}">
  </div>

  @php
  $hero_bg_rv = get_field('hero_bg_rv');
  $content = get_field('rv_hero_content');
  $graphic = get_field('rv_hero_graphic');
  $  $graphic = get_field('rv_hero_graphic');
  $font_white = get_field('font_white_hero');
  @endphp

  <section class="preview-none section-brm--hero rv-hero bg-cover bg-center @if(!$video) bg-gray @endif py-6 {!! $font_white !!}" @if($hero_bg_rv) style="background-image: url('{!! $hero_bg_rv !!}')" @endif>
    <div class="container flex flex-row flex-wrap justify-start items-center relative">
      <div class="hero_content p-6 w-full lg:w-3/5">
        {!! $content !!}
      </div>

      @if($graphic)
      <img src="{!! $graphic !!}" alt="Happy, Lovely Couple wearing casual clothing in forground of RV Site" class="rv-graphic -mb-6">
      @endif
    </div>
  </section>

  <style>
  :root {
    --rv-height-desk: {{ get_field('height_desktop_rv') }}px;
    --rv-height-mob: {{ get_field('height_mobile_rv') }}px;
    --rv-color: {{ get_field('content_clr') }};
  }
  </style>
