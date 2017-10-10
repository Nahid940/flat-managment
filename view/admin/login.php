<?php

include_once '../../vendor/autoload.php';

\App\Session::init();

//\App\Session::checkOwnerLoggedin();
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="../../assets/loginandregistrationstyle.css" type="text/css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
    </style>
</head>
<body>
<!--   action="loginUser.php-->
   <div class="container">
   <div class="row">

   
   <div class="col-md-8 col-md-offset-2 wrapper">
       <div class="panel panel-login">
           <div class="panel-heading">
               <div class="row">
                       <a href="#loginform" class="active" id="login-form-link">Owner login</a>
               </div>
               <hr/>
           </div>

           <div class="panel-body">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="alert alert-default colorOrange" id="validator"></div>
                       <?php

                               echo \App\Session::get('login-failure');
                               echo \App\Session::get("accountBlocked");
                               echo \App\Session::get('time');
                               \App\Session::UnsetSession();
                        ?>
                        <form class="form-signin" method="post" id="loginform" name ="loginform" action="loginOperation.php" onsubmit=" return validateForm()">

                                <div class="form-group">
                                    <label for="owner_email">Email</label>
                                    <input type="email" class="form-control" name="owner_email" id="email" placeholder="Email Address"  autofocus="" />
                                </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-lg btn-login btn-block button" type="submit" name="login">Login</button>
                            </div>
                            <div class="info">If you are new please Sign up first! <a href="registration.php">Register here!</a></div>

                        </form>

                   </div>
               </div>
           </div>
       </div>

   </div>
</div>
</div>
 
 
  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>


      $(document).ready(function() {
          setTimeout(function() {
              $('.colorOrange').fadeOut('slow');
          }, 2000);

          $('#validator').hide();
          $('#email').keyup(function () {
              var $this = $(this);
              var insertedVal = $this.val();
              if (insertedVal != '') {
                  $('#email').css('box-shadow', '0 0 10px green');
                  $this.css({"color": "green", "border": "1px solid green"});
              } else {
                  $('#email').css('box-shadow', '0 0 10px #ff0000');
                  $this.css({"color": "green", "border": "1px solid #ff0000"});
              }
          });

          $('#password').keyup(function () {
              var $this = $(this);
              var insertedVal = $this.val();
              if (insertedVal != '') {
                  $('#password').css('box-shadow', '0 0 10px green');
                  $this.css({ "border": "1px solid green"});
              } else {
                  $('#password').css('box-shadow', '0 0 10px #ff0000');
                  $this.css({ "border": "1px solid #ff0000"});
              }
          });
      });

      function validateForm()
      {


          var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          var owner_email=document.forms["loginform"]["owner_email"].value;
          var password=document.forms['loginform']['password'].value;

          if(owner_email=='' || (!mailformat.test(owner_email)) || password==''){
              $('#validator').show();
              $('#validator').text("Provide each information properly !!");
              return false;
          }else{
              return true;
          }
      }
</script>
</body>
</html>