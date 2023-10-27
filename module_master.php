<?php
include("./header.php");
include("./root/dbconnection.php");


// if edit id is get then we have to perform update logic 
if (isset($_REQUEST["edit_id"])) {
    $edit_id = $_REQUEST["edit_id"];
    $qry = $db->query("select * from module_master where id = $edit_id") or die("");
    $row = $qry->fetch(PDO::FETCH_ASSOC);
}


?>
<div class="content_wrapper bg_homebefore inner-wrapper forms-sec">
    <div>
        <p style="text-align:center; padding-top:5px; padding-bottom:5px; background-color:lightgreen; font-weight:bold; display:none; color:black;"
            id="success_promt">
            Module Added Successfully !....
        </p>
        <p style="text-align:center; padding-top:5px; padding-bottom:5px; background-color:lightgreen; font-weight:bold; display:none; color:black;"
            id="update_promt">
            Module Updated Successfully !....
        </p>

    </div>
    <div class="container-fluid">
        <!-- Start Breadcrumbbar -->
        <div class="breadcrumbbar">
            <!-- Start row -->
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <h4 class="page-title">Module Master</h4>

                </div>
                <div class="col-md-4 col-lg-4 mr-0">
                    <div class="widgetbar">
                        <button class="btn btn-primary" id="add">Add</button>
                        <button class="btn btn-primary" id="manage">Manage</button>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbbar -->
        <!-- state start-->
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">

                    <?php
                    if (isset($_REQUEST["edit_id"])) {
                        ?>
                        <div class="form-group">
                            <label>Module Title</label>
                            <input type="text" class="form-control" id="text_module_title" name="text_module_title"
                                placeholder="Enter Module Title" value=<?= $row["module_title"]; ?>>
                        </div>

                        <div class="form-group">
                            <label>Short Order</label>
                            <input type="text" class="form-control" id="text_short_order" name="text_short_order"
                                placeholder="Enter Short Order " value=<?= $row["short_order"]; ?>>
                        </div>
                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" class="form-control" id="text_url" name="txt_url" placeholder="Enter Url"
                                value=<?= $row["module_url"]; ?>>
                        </div>
                        <div class="form-group">

                            <input type="hidden" class="form-control" id="text_edit_id" name="text_edit_id"
                                value=<?= $row["id"]; ?>>
                        </div>
                        <input type="button" id="update" value="Update" class="btn btn-primary">
                    </div>



                    <?php

                    } else {


                        ?>

                    <div class="form-group">
                        <label>Module Title</label>
                        <input type="text" class="form-control" id="text_module_title" name="text_module_title"
                            placeholder="Enter Module Title">
                    </div>

                    <div class="form-group">
                        <label>Short Order</label>
                        <input type="text" class="form-control" id="text_short_order" name="text_short_order"
                            placeholder="Enter Short Order ">
                    </div>
                    <div class="form-group">
                        <label>URL</label>
                        <input type="text" class="form-control" id="text_url" name="txt_url" placeholder="Enter Url">
                    </div>
                    <input type="button" id="submit" value="Submit" class="btn btn-primary">

                </div>




                <?php


                    }
                    ?>


        </div>
    </div>
    <?php
    include("./footer.php");
    ?>
    <script>

        $(document).ready(function () {
            $("#manage").on("click", function (e) {
                window.location.replace("./module_master_manage.php");
            })
            $("#add").on("click", function (e) {
                window.location.replace("./module_master.php");
            })

            // on click of submit button data have to save on module_master_do.php page here ||
            //                                                                               \/
            $("#submit").on("click", function (e) {

                const module_title = $("#text_module_title").val();
                const short_order = $("#text_short_order").val();
                const url = $("#text_url").val();
                if (module_title == "" || module_title == null) {


                    $("#text_module_title").css("border", "1.2px solid red");
                    $("#text_module_title").focus();
                    $("#text_module_title").keydown(function () {
                        $("#text_module_title").css("border", "1.2px solid skyblue");

                    });


                }
                else if (short_order == "" || short_order == null) {

                    $("#text_short_order").css("border", "1.2px solid red");
                    $("#text_short_order").focus();
                    $("#text_short_order").keydown(function () {
                        $(this).css("border", "1.2px solid skyblue");
                    });

                }
                else if (url == "" || url == null) {


                    $("#text_url").css("border", "1.2px solid red");
                    $("#text_url").focus();
                    $("#text_url").keydown(function () {
                        $(this).css("border", "1.2px solid skyblue");
                    });


                } else {
                    $.post("module_master_do.php",
                        {
                            text_module_title: module_title,
                            text_short_order: short_order,
                            text_url: url
                        }, function (data, status) {
                            if (status == "success") {
                                $("#success_promt").css("display", "block");

                                setTimeout(function () {
                                    $("#success_promt").css("display", "none");
                                    location.reload();
                                }, 1500);
                            }
                        }
                    );

                }
            });




            // update 
            $("#update").on("click", function (e) {

                const module_title = $("#text_module_title").val();
                const short_order = $("#text_short_order").val();
                const url = $("#text_url").val();
                const updt_id = $("#text_edit_id").val();
                if (module_title == "" || module_title == null) {


                    $("#text_module_title").css("border", "1.2px solid red");
                    $("#text_module_title").focus();
                    $("#text_module_title").keydown(function () {
                        $("#text_module_title").css("border", "1.2px solid skyblue");

                    });
                }
                else if (short_order == "" || short_order == null) {
                    $("#text_short_order").css("border", "1.2px solid red");
                    $("#text_short_order").focus();
                    $("#text_short_order").keydown(function () {
                        $(this).css("border", "1.2px solid skyblue");
                    });

                }
                else if (url == "" || url == null) {


                    $("#text_url").css("border", "1.2px solid red");
                    $("#text_url").focus();
                    $("#text_url").keydown(function () {
                        $(this).css("border", "1.2px solid skyblue");
                    });
                } else {
                    $.post("module_master_do.php",
                        {
                            edit_id: updt_id,
                            text_module_title: module_title,
                            text_short_order: short_order,
                            text_url: url
                        }, function (data, status) {
                            if (status == "success") {
                                $("#update_promt").css("display", "block");

                                setTimeout(function () {
                                    $("#update_promt").css("display", "none");

                                }, 1000);
                                setTimeout(function () {
                                    window.location.replace("./module_master_manage.php")


                                }, 1002);


                            }
                        }
                    );

                }
            });





        })

    </script>