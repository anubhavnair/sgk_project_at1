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
                    <h4 class="page-title">Athorization</h4>

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
                    <h4 class="header-title"> Select Authorization</h4>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label>Select Employee</label>
                            <select class="form-select col-md-12 custom-select">
                                <option value="option1">Select Employee</option>
                                <option value="option1">Employee-1 Name Here</option>
                                <option value="option2">Employee-2 Name Here</option>
                                <option value="option3">Employe-3 Name Here</option>
                            </select>
                        </div>

                        <div class="form-group ml-4">

                            <label>Select Module</label><br>
                            <input class="form-check-input checkbox " type="checkbox" id="exampleCheckbox"><span class="ml-2">Module-1 Name Here</span><br>
                            <input class="form-check-input checkbox " type="checkbox" id="exampleCheckbox"><span class="ml-2">Module-1 Name Here</span><br>
                            <input class="form-check-input checkbox" type="checkbox" id="exampleCheckbox"><span class="ml-2">Module-1 Name Here</span><br>
                            <input class="form-check-input checkbox " type="checkbox" id="exampleCheckbox"><span class="ml-2">Module-1 Name Here</span><br>

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