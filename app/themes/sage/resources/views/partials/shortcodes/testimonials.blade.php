<div class="brm-testimonials js-testimonials">
  @foreach( $posts as $testimonial )
  @php
  $review_source = get_field('review_source');
  $park_name = get_field('park_name');
  @endphp

  <blockquote class="mb-10 brm-testimonial">
    <p>{!! apply_filters('the_content', $testimonial->post_content) !!}</p>
    <footer class="mt-30">
      <strong class="source__name mb-0 text-white">{{ $testimonial->post_title }} | {{ $testimonial->review_source }}</strong>
    </footer>
  </blockquote>
  @endforeach
</div>
