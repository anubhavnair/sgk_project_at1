<?php
include("./header.php");
require_once("./root/dbconnection.php");
?>
<div class="content_wrapper bg_homebefore inner-wrapper forms-sec">
  <div class="container-fluid">

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
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <form class="forms-sample">
            <?php
            if (isset($_REQUEST['edit_id'])) {
              $edit_id = $_REQUEST["edit_id"];
              $qry = $db->query("SELECT * FROM `general_data_entry_master` where id = '$edit_id'") or die("");
              $row = $qry->fetch(PDO::FETCH_ASSOC);
              $dateString = $row['general_date'];
              $date = new DateTime($dateString);
              ?>
              <input type="hidden" name="edit_id" id="edit_id" value="<?= $edit_id ?>">

              <div class="d-flex align-items-end col-12">
                <div class="form-group p-0 col-4 h-100 d-flex flex-column justify-content-end">
                  <label for="date_enter_date">Enter Date</label>
                  <input type="date" class="form-control " name="date_enter_date" id="date_enter_date"
                    placeholder="Enter Date" value="<?= $date->format("Y-m-d"); ?>">
                </div>
                <div class="form-group col-4 h-100 d-flex flex-column justify-content-end">
                  <label for="txt_select_vehicle">Select vehicle</label>
                  <select class="form-control " name="txt_select_vehicle" id="txt_select_vehicle">
                    <?php
                    $qry2 = $db->query("SELECT * FROM `vehicle_master`") or die("");
                    while ($rowVehicle = $qry2->fetch(PDO::FETCH_ASSOC)) {
                      $selected = ($rowVehicle['id'] == $row['vehicle_id']) ? 'selected' : '';
                      ?>
                      <option value="<?= $rowVehicle['id'] ?>" <?= $selected ?>>
                        <?= $rowVehicle['vehical_name'] ?>
                      </option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group p-0 col-4 h-100 d-flex flex-column justify-content-end">
                  <label for="txt_trips">Trips</label>
                  <input type="text" class="form-control " id="txt_trips" name="txt_trips"
                    placeholder="Enter No. of Trips" value="<?= $row['noof_trips'] ?>">
                </div>
              </div>
              <div class="form-group  col-12">
                <label for="txt_work_description">Work description</label>
                <textarea class="form-control" id="txt_work_description" name="txt_work_description"
                  placeholder="Enter Work Description" rows="3"><?= $row['work_descp'] ?></textarea>

              </div>
              <div class="d-flex">
                <div class="form-group col-6">
                  <label for="txt_opening_meter">Opening meter</label>
                  <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter"
                    placeholder="Enter Opening Meter" value="<?= $row['opening_meter'] ?>">
                </div>
                <div class="form-group col-6">
                  <label for="txt_opening_dip">Opening dip</label>
                  <input type="text" class="form-control" id="txt_opening_dip" name="txt_opening_dip"
                    placeholder="Enter Opening Dip" value="<?= $row['opening_dip'] ?>">
                </div>
              </div>
              <div class="d-flex">
                <div class="form-group col-6">
                  <label for="txt_closing_meter">Closing meter</label>
                  <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter"
                    placeholder="Enter Closing Meter" value="<?= $row['closing_meter'] ?>">
                </div>
                <div class="form-group col-6">
                  <label for="txt_closing_dip">Closing dip</label>
                  <input type="text" class="form-control" id="txt_closing_dip" name="txt_closing_dip"
                    placeholder="Enter Closing Dip" value="<?= $row['closing_dip'] ?>">
                </div>
              </div>
              <div class="d-flex">
                <div class="form-group col-4">
                  <label for="txt_km">K.M.</label>
                  <input type="text" class="form-control" id="txt_km" name="txt_km" placeholder="Enter Kilo Meters"
                    value="<?= $row['total_km'] ?>">
                </div>
                <div class="form-group col-4">
                  <label for="txt_desel">Desel</label>
                  <input type="text" class="form-control" id="txt_desel" name="txt_desel" placeholder="Enter Desel"
                    value="<?= $row['general_desel'] ?>">
                </div>
                <div class="form-group col-4">
                  <label for="txt_average">Average</label>
                  <input type="text" class="form-control" id="txt_average" name="txt_average" placeholder="Enter Average"
                    value="<?= $row['general_average'] ?>">
                </div>
              </div>
              <div class="form-group col-12">
                <label for="txt_remark">Remark</label>
                <textarea class="form-control" id="txt_remark" name="txt_remark"
                  placeholder="Enter Remark"><?= $row['genral_remark'] ?></textarea>
              </div>
              <div class="d-flex col-8">
                <button type="submit" id="update" class="btn btn-primary mr-2 ">Update</button>
              </div>
              <?php
            } else {
              ?>
              <div class="d-flex align-items-end col-12">
                <div class="form-group p-0 col-4 h-100 d-flex flex-column justify-content-end">
                  <label for="txt_enter_date">Enter Date</label>
                  <input type="text" class="form-control " name="txt_enter_date" id="txt_enter_date" readonly>
                </div>
                <div class="form-group col-4 h-100 d-flex flex-column justify-content-end">
                  <label for="txt_select_vehicle">Select vehicle</label>
                  <select class="form-control " name="txt_select_vehicle" id="txt_select_vehicle">
                  <?php
                    $qry2 = $db->query("SELECT * FROM `vehicle_master`") or die("");
                    while ($rowVehicle = $qry2->fetch(PDO::FETCH_ASSOC)) {
                      ?>
                      <option value="<?= $rowVehicle['id'] ?>" >
                        <?= $rowVehicle['vehical_name'] ?>
                      </option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group p-0 col-4 h-100 d-flex flex-column justify-content-end">
                  <label for="txt_trips">Trips</label>
                  <input type="text" class="form-control " id="txt_trips" name="txt_trips"
                    placeholder="Enter No. of Trips">
                </div>
              </div>
              <div class="form-group  col-12">
                <label for="txt_work_description">Work description</label>
                <textarea class="form-control" id="txt_work_description" name="txt_work_description"
                  placeholder="Enter Work Description" rows="3"></textarea>

              </div>
              <div class="d-flex">
                <div class="form-group col-6">
                  <label for="txt_opening_meter">Opening meter</label>
                  <input type="text" class="form-control" id="txt_opening_meter" name="txt_opening_meter"
                    placeholder="Enter Opening Meter">
                </div>
                <div class="form-group col-6">
                  <label for="txt_opening_dip">Opening dip</label>
                  <input type="text" class="form-control" id="txt_opening_dip" name="txt_opening_dip"
                    placeholder="Enter Opening Dip">
                </div>
              </div>
              <div class="d-flex">
                <div class="form-group col-6">
                  <label for="txt_closing_meter">Closing meter</label>
                  <input type="text" class="form-control" id="txt_closing_meter" name="txt_closing_meter"
                    placeholder="Enter Closing Meter">
                </div>
                <div class="form-group col-6">
                  <label for="txt_closing_dip">Closing dip</label>
                  <input type="text" class="form-control" id="txt_closing_dip" name="txt_closing_dip"
                    placeholder="Enter Closing Dip">
                </div>
              </div>
              <div class="d-flex">
                <div class="form-group col-4">
                  <label for="txt_km">K.M.</label>
                  <input type="text" class="form-control" id="txt_km" name="txt_km" placeholder="Enter Kilo Meters">
                </div>
                <div class="form-group col-4">
                  <label for="txt_desel">Desel</label>
                  <input type="text" class="form-control" id="txt_desel" name="txt_desel" placeholder="Enter Desel">
                </div>
                <div class="form-group col-4">
                  <label for="txt_average">Average</label>
                  <input type="text" class="form-control" id="txt_average" name="txt_average" placeholder="Enter Average">
                </div>
              </div>
              <div class="form-group col-12">
                <label for="txt_remark">Remark</label>
                <textarea class="form-control" id="txt_remark" name="txt_remark" placeholder="Enter Remark"></textarea>
              </div>
              <div class="d-flex col-8">
                <button type="submit" id="submit" class="btn btn-primary mr-2 ">Submit</button>
              </div>
              <?php
            }
            ?>
          </form>
        </div>
      </div>
    </div>

    <?php
    include("./footer.php");
    ?>
    <script>
      $(document).ready(function () {

        $("#add").on("click", function (e) {
          window.location.replace("./general_data_entry_master.php");
        })
        $("#manage").on("click", function (e) {
          window.location.replace("./general_data_entry_master_manage.php");
        })
        $("#filter_icon").on("click", function (e) {

          $(".filter_section").slideToggle();

        });

        // Get the current date
        var currentDate = new Date();

        // Format the date as "YYYY-MM-DD" (required format for input type="date)
        var year = currentDate.getFullYear();
        var month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed
        var day = String(currentDate.getDate()).padStart(2, '0');
        var formattedDate = day + '-' + month + '-' + year;

        // Set the value of the input to the current date
        $('#txt_enter_date').val(formattedDate);


        // FORM VALIDATION SECTION 
        $("#submit").on("click", function (e) {
          e.preventDefault();
          const date = $("#txt_enter_date").val();

          const select_vehicle = $("#txt_select_vehicle").val();

          const trips = $("#txt_trips").val();

          const work_description = $("#txt_work_description").val();

          const opening_meter = $("#txt_opening_meter").val();

          const opening_dip = $("#txt_opening_dip").val();

          const closing_meter = $("#txt_closing_meter").val();

          const closing_dip = $("#txt_closing_dip").val();

          const km = $("#txt_km").val();

          const desel = $("#txt_desel").val();

          const average = $("#txt_average").val();

          const remark = $("#txt_remark").val();



          if (select_vehicle == "" || select_vehicle == null) {

            $("#txt_select_vehicle").focus();
          }
          else if (trips == "" || trips == null) {

            $("#txt_trips").focus();

          }
          else if (work_description == "" || work_description == null) {


            $("#txt_work_description").focus();
          }

          else if (opening_meter == "" || opening_meter == null) {


            $("#txt_opening_meter").focus();
          }
          else if (opening_dip == "" || opening_dip == null) {


            $("#txt_opening_dip").focus();
          }

          else if (closing_meter == "" || closing_meter == null) {


            $("#txt_closing_meter").focus();
          }
          else if (closing_dip == "" || closing_dip == null) {


            $("#txt_closing_dip").focus();
          }
          else if (km == "" || km == null) {


            $("#txt_km").focus();
          }
          else if (desel == "" || desel == null) {


            $("#txt_desel").focus();
          }
          else if (average == "" || average == null) {


            $("#txt_average").focus();
          }
          else if (remark == "" || remark == null) {


            $("#txt_remark").focus();
          }


          else {
            $.post("general_data_entry_master_do.php",
              {
                txt_enter_date: date,
                txt_select_vehicle: select_vehicle,
                txt_trips: trips,
                txt_work_description: work_description,
                txt_opening_meter: opening_meter,
                txt_opening_dip: opening_dip,
                txt_closing_meter: closing_meter,
                txt_closing_dip: closing_dip,
                txt_km: km,
                txt_desel: desel,
                txt_average: average,
                txt_remark: remark
              }, function (data, status) {
                if (status == "success") {
                  alert("New Record Added Successfully !....");
                  window.location.replace("./general_data_entry_master.php")
                }

              }
            );
          }

        })

        $("#update").on("click", function (e) {
          e.preventDefault();

          const edit_id = $("#edit_id").val();
          const date = $("#date_enter_date").val();
          const select_vehicle = $("#txt_select_vehicle").val();
          const trips = $("#txt_trips").val();
          const work_description = $("#txt_work_description").val();
          const opening_meter = $("#txt_opening_meter").val();
          const opening_dip = $("#txt_opening_dip").val();
          const closing_meter = $("#txt_closing_meter").val();
          const closing_dip = $("#txt_closing_dip").val();
          const km = $("#txt_km").val();
          const desel = $("#txt_desel").val();
          const average = $("#txt_average").val();
          const remark = $("#txt_remark").val();
          if (select_vehicle === "" || select_vehicle === null) {
            $("#txt_select_vehicle").focus();
          } else if (trips === "" || trips === null) {
            $("#txt_trips").focus();
          } else if (work_description === "" || work_description === null) {
            $("#txt_work_description").focus();
          } else if (opening_meter === "" || opening_meter === null) {
            $("#txt_opening_meter").focus();
          } else if (opening_dip === "" || opening_dip === null) {
            $("#txt_opening_dip").focus();
          } else if (closing_meter === "" || closing_meter === null) {
            $("#txt_closing_meter").focus();
          } else if (closing_dip === "" || closing_dip === null) {
            $("#txt_closing_dip").focus();
          } else if (km === "" || km === null) {
            $("#txt_km").focus();
          } else if (desel === "" || desel === null) {
            $("#txt_desel").focus();
          } else if (average === "" || average === null) {
            $("#txt_average").focus();
          } else if (remark === "" || remark === null) {
            $("#txt_remark").focus();
          } else {
            $.post("general_data_entry_master_do.php", {
              edit_id: edit_id,
              txt_enter_date: date,
              txt_select_vehicle: select_vehicle,
              txt_trips: trips,
              txt_work_description: work_description,
              txt_opening_meter: opening_meter,
              txt_opening_dip: opening_dip,
              txt_closing_meter: closing_meter,
              txt_closing_dip: closing_dip,
              txt_km: km,
              txt_desel: desel,
              txt_average: average,
              txt_remark: remark
            }, function (data, status) {
              if (status === "success") {
                alert("Record Updated Successfully!");
                window.location.replace("./general_data_entry_master_manage.php");
              }
            }
            );
          }

        })

      })


    </script>