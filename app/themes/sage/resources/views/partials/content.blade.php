<article>
  @if( App::image($post->ID, 'w457x288') )
  <a class="block mb-5" href="{{ get_permalink($post->ID) }}">
    <img src="{{ App::image($post->ID, 'w330x250') }}" alt="{{ $post->post_title }}" />
  </a>
  @endif

  <small>{{ get_the_date() }}</small>
  <a href="{{ get_permalink() }}">
    <h5 class="mt-2 mb-0">
      {!! get_the_title() !!}
    </h5>
  </a>
</article>
