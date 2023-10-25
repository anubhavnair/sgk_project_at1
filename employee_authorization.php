<?php
include("./header.php");
include("./root/dbconnection.php");

$qry_get_emp_data = $db->query("Select * from employee_master") or die("");
$qry_get_module_data = $db->query("Select * from module_master") or die("");



?>
<div class="content_wrapper bg_homebefore inner-wrapper forms-sec mr-auto">
    <div class="container-fluid">
        <!-- Start Breadcrumbbar -->
        <div class="breadcrumbbar">
            <!-- Start row -->
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <h4 class="page-title">Athorization </h4>

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
                <div class="card">


                    <div class="form-group">
                        <label>Select Employee</label>
                        <select class="form-select col-md-12 custom-select " name="select_emp" id="select_emp">
                            <option value="">Select Employee</option>
                            <?php
                            while ($row = $qry_get_emp_data->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <option value="<?php echo $row['id'] ?>">
                                    <?php echo $row["emp_name"]; ?>
                                </option>
                                <?php
                            }

                            ?>

                        </select>
                    </div>

                    <div class="  form-check form-check-xl mr-auto text-left form-group" id="module_div">


                        <style>
                            .auth_ul li {
                                line-height: 30px;
                            }

                            .auth_ul label {
                                margin-left: -1rem;
                            }

                            .form-check-input {
                                margin-top: 9px;

                            }
                        </style>

                        <ul class=" auth_ul text-left">

                            <label>Select Module</label>
                            <?php

                            while ($module = $qry_get_module_data->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <li class="lh-lg">
                                    <input class="form-check-input checkbox mr-1.8" type="checkbox"
                                        value="<?php echo $module['id']; ?>" name="select_module">
                                    <span class="ml-2">
                                        <?php echo $module['module_title']; ?>
                                    </span>
                                </li>


                                <?php

                            }

                            ?>

                        </ul>


                    </div>



                    <button style="margin-top: 20px;" class="btn btn-primary mr-2" id="submit">Submit</button>


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
                })
                $("#add").on("click", function (e) {
                    window.location.replace("./employee_master.php");
                })
                $("#authorization").on("click", function (e) {
                    window.location.replace("./employee_authorization.php");
                })

                $("#submit").on("click", function () {

                    // getting the value of selected employee in the checkbox the value is employee's id whome we are getting
                    const select_emp_id = $("#select_emp").val();
                    if (select_emp_id == null || select_emp_id == "") {
                        alert("Please Select Employee !.....")
                    } else {

                        // now we are  geeting the authorization of employee which are in the checkbox 

                        var checked_values = [];
                        $("input[name='select_module']:checked").each(function () {
                            checked_values.push($(this).val());
                        });

                        if (checked_values.length == 0) {
                            alert("Please Select the modules !.....");
                        } else {

                            select_emp_id
                            const checked_values_string = checked_values.join(','); //convert the array to string saperated with , coma.


                            //   send data to another page employee_master to update the auth_ids field   
                            $.post("employee_authorization_do.php", {
                                emp_id: select_emp_id,
                                module_ids: checked_values_string
                            },
                                function (data, status) {
                                    if (status == "success") {

                                        alert("Employee Authorization has been saved !...");
                                        // alert(data);
                                    }
                                }
                            )

                        }


                    }
                })



                // loading dynamically of module list and checked there checkbox if employee has authority 

                $("#select_emp").on("change", function () {

                    const selected_id = $(this).val();

                    if (selected_id == "" || selected_id == null) {

                    } else {
                        $.post("employee_authorization_do.php", { selected_emp_id: selected_id }, function (data, status) {
                            if (status == "success") {
                                $(".auth_ul").html(data);
                            }
                        })

                    }


                });

            })

        </script>