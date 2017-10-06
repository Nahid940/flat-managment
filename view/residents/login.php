<?php

include_once '../../vendor/autoload.php';

\App\Session::init();
\App\Session::Destroy();
//\App\Session::checkLoggedin();


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
                       <a href="login.php" class="active" id="login-form-link">Residents login</a>
               </div>
               <hr/>
           </div>

           <div class="panel-body">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="alert alert-default colorOrange" id="validator"></div>
                       <?php

                               echo \App\Session::get('resLogintime');
                               \App\Session::UnsetKeySession('resLogintime');

                               echo \App\Session::get("res-login-failure");
                                \App\Session::UnsetKeySession('res-login-failure');


                               echo \App\Session::get('resident-login-failure');
                               \App\Session::UnsetKeySession('resident-login-failure');
                        ?>
                        <form class="form-signin" method="post" id="loginform" name ="loginform" action="loginOperation.php" onsubmit=" return validateForm()">

                                <div class="form-group">
                                    <label for="manager_id">Your ID or email</label>
                                    <input type="text" class="form-control" name="resident_id" id="resident_id" placeholder="Your ID" value="<?php if(isset($_COOKIE["res_login"])) { echo $_COOKIE["res_login"]; } ?>" autofocus="" />
                                </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" id="password" placeholder="Password"/>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-lg btn-login btn-block button" type="submit" name="login">Login</button>
                            </div>

                            <div class="field-group">
                                <div><input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["res_login"])) { ?> checked <?php } ?> />
                                    <label for="remember-me">Remember me</label>
                                </div>
                            </div>


                            <div class="info">If you are new please contact with your manager to enable your account!</div>

                        </form>
                   </div>
               </div>
  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>

      $(document).ready(function() {
          $('#validator').hide();
          setTimeout(function() {
              $('.colorOrange').fadeOut('slow');
          }, 2000);

          $('#resident_id').keyup(function () {
              var $this = $(this);
              var insertedVal = $this.val();
              if (insertedVal != '') {
                  $('#resident_id').css('box-shadow', '0 0 10px green');
                  $this.css({"color": "green", "border": "1px solid green"});
              } else {
                  $('#resident_id').css('box-shadow', '0 0 10px #ff0000');
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
          setTimeout(function() {
              $('.colorOrange').fadeOut('slow');
          }, 2000);

          var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          var resident_id=document.forms["loginform"]["resident_id"].value;
          var password=document.forms['loginform']['password'].value;

          if(resident_id==''  || password==''){
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