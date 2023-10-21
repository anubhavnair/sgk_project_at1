<?php
require_once('./header.php');
?>
<div class="content_wrapper bg_homebefore inner-wrapper forms-sec">
    <div class="container-fluid">


        <!-- Start Breadcrumbbar -->
        <div class="breadcrumbbar">
            <!-- Start row -->
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <h4 class="page-title">Vehical Master</h4>

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
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">

                    <form class="forms-sample">
                        <div class="table-responsive-xl">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr No.</th>
                                        <th scope="col">Area</th>

                                    </tr>
                                </thead>
                                <tbody>



                                    <tr>
                                        <td>1</td>
                                        <td>Area-1 Name Here</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Area-2 Name Here</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Area-3 Name Here</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Area-4 Name Here</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Area-5 Name Here</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>






                        <button type="button" class="btn btn-primary mr-2" id="submitBtn">Submit</button>

                    </form>
                </div>
            </div>
        </div>

        <?php
        require_once('./footer.php');
        ?>
        <script>

            $("#manage").on("click", function (e) {
                window.location.replace("./area_master_manage.php");
            })
            $("#add").on("click", function (e) {
                window.location.replace("./area_master.php");
            })
            $("#filter_icon").on("click", function (e) {

                $(".filter_section").slideToggle();

            });

        </script>