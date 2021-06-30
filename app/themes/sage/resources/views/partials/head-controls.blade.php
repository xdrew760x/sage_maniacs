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
$heading_one = $font_options['header_one'];
$heading_oneformat = pathinfo( $heading_one['filename'], PATHINFO_EXTENSION);
$heading_oneurl = $heading_one['url'];

$h1_size_desk = get_field('h1_size_desk', 'options');
$h1_size_mob = get_field('h1_size_mob', 'options');
$h1_color = get_field('h1_color', 'options');

// Hero
$header_one_hero = $font_options['header_one_hero'];
$heading_oneheroformat = pathinfo( $header_one_hero['filename'], PATHINFO_EXTENSION);
$heading_oneherourl = $header_one_hero['url'];

// Heading Two
$heading_two = $font_options['header_two'];
$heading_twoformat = pathinfo( $heading_two['filename'], PATHINFO_EXTENSION);
$heading_twourl = $heading_two['url'];

// Heading Three
$heading_three = $font_options['header_three'];
$heading_threeformat = pathinfo( $heading_three['filename'], PATHINFO_EXTENSION);
$heading_threeurl = $heading_three['url'];

// Heading Four
$heading_four = $font_options['header_four'];
$heading_fourformat = pathinfo( $heading_four['filename'], PATHINFO_EXTENSION);
$heading_foururl = $heading_four['url'];

// Heading Five
$heading_five = $font_options['header_five'];
$heading_fiveformat = pathinfo( $heading_five['filename'], PATHINFO_EXTENSION);
$heading_fiveurl = $heading_five['url'];

// Heading Six
$heading_six = $font_options['header_six'];
$heading_sixformat = pathinfo( $heading_six['filename'], PATHINFO_EXTENSION);
$heading_sixurl = $heading_six['url'];

// Body
$body = $font_options['base_font'];
$bodyformat = pathinfo( $body['filename'], PATHINFO_EXTENSION);
$bodyurl = $body['url'];

// Anchor
$anchor = $font_options['anchor_links'];
$anchorformat = pathinfo( $anchor['filename'], PATHINFO_EXTENSION);
$anchorurl = $anchor['url'];

// Strong
$strong = $font_options['strong_element'];
$strongformat = pathinfo( $strong['filename'], PATHINFO_EXTENSION);
$strongurl = $strong['url'];

// Small
$small = $font_options['small_element'];
$smallformat = pathinfo( $small['filename'], PATHINFO_EXTENSION);
$smallurl = $small['url'];

// Button
$button = $font_options['button_element'];
$buttonformat = pathinfo( $button['filename'], PATHINFO_EXTENSION);
$buttonurl = $button['url'];

//Button Globals
$pad_y = get_field('padding_y', 'options');
$pad_x = get_field('padding_x', 'options');
$boarder_radius = get_field('border_radius', 'options');

// Buttons Group
$button = get_field('button_styles', 'options');

// Header Group
$header = get_field('component_type', 'options');
$meta = get_field('meta_fields', 'options');
@endphp
<style>
  :root {
    /* Branding Size */
    --branding-max-w: {{ $header['max_width'] }}px;
    --branding-max-w-m: {{ $header['max_width_mobile'] }}px;
    --logo-margin-top: {{ $header['margin_top_branding'] }}px;


    /* Tailwind will map its color variables to these variables which are then set by ACF */
    --primary-color: {{ $color1 }};
    --secondary-color: {{ $color2 }};
    --tertiary-color: {{ $color3 }};
    --quaternary-color: {{ $color4 }};
    /* Header Nav */
    --top-menu: {{ $header['top_bg_color'] }};
    --top-menu-font-color: {{ $header['top_nav_color'] }};
    --top-meta: {{ $header['meta_font_size'] }}px;
    --mobile-menu: {{ $header['m_menu_color'] }};
    --menu-font: {{ $header['primary_menu'] }}px;
    --mobile-menu-font: {{ $header['primary_menu_mobile'] }}px;
    --menu-font-color: {{ $header['primary_menu_color'] }};
    --menu-font-color-mobile: {{ $header['primary_menu_color_mobile'] }};
    --sub-font-color-mobile: {{ $header['sub_nav_color'] }};
    --sub-bg-color-mobile: {{ $header['sub_menu_bg_color'] }};


    /* Buttons */
    --padding-y: {{ $pad_y }}px;
    --padding-x: {{ $pad_x }}px;
    --border-radius: {{ $boarder_radius }}px;
    /* Prime button */
    --button-prime: {{ $button['button_bg'] }};
    --border-width: {{ $button['border_width_prime'] }}px;
    --border-type: {{ $button['border_type_prime'] }};
    --border-color: {{ $button['border_color_prime'] }};
    --font-color: {{ $button['font_color_prime'] }};

    /* Secondary button */
    --button-sec: {{ $button['button_bg_sec'] }};
    --border-width-sec: {{ $button['border_width_sec'] }}px;
    --border-type-sec: {{ $button['boarder_type_sec'] }};
    --border-color-sec: {{ $button['boarder_color_sec'] }};
    --font-color-sec: {{ $button['font_color_sec'] }};

    /* Tertiary button */
    --button-ter: {{ $button['button_bg_ter'] }};
    --border-width-ter: {{ $button['border_width_ter'] }}px;
    --border-type-ter: {{ $button['boarder_type_ter'] }};
    --border-color-ter: {{ $button['boarder_color_ter'] }};
    --font-color-ter: {{ $button['font_color_ter'] }};

    /* Quaternary button */
    --button-qua: {{ $button['button_bg_qua'] }};
    --border-width-qua: {{ $button['border_width_qua'] }}px;
    --border-type-qua: {{ $button['boarder_type_qua'] }};
    --border-color-qua: {{ $button['boarder_color_qua'] }};
    --font-color-qua: {{ $button['font_color_qua'] }};

    /* Header One */
    --h1-desk: {{ $font_options['h1_size_desk'] }}px;
    --h1-mobile: {{ $font_options['h1_size_mob'] }}px;
    --h1-color: {{ $font_options['h1_color'] }};
    --h1-transform: {{ $font_options['transform_h1'] }};
    --h1-line-height: {{ $font_options['line_height_h1'] }};
    --h1-letter-spacing: {{ $font_options['h1_letter_spacing'] }};

    /* Header One Hero */
    --h1-hero-desk: {{ $font_options['h1_size_desk_hero'] }}px;
    --h1-hero-mobile: {{ $font_options['h1_size_mob_hero'] }}px;
    --h1-hero-transform: {{ $font_options['transform_h1_hero'] }};
    --h1-hero-color: {{ $font_options['h1_color_hero'] }};
    --h1-text-shadow: {{ $font_options['drop_shadow_h'] }}px {{ $font_options['drop_shadow_v'] }}px {{ $font_options['drop_shadow_b'] }}px {{ $font_options['drop_shadow_c'] }};

    /* Header two */
    --h2-desk: {{ $font_options['h2_size_desk'] }}px;
    --h2-mobile: {{ $font_options['h2_size_mob'] }}px;
    --h2-color: {{ $font_options['h2_color'] }};
    --h2-transform: {{ $font_options['transform_h2'] }};
    --h2-line-height: {{ $font_options['line_height_h2'] }};
    --h2-letter-spacing: {{ $font_options['h2_letter_spacing'] }};

    /* Header three */
    --h3-desk: {{ $font_options['h3_size_desk'] }}px;
    --h3-mobile: {{ $font_options['h3_size_mob'] }}px;
    --h3-color: {{ $font_options['h3_color'] }};
    --h3-transform: {{ $font_options['transform_h3'] }};
    --h3-line-height: {{ $font_options['line_height_h3'] }};
    --h3-letter-spacing: {{ $font_options['h3_letter_spacing'] }};

    /* Header four */
    --h4-desk: {{ $font_options['h4_size_desk'] }}px;
    --h4-mobile: {{ $font_options['h4_size_mob'] }}px;
    --h4-color: {{ $font_options['h4_color'] }};
    --h4-transform: {{ $font_options['transform_h4'] }};
    --h4-line-height: {{ $font_options['line_height_h4'] }};
    --h4-letter-spacing: {{ $font_options['h4_letter_spacing'] }};

    /* Header five */
    --h5-desk: {{ $font_options['h5_size_desk'] }}px;
    --h5-mobile: {{ $font_options['h5_size_mob'] }}px;
    --h5-color: {{ $font_options['h5_color'] }};
    --h5-transform: {{ $font_options['transform_h5'] }};
    --h5-line-height: {{ $font_options['line_height_h5'] }};
    --h5-letter-spacing: {{ $font_options['h5_letter_spacing'] }};

    /* Header six */
    --h6-desk: {{ $font_options['h6_size_desk'] }}px;
    --h6-mobile: {{ $font_options['h6_size_mob'] }}px;
    --h6-color: {{ $font_options['h6_color'] }};
    --h6-transform: {{ $font_options['transform_h6'] }};
    --h6-line-height: {{ $font_options['line_height_h6'] }};
    --h6-letter-spacing: {{ $font_options['h6_letter_spacing'] }};

    /* P */
    --p-desk: {{ $font_options['p_size_desk'] }}px;
    --p-mobile: {{ $font_options['p_size_mob'] }}px;
    --p-color: {{ $font_options['p_color'] }};
    --p-transform: {{ $font_options['transform_p'] }};

    /* a */
    --a-desk: {{ $font_options['a_size_desk'] }}px;
    --a-mobile: {{ $font_options['a_size_mob'] }}px;
    --a-color: {{ $font_options['a_color'] }};
    --a-hover-color: {{ $font_options['a_color_hover'] }};
    --a-transform: {{ $font_options['transform_a'] }};

    /* strong */
    --s-desk: {{ $font_options['s_size_desk'] }}px;
    --s-mobile: {{ $font_options['s_size_mob'] }}px;
    --s-color: {{ $font_options['s_color'] }};
    --s-transform: {{ $font_options['transform_strong'] }};

    /* small */
    --small-desk: {{ $font_options['small_size_desk'] }}px;
    --small-mobile: {{ $font_options['small_size_mob'] }}px;
    --small-color: {{ $font_options['small_color'] }};
    --small-transform: {{ $font_options['transform_small'] }};

    /* ul */
    --ul-pad: {{ $font_options['padding_left'] }}px;
    --ul-img: url("{{ $font_options['list_graphic'] }}");

    /* small */
    --button-desk: {{ $font_options['button_size_desk'] }}px;
    --button-mobile: {{ $font_options['button_size_mob'] }}px;
    --button-color: {{ $font_options['button_color'] }};
    --social-bg-clr: {{ $meta['social_bg_color'] }};
    --social-icon-clr: {{ $meta['icon_color'] }};
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
    font-family: 'heading-hero';
    src: url("{!! $heading_oneherourl !!}") format("{{ $heading_oneheroformat }}");
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
