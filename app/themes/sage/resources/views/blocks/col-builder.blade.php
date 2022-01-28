{{--
  Title: Column Builder
  Description: Create a Various amount of column at your control
  Category: column_blocks
  Icon: <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="48" height="48" role="img" aria-hidden="true" focusable="false"><path d="M19 6H6c-1.1 0-2 .9-2 2v9c0 1.1.9 2 2 2h13c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-4.1 1.5v10H10v-10h4.9zM5.5 17V8c0-.3.2-.5.5-.5h2.5v10H6c-.3 0-.5-.2-.5-.5zm14 0c0 .3-.2.5-.5.5h-2.6v-10H19c.3 0 .5.2.5.5v9z"></path></svg>
  Keywords: column
  Mode: preview
  Align: full
  --}}

  @if(is_admin())
  <div class="block_preview hidden w-full">
    <img src="/app/themes/sage/resources/assets/images/block-previews/col-build.jpg" class="w-full" alt="{{ $block['keywords'][0] }}">
  </div>
  @endif


  @php
  $contain = get_field('add_container');
  $master_bg_clr = get_field('master_bg_color');
  $master_bg_img = get_field('master_bg_image');
  $pad_y_top = get_field('padding_y_top');
  $pad_y_bottom = get_field('padding_y_bottom');
  $colid = 1;
  @endphp

  <section id="{{ $block['id'] }}" class="preview-none section-col-spawn {!! $master_bg_clr !!}">
    <div class="{!! $contain !!} flex flex-row flex-wrap justify-start relative items-start py-6 lg:py-0">
      <!-- Column one  -->
      @if( have_rows('column_options') )
      @while( have_rows('column_options') )  @php the_row() @endphp
      @php
      // Columns
      $col_width = get_sub_field('column_width');
      $col_marg = get_sub_field('column_margin');
      $col_margx = get_sub_field('column_margin_x');
      $col_image = get_sub_field('col_image');
      $enable_image_float = get_sub_field('enable_image_float');
      $image_height = get_sub_field('image_min_height');
      $col_bg_clr = get_sub_field('col_bg_clr');
      $col_content = get_sub_field('col_content');
      $pad_y = get_sub_field('padding_y_spawn');
      $pad_x = get_sub_field('padding_x_spawn');
      $text_white = get_sub_field('font_white_columns');
      $corner_border = get_sub_field('corner_border');
      @endphp
      <div class="columns my-4 column-{{ $colid }} {!! $text_white !!}">
        <div class="inner w-full h-full bg-cover  @if($col_image) bg-image @endif @if($col_bg_clr) bg-color @endif @if($corner_border) corner-border {!! $corner_border !!}@endif @if($corner_border == 'top-right') pr-6 pt-6 @endif @if($corner_border == 'bottom-right') pr-6 pb-6 @endif @if($corner_border == 'top-left') pl-6 pt-6 @endif @if($corner_border == 'bottom-left') pl-6 pb-6 @endif">
          {!! $col_content !!}
        </div>
      </div>
      <style>
      #{{ $block['id'] }} .column-{{ $colid }} {
        width: {!! $col_width !!}%;
      }

      #{{ $block['id'] }} .column-{{ $colid }} .inner {
        background-color: {!! $col_bg_clr !!};
        background-image: url('{!! $col_image !!}');
        padding-top: {!! $pad_y !!}px;
        padding-bottom: {!! $pad_y !!}px;
        padding-left: {!! $pad_x !!}px;
        padding-right: {!! $pad_x !!}px;
      }

      @media (min-width: 1024px) {
        #{{ $block['id'] }} .column-{{ $colid }} .inner {
          position: relative;
          top: {!! $col_marg !!}px;
          left: {!! $col_margx !!}px;
        }

        #{{ $block['id'] }} .column-{{ $colid }} .bg-image {
          min-height: {!! $image_height !!}px;
        }
      }
      </style>
      @php
      $colid++;
      @endphp
      @endwhile
      @endif
    </div>
  </section>

  <style>
  #{{ $block['id'] }} {
    background-image: url('{!! $master_bg_img !!}');
    padding: {!! $pad_y_top !!}px 0 {!! $pad_y_bottom !!}px 0;
  }
  </style>
