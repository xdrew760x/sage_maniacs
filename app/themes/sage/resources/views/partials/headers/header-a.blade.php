@php

$address = get_field('address1', 'options');
$city = get_field('city', 'options');
$state = get_field('state', 'options');
$zip = get_field('zipcode', 'options');

$header_booking = get_field('book_now_url', 'options');

$phone = get_field('phone_number', 'options');
$sec_phone = get_field('sec_number', 'options');

$park_map = get_field('park_map', 'options');

$covid = get_field('covid_message_link', 'options');
@endphp

<div class="header-a">
<div class="header__top bg-primary-5">
  <div class="container md:flex md:flex-row md:items-center md:justify-end hidden md:inline-block">


    @if($address)
    <a href="https://www.google.com/maps/dir/?api=1&destination={{ $address }}+{{ $state }}+ {{ $zip }}" class="md:ml-30 text-primary-3"><i class="fas fa-map-marker-alt"></i> Get Directions</a>
    @endif


    @if( $phone )
    <a class="text-primary-3 md:ml-30" href="tel:{{ preg_replace('/[^0-9]/', '', $sec_phone) }}"><i class="fas fa-phone"></i> {{ $sec_phone }}</a> <span class="md:mx-2 text-primary-3">or</span> <a class="text-primary-3 font-carlito-regular" href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}"> {{ $phone }}</a>
    @endif

    <a href="{!! get_permalink(262) !!}" class="button button--primary ml-0 md:ml-30">Book Now</a>
  </div>
</div>


  <div class="header__bottom">
    <div class="container pt-2 flex items-center justify-between md:justify-end relative">

      <a class="header__branding w-full max-w-brand md:w-auto md:max-w-initial md:mx-0" href="{{ home_url('/') }}">
        @if( $branding )
        <img src="{{ $branding }}" alt="{{ get_bloginfo('name', 'display') }}" />
        @else
        <img src="/app/themes/sage/resources/assets/images/bigrigxpress.svg" alt="{{ get_bloginfo('name', 'display') }}" />
        @endif
      </a>

      <button class="w-hamburger h-hamburger md:hidden nav-toggle js-hamburger" aria-labelledby="toggle-navigation">
        <span id="toggle-navigation" hidden>Toggle Navigation</span>
        <span class="block relative w-full h-hamburger"></span>
      </button>

      <nav class="flex items-start md:items-center">

        @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'primary-nav-a nav md:flex md:justify-end', 'container' => '']) !!}
        @endif

        <div class="mobile__meta mt-15">
          @if( $phone )
          <a class="block md:hidden py-3" href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}"><i class="fas fa-phone"></i> {{ $phone }}</a>
          @endif

          @if($address)
          <a href="{!! $map_link !!}" class="block md:hidden py-3"><i class="fas fa-map-marker-alt"></i> Get Directions</a>
          @endif

          @if( $park_map )
          <a class="block md:hidden py-3" href="{!! $park_map !!}"><i class="fas fa-map"></i> Park Map</a>
          @endif

          <a href="{!! get_permalink(262) !!}" class="button button--secondary mt-15 desktop-none">Book Now</a>
        </div>
      </nav>
    </div>
  </div>
</div>
