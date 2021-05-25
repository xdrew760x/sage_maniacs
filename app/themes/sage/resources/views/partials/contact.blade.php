<!-- Conditional dependent on ACF field value
Header Contorls - "/wp/wp-admin/admin.php?page=theme-options"-->

@php
$type = get_field('contact_type', 'options')
@endphp

@if( class_exists('ACF') )
@switch( $type )
@case('contact-a')
@include('partials.contact.contact-a')
@break
@case('contact-b')
@include('partials.contact.contact-b')
@break
@endswitch
@endif
