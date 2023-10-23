<?php

include("./header.php");
include("./root/dbconnection.php");



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
                    <?php

                    if (isset($_REQUEST["edit_id"])) {


                        $edit_id= $_REQUEST["edit_id"];
                        $qry = $db->query("select * from manager_entry_master where id = $edit_id") or die("");
                        $row = $qry->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <form class="forms-sample">

                            <input type="date" class="form-control text-center form-group" id="dt_date" name="dt_date"
                                placeholder="Enter Date" value=<?php echo $row["select_date"]; ?>>

                            <div class="form-group text-left">
                                <label>Slip Number</label>
                                <input type="text" class="form-control" id="text_slip_number" name="txt_slip_number"
                                    placeholder="Enter Slip Number" value=<?php echo $row["slip_no"]; ?>>
                            </div>

                            <div class="d-flex justify-content-between row">

                                <div class="col-6">

                                    <label>Vehical Number</label>
                                    <input type="text" class="form-control" id="text_vehical_number"
                                        name="txt_vehical_number" placeholder="Enter Vehical Number " style="width:125%;" value=<?php echo $row["vehical_no"]; ?>>
                                </div>
                                <div class=" col-6">

                                    <label>Quantity</label>
                                    <input type="text" class="form-control" id="text_quantity" name="txt_quantity"
                                        placeholder="Enter Quantity "  value=<?php echo $row["total_qty"]; ?>>

                                        <input type="hidden" name="text_edit_id" id="text_edit_id" value=<?php echo $row["id"]; ?>>
                                </div>

                            </div>

                            <input type="button" name="update" id="update" value="Update" class="btn btn-primary mt-4">
                        </form>





                        <?php
                    }else{
?>

<form class="forms-sample">

<input type="date" class="form-control text-center form-group" id="dt_date" name="dt_date"
     value='<?php echo date("Y-m-d") ?>'>

<div class="form-group text-left">
    <label>Slip Number</label>
    <input type="text" class="form-control" id="text_slip_number" name="txt_slip_number"
        placeholder="Enter Slip Number ">
</div>

<div class="d-flex justify-content-between row">

    <div class="col-6">

        <label>Vehical Number</label>
        <input type="text" class="form-control" id="text_vehical_number"
            name="txt_vehical_number" placeholder="Enter Vehical Number " style="width:125%;">
    </div>
    <div class=" col-6">

        <label>Quantity</label>
        <input type="text" class="form-control" id="text_quantity" name="txt_quantity"
            placeholder="Enter Quantity ">
    </div>

</div>

<input type="button" class="btn btn-primary mt-4" value="Submit" id="submit">
</form>


<?php
                    }
                    ?>



                   
                </div>
            </div>
        </div>
    </div>

    <?php
    include("./footer.php");
    ?>

    <script>


        $(document).ready(function () {

            $("#manage").on("click", function (e) {
                window.location.replace("./manager_entry_master_manage.php");
            });
            $("#add").on("click", function (e) {
                window.location.replace("./manager_entry_master.php");
            });



            // on click of submit button data have to save on  manager_entry_master_do.php page here ||
            //                                                                               \/
            $("#submit").on("click", function (e) {




                const date = $("#dt_date").val();

                const vehical_number = $("#text_vehical_number").val();

                const slip_number = $("#text_slip_number").val();

                const quantity = $("#text_quantity ").val();


                if (date == "" || date == null) {

                    alert("select Date")
                    $("#dt_date").focus();
                } else if (slip_number == "" || slip_number == null) {


                    $("#text_slip_number").focus();
                } else if (vehical_number == "" || vehical_number == null) {

                    $("#text_vehical_number").focus();

                } else if (quantity == "" || quantity == null) {
                    $("#text_quantity").focus();
                }
                else {
                    $.post("manager_entry_master_do.php",
                        {
                            dt_date: date,
                            text_slip_number: slip_number,
                            text_vehical_number: vehical_number,
                            text_quantity: quantity
                        }, function (data, status) {
                            if (status == "success") {
                                alert("Entry Added Successfully !....");
                                window.location.replace("./manager_entry_master.php");
                            }
                        }
                    );

                }
            });



            //update button click perform

                                                                         
            $("#update").on("click", function (e) {



const updt_id = $("#text_edit_id").val();
const date = $("#dt_date").val();

const vehical_number = $("#text_vehical_number").val();

const slip_number = $("#text_slip_number").val();

const quantity = $("#text_quantity ").val();


if (date == "" || date == null) {

    alert("select Date")
    $("#dt_date").focus();
} else if (slip_number == "" || slip_number == null) {


    $("#text_slip_number").focus();
} else if (vehical_number == "" || vehical_number == null) {

    $("#text_vehical_number").focus();

} else if (quantity == "" || quantity == null) {
    $("#text_quantity").focus();
}
else {
    $.post("manager_entry_master_do.php",
        {   edit_id:updt_id,
            dt_date: date,
            text_slip_number: slip_number,
            text_vehical_number: vehical_number,
            text_quantity: quantity
        }, function (data, status) {
            if (status == "success") {
                alert("Entry Updated Successfully !....");
                window.location.replace("./manager_entry_master_manage.php");
            }
        }
    );

}
});





        });


    </script>