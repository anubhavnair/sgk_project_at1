<?php
include("./header.php");
?>
<div class="content_wrapper bg_homebefore inner-wrapper forms-sec">
  <div class="container-fluid">

      <!-- filter section start  -->

      <span id="filter_icon"><svg width="30" height="30" fill="none" stroke="#0d02b1" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M22 3H2l8 9.46V19l4 2v-8.54L22 3z"></path>
                </svg>Click to Filter</span>
               <div class="row filter_section" style="display:none;">
                 <div class="col-md-12">
                <label>Enter Start Date</label>
                <input type="date" name='date_start_date' id='date_start_date' class="form-control">
                <label> Enter End Date</label>
                <input type="date" name='date_end_date' id='date_end_date' class="form-control">
                <label> Enter Vehical Number</label>
                <input type="text" name="text_vehical_number" id='text_vehical_number'
                    placeholder="Enter Vehical Number" class="form-control">
            </div>
</div>

                        <!-- filter section end  -->


    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
      <!-- Start row -->
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <h4 class="page-title">Tank Master</h4>

        </div>
        <div class="col-md-4 col-lg-4 mr-0">
          <div class="widgetbar">
            <button id="add" class="btn btn-primary">Add</button>
            <button id="manage" class="btn btn-primary">Manage</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- state start-->
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <h4 class="header-title">Enter Details</h4>
          
          <form class="forms-sample">
                 <div class="form-group col-12 d-flex ">
                    <input type="date" class="form-control" name="date_enter_date" id="date_enter_date"value="">
                  </div>
                  <div class="form-group row">
                    <label for="txt_select_area" class="col-md-3 col-form-label font-weight-bold">Select Area</label>
                    <div class="form-group row col-md-6">
                      <select class="form-control" name="txt_select_area" id="txt_select_area">
                        <option value="1">Raipur</option>
                        <option value="2">Durg</option>
                        <option value="3">Bhilai</option>
                        <option value="4">Rajnandgaon</option>
                      </select>
                    </div>
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
                    <textarea class="form-control" id="txt_description" name="txt_description" placeholder="Enter Description"></textarea>
                  </div>

                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  include("./footer.php");
  ?>
  <script>


    $("#add").on("click", function (e) {
      window.location.replace("./tank_master.php");
    })
    $("#manage").on("click", function (e) {
      window.location.replace("./tank_master_table.php");
    })
    $("#filter_icon").on("click", function (e) {

$(".filter_section").slideToggle();

});

$(document).ready(function() {
    // Get the current date
    var currentDate = new Date();

    // Format the date as "YYYY-MM-DD" (required format for input type="date)
    var year = currentDate.getFullYear();
    var month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed
    var day = String(currentDate.getDate()).padStart(2, '0');
    var formattedDate = year + '-' + month + '-' + day;

    // Set the value of the input to the current date
    $('#date_enter_date').val(formattedDate);
  });
  </script>
 