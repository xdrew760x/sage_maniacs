{{--
  Title: Static Hero
  Description: Hero Component for Static Image and Text
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
  $content = get_field('content_hero');
  $c_width = get_field('width_content');
  $c_pos = get_field('position_content');
  @endphp

  <style>
  :root {
    --hero-bg: url('{{ get_field('image_hero') }}');
    --hero-height-desk: {{ get_field('height_desktop') }}px;
    --hero-height-mob: {{ get_field('height_mobile') }}px;
  }
  </style>

  <section class="preview-none section-brm--hero hero-static flex justify-center items-center bg-cover bg-center text-white">
    <div class="container">
      <div class="hero_content mx-auto block {!! $c_width !!} {!! $c_pos !!}">
        {!! $content !!}
      </div>
    </div>
  </section>
