<?php
//include_once ('Session.php');
//include('user.php');
//Session::init();
//Session::checkLoggedin();
//
//$user=new user();
//if(isset($_POST['login'])){
//    $email=$_POST['email'];
//    $password=$_POST['password'];
//
//    $user->setEmail($email);
//    $user->setPassword($password);
//
//    if($user->loginUser()){
//        Session::init();
//        header('Location:index.php');
//    }
//}
//include_once('includes/header.php'); ?>



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
   
   
   <div class="col-md-6 col-sm-4 wrapper">
      <div class="jumbotron">
       
        <h2>
           Manage your residence smartly !!
       </h2>
      <img src="images/buildings.png" alt="" style="width:300px;height:300px">
      </div>   
   </div>
   
   <div class="col-md-6 wrapper">
       <div class="panel panel-login">
           <div class="panel-heading">
               <div class="row">
                       <a href="#loginform" class="active" id="login-form-link">Sign in</a>
               </div>
               <hr/>
           </div>
           
           <div class="panel-body">
               <div class="row">
                   <div class="col-lg-12">
                           <?php 
//                            if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
//                                //$user->setPassword='';
//                              $val= $user->checkUser();
//                            }
                        ?> 
                        <form class="form-signin" method="post"  id="loginform">       
<!--                          <h2 class="form-signin-heading">Sign in</h2>-->
                                  <?php 

//                                    if(isset($val)){
//                                        echo $val;
//                                    }
                                    ?>
                                    <span id="emailcheck"></span>
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email Address"  autofocus="" />

                                    <span id="passwordcheck"></span>
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
                                    <button class="btn btn-lg btn-login btn-block button" type="submit" name="login">Login</button>
                                   <br/> 
                                   <div class="info">If you are new please Sign up first!</div>

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

          var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          $('#login-form').on('click', '.button', function (e) {
              var email = $('#email').val();
              var password = $('#password').val();

              if (email == '' || (!mailformat.test(email))) {
                  document.getElementById("emailcheck").innerHTML = "<div class='alert danger'><center>Fill up each field properly!!</center></div>";
                  $('#email').css('box-shadow', '0 0 10px ##ff0000');
                  $('#email').css('border-color', '#ff0000');
                  e.preventDefault();
              }
              if (password == '') {
                  document.getElementById("emailcheck").innerHTML = "<div class='alert danger'><center>Fill up each field properly!!</center></div>";
                  $('#emailcheck').delay(100).fadeIn(100);
                  $('#emailcheck').fadeOut(2000);
                  $('#password').css('box-shadow', '0 0 10px ##ff0000');
                  $('#password').css('border-color', '#ff0000');
                  e.preventDefault();
              }
          });


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
                  $this.css({"color": "green", "border": "1px solid green"});
              } else {
                  $('#password').css('box-shadow', '0 0 10px #ff0000');
                  $this.css({"color": "green", "border": "1px solid #ff0000"});
              }
          });
      });

</script>


<script>
    $(function(){
          $('#login-form-link').click(function (e){
                $('#loginform').delay(100).fadeIn(100);
                $('#registerform').fadeOut(100);
                $('#register-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            
            
            $('#register-form-link').click(function (e){
                $('#registerform').delay(100).fadeIn(100);
                $('#loginform').fadeOut(100);
                $('#login-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
      });
</script>
</body>
</html>