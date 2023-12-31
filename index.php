<?php
if (isset($_COOKIE["emp_name"]) || isset($_COOKIE["emp_id"]) || isset($_COOKIE["emp_mono"])) {
  ?>

  <script>
    window.location.replace("home_page.php");
  </script>

  <?php
}

?>
<!doctype html>
<html>


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title></title>
  <!-- Plugins CSS -->
  <link href="css/plugins.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/style.css" rel="stylesheet">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
  <style>
    .errorclass {
      border: 1px solid red;
    }
  </style>
</head>

<body>
  <!-- Pre Loader -->
  <!-- Content_right -->
  <div class="container_full h-100vh mt-0">
    <div class="container h-100">
      <!-- State start-->
      <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-6 col-lg-4 mx-auto mb-5">
          <!-- Middle Box -->
          <div class="middle-box">
            <div class="card">
              <div class="card-body p-4">
                <h4 class="font-22">Login Here!</h4>
                <p class="text-muted mb-4">Log in to continue.</p>
                <form action="#">
                  <div class="form-group">
                    <label class="float-left" for="emailaddress">Mobile Number</label>
                    <input class="form-control" type="text" id="text_mobile_number" name="txt_mobile_number"
                      placeholder="Enter Your Mobile Number">
                  </div>
                  <div class="form-group">
                    <label class="float-left" for="password">Password</label>
                    <input class="form-control" type="password" id="pass_password" name="password"
                      placeholder="Enter Your Mobile Number">
                  </div>

                  <div class="form-group text-center">

                    <input class="btn btn-primary btn-block" type="button" id="submit" name="submit" value="Log In">

                  </div>

                  <div class="form-group text-center">
                    <a href="tel:+917869777758">Forgot Password</a>

                  </div>
                  <div>
                    <p style="text-align:center; padding-top:5px; padding-bottom:5px; background-color:lightgreen; font-weight:bold; display:none; color:black;"
                      id="success_promt">
                      Login Successfully !....
                    </p>
                    
                    <p style="text-align:center; padding-top:5px; padding-bottom:5px; background-color:lightcoral; font-weight:bold; display:none; color:black;"
                      id="incorrect_mobile_number_promt">

                      Invalid Mobile Number!....
                    </p>
                    <p style="text-align:center; padding-top:5px; padding-bottom:5px; background-color:lightcoral; font-weight:bold; display:none; color:black;"
                      id="incorrect_password_promt">
                      Invalid Password !....
                    </p>
                  </div>
                </form>
              </div>
              <!-- end card-body -->
            </div>
            <!-- end card -->
          </div>
        </div>
      </div>
      <!-- End row -->
    </div>
  </div>


  <!--jquery js -->
  <script src="js/jquery-min.js"></script>
  <script src="js/popper.min.js"></script>
  <!--jquery js -->
  <script src="js/bootstrap.min.js"></script>
  <!--jquery js -->
  <script src="js/plugins.js"></script>
  <!--mCustomScrollbar js -->
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  <!--Fontawesome js -->
  <script src="js/fontawesome.js"></script>
  <!--Dcjqaccordion js -->
  <script src="js/jquery.dcjqaccordion.js"></script>
  <!-- Plugins JS start-->
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/counter-custom.js"></script>
  <script src="js/photoswipe.min.js"></script>
  <script src="js/photoswipe-ui-default.min.js"></script>
  <script src="js/photoswipe.js"></script>
  <!--jquery js -->
  <script src="js/custom.js"></script>



  <script>



    $("#submit").on("click", function (e) {
      e.preventDefault();
      const text_mobile_number = $("#text_mobile_number").val();
      const pass_password = $("#pass_password").val();

      if (text_mobile_number == "" || text_mobile_number == null) {
        //    alert('Please Enter Your Registered Mobile Number !....');
        $("#text_mobile_number").css({ "border": "1px solid red" });
        $("#text_mobile_number").focus();
        $("#text_mobile_number").keydown(function () {
          $("#text_mobile_number").css({ "border": "1.2px solid skyblue" });
        });




      } else if (pass_password == "" || pass_password == null) {
        // alert("Please Enter Password !....")
        $("#pass_password").css({ "border": "1px solid red" });

        $("#pass_password").focus();
        $("#pass_password").keydown(function () {
          $("#pass_password").css({ "border": "1.2px solid skyblue" });
        });

      } else {
        $.post("check_login.php", { mobile_number: text_mobile_number, password: pass_password }, function (data, status) {
          if (status == "success") {

            if (data == 1) {
              $("#text_mobile_number").css({ "border": "1px solid red" });
              $("#incorrect_mobile_number_promt").css("display", "block");
              $("#text_mobile_number").focus();
              $("#text_mobile_number").keydown(function () {
                $("#text_mobile_number").css({ "border": "1.2px solid skyblue" });
                $("#incorrect_mobile_number_promt").css("display", "none");



              })


            } else if (data == 2) {
              // when password is incorect 
              $("#pass_password").css({ "border": "1px solid red" });
              $("#incorrect_password_promt").css("display", "block");
              $("#pass_password").focus();
              $("#pass_password").keydown(function () {
                $("#pass_password").css({ "border": "1.2px solid skyblue" });
                $("#incorrect_password_promt").css("display", "none");


              })

            } else if (data == 3) {
              // when the all detail is fine then success messege 
              $("#success_promt").css("display", "block");
              location.replace("home_page.php");

            }



          }

        })
      }

    });



  </script>
</body>


</html>