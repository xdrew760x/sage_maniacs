@php
$video_group = get_field('hero_video');
@endphp

<section id="hero_top" class="w-full brm-hero" role="region" aria-label="Hero">
  <section class="section-brm--hero hero--video has-video relative flex justify-center items-center relative">
    <video class="hero__video" preload="auto" autoplay loop muted playsinline>
      <source src="{!! $video_group['hero_mp4'] !!}" type="video/mp4"/>
      <source src="{{ $video_group['hero_webm'] }}" type="video/webm"/>
    </video>


    @php
    $hero_message = get_field('hero_content');
    $content_width = get_field('content_width');
    $content_position = get_field('content_position');
    $max_height = get_field('hero_height');


    $frnt_img = get_field('frnt_img');
    $back_img = get_field('back_img');

    //Animation
    $hero_animation = get_field('hero_animation');
    @endphp
    <div class="hero_content text-white mx-auto block {{ $content_width === 'w-full' ? 'w-full' : ' w-full md:w-1/2' }} {{ $content_position === 'ml-0' ? 'ml-0' : 'full' }} {{ $content_position === 'mr-0' ? 'mr-0' : 'full' }}"
    style="min-height: {!! $max_height !!}px;"
    >
    <div class="hero_content--container container @if(! is_admin()) {!! $hero_animation !!} @endif">
        {!! $options['content'] !!}
    </div>
  </div>
</section>
</section>
