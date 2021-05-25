@if ( is_singular(['homes-for-sale']) )
@include('partials/homes/property-single')
@else
<article @php post_class() @endphp>
  <h1 class="entry-title">{!! get_the_title() !!}</h1>
  @include('partials/entry-meta')
  {!! the_content() !!}
</article>
@endif
