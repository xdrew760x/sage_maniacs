{{--
  Title: Portals
  Description: Full width Column with Portal Links
  Category: column_blocks
  Icon: <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="48" height="48" role="img" aria-hidden="true" focusable="false"><path d="M19 6H6c-1.1 0-2 .9-2 2v9c0 1.1.9 2 2 2h13c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-4.1 1.5v10H10v-10h4.9zM5.5 17V8c0-.3.2-.5.5-.5h2.5v10H6c-.3 0-.5-.2-.5-.5zm14 0c0 .3-.2.5-.5.5h-2.6v-10H19c.3 0 .5.2.5.5v9z"></path></svg>
  Keywords: column
  Mode: preview
  Align: full
  --}}

  <div class="block_preview hidden w-full">
    <img src="/app/themes/sage/resources/assets/images/block-previews/portal-cards.jpg" class="w-full" alt="{{ $block['keywords'][0] }}">
  </div>

  @php
  $padding_top_full = get_field('padding_top_full');
  $padding_bottom_full = get_field('padding_bottom_full');
  $horizontal_padding = get_field('horizontal_padding');
  $background_image = get_field('background_image');
  $color_bg = get_field('color_back');
  $content_full = get_field('content_full');
  $text_white = get_field('font_white');
  $section_has_bg = $background_image ? 'section-has-bg' : '';
  $portal_margin = get_field('portal_margin');
  @endphp

  <section id="{{ $block['id'] }}" class="preview-none section-col-full p-0 section-portals {!! $text_white !!} relative z-40 {!! $color_bg !!} {!! $section_has_bg !!}">
    <div class="container">

      {!! $content_full !!}
      <div class="portal-cards relative" style="top: {!! $portal_margin !!}px;">
        @if( have_rows('portals_creater') )
        @while( have_rows('portals_creater') )  @php the_row() @endphp
        @php
        $portal_content = get_sub_field('portal_content');
        $portal_url = get_sub_field('portal_url');
        $hover_content = get_sub_field('hover_content');
        @endphp
        <div class="portal">
          <a href="{!! $portal_url !!}">
            <div class="portal--inner">
              {!! $portal_content !!}
            </div>

            <div class="hover-content text-white">
              {!! $hover_content !!}
            </div>
          </a>
        </div>
        @endwhile
        @endif
      </div>
    </div>
  </section>

  <style>
  #{{ $block['id'] }} {
    padding: {!! $padding_top_full !!}px 0 {!! $padding_bottom_full !!}px 0;
    background-image: url('{!! $background_image !!}');
  }

  @media only screen and (min-width: 1024px){
    #{{ $block['id'] }} > .container {
      padding: 0 {!! $horizontal_padding !!}px;
    }
  }


  </style>
