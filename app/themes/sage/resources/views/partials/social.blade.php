@php
$meta = get_field('meta_fields', 'options');

;
@endphp

@if($meta['display_social'])
<section class="section--social bg-primary1 py-12">
  <div class="container">
    <div class="social__media social-icons w-full flex justify-center items-center">
      @foreach( App::siteSocialLinks() as $link )
      <a class="social-icon inline-flex items-center justify-center" href="{{ $link['url'] }}" aria-labelledby="{{ strtolower($link['title']) }}">
        <span id="{{ strtolower($link['title']) }}" hidden>{{ $link['title'] }}</span>
        {!! $link['svg'] !!}
      </a>
      @endforeach
    </div>
  </div>
</section>
@endif
