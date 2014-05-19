// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();
$(document).ready(function() {
  $('#slidebottom button').click(function() {
    $(this).next().slideToggle();
  });
});