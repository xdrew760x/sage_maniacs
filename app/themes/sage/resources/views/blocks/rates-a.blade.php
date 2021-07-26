{{--
  Title: Rates - Cards
  Description: Your desired amount of Cards containing Rate information
  Category: rate_blocks
  Icon: <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="48" height="48" role="img" aria-hidden="true" focusable="false"><path d="M19 6H6c-1.1 0-2 .9-2 2v9c0 1.1.9 2 2 2h13c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-4.1 1.5v10H10v-10h4.9zM5.5 17V8c0-.3.2-.5.5-.5h2.5v10H6c-.3 0-.5-.2-.5-.5zm14 0c0 .3-.2.5-.5.5h-2.6v-10H19c.3 0 .5.2.5.5v9z"></path></svg>
  Keywords: column
  Mode: preview
  Align: full
  --}}

  <div class="block_preview hidden w-full">
    <img src="/app/themes/sage/resources/assets/images/block-previews/hero.png" class="w-full" alt="{{ $block['keywords'][0] }}">
  </div>

  @php
  $rates_blurb = get_field('rates_blurb');
  $rate_bg = get_field('rates_bg');
  $rate_pady = get_field('rate_pady');
  $font_white = get_field('font_white_rates');
  $i = 1;
  @endphp

  <section class="preview-none section-rates-cards " style="background-color: {!! $rate_bg !!} ; padding: {!! $rate_pady !!}px 0;">
    <div class="container">
      <div class="blurb {!! $font_white !!}">
        {!! $rates_blurb !!}
      </div>

      @if( have_rows('card_spawn') )
      <div class="mt-12 lg:mt-24 flex justify-center flex-wrap flex-row">
        @while( have_rows('card_spawn') ) @php the_row() @endphp
        @php
        $rate = get_sub_field('rate_value');
        $rate_meta = get_sub_field('rate_meta');
        $card_bg_clr = get_sub_field('card_bg_color');
        $booking = get_sub_field('booking_link');
        @endphp
        <div class="p-2 w-full md:w-1/2 lg:w-1/3 card-{!! $i++ !!}">
          <div class="bg-white h-full rounded-lg shadow-lg">
              <div class="p-6 h-full flex flex-wrap items-center justify-between flex-col" style="background-color: {!! $card_bg_clr !!}">
                {!!$rate_meta!!}
              </div>
            </div>
          </div>
          @endwhile
        </div>
        @endif
      </div>
    </section>
