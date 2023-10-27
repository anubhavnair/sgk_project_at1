<?php
include("./header.php");

include("./root/dbconnection.php");
$qry=$db->query("select * from employee_master") or die("");

?>
<div class="content_wrapper bg_homebefore inner-wrapper forms-sec">

<?php
if(isset($_REQUEST["res"])){

if($_REQUEST["res"]==3){
?>
<div>
        <p style="text-align:center; padding-top:5px; padding-bottom:5px; background-color:lightcoral; font-weight:bold; display:block; color:black;"
            id="delete_promt">
            Employee Deleted Successfully !....
        </p>


</div>



<?php
}


}
?>



    <div class="container-fluid">


        <!-- Start Breadcrumbbar -->
        <div class="breadcrumbbar">
            <!-- Start row -->
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <h4 class="page-title"> Manage Employee Master</h4>

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
                  
                    <div class="table-responsive-xl">
                        <table class="table responsive-table">
                            <thead>
                                <tr class="text_center">
                                    <th scope="col">SNO</th>
                                    <th scope="col">Employee Name</th>
                                  
                                    <th scope="col">Mobile Number </th>
                                    <th scope="col">Password</th>
                                    <th scope="col">status</th>

                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            $i=1;
                                while($row=$qry->fetch(PDO::FETCH_ASSOC)){

                                    ?>
                                    <tr class="text-left">
                                    <th><?php echo $i; ?></th>
                                    <td><?php echo $row["emp_name"]; ?></td>
                                
                                    <td><?php echo $row["emp_mono"]; ?></td>
                                    <td><?php echo $row["emp_password"]; ?></td>
                                    <td>
                                        <div class="d-flex"><a href="employee_master_do.php?del_id=<?php echo $row['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="20" height="16" fill="red" class="bi bi-trash3-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                </svg></a> &nbsp;&nbsp; &nbsp;&nbsp;<a href="employee_master.php?edit_id=<?php echo $row['id']; ?>"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="blue" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                                </svg></a></div>
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
$(document).ready(function(){

                $("#manage").on("click", function (e) {
                    window.location.replace("./employee_master_manage.php");
                })
                $("#add").on("click", function (e) {
                    window.location.replace("./employee_master.php");
                })
                $("#authorization").on("click", function (e) {
                    window.location.replace("./employee_authorization.php");
                })


                // deleting promt ko 1 sec bad display none krrhe ux increses 
                setTimeout(function(){

$("#delete_promt").css("display","none");


},1000);

})
         
        </script>