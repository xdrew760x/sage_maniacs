@php
//Variables
$address = get_field('address_theme', 'options');
$city = get_field('city_name', 'options');
$state = get_field('state', 'options');
$zip = get_field('zipcode', 'options');
$phone = get_field('phone_number', 'options');
$booking = get_field('reservation_url', 'options');
$bg_color_top = get_field('top_bg_color', 'options');
@endphp

<div class="header-component-a">
  <!-- Header Top Portion
  Contains Address & Phone Number.
  ACF - "/wp/wp-admin/post.php?post=137&action=edit" -->

  <div class="header__top {!! $bg_color_top ?: 'bg-white' !!} @if($bg_color_top) text-white @endif">
    <!-- Mobile Menu Toggle Control
    JS - "/resources/assets/scripts/main.js" -->

    <button class="nav-control lg:hidden" aria-label="Click here to toggle mobile navigation">
      <span class="block relative w-full h-hamburger"></span>
    </button>

    <div class="container flex justify-end items-center">
      @if( $address )
      <a href="https://www.google.com/maps/dir/?api=1&destination={{ $address }}+{{ $state }}+ {{ $zip }}"><i class="fas fa-map-marker-alt"></i> <span class="hidden md:inline-block">Get Directions</span></a>
      @endif
      @if( $phone )
      <a href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}" class="ml-4"><i class="fas fa-map-marker-alt"></i>  <span class="hidden md:inline-block">{{ $phone }}</span></a>
      @endif
      @if( $booking )
      <a href="{!! get_permalink(262) !!}" class="ml-4 button button--primary hidden md:inline-block">Book Now</a>
      @endif
    </div>
  </div>

  <!-- Header Bottom Portion
  Contains Website Branding and Primary Navigtion.
  ACF - "/wp/wp-admin/post.php?post=137&action=edit"
  Branding - "/wp/wp-admin/admin.php?page=theme-options" -->

  <div class="header__bottom">
    <div class="container flex justify-between items-center">
      <a class="header__branding my-3" href="{{ home_url('/') }}">
        @if( $branding )
        <img src="{{ $branding }}" alt="{{ get_bloginfo('name', 'display') }}" />
        @else
        <img src="/app/themes/sage/resources/assets/images/bigrigxpress.svg" alt="{{ get_bloginfo('name', 'display') }}" />
        @endif
      </a>
      <nav class="hidden lg:inline-block">
        @if (has_nav_menu('header_nav_a'))
        {!! wp_nav_menu(['theme_location' => 'header_nav_a', 'menu_class' => 'header_nav_a', 'container' => '']) !!}
        @endif
        <div class="mobile__meta inline-block md:hidden">
          @if( $phone )
          <a href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}"><i class="fas fa-phone"></i> {{ $phone }}</a>
          @endif
          @if($address)
          <a href="{!! $map_link !!}"><i class="fas fa-map-marker-alt"></i> Get Directions</a>
          @endif
          @if( $booking )
          <a href="{!! get_permalink(262) !!}" class="button button--primary mt-15 desktop-none">Book Now</a>
          @endif
        </div>
      </nav>
    </div>
  </div>
</div>

test
