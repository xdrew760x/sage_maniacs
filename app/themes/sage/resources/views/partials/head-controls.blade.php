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
$headings = get_field('headings', 'options');
$headingsformat = pathinfo( $headings['filename'], PATHINFO_EXTENSION);
$headingsurl = $headings['url'];

$light = get_field('body_light', 'options');
$lightformat = pathinfo( $light['filename'], PATHINFO_EXTENSION);
$lighturl = $light['url'];

$regular = get_field('body_regular', 'options');
$regularformat = pathinfo( $regular['filename'], PATHINFO_EXTENSION);
$regularurl = $regular['url'];

$black = get_field('body_black', 'options');
$blackformat = pathinfo( $black['filename'], PATHINFO_EXTENSION);
$blackurl = $black['url'];

$bold = get_field('body_bold', 'options');
$boldformat = pathinfo( $bold['filename'], PATHINFO_EXTENSION);
$boldurl = $bold['url'];


// Header Group
$header = get_field('component_type', 'options');

//Button Globals
$pad_y = get_field('padding_y', 'options');
$pad_x = get_field('padding_x', 'options');
$boarder_radius = get_field('boarder_radius', 'options');

// Buttons Group
$button = get_field('button_styles', 'options');
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
    --primary-accent: {{ $accent1 }};
    --secondary-accent: {{ $accent2 }};
    --tertiary-accent: {{ $accent3 }};
    --quaternary-accent: {{ $accent4 }};
    /* Header Nav */
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
  }

  .bg-primary-1 {
    background-color: {{ $color1 }};
  }

  .bg-primary-2 {
    background-color: {{ $color2 }};
  }

  .bg-primary-3 {
    background-color: {{ $color3 }};
  }

  .bg-primary-4 {
    background-color: {{ $color4 }};
  }


  /* Font family definitions just need to have a corresponding name in Tailwind config */
  @font-face {
    font-family: 'headings';
    src: url("{!! $headingsurl !!}") format("{{ $headingsformat }}");
    font-weight: normal;
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: 'body-regular';
    src: url("{!! $regularurl !!}") format("{{ $regularformat }}");
    font-weight: normal;
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: 'body-bold';
    src: url("{!! $boldurl !!}") format("{{ $boldformat }}");
    font-weight: normal;
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: 'body-black';
    src: url("{!! $blackurl !!}") format("{{ $blackformat }}");
    font-weight: normal;
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: 'body-light';
    src: url("{!! $lighturl !!}") format("{{ $lightformat }}");
    font-weight: normal;
    font-style: normal;
    font-display: swap;
  }
</style>
