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
                    <h4 class="page-title">Manager Entry</h4>

                    
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
                    <h4 class="header-title">Manager Entry Master</h4>
                    <form class="forms-sample">
                        <div class="form-group col-md-4 text-center ml-auto d-flex">
                        
                         <input type="text" class="form-control text-center " id="dt_date" name="dt_date"
                                placeholder="Enter Date" disabled value="21-12-2023"> 
                        </div>
                        <div class="form-group">
                            <label>Slip Number</label>
                            <input type="text" class="form-control" id="txt_slip_number" name="txt_slip_number"
                                placeholder="Enter Slip Number ">
                        </div>
                        <div class="d-flex">
                        <div class="form-group col-md-6">
                            <label>Vehical Number</label>
                            <input type="text" class="form-control" id="txt_vehical_number" name="txt_vehical_number"
                                placeholder="Enter Vehical Number ">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Quantity</label>
                            <input type="text" class="form-control" id="txt_quantity" name="txt_quantity"
                                placeholder="Enter Quantity ">
                        </div>
</div>


                        <button type="submit" class="btn btn-primary mr-2" id="#">Submit</button>

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