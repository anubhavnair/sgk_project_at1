<?php

include("./header.php");
?>
<div class="content_wrapper bg_homebefore inner-wrapper forms-sec">
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
                <div class="card mr-auto">
                
                    <form class="forms-sample">
                        
                         <input type="date" class="form-control text-center form-group" id="dt_date" name="dt_date"
                                placeholder="Enter Date" 3"> 
                        
                        <div class="form-group text-left">
                            <label>Slip Number</label>
                            <input type="text" class="form-control" id="txt_slip_number" name="txt_slip_number"
                                placeholder="Enter Slip Number ">
                        </div>

                        <div class="d-flex justify-content-between row">
                      
                            <div class="col-6">

                                <label>Vehical Number</label>
                                <input type="text" class="form-control" id="txt_vehical_number" name="txt_vehical_number"
                                placeholder="Enter Vehical Number " style="width:125%;">
                            </div>
                            <div class=" col-6">

                                <label>Quantity</label>
                                <input type="text" class="form-control" id="txt_quantity" name="txt_quantity"
                                placeholder="Enter Quantity ">
                            </div>
                        
                            </div>

                        <button type="submit" class="btn btn-primary mr-2 mt-4" id="#">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("./footer.php");
    ?>

    <script>


        $("#manage").on("click", function (e) {
            window.location.replace("./manager_entry_master_manage.php");
        })
        $("#add").on("click", function (e) {
            window.location.replace("./manager_entry_master.php");
        })
    </script>