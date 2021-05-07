@php

$address = get_field('address1', 'options');
$city = get_field('city', 'options');
$state = get_field('state', 'options');
$zip = get_field('zipcode', 'options');
$map_link = 'https://www.google.com/maps/place/' . $address;
@endphp

<footer class="footer-c py-6">
  <div class="container">
    @if (has_nav_menu('footer_navigation_c'))
    {!! wp_nav_menu(['theme_location' => 'footer_navigation_c', 'menu_class' => 'footer-nav', 'container' => '']) !!}
    @endif

    <p class="copyright mb-0">
      <span class="mb-0">&copy; Copyright {{ date('Y') }} {{ App::siteName() }} </span> &#124;
      <a href="/ada-compliance/" class="font-effra_std_rg" aria-label="Review our ADA Compliance statement by clicking here">ADA Compliance</a> &#124;
      <a href="/privacy-policy/" class="font-effra_std_rg " aria-label="Review our Privacy Policy by clicking here">Privacy Policy</a>
      &#124;   <a href="https://www.bigrigxpress.com/xpress-website-development/" class=" text-primary-1 font-effra_std_rg" aria-label="WEBSITE BY BIG RIG Media Click here to View this Company Website">WEBSITE BY BIG RIG Xpress</a></span>
    </p>
  </div>
</footer>
