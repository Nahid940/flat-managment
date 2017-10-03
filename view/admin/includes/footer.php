 <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>Touchdevs &copy; 2017-2019</p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>Design by <a href="http://touchdevs.com" class="external">Touchdevs.com</a></p>
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
   <button type="button" data-toggle="collapse" data-target="#style-switch" id="style-switch-button" class="btn btn-primary btn-sm hidden-xs hidden-sm"><i class="fa fa-cog fa-2x"></i></button>
    <div id="style-switch" class="collapse">
      <h4 class="mb-3">Select theme colour</h4>
      <form class="mb-3">
        <select name="colour" id="colour" class="form-control">
          <option value="">select colour variant</option>
          <option value="default">violet</option>
          <option value="pink">pink</option>
          <option value="red">red</option>
          <option value="green">green</option>
          <option value="sea">sea</option>
          <option value="blue">blue</option>
        </select>
      </form>
      <p><img src="assets/img/template-mac.png" alt="" class="img-fluid"></p>
      <p class="text-muted text-small"> <small>Stylesheet switching is done via JavaScript and can cause a blink while page loads. This will not happen in your production code.</small></p>
    </div>
    <!-- Javascript files-->
    <script src="assets/ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="assets/js/tether.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.cookie.js"> </script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="assets/js/charts-home.js"></script>
    <script src="assets/js/front.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!---->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]+
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='../../www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>


<!--//------------------------------Check the validity of add new manager modal form data------------------------------------//-->
 <script>

     $(document).ready(function () {
         $('.alert').delay(5000).fadeOut(1000,function () {
             $(this).alert('close');
         });

//         Count total managers and staffs...........................................................

             $.ajax({
                 url:"http://localhost/BITM/bitm-final-project/view/admin/view/admin/owner/manager/jsonData/totalManagerandStaff.php",
                 method:"POST",
//                  data:{view:view},
                 dataType:"json",
                 success:function (data) {
//                      data = JSON.parse(data);
                     //$(".notification-content").html(data.notification);
                     if(data.total >0 ){
                         //$("#total").html(data.total);
                         $(".Ajaxdata").html(data.total);
                     }
                 }
             });
     });

     //get the id of the person to delete............................................................................
     $(document).on('click','.delete',function () {
         var uniqueid=$(this);
         $('#uniqueid').val(uniqueid.data('id'));

     });


     function validateManagerInfoForm()
     {
         var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
         var manager_id=document.forms["addmanagerModalform"]["manager_id"].value;
         var name=document.forms["addmanagerModalform"]["name"].value;
         var age=document.forms["addmanagerModalform"]["age"].value;
         var nid=document.forms["addmanagerModalform"]["nid"].value;
         var phn=document.forms["addmanagerModalform"]["phn"].value;
         var email=document.forms["addmanagerModalform"]["email"].value;
         var password=document.forms["addmanagerModalform"]["password"].value;
         var cpassword=document.forms["addmanagerModalform"]["cpassword"].value;

         var image=document.getElementById('image');
//         var file = image.files[0];
         //var fileType = image.substring(image.lastIndexOf('.')+1);
         //var fileType = file["type"];
         //var ValidImageTypes = ["image/gif", "image/jpeg", "image/png","image/jpg"];

         var password=document.forms['addmanagerModalform']['password'].value;
         if( manager_id==''){
                $('#IDvalidatorModal').text("Manager ID required !");
                $('#IDvalidatorModal').css({"color": "red", "font-weight": "bold"});
             return false;
         }else if(name==''){
             $('#namevalidatorModal').text("Manager name required !");
             $('#namevalidatorModal').css({"color": "red", "font-weight": "bold"});
             return false;
         }
         else if(nid=='' || (isNaN(nid)) || nid.length<9){
             $('#NIDvalidatorModal').text("Enter valid NID No. !");
             $('#NIDvalidatorModal').css({"color": "red", "font-weight": "bold"});
             return false;
         }

         else if(age=='' || (isNaN(age)) || age>120){
             $('#AgevalidatorModal').text("Enter valid age !");
             $('#AgevalidatorModal').css({"color": "red", "font-weight": "bold"});
             return false;
         }
         else if(email=='' || (!mailformat.test(email))){
             $('#EmailvalidatorModal').text("Enter valid email. !");
             $('#EmailvalidatorModal').css({"color": "red", "font-weight": "bold"});
             return false;
         }

         else if(password=='' || password.length<6){
             $('#PasswordValidatorModal').text("Enter correct password. !");
             $('#PasswordValidatorModal').css({"color": "red", "font-weight": "bold"});
             return false;
         }

         else if(cpassword=='' || (cpassword!=password)){
             $('#ConfirmPasswordValidatorModal').text("Reenter password !");
             $('#ConfirmPasswordValidatorModal').css({"color": "red", "font-weight": "bold"});
             return false;
         }else if( image.value==''){
             $('#Imagevalidator').text("Select image !");
             $('#Imagevalidator').css({"color": "red", "font-weight": "bold"});
             return false;
         }
         else if((image.files[0].size)>50000 ){
             $('#Imagevalidator').text("Select 50 kb image only !");
             $('#Imagevalidator').css({"color": "red", "font-weight": "bold"});
             return false;
         }else if( $.inArray(fileType, ValidImageTypes) < 0){
             $('#Imagevalidator').text("File format is not supported!");
             $('#Imagevalidator').css({"color": "red", "font-weight": "bold"});
             return false;
        }
         else{

             return true;
         }
     }





//     check existing manager id---------------------------------------------------------------------




     function checkExistingID()
     {
         var manager_id=document.getElementById( "manager_id" ).value;
         if(manager_id !='')
         {
             $.ajax({
                 type: 'post',
                 url: 'view/admin/view/admin/owner/manager/checkExistingManagerID.php',
                 data: {
                     manager_id:manager_id
                 },
                 success: function (response) {
                     $( '#IDvalidatorModal' ).html(response);
                     $("#IDvalidatorModal").css({"color":"green","font-weight":"bold"});
                     if(response=="Available")
                     {
                         $("#manager_id").css("border-color","green");
                         $("#manager_id").css("color","green");
                         document.getElementById("addNewManager").disabled = false;
                         return true;
                     }
                     else
                     {
                         $("#manager_id").css("border-color","red");
                         $("#manager_id").css("color","red");
                         $("#IDvalidatorModal").css("border-color","red");
                         $("#IDvalidatorModal").css("color","red");
                         document.getElementById("addNewManager").disabled = true;
                         return false;
                     }
                 }
             });
         }
         else
         {
             $( '#IDvalidatorModal' ).html("");
             return false;
         }
     }



 </script>

  </body>
</html>