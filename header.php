<!doctype html>
<html>


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title></title>
  <!-- Plugins CSS -->
  <link href="css/plugins.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/style.css" rel="stylesheet">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

  <!-- jquery cdn  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



</head>

<body>
  <!-- Pre Loader -->
  <div class="wrapper">
    <!-- header -->
    <div class="header-bg">
      <header class="main-header">
        <div class="container_header phone_view border_top_bott">
          <div class="row">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
              <div class="menu-icon"> <a href="javascript:void(0)" class="menu-toggler sidebar-toggler"></a> </div>
              <div class="logo d-flex align-items-center justify-content-center"> <a href="javascript:void(0)"> <strong
                    class="logo_icon"> <img src="images/small-logo.png" alt="" style="    width: 95px;"> </strong> <span
                    class="logo-default">
                    <img src="images/small-logo.png" alt="" style="    width: 95px;"> </span> </a> </div>
              <div class="right_detail">
                <div class="row d-flex align-items-center justify-content-end">
                  <div class="col-xl-12 col-12 d-flex justify-content-end">
                    <div class="right_bar_top d-flex align-items-center">

                      <!-- notification_Start -->
                      <div class="dropdown dropdown-notification" style="display:none;"> <a href="javascript:void(0)"
                          class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"
                          aria-expanded="false">
                          <i class="fa fa-bell"></i> <span class="badge_coun"> 6 </span> </a>
                        <ul class="dropdown-menu scroll_auto height_fixed">
                          <li class="bigger">
                            <h3><span class="bold">Notifications</span></h3>
                            <span class="notification-label">New 6</span>
                          </li>
                          <li>
                            <ul class="dropdown-menu-list">
                              <li> <a href="javascript:void(0)"> <span class="time">just now</span> <span
                                    class="details"> <span class="notification-icon deepPink-bgcolor"> <i
                                        class="fa fa-check"></i> </span> Notification Title Goes Here !... </span> </a>
                              </li>
                              <li> <a href="javascript:void(0)"> <span class="time">just now</span> <span
                                    class="details"> <span class="notification-icon deepPink-bgcolor"> <i
                                        class="fa fa-check"></i> </span> Notification Title Goes Here !... </span> </a>
                              </li>

                              <li> <a href="javascript:void(0)"> <span class="time">just now</span> <span
                                    class="details"> <span class="notification-icon deepPink-bgcolor"> <i
                                        class="fa fa-check"></i> </span> Notification Title Goes Here !... </span> </a>
                              </li>

                              <li> <a href="javascript:void(0)"> <span class="time">just now</span> <span
                                    class="details"> <span class="notification-icon deepPink-bgcolor"> <i
                                        class="fa fa-check"></i> </span> Notification Title Goes Here !... </span> </a>
                              </li>

                              <li> <a href="javascript:void(0)"> <span class="time">just now</span> <span
                                    class="details"> <span class="notification-icon deepPink-bgcolor"> <i
                                        class="fa fa-check"></i> </span> Notification Title Goes Here !... </span> </a>
                              </li>





                            </ul>
                          </li>
                        </ul>
                      </div>
                      <!-- notification_End -->

                      <!-- Dropdown_User -->
                      <div class="dropdown dropdown-user"> <a href="javascript:void(0)" class="dropdown-toggle"
                          data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="true">
                          <img class="img-circle pro_pic" src="images/user3.png" alt=""> </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                          <li>
                            <div class="user-panel">
                              <div class="user_image"> <img src="images/user3.png" class="img-circle mCS_img_loaded"
                                  alt=""> </div>
                              <div class="info">
                                <p>
                                  <?php echo $_COOKIE["emp_name"]; ?>
                                </p>
                                <a href="#">Mo.No :
                                  <?php echo $_COOKIE["emp_mobile"]; ?>
                                </a>
                              </div>
                            </div>
                          </li>

                          <li> <a href="#"> <i class="icon-settings"></i> Settings </a> </li>
                          <li> <a href="logout_do.php"> <i class="icon-logout"></i> Log Out </a> </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
    </div>
    <!-- header_End -->
    <!-- Content_right -->
    <div class="container_full">
      <div class="side_bar scroll_auto">

        <ul id="dc_accordion" class="sidebar-menu tree">
          <!-- dynamic module as per employee authentication here  -->

          <?php
          include("./root/dbconnection.php");
          $emp_id = $_COOKIE["emp_id"];

          // getting employees data from employee_master  it is giving only one row of result set 
          $qry = $db->query("select auth_id from employee_master where id = $emp_id ") or die("");
          $emp_row = $qry->fetch(PDO::FETCH_ASSOC);


          // storing the value of auth_ids of particular user into a variable 
          $auth_id_str = $emp_row["auth_id"];


          // getting the modules jisko user access kar sakta hai  from the modules_master
          $get_modules = $db->query("SELECT * FROM module_master WHERE id IN (" . $auth_id_str . ")") or die("");


          // printing the dynamically modules to sidebar 
          while ($row_modules = $get_modules->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <li> <a href="<?php echo $row_modules['module_url'] ?>" class=" active"> <i class="ti-home"></i>
                <span>
                  <?php echo $row_modules["module_title"] ?>
                </span></a> </li>
            <?php

          }
          ?>


          <li> <a href="logout_do.php" class=" active"> <i class="ti-home"></i> <span>Log Out</span></a> </li>


      </div>