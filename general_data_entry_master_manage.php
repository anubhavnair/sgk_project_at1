<?php
include("./header.php");
require_once('./root/dbconnection.php');
$i = 1;
?>

<style>

</style>

<div class="content_wrapper bg_homebefore inner-wrapper forms-sec">
  <div class="container-fluid">
    <!-- filter section start  -->

    <span id="filter_icon"><svg width="30" height="30" fill="none" stroke="#0d02b1" stroke-linecap="round"
        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M22 3H2l8 9.46V19l4 2v-8.54L22 3z"></path>
      </svg>Click to Filter</span>
    <div class="row filter_section m-0 p-0 w-100" style="display: none;">

      <section class="col-12 d-flex align-items-end p-0">
        <div class="col-4 ">
          <label for="date_start_date">Start Date</label>
          <input type="date" name="date_start_date" id="date_start_date" class="form-control p-0">
        </div>
        <div class="col-4">
          <label for="date_end_date">End Date</label>
          <input type="date" name="date_end_date" id="date_end_date" class="form-control p-0">
        </div>
        <div class="col-4 ">
          <label for="txt_vehical_number">Select vehicle</label>
          <select class="form-control p-1" name="txt_vehicle_number" id="txt_vehicle_number">
            <option value="">Select a vehicle</option>
            <?php
            $qry2 = $db->query("SELECT * FROM `vehicle_master`") or die("");

            while ($rowVehicle = $qry2->fetch(PDO::FETCH_ASSOC)) {
              ?>
              <option value="<?= $rowVehicle['id'] ?>">
                <?= $rowVehicle['vehical_name'] ?> &nbsp;&nbsp;&nbsp;
                <?= $rowVehicle['vehicle_number'] ?>
              </option>
              <?php
            }
            ?>
          </select>

        </div>
      </section>
      <div class="col-12 p-0">
        <form class="form-inline my-2 my-lg-0 col-12">
          <button id="search" class="btn btn-primary ml-auto mr-auto mt-1">Search</button>
        </form>
      </div>

    </div>




    <!-- filter section end  -->
    <div class="notification" id="myNotification">

</div>

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
        <div class="card rotateclass">
          <!-- <h4 class="header-title ml-2">General Data</h4> -->
          <div class="table-responsive-xl">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">S.no</th>
                  <th scope="col">Date</th>
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
                  <th>Operations</th>
                </tr>
              </thead>
              <tbody id="details_table_body">
                <?php

                $qry = $db->query("select * from `general_data_entry_master`") or die("");

                while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {
                  $id = $row['id'];
                  $vehicle_id = $row['vehical_id'];
                  $query = $db->query("SELECT * FROM `vehicle_master` WHERE id='$vehicle_id'");
                  $rowVehicle = $query->fetch(PDO::FETCH_ASSOC);
                  $vehicle_name = $rowVehicle['vehical_name'];

                  ?>

                  <tr>
                    <th scope="row">
                      <?php echo $i; ?>
                    </th>
                    <td>
                      <?= $row['general_date'] ?>
                    </td>
                    <td>
                      <?= $vehicle_name ?>
                    </td>
                    <td>
                      <?= $row['noof_trips'] ?>
                    </td>
                    <td>
                      <?= $row['work_descp'] ?>
                    </td>
                    <td>
                      <?= $row['opening_meter'] ?>
                    </td>
                    <td>
                      <?= $row['opening_dip'] ?>
                    </td>
                    <td>
                      <?= $row['closing_meter'] ?>
                    </td>
                    <td>
                      <?= $row['closing_dip'] ?>
                    </td>
                    <td>
                      <?= $row['total_km'] ?>
                    </td>
                    <td>
                      <?= $row['general_desel'] ?>
                    </td>
                    <td>
                      <?= $row['general_average'] ?>
                    </td>
                    <td>
                      <?= $row['genral_remark'] ?>
                    </td>

                    <td>
                      <div class="d-flex justify-content-center align-items-center"><a
                          href="general_data_entry_master_do.php?del_id=<?= $id ?>"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash3-fill"
                            viewBox="0 0 16 16">
                            <path
                              d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                          </svg></a> &nbsp;&nbsp;<a href="general_data_entry_master.php?edit_id=<?= $id ?>"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-pen-fill"
                            viewBox="0 0 16 16">
                            <path
                              d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                          </svg></a>
                      </div>
                    </td>

                  </tr>
                  <?php
                  $i++;
                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
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

      // search logic 
      $('#search').on("click", function (e) {
        e.preventDefault();
        const start_date = $("#date_start_date").val();
        const end_date = $("#date_end_date").val();
        const vehicle_number = $("#txt_vehicle_number").val();

        if ((start_date != "") || (end_date != "") || (vehicle_number != "")) {
          $.post("general_data_entry_master_do.php", {
            start_date: start_date,
            end_date: end_date,
            vehicle_number: vehicle_number
          }, function (data, status) {
            if (status === "success") {

              $("#details_table_body").html(data);

            }
          }).fail(function (xhr, status, error) {

          });
        }
      });

      // notification section

      function showNotification(message) {
        var notification = $("#myNotification");
        notification.css("opacity", "1");
        notification.css("pointer-events", "auto");
        notification.html(message);
        setTimeout(function () {
          hideNotification();
        }, 2000); // Auto-close after 2 seconds
      }

      function hideNotification() {
        var notification = $("#myNotification");
        notification.css("opacity", "0");
        notification.css("pointer-events", "none");
      }
      const urlParams = new URLSearchParams(window.location.search);
      let message = urlParams.get("message");
      if (message) {
        showNotification(message);
      }

    })
  </script>