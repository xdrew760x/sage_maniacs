jQuery(document).ready( function($) {
  /////// Define Variables Per REGION
  nothing = $('.does-nothing');
  something  = $('.does-something');

  serviceTypeInput = $('#scripts');
  placeholder = $('.placeholder');
  // Checks for Change on Select field to Fire function
  serviceTypeInput.on('change', function() {

    /// Define Variables Per Selection
    e = document.getElementById("scripts");
    value = e.options[e.selectedIndex].value;
    text = e.options[e.selectedIndex].text;

    otherInput = $('.select-' + value);
    control = $('.button');
    all = $('.all');
    formchoice = $('.formchoice');


    formchoice.hide();
    nothing.hide();
    otherInput.hide();
    something.hide();

    // if selected option matches class
    if (serviceTypeInput.val().includes(value)  ) {
      otherInput.show();
      something.hide();
      nothing.show();
      formchoice.prop('selectedIndex',0);
    }

    // if selected option is all
    if (serviceTypeInput.val().includes('all')  ) {
      placeholder.show();
      formchoice.prop('selectedIndex',0);
    }

  });
});
///// End
//
///
////
/////
//////
/////// Define Variables Per RESORT
jQuery(document).ready( function($) {
  $('.formchoice').each(function(index, element) {
    $(element).change(function () {
      something.hide();
      nothing.hide();

      value = element.options[element.selectedIndex].value;
      otherInput = $('.something-' + value);

      if ( $(element).val().includes(value) ) {
        otherInput.show();
        nothing.hide();
      }

      if ( $(element).val().includes('nothing') ) {
        nothing.show();
      }
    })
  });
})
///// End
