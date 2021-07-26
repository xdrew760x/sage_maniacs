{{--
  Title: Full Column
  Description: Full width Column with various Controls
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
  $padding_top_full = get_field('padding_top_full');
  $padding_bottom_full = get_field('padding_bottom_full');
  $background_image = get_field('background_image');
  $color_bg = get_field('color_back');
  $content_full = get_field('content_full');
  $text_white = get_field('font_white');
  $section_has_bg = $background_image ? 'section-has-bg' : '';
  @endphp

  <section id="{!! wp_unique_id('full-col-') !!}" class="preview-none section-col-full {!! $text_white !!} relative z-40 {!! $color_bg !!} {!! $section_has_bg !!}" style="padding: {!! $padding_top_full !!}px 0 {!! $padding_bottom_full !!}px 0; background-image: url('{!! $background_image !!}')">
    <div class="container">
      {!! $content_full !!}
    </div>
  </section>
