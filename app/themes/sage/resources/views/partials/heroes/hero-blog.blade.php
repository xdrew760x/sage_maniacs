@php

$max_height = get_field('hero_height', 'options');
$hero_image = get_field('hero_image', 'options');
$content = get_field('hero_content', 'options');
$display_search_form = get_field('display_search_form', 'options');
@endphp

<section class="w-full brm-hero" id="hero_top" role="region" aria-label="Hero">
  <div class="section-brm--hero flex flex-col flex-wrap justify-center items-center bg-no-repeat" style="background-image:url({!! $hero_image !!}); min-height: {!! $max_height !!}px;" >
    <div class="hero_content mx-auto block w-full" style="min-height: {!! $max_height !!}px;">
      <div class="hero_content--container container text-center">
        @if(is_blog())
        <h3 class="text-center text-primary-1">{!! get_the_title('396') !!}</h3>
        @else
        <h1 class="text-center text-primary-1">{!! the_title() !!}</h1>
        @endif
      </div>
    </div>
  </div>
</section>
