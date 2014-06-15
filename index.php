<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation</title>
      <link rel="stylesheet" href="stylesheets/app.css" />
      <link href="stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />
      <!--[if IE]>
          <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
      <![endif]-->
      <link href="stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
      <script src="bower_components/modernizr/modernizr.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="js/app.js"></script>
  </head>

  <body>
      <div class="row wrapper">
        <div class="medium-1 columns">
        </div>
        <div id="slidebottom" class="medium-10 columns wrapper_welcome slide">
          <div class="welcome_header">
            <h2>Would You Like My Business Card?<h2>
          </div>
          <div class="wrapper_card">
          </div>
              <div class="medium-4 columns"></div>
              <div class="medium-4 columns medium-centered button_card">
                <button id="show" class="button simple">YES I WOULD</button>
              </div>
              <div class="medium-4 columns"></div>
              <div class="inner">
                  <div class="small-1 columns">
                    <button id="exit">X</button>
                  </div>  
                <div class="row wrapper_form">
                <div class="medium-3 columns"></div>
                <div class="medium-5 medium-centered columns">
                  <form data-abide action="send.php" method="post">
                        <div class="row">
                            <div class="wrapper_form--input">
                              <input class="form--input" type="text" name="first" placeholder="FIRST NAME" required pattern="[a-zA-Z]+">
                              <small class="error">Name is required and must be a string.</small>
                            </div>
                            <div class="wrapper_form--input">
                              <input class="form--input" type="text" name="last" placeholder="LAST NAME" required pattern="[a-zA-Z]+">
                            </div>
                            <div class="wrapper_form--input">
                              <input class="form--input" type="email" name="email" placeholder="EMAIL" required>
                              <small class="error">An email address is required.</small>
                            </div>
                            <button class="button_form" type="submit">SEND IT</button>
                        </div>
                  </form>
                </div>
                <div class="medium-3 columns"></div> 
              </div>
          </div>
        <div class="medium-1 columns">
        </div>
      </div>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/foundation/js/foundation.min.js"></script>
    <script src="js/foundation/foundation.abide.js"></script>
    <script>   
        $(document).ready(function(){
          $('#show, #exit').click(function(){
            $('.inner').slideToggle();
            });
          //$('#exit').click(function(){
          //  $('.inner').slideToggle();
          //});
          $('#send_message').click(function(e){
            e.preventDefault();
            var error = false;
            var topic = $('#topic').val();
            var name = $('#name').val();
            var email = $('#email').val();
            var subject = $('#subject').val();
            var message = $('#message').val();
            if(topic.length == 0){
              var error = true;
              $('#topic_error').fadeIn(500);
            } else {
              $('#topic_error').fadeOut(500);
            }
            if(name.length == 0){
              var error = true;
              $('#name_error').fadeIn(500);
            } else {
              $('#name_error').fadeOut(500);
            }
            if(email.length == 0 || email.indexOf('@') == '-1'){
              var error = true;
              $('#email_error').fadeIn(500);
            } else {
              $('#email_error').fadeOut(500);
            }
            if(subject.length == 0){
              var error = true;
              $('#subject_error').fadeIn(500);
            } else {
              $('#subject_error').fadeOut(500);
            }
            if(message.length == 0){
              var error = true;
              $('#message_error').fadeIn(500);
            } else {
              $('#message_error').fadeOut(500);
            } if(error == false){
              $('#send_message').attr({'disabled' : 'true', 'value' : 'Sending...' });
              $.post("send_email.php", $("#contact_form").serialize(),function(result){
                if(result == 'sent'){
                  $('#cf_submit_p').remove();
                  $('#mail_success').fadeIn(500);
                } else {
                  $('#mail_fail').fadeIn(500);
                  $('#send_message').removeAttr('disabled').attr('value', 'Send Message');
                }
              });
            }
          });
        });
      </script>
  </body>
</html>
