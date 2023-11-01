<?php
require_once('./root/dbconnection.php');
require_once('./header.php');



?>
<div class="content_wrapper bg_homebefore inner-wrapper forms-sec">
    <div class="container-fluid">


        <!-- Start Breadcrumbbar -->
        <div class="breadcrumbbar">
            <!-- Start row -->
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <h4 class="page-title">Manage Vehicle Master</h4>

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
        <div class="notification" id="myNotification">

        </div>
        <!-- state start-->
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">



                    <div class="table-responsive-xl">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SNO</th>
                                    <th scope="col">Vehical Name</th>
                                    <th scope="col">Driver Name</th>
                                    <th scope="col">Vehical Number</th>
                                    <th scope="col">Driver Number</th>
                                    <th scope="col">status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $limit = 20;
                                    $qry = $db->query("select * from vehicle_master WHERE e_d_optn = '1'") or die("");

                                    $total_rows = $qry->rowCount(); // Use rowCount to get the number of rows
                                    
                                    // Get the required number of pages
                                    $total_pages = ceil($total_rows / $limit);

                                    // Update the active page number
                                    if (!isset($_REQUEST['page'])) {
                                        $page_number = 1;
                                        $i = 1;
                                        echo($i);

                                    } else {
                                        $page_number = $_REQUEST['page'];
                                        $i = $limit * ($page_number - 1) + 1;
echo($i);
                                    }

                                    // Get the initial page number
                                    $initial_page = ($page_number - 1) * $limit;

                                    // Get data of selected rows per page
                                    $getQuery = "SELECT * FROM vehicle_master WHERE e_d_optn = '1' LIMIT $initial_page ,$limit";

                                    $qry = $db->query($getQuery) or die("");
                                    while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {
                                        $id = $row['id'];
                                        ?>
                                    <tr class="text-left">
                                        <th>
                                            <?php echo $i; ?>
                                        </th>
                                        <td>
                                            <?= $row['vehical_name'] ?>
                                        </td>
                                        <td>
                                            <?= $row['vehicle_number'] ?>
                                        </td>
                                        <td>
                                            <?= $row['driver_name'] ?>
                                        </td>
                                        <td>
                                            <?= $row['driver_contactno'] ?>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a href="vehicle_master_do.php?del_id=<?= $id ?>"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red"
                                                        class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                    </svg></a> &nbsp;&nbsp;<a
                                                    href="vehicle_master.php?edit_id=<?= $id ?>"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="blue" class="bi bi-pen-fill" viewBox="0 0 16 16">
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
                    <div class='pages'>
          <?php
          // show page number with link   
          
          for ($page_number = 1; $page_number <= $total_pages; $page_number++) {
            
            echo '<a href = "vehicle_master_manage.php?page=' . $page_number . '">' . $page_number . ' </a>';
            
          }
          ?>
          </div>

                </div>
            </div>
        </div>
        <?php
        require_once('./footer.php');
        ?>
        <script>

            $("#vehical_manag_btn").on("click", function (e) {
                window.location.replace("./vehicle_master_manage.php");
            })
            $("#vehical_master_add").on("click", function (e) {
                window.location.replace("./vehicle_master.php");
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
                let color = urlParams.get("color");
                if (color) {
                    notification.css("background-color", color)
                }
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
            let color = urlParams.get("color");
            if (message) {
                showNotification(message);
            }


        </script>