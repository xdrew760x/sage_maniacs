@php
$meta = get_field('meta_fields', 'options');
$contact_bg = get_field('background_color_contact', 'options');
$font_white = get_field('font_white_contact', 'options');

// contact
$contact_font = get_field('font_control', 'options');
$contact_fontformat = pathinfo( $contact_font['filename'], PATHINFO_EXTENSION);
$contact_fonturl = $contact_font['url'];
$contact_area_extra_content = get_field('contact_area_extra_content', 'options');
$contact_title = get_field('contact_title', 'options');
$get_directions_button = get_field('get_directions_button', 'options');
$phone_title = get_field('phone_title', 'options');
$email_title = get_field('email_title', 'options');
$social_media_bar_title = get_field('social_media_bar_title', 'options');
$add_social_media_bar = get_field('add_social_media_bar', 'options');
$map_or_content = get_field('map_or_content', 'options');
$contact_area_main_content = get_field('contact_area_main_content', 'options');
$contact_area_main_content_title = get_field('contact_area_main_content_title', 'options');
@endphp
<section class="section-contact section-contact-a flex justify-center flex-row flex-wrap {!! $font_white !!}" style="background-color: {!! $contact_bg !!} ;">
  @if($meta['map_iframe'] && $map_or_content === 'map')
  <!-- Google Maps -->
  <div class="w-full lg:w-1/2">
    <iframe  class="w-full h-full" src="{{$meta['map_iframe']}}" style="min-height: 350px;" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>
  @else
    <div class="w-full lg:w-1/2 contact_area_main_content">
      @if ($contact_area_main_content_title)
        <div class="contact_area_main_content_title mb-15">
          {!! $contact_area_main_content_title !!}
        </div>
      @endif
      {!!$contact_area_main_content!!}
    </div>
  @endif
  <!-- Contact -->
  <div class="contact-info w-full lg:w-1/2 px-4 py-12 lg:p-12">
    <div itemscope itemtype="http://schema.org/LocalBusiness" class="contact--inner">
      @if ($contact_title)
        <div class="contact_title mb-15">
          {!!$contact_title!!}
        </div>
      @endif

      <address itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
        <span itemprop="name" class=" mb-0 bold">{!! get_bloginfo() !!}</span><br>
        <span itemprop="streetAddress">{!! $meta['street_address'] !!}</span><br>
        <span itemprop="addressLocality">{!! $meta['city_name'] !!},</span>
        <span itemprop="addressRegion">{!! $meta['state'] !!}</span>
        <span itemprop="postalCode">{!! $meta['zipcode'] !!}</span>

        @if($meta['street_address'] && $get_directions_button === 'true')
          <p class="contact-meta-info get-directions">
            <a href="https://www.google.com/maps/dir/Current+Location/{!! $meta['street_address'] !!}+{!! $meta['city_name'] !!}+{!! $meta['state'] !!}+{!! $meta['zipcode'] !!}">Get Directions <i class="fas fa-chevron-right"></i></a>
          </p>
        @endif
      </address>

      @if($meta['phone_number'])
      <p class="contact-info--tel mt-30">
        @if ($phone_title)
        <div class="phone-contact-title mb-15">
          {!!$phone_title!!}
        </div>
        @endif
        <a itemprop="telephone" href="tel:{{ preg_replace('/[^0-9]/', '', $meta['phone_number']) }}" class="contact-meta-info" aria-label="Call us today at {!! $phone !!}">{!! $meta['phone_number'] !!}</a><br>
        @if($meta['phone_number_sec'])
        <a itemprop="telephone" href="tel:{{ preg_replace('/[^0-9]/', '', $meta['phone_number']) }}" class="contact-meta-info" aria-label="Call us today at {!! $meta['phone_number_sec'] !!}">{!! $meta['phone_number_sec'] !!}</a><br>
        @endif
      </p>
      @endif

      @if($meta['email_address'])
      <div class="contact-info--tel my-30">
        @if ($email_title)
        <div class="email-contact-title mb-15">
          {!!$email_title!!}
        </div>
        @endif
        <a href="mailto:{!! $meta['email_address']!!}" itemprop="email"  aria-label="Email us by clicking here" class="contact-meta-info">{!! $meta['email_address']!!}</a>
        </p>
      </div>
      @endif

      @if ($contact_area_extra_content)
        <div class="extra_contact_area mb-30">
          {!!$contact_area_extra_content!!}
        </div>
      @endif

      @if($add_social_media_bar === 'true')
        @if ($social_media_bar_title)
        <div class="social-contact-title mb-15">
          {!!$social_media_bar_title!!}
        </div>
        @endif
        @foreach( App::siteSocialLinks() as $link )
          <a class="social-icon inline-flex items-center justify-center" href="{{ $link['url'] }}" aria-labelledby="{{ strtolower($link['title']) }}">
            <span id="{{ strtolower($link['title']) }}" hidden>{{ $link['title'] }}</span>
            {!! $link['svg'] !!}
          </a>
        @endforeach
      @endif
    </div>
  </div>
</section>


<style>
/* contact Component Font */
@font-face {
  font-family: 'contact-font';
  src: url("{!! $contact_fonturl !!}") format("{{ $contact_fontformat }}");
  font-weight: normal;
  font-style: normal;
  font-display: swap;
}
</style>
