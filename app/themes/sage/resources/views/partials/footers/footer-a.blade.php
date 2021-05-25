@php
$footer_logo = get_field('footer_logo', 'options');
$background_clr = get_field('background_color', 'options');
//font
$footer_font = get_field('footer_font_family', 'options');
$footer_fontformat = pathinfo( $footer_font['filename'], PATHINFO_EXTENSION);
$footer_fonturl = $footer_font['url'];
@endphp

<style>
/* contact Component Font */
@font-face {
  font-family: 'footer-font';
  src: url("{!! $footer_fonturl !!}") format("{{ $footer_fontformat }}");
  font-weight: normal;
  font-style: normal;
  font-display: swap;
}


:root {
  --footer-font-size: {{ get_field('font_size_footer','options') }}px;
  --footer-font-color: {{ get_field('font_color_footer','options') }};
  /* end */
}
</style>

<footer class="footer-a py-6 text-center" style="background-color: {!! $background_clr !!};">
  <div class="container">
    <div class="meta">
      <a class="footer__branding" href="{{ home_url('/') }}">
        @if( $footer_logo )
        <img src="{{ $footer_logo['url'] }}" alt="{{ get_bloginfo('name', 'display') }}" class="mx-auto block mb-6" />
        @else
        <img src="/app/themes/sage/resources/assets/images/bigrigxpress.svg" alt="{{ get_bloginfo('name', 'display') }}" class="mx-auto block mb-6" />
        @endif
      </a>

      @if (has_nav_menu('footer_nav_a'))
      {!! wp_nav_menu(['theme_location' => 'footer_nav_a', 'menu_class' => 'footer-nav footer-nav-a flex flex-col lg:flex-row flex-wrap justify-center', 'container' => '']) !!}
      @endif
    </div>

    <div class="copyright">
      <p class="mb-0 uppercase">
        <span class="mb-0">&copy; Copyright {{ date('Y') }} {{ App::siteName() }} </span> &#124;
        <a href="/ada-compliance/" aria-label="Review our ADA Compliance statement by clicking here">ADA Compliance</a> &#124;
        <a href="/privacy-policy/" aria-label="Review our Privacy Policy by clicking here">Privacy Policy</a>
        &#124;   <a href="https://www.bigrigmedia.com/outdoor-hospitality-website-development/" aria-label="WEBSITE BY BIG RIG Media Click here to View this Company Website">WEBSITE BY BIG RIG Media &reg;</a></span>
      </p>
    </div>
  </div>
</footer>
