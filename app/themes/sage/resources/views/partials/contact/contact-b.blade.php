@php
$meta = get_field('meta_fields', 'options');
$contact_bg = get_field('background_color_contact', 'options');
$font_white = get_field('font_white_contact', 'options');

// contact
$contact_font = get_field('font_control', 'options');
$contact_fontformat = pathinfo( $contact_font['filename'], PATHINFO_EXTENSION);
$contact_fonturl = $contact_font['url'];
@endphp
<section class="section-contact-a py-12 {!! $font_white !!}" style="background-color: {!! $contact_bg !!} ;">
  <div class="container flex justify-center flex-row flex-wrap items-start">
    <!-- Contact -->
    <div class="contact-info w-full lg:w-1/2 px-4 lg:py-12 lg:p-12">
      <div itemscope itemtype="http://schema.org/LocalBusiness" class="contact--inner">
        <address itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">

          <div class="flex justify-start">
            <i class="fas fa-map-marker-alt text-white"></i>
            <div class="pl-4">
              <span itemprop="name" class=" mb-0 bold">{!! get_bloginfo() !!}</span><br>
              <span itemprop="streetAddress" >{!! $meta['street_address'] !!}</span><br>
              <span itemprop="addressLocality" >{!! $meta['city_name'] !!},</span>
              <span itemprop="addressRegion" >{!! $meta['state'] !!}</span>
              <span itemprop="postalCode" >{!! $meta['zipcode'] !!}</span>
            </div>
          </div>
        </address>
        <p class="contact-info--tel my-6">

          <div class="flex justify-start">
            <i class="fas fa-phone"></i>
            <div class="pl-4">
              @if($meta['phone_number'])
              <a itemprop="telephone" class="mb-2 inline-block text-white tel-num" href="tel:{{ preg_replace('/[^0-9]/', '', $meta['phone_number']) }}" aria-label="Call us today at {!! $phone !!}">{!! $meta['phone_number'] !!}</a><br>
              @endif

              @if($meta['phone_number_sec'])
              <a itemprop="telephone" href="tel:{{ preg_replace('/[^0-9]/', '', $meta['phone_number']) }}" aria-label="Call us today at {!! $meta['phone_number_sec'] !!}" class="tel-num text-white">Sales: {!! $meta['phone_number_sec'] !!}</a><br>
              @endif
            </div>
          </div>

          <div class="mt-6 flex justify-start">
            <i class="fas fa-envelope"></i>
            <div class="pl-4">
              @if($meta['email_address'])
              <a itemprop="telephone" href="mailto:{{ $meta['email_address'] }}" aria-label="Email us today at {!! $meta['email_address'] !!}" class="email-add text-white">{!! $meta['email_address'] !!}</a><br>
              @endif
            </div>
          </div>

          @if($meta['resident_url'])
          <a itemprop="email" href="tel:{{ $meta['resident_url'] }}" aria-label="book with us today" class="button button--primary mt-12 woo-button">Book Now</a><br>
          @endif

        </p>
      </div>
    </div>

    <!-- Google Maps -->
    <div class="w-full lg:w-1/2">
      {!! $meta['map_iframe'] !!}
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