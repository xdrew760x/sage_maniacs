@php
//Variables
$address = get_field('address_theme', 'options');
$city = get_field('city_name', 'options');
$state = get_field('state', 'options');
$zip = get_field('zipcode', 'options');
$phone = get_field('phone_number', 'options');
$booking = get_field('reservation_url', 'options');
$bg_color_top = get_field('top_bg_color', 'options');
$header = get_field('component_type', 'options');
@endphp

<div class="header-component-a">
  <!-- Header Top Portion
  Contains Address & Phone Number.
  ACF - "/wp/wp-admin/post.php?post=137&action=edit" -->

  <div class="header__top {!! $bg_color_top ?: 'bg-white' !!} @if($bg_color_top) text-white @endif">
    <!-- Mobile Menu Toggle Control
    JS - "/resources/assets/scripts/main.js" -->

    <div class="container flex justify-between lg:justify-end items-center py-3 lg:py-0">
      <button class="nav-control lg:hidden" aria-label="Click here to toggle mobile navigation">
        <span class="block relative w-full h-hamburger"></span>
      </button>

      <div class="flex justify-start items-center">
        @if( $address )
        <a href="https://www.google.com/maps/dir/?api=1&destination={{ $address }}+{{ $state }}+ {{ $zip }}"><i class="fas fa-map-marker-alt mr-2"></i> <span class="hidden lg:inline-block">Get Directions</span></a>
        @endif
        @if( $phone )
        <a href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}" class="ml-4"><i class="fas fa-phone mr-2"></i>  <span class="hidden lg:inline-block">{{ $phone }}</span></a>
        @endif
        @if( $booking )
        <a href="{!! get_permalink(262) !!}" class="ml-4 button button--primary hidden lg:inline-block">Book Now</a>
        @endif
      </div>
    </div>
  </div>

  <!-- Header Bottom Portion
  Contains Website Branding and Primary Navigtion.
  ACF - "/wp/wp-admin/post.php?post=137&action=edit"
  Branding - "/wp/wp-admin/admin.php?page=theme-options" -->

  <div class="header__bottom">
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
        <div class="flex flex-col justify-start lg:hidden">
          @if( $phone )
          <a href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}" class="text-white mt-1"><i class="fas fa-phone mr-2"></i> {{ $phone }}</a>
          @endif
          @if($address)
          <a href="https://www.google.com/maps/dir/?api=1&destination={{ $address }}+{{ $state }}+ {{ $zip }}" class="text-white mt-3 uppercase"><i class="fas fa-map-marker-alt mr-2"></i> Get Directions</a>
          @endif
          @if( $booking )
          <a href="{!! get_permalink(262) !!}" class="button button--secondary mt-4 desktop-none">Book Now</a>
          @endif
        </div>
      </nav>
    </div>
  </div>
</div>
