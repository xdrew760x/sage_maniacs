<!---
Header A
----->
@php
//Variables
$meta = get_field('meta_fields', 'options');
$header = get_field('component_type', 'options');
//fonts
$nav_font = get_field('primary_menu_fam', 'options');
$nav_fontformat = pathinfo( $nav_font['filename'], PATHINFO_EXTENSION);
$nav_fonturl = $nav_font['url'];

$meta_font = get_field('meta_font_fam', 'options');
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

<div class="header header-component-a @if($header['fixed_position']) header-fixed-a @endif">
  <!-- Header Top Portion
  Contains Address & Phone Number.
  ACF - "/wp/wp-admin/post.php?post=137&action=edit" -->

  <div class="header__top">
    <!-- Mobile Menu Toggle Control
    JS - "/resources/assets/scripts/main.js" -->

    <div class="container flex justify-between lg:justify-end items-center py-4 lg:py-0">
      <button class="nav-control lg:hidden" aria-label="Click here to toggle mobile navigation">
        <span class="block relative w-full h-hamburger"></span>
      </button>

      <div class="flex justify-start items-center">
        @if( $meta['street_address'] )
        <a href="https://www.google.com/maps/dir/?api=1&destination={{ $meta['street_address'] }}+{{ $meta['city_name'] }}+{{ $meta['state'] }}+{{ $meta['zipcode'] }}"><i class="fas fa-map-marker-alt mr-2"></i> <span class="hidden lg:inline-block">Get Directions</span></a>
        @endif
        @if( $meta['phone_number'] )
        <a href="tel:{{ preg_replace('/[^0-9]/', '', $meta['phone_number']) }}" class="ml-4"><i class="fas fa-phone mr-2"></i>  <span class="hidden lg:inline-block">{{ $meta['phone_number'] }}</span></a>
        @endif
        @if( $meta['reservation_url'] )
        <a href="{!! $meta['reservation_url'] !!}" class="ml-4 button button--primary hidden lg:inline-block">Book Now</a>
        @endif
      </div>
    </div>
  </div>

  <!-- Header Bottom Portion
  Contains Website Branding and Primary Navigtion.
  ACF - "/wp/wp-admin/post.php?post=137&action=edit"
  Branding - "/wp/wp-admin/admin.php?page=theme-options" -->

  <div class="header__bottom -mt-4 lg:mt-0">
    <div class="container lg:flex lg:justify-between lg:items-center">
      <a class="header__branding my-3" href="{{ home_url('/') }}">
        @if( $header['branding_logo'] )
        <img src="{{ $header['branding_logo']['url'] }}" alt="{{ get_bloginfo('name', 'display') }}" />
        @else
        <img src="/app/themes/sage/resources/assets/images/bigrigxpress.svg" alt="{{ get_bloginfo('name', 'display') }}" />
        @endif
      </a>
      <nav class="hidden lg:inline-block">
        @if (has_nav_menu('header_nav_a'))
        {!! wp_nav_menu(['theme_location' => 'header_nav_a', 'menu_class' => 'header_nav_a', 'container' => '']) !!}
        @endif
        <div class="flex flex-col justify-start lg:hidden mt-3">
          @if( $meta['phone_number'] )
          <a href="tel:{{ preg_replace('/[^0-9]/', '', $meta['phone_number']) }}" class="text-white mt-1"><i class="fas fa-phone mr-2"></i> {{ $meta['phone_number'] }}</a>
          @endif
          @if($meta['street_address'])
          <a href="https://www.google.com/maps/dir/?api=1&destination={{ $meta['street_address'] }}+{{ $meta['city_name'] }}+{{ $meta['state'] }}+{{ $meta['zipcode'] }}" class="text-white mt-5 uppercase"><i class="fas fa-map-marker-alt mr-2"></i> Get Directions</a>
          @endif
          @if( $meta['reservation_url'] )
          <a href="{!! $meta['reservation_url'] !!}" class="button button--secondary mt-4 desktop-none">Book Now</a>
          @endif
        </div>
      </nav>
    </div>
  </div>
</div>
