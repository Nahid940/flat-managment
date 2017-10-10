 <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>Manager &copy; 2017-2019</p>
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
 
<!--   <button type="button" data-toggle="collapse" data-target="#style-switch" id="style-switch-button" class="btn btn-primary btn-sm hidden-xs hidden-sm"><i class="fa fa-cog fa-2x"></i></button>-->
<!--    <div id="style-switch" class="collapse">-->
<!--      <h4 class="mb-3">Select theme colour</h4>-->
<!--      <form class="mb-3">-->
<!--        <select name="colour" id="colour" class="form-control">-->
<!--          <option value="">select colour variant</option>-->
<!--          <option value="default">violet</option>-->
<!--          <option value="pink">pink</option>-->
<!--          <option value="red">red</option>-->
<!--          <option value="green">green</option>-->
<!--          <option value="sea">sea</option>-->
<!--          <option value="blue">blue</option>-->
<!--        </select>-->
<!--      </form>-->
<!--      <p><img src="assets/img/template-mac.png" alt="" class="img-fluid"></p>-->
<!--      <p class="text-muted text-small"> <small>Stylesheet switching is done via JavaScript and can cause a blink while page loads. This will not happen in your production code.</small></p>-->
<!--    </div>-->
    <!-- Javascript files-->
    <script src="assets/ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="assets/js/tether.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.cookie.js"> </script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="assets/js/charts-home.js"></script>
    <script src="assets/js/front.js"></script>
     <script src="assets/js/dataTables.bootstrap.min.js"></script>
     <script src="assets/js/jquery.dataTables.min.js"></script>
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

 <script>
     $(document).ready(function () {
         $("#expenditureList").DataTable();
         $("#SatffSalaryList").DataTable();
         $("#EachManagerSalaryList").DataTable();

         $('.alert').delay(5000).fadeOut(1000, function () {
             $(this).alert('close');
         });



         $(".checkevent").on('click',function(e){
             e.preventDefault();
             var query_no = jQuery(this).prevAll('input[name="query_no"]').val();
//             alert(query_no);
             $.ajax({
                 type: "POST",
                 data:{
                     query_no: query_no
                 },
                 url: "view/manager/view/admin/manager/query/CheckedQuery.php",
             });
             $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
                 .animate({ opacity: "hide" }, "slow");
         });
     });
     //});


     $(document).ready(function () {
         timeOut();
         $.ajax({
             url:"http://localhost/BITM/bitm-final-project/view/manager/view/admin/manager/query/jsondata/allNewquery.php",
             method:"POST",
//                  data:{view:view},
             dataType:"json",
             success:function (data) {

//                 data = JSON.parse(data);
//                 alert(data.total);
                 $(".notification-content").html(data.notify);
                 if(data.total >0 ){
                     $("#managerquery").html(data.total);
                     $(".notification-content").html(data.notify);
                 }else{
                     $("#managerquery").html("");
                 }
             }
         });
     });


     function timeOut(){
         setTimeout(function(){
             update();
             timeOut();
         },300);
     }

     //update real time notification
     function update(){
         $.getJSON('view/manager/view/admin/manager/query/jsondata/allNewquery.php',function(data){
             $.each(data,function (){
                 $("#managerquery").html(data.total);
                 $(".notification-content").html(data.notify);
             });
         });
     }


     //check existing manager ID

     function checkExistingResidentID(){
            var resident_id=document.getElementById("resident_id").value;
            if(resident_id!=''){
                $.ajax({
                    type:'post',
                    url:"http://localhost/BITM/bitm-final-project/view/manager/view/admin/manager/resident/cehckexistIngResident.php",
                    data:{
                        resident_id:resident_id
                    },
                    success:function (response) {
                        $('#residentExist').html(response);
//                        $('#resident_id').css('border-color','red');

                        if(response=='Available'){
                            $('#residentExist').css({'color':'green','font-weight':'bold'});
                            $('#resident_id').css('border-color','green');

                            document.getElementById("addNewResidents").disabled = false;

                            return true;
                        }else{
                            $('#residentExist').css('color','red');
                            $('#resident_id').css('border-color','red');
                            document.getElementById("addNewResidents").disabled = true;
                            return false;
                        }

                    }
                });
            }
     }

 </script>

 <script>

     function validateStaffInfoForm()
     {
         var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
         var staff_id=document.forms["addStaffModalform"]["staff_id"].value;
         var name=document.forms["addStaffModalform"]["name"].value;
         var age=document.forms["addStaffModalform"]["age"].value;
         var nid=document.forms["addStaffModalform"]["nid"].value;
         var phn=document.forms["addStaffModalform"]["phn"].value;
         var email=document.forms["addStaffModalform"]["email"].value;
         var password=document.forms["addStaffModalform"]["password"].value;
         var cpassword=document.forms["addStaffModalform"]["cpassword"].value;

         var image=document.getElementById('image');
////         var file = image.files[0];
//         //var fileType = image.substring(image.lastIndexOf('.')+1);
//         var fileType = file["type"];
//         var ValidImageTypes = ["image/gif", "image/jpeg", "image/png","image/jpg"];

//         var password=document.forms['addmanagerModalform']['password'].value;
         if( staff_id==''){
             $('#IDvalidatorModal').text("Staff ID required !");
             $('#IDvalidatorModal').css({"color": "red", "font-weight": "bold"});
             return false;
         }
         else if(name==''){
             $('#namevalidatorModal').text("Staff name required !");
             $('#namevalidatorModal').css({"color": "red", "font-weight": "bold"});
             return false;
         }

//
         else if(age=='' || (isNaN(age)) || age>120){
             $('#AgevalidatorModal').text("Enter valid age !");
             $('#AgevalidatorModal').css({"color": "red", "font-weight": "bold"});
             return false;
         }

         else if(nid=='' || (isNaN(nid)) || nid.length<9){
             $('#NIDvalidatorModal').text("Enter valid NID No. !");
             $('#NIDvalidatorModal').css({"color": "red", "font-weight": "bold"});
             return false;
         }

         else if(phn==''){
             $('#PhnvalidatorModal').text("Enter phone No.. !");
             $('#PhnvalidatorModal').css({"color": "red", "font-weight": "bold"});
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
         }
         else if( image.value==''){
             $('#Imagevalidator').text("Select image !");
             $('#Imagevalidator').css({"color": "red", "font-weight": "bold"});
             return false;
         }
         else if((image.files[0].size)>50000 ){
             $('#Imagevalidator').text("Select 50 kb image only !");
             $('#Imagevalidator').css({"color": "red", "font-weight": "bold"});
             return false;
         }
         else if( $.inArray(fileType, ValidImageTypes) < 0){
             $('#Imagevalidator').text("File format is not supported!");
             $('#Imagevalidator').css({"color": "red", "font-weight": "bold"});
             return false;
         }
         else{
             return true;
         }
     }

 </script>

 <script>
     function validateNewResidentInfoForm()
     {
         var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
         var resident_id=document.forms["addResidentform"]["resident_id"].value;
         var name=document.forms["addResidentform"]["name"].value;
         var fmember=document.forms["addResidentform"]["fmember"].value;
         var nid=document.forms["addResidentform"]["nid"].value;
         var phn=document.forms["addResidentform"]["phn"].value;
         var password=document.forms["addResidentform"]["password"].value;
         var cpassword=document.forms["addResidentform"]["cpassword"].value;
//         var image=document.getElementById('image');
////         var file = image.files[0];
//         //var fileType = image.substring(image.lastIndexOf('.')+1);
//         var fileType = file["type"];
//         var ValidImageTypes = ["image/gif", "image/jpeg", "image/png","image/jpg"];

//         var password=document.forms['addmanagerModalform']['password'].value;
         if( resident_id==''){
             $('#IDvalidatorModal').text("Staff ID required !");
             $('#IDvalidatorModal').css({"color": "red", "font-weight": "bold"});
             return false;
         }
         else if(name==''){
             $('#namevalidatorModal').text("Staff name required !");
             $('#namevalidatorModal').css({"color": "red", "font-weight": "bold"});
             return false;
         }
         else if(fmember=='' || isNaN(fmember)){
             $('#fmemberVaidate').text("Enter total family member !");
             $('#fmemberVaidate').css({"color": "red", "font-weight": "bold"});
             return false;
         }


         else if(nid=='' || (isNaN(nid)) || nid.length<9){
             $('#NIDvalidatorModal').text("Enter valid NID No. !");
             $('#NIDvalidatorModal').css({"color": "red", "font-weight": "bold"});
             return false;
         }

         else if(phn==''){
             $('#PhnvalidatorModal').text("Enter phone No.. !");
             $('#PhnvalidatorModal').css({"color": "red", "font-weight": "bold"});
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
         }
//         else if( image.value==''){
//             $('#Imagevalidator').text("Select image !");
//             $('#Imagevalidator').css({"color": "red", "font-weight": "bold"});
//             return false;
//         }
//         else if((image.files[0].size)>50000 ){
//             $('#Imagevalidator').text("Select 50 kb image only !");
//             $('#Imagevalidator').css({"color": "red", "font-weight": "bold"});
//             return false;
//         }
//         else if( $.inArray(fileType, ValidImageTypes) < 0){
//             $('#Imagevalidator').text("File format is not supported!");
//             $('#Imagevalidator').css({"color": "red", "font-weight": "bold"});
//             return false;
//         }
     else{
         return true;
     }
     }

     $(document).on('click','.delete',function () {
         var uniqueid=$(this);
         $('#uniqueid').val(uniqueid.data('id'));
     });
     $(document).on('click','.sendmsg',function () {
         var uniqueid=$(this);
         $('#resid').val(uniqueid.data('id'));
     });

     function validateMngrNotice(){
         var notice=document.forms["mngrNoticeForm"]["notice"].value;
         if(notice==''){
             $('#validateNotice').html("Write something");
             $('#validateNotice').css({'color':'red','font-weight':'bold'});
             return false;
         }
         else{
             return true;
         }
     }

 </script>
  </body>
</html>