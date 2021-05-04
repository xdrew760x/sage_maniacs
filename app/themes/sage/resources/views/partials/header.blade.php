<!-- Conditional dependent on ACF field value
Header Contorls - "/wp/wp-admin/admin.php?page=theme-options"-->

@if( class_exists('ACF') )
@switch( get_field('header_component', 'options') )
@case('header-a')
@include('partials.headers.header-a')
@break
@case('header-b')
@include('partials.headers.header-b')
@break
@endswitch
@endif
