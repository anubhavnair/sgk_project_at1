<?php

include("./header.php");
include("./root/dbconnection.php");




$qry = $db->query("select * from manager_entry_master") or die("");



?>
<div class="content_wrapper bg_homebefore inner-wrapper forms-sec">

    <?php
    if (isset($_REQUEST["res"])) {

        if ($_REQUEST["res"] == 3) {
            ?>
            <div>
                <p style="text-align:center; padding-top:5px; padding-bottom:5px; background-color:lightcoral; font-weight:bold; display:block; color:black;"
                    id="delete_promt">
                    Entry Deleted !....
                </p>


            </div>



            <?php
        }


    }
    ?>


    <div class="container-fluid">
        <!-- filter section start  -->

        <span id="filter_icon"><svg width="30" height="30" fill="none" stroke="#0d02b1" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M22 3H2l8 9.46V19l4 2v-8.54L22 3z"></path>
            </svg>Click to Filter</span>
        <div class="row filter_section" style="display: none;">

            <div class="col-md-12">
                <label>Enter Date</label>
                <input type="date" name='dt_start_date' id='dt_start_date' class="form-control">

            </div>
            <div class="ml-auto mr-auto d-flex justify-content-center">

                <button id="search" class="btn btn-primary ml-auto mr-auto mt-1 text-center">Search</button>
            </div>
        </div>

        <!-- filter section end  -->




        <!-- Start Breadcrumbbar -->
        <div class="breadcrumbbar">
            <!-- Start row -->
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <h4 class="page-title"> Manage Manager Entry Master</h4>


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
                $("#add").on("click", function (e) {
                    window.location.replace("./manager_entry_master.php");
                })
                $("#manage").on("click", function (e) {
                    window.location.replace("./manager_entry_master_manage.php");
                })
                $("#filter_icon").on("click", function (e) {

                    $(".filter_section").slideToggle();

                });

                // search logic 
                $('#search').on("click", function () {
                    const filter_date = $("#dt_start_date").val();

                    if (filter_date == "" || filter_date == null) {
                        alert("Please Select a date first");
                        $("$dt_start_date").focus();
                    } else {

                        $.post("manager_entry_master_do.php", { filter_by_date: filter_date }, function (data, status) {


                            if (status == "success") {
                                $(".manage_table_div").html(data);
                            }
                        })
                        // window.location.replace("manager_entry_master_manage.php?filter_by_date=" + filter_date);
                    }

                });



            })

            // pagination 
            $(document).ready(function () {
                function loadTable(page) {
                    $.ajax({
                        url: "manager_entry_master_manage_do.php",
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