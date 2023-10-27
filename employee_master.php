<?php
include("./header.php");

include("./root/dbconnection.php");

if(isset($_REQUEST["edit_id"])){
    $edit_id=$_REQUEST["edit_id"];
    $qry = $db->query("select * from employee_master where id = $edit_id ") or die("");
    $row = $qry->fetch(PDO::FETCH_ASSOC);
}

?>
<div class="content_wrapper bg_homebefore inner-wrapper forms-sec">
<div>
        <p style="text-align:center; padding-top:5px; padding-bottom:5px; background-color:lightgreen; font-weight:bold; display:none; color:black;"
            id="success_promt">
            Employee Added Successfully !....
        </p>
        <p style="text-align:center; padding-top:5px; padding-bottom:5px; background-color:lightgreen; font-weight:bold; display:none; color:black;"
            id="update_promt">
            Employee Data Updated Successfully !....
        </p>

    </div>
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
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card p-3">


                    <?php
                    if (isset($_REQUEST["edit_id"])) {

                        ?>

                        <div class="form-group">
                            <label>Employee Name</label>
                            <input type="text" class="form-control" id="text_employee_name" name="txt_employee_name"
                                placeholder="Enter Employee Name" value = <?php echo $row["emp_name"]; ?>>
                        </div>

                        <div class="form-group">
                            <label>Employee Mobile Number</label>
                            <input type="text" class="form-control" id="text_employee_mobile_number"
                                name="txt_employee_mobile_number" placeholder="Enter Employee Mobile Number " value = <?php echo $row["emp_mono"]; ?>>
                        </div>
                        <div class="form-group">
                            <label>Employee Password</label>
                            <input type="text" class="form-control" id="text_employee_password" name="txt_employee_password"
                                placeholder="Enter Employee Password " value = <?php echo $row["emp_password"]; ?>>

                                <input type="hidden" name="text_edit_id" id="text_edit_id" value = <?php echo $edit_id ?>>
                            </div>


                        <input type="button" id="update" value="Update" class="btn btn-primary">


                        <?php


                    }else{

?>

                        <div class="form-group">
                        <label>Employee Name</label>
                        <input type="text" class="form-control" id="text_employee_name" name="txt_employee_name"
                            placeholder="Enter Employee Name">
                    </div>

                    <div class="form-group">
                        <label>Employee Mobile Number</label>
                        <input type="text" class="form-control" id="text_employee_mobile_number"
                            name="txt_employee_mobile_number" placeholder="Enter Employee Mobile Number ">
                    </div>
                    <div class="form-group">
                        <label>Employee Password</label>
                        <input type="text" class="form-control" id="text_employee_password" name="txt_employee_password"
                            placeholder="Enter Employee Password ">
                    </div>


                    <input type="button" id="submit" value="Submit" class="btn btn-primary">
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

            $(document).ready(function () {

                $("#manage").on("click", function (e) {
                    window.location.replace("./employee_master_manage.php");
                });
                $("#add").on("click", function (e) {
                    window.location.replace("./employee_master.php");
                });
                $("#authorization").on("click", function (e) {
                    window.location.replace("./employee_authorization.php");
                });

                // on click of submit button data have to save on employee_master_do.php page here ||
                //                                                                               \/
                $("#submit").on("click", function (e) {

                    const emp_name = $("#text_employee_name").val();
                    const emp_mobile = $("#text_employee_mobile_number").val();
                    const emp_password = $("#text_employee_password").val();
                    if (emp_name == "" || emp_name == null) {

                        
                        $("#text_employee_name").css("border", "1.2px solid red");
                    $("#text_employee_name").focus();
                    $("#text_employee_name").keydown(function () {
                        $("#text_employee_name").css("border", "1.2px solid skyblue");

                    });
                    }
                    else if (emp_mobile == "" || emp_mobile == null) {

                    

                        $("#text_employee_mobile_number").css("border", "1.2px solid red");
                    $("#text_employee_mobile_number").focus();
                    $("#text_employee_mobile_number").keydown(function () {
                        $("#text_employee_mobile_number").css("border", "1.2px solid skyblue");

                    });

                    }
                    else if (emp_password == "" || emp_password == null) {


                        


                        
                        $("#text_employee_password").css("border", "1.2px solid red");
                    $("#text_employee_password").focus();
                    $("#text_employee_password").keydown(function () {
                        $("#text_employee_password").css("border", "1.2px solid skyblue");

                    });
                    } else {
                        $.post("employee_master_do.php",
                            {
                                text_employee_name: emp_name,
                                text_employee_mobile_number: emp_mobile,
                                text_employee_password: emp_password
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
                // on click of update button data have to save on module_master_do.php page here ||
                //                                                                               \/
                $("#update").on("click", function (e) {
                    const updt_id = $("#text_edit_id").val();
                    const emp_name = $("#text_employee_name").val();
                    const emp_mobile = $("#text_employee_mobile_number").val();
                    const emp_password = $("#text_employee_password").val();

                    if (emp_name == "" || emp_name == null) {

                         
                        $("#text_employee_name").css("border", "1.2px solid red");
                    $("#text_employee_name").focus();
                    $("#text_employee_name").keydown(function () {
                        $("#text_employee_name").css("border", "1.2px solid skyblue");

                    });
                    }
                    else if (emp_mobile == "" || emp_mobile == null) {

                        $("#text_employee_mobile_number").css("border", "1.2px solid red");
                    $("#text_employee_mobile_number").focus();
                    $("#text_employee_mobile_number").keydown(function () {
                        $("#text_employee_mobile_number").css("border", "1.2px solid skyblue");

                    });

                    }
                    else if (emp_password == "" || emp_password == null) {


                        
                        
                        $("#text_employee_password").css("border", "1.2px solid red");
                    $("#text_employee_password").focus();
                    $("#text_employee_password").keydown(function () {
                        $("#text_employee_password").css("border", "1.2px solid skyblue");

                    });

                      
                      
                    } else {
                        $.post("employee_master_do.php",
                            {   edit_id : updt_id,
                                text_employee_name: emp_name,
                                text_employee_mobile_number: emp_mobile,
                                text_employee_password: emp_password
                            }, function (data, status) {
                                if (status == "success") {
                                    $("#update_promt").css("display", "block");

setTimeout(function () {
    $("#update_promt").css("display", "none");

}, 1000);
setTimeout(function () {
    window.location.replace("./employee_master_manage.php")
   


}, 1002);
                                }
                            }
                        );

                    }
                });




          




            })

        </script>