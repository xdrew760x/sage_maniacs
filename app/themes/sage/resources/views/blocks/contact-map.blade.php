{{--
  Title: Contact info with Map
  Description: Two half Containing a Google Map Iframe and Contact Info
  Category: contact_blocks
  Icon: <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="48" height="48" role="img" aria-hidden="true" focusable="false"><path d="M19 6H6c-1.1 0-2 .9-2 2v9c0 1.1.9 2 2 2h13c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-4.1 1.5v10H10v-10h4.9zM5.5 17V8c0-.3.2-.5.5-.5h2.5v10H6c-.3 0-.5-.2-.5-.5zm14 0c0 .3-.2.5-.5.5h-2.6v-10H19c.3 0 .5.2.5.5v9z"></path></svg>
  Keywords: contact
  Mode: preview
  Align: full
  --}}

  <div class="block_preview hidden w-full">
    <img src="/app/themes/sage/resources/assets/images/block-previews/hero.png" class="w-full" alt="{{ $block['keywords'][0] }}">
  </div>

  @php
  $meta = get_field('meta_fields', 'options');
  $contact_bg = get_field('background_color_contact');
  $font_white = get_field('font_white');

  // contact
  $contact_font = get_field('font_control');
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
          <span itemprop="streetAddress" class="font-hkgrotesk-regular ">{!! $meta['street_address'] !!}</span><br>
          <span itemprop="addressLocality" class="font-hkgrotesk-regular ">{!! $meta['city_name'] !!},</span>
          <span itemprop="addressRegion" class="font-hkgrotesk-regular ">{!! $meta['state'] !!}</span>
          <span itemprop="postalCode" class="font-hkgrotesk-regular ">{!! $meta['zipcode'] !!}</span>
        </address>
        <p class="contact-info--tel my-12">
          @if($meta['phone_number'])
          <a itemprop="telephone" href="tel:{{ preg_replace('/[^0-9]/', '', $meta['phone_number']) }}" aria-label="Call us today at {!! $phone !!}">Office: {!! $meta['phone_number'] !!}</a><br>
          @endif

          @if($meta['phone_number_sec'])
          <a itemprop="telephone" href="tel:{{ preg_replace('/[^0-9]/', '', $meta['phone_number']) }}" aria-label="Call us today at {!! $meta['phone_number_sec'] !!}">Sales: {!! $meta['phone_number_sec'] !!}</a><br>
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
