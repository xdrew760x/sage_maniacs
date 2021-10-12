{{--
  Title: Home Listing
  Description: Display a various amount of homes for sale
  Category: sale_blocks
  Icon: star-filled
  Keywords: homes
  Mode: preview
  Align: full
  --}}

  @php
  $pad_y = get_field('padding_y');
  $background_image = get_field('background_image');
  $color_bg = get_field('color_back');
  $content_full = get_field('content_full');
  $text_white = get_field('font_white');
  $list_amount = get_field('amount_of_homes_to_display');
  $header = get_field('component_type', 'options');


  //// Post Query and Args
  //
  $homes = new WP_Query([
  'post_type'       =>  array('homes-for-sale'),
  'paged'           => get_query_var('paged') ? get_query_var('paged') : 1,
  'posts_per_page'  =>  $list_amount,
  'meta_key' => 'price_home',
  'orderby'  => 'meta_value_num',
  'order'	=> 'DESC'

  ]);
  @endphp

  <section id="{{ $block['id'] }}" class="preview-none section-col-full section-home-listing {!! $text_white !!} relative z-40" style="">
    <div class="container">
      {!! $content_full !!}
    </div>
    <div class="container mt-12 px-0">
      <div class="home-listing flex flex-row flex-wrap justify-start">
        @while ($homes->have_posts()) @php $homes->the_post(); @endphp
        @php
        $lot_number = get_post_field('lot_number');
        $bedrooms = get_post_field('bedrooms_home');
        $bath = get_post_field('bathrooms_home');
        $price = get_post_field('price_home');
        $feat_img_url = get_the_post_thumbnail_url();
        @endphp
        <div class="home-item w-full lg:w-1/3 px-2 mb-4">
          <div class="home-meta text-center py-6 px-4">
            <a href="{!! get_permalink() !!}">
              <div class="home-image mb-4 bg-white" style="background-image: url('{!! $feat_img_url ?: $header['branding_logo']['url'] !!}')" aria-label="{!! the_title() !!} Featured Image">
                <!-- Home Image -->
              </div>
            </a>

            <h6>{!! the_title() !!}</h6>
            <p class="mb-1">Listing # {!! $lot_number !!}</p>
            <p class="mb-4 lg:flex lg:flex-row lg:items-center lg:justify-center listing-meta">${!! number_format( $price, 0 ) !!}  &#124; {!! $bedrooms !!} BR &#124; {!! $bath !!} BA</p>

            <a href="{!! get_permalink() !!}" class="button button--third">View Home</a>
          </div>
        </div>
        @endwhile
        @php wp_reset_postdata() @endphp
      </div>
    </div>
    @if(!is_front_page())
    <div class="container pagination mt-4">
      <?php if ($homes->max_num_pages > 1) { ?>
        <div class="result-pagination mt-45">
          <?php  $big = 999999999; // need an unlikely integer
          echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $homes->max_num_pages,
            'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
          ) );
          wp_reset_postdata();?>
        </div>
      <?php } ?>
    </div>
    @endif
  </section>

  <style>
    #{{ $block['id'] }} {
      --card-bg-clr: {{ get_field('home_card_bg_color') }};
      padding: {!! $pad_y !!}px 0;
      background-color: {!! $color_bg !!};
      background-image: url('{!! $background_image !!}');
    }
  </style>
