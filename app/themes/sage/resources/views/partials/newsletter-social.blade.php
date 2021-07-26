<!-- Conditional dependent on ACF field value
Header Contorls - "/wp/wp-admin/admin.php?page=theme-options"-->

@php
$type = get_field('newsletter_type', 'options')
@endphp

@if( class_exists('ACF') )
@switch( $type )
@case('newsletter-a')
@include('partials.newsletter.newsletter-a')
@break
@case('newsletter-b')
@include('partials.newsletter.newsletter-b')
@break
@endswitch
@endif
