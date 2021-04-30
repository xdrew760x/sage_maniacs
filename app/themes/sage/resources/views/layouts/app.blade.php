<!doctype html>
<html {!! get_language_attributes() !!}>
@include('partials.head')
@php
$header_fixed = get_field('fixed_position','options');

function is_blog() {
	global  $post;
	$posttype = get_post_type($post );
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}
@endphp

<body @php body_class() @endphp id="{!! $header_fixed !!}">

	@if( $tag_manager )
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-{!! $tag_manager !!}" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	@endif

	@php do_action('get_header') @endphp
	@include('partials.header')
	<main role="document" aria-label="Content">
		@if(App\display_layout())

		@if(is_blog())
		@include('partials.blog')
		@endif

		<section class="section--main" role="region" aria-label="Default Content">
			<div class="w-full mx-auto">
				@yield('content')
			</div>
		</section>


		@else
		@yield('content')
		@endif
	</main>





	@php do_action('get_footer') @endphp
	@include('partials.footer')
	@php wp_footer() @endphp

</body>
</html>
