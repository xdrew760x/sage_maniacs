@php

$content_width = get_field('content_width');
$content_position = get_field('content_position');
$max_height = get_field('hero_height');
$hero_graphic = get_field('hero_graphic');
global $wp_query;
$parent_post_id = $wp_query->queried_object->post_parent;
$ancestor = get_post_ancestors($post->ID);

//Animation
$hero_animation = get_field('hero_animation');
$display_search_form = get_field('display_search_form');
@endphp

<section id="{{ $block['keywords'][0] }}" class="w-full brm-hero" role="group" aria-label="Hero">
  <div class="section-brm--hero bg-no-repeat js-background" style="background-image:url({{ $options['desktop'] }}); min-height: {!! $max_height !!}px;" data-mobile="{{ $options['desktop'] }}" data-desktop="{{ $options['desktop'] }}">
    <div class="hero_content text-white mx-auto block {{ $content_width === 'w-full' ? 'w-full' : ' w-full md:w-1/2' }} {{ $content_position === 'ml-0' ? 'ml-0' : 'full' }} {{ $content_position === 'mr-0' ? 'mr-0' : 'full' }}" style="min-height: {!! $max_height !!}px;">
      <div class="hero_content--container container">
        {!! $options['content'] !!}
      </div>
    </div>
  </div>
</section>
