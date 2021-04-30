/* ========================================================================
* Shame JS
*
* Dedicated javascript file to house quick fixes that can be refactored at a
* later time.
*
* Remember to enque the file in the assets function in lib/setup.php
* ======================================================================== */
(function ($) {
  $('.open-sidebar').click(function() {
    $('.interface-interface-skeleton__sidebar').toggleClass('expand-me ui-draggable');


  });


  //$(document).ready(function() {
  //  var $dragging = null;

  //  $(document.body).on("mousemove", function(e) {
    //  if ($dragging) {
        //$dragging.offset({
        //  top: e.pageY,
        //  left: e.pageX,
        //  containment: "window"
      //  });
    //}
    //});

  //  $(document.body).on("mousedown", ".interface-interface-skeleton__sidebar", function (e) {
  //    $dragging = $(".interface-interface-skeleton__sidebar");
  //  });

  //  $(document.body).on("mouseup", function (e) {
  //    $dragging = null;
  //  });
  //});

})(jQuery);
