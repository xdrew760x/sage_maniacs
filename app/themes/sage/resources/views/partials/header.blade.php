<!-- Conditional dependent on ACF field value
Header Contorls - "/wp/wp-admin/admin.php?page=theme-options"-->

@php
$type = get_field('component_type', 'options')
@endphp

@if( class_exists('ACF') )
@switch( $type['header_component'] )
@case('header-a')
@include('partials.headers.header-a')
@break
@case('header-b')
@include('partials.headers.header-b')
@break
@case('header-c')
@include('partials.headers.header-c')
@break
@endswitch
@endif
