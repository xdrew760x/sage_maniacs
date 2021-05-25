@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning text-center py-12">
      {!! apply_filters('the_content', __('Sorry, but the page you were trying to view does not exist.')) !!}
      <a href="{!! get_permalink(2) !!}" class="button button--primary">Home</a>
    </div>
  @endif
@endsection
