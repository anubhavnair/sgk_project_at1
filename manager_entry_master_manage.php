<?php

include("./header.php");
include("./root/dbconnection.php");


if (isset($_REQUEST["filter_by_date"])) {

    $filter_by_date = $_REQUEST["filter_by_date"];

    $qry = $db->query("SELECT * FROM manager_entry_master WHERE select_date = '$filter_by_date'") or die("");

} else {

    $qry = $db->query("select * from manager_entry_master") or die("");
}






?>
<div class="content_wrapper bg_homebefore inner-wrapper forms-sec">
    <div class="container-fluid">




        <!-- filter section start  -->

        <span id="filter_icon"><svg width="30" height="30" fill="none" stroke="#0d02b1" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M22 3H2l8 9.46V19l4 2v-8.54L22 3z"></path>
            </svg>Click to Filter</span>
        <div class="row filter_section" style="display:none;">
            <div class="col-md-12">
                <label>Enter Date</label>
                <input type="date" name='dt_start_date' id='dt_start_date' class="form-control">

            </div>
            <button id="search" class="btn btn-primary ml-auto mr-auto mt-1">Search</button>
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

                    <div class="table-responsive-xl">
                        <table class="table text-center ">
                            <thead>
                                <tr>
                                    <th scope="col">SNO</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Slip Number</th>
                                    <th scope="col">Vehical Number</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">status</th>

                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                $i = 1;
                                while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $i; ?>
                                        </th>
                                        <td>
                                            <?php echo $row["select_date"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $row["slip_no"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $row["vehical_no"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $row["total_qty"]; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center "><a
                                                    href="manager_entry_master_do.php?del_id=<?php echo $row['id'] ?>"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red"
                                                        class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                    </svg></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                                                    href="manager_entry_master.php?edit_id=<?php echo $row['id']; ?>"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="blue" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                                    </svg></a>
                                            </div>
                                        </td>

                                    </tr>


                                    <?php
                                    $i++;
                                }
                                ?>





                            </tbody>
                        </table>
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

                        // $.post("manager_entry_master_manager.php", { filter_by_date: filter_date }, function (data, status) { }) this is working but piche jakar ye vps aja rha isliye reflection dikh nahi rha hai so we have to use another technique

                        window.location.replace("manager_entry_master_manage.php?filter_by_date=" + filter_date);
                    }

                });



            })


        </script>