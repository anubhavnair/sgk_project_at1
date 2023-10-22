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
                <div class="form-group row">
                    <label for="txt_select_area" class="col-md-3 col-form-label">Select Area</label>
                    <div class="col-md-6" >
                        <select class="form-control custom-select" name="txt_select_area" id="txt_select_area" style="height:50px !important">
                        <option value="1">Raipur</option>
                        <option value="2">Durg</option>
                        <option value="3">Bhilai</option>
                        <option value="4">Rajnandgaon</option>
                        </select>
                    </div>
                </div>

                
                
                  <div class="form-group">
                    <label for="date_enter_date">Enter Date</label>
                    <input type="date" class="form-control" name="date_enter_date" id="date_enter_date" placeholder="Enter Date">
                  </div>
                  <div class="form-group">
                    <label for="txt_total_refill">Total refill</label>
                    <input type="text" class="form-control" name="txt_total_refill" id="txt_total_refill" placeholder="Enter Total Refill">
                  </div>
                  <div class="form-group">
                    <label for="txt_opening_meter">Opening meter</label>
                    <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter" placeholder="Enter Opening Meter">
                  </div>
                  <div class="form-group">
                    <label for="txt_closing_meter">Closing meter</label>
                    <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter" placeholder="Enter Closing Meter">
                  </div>
                  <div class="form-group">
                    <label for="txt_desel_out">Desel out</label>
                    <input type="text" class="form-control" id="txt_desel_out" name="txt_desel_out" placeholder="Enter Desel Out">
                  </div>
                  <div class="form-group">
                    <label for="txt_description">Description</label>
                    <textarea class="form-control" id="txt_description" rows="30" name="txt_description" placeholder="Enter Description" style="height:125px !important"></textarea>
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