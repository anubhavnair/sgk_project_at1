<?php
require_once('./header.php');
?>
<div class="content_wrapper bg_homebefore inner-wrapper forms-sec">
    <div class="container-fluid">


        <!-- Start Breadcrumbbar -->
        <div class="breadcrumbbar">
            <!-- Start row -->
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <h4 class="page-title">Vehical Master</h4>

                </div>
                <div class="col-md-4 col-lg-4 mr-0">
                    <div class="widgetbar">
                        <button class="btn btn-primary" id="vehical_master_add">Add</button>
                        <button class="btn btn-primary" id="vehical_manag_btn">Manage</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbbar -->
        <!-- state start-->
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">

                <form class="forms-sample">
              
                
                
                  <div class="form-group">
                    <label for="date_enter_date">Enter Vehical Name</label>
                    <input type="text" class="form-control" name="text_vehical_name" id="text_vehical_name" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="txt_total_refill">Driver Name</label>
                    <input type="text" class="form-control" name="txt_driver_name" id="txt_driver_name" placeholder="Enter Driver Name">
                  </div>
                  <div class="form-group">
                    <label for="txt_opening_meter">Vehical Number</label>
                    <input type="text" class="form-control" id="txt_vehical_name" name="text_vehical_name" placeholder="Enter Vehical Number">
                  </div>
                  <div class="form-group">
                    <label for="txt_closing_meter">Driver Number</label>
                    <input type="text" class="form-control" id="txt_driver_number" name="txt_driver_number" placeholder="Enter Driver Number">
                  </div>
                
              

                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
                </div>
            </div>
        </div>

        <?php
        require_once('./footer.php');
        ?>
        <script>

            $("#vehical_manag_btn").on("click", function (e) {
                window.location.replace("./vehical_master_manage.php");
            })
            $("#vehical_master_add").on("click", function (e) {
                window.location.replace("./vehical_master.php");
            })
            $("#filter_icon").on("click", function (e) {

                $(".filter_section").slideToggle();

            });

        </script>