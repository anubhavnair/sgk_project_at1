<?php
require_once('./header.php');
include("./root/dbconnection.php");

if (isset($_REQUEST["edit_id"])) {

    $edit_id = $_REQUEST["edit_id"];
    $qry = $db->query("select * from area_master where id = $edit_id ") or die("");
    $row = $qry->fetch(PDO::FETCH_ASSOC);

}
?>
<div class="content_wrapper bg_homebefore inner-wrapper forms-sec">
    <div>
        <p style="text-align:center; padding-top:5px; padding-bottom:5px; background-color:lightgreen; font-weight:bold; display:none; color:black;"
            id="success_promt">
            Area Added Successfully !....
        </p>
        <p style="text-align:center; padding-top:5px; padding-bottom:5px; background-color:lightgreen; font-weight:bold; display:none; color:black;"
            id="update_promt">
            Area Data Updated Successfully !....
        </p>

    </div>
    <div class="container-fluid">


        <!-- Start Breadcrumbbar -->
        <div class="breadcrumbbar">
            <!-- Start row -->
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <h4 class="page-title">Area Master</h4>

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
                <div class="card p-3">


                    <?php
                    if (isset($_REQUEST["edit_id"])) {
                        ?>

                        <form class="forms-sample">
                            <div class="form-group">
                                <label>Enter Area Name </label>
                                <input type="text" class="form-control" id="text_area_name" name="text_area_name"
                                    placeholder="Enter Area Name" value=<?php echo $row["area_name"] ?>>

                                <input type="hidden" name="text_edit_id" id="text_edit_id" value=<?php echo $edit_id; ?>>
                            </div>




                            <input type="button" id="update" value="Update" class="btn btn-primary">

                        </form>


                        <?php




                    } else {


                        ?>



                        <form class="forms-sample">
                            <div class="form-group">
                                <label>Enter Area Name </label>
                                <input type="text" class="form-control" id="text_area_name" name="text_area_name"
                                    placeholder="Enter Area Name">
                            </div>




                            <input type="button" id="submit" value="Submit" class="btn btn-primary">

                        </form>




                        <?php



                    }
                    ?>

                </div>
            </div>
        </div>

        <?php
        require_once('./footer.php');
        ?>
        <script>

            $(document).ready(function () {
                $("#manage").on("click", function (e) {
                    window.location.replace("./area_master_manage.php");
                })
                $("#add").on("click", function (e) {
                    window.location.replace("./area_master.php");
                })
                $("#filter_icon").on("click", function (e) {

                    $(".filter_section").slideToggle();

                });
                // on click of submit button data have to save on area_master_do.php page here ||
                //                                                                               \/
                $("#submit").on("click", function (e) {


                    const area_name = $("#text_area_name").val();

                    if (area_name == "" || area_name == null) {



                        $("#text_area_name").css("border", "1.2px solid red");
                        $("#text_area_name").focus();
                        $("#text_area_name").keydown(function () {
                            $(this).css("border", "1.2px solid skyblue");
                        });
                    }
                    else {
                        $.post("area_master_do.php",
                            {

                                text_area_name: area_name
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
                // on click of update button data have to update data on area_master_do.php page here ||
                //                                                                               \/
                $("#update").on("click", function (e) {
                    const updt_id = $("#text_edit_id").val();
                    const area_name = $("#text_area_name").val();

                    if (area_name == "" || area_name == null) {

                        $("#text_area_name").focus();
                    }
                    else {
                        $.post("area_master_do.php",
                            {
                                edit_id: updt_id,
                                text_area_name: area_name
                            }, function (data, status) {
                                if (status == "success") {

                                    $("#update_promt").css("display", "block");

                                    setTimeout(function () {
                                        $("#update_promt").css("display", "none");

                                    }, 1000);
                                    setTimeout(function () {
                                        window.location.replace("./area_master_manage.php")



                                    }, 1002);




                                }
                            }
                        );

                    }
                });



            })



        </script>