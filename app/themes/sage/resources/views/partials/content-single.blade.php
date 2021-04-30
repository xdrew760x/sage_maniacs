

@if(is_user_logged_in())

<article @php post_class() @endphp>
  <h1 class="entry-title">{!! get_the_title() !!}</h1>
  @include('partials/entry-meta')
  {!! the_content() !!}
</article>

@elseif( ! empty ( $GLOBALS['post'] ) && is_single() && in_category( 'members-only', $GLOBALS['post'] ))
<section class="section--login pb-45">
  <div class="container">
    <h3>You must be logged in to view this content.</h3>

    <a href="{!! site_url('/wp-login.php?action=register') !!}" class="button border-2 border-primary-3 text-primary-3">sign up <i class="fas fa-long-arrow-right"></i></a> <a href="{!! get_permalink(221) !!}" class="button button--primary">Login <i class="fas fa-long-arrow-right text-white"></i></a>
  </div>
</section>
@else

<article @php post_class() @endphp>
  <h1 class="entry-title">{!! get_the_title() !!}</h1>
  @include('partials/entry-meta')
  {!! the_content() !!}
</article>

@endif
