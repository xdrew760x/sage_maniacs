@php
$price = get_field('price_home');
$bathrooms = get_field('bathrooms_home');
$bedrooms = get_field('bedrooms_home');
@endphp

<div class="property">
  <div class="container">
    <h1 class="text-center"><?php the_title(); ?></h1>
    <div class="property__meta mb-4 md:flex md:flex-row md:justify-center">
      @if ( $price )
      <p>&#36;<?= number_format( $price, 0 ); ?></p>
      @endif
      @if ( $bedrooms )
      <p><span class="px-2">&#124;</span>{!! $bedrooms !!} BD<span class="px-2">&#124;</span></p>
      @endif
      @if ( $bathrooms )
      <p>{!! $bathrooms !!} BA</p>
      @endif
    </div>
    <!-- Content / Gallery -->
    <div class="property_meta flex flex-row flex-wrap w-full">
      <div class="property_meta--info w-full lg:w-2/3">
        @include('partials.homes.property-content')
      </div>
      <div class="property_meta--contact w-full lg:w-1/3 lg:pl-4">
        @include('partials.homes.property-contact')
      </div>
    </div>
    <!-- Pagination -->
    <ul class="flex flex-col justify-center items-center md:flex-row md:justify-between mt-6 py-6 border-t-1 border-black">
      <li> {!! next_post_link( '%link','<i class="fal fa-arrow-left text-primary-3"></i> Previous Listing' ) !!} </li>
      <li> <a class="all-posts" href="{!! get_permalink(213) !!}">  All Listings <i class="fal fa-redo text-primary-3"></i></a></li>
      <li>{!! previous_post_link( '%link','Next Listing <i class="far fa-arrow-right text-primary-3"></i>' ) !!} </li>
    </ul>
  </div>
</div>
