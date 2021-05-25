{{--
  Title: RV Hero
  Description: Hero Component for RV Style Websites
  Category: hero_blocks
  Icon:
  Keywords: Hero
  Mode: preview
  Align: full
  --}}

  <div class="block_preview hidden w-full">
    <img src="/app/themes/sage/resources/assets/images/block-previews/hero.png" class="w-full" alt="{{ $block['keywords'][0] }}">
  </div>

  @php
  $hero_bg_rv = get_field('hero_bg_rv');
  $content = get_field('rv_hero_content');
  $graphic = get_field('rv_hero_graphic');
  @endphp


  <section class="preview-none section-brm--hero rv-hero bg-cover bg-center @if(!$video) bg-gray @endif py-6" @if($hero_bg_rv) style="background-image: url('{!! $hero_bg_rv !!}')" @endif>
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
