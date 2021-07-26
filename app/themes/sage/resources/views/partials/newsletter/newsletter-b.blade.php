@php
$pad_y = get_field('col_padding_y', 'options');

// Column one  -
$col_bg_clr = get_field('master_bg_color', 'options');
$col_content = get_field('col_content', 'options');
$text_white = get_field('font_white', 'options');
$meta_fields = get_field('meta_fields', 'options')
@endphp

<section class="section-col-split section-newsletter-social {!! $text_white !!} border-t-1 border-gray" style="background-color: {!! $col_bg_clr !!};">
  <div class="container flex flex-row flex-wrap justify-center relative">
    <!-- Column one  -->
    <div class="column column-one w-full" style="padding: {!! $pad_y !!}px 0;">
      {!! $col_content !!}
    </div>
  </div>
</section>

<style>
:root {
  --icon-clr: {!! $meta_fields['color_icon'] !!}
}
</style>
