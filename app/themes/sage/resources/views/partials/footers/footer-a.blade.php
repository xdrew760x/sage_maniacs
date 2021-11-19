@php
$footer_logo = get_field('footer_logo', 'options');
$background_clr = get_field('background_color_footer', 'options');
//font
$footer_font = get_field('footer_font_family', 'options');
$footer_fontformat = pathinfo( $footer_font['filename'], PATHINFO_EXTENSION);
$footer_fonturl = $footer_font['url'];

$copyright_font = get_field('copyright_font', 'options');
$copyright_fontformat = pathinfo( $copyright_font['filename'], PATHINFO_EXTENSION);
$copyright_fonturl = $copyright_font['url'];
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

@font-face {
  font-family: 'copyright-font';
  src: url("{!! $copyright_fonturl !!}") format("{{ $copyright_fontformat }}");
  font-weight: normal;
  font-style: normal;
  font-display: swap;
}


:root {
  --footer-font-size: {{ get_field('font_size_footer','options') }}px;
  --footer-font-color: {{ get_field('font_color_footer','options') }};
  --copyright-font-size: {{ get_field('copyright_font_size','options') }}px;
  --copyright-font-color: {{ get_field('copyright_color','options') }};
  /* end */
}
</style>

<footer class="footer-a py-12 text-center" style="background-color: {!! $background_clr !!};">
  <div class="container">
    <div class="meta">
      @if( $footer_logo )
      <a class="footer__branding" href="{{ home_url('/') }}">
        <img src="{{ $footer_logo['url'] }}" alt="{{ get_bloginfo('name', 'display') }}" class="mx-auto block mb-6" />
      </a>
      @endif

      @if (has_nav_menu('footer_nav_a'))
      {!! wp_nav_menu(['theme_location' => 'footer_nav_a', 'menu_class' => 'footer-nav footer-nav-a flex flex-col lg:flex-row flex-wrap justify-center', 'container' => '']) !!}
      @endif
    </div>

    <div class="copyright">
      <p class="mb-0">
        <span class="mb-0">&copy; Copyright {{ date('Y') }} {{ App::siteName() }} </span> &#124;
        <a href="/ada-compliance/" aria-label="Review our ADA Compliance statement by clicking here">ADA Compliance</a> &#124;
        <a href="/privacy-policy/" aria-label="Review our Privacy Policy by clicking here">Privacy Policy</a>
        &#124;
          @if (get_field('xpress', 'options') === true)
            <span> Website by <a href="https://www.bigrigxpress.com/xpress-website-development/">Big Rig Xpress™</a></span>
          @else
            <span class=""> Website by <a href="https://www.bigrigmedia.com/outdoor-hospitality-website-development/" class="">Big Rig Media LLC &reg;</a></span>
          @endif
      </p>
    </div>
  </div>
</footer>

<script>(function(d){var s = d.createElement("script");s.setAttribute("data-account", "cfiTiXADZG");s.setAttribute("src", "https://cdn.userway.org/widget.js");(d.body || d.head).appendChild(s);})(document)</script><noscript>Please ensure Javascript is enabled for purposes of <a href="https://userway.org">website accessibility</a></noscript>
