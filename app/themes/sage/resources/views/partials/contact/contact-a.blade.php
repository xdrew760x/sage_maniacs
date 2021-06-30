@php
$meta = get_field('meta_fields', 'options');
$contact_bg = get_field('background_color_contact', 'options');
$font_white = get_field('font_white_contact', 'options');
$meta = get_field('meta_fields', 'options');

// contact
$contact_font = get_field('font_control', 'options');
$contact_fontformat = pathinfo( $contact_font['filename'], PATHINFO_EXTENSION);
$contact_fonturl = $contact_font['url'];
@endphp
<section class="section-contact-a flex justify-center flex-row flex-wrap {!! $font_white !!}" style="background-color: {!! $contact_bg !!} ;">
  <!-- Google Maps -->
  <div class="w-full lg:w-1/2">
    {!! $meta['map_iframe'] !!}
  </div>
  <!-- Contact -->
  <div class="contact-info w-full lg:w-1/2 px-4 py-12 lg:p-12">
    <div itemscope itemtype="http://schema.org/LocalBusiness" class="contact--inner">
      <address itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
        <span itemprop="name" class=" mb-0 bold">{!! get_bloginfo() !!}</span><br>
        <span itemprop="streetAddress">{!! $meta['street_address'] !!}</span><br>
        <span itemprop="addressLocality">{!! $meta['city_name'] !!},</span>
        <span itemprop="addressRegion">{!! $meta['state'] !!}</span>
        <span itemprop="postalCode">{!! $meta['zipcode'] !!}</span>
      </address>
      <p class="contact-info--tel my-12">
        @if($meta['phone_number'])
        <a itemprop="telephone" href="tel:{{ preg_replace('/[^0-9]/', '', $meta['phone_number']) }}" aria-label="Call us today at {!! $phone !!}">Office: {!! $meta['phone_number'] !!}</a><br>
        @endif

        @if($meta['phone_number_sec'])
        <a itemprop="telephone" href="tel:{{ preg_replace('/[^0-9]/', '', $meta['phone_number']) }}" aria-label="Call us today at {!! $meta['phone_number_sec'] !!}">Sales: {!! $meta['phone_number_sec'] !!}</a><br>
        @endif
      </p>

      <p class="contact-info--tel my-12">
        @if($meta['email_address'])
        <a href="mailto:{!! $meta['email_address']!!}" itemprop="email"  aria-label="Email us by clicking here">Email: {!! $meta['email_address']!!}</a>
        @endif
      </p>
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
