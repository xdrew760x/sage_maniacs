{{--
  Title: Column Builder
  Description: Create a Various amount of column at your control
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
  $contain = get_field('add_container');
  $master_bg_clr = get_field('master_bg_color');
  $master_bg_img = get_field('master_bg_image');
  $pad_y_col = get_field('padding_y_column');
  @endphp

  <section class="preview-none section-col-spawn {!! $master_bg_clr !!}" style="background-image: url('{!! $master_bg_img !!}'); padding: {!! $pad_y_col !!}px 0;">
    <div class="{!! $contain !!} flex flex-row flex-wrap lg:justify-start relative px-0">
      <!-- Column one  -->
      @if( have_rows('column_options') )
      @while( have_rows('column_options') )  @php the_row() @endphp
      @php
      // Columns
      $col_width = get_sub_field('column_width');
      $col_image = get_sub_field('col_image');
      $enable_image_float = get_sub_field('enable_image_float');
      $col_bg_clr = get_sub_field('col_bg_clr');
      $col_content = get_sub_field('col_content');
      $pad_y = get_sub_field('padding_y_spawn');
      $pad_x = get_sub_field('padding_x_spawn');
      $text_white = get_sub_field('font_white_columns');
      @endphp
      <div class="columns my-4" style="padding: 0 {!! $pad_x !!}px; width: {!! $col_width !!}%;">
        <div class="inner w-full h-full bg-cover {!! $text_white !!} @if($col_image) bg-image @endif @if($col_bg_clr) bg-color @endif" style="background-color: {!! $col_bg_clr !!}; background-image: url('{!! $col_image !!}'); padding: {!! $pad_y !!}px 15px;">
          {!! $col_content !!}
        </div>
      </div>
      @endwhile
      @endif
    </div>
  </section>
