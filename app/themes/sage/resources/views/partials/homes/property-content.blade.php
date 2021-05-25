@php
// Variables
$images = get_field('gallery_homes');
$lot_number = get_field('lot_number');
$listing_number = get_field('listing_number');
$price = get_field('price_home');
$reduced = get_field('reduced');
$tag_line_home = get_field('tag_line_home');
$bedrooms_home = get_field('bedrooms_home');
$bathrooms_home = get_field('bathrooms_home');
$address_home = get_field('address_home');
$city_home = get_field('city_home');
$state_home = get_field('state_home');
$zipcode_home = get_field('zipcode_home');
$make_home = get_field('make_home');
$square_feet = get_field('square_feet');
@endphp

@if( $images )
<div class="property__gallery">
  <div class="property__gallery--image block js-carousel-gallery">
    @foreach( $images as $image )
    <div href="{!! $image['url'] !!}" data-fancybox="gallery" class="img bg-cover bg=center" style="background-image: url({!! $image['url'] !!})"></div>
    @endforeach
  </div>

  <div class="property__gallery--nav block mt-4 js-carousel-nav">
    @foreach( $images as $image )
    <div href="{!! $image['url'] !!}" class="img mx-2 bg-cover bg=center" style="background-image: url({!! $image['url'] !!})"></div>
    @endforeach
  </div>
</div>
@endif

<!---   details  --->
<div class="property__meta my-30">
  <div class="property__left">
    <ul class="property__details">
      @if($reduced)
      <li>
        <strong class="uppercase">{!! $reduced !!}!!!</strong>
      </li>
      @endif

      @if($tag_line_home)
      <li>
        <p>{!! $tag_line_home !!}</p>
      </li>
      @endif

      @if($lot_number)
      <li>
        <p class="mr-1"><strong class="mr-15">Lot #:</strong> ${!! $lot_number !!}</p>
      </li>
      @endif

      @if($listing_number)
      <li>
        <p class="mr-1"><strong class="mr-15">Listing #:</strong> ${!! $listing_number !!}</p>
      </li>
      @endif

      @if($price)
      <li>
        <p class="mr-1"><strong class="mr-15">Price:</strong> ${!! number_format( $price, 0 ) !!}</p>
      </li>
      @endif

      @if($bathrooms_home)
      <li>
        <p class="mr-1"><strong class="mr-15">Bathrooms:</strong> ${!! $bathrooms_home !!} BR</p>
      </li>
      @endif

      @if($bedrooms_home)
      <li>
        <p class="mr-1"><strong class="mr-15">Bedrooms:</strong> ${!! $bedrooms_home !!} BR</p>
      </li>
      @endif

      @if($make_home)
      <li>
        <p class="mr-1"><strong class="mr-15">Make:</strong> ${!! $make_home !!} BR</p>
      </li>
      @endif

      @if($square_feet)
      <li >
        <p class="mr-1"><strong class="mr-15">Square Footage:</strong> ${!! $square_feet !!} BR</p>
      </li>
      @endif

      @if($address_home)
      <li>
        <p class="mr-1"><strong class="mr-15">Address:</strong> {!! $address_home !!} {!! $city_home !!}, {!! $state_home !!} {!! $zipcode_home !!} </p>
      </li>
      @endif
    </ul>

    <div class="property__meta--description mt-8">
      <h3>Property Description: </h3>
      {!! the_content() !!}
    </div>
  </div>
</div>
