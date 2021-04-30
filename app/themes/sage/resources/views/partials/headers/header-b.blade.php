<!---
Header B
----->
@php
$address = get_field('address', 'options');
$phone = get_field('phone_number', 'options');
@endphp

<div class="header-b">
  <div class="header__top mobile-none">
    <div class="container md:flex md:flex-row md:items-center md:justify-between">
      <div class="col--left">
        @if( $phone )
        <a class="font-metropolis-regular mr-3 text-sixteen" href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}" aria-label="Call {!! get_bloginfo() !!} by clicking here or calling {{ $phone }}">
          <svg class="inline-block mr-1 -mt-1" width="28px" height="27px" viewBox="0 0 28 27" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g id="Desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Mobile" transform="translate(-290.000000, -36.000000)" fill="#A18537">
                  <g id="Header" transform="translate(0.000000, -2.000000)">
                    <g id="Icon-/-Contact-/-Phone2" transform="translate(290.000000, 38.000000)">
                      <path d="M2.67275085,3.25017139 C3.86779792,2.04704432 5.80496934,2.04704432 7.00001641,3.25017139 L7.00001641,3.25017139 L9.59882399,5.86487484 C10.7888027,7.07032472 10.7888027,9.01726406 9.59882399,10.2227139 L9.59882399,10.2227139 L9.12631353,10.6985628 C11.2780273,13.2798956 13.649152,15.6673606 16.2127464,17.8338309 L16.2127464,17.8338309 L16.6840328,17.3592148 C17.2579737,16.7810664 18.0364955,16.4562531 18.8482776,16.4562531 C19.6600597,16.4562531 20.4385815,16.7810664 21.0125225,17.3592148 L21.0125225,17.3592148 L23.6039853,19.9763838 C24.7986716,21.1798743 24.7986716,23.1307324 23.6039853,24.3342229 L23.6039853,24.3342229 L22.1791092,25.7667007 C20.7235161,27.177605 18.4986392,27.4031923 16.7929795,26.3128174 C10.4114606,22.0476934 4.94201449,16.5396039 0.706813509,10.1129975 C-0.410277341,8.40363706 -0.183930071,6.13960874 1.24909884,4.68881303 L1.24909884,4.68881303 Z M17.520756,1.26669683 C20.1477027,-0.651600483 23.7711267,-0.363914638 26.0664333,1.94519054 C28.36174,4.25429572 28.6477067,7.89950237 26.7408726,10.5422413 C24.8340384,13.1849802 21.3003315,14.0409145 18.4067888,12.5609227 C14.8518656,12.5800491 13.0135241,12.4924356 12.8917643,12.2980821 C12.7700046,12.1037285 13.644129,11.2213285 15.5141376,9.65088195 C14.0429898,6.73994435 14.8938093,3.18499413 17.520756,1.26669683 Z" id="Combined-Shape" transform="translate(14.000000, 13.500000) scale(-1, 1) translate(-14.000000, -13.500000) "></path>
                    </g>
                  </g>
                </g>
              </g>
            </svg> {{ $phone }}</a>
        @endif

        @if($address)
        <a href="https://www.google.com/maps/dir/Current+Location/{!! $address !!}+{!! $city !!}+{!! $state !!}+{!! $zipcode !!}" class="text-sixteen font-metropolis-regular" aria-label="Get Directions to {!! get_bloginfo() !!} by clicking here"><i class="fas fa-map-marker-alt mr-1"></i> Get Directions</a>
        @endif
      </div>
      <div class="col--right items-center">
        <a href="https://www.campspot.com/book/cullenrvresort" class="button button--primary ml-30" aria-label="Book your Stay here at {!! get_bloginfo() !!} by clicking this">book now</a>
      </a>
    </div>
  </div>
</div>
<div class="desktop-none py-45 md:py-3 flex flex-row items-center justify-end md:justify-between flex-wrap relative">
  <button class="w-hamburger h-hamburger md:hidden nav-toggle js-hamburger" aria-label="Display Mobile Navigation by cicking this">
    <span id="toggle-navigation" hidden>Toggle Navigation</span>
    <span class="block relative w-full h-hamburger"></span>
  </button>
  @if( $phone )
  <a class="text-primary-2 mobile-contact desktop-none mr-45" href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}" aria-label="Call {!! get_bloginfo() !!} by clicking here or calling {{ $phone }}">
    <svg width="28px" height="27px" viewBox="0 0 28 27" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <g id="Desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Mobile" transform="translate(-290.000000, -36.000000)" fill="#A18537">
          <g id="Header" transform="translate(0.000000, -2.000000)">
            <g id="Icon-/-Contact-/-Phone2" transform="translate(290.000000, 38.000000)">
              <path d="M2.67275085,3.25017139 C3.86779792,2.04704432 5.80496934,2.04704432 7.00001641,3.25017139 L7.00001641,3.25017139 L9.59882399,5.86487484 C10.7888027,7.07032472 10.7888027,9.01726406 9.59882399,10.2227139 L9.59882399,10.2227139 L9.12631353,10.6985628 C11.2780273,13.2798956 13.649152,15.6673606 16.2127464,17.8338309 L16.2127464,17.8338309 L16.6840328,17.3592148 C17.2579737,16.7810664 18.0364955,16.4562531 18.8482776,16.4562531 C19.6600597,16.4562531 20.4385815,16.7810664 21.0125225,17.3592148 L21.0125225,17.3592148 L23.6039853,19.9763838 C24.7986716,21.1798743 24.7986716,23.1307324 23.6039853,24.3342229 L23.6039853,24.3342229 L22.1791092,25.7667007 C20.7235161,27.177605 18.4986392,27.4031923 16.7929795,26.3128174 C10.4114606,22.0476934 4.94201449,16.5396039 0.706813509,10.1129975 C-0.410277341,8.40363706 -0.183930071,6.13960874 1.24909884,4.68881303 L1.24909884,4.68881303 Z M17.520756,1.26669683 C20.1477027,-0.651600483 23.7711267,-0.363914638 26.0664333,1.94519054 C28.36174,4.25429572 28.6477067,7.89950237 26.7408726,10.5422413 C24.8340384,13.1849802 21.3003315,14.0409145 18.4067888,12.5609227 C14.8518656,12.5800491 13.0135241,12.4924356 12.8917643,12.2980821 C12.7700046,12.1037285 13.644129,11.2213285 15.5141376,9.65088195 C14.0429898,6.73994435 14.8938093,3.18499413 17.520756,1.26669683 Z" id="Combined-Shape" transform="translate(14.000000, 13.500000) scale(-1, 1) translate(-14.000000, -13.500000) "></path>
            </g>
          </g>
        </g>
      </g>
    </svg>
  </a>
  @endif

  @if($address)
  <a href="https://www.google.com/maps/dir/Current+Location/{!! $address !!}+{!! $city !!}+{!! $state !!}+{!! $zipcode !!}" class="text-primary-2 font-ptn mr-3 mobile-contact" aria-label="Get Directions to {!! get_bloginfo() !!} by clicking here"><i class="fas fa-map-marker-alt mr-1"></i></a>
  @endif
</div>
<div class="header__bottom">
  <div class="container relative">
    <a class="header__branding" href="{{ home_url('/') }}" aria-label="Website Logo located on Banner, Action Return to Homepage">
      @if( $branding )
      <img src="{{ $branding }}" alt="{{ get_bloginfo('name', 'display') }}" />
      @else
      <img src="/app/themes/sage/resources/assets/images/bigrigxpress.svg" alt="{{ get_bloginfo('name', 'display') }}" />
      @endif
    </a>
    <nav class="mobile-open">
      @if (has_nav_menu('primary_type_b_left'))
      {!! wp_nav_menu(['theme_location' => 'primary_type_b_left', 'menu_class' => 'nav nav--left', 'container' => '']) !!}
      @endif

      @if (has_nav_menu('primary_type_b_right'))
      {!! wp_nav_menu(['theme_location' => 'primary_type_b_right', 'menu_class' => 'nav nav--right', 'container' => '']) !!}
      @endif
    </nav>
  </div>
</div>
</div>
