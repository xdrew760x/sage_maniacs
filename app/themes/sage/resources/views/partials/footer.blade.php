@php
$type = get_field('footer_select', 'options')
@endphp

@if( class_exists('ACF') )
@switch( $type )
@case('footer-a')
@include('partials.footers.footer-a')
@break
@endswitch
@endif
