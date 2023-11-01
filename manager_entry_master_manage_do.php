<?php

include("./root/dbconnection.php");

$limit_per_page = 20;

$page = "";
if (isset($_POST["page_no"])) {
    $page = (int) $_POST["page_no"];
} else {
    $page = 1;
}

$start_page_no = ($page - 1) * $limit_per_page;


$qry = $db->query("SELECT * FROM manager_entry_master WHERE e_d_optn = 1 LIMIT {$start_page_no}, {$limit_per_page}") or die("Query Unsuccessful.");


if ($qry->rowCount() > 0) {

    // start  data showing start
    ?>

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
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-pen-fill"
                                    viewBox="0 0 16 16">
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

    <?php




    // end  of data showing

    $records = $db->query("SELECT * from `manager_entry_master` WHERE e_d_optn = 1") or die("");

    $total_record = $records->rowCount();
    $total_pages = ceil($total_record / $limit_per_page);
    ?>

    <div id="pagination">

        <?php
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $page) {
                $class_name = "active";
            } else {
                $class_name = "";
            }
            ?>

            <a class="<?php echo $class_name; ?>" id="<?php echo $i; ?>" href=''>
                <?php echo $i; ?>
            </a>


            <?php
        }
        ?>
    </div>
    <?php
} else {
    echo "<h2>No Record Found.</h2>";
}
?>