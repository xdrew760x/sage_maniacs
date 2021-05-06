@php
//Branding
$brandwidth = get_field('max_width', 'options');
$mobilewidth = get_field('max_width_mobile', 'options');

//Theme colors
$color1 = get_field('primary_color', 'options');
$color2 = get_field('secondary_color', 'options');
$color3 = get_field('tertiary_color', 'options');
$color4 = get_field('quaternary_color', 'options');

//Theme fonts
$font_options = get_field('font_options', 'options');

// Heading One
$heading_one = get_field('header_one', 'options');
$heading_oneformat = pathinfo( $heading_one['filename'], PATHINFO_EXTENSION);
$heading_oneurl = $heading_one['url'];

// Heading Two
$heading_two = get_field('header_two', 'options');
$heading_twoformat = pathinfo( $heading_two['filename'], PATHINFO_EXTENSION);
$heading_twourl = $heading_two['url'];

// Heading Three
$heading_three = get_field('header_three', 'options');
$heading_threeformat = pathinfo( $heading_three['filename'], PATHINFO_EXTENSION);
$heading_threeurl = $heading_three['url'];

// Heading Four
$heading_four = get_field('header_four', 'options');
$heading_fourformat = pathinfo( $heading_four['filename'], PATHINFO_EXTENSION);
$heading_foururl = $heading_four['url'];

// Heading Five
$heading_five = get_field('header_five', 'options');
$heading_fiveformat = pathinfo( $heading_five['filename'], PATHINFO_EXTENSION);
$heading_fiveurl = $heading_five['url'];

// Heading Six
$heading_six = get_field('header_six', 'options');
$heading_sixformat = pathinfo( $heading_six['filename'], PATHINFO_EXTENSION);
$heading_sixurl = $heading_six['url'];

// Body
$body = get_field('base_font', 'options');
$bodyformat = pathinfo( $body['filename'], PATHINFO_EXTENSION);
$bodyurl = $body['url'];

// Anchor
$anchor = get_field('anchor_links', 'options');
$anchorformat = pathinfo( $anchor['filename'], PATHINFO_EXTENSION);
$anchorurl = $anchor['url'];

// Strong
$strong = get_field('strong_element', 'options');
$strongformat = pathinfo( $strong['filename'], PATHINFO_EXTENSION);
$strongurl = $strong['url'];

// Span
$span = get_field('span_element', 'options');
$spanformat = pathinfo( $span['filename'], PATHINFO_EXTENSION);
$spanurl = $span['url'];

// Small
$small = get_field('small_element', 'options');
$smallformat = pathinfo( $small['filename'], PATHINFO_EXTENSION);
$smallurl = $small['url'];

// Button
$button = get_field('button_element', 'options');
$buttonformat = pathinfo( $button['filename'], PATHINFO_EXTENSION);
$buttonurl = $button['url'];

//Button Globals
$pad_y = get_field('padding_y', 'options');
$pad_x = get_field('padding_x', 'options');
$boarder_radius = get_field('boarder_radius', 'options');

// Buttons Group
$button = get_field('button_styles', 'options');

// Header Group
$header = get_field('component_type', 'options');
@endphp
<style>
  :root {
    /* Branding Size */
    --branding-max-w: {{ $header['max_width'] }}px;
    --branding-max-w-m: {{ $header['max_width_mobile'] }}px;
    /* Tailwind will map its color variables to these variables which are then set by ACF */
    --primary-color: {{ $color1 }};
    --secondary-color: {{ $color2 }};
    --tertiary-color: {{ $color3 }};
    --quaternary-color: {{ $color4 }};
    /* Header Nav */
    --top-menu: {{ $header['top_bg_color'] }};
    --top-menu-font-color: {{ $header['top_nav_color'] }};
    --mobile-menu: {{ $header['m_menu_color'] }};
    --menu-font: {{ $header['primary_menu'] }}px;
    --mobile-menu-font: {{ $header['primary_menu_mobile'] }}px;
    --menu-font-color: {{ $header['primary_menu_color'] }};
    --menu-font-color-mobile: {{ $header['primary_menu_color_mobile'] }};
    /* Buttons */
    --padding-y: {{ $pad_y }}px;
    --padding-x: {{ $pad_x }}px;
    --border-radius: {{ $boarder_radius }}%;
    /* Prime button */
    --button-prime: {{ $button['button_bg'] }};
    --border-width: {{ $button['border_width_prime'] }}px;
    --border-type: {{ $button['border_type_prime'] }};
    --border-color: {{ $button['border_color_prime'] }};
    /* Secondary button */
    --button-secondary: {{ $button['button_bg_sec'] }};
    --border-width-sec: {{ $button['border_width_sec'] }}px;
    --border-type-sec: {{ $button['boarder_type_sec'] }};
    --border-color-sec: {{ $button['boarder_color_sec'] }};

    /* Header One */
    --h1-desk: {{ $font_options['h1_size_desk'] }};
    --h1-mobile: {{ $font_options['h1_size_mobile'] }};
    --h1-color: {{ $font_options['h1_color'] }};
  }

  /* Font family definitions just need to have a corresponding name in Tailwind config */
  @font-face {
    font-family: 'heading-one';
    src: url("{!! $heading_oneurl !!}") format("{{ $heading_oneformat }}");
    font-weight: normal;
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: 'heading-two';
    src: url("{!! $heading_twourl !!}") format("{{ $heading_twoformat }}");
    font-weight: normal;
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: 'heading-three';
    src: url("{!! $heading_threeurl !!}") format("{{ $heading_threeformat }}");
    font-weight: normal;
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: 'heading-four';
    src: url("{!! $heading_foururl !!}") format("{{ $heading_fourformat }}");
    font-weight: normal;
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: 'heading-five';
    src: url("{!! $heading_fiveurl !!}") format("{{ $heading_fiveformat }}");
    font-weight: normal;
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: 'heading-six';
    src: url("{!! $heading_sixurl !!}") format("{{ $heading_sixformat }}");
    font-weight: normal;
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: 'body';
    src: url("{!! $bodyurl !!}") format("{{ $bodyformat }}");
    font-weight: normal;
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: 'strong';
    src: url("{!! $strongurl !!}") format("{{ $strongformat }}");
    font-weight: normal;
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: 'anchor';
    src: url("{!! $anchorurl !!}") format("{{ $anchorformat }}");
    font-weight: normal;
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: 'span';
    src: url("{!! $spanurl !!}") format("{{ $spanformat }}");
    font-weight: normal;
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: 'small';
    src: url("{!! $smallurl !!}") format("{{ $smallformat }}");
    font-weight: normal;
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: 'button';
    src: url("{!! $buttonurl !!}") format("{{ $buttonformat }}");
    font-weight: normal;
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: "Font Awesome 5 Brands";
    src:
      url("../fonts/fontawesome/fa-brands-400.woff2") format("woff2"),
      url(".../../assets/fonts/fontawesome/fa-brands-400.woff") format("woff");
    font-style: normal;
    font-weight: 400;
  }

  @font-face {
    font-family: "Font Awesome 5 Pro Light";
    src:
      url("../fonts/fontawesome/fa-light-300.woff2") format("woff2"),
      url("../../assets/fonts/fontawesome/fa-light-300.woff") format("woff");
    font-style: normal;
    font-weight: 300;
  }

  @font-face {
    font-family: "Font Awesome 5 Pro Regular";
    src:
      url("../fonts/fontawesome/fa-regular-400.woff2") format("woff2"),
      url("../../assets/fonts/fontawesome/fa-regular-400.woff") format("woff");
    font-style: normal;
    font-weight: 400;
  }

  @font-face {
    font-family: "Font Awesome 5 Pro Solid";
    src:
      url("../fonts/fontawesome/fa-solid-900.woff2") format("woff2"),
      url("../../assets/fonts/fontawesome/fa-solid-900.woff") format("woff");
    font-style: normal;
    font-weight: 900;
  }
</style>
