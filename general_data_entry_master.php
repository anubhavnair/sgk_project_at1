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
                <label> Select Vehical</label>
                <select class="form-control">
    <option value="option1"></option>
    <option value="option2">Vehical-2 Name Here</option>
    <option value="option3">Vehical-3 Name Here</option>
    <option value="option3">Vehical-4 Name Here</option>
    <option value="option3">Vehical-5 Name Here</option>
  </select>
            </div>
</div>

                        <!-- filter section end  -->


    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
      <!-- Start row -->
      <div class="row">
        <div class="col-md-8 col-lg-8">
          <h4 class="page-title">General data entry</h4>

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
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <h4 class="header-title">Enter Details</h4>
          <form class="forms-sample">
          <div class="form-group">
              <input type="date" class="form-control" name="date_enter_date" id="date_enter_date"
                placeholder="Enter Date">
            </div>
          <div class="table-responsive-xl">
            <table class="table">
              <thead>
                <tr>
                  
                  <th scope="col">Vehicle</th>
                  <th scope="col">No. of Trips</th>
                  <th scope="col">Work Description</th>
                  <th scope="col">Opening Meter</th>
                  <th scope="col">Opening Dip</th>
                  <th scope="col">Closing Meter</th>
                  <th scope="col">Closing Dip</th>
                  <th scope="col">K.M.</th>
                  <th scope="col">Desel</th>
                  <th scope="col">Average</th>
                  <th scope="col">Remark</th>
                </tr>
              </thead>
              <tbody>
              <tr>
                   <td> <div class="form-group">
              <!-- <label for="txt_select_vehicle">Select vehicle</label> -->
              <select class="form-control" name="txt_select_vehicle" id="txt_select_vehicle">
                <option value="1">JCB</option>
                <option value="2">Truck</option>
                <option value="3">Tractor</option>
                <option value="4">Dumpher</option>
              </select>
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_no_of_trips">No. of trips</label> -->
              <input type="text" class="form-control" id="txt_no_of_trips" name="txt_no_of_trips"
                >
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_work_description">Work description</label> -->
              <textarea class="form-control" id="txt_work_description" name="txt_work_description"
                ></textarea>
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_meter">Opening meter</label> -->
              <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_dip">Opening dip</label> -->
              <input type="text" class="form-control" id="txt_opening_dip" name="txt_opening_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_meter">Closing meter</label> -->
              <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_dip">Closing dip</label> -->
              <input type="text" class="form-control" id="txt_closing_dip" name="txt_closing_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_km">K.M.</label> -->
              <input type="text" class="form-control" id="txt_km" name="txt_km" >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_desel">Desel</label> -->
              <input type="text" class="form-control" id="txt_desel" name="txt_desel">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_average">Average</label> -->
              <input type="text" class="form-control" id="txt_average" name="txt_average">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_remark">Remark</label> -->
              <textarea class="form-control" id="txt_remark" name="txt_remark"></textarea>
            </div></td>
                </tr> <tr>
                   <td> <div class="form-group">
              <!-- <label for="txt_select_vehicle">Select vehicle</label> -->
              <select class="form-control" name="txt_select_vehicle" id="txt_select_vehicle">
                <option value="1">JCB</option>
                <option value="2">Truck</option>
                <option value="3">Tractor</option>
                <option value="4">Dumpher</option>
              </select>
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_no_of_trips">No. of trips</label> -->
              <input type="text" class="form-control" id="txt_no_of_trips" name="txt_no_of_trips"
                >
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_work_description">Work description</label> -->
              <textarea class="form-control" id="txt_work_description" name="txt_work_description"
                ></textarea>
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_meter">Opening meter</label> -->
              <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_dip">Opening dip</label> -->
              <input type="text" class="form-control" id="txt_opening_dip" name="txt_opening_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_meter">Closing meter</label> -->
              <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_dip">Closing dip</label> -->
              <input type="text" class="form-control" id="txt_closing_dip" name="txt_closing_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_km">K.M.</label> -->
              <input type="text" class="form-control" id="txt_km" name="txt_km" >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_desel">Desel</label> -->
              <input type="text" class="form-control" id="txt_desel" name="txt_desel">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_average">Average</label> -->
              <input type="text" class="form-control" id="txt_average" name="txt_average">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_remark">Remark</label> -->
              <textarea class="form-control" id="txt_remark" name="txt_remark"></textarea>
            </div></td>
                </tr> <tr>
                   <td> <div class="form-group">
              <!-- <label for="txt_select_vehicle">Select vehicle</label> -->
              <select class="form-control" name="txt_select_vehicle" id="txt_select_vehicle">
                <option value="1">JCB</option>
                <option value="2">Truck</option>
                <option value="3">Tractor</option>
                <option value="4">Dumpher</option>
              </select>
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_no_of_trips">No. of trips</label> -->
              <input type="text" class="form-control" id="txt_no_of_trips" name="txt_no_of_trips"
                >
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_work_description">Work description</label> -->
              <textarea class="form-control" id="txt_work_description" name="txt_work_description"
                ></textarea>
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_meter">Opening meter</label> -->
              <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_dip">Opening dip</label> -->
              <input type="text" class="form-control" id="txt_opening_dip" name="txt_opening_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_meter">Closing meter</label> -->
              <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_dip">Closing dip</label> -->
              <input type="text" class="form-control" id="txt_closing_dip" name="txt_closing_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_km">K.M.</label> -->
              <input type="text" class="form-control" id="txt_km" name="txt_km" >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_desel">Desel</label> -->
              <input type="text" class="form-control" id="txt_desel" name="txt_desel">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_average">Average</label> -->
              <input type="text" class="form-control" id="txt_average" name="txt_average">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_remark">Remark</label> -->
              <textarea class="form-control" id="txt_remark" name="txt_remark"></textarea>
            </div></td>
                </tr> <tr>
                   <td> <div class="form-group">
              <!-- <label for="txt_select_vehicle">Select vehicle</label> -->
              <select class="form-control" name="txt_select_vehicle" id="txt_select_vehicle">
                <option value="1">JCB</option>
                <option value="2">Truck</option>
                <option value="3">Tractor</option>
                <option value="4">Dumpher</option>
              </select>
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_no_of_trips">No. of trips</label> -->
              <input type="text" class="form-control" id="txt_no_of_trips" name="txt_no_of_trips"
                >
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_work_description">Work description</label> -->
              <textarea class="form-control" id="txt_work_description" name="txt_work_description"
                ></textarea>
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_meter">Opening meter</label> -->
              <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_dip">Opening dip</label> -->
              <input type="text" class="form-control" id="txt_opening_dip" name="txt_opening_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_meter">Closing meter</label> -->
              <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_dip">Closing dip</label> -->
              <input type="text" class="form-control" id="txt_closing_dip" name="txt_closing_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_km">K.M.</label> -->
              <input type="text" class="form-control" id="txt_km" name="txt_km" >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_desel">Desel</label> -->
              <input type="text" class="form-control" id="txt_desel" name="txt_desel">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_average">Average</label> -->
              <input type="text" class="form-control" id="txt_average" name="txt_average">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_remark">Remark</label> -->
              <textarea class="form-control" id="txt_remark" name="txt_remark"></textarea>
            </div></td>
                </tr> <tr>
                   <td> <div class="form-group">
              <!-- <label for="txt_select_vehicle">Select vehicle</label> -->
              <select class="form-control" name="txt_select_vehicle" id="txt_select_vehicle">
                <option value="1">JCB</option>
                <option value="2">Truck</option>
                <option value="3">Tractor</option>
                <option value="4">Dumpher</option>
              </select>
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_no_of_trips">No. of trips</label> -->
              <input type="text" class="form-control" id="txt_no_of_trips" name="txt_no_of_trips"
                >
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_work_description">Work description</label> -->
              <textarea class="form-control" id="txt_work_description" name="txt_work_description"
                ></textarea>
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_meter">Opening meter</label> -->
              <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_dip">Opening dip</label> -->
              <input type="text" class="form-control" id="txt_opening_dip" name="txt_opening_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_meter">Closing meter</label> -->
              <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_dip">Closing dip</label> -->
              <input type="text" class="form-control" id="txt_closing_dip" name="txt_closing_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_km">K.M.</label> -->
              <input type="text" class="form-control" id="txt_km" name="txt_km" >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_desel">Desel</label> -->
              <input type="text" class="form-control" id="txt_desel" name="txt_desel">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_average">Average</label> -->
              <input type="text" class="form-control" id="txt_average" name="txt_average">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_remark">Remark</label> -->
              <textarea class="form-control" id="txt_remark" name="txt_remark"></textarea>
            </div></td>
                </tr> <tr>
                   <td> <div class="form-group">
              <!-- <label for="txt_select_vehicle">Select vehicle</label> -->
              <select class="form-control" name="txt_select_vehicle" id="txt_select_vehicle">
                <option value="1">JCB</option>
                <option value="2">Truck</option>
                <option value="3">Tractor</option>
                <option value="4">Dumpher</option>
              </select>
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_no_of_trips">No. of trips</label> -->
              <input type="text" class="form-control" id="txt_no_of_trips" name="txt_no_of_trips"
                >
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_work_description">Work description</label> -->
              <textarea class="form-control" id="txt_work_description" name="txt_work_description"
                ></textarea>
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_meter">Opening meter</label> -->
              <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_dip">Opening dip</label> -->
              <input type="text" class="form-control" id="txt_opening_dip" name="txt_opening_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_meter">Closing meter</label> -->
              <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_dip">Closing dip</label> -->
              <input type="text" class="form-control" id="txt_closing_dip" name="txt_closing_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_km">K.M.</label> -->
              <input type="text" class="form-control" id="txt_km" name="txt_km" >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_desel">Desel</label> -->
              <input type="text" class="form-control" id="txt_desel" name="txt_desel">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_average">Average</label> -->
              <input type="text" class="form-control" id="txt_average" name="txt_average">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_remark">Remark</label> -->
              <textarea class="form-control" id="txt_remark" name="txt_remark"></textarea>
            </div></td>
                </tr> <tr>
                   <td> <div class="form-group">
              <!-- <label for="txt_select_vehicle">Select vehicle</label> -->
              <select class="form-control" name="txt_select_vehicle" id="txt_select_vehicle">
                <option value="1">JCB</option>
                <option value="2">Truck</option>
                <option value="3">Tractor</option>
                <option value="4">Dumpher</option>
              </select>
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_no_of_trips">No. of trips</label> -->
              <input type="text" class="form-control" id="txt_no_of_trips" name="txt_no_of_trips"
                >
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_work_description">Work description</label> -->
              <textarea class="form-control" id="txt_work_description" name="txt_work_description"
                ></textarea>
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_meter">Opening meter</label> -->
              <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_dip">Opening dip</label> -->
              <input type="text" class="form-control" id="txt_opening_dip" name="txt_opening_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_meter">Closing meter</label> -->
              <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_dip">Closing dip</label> -->
              <input type="text" class="form-control" id="txt_closing_dip" name="txt_closing_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_km">K.M.</label> -->
              <input type="text" class="form-control" id="txt_km" name="txt_km" >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_desel">Desel</label> -->
              <input type="text" class="form-control" id="txt_desel" name="txt_desel">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_average">Average</label> -->
              <input type="text" class="form-control" id="txt_average" name="txt_average">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_remark">Remark</label> -->
              <textarea class="form-control" id="txt_remark" name="txt_remark"></textarea>
            </div></td>
                </tr> <tr>
                   <td> <div class="form-group">
              <!-- <label for="txt_select_vehicle">Select vehicle</label> -->
              <select class="form-control" name="txt_select_vehicle" id="txt_select_vehicle">
                <option value="1">JCB</option>
                <option value="2">Truck</option>
                <option value="3">Tractor</option>
                <option value="4">Dumpher</option>
              </select>
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_no_of_trips">No. of trips</label> -->
              <input type="text" class="form-control" id="txt_no_of_trips" name="txt_no_of_trips"
                >
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_work_description">Work description</label> -->
              <textarea class="form-control" id="txt_work_description" name="txt_work_description"
                ></textarea>
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_meter">Opening meter</label> -->
              <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_dip">Opening dip</label> -->
              <input type="text" class="form-control" id="txt_opening_dip" name="txt_opening_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_meter">Closing meter</label> -->
              <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_dip">Closing dip</label> -->
              <input type="text" class="form-control" id="txt_closing_dip" name="txt_closing_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_km">K.M.</label> -->
              <input type="text" class="form-control" id="txt_km" name="txt_km" >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_desel">Desel</label> -->
              <input type="text" class="form-control" id="txt_desel" name="txt_desel">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_average">Average</label> -->
              <input type="text" class="form-control" id="txt_average" name="txt_average">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_remark">Remark</label> -->
              <textarea class="form-control" id="txt_remark" name="txt_remark"></textarea>
            </div></td>
                </tr> <tr>
                   <td> <div class="form-group">
              <!-- <label for="txt_select_vehicle">Select vehicle</label> -->
              <select class="form-control" name="txt_select_vehicle" id="txt_select_vehicle">
                <option value="1">JCB</option>
                <option value="2">Truck</option>
                <option value="3">Tractor</option>
                <option value="4">Dumpher</option>
              </select>
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_no_of_trips">No. of trips</label> -->
              <input type="text" class="form-control" id="txt_no_of_trips" name="txt_no_of_trips"
                >
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_work_description">Work description</label> -->
              <textarea class="form-control" id="txt_work_description" name="txt_work_description"
                ></textarea>
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_meter">Opening meter</label> -->
              <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_dip">Opening dip</label> -->
              <input type="text" class="form-control" id="txt_opening_dip" name="txt_opening_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_meter">Closing meter</label> -->
              <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_dip">Closing dip</label> -->
              <input type="text" class="form-control" id="txt_closing_dip" name="txt_closing_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_km">K.M.</label> -->
              <input type="text" class="form-control" id="txt_km" name="txt_km" >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_desel">Desel</label> -->
              <input type="text" class="form-control" id="txt_desel" name="txt_desel">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_average">Average</label> -->
              <input type="text" class="form-control" id="txt_average" name="txt_average">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_remark">Remark</label> -->
              <textarea class="form-control" id="txt_remark" name="txt_remark"></textarea>
            </div></td>
                </tr> <tr>
                   <td> <div class="form-group">
              <!-- <label for="txt_select_vehicle">Select vehicle</label> -->
              <select class="form-control" name="txt_select_vehicle" id="txt_select_vehicle">
                <option value="1">JCB</option>
                <option value="2">Truck</option>
                <option value="3">Tractor</option>
                <option value="4">Dumpher</option>
              </select>
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_no_of_trips">No. of trips</label> -->
              <input type="text" class="form-control" id="txt_no_of_trips" name="txt_no_of_trips"
                >
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_work_description">Work description</label> -->
              <textarea class="form-control" id="txt_work_description" name="txt_work_description"
                ></textarea>
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_meter">Opening meter</label> -->
              <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_dip">Opening dip</label> -->
              <input type="text" class="form-control" id="txt_opening_dip" name="txt_opening_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_meter">Closing meter</label> -->
              <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_dip">Closing dip</label> -->
              <input type="text" class="form-control" id="txt_closing_dip" name="txt_closing_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_km">K.M.</label> -->
              <input type="text" class="form-control" id="txt_km" name="txt_km" >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_desel">Desel</label> -->
              <input type="text" class="form-control" id="txt_desel" name="txt_desel">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_average">Average</label> -->
              <input type="text" class="form-control" id="txt_average" name="txt_average">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_remark">Remark</label> -->
              <textarea class="form-control" id="txt_remark" name="txt_remark"></textarea>
            </div></td>
                </tr> <tr>
                   <td> <div class="form-group">
              <!-- <label for="txt_select_vehicle">Select vehicle</label> -->
              <select class="form-control" name="txt_select_vehicle" id="txt_select_vehicle">
                <option value="1">JCB</option>
                <option value="2">Truck</option>
                <option value="3">Tractor</option>
                <option value="4">Dumpher</option>
              </select>
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_no_of_trips">No. of trips</label> -->
              <input type="text" class="form-control" id="txt_no_of_trips" name="txt_no_of_trips"
                >
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_work_description">Work description</label> -->
              <textarea class="form-control" id="txt_work_description" name="txt_work_description"
                ></textarea>
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_meter">Opening meter</label> -->
              <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_dip">Opening dip</label> -->
              <input type="text" class="form-control" id="txt_opening_dip" name="txt_opening_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_meter">Closing meter</label> -->
              <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_dip">Closing dip</label> -->
              <input type="text" class="form-control" id="txt_closing_dip" name="txt_closing_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_km">K.M.</label> -->
              <input type="text" class="form-control" id="txt_km" name="txt_km" >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_desel">Desel</label> -->
              <input type="text" class="form-control" id="txt_desel" name="txt_desel">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_average">Average</label> -->
              <input type="text" class="form-control" id="txt_average" name="txt_average">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_remark">Remark</label> -->
              <textarea class="form-control" id="txt_remark" name="txt_remark"></textarea>
            </div></td>
                </tr> <tr>
                   <td> <div class="form-group">
              <!-- <label for="txt_select_vehicle">Select vehicle</label> -->
              <select class="form-control" name="txt_select_vehicle" id="txt_select_vehicle">
                <option value="1">JCB</option>
                <option value="2">Truck</option>
                <option value="3">Tractor</option>
                <option value="4">Dumpher</option>
              </select>
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_no_of_trips">No. of trips</label> -->
              <input type="text" class="form-control" id="txt_no_of_trips" name="txt_no_of_trips"
                >
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_work_description">Work description</label> -->
              <textarea class="form-control" id="txt_work_description" name="txt_work_description"
                ></textarea>
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_meter">Opening meter</label> -->
              <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_dip">Opening dip</label> -->
              <input type="text" class="form-control" id="txt_opening_dip" name="txt_opening_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_meter">Closing meter</label> -->
              <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_dip">Closing dip</label> -->
              <input type="text" class="form-control" id="txt_closing_dip" name="txt_closing_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_km">K.M.</label> -->
              <input type="text" class="form-control" id="txt_km" name="txt_km" >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_desel">Desel</label> -->
              <input type="text" class="form-control" id="txt_desel" name="txt_desel">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_average">Average</label> -->
              <input type="text" class="form-control" id="txt_average" name="txt_average">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_remark">Remark</label> -->
              <textarea class="form-control" id="txt_remark" name="txt_remark"></textarea>
            </div></td>
                </tr> <tr>
                   <td> <div class="form-group">
              <!-- <label for="txt_select_vehicle">Select vehicle</label> -->
              <select class="form-control" name="txt_select_vehicle" id="txt_select_vehicle">
                <option value="1">JCB</option>
                <option value="2">Truck</option>
                <option value="3">Tractor</option>
                <option value="4">Dumpher</option>
              </select>
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_no_of_trips">No. of trips</label> -->
              <input type="text" class="form-control" id="txt_no_of_trips" name="txt_no_of_trips"
                >
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_work_description">Work description</label> -->
              <textarea class="form-control" id="txt_work_description" name="txt_work_description"
                ></textarea>
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_meter">Opening meter</label> -->
              <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_dip">Opening dip</label> -->
              <input type="text" class="form-control" id="txt_opening_dip" name="txt_opening_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_meter">Closing meter</label> -->
              <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_dip">Closing dip</label> -->
              <input type="text" class="form-control" id="txt_closing_dip" name="txt_closing_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_km">K.M.</label> -->
              <input type="text" class="form-control" id="txt_km" name="txt_km" >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_desel">Desel</label> -->
              <input type="text" class="form-control" id="txt_desel" name="txt_desel">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_average">Average</label> -->
              <input type="text" class="form-control" id="txt_average" name="txt_average">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_remark">Remark</label> -->
              <textarea class="form-control" id="txt_remark" name="txt_remark"></textarea>
            </div></td>
                </tr> <tr>
                   <td> <div class="form-group">
              <!-- <label for="txt_select_vehicle">Select vehicle</label> -->
              <select class="form-control" name="txt_select_vehicle" id="txt_select_vehicle">
                <option value="1">JCB</option>
                <option value="2">Truck</option>
                <option value="3">Tractor</option>
                <option value="4">Dumpher</option>
              </select>
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_no_of_trips">No. of trips</label> -->
              <input type="text" class="form-control" id="txt_no_of_trips" name="txt_no_of_trips"
                >
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_work_description">Work description</label> -->
              <textarea class="form-control" id="txt_work_description" name="txt_work_description"
                ></textarea>
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_meter">Opening meter</label> -->
              <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_dip">Opening dip</label> -->
              <input type="text" class="form-control" id="txt_opening_dip" name="txt_opening_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_meter">Closing meter</label> -->
              <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_dip">Closing dip</label> -->
              <input type="text" class="form-control" id="txt_closing_dip" name="txt_closing_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_km">K.M.</label> -->
              <input type="text" class="form-control" id="txt_km" name="txt_km" >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_desel">Desel</label> -->
              <input type="text" class="form-control" id="txt_desel" name="txt_desel">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_average">Average</label> -->
              <input type="text" class="form-control" id="txt_average" name="txt_average">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_remark">Remark</label> -->
              <textarea class="form-control" id="txt_remark" name="txt_remark"></textarea>
            </div></td>
                </tr> <tr>
                   <td> <div class="form-group">
              <!-- <label for="txt_select_vehicle">Select vehicle</label> -->
              <select class="form-control" name="txt_select_vehicle" id="txt_select_vehicle">
                <option value="1">JCB</option>
                <option value="2">Truck</option>
                <option value="3">Tractor</option>
                <option value="4">Dumpher</option>
              </select>
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_no_of_trips">No. of trips</label> -->
              <input type="text" class="form-control" id="txt_no_of_trips" name="txt_no_of_trips"
                >
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_work_description">Work description</label> -->
              <textarea class="form-control" id="txt_work_description" name="txt_work_description"
                ></textarea>
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_meter">Opening meter</label> -->
              <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_dip">Opening dip</label> -->
              <input type="text" class="form-control" id="txt_opening_dip" name="txt_opening_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_meter">Closing meter</label> -->
              <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_dip">Closing dip</label> -->
              <input type="text" class="form-control" id="txt_closing_dip" name="txt_closing_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_km">K.M.</label> -->
              <input type="text" class="form-control" id="txt_km" name="txt_km" >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_desel">Desel</label> -->
              <input type="text" class="form-control" id="txt_desel" name="txt_desel">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_average">Average</label> -->
              <input type="text" class="form-control" id="txt_average" name="txt_average">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_remark">Remark</label> -->
              <textarea class="form-control" id="txt_remark" name="txt_remark"></textarea>
            </div></td>
                </tr> <tr>
                   <td> <div class="form-group">
              <!-- <label for="txt_select_vehicle">Select vehicle</label> -->
              <select class="form-control" name="txt_select_vehicle" id="txt_select_vehicle">
                <option value="1">JCB</option>
                <option value="2">Truck</option>
                <option value="3">Tractor</option>
                <option value="4">Dumpher</option>
              </select>
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_no_of_trips">No. of trips</label> -->
              <input type="text" class="form-control" id="txt_no_of_trips" name="txt_no_of_trips"
                >
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_work_description">Work description</label> -->
              <textarea class="form-control" id="txt_work_description" name="txt_work_description"
                ></textarea>
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_meter">Opening meter</label> -->
              <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_dip">Opening dip</label> -->
              <input type="text" class="form-control" id="txt_opening_dip" name="txt_opening_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_meter">Closing meter</label> -->
              <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_dip">Closing dip</label> -->
              <input type="text" class="form-control" id="txt_closing_dip" name="txt_closing_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_km">K.M.</label> -->
              <input type="text" class="form-control" id="txt_km" name="txt_km" >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_desel">Desel</label> -->
              <input type="text" class="form-control" id="txt_desel" name="txt_desel">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_average">Average</label> -->
              <input type="text" class="form-control" id="txt_average" name="txt_average">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_remark">Remark</label> -->
              <textarea class="form-control" id="txt_remark" name="txt_remark"></textarea>
            </div></td>
                </tr> <tr>
                   <td> <div class="form-group">
              <!-- <label for="txt_select_vehicle">Select vehicle</label> -->
              <select class="form-control" name="txt_select_vehicle" id="txt_select_vehicle">
                <option value="1">JCB</option>
                <option value="2">Truck</option>
                <option value="3">Tractor</option>
                <option value="4">Dumpher</option>
              </select>
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_no_of_trips">No. of trips</label> -->
              <input type="text" class="form-control" id="txt_no_of_trips" name="txt_no_of_trips"
                >
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_work_description">Work description</label> -->
              <textarea class="form-control" id="txt_work_description" name="txt_work_description"
                ></textarea>
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_meter">Opening meter</label> -->
              <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_dip">Opening dip</label> -->
              <input type="text" class="form-control" id="txt_opening_dip" name="txt_opening_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_meter">Closing meter</label> -->
              <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_dip">Closing dip</label> -->
              <input type="text" class="form-control" id="txt_closing_dip" name="txt_closing_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_km">K.M.</label> -->
              <input type="text" class="form-control" id="txt_km" name="txt_km" >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_desel">Desel</label> -->
              <input type="text" class="form-control" id="txt_desel" name="txt_desel">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_average">Average</label> -->
              <input type="text" class="form-control" id="txt_average" name="txt_average">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_remark">Remark</label> -->
              <textarea class="form-control" id="txt_remark" name="txt_remark"></textarea>
            </div></td>
                </tr> <tr>
                   <td> <div class="form-group">
              <!-- <label for="txt_select_vehicle">Select vehicle</label> -->
              <select class="form-control" name="txt_select_vehicle" id="txt_select_vehicle">
                <option value="1">JCB</option>
                <option value="2">Truck</option>
                <option value="3">Tractor</option>
                <option value="4">Dumpher</option>
              </select>
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_no_of_trips">No. of trips</label> -->
              <input type="text" class="form-control" id="txt_no_of_trips" name="txt_no_of_trips"
                >
            </div></td>
                   <td> <div class="form-group">
              <!-- <label for="txt_work_description">Work description</label> -->
              <textarea class="form-control" id="txt_work_description" name="txt_work_description"
                ></textarea>
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_meter">Opening meter</label> -->
              <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_opening_dip">Opening dip</label> -->
              <input type="text" class="form-control" id="txt_opening_dip" name="txt_opening_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_meter">Closing meter</label> -->
              <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter"
                >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_closing_dip">Closing dip</label> -->
              <input type="text" class="form-control" id="txt_closing_dip" name="txt_closing_dip"
               >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_km">K.M.</label> -->
              <input type="text" class="form-control" id="txt_km" name="txt_km" >
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_desel">Desel</label> -->
              <input type="text" class="form-control" id="txt_desel" name="txt_desel">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_average">Average</label> -->
              <input type="text" class="form-control" id="txt_average" name="txt_average">
            </div></td>
                   <td><div class="form-group">
              <!-- <label for="txt_remark">Remark</label> -->
              <textarea class="form-control" id="txt_remark" name="txt_remark"></textarea>
            </div></td>
                </tr>

              </tbody>
              </table>
              </div> 
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
          </form>
        </div>
      </div>
    </div>

    <?php
    include("./footer.php");
    ?>
    <script>


      $("#add").on("click", function (e) {
        window.location.replace("./general_data_entry_master.php");
      })
      $("#manage").on("click", function (e) {
        window.location.replace("./general_data_entry_master_table.php");
      })
      $("#filter_icon").on("click", function (e) {

$(".filter_section").slideToggle();

});
    </script>