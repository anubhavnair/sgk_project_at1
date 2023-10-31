<?php

include("./header.php");
require_once('./root/dbconnection.php');

?>
<div class="content_wrapper bg_homebefore inner-wrapper forms-sec">
  <div class="container-fluid">

    <!-- filter section start  -->

    <span id="filter_icon"><svg width="30" height="30" fill="none" stroke="#0d02b1" stroke-linecap="round"
        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M22 3H2l8 9.46V19l4 2v-8.54L22 3z"></path>
      </svg>Click to Filter</span>
    <div class="row filter_section" style="display: none;">

      <section class="col-12 d-flex align-items-center">
        <div class="col-6 d-flex justify-content-end flex-column h-100">
          <label for="date_start_date">Start Date</label>
          <input type="date" name="date_start_date" id="date_start_date" class="form-control p-0">
        </div>
        <div class="col-6 d-flex justify-content-end flex-column h-100">
          <label for="date_end_date">End Date</label>
          <input type="date" name="date_end_date" id="date_end_date" class="form-control p-0">
        </div>
      
      </section>
      <div class="col-12">
        <form class="form-inline my-2 my-lg-0 col-12">
          <button id="search" class="btn btn-primary ml-auto mr-auto mt-1">Search</button>
        </form>
      </div>

    </div>



    <!-- filter section end  -->


    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
      <!-- Start row -->
      <div class="row">
        <div class="col-md-8 col-lg-8">
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
    <div class="notification" id="myNotification">

    </div>
    <!-- state start-->
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card" >
          <!-- <h4 class="header-title ml-2">Tank Details</h4> -->
          <div class="table-responsive-xl" id="details_table_body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">S.no</th>
                  <th scope="col">Date</th>
                  <th scope="col">Area</th>
                  <th scope="col">Total Refill</th>
                  <th scope="col">Opening Meter</th>
                  <th scope="col">Closing Meter</th>
                  <th scope="col">Desel Out</th>
                  <th scope="col">Description</th>
                  <th scope="col">DIP</th>
                  <th scope="col">Balance</th>
                  <th scope="col">Operations</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $limit = 20;

                $getQuery = "select * from tank_entry_master";

                $qry2 = $db->query($getQuery);

                $total_rows = $qry2->rowCount(); // Use rowCount to get the number of rows
                
                // Get the required number of pages
                $total_pages = ceil($total_rows / $limit);

                // Update the active page number
                if (!isset($_REQUEST['page'])) {
                  $page_number = 1;
                  $i = 1;
                } else {
                  $page_number = $_REQUEST['page'];
                  $i = $limit * ($page_number - 1) + 1;

                }

                // Get the initial page number
                $initial_page = ($page_number - 1) * $limit;

                // Get data of selected rows per page
                $getQuery = "SELECT * FROM tank_entry_master
            ORDER BY STR_TO_DATE(tank_entry_date, '%Y-%m-%d') DESC
            LIMIT $initial_page, $limit";


                $qry = $db->query($getQuery) or die("");


                while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {
                  $id = $row['id'];
                  $area_id = $row['area_id'];
                  $query = $db->query("SELECT * FROM `area_master` WHERE id='$area_id'");
                  $rowArea = $query->fetch(PDO::FETCH_ASSOC);
                  $area_name = $rowArea['area_name'];

                  ?>

                  <tr>
                    <th scope="row">
                      <?php echo $i; ?>
                    </th>
                    <td>
                      <?= $row['tank_entry_date'] ?>
                    </td>
                    <td>
                      <?= $area_name ?>
                    </td>
                    <td>
                      <?= $row['total_refil'] ?>
                    </td>
                    <td>
                      <?= $row['opening_meter'] ?>
                    </td>
                    <td>
                      <?= $row['closing_meter'] ?>
                    </td>
                    <td>
                      <?= $row['diesel_out'] ?>
                    </td>
                    <td>
                      <?= $row['tankentry_description'] ?>
                    </td>
                    <td>
                      <?= $row['tank_dip'] ?>
                    </td>
                    <td>
                      <?= $row['tank_balance'] ?>
                    </td>
                    <td>
                      <div class="d-flex justify-content-center align-items-center"><a
                          href="tank_master_do.php?del_id=<?= $id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path
                              d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                          </svg></a> &nbsp;&nbsp;<a href="tank_master.php?edit_id=<?= $id ?>"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-pen-fill"
                            viewBox="0 0 16 16">
                            <path
                              d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                          </svg></a></div>
                    </td>
                  </tr>
                  <?php
                  $i++;
                }
                ?>
              </tbody>
            </table>
          </div>
          <div class='pages'>
          <?php
          // show page number with link   
          
          for ($page_number = 1; $page_number <= $total_pages; $page_number++) {
            
            echo '<a href = "tank_master_manage.php?page=' . $page_number . '">' . $page_number . ' </a>';
            
          }
          ?>
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
        window.location.replace("./tank_master.php");
      })
      $("#manage").on("click", function (e) {
        window.location.replace("./tank_master_manage.php");
      })
      $("#filter_icon").on("click", function (e) {

        $(".filter_section").slideToggle();

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

      $(document).on('click', function () {
        hideNotification();
      });
      const urlParams = new URLSearchParams(window.location.search);
      let message = urlParams.get("message");
      let color = urlParams.get("color");
      if (color) {
        notification.css("background-color", color)
      }
      if (message) {
        showNotification(message);
      }
      // search logic 
      $('#search').on("click", function (e) {
        e.preventDefault();
        const start_date = $("#date_start_date").val();
        const end_date = $("#date_end_date").val();

        // Check if at least one of the date inputs is not empty
        if (start_date !== "" || end_date !== "") {
          $.post("tank_master_do.php", {
            start_date: start_date,
            end_date: end_date,
          }, function (data, status) {
            if (status === "success") {
             $("#details_table_body").html(data);
              searchButton();
            }
          }).fail(function (xhr, status, error) {
            console.log(error);
          });
        }
      });

      // SEARCH PAGINATION LOGIC
      // Event delegation for the "Previous" button
$('.pages').on("click", "#previous", function () {
    var page_number = parseInt($("#page_number").val()) - 1;
    if (page_number < 1) {
        return; // Prevent going to negative page numbers
    }
    const start_date = $("#date_start_date").val();
    const end_date = $("#date_end_date").val();

    $.post("tank_master_do.php", {
        page: page_number,
        start_date: start_date,
        end_date: end_date
    }, function (data, status) {
        if (status === "success") {
            $("#details_table_body").html(data);
        }
    }).fail(function (xhr, status, error) {
        console.log(error);
    });
});

// Event delegation for the "Next" button
$('.pages').on("click", "#next", function () {
    var page_number = parseInt($("#page_number").val()) + 1;
    const start_date = $("#date_start_date").val();
    const end_date = $("#date_end_date").val();

    $.post("tank_master_do.php", {
        page: page_number,
        start_date: start_date,
        end_date: end_date
    }, function (data, status) {
        if (status === "success") {
            $("#details_table_body").html(data);
        }
    }).fail(function (xhr, status, error) {
        console.log(error);
    });
});

// FUNCTION FOR DYNAMICALLY CREATE BUTTON FOR SEARCH PAGINATION 
function searchButton() {
    // Create the "Previous" button
    $('.pages').html("");
    var previousButton = $('<button>', {
        'type': 'button',
        'class': 'btn btn-primary mr-2',
        'id': 'previous',
        'text': '<< Pre'
    });

    // Create the "Next" button
    var nextButton = $('<button>', {
        'type': 'button',
        'class': 'btn btn-primary mr-2',
        'id': 'next',
        'text': 'Next >>'
    });

    // Append the buttons to a container element (e.g., a div with class="pages")
    $('.pages').append(previousButton, nextButton);
}


    });
  </script>