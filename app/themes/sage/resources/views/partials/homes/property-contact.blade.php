@php
$form = get_field('input_form_here', 'options');
@endphp

<div class="property__meta--agents mt-12 lg:mt-0 p-4 bg-gray">
  @if( have_rows('agents') )
  @while( have_rows('agents') ) @php the_row() @endphp
  @php
  $name = get_sub_field('name');
  $email = get_sub_field('email');
  $phone = get_sub_field('phone');
  @endphp
  <div class="agent agent-{!! $name !!}">
    <h4 class="mb-0">{!! $name !!}</h4>
    @if($phone)
    <a href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}" class="block my-2"><i class="far fa-phone mr-2"></i> {{ $phone }}</a>
    @endif
    @if($email)
    <a href="mailto:{!! $email !!}" class="block"><i class="far fa-envelope mr-2"></i> {!! $email !!}</a>
    @endif
  </div>
  @endwhile
  @endif
</div>

<div class="property__meta--form p-4 mt-4 bg-gray">
<!-- Form Type Here  -->
{!! $form !!}
</div>
