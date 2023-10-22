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
               
                    <form class="forms-sample">
                        <div class="form-group">
                            <label>Module Title</label>
                            <input type="text" class="form-control" id="txt_employee_name" name="txt_module_title"
                                placeholder="Enter Module Title">
                        </div>
                 
                        <div class="form-group">
                            <label>Short Order</label>
                            <input type="text" class="form-control" id="txt_short_order"
                                name="txt_short_order" placeholder="Enter Short Order ">
                        </div>
                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" class="form-control" id="txt_url"
                                name="txt_url" placeholder="Enter Url ">
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
                window.location.replace("./module_master_manage");
            })
            $("#add").on("click", function (e) {
                window.location.replace("./module_master.php");
            })
            $("#authorization").on("click", function (e) {
                window.location.replace("./employee_authorization.php");
            })
        </script>