@php
//Variables
$meta = get_field('meta_fields', 'options');
$header = get_field('component_type', 'options');
@endphp

<div class="header-component-a">
  <!-- Header Top Portion 
  Contains Address & Phone Number.
  ACF - "/wp/wp-admin/post.php?post=137&action=edit" -->

  <div class="header__top">
    <!-- Mobile Menu Toggle Control
    JS - "/resources/assets/scripts/main.js" -->

    <div class="container flex justify-between lg:justify-end items-center py-3 lg:py-0">
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
          @if( $meta['phone_number'] )
          <a href="tel:{{ preg_replace('/[^0-9]/', '', $meta['phone_number']) }}" class="text-white mt-1"><i class="fas fa-phone mr-2"></i> {{ $meta['phone_number'] }}</a>
          @endif
          @if($meta['street_address'])
          <a href="https://www.google.com/maps/dir/?api=1&destination={{ $meta['street_address'] }}+{{ $meta['city_name'] }}+{{ $meta['state'] }}+{{ $meta['zipcode'] }}" class="text-white mt-3 uppercase"><i class="fas fa-map-marker-alt mr-2"></i> Get Directions</a>
          @endif
          @if( $meta['reservation_url'] )
          <a href="{!! $meta['reservation_url'] !!}" class="button button--secondary mt-4 desktop-none">Book Now</a>
          @endif
        </div>
      </nav>
    </div>
  </div>
</div>
