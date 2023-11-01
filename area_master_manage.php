<?php
require_once('./header.php');

include("./root/dbconnection.php");
$qry = $db->query("select * from area_master") or die("");



?>
<div class="content_wrapper bg_homebefore inner-wrapper forms-sec">
    <div class="container-fluid">
        <?php
        if (isset($_REQUEST["res"])) {

            if ($_REQUEST["res"] == 3) {
                ?>
                <div>
                    <p style="text-align:center; padding-top:5px; padding-bottom:5px; background-color:lightcoral; font-weight:bold; display:block; color:black;"
                        id="delete_promt">
                        Area Deleted !....
                    </p>


                </div>



                <?php
            }


        }
        ?>


        <!-- Start Breadcrumbbar -->
        <div class="breadcrumbbar">
            <!-- Start row -->
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <h4 class="page-title">Manage Area Master</h4>

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

                    <form class="forms-sample">
                        <div class="table-responsive-xl data_table_div">


                        </div>

                    </form>
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
                setTimeout(function () {

                    $("#delete_promt").css("display", "none");


                }, 1000);

            })

            // pagination 
            $(document).ready(function () {
                function loadTable(page) {
                    $.ajax({
                        url: "area_master_manage_do.php",
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