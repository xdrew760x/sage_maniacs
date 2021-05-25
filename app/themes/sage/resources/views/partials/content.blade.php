@if(is_archive())
<article class="flex flex-row flex-wrap justify-start">
  <div class="column column-one w-full lg:w-1/3">
    <a class="block mb-5" href="{{ get_permalink($post->ID) }}">
      <div class="blog-img bg-cover bg-center" style="background-image: url('{{ get_the_post_thumbnail_url() ?: '/app/uploads/2021/05/logo.svg' }}')"></div>
    </a>
  </div>
  <div class="column colunn-two w-full lg:w-2/3 lg:pl-4">
    <a href="{{ get_permalink() }}">
      <h5>{!! get_the_title() !!}</h5>
      <small>{{ get_the_date() }}</small>
      <p>{!! the_excerpt() !!}</p>
    </a>
  </div>
</article>
@else
<article class="flex flex-row flex-wrap justify-start">
  <div class="column column-one w-full lg:w-1/3">
    <a class="block mb-5" href="{{ get_permalink($post->ID) }}">
      <div class="blog-img bg-cover bg-center" style="background-image: url('{{ get_the_post_thumbnail_url() ?: '/app/uploads/2021/05/logo.svg' }}')"></div>
    </a>
  </div>
  <div class="column colunn-two w-full lg:w-2/3 lg:pl-4">
    <a href="{{ get_permalink() }}">
      <h5>{!! get_the_title() !!}</h5>
      <small>{{ get_the_date() }}</small>
      <p>{!! the_excerpt() !!}</p>
    </a>
  </div>
</article>
@endif
