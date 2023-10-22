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
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">


                    <div class="form-group">
                        <label>Module Title</label>
                        <input type="text" class="form-control" id="text_module_title" name="text_module_title"
                            placeholder="Enter Module Title" value=<?php
                            if (isset($_REQUEST["edit_id"])) {
                                echo $row["module_title"];
                            }

                            ?>>
                    </div>

                    <div class="form-group">
                        <label>Short Order</label>
                        <input type="text" class="form-control" id="text_short_order" name="text_short_order"
                            placeholder="Enter Short Order " value=<?php
                            if (isset($_REQUEST["edit_id"])) {
                                echo $row["short_order"];
                            }

                            ?>>
                    </div>
                    <div class="form-group">
                        <label>URL</label>
                        <input type="text" class="form-control" id="text_url" name="txt_url" placeholder="Enter Url "
                            value=<?php
                            if (isset($_REQUEST["edit_id"])) {
                                echo $row["module_url"];
                            }

                            ?>>
                    </div>

                    <?php

                    if (isset($_REQUEST["edit_id"])) {
                        ?>
                        <button class="btn btn-primary" id="update">Update</button>
                        <?php

                    } else {
                        ?>
                        <button class="btn btn-primary" id="submit">Submit</button>
                        <?php

                    }

                    ?>


                </div>
            </div>
        </div>
        <?php
        include("./footer.php");
        ?>
        <script>



            $("#manage").on("click", function (e) {
                window.location.replace("./module_master_manage");
            })
            $("#add").on("click", function (e) {
                window.location.replace("./module_master.php");
            })
            $("#authorization").on("click", function (e) {
                window.location.replace("./employee_authorization.php");
            })

            // on click of submit button data have to save on module_master_do.php page here ||
            //                                                                               \/
            $("#submit").on("click", function (e) {

                const module_title = $("#text_module_title").val();
                const short_order = $("#text_short_order").val();
                const url = $("#text_url").val();
                if (module_title == "" || module_title == null) {
                    $("#text_module_title").focus();
                }
                else if (short_order == "" || short_order == null) {
                    $("#text_short_order").focus();
                }
                else if (url == "" || url == null) {
                    $("#text_url").focus();
                } else {
                    $.post("module_master_do.php",
                        {
                            text_module_title: module_title,
                            text_short_order: short_order,
                            text_url: url
                        }, function (data, status) {
                            if (status == "success") {
                                alert("Module Added Successfully !....");
                            }
                        }
                    );

                }
            });


            // on click of update button we have to fetch the text box datas and update into the database table

            $("#update").on("click", function (e) {

                const module_title = $("#text_module_title").val();
                const short_order = $("#text_short_order").val();
                const url = $("#text_url").val();
                if (module_title == "" || module_title == null) {
                    $("#text_module_title").focus();
                }
                else if (short_order == "" || short_order == null) {
                    $("#text_short_order").focus();
                }
                else if (url == "" || url == null) {
                    $("#text_url").focus();
                } else {
                    $.post("module_master_do.php",
                        {   edit_id : <?php echo $row["id"]; ?> ,
                            text_module_title: module_title,
                            text_short_order: short_order,
                            text_url: url
                        }, function (data, status) {
                            if (status == "success") {
                                alert("Module Updated Successfully !....");
                            }
                        }
                    );

                }
            });
        


        </script>