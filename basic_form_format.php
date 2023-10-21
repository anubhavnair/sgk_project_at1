<?php
require_once("./header.php");
?>
    <!-- Content_right -->
    <div class="container_full">
      <div class="side_bar scroll_auto">

        <ul id="dc_accordion" class="sidebar-menu tree">
          <li> <a href="dashboard.html" class=" active"> <i class="ti-home"></i> <span>Dashboard</span></a> </li>
          <li> <a href="employee_master.html" class=" active"> <i class="ti-home"></i> <span>Employee Master</span></a>
          </li>
          <li> <a href="#" class=" active"> <i class="ti-home"></i> <span>Area Master</span></a> </li>

          <li> <a href="index.html" class=" active"> <i class="ti-home"></i> <span>Vehical Master</span></a> </li>
          <li> <a href="index.html" class=" active"> <i class="ti-home"></i> <span>General Data Entry Master</span></a>
          </li>
          <li> <a href="index.html" class=" active"> <i class="ti-home"></i> <span>Tank Entry Master</span></a> </li>
          <li> <a href="index.html" class=" active"> <i class="ti-home"></i> <span>Manager Entry Master</span></a> </li>







      </div>
      <div class="content_wrapper bg_homebefore inner-wrapper forms-sec">
        <div class="container-fluid">
          <!-- Start Breadcrumbbar -->
          <div class="breadcrumbbar">
            <!-- Start row -->
            <div class="row">
              <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Basic Form Name</h4>
              
              </div>
              <div class="col-md-4 col-lg-4 mr-0">
                <div class="widgetbar">
                  <button class="btn btn-primary">Add</button>
                  <button class="btn btn-primary">Manage</button>
                </div>
              </div>
            </div>
          </div>
          <!-- End Breadcrumbbar -->
          <!-- state start-->
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <h4 class="header-title">Default form Name</h4>
                <form class="forms-sample">
                  <div class="form-group">
                    <label for="exampleInputUsername1">Username</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputConfirmPassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputConfirmPassword1"
                      placeholder="Password">
                  </div>
                 
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                 
                </form>
              </div>
            </div>
<?php
require_once('./footer.php');
?>