@php
//Branding
$brandwidth = get_field('max_width', 'options');
$mobilewidth = get_field('max_width_mobile', 'options');

//Theme colors
$color1 = get_field('primary_color', 'options');
$color2 = get_field('secondary_color', 'options');
$color3 = get_field('tertiary_color', 'options');
$color4 = get_field('quaternary_color', 'options');

$accent1 = get_field('primary_accent', 'options');
$accent2 = get_field('secondary_accent', 'options');
$accent3 = get_field('tertiary_accent', 'options');
$accent4 = get_field('quaternary_accent', 'options');

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
@endphp
<style>
  :root {
    /* Branding Size */
    --branding-max-w: {{ $brandwidth }}px;
    --branding-max-w-m: {{ $mobilewidth }}px;
    /* Tailwind will map its color variables to these variables which are then set by ACF */
    --primary-color: {{ $color1 }};
    --secondary-color: {{ $color2 }};
    --tertiary-color: {{ $color3 }};
    --quaternary-color: {{ $color4 }};
    --primary-accent: {{ $accent1 }};
    --secondary-accent: {{ $accent2 }};
    --tertiary-accent: {{ $accent3 }};
    --quaternary-accent: {{ $accent4 }};
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
