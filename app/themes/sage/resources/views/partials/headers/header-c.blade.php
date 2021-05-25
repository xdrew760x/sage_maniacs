<!---
Header C
----->
@php
//Variables
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

<div class="header header-component-c @if($header['fixed_position']) header-fixed-c @endif">
  <div class="header__top py-4 lg:py-0">
    <div class="container flex flex-row flex-wrap justify-between items-center">
      <div class="flex flex-row justify-start items-start lg:hidden">

        @if( $meta['phone_number'] )
        <a href="tel:{{ preg_replace('/[^0-9]/', '', $meta['phone_number']) }}" class="text-white mr-2"><i class="fas fa-phone"></i></a>
        @endif
      </div>

      <!-- Mobile Menu Toggle Control
      JS - "/resources/assets/scripts/main.js" -->

      <button class="nav-control lg:hidden" aria-label="Click here to toggle mobile navigation">
        <span class="block relative w-full h-hamburger"></span>
      </button>


      <nav class="hidden w-full lg:flex lg:flex-row lg:justify-between">
        @if (has_nav_menu('header_nav_c_l'))
        {!! wp_nav_menu(['theme_location' => 'header_nav_c_l', 'menu_class' => 'header_nav_c nav_left', 'container' => '']) !!}
        @endif

        @if (has_nav_menu('header_nav_c_r'))
        {!! wp_nav_menu(['theme_location' => 'header_nav_c_r', 'menu_class' => 'header_nav_c nav_right', 'container' => '']) !!}
        @endif
      </nav>
    </div>
  </div>


  <!-- Header Bottom Portion
  Contains Website Branding and Primary Navigtion.
  ACF - "/wp/wp-admin/post.php?post=137&action=edit"
  Branding - "/wp/wp-admin/admin.php?page=theme-options" -->

  <div class="header__bottom py-8 lg:py-12">
    <a class="header__branding my-3" href="{{ home_url('/') }}">
      @if( $header['branding_logo'] )
      <img src="{{ $header['branding_logo']['url'] }}" alt="{{ get_bloginfo('name', 'display') }}" />
      @else
      <img src="/app/themes/sage/resources/assets/images/bigrigxpress.svg" alt="{{ get_bloginfo('name', 'display') }}" />
      @endif
    </a>

    <div class="container flex justify-between items-center py-3 lg:py-0">

      <div class="hidden lg:inline-block">
        @if( $meta['phone_number'] )
        <a href="tel:{{ preg_replace('/[^0-9]/', '', $meta['phone_number']) }}" class="contact-tel mr-4">{{ $meta['phone_number'] }}</a>
        @endif

      </div>
      <div class="hidden lg:inline-block">
        @if( $meta['reservation_url'] )
        <a href="{!! $meta['reservation_url'] !!}" class="ml-4 button button--primary hidden lg:inline-block text-white">Homes for sale</a>
        @endif
      </div>
    </div>
  </div>
</div>
