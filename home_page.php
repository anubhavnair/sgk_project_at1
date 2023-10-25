<?php
if (!isset($_COOKIE["emp_id"]) && !isset($_COOKIE["emp_name"])) {
    ?>

    <script>
        window.location.replace("index.php");
    </script>

    <?php

}

include("./header.php");
?>
<div class="container d-flex align-content-center justify-content-center" style="min-height:80vh;">
    <div class="row  d-flex justify-content-center align-item-center">
        <div class="col text-center col-md-12 col-lg-12 align-self-center " style="border-radius:10%;">

            <h2 class="col-md-12">Welcome to SGM Web Portal
                <b class="text-primary">
                    <?php echo $_COOKIE["emp_name"] ?>!
                </b>
            </h2>
            <hr />
        </div>

        <div class="col-md-12 text-center d-flex justify-content-center align-item-center align-content-center lh-80vh">
            <div class="wlcmimg ">

                <img src="./images/welcom_image.png" class="img text-center ml-auto" alt="Welcome imge" loading="lazy"
                    style="width:50%">
            </div>
        </div>
    </div>
</div>

<?php

include("./footer.php");

?>