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
        <div class="notification" id="myNotification">

        </div>
        <!-- state start-->
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">

                    <form class="forms-sample">

                        <?php
                        if (isset($_REQUEST['edit_id'])) {
                            $edit_id = $_REQUEST["edit_id"];
                            $qry = $db->query("select * from vehicle_master where id = $edit_id ") or die("");
                            $row = $qry->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <input type="hidden" id="edit_id" value="<?= $edit_id ?>">
                            <div class="form-group col-12">
                                <label for="txt_vehical_name">Enter Vehical Name</label>
                                <input type="text" class="form-control" name="txt_vehical_name" id="txt_vehical_name"
                                    value="<?= $row['vehical_name'] ?>" placeholder="Enter Name">
                            </div>
                            <div class="form-group col-12">
                                <label for="txt_driver_name">Driver Name</label>
                                <input type="text" class="form-control" name="txt_driver_name" id="txt_driver_name"
                                    value="<?= $row['driver_name'] ?>" placeholder="Enter Driver Name">
                            </div>
                            <div class="form-group col-12">
                                <label for="txt_vehical_number">Vehical Number</label>
                                <input type="text" class="form-control" id="txt_vehical_number" name="txt_vehical_number"
                                    value="<?= $row['vehicle_number'] ?>" placeholder="Enter Vehical Number">
                            </div>
                            <div class="form-group col-12">
                                <label for="txt_closing_meter">Driver Number</label>
                                <input type="text" class="form-control" id="txt_driver_number" name="txt_driver_number"
                                    value="<?= $row['driver_contactno'] ?>" placeholder="Enter Driver Number">
                            </div>


                            <div class="col-12">
                                <button type="submit" id="update" class="btn btn-primary mr-2 ">Update</button>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="form-group col-12">
                                <label for="txt_vehical_name">Enter Vehical Name</label>
                                <input type="text" class="form-control" name="txt_vehical_name" id="txt_vehical_name"
                                    placeholder="Enter Name">
                            </div>
                            <div class="form-group col-12">
                                <label for="txt_driver_name">Driver Name</label>
                                <input type="text" class="form-control" name="txt_driver_name" id="txt_driver_name"
                                    placeholder="Enter Driver Name">
                            </div>
                            <div class="form-group col-12">
                                <label for="txt_vehical_number">Vehical Number</label>
                                <input type="text" class="form-control" id="txt_vehical_number" name="txt_vehical_number"
                                    placeholder="Enter Vehical Number">
                            </div>
                            <div class="form-group col-12">
                                <label for="txt_closing_meter">Driver Number</label>
                                <input type="text" class="form-control" id="txt_driver_number" name="txt_driver_number"
                                    placeholder="Enter Driver Number">
                            </div>


                            <div class="col-12">
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
        require_once('./footer.php');
        ?>
        <script>
            $(document).ready(function () {

                $("#vehical_manag_btn").on("click", function (e) {
                    window.location.replace("./vehicle_master_manage.php");
                })
                $("#vehical_master_add").on("click", function (e) {
                    window.location.replace("./vehicle_master.php");
                })
                $("#filter_icon").on("click", function (e) {

                    $(".filter_section").slideToggle();

                });
            })

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

            // FORM VALIDATION SECTION 
            $("#submit").on("click", function (e) {
                e.preventDefault();
                const vehicle_name = $("#txt_vehical_name").val();
                const driver_name = $("#txt_driver_name").val();
                const vehical_number = $("#txt_vehical_number").val();
                const driver_number = $("#txt_driver_number").val();
                if (vehicle_name == "" || vehicle_name == null) {
                    $("#txt_vehical_name").css("border", "1.2px solid red");
                    $("#txt_vehical_name").focus();
                    $("#txt_vehical_name").keydown(function () {
                        $(this).css("border", "1.2px solid skyblue");
                    });
                }
                else if (driver_name == "" || driver_name == null) {
                    $("#txt_driver_name").css("border", "1.2px solid red");
                    $("#txt_driver_name").focus();
                    $("#txt_driver_name").keydown(function () {
                        $(this).css("border", "1.2px solid skyblue");
                    });
                }
                else if (vehical_number == "" || vehical_number == null) {

                    $("#txt_vehical_number").css("border", "1.2px solid red");

                    $("#txt_vehical_number").focus();
                    $("#txt_vehical_number").keydown(function () {
                        $(this).css("border", "1.2px solid skyblue");
                    });
                }
                else if (driver_number == "" || driver_number == null) {

                    $("#txt_driver_number").css("border", "1.2px solid red");

                    $("#txt_driver_number").focus();
                    $("#txt_driver_number").keydown(function () {
                        $(this).css("border", "1.2px solid skyblue");
                    });
                }
                else {
                    $.post("vehicle_master_do.php",
                        {
                            txt_vehical_name: vehicle_name,
                            txt_driver_name: driver_name,
                            txt_vehical_number: vehical_number,
                            txt_driver_number: driver_number
                        }, function (data, status) {
                            if (status == "success") {
                                // alert("Vehicle Added Successfully !....");
                                let message = "Vehicle Added Successfully !....";
                                window.location.replace("./vehicle_master.php?message=" + message);

                            }

                        }
                    );
                }

            })

            $("#update").on("click", function (e) {
                e.preventDefault();
                const edit_id = $("#edit_id").val();
                const vehicle_name = $("#txt_vehical_name").val();
                const driver_name = $("#txt_driver_name").val();
                const vehical_number = $("#txt_vehical_number").val();
                const driver_number = $("#txt_driver_number").val();
                if (vehicle_name == "" || vehicle_name == null) {
                    $("#txt_vehical_name").css("border", "1.2px solid red");
                    $("#txt_vehical_name").focus();
                    $("#txt_vehical_name").keydown(function () {
                        $(this).css("border", "1.2px solid skyblue");
                    });
                }
                else if (driver_name == "" || driver_name == null) {
                    $("#txt_driver_name").css("border", "1.2px solid red");
                    $("#txt_driver_name").focus();
                    $("#txt_driver_name").keydown(function () {
                        $(this).css("border", "1.2px solid skyblue");
                    });
                }
                else if (vehical_number == "" || vehical_number == null) {

                    $("#txt_vehical_number").css("border", "1.2px solid red");

                    $("#txt_vehical_number").focus();
                    $("#txt_vehical_number").keydown(function () {
                        $(this).css("border", "1.2px solid skyblue");
                    });
                }
                else if (driver_number == "" || driver_number == null) {

                    $("#txt_driver_number").css("border", "1.2px solid red");

                    $("#txt_driver_number").focus();
                    $("#txt_driver_number").keydown(function () {
                        $(this).css("border", "1.2px solid skyblue");
                    });
                }
                else {
                    $.post("vehicle_master_do.php",
                        {
                            edit_id: edit_id,
                            txt_vehical_name: vehicle_name,
                            txt_driver_name: driver_name,
                            txt_vehical_number: vehical_number,
                            txt_driver_number: driver_number
                        }, function (data, status) {
                            if (status == "success") {
                                // alert("Vehicle Updated Successfully !....");
                                let message = "Vehicle Updated Successfully !....";
                                window.location.replace("./vehicle_master_manage.php?message=" + message);
                               
                            }

                        }
                    );
                }

            })

        </script>