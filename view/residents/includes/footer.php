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
         timeOut();
         $.ajax({
             url:"http://localhost/bitm/bitm-final-project/view/residents/allNewMessage.php",
             method:"POST",
             dataType:"json",
             success:function (data) {
//                 alert(data.total);
////                      data = JSON.parse(data);
                 $(".message-content").html(data.notify);
                 if(data.total >0 ){
                     $("#newMessage").html(data.total);
                     $(".message-content").html(data.notify);
                 }
             }
         });
     });


     $(document).ready(function () {
         timeOut1();
         $.ajax({
             url:"http://localhost/BITM/bitm-final-project/view/residents/mngrmessage.php",
             method:"POST",
             dataType:"json",
             success:function (data) {
//                 alert(data.total);
////                      data = JSON.parse(data);
                 $(".message-content-mrg").html(data.notify);
                 if(data.total >0 ){
                     $("#newMnrgMessage").html(data.total);
                     $(".message-content-mrg").html(data.notify);
                 }
             }
         });
     });

     function timeOut(){
         setTimeout(function(){
             update();
             update1();
             timeOut();
         },5000);
     }

     function timeOut1(){
         setTimeout(function(){
             update1();
             timeOut1();
         },5000);
     }

     //update real time notification
     function update(){
         $.getJSON('view/residents/allNewMessage.php',function(data){
             $.each(data,function (){
                 $("#newMessage").html(data.total);
                 $(".message-content").html(data.notify);
             });
         });
     }
     function update1(){
         $.getJSON('http://localhost/BITM/bitm-final-project/view/residents/mngrmessage.php',function(data){
             $.each(data,function (){
                 $("#newMnrgMessage").html(data.total);
                 $(".message-content-mrg").html(data.notify);
             });
         });
     }


     $(document).ready(function () {

//         $("#expenditureList").DataTable();
         $("#ResidentexpenditureList").DataTable();

         $('.alert').delay(5000).fadeOut(1000, function () {
             $(this).alert('close');
         });

         //New notice
         $.ajax({
             type:'get',
             url:"view/residents/notice/newNotice.php",
             success:function (response) {
                 $('#newNotice').html(response);
//                 alert(response);
             }
         });
     });

     setInterval(function(){
         $('#newNotice').load('view/residents/notice/newNotice.php');
     },8000);


      // This will run on page load




 </script>

 <script>
     function validateQuery() {
         var query=document.forms["queryPost"]["query"].value;
         if(query==''){
             $('#queryCheck').text('Please write something .....');
             $('#queryCheck').css('color','red');
             return false
         }else{
             return true;
         }
     }
 </script>
  </body>
</html>