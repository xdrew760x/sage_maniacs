@php

$community_meta = get_field('community_meta');
$community_telephone = get_field('community_telephone');
$webiste_url = get_field('community_website_url');
$homes_for_sale_url = get_field('community_sale_url');
$reservations = get_field('community_reservations');
$max_height = get_field('hero_height');
$community_logo = get_field('community_logo');
@endphp

<div id="hero_top" class="section-brm--hero community--hero flex flex-col flex-wrap justify-center bg-center bg-cover bg-no-repeat js-background"
style="
min-height: {!! $max_height !!}px;
background-image:url({{ $hero_dsk }});">
  <div class="container">
    <div class="hero-community-content bg-white md:w-1/2 p-30 flex flex-row flex-wrap items-start justify-between">


      <img src="{!! $community_logo !!}" class="mb-15 sm:mb-0  w-full sm:w-1/3">

      <div class="hero-meta w-full sm:w-2/3 pl-0 sm:pl-30">
        {!! $community_meta !!}

        @if($community_telephone)
        <a href="tel:{!! $community_telephone !!}" class="flex items-center uppercase mt-15 mb-2"><img src="/app/themes/sage/resources/assets/images/phone-office.svg" class="mr-3">{!! $community_telephone !!}</a>
        @endif
        @if($webiste_url)
        <a href="{!! $webiste_url !!}" class="flex items-center uppercase mb-2"><img src="/app/themes/sage/resources/assets/images/external-link.svg" class="mr-3">View Website</a>
        @endif
        @if($homes_for_sale_url)
        <a href="{!! $homes_for_sale_url !!}" class="flex items-center uppercase mb-2"><img src="/app/themes/sage/resources/assets/images/home-alt.svg" class="mr-3">View Available Homes</a>
        @endif

        @if($reservations)
        <a href="{!! $reservations !!}" class="flex items-center uppercase mb-2"><img src="/app/themes/sage/resources/assets/images/calendar.svg" class="mr-3">Reservations</a>
        @endif
      </div>
    </div>
  </div>
</div>
