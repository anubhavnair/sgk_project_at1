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
                    <h4 class="page-title">Employee Master</h4>

                </div>
                <div class="col-md-4 col-lg-4 mr-0">
                    <div class="widgetbar">
                        <button class="btn btn-primary" id="add">Add</button>
                        <button class="btn btn-primary" id="manage">Manage</button>
                        <button class="btn btn-primary" id="authorization">Authorization</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbbar -->
        <!-- state start-->
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  
                    <form class="forms-sample">
                        <div class="form-group">
                            <label>Employee Name</label>
                            <input type="text" class="form-control" id="txt_employee_name" name="txt_employee_name"
                                placeholder="Enter Employee Name">
                        </div>
                 
                        <div class="form-group">
                            <label>Employee Mobile Number</label>
                            <input type="text" class="form-control" id="txt_employee_mobile_number"
                                name="txt_employee_mobile_number" placeholder="Enter Employee Mobile Number ">
                        </div>
                        <div class="form-group">
                            <label>Employee Password</label>
                            <input type="text" class="form-control" id="txt_employee_password"
                                name="txt_employee_password" placeholder="Enter Employee Password ">
                        </div>


                        <button type="submit" class="btn btn-primary mr-2" id="">Submit</button>

                    </form>
                </div>
            </div>
        </div>
        <?php
        include("./footer.php");
        ?>
        <script>


            $("#manage").on("click", function (e) {
                window.location.replace("./employee_master_manage.php");
            })
            $("#add").on("click", function (e) {
                window.location.replace("./employee_master.php");
            })
            $("#authorization").on("click", function (e) {
                window.location.replace("./employee_authorization.php");
            })
        </script>