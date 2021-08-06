@php
$banner_alert = get_field('banner_alert', 'options');
@endphp

<div class="banner-alert {!! $banner_alert['alert_background_color'] !!} py-15">
  <div class="container">
    {!! $banner_alert['alert_message'] !!}
  </div>
</div>


@if($banner_alert['alert_font_white'] == 'true' )
  <style media="screen">
  .banner-alert * {
    color: white;
  }
  </style>
@endif
