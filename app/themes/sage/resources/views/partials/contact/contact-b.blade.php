@php
$meta = get_field('meta_fields', 'options');
$contact_bg = get_field('background_color_contact', 'options');
$font_white = get_field('font_white_contact', 'options');
$make_white = $font_white ? "color: white;" : null;

// contact
$contact_font = get_field('font_control', 'options');
$contact_fontformat = pathinfo( $contact_font['filename'], PATHINFO_EXTENSION);
$contact_fonturl = $contact_font['url'];
$contact_area_extra_content = get_field('contact_area_extra_content', 'options');
$contact_title = get_field('contact_title', 'options');
$map_or_content = get_field('map_or_content', 'options');
$contact_area_main_content = get_field('contact_area_main_content', 'options');
$contact_area_main_content_title = get_field('contact_area_main_content_title', 'options');
$get_directions_button = get_field('get_directions_button', 'options');
$phone_title = get_field('phone_title', 'options');
$email_title = get_field('email_title', 'options');
$add_social_media_bar = get_field('add_social_media_bar', 'options');
$social_media_bar_title = get_field('social_media_bar_title', 'options');

@endphp
<section class="section-contact section-contact-b py-12 {!! $font_white !!}" style="background-color: {!! $contact_bg !!} ;">
  <div class="container flex justify-center flex-row flex-wrap items-start">
    <!-- Contact -->
    <div class="contact-info w-full lg:w-1/2">
      <div itemscope itemtype="http://schema.org/LocalBusiness" class="contact--inner">
        @if ($contact_title)
          <div class="$contact_title mb-6">
            {!!$contact_title!!}
          </div>
        @endif
        <address itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">

          <div class="contact-meta-info flex justify-start">
            <i class="fas fa-map-marker-alt text-white"></i>
            <div class="pl-4">
              <span itemprop="name" class=" mb-0 bold">{!! get_bloginfo() !!}</span><br>
              <span itemprop="streetAddress" >{!! $meta['street_address'] !!}</span><br>
              <span itemprop="addressLocality" >{!! $meta['city_name'] !!},</span>
              <span itemprop="addressRegion" >{!! $meta['state'] !!}</span>
              <span itemprop="postalCode" >{!! $meta['zipcode'] !!}</span>
            </div>
          </div>

          @if($meta['street_address'] && $get_directions_button === 'true')
            <p class="contact-meta-info mb-30 ml-30">
              <a href="https://www.google.com/maps/dir/Current+Location/{!! $meta['street_address'] !!}+{!! $meta['city_name'] !!}+{!! $meta['state'] !!}+{!! $meta['zipcode'] !!}">Get Directions <i class="fas fa-chevron-right"></i></a>
            </p>
          @endif
        </address>
        <p class="contact-info--tel my-30">

          @if($meta['phone_number'])
            @if ($phone_title)
            <div class="phone-contact-title mb-15">
              {!!$phone_title!!}
            </div>
            @endif
            <div class=" contact-meta-info flex justify-start mb-30">
              <i class="fas fa-phone"></i>
              <div class="pl-4">
                <a itemprop="telephone" class="mb-2 inline-block text-white tel-num" href="tel:{{ preg_replace('/[^0-9]/', '', $meta['phone_number']) }}" aria-label="Call us today at {!! $phone !!}" style="{!!$make_white!!}" >{!! $meta['phone_number'] !!}</a><br>
                @if($meta['phone_number_sec'])
                <a itemprop="telephone" href="tel:{{ preg_replace('/[^0-9]/', '', $meta['phone_number']) }}" aria-label="Call us today at {!! $meta['phone_number_sec'] !!}" style="{!!$make_white!!}" class="tel-num text-white">Sales: {!! $meta['phone_number_sec'] !!}</a><br>
                @endif
              </div>
            </div>
          @endif

          @if($meta['email_address'])
            @if ($email_title)
              <div class="email-contact-title mb-15">
                {!!$email_title!!}
              </div>
            @endif
            <div class="contact-meta-info flex justify-start">
              <i class="fas fa-envelope"></i>
              <div class="pl-4">
                <a itemprop="telephone" href="mailto:{{ $meta['email_address'] }}" aria-label="Email us today at {!! $meta['email_address'] !!}" style="{!!$make_white!!}" class="email-add text-white">{!! $meta['email_address'] !!}</a><br>
              </div>
            </div>
          @endif
        </p>

        @if ($contact_area_extra_content)
          <div class="extra_contact_area my-30">
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
    @if($meta['map_iframe'] && $map_or_content === 'map')
    <!-- Google Maps -->
    <div class="w-full lg:w-1/2">

        <iframe  class="max-w-full contact_google_map" src="{{ $meta['map_iframe'] }}" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
