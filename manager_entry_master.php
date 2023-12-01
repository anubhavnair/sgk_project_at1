<?php

include("./header.php");
include("./root/dbconnection.php");



?>
<div class="content_wrapper bg_homebefore inner-wrapper forms-sec">
    <div>
        <p style="text-align:center; padding-top:5px; padding-bottom:5px; background-color:lightgreen; font-weight:bold; display:none; color:black;"
            id="success_promt">
            Entry Added Successfully !....
        </p>
        <p style="text-align:center; padding-top:5px; padding-bottom:5px; background-color:lightgreen; font-weight:bold; display:none; color:black;"
            id="update_promt">
            Entry Updated Successfully !....
        </p>

    </div>
    <div class="container-fluid">
        <!-- Start Breadcrumbbar -->
        <div class="breadcrumbbar">
            <!-- Start row -->
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <h4 class="page-title">Manager Entry Master</h4>


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
                <div class="card mr-auto ">
                    <?php

                    if (isset($_REQUEST["edit_id"])) {


                        $edit_id = $_REQUEST["edit_id"];
                        $qry = $db->query("select * from manager_entry_master where id = $edit_id") or die("");
                        $row = $qry->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <form class="forms-sample p-3 " enctype="multipart/form-data">

                            <input type="date" class="form-control text-center form-group " id="dt_date" name="dt_date"
                                placeholder="Enter Date" value=<?php echo $row["select_date"]; ?>>

                            <div class="form-group text-left">
                                <label>Slip Number</label>
                                <input type="text" class="form-control" id="text_slip_number" name="txt_slip_number"
                                    placeholder="Enter Slip Number" value=<?php echo $row["slip_no"]; ?>>
                            </div>

                            <div class="d-flex justify-content-between row">

                                <div class="col-6">

                                    <label>Vehical Number</label>
                                    <input type="text" class="form-control" id="text_vehical_number"
                                        name="txt_vehical_number" placeholder="Enter Vehical Number " style="width:125%;"
                                        value=<?php echo $row["vehical_no"]; ?>>
                                </div>
                                <div class=" col-6">

                                    <label>Quantity</label>
                                    <input type="text" class="form-control" id="text_quantity" name="txt_quantity"
                                        placeholder="Enter Quantity " value=<?php echo $row["total_qty"]; ?>>

                                    <input type="hidden" name="text_edit_id" id="text_edit_id" value=<?php echo $row["id"]; ?>>
                                </div>
                                <img src="images/slips/<?= $row['slip_image'] ?>" class="rounded mx-auto d-block mt-1 mb-2"
                                    style="height: 50vw;" alt="...">
                                <div class="form-group custom-file col-12 mb-1">
                                    <input type="file" id="img_upload_slip">

                                </div>
                            </div>

                            <input type="button" name="update" id="update" value="Update" class="btn btn-primary mt-4">
                        </form>





                        <?php
                    } else {
                        ?>

                        <form class="forms-sample p-3">

                            <input type="date" class="form-control text-center form-group " id="dt_date" name="dt_date"
                                value='<?php echo date("Y-m-d") ?>'>

                            <div class="form-group text-left">
                                <label>Slip Number</label>
                                <input type="text" class="form-control" id="text_slip_number" name="txt_slip_number"
                                    placeholder="Enter Slip Number ">
                            </div>

                            <div class="d-flex justify-content-between row">

                                <div class="col-6">

                                    <label>Vehical Number</label>
                                    <input type="text" class="form-control" id="text_vehical_number"
                                        name="txt_vehical_number" placeholder="Enter Vehical Number " style="width:125%;">
                                </div>
                                <div class=" col-6">

                                    <label>Quantity</label>
                                    <input type="text" class="form-control" id="text_quantity" name="txt_quantity"
                                        placeholder="Enter Quantity ">
                                </div>
                                <div class="form-group col-6">
                                    <label for="img_upload_slip">upload slip</label>
                                    <input type="file" id="img_upload_slip">

                                </div>
                            </div>

                            <input type="button" class="btn btn-primary mt-4" value="Submit" id="submit">
                        </form>


                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <?php
    include("./footer.php");
    ?>

    <script>


        $(document).ready(function () {

            $("#manage").on("click", function (e) {
                window.location.replace("./manager_entry_master_manage.php");
            });
            $("#add").on("click", function (e) {
                window.location.replace("./manager_entry_master.php");
            });



            // on click of submit button data have to save on  manager_entry_master_do.php page here ||
            //                                                                               \/
            $("#submit").on("click", function (e) {
                e.preventDefault();



                const date = $("#dt_date").val();

                const vehical_number = $("#text_vehical_number").val();

                const slip_number = $("#text_slip_number").val();

                const quantity = $("#text_quantity ").val();

                const img_upload_slip = $('#img_upload_slip')[0];

                if (date == "" || date == null) {


                    $("#dt_date").css("border", "1.2px solid red");
                    $("#dt_date").focus();
                    $("#dt_date").keydown(function () {
                        $("#dt_date").css("border", "1.2px solid skyblue");

                    });
                } else if (slip_number == "" || slip_number == null) {




                    $("#text_slip_number").css("border", "1.2px solid red");
                    $("#text_slip_number").focus();
                    $("#text_slip_number").keydown(function () {
                        $("#text_slip_number").css("border", "1.2px solid skyblue");

                    });
                } else if (vehical_number == "" || vehical_number == null) {




                    $("#text_vehical_number").css("border", "1.2px solid red");
                    $("#text_vehical_number").focus();
                    $("#text_vehical_number").keydown(function () {
                        $("#text_vehical_number").css("border", "1.2px solid skyblue");

                    });

                } else if (quantity == "" || quantity == null) {


                    $("#text_quantity").css("border", "1.2px solid red");
                    $("#text_quantity").focus();
                    $("#text_quantity").keydown(function () {
                        $("#text_quantity").css("border", "1.2px solid skyblue");

                    });

                }
                else if (img_upload_slip === null || img_upload_slip.files.length === 0) {

                    $("#img_upload_slip").css("border", "1.2px solid red");
                    $("#img_upload_slip").focus();
                    $("#img_upload_slip").keydown(function () {
                        $(this).css("border", "1.2px solid skyblue");
                    });
                }
                else {
                    const formData = new FormData();
                    formData.append('dt_date', date);
                    formData.append('text_slip_number', slip_number);
                    formData.append('text_vehical_number', vehical_number);
                    formData.append('text_quantity', quantity);

                    formData.append('img_upload_slip', img_upload_slip.files[0]);


                    $.ajax({
                        url: 'manager_entry_master_do.php',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (data, status) {
                            if (status == 'success') {
                                $("#success_promt").css("display", "block");

                                setTimeout(function () {
                                    $("#success_promt").css("display", "none");
                                    location.reload();
                                }, 1500);



                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('Error:', error);
                            // Handle the error as needed
                        }
                    });


                }
            });



            //update button click perform


            $("#update").on("click", function (e) {



                const updt_id = $("#text_edit_id").val();
                const date = $("#dt_date").val();

                const vehical_number = $("#text_vehical_number").val();

                const slip_number = $("#text_slip_number").val();

                const quantity = $("#text_quantity ").val();

                const img_upload_slip = $('#img_upload_slip')[0];


                if (date == "" || date == null) {


                    $("#dt_date").css("border", "1.2px solid red");
                    $("#dt_date").focus();
                    $("#dt_date").keydown(function () {
                        $("#dt_date").css("border", "1.2px solid skyblue");

                    });
                } else if (slip_number == "" || slip_number == null) {

                    $("#text_slip_number").css("border", "1.2px solid red");
                    $("#text_slip_number").focus();
                    $("#text_slip_number").keydown(function () {
                        $("#text_slip_number").css("border", "1.2px solid skyblue");

                    });
                } else if (vehical_number == "" || vehical_number == null) {

                    $("#text_vehical_number").css("border", "1.2px solid red");
                    $("#text_vehical_number").focus();
                    $("#text_vehical_number").keydown(function () {
                        $("#text_vehical_number").css("border", "1.2px solid skyblue");

                    });


                } else if (quantity == "" || quantity == null) {
                    $("#text_quantity").css("border", "1.2px solid red");
                    $("#text_quantity").focus();
                    $("#text_quantity").keydown(function () {
                        $("#text_quantity").css("border", "1.2px solid skyblue");

                    });
                }
                else {

                    const formData = new FormData();
                    formData.append('edit_id', updt_id);
                    formData.append('dt_date', date);
                    formData.append('text_slip_number', slip_number);
                    formData.append('text_vehical_number', vehical_number);
                    formData.append('text_quantity', quantity);
                    formData.append('img_upload_slip', img_upload_slip.files[0]);

                    $.ajax({
                        url: "manager_entry_master_do.php",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (data, status) {
                            if (status == "success") {
                                $("#update_promt").css("display", "block");

                                setTimeout(function () {
                                    $("#update_promt").css("display", "none");
                                }, 1000);

                                setTimeout(function () {
                                    window.location.replace("./manager_entry_master_manage.php");
                                }, 1002);
                            }
                        },
                        // error: function (xhr, status, error) {
                        //     console.error('Error:', error);
                        //     // Handle the error as needed
                        // }
                    });

                }
            });





        });


    </script>