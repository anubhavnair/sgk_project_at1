<?php
include("./header.php");
include("./root/dbconnection.php");
$qry = $db->query("select * from module_master") or die("");
?>
<div class="content_wrapper bg_homebefore inner-wrapper forms-sec">

    <?php
    if (isset($_REQUEST["res"])) {

        if ($_REQUEST["res"] == 3) {
            ?>
            <div>
                <p style="text-align:center; padding-top:5px; padding-bottom:5px; background-color:lightcoral; font-weight:bold; display:block; color:black;"
                    id="delete_promt">
                    Module Deleted Successfully !....
                </p>


            </div>



            <?php
        }


    }
    ?>

    <div class="container-fluid">
        <!-- Start Breadcrumbbar -->
        <div class="breadcrumbbar">
            <!-- Start row -->
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <h4 class="page-title">Manage Module Master </h4>

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

                    <div class="table-responsive-xl data_table_div">

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
                    window.location.replace("./module_master_manage.php");
                })
                $("#add").on("click", function (e) {
                    window.location.replace("./module_master.php");
                })



                setTimeout(function () {

                    $("#delete_promt").css("display", "none");


                }, 1000);

            })



            // pagination 
            $(document).ready(function () {
                function loadTable(page) {
                    $.ajax({
                        url: "module_master_manage_do.php",
                        type: "POST",
                        data: { page_no: page },
                        success: function (data) {
                            $(".data_table_div").html(data);
                        }
                    });
                }
                loadTable();

                //Pagination Code
                $(document).on("click", "#pagination a", function (e) {
                    e.preventDefault();
                    var page_id = $(this).attr("id");
                    // alert(page_id);
                    loadTable(page_id);
                })
            });




        </script>