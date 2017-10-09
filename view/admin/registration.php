<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
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
                    <h2>Registration form</h2>
                    <center><span id="validator" class="label label-default colorOrange"></span></center>
                </div>

                <div class="panel-body">


                    <div class="row">
                        <div class="col-lg-12">

                            <form id="registerform" name="regform" action="" method="post" role="form" class="register-form" onsubmit="return validateForm();" enctype="multipart/form-data">

                                <div class="form-group">
                                    <span id="nameValid" style="color:red;font-weight:bold"></span>
                                    <label for="name" id="label1">Enter your name:</label>
                                    <input type="text" class="form-control" id="name1" placeholder="Enter name" name="name" >
                                </div>
                                <div class="form-group">
                                    <label for="email" id="label2">Enter your email:</label>
                                    <input type="email" name="email" id="email1" tabindex="1" class="form-control" placeholder="Email" value="">
                                </div>



                                <div class="form-group">

                                    <label for="password1" id="label7">Enter password</label>

                                    <span class="label label-danger" id="wrongpassword"></span>

                                    <input type="password" name="password" id="password"  class="form-control" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <label for="confirmpassword" id="label8">Confirm password</label>
                                    <span id="confirmpasswordWarning"></span>
                                    <input type="password" name="confirmpassword" id="confirmpassword" tabindex="2" class="form-control" placeholder="Confirm Password">
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <span id="checkImageSize"></span>
                                    <input type="file" name="image" class="form-control" id="image">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-lg btn-login btn-block button" type="submit" name="register" id="reg">Register</button>
                                </div>
                                Already registered? go to <a href="login.php">Login</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div id="dialog-message" title="Registration complete" style="display:none">Registration complete !! go to <iclass="fa fa-sign-in" aria-hidden="true"></i> <a href="login.php">Login</a></div>
            <div id="dialog-message1" title="Registration failed!!" style="display:none;color:red">Email already exist ! Try another</div>
        </div>
    </div>
</div>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function() {

        var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

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




        //Check input value for registration form//
        //----------------------------------------------------------------------------------------------------------------------//
        $('input[type=text]').keyup(function () {
            var $this = $(this);
            var insertedVal = $this.val();
            if (insertedVal != '') {
                $this.css('box-shadow', '0 0 10px green');
                $this.css({"color": "green", "border": "1px solid green"});
            } else {
                $this.css('box-shadow', '0 0 10px #ff0000');
                $this.css({"color": "red", "border": "1px solid #ff0000"})
            }
        });

        $('#email1').keyup(function () {
            var $this = $(this);
            var insertedVal = $this.val();
            if (insertedVal != '' && (mailformat.test(insertedVal))) {
                $this.css('box-shadow', '0 0 10px green');
                $this.css({"color": "green", "border": "1px solid green"});
            } else {
                $this.css('box-shadow', '0 0 10px #ff0000');
                $this.css({"color": "red", "border": "1px solid #ff0000"});
            }
        });


        //check password length and if it is empty//------------------------------------------------------------------//
        $('#password').keyup(function () {
            var $this = $(this);
            var insertedVal = $this.val();
            if (insertedVal != '' && insertedVal.length >= 10) {
                $this.css('box-shadow', '0 0 10px green');
                $this.css({"color": "green", "border": "1px solid green"});
                $('#wrongpassword').hide();
            } else {
                $('#wrongpassword').show();
                $('#wrongpassword').text('Password must be 10 characters long !!');
                $this.css('box-shadow', '0 0 10px #ff0000');
                $this.css({"color": "#ff0000", "border": "1px solid #ff0000"})
            }
        });

        //Check if password matches................................................................................
        $('#confirmpassword').keyup(function () {
            var p1 = $('#password').val();
            var p2 = $('#confirmpassword').val();

            if (p2 == p1 && p2 != '') {
                $('#confirmpasswordWarning').html("<i class='fa fa-check' aria-hidden='true'></i>Password  matches !");
                $('#confirmpasswordWarning').css("color", "green");
                $('#confirmpassword').css({"color": "green", "box-shadow": '0 0 10px green'});
                $('#password').css('box-shadow', '0 0 10px green');
            }
            else {
                $('#confirmpasswordWarning').html(" <i class='fa fa-times' aria-hidden='true'></i>Password doesn't match !");
                $('#confirmpasswordWarning').css({"color": "#ff0000"});
                $('#confirmpassword').css({
                    "color": "#ff0000",
                    "border-color": "#ff0000",
                    "box-shadow": "0 0 10px #ff0000"
                });
            }
        });

    });

        function validateForm() {

            var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            var name=document.forms["regform"]["name"].value;
            var email=document.forms["regform"]["email"].value;
            var password=document.forms['regform']['password'].value;
            var confirmpassword=document.forms['regform']['confirmpassword'].value;

            if (name == '') {
                $('#validator').text('Enter your name');
                return false;
            }
             else if (email == '' || (!mailformat.test(email))) {
                $('#validator').text('Enter your email');
                return false;
            }
            else if (password == '') {
                $('#validator').text('Enter password');
                return false;
            }
            else if (confirmpassword == '' || confirmpassword!=password) {
                $('#validator').text('Reenter password');
                return false;
            }else{
                return true;
            }

        }


    var myFile = document.getElementById('image');
    myFile.addEventListener('change', function() {
        var file = this.files[0];
        var fileType = file["type"];
        var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];
        if((this.files[0].size)>50000){
            $('#checkImageSize').show();
            $('#checkImageSize').text("50 kb is allowed !");
            $('#image').css({"border-color":"#ff0000","box-shadow":'0 0 10px #ff0000'});
            document.getElementById('image').value="";

        }else if($.inArray(fileType, ValidImageTypes) < 0){
            $('#checkImageSize').show();
            $('#checkImageSize').text("File format is not supported !");
            $('#checkImageSize').css({'color':'red','font-weight':'bold'});
            $('#image').css({"border-color":"#ff0000","box-shadow":'0 0 10px #ff0000'});
            document.getElementById('image').value="";
        }
        else{
            $('#checkImageSize').hide();
            $('#image').css({"border-color":"green","box-shadow":'0 0 10px green'});
            return true;
        }

    });

    //    || (mailformat.test(email))
</script>

</body>
</html>