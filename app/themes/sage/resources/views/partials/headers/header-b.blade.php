<!---
Header B
----->
@php
$meta = get_field('meta_fields', 'options');
$header = get_field('component_type', 'options');

//fonts
$nav_font = $header['primary_menu_fam'];
$nav_fontformat = pathinfo( $nav_font['filename'], PATHINFO_EXTENSION);
$nav_fonturl = $nav_font['url'];

$meta_font = $header['meta_font_fam'];
$meta_fontformat = pathinfo( $meta_font['filename'], PATHINFO_EXTENSION);
$meta_fonturl = $meta_font['url'];

@endphp

<style>
@font-face {
  font-family: 'nav-font';
  src: url("{!! $nav_fonturl !!}") format("{{ $nav_fontformat }}");
  font-weight: normal;
  font-style: normal;
  font-display: swap;
}

@font-face {
  font-family: 'meta-font';
  src: url("{!! $meta_fonturl !!}") format("{{ $meta_fontformat }}");
  font-weight: normal;
  font-style: normal;
  font-display: swap;
}
</style>

<div class="header header-component-b @if($header['fixed_position']) header-fixed-b @endif">
  <div class="header__top">
    <div class="container flex justify-between items-center py-3 lg:py-0">
      <!-- Mobile Menu Toggle Control
      JS - "/resources/assets/scripts/main.js" -->

      <button class="nav-control lg:hidden" aria-label="Click here to toggle mobile navigation">
        <span class="block relative w-full h-hamburger"></span>
      </button>

      <div class="inline-block meta-contact">
        @if( $meta['phone_number'] )
        <a href="tel:{{ preg_replace('/[^0-9]/', '', $meta['phone_number']) }}" class="mr-4"><i class="fas fa-phone mr-2" style="color:{!! $header['top_icon_color'] !!}"></i>  <span class="hidden lg:inline-block">{{ $meta['phone_number'] }}</span></a>
        @endif

        @if( $meta['street_address'] )
        <a href="https://www.google.com/maps/dir/?api=1&destination={{ $meta['street_address'] }}+{{ $meta['city_name'] }}+{{ $meta['state'] }}+{{ $meta['zipcode'] }}"><i class="fas fa-map-marker-alt mr-2" style="color:{!! $header['top_icon_color'] !!}"></i> <span class="hidden lg:inline-block">Get Directions</span></a>
        @endif
      </div>

        @if( $header['header_button_text'] )
        <div class="inline-block hidden lg:inline-block">
            <a href="{!! $header['header_button_url'] !!}" class="ml-4 button button--{!! $header['button_primary_color'] !!} hidden lg:inline-block">{!! $header['header_button_text'] !!}</a>
        </div>
        @endif
    </div>
  </div>


  <!-- Header Bottom Portion
  Contains Website Branding and Primary Navigtion.
  ACF - "/wp/wp-admin/post.php?post=137&action=edit"
  Branding - "/wp/wp-admin/admin.php?page=theme-options" -->

  <div class="header__bottom">
    <div class="container flex justify-center lg:justify-between items-center">

      <a class="header__branding my-3" href="{{ home_url('/') }}">
        @if( $header['branding_logo'] )
        <img src="{{ $header['branding_logo']['url'] }}" alt="{{ get_bloginfo('name', 'display') }}" />
        @else
        <img src="/app/themes/sage/resources/assets/images/bigrigxpress.svg" alt="{{ get_bloginfo('name', 'display') }}" />
        @endif
      </a>

      <nav class="hidden w-full lg:flex lg:flex-row lg:justify-between">
        @if (has_nav_menu('header_nav_b_l'))
        {!! wp_nav_menu(['theme_location' => 'header_nav_b_l', 'menu_class' => 'header_nav_b nav_left', 'container' => '']) !!}
        @endif

        @if (has_nav_menu('header_nav_b_r'))
        {!! wp_nav_menu(['theme_location' => 'header_nav_b_r', 'menu_class' => 'header_nav_b nav_right', 'container' => '']) !!}
        @endif

        <div class="flex flex-col justify-start lg:hidden mt-4">
          @if( $meta['phone_number'] )
          <a href="tel:{{ preg_replace('/[^0-9]/', '', $meta['phone_number']) }}" class="text-white mt-1"><i class="fas fa-phone mr-2" style="color:{!! $header['top_icon_color'] !!}"></i> {{ $meta['phone_number'] }}</a>
          @endif
          @if($meta['street_address'])
          <a href="https://www.google.com/maps/dir/?api=1&destination={{ $meta['street_address'] }}+{{ $meta['city_name'] }}+{{ $meta['state'] }}+{{ $meta['zipcode'] }}" class="text-white mt-5 uppercase"><i class="fas fa-map-marker-alt mr-2" style="color:{!! $header['top_icon_color'] !!}"></i> Get Directions</a>
          @endif
          @if( $header['header_button_text'] )
            <p>
              <a href="{!! $header['header_button_url'] !!}" class="mt-15 button button--{!! $header['button_primary_color'] !!} lg:inline-block">{!! $header['header_button_text'] !!}</a>
            </p>
          @endif
        </div>
      </nav>
    </div>
  </div>
</div>
