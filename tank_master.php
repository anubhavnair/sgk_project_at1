<?php
include("./header.php");
require_once("./root/dbconnection.php");
function emp_area($emp_login_type, $area_id)
{
  if ($emp_login_type == 0) {
    return " AND `id` IN ('$area_id')";
  } else {
    return ""; // Return an empty string if $emp_login_type is not 0
  }
}
$emp_id = $_COOKIE["emp_id"];
$get_emp_area = $db->query("SELECT emp_area_id, emp_login_type FROM `employee_master` WHERE `id` = $emp_id") or die("");
while ($row_emp = $get_emp_area->fetch(PDO::FETCH_ASSOC)) {
  $emp_login_type = $row_emp['emp_login_type'];
  $area_id = $row_emp["emp_area_id"];
  // $area_id_arr = explode(",", $area_id);
}
?>
<div class="content_wrapper bg_homebefore inner-wrapper forms-sec">
  <div class="container-fluid">




    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
      <!-- Start row -->
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <h4 class="page-title">Tank Entry Master</h4>

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
    <div class="notification" id="myNotification"></div>
    <!-- state start-->
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <h6 class="header-title ml-2" id="tank_balance_heading"></h6>
          <form class="forms-sample">
            <?php
            if (isset($_REQUEST['edit_id'])) {
              $edit_id = $_REQUEST["edit_id"];
              $qry = $db->query("SELECT * FROM `tank_entry_master` where id = '$edit_id'") or die("");
              $row = $qry->fetch(PDO::FETCH_ASSOC);

              $dateString = $row['tank_entry_date']; // Replace with your date string
              $date = new DateTime($dateString);
              ?>
              <input type="hidden" name="edit_id" id="edit_id" value="<?= $edit_id ?>">
              <section class=" d-flex align-items-center col-12 p-0 ">
                <div class="form-group col-md-6">
                  <!-- Content for the first div -->
                </div>
                <div class="form-group col-6">
                  <input type="date" class="form-control m-0" name="date_enter_date" id="date_enter_date"
                    value="<?= $date->format("Y-m-d"); ?>">
                </div>
              </section>


              <section class="d-flex align-items-center col-12 p-0">
                <div class="form-group col-md-6 d-flex flex-column justify-content-end">
                  <label for="txt_select_area" class="col-form-label col-md-4 pl-0 pr-0">Select Area</label>
                  <div class="col-md-12 p-0">
                    <select class="form-control custom-select p-1" name="txt_select_area" id="txt_select_area"
                      value="<?= $row['area_id'] ?>">
                      <?php
                      $qry2 = $db->query("SELECT * FROM `area_master` WHERE e_d_optn=1 " . emp_area($emp_login_type, $area_id)) or die("");
                      while ($rowArea = $qry2->fetch(PDO::FETCH_ASSOC)) {
                        $selected = ($rowArea['id'] == $row['area_id']) ? 'selected' : '';
                        ?>
                        <option value="<?= $rowArea['id'] ?>" <?= $selected ?>>
                          <?= $rowArea['area_name'] ?>
                        </option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>

                </div>
                <div class="form-group col-md-6">
                  <label for="txt_total_refill">Total Refill</label>
                  <input type="text" class="form-control" name="txt_total_refill" id="txt_total_refill"
                    placeholder="Enter Total Refill" value="<?= $row['total_refil'] ?>">
                </div>
              </section>

              <section class="d-flex align-items-center col-12 p-0">
                <div class="form-group col-md-6 d-flex flex-column justify-content-end">
                  <label for="txt_opening_meter pe-0">Opening meter</label>
                  <input type="text" class="form-control" name="txt_opening_meter" id="txt_opening_meter"
                    placeholder="Enter Opening Meter" value="<?= $row['opening_meter'] ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="txt_closing_meter">Closing meter</label>
                  <input type="text" class="form-control" name="txt_closing_meter" id="txt_closing_meter"
                    placeholder="Enter Closing Meter" value="<?= $row['closing_meter'] ?>">
                </div>
              </section>


              <div class="form-group col-md-12">
                <label for="txt_desel_out">Desel out</label>
                <input type="text" class="form-control" id="txt_desel_out" name="txt_desel_out"
                  placeholder="Enter Desel Out" value="<?= $row['diesel_out'] ?>">
              </div>
              <input type="hidden" id="txtTankDescp" name="txtTankDescp">

              <style>
                .txtClassName {
                  width: 100%;
                  padding: 6px;
                }

                .table td {
                  padding: 4px !important;
                }

                .removeButton i {
                  font-size: 18px;
                  line-height: 27px;
                }
              </style>



              <div class="table-responsive">
                <table class="table table-bordered">

                  <thead>
                    <tr>
                      <th width="65%">Descp</th>
                      <th width="25%">DIP</th>

                      <th width="10%"></th>
                    </tr>
                  </thead>

                  <tbody id="tablestructure">

                    <?php $query2 = "SELECT * FROM `tank_entry_detail_table` WHERE `tank_main_id`=$edit_id";
                    $rsdescdip = $db->query($query2);
                    $i = 1;
                    while ($rowdescdip = $rsdescdip->fetch(PDO::FETCH_ASSOC)) { ?>

                      <tr id="struct_<?php echo $i; ?>">
                        <td><input type="text" class="txtClassName txtdescp" id="txtdescp_<?php echo $i; ?>"
                            value="<?= $rowdescdip['descp'] ?>"></td>
                        <td><input type="text" class="txtClassName txtdip" id="txtdip_<?php echo $i; ?>"
                            value="<?= $rowdescdip['dip'] ?>"></td>

                        <td>
                          <div class="removeButton" onclick="removefunction('struct_<?php echo $i; ?>')"
                            id="btnremove_<?php echo $i; ?>">
                            <i class="ti-trash"></i>
                          </div>
                        </td>
                      </tr>
                      <?php $i++;
                    } ?>



                  </tbody>
                </table>
              </div>



              <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-dark btn-sm mb-2" onclick="addmorebutton()">Add More</button>
                <!---<button type="button" class="btn btn-dark mb-2" id="addDescription">Add More</button>--->
            </div>

            <div class="form-group col-md-12">
              <label for="txt_balance">Balance</label>
              <input type="text" class="form-control" id="txt_balance" name="txt_balance" placeholder="Enter Balance"
                value="<?= $row['tank_balance'] ?>">
            </div>


            <div class="d-flex flex-col pl-3">
              <button type="submit" id="update" class="btn btn-warning mr-2">Update</button>
              <button type="button" id="preview" class="btn btn-primary mr-2 mb-2" data-toggle="modal"
                data-target="#myModal">Preview</button>

              <?php
            } else {
              ?>
              <section class=" d-flex align-items-center col-12 p-0 ">
                <div class="form-group col-md-6">
                  <!-- Content for the first div -->
                  </div>
                  <div class="form-group col-6">
                    <input type="date" class="form-control m-0" name="date_enter_date" id="date_enter_date" readonly>
                  </div>
                </section>


                <section class="d-flex align-items-center col-12 p-0">
                  <div class="form-group col-md-6 d-flex flex-column justify-content-end">
                    <label for="txt_select_area" class="col-form-label col-md-4 pl-0 pr-0">Select Area</label>
                    <div class="col-md-12 p-0">
                      <select class="form-control custom-select p-1" name="txt_select_area" id="txt_select_area">
                        <?php
                        $qry2 = $db->query("SELECT * FROM `area_master` WHERE e_d_optn='1' " . emp_area($emp_login_type, $area_id)) or die("");
                        while ($rowArea = $qry2->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <option value="<?= $rowArea['id'] ?>">
                            <?= $rowArea['area_name'] ?>
                          </option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>

                  </div>
                  <div class="form-group col-md-6">
                    <label for="txt_total_refill">Total Refill</label>
                    <input type="text" class="form-control" name="txt_total_refill" id="txt_total_refill"
                      placeholder="Enter Total Refill">
                  </div>
                </section>

                <section class="d-flex align-items-center col-12 p-0">
                  <div class="form-group col-md-6 d-flex flex-column justify-content-end">
                    <label for="txt_opening_meter pe-0">Opening meter</label>
                    <input type="text" class="form-control" name="txt_opening_meter" id="txt_opening_meter"
                      placeholder="Enter Opening Meter">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="txt_closing_meter">Closing meter</label>
                    <input type="text" class="form-control" name="txt_closing_meter" id="txt_closing_meter"
                      placeholder="Enter Closing Meter">
                  </div>
                </section>


                <div class="form-group col-md-12">
                  <label for="txt_desel_out">Desel out</label>
                  <input type="text" class="form-control" id="txt_desel_out" name="txt_desel_out"
                    placeholder="Enter Desel Out">
                </div>


                <input type="hidden" id="txtTankDescp" name="txtTankDescp">

                <style>
                  .txtClassName {
                    width: 100%;
                    padding: 6px;
                  }

                  .table td {
                    padding: 4px !important;
                  }

                  .removeButton i {
                    font-size: 18px;
                    line-height: 27px;
                  }
                </style>



                <div class="table-responsive">
                  <table class="table table-bordered">

                    <thead>
                      <tr>
                        <th width="65%">Descp</th>
                        <th width="25%">DIP</th>

                        <th width="10%"></th>
                      </tr>
                    </thead>

                    <tbody id="tablestructure">

                      <?php for ($i = 1; $i <= 10; $i++) { ?>
                        <tr id="struct_<?php echo $i; ?>">
                          <td><input type="text" class="txtClassName txtdescp" id="txtdescp_<?php echo $i; ?>"></td>
                          <td><input type="text" class="txtClassName txtdip" id="txtdip_<?php echo $i; ?>"></td>

                          <td>
                            <div class="removeButton" onclick="removefunction('struct_<?php echo $i; ?>')"
                              id="btnremove_<?php echo $i; ?>">
                              <i class="ti-trash"></i>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>



                    </tbody>
                  </table>
                </div>



                <div class="d-flex justify-content-center">
                  <button type="button" class="btn btn-dark btn-sm mb-2" onclick="addmorebutton()">Add More</button>
                  <!---<button type="button" class="btn btn-dark mb-2" id="addDescription">Add More</button>--->
              </div>

              <div class="form-group col-md-12">
                <label for="txt_balance">Balance</label>
                <input type="text" class="form-control" id="txt_balance" name="txt_balance" placeholder="Enter Balance">
              </div>


              <div class="d-flex flex-col pl-3">

                <button type="button" id="submit" class="btn btn-success mr-2 submitButton">Submit</button>

                <button type="button" id="preview" class="btn btn-primary mr-2" data-toggle="modal"
                  data-target="#myModal">Preview</button>
              </div>
              <?php
            }
            ?>
          </form>
        </div>
      </div>
      <div id="areaWiseTankBalance">

      </div>
      <!-- Modal -->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <!-- <h4 class="modal-title">Preview Record</h4> -->
            </div>
            <div class="modal-body">
              <p id="myPopup"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <?php
  include("./footer.php");
  ?>
  <script>


    // $(".submitButton").on("click", function (e) {

    // });




    function removefunction(id) {
      $("#" + id).remove();
    }

    var totaloldstruct = 11;
    function addmorebutton() {

      //var totaloldstruct=$("#tablestructure tr").length;
      //alert(totaloldstruct);


      var funin = "struct_" + totaloldstruct;

      var abc = "removefunction('" + funin + "')";

      var tablemorestruct = '<tr id="struct_' + totaloldstruct + '">' +
        '<td><input type="text" class="txtClassName" id="txtdescp_' + totaloldstruct + '"></td>' +
        '<td><input type="text" class="txtClassName" id="txtdip_' + totaloldstruct + '"></td>' +
        '<td>' +
        '<div class="removeButton" onclick="' + abc + '">' +
        '<i class="ti-trash"></i>' +
        '</div>' +
        '</td>' +
        '</tr>';
      totaloldstruct++;
      $("#tablestructure").append(tablemorestruct);
    }

    $(document).ready(function () {
      // TAKING PREVIEW DATA FROM THE DATABASE 
      const txt_select_area = $("#txt_select_area").val()
      $.post("tank_master_do.php", {
        preview: "preview",
        area: txt_select_area
      }, function (data, status) {
        if (status === "success") {
          $("#myPopup").html(data);
          const total_refill = $("#txt_total_refill");

          if ($("#tank_balance").length == 1) {

            $('#txt_opening_meter').val($('#tank_opening').val())
            balance = total_refill.val($("#tank_balance").val());
            $("#tank_balance_heading").text("Tank : " + $("#tank_balance").val());
          }
          else {
            $('#txt_opening_meter').val(0)
            balance = total_refill.val(0);
            $("#tank_balance_heading").text("Tank : 0");

          }
        }
        else {
          // console.log("bhai error aaya hai")
        }
      }
      );

      $("#add").on("click", function (e) {
        window.location.replace("./tank_master.php");
      })
      $("#manage").on("click", function (e) {
        window.location.replace("./tank_master_manage.php");
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
      var formattedDate = year + '-' + month + '-' + day;

      // Set the value of the input to the current date
      $('#date_enter_date').val(formattedDate);

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

      $(document).on('click', function () {
        hideNotification();
      });
      const urlParams = new URLSearchParams(window.location.search);
      let message = urlParams.get("message");
      if (message) {
        showNotification(message);
      }



      $("#txt_select_area").on("change", function (e) {
       const txt_select_area = $("#txt_select_area").val()
        $.post("tank_master_do.php", {
          txt_select_area: txt_select_area
        }, function (data, status) {
          if (status === "success") {
            $("#areaWiseTankBalance").html(data);
            const total_refill = $("#txt_total_refill");
            const tank_balance = $("#tank_balance");
            

              $('#txt_opening_meter').val($('#tank_opening').val())
              balance = total_refill.val($("#tank_balance").val());
              $("#tank_balance_heading").text("Tank : " + $("#tank_balance").val());
            
          }
          else {
            // console.log("bhai error aaya hai")
          }
        })
      })


      // FORM VALIDATION SECTION 
      $("#submit").on("click", function (e) {
        e.preventDefault();
        const date = $("#date_enter_date").val();
        const select_area = $("#txt_select_area").val();
        const opening_meter = $("#txt_opening_meter").val();
        const total_refill = $("#txt_total_refill").val();
        const closing_meter = $("#txt_closing_meter").val();
        const desel_out = $("#txt_desel_out").val();
        // const description = $("#txt_description").val();
        // const dip = $("#txt_dip").val();
        const banance = $("#txt_balance").val();

        if (select_area == "" || select_area == null) {
          $("#txt_select_area").css("border", "1.2px solid red");

          $("#txt_select_area").focus();
          $("#txt_select_area").keydown(function () {
            $(this).css("border", "1.2px solid skyblue");
          });
        }
        else if (opening_meter == "" || opening_meter == null) {
          $("#txt_opening_meter").css("border", "1.2px solid red");

          $("#txt_opening_meter").focus();
          $("#txt_opening_meter").keydown(function () {
            $(this).css("border", "1.2px solid skyblue");
          });

        }
        else if (total_refill == "" || total_refill == null) {

          $("#txt_total_refill").css("border", "1.2px solid red");

          $("#txt_total_refill").focus();
          $("#txt_total_refill").keydown(function () {
            $(this).css("border", "1.2px solid skyblue");
          });
        }
        else if (closing_meter == "" || closing_meter == null) {


          $("#txt_closing_meter").css("border", "1.2px solid red");
          $("#txt_closing_meter").focus();
          $("#txt_closing_meter").keydown(function () {
            $(this).css("border", "1.2px solid skyblue");
          });
        }
        else if (desel_out == "" || desel_out == null) {


          $("#txt_desel_out").css("border", "1.2px solid red");
          $("#txt_desel_out").focus();
          $("#txt_desel_out").keydown(function () {
            $(this).css("border", "1.2px solid skyblue");
          });
        }
        // else if (description == "" || description == null) {


        //   $("#txt_description").css("border", "1.2px solid red");
        //   $("#txt_description").focus();
        //   $("#txt_description").keydown(function () {
        //     $(this).css("border", "1.2px solid skyblue");
        //   });
        // }
        // else if (dip == "" || dip == null) {

        //   $("#txt_dip").css("border", "1.2px solid red");
        //   $("#txt_dip").focus();
        //   $("#txt_dip").keydown(function () {
        //     $(this).css("border", "1.2px solid skyblue");
        //   });
        // }
        else if (banance == "" || banance == null) {

          $("#txt_balance").css("border", "1.2px solid red");
          $("#txt_balance").focus();
          $("#txt_balance").keydown(function () {
            $(this).css("border", "1.2px solid skyblue");
          });
        }
        else {

          var emptyValBox = "";

          for (i = 0; i < $("#tablestructure tr").length; i++) {
            //console.log($("#tablestructure tr:eq("+i+")").attr("id"));
            var mainid = $("#tablestructure tr:eq(" + i + ")").attr("id");
            var finID = mainid.replace("struct_", "");

            var txtDescpval = $("#txtdescp_" + finID).val();
            var txtDipval = $("#txtdip_" + finID).val();

            emptyValBox = emptyValBox + txtDescpval + "==" + txtDipval + "||";

            //descp==4-5||descp==4-5||descp==4-5||descp==4-5		
          }
          console.log(emptyValBox);

          $("#txtTankDescp").val(emptyValBox);
          // emptyValBox = $("txtTankDescp").val();
          $.post("tank_master_do.php",
            {
              date_enter_date: date,
              txt_select_area: select_area,
              txt_opening_meter: opening_meter,
              txt_total_refill: total_refill,
              txt_closing_meter: closing_meter,
              txt_desel_out: desel_out,
              description_dip_info: emptyValBox,
              txt_balance: banance
            }, function (data, status) {
              if (status == "success") {
                // alert("New Record Added Successfully !....");
                let message = "New Record Added Successfully !....";
                window.location.replace("./tank_master.php?message=" + message);
              }


            }
          );
        }

      })

      $("#update").on("click", function (e) {
        e.preventDefault();
        const edit_id = $('#edit_id').val();
        const date = $("#date_enter_date").val();
        const select_area = $("#txt_select_area").val();
        const opening_meter = $("#txt_opening_meter").val();
        const total_refill = $("#txt_total_refill").val();
        const closing_meter = $("#txt_closing_meter").val();
        const desel_out = $("#txt_desel_out").val();
        const banance = $("#txt_balance").val();
        if (select_area == "" || select_area == null) {
          $("#txt_select_area").css("border", "1.2px solid red");

          $("#txt_select_area").focus();
          $("#txt_select_area").keydown(function () {
            $(this).css("border", "1.2px solid skyblue");
          });
        }
        else if (opening_meter == "" || opening_meter == null) {
          $("#txt_opening_meter").css("border", "1.2px solid red");

          $("#txt_opening_meter").focus();
          $("#txt_opening_meter").keydown(function () {
            $(this).css("border", "1.2px solid skyblue");
          });

        }
        else if (total_refill == "" || total_refill == null) {

          $("#txt_total_refill").css("border", "1.2px solid red");

          $("#txt_total_refill").focus();
          $("#txt_total_refill").keydown(function () {
            $(this).css("border", "1.2px solid skyblue");
          });
        }
        else if (closing_meter == "" || closing_meter == null) {


          $("#txt_closing_meter").css("border", "1.2px solid red");
          $("#txt_closing_meter").focus();
          $("#txt_closing_meter").keydown(function () {
            $(this).css("border", "1.2px solid skyblue");
          });
        }
        else if (desel_out == "" || desel_out == null) {


          $("#txt_desel_out").css("border", "1.2px solid red");
          $("#txt_desel_out").focus();
          $("#txt_desel_out").keydown(function () {
            $(this).css("border", "1.2px solid skyblue");
          });
        }
        // else if (description == "" || description == null) {


        //   $("#txt_description").css("border", "1.2px solid red");
        //   $("#txt_description").focus();
        //   $("#txt_description").keydown(function () {
        //     $(this).css("border", "1.2px solid skyblue");
        //   });
        // }
        // else if (dip == "" || dip == null) {

        //   $("#txt_dip").css("border", "1.2px solid red");
        //   $("#txt_dip").focus();
        //   $("#txt_dip").keydown(function () {
        //     $(this).css("border", "1.2px solid skyblue");
        //   });
        // }
        else if (banance == "" || banance == null) {

          $("#txt_balance").css("border", "1.2px solid red");
          $("#txt_balance").focus();
          $("#txt_balance").keydown(function () {
            $(this).css("border", "1.2px solid skyblue");
          });
        }
        else {
          var emptyValBox = "";

          for (i = 0; i < $("#tablestructure tr").length; i++) {
            //console.log($("#tablestructure tr:eq("+i+")").attr("id"));
            var mainid = $("#tablestructure tr:eq(" + i + ")").attr("id");
            var finID = mainid.replace("struct_", "");

            var txtDescpval = $("#txtdescp_" + finID).val();
            var txtDipval = $("#txtdip_" + finID).val();

            emptyValBox = emptyValBox + txtDescpval + "==" + txtDipval + "||";

            //descp==4-5||descp==4-5||descp==4-5||descp==4-5		
          }
          console.log(emptyValBox);

          $("#txtTankDescp").val(emptyValBox);
          $.post("tank_master_do.php",
            {
              edit_id: edit_id,
              date_enter_date: date,
              txt_select_area: select_area,
              txt_opening_meter: opening_meter,
              txt_total_refill: total_refill,
              txt_closing_meter: closing_meter,
              txt_desel_out: desel_out,
              description_dip_info: emptyValBox,
              txt_balance: banance
            }, function (data, status) {
              if (status == "success") {
                // alert("Record Updated Successfully !....");
                let message = "Record Updated Successfully !....";
                window.location.replace("./tank_master_manage.php?message=" + message)
              }

            }
          );
        }

      })

      // POPUP SECTION 
      $("#preview").on("click", function (e) {
        const date = $("#date_enter_date").val();
        const select_area = $("#txt_select_area option:selected").text();
        const opening_meter = $("#txt_opening_meter").val();
        const total_refill = $("#txt_total_refill").val();
        const closing_meter = $("#txt_closing_meter").val();
        const desel_out = $("#txt_desel_out").val();
        const description = $(".txtdescp");
        const dip = $(".txtdip");
        const balance = $("#txt_balance").val();

        if ($("#dynamicData").length === 0) {
          var popup = $("#details_table_body");
          var newTr = $("<tr>");
          newTr.attr("id", 'dynamicData');
          var tdSNo = $("<th>");
          var tdDate = $("<td>");
          var tdArea = $("<td>");
          var tdTotalRefill = $("<td>");
          var tdOpeningMeter = $("<td>");
          var tdClosingMeter = $("<td>");
          var tdDeselOut = $("<td>");
          var tdDescription = $("<td>");
          var tdDip = $("<td>");
          var tdBalance = $("<td>");

          tdSNo.text('1');
          tdDate.text(date)
          tdArea.text(select_area)
          tdTotalRefill.text(total_refill)
          tdOpeningMeter.text(opening_meter)
          tdClosingMeter.text(closing_meter)
          tdDeselOut.text(desel_out)
          description.each(function (index, element) {
            tdDescription.append($(element).text() + ' (' + $(element).val() + ')<br>');
          });

          dip.each(function (index, element) {
            tdDip.append($(element).text() + ' (' + $(element).val() + ')<br>');
          });

          tdBalance.text(balance)

          newTr.append(tdSNo);
          newTr.append(tdDate);
          newTr.append(tdArea);
          newTr.append(tdTotalRefill);
          newTr.append(tdOpeningMeter);
          newTr.append(tdClosingMeter);
          newTr.append(tdDeselOut);
          newTr.append(tdDescription);
          newTr.append(tdDip);
          newTr.append(tdBalance);
          popup.prepend(newTr);
        }
        else {
          var newTr = $('#dynamicData');
          // If newTr already exists, update the values of td elements
          newTr.find('td:eq(0)').text(date);
          newTr.find('td:eq(1)').text(select_area);
          newTr.find('td:eq(2)').text(total_refill);
          newTr.find('td:eq(3)').text(opening_meter);
          newTr.find('td:eq(4)').text(closing_meter);
          newTr.find('td:eq(5)').text(desel_out);
          newTr.find('td:eq(6)').text(description);
          newTr.find('td:eq(7)').text(dip);
          newTr.find('td:eq(8)').text(balance);
        }
      })

      $("#addDescription").on("click", function (e) {
        var newSection = $(`<section class="d-flex align-items-center col-md-12 p-0">
        <div class="form-group col-md-4">
          <label for="txt_description">Description</label>
          <input type="text" value="Enter Description" id="txt_description" class="form-control " name="txt_description"/>
        </div>
        <div class="form-group col-md-4">
          <label for="txt_dip">DIP</label>
          <input type="text" class="form-control" id="txt_dip" name="txt_dip" placeholder="Enter DIP">
        </div>
        <div class="form-group col-md-4">
          <label for="txt_balance">Balance</label>
          <input type="text" class="form-control" id="txt_balance" name="txt_balance" placeholder="Enter Banance">
        </div>
      </section>`).clone();

        $("#multiple_entries").append(newSection);
      });

      // balance calculating section 

      $("#txt_total_refill").on("change", updateBalance);
      $("#txt_desel_out").on("change", updateBalance);

      $("#txt_opening_meter").on("change", updateDeselOut);
      $("#txt_closing_meter").on("change", updateDeselOut);



      function updateBalance() {
        const totalRefill = parseFloat($("#txt_total_refill").val()) || 0;
        const deselOut = parseFloat($("#txt_desel_out").val()) || 0;
        const balance = $("#txt_balance");

        balance.val(totalRefill - deselOut);
      }

      function updateDeselOut() {
        const openingMeter = parseFloat($("#txt_opening_meter").val()) || 0;
        const closingMeter = parseFloat($("#txt_closing_meter").val()) || 0;
        const deselOut = $("#txt_desel_out");

        deselOut.val(closingMeter - openingMeter)
        updateBalance();
      }
    });

  </script>