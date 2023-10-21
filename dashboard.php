<?php

include("./header.php");
?>
    <div class="content_wrapper bg_homebefore">
      <div class="container-fluid">
     
     
     <style>
         .fDesign{
             text-align: center;
    font-size: 18px;
    font-weight: bold;
    color: #fff;
    padding-top: 12px;
    padding-bottom: 12px;
    border-radius: 10px;
    margin-bottom: 10px;
         }
     </style>
        
        <div class="content-bar"> 
          <!-- Start row -->
          <div class="row"> 
            <!-- Start col -->
            <div class="col-lg-12 col-xl-3">
              <div class="card m-b-20">
                <div class="card-body">
                  <div class="row align-items-center no-gutters">
                    <div class="col-12">
                        <a href="vehical_master.php">
                            <div class="fDesign" style="    background: #2099B6;">
                                Vehicle Detail
                            </div>  
                        </a>
                    </div>
                    
                    
                    <div class="col-12">
                        <a href="general_data_entry_master.php">
                            <div class="fDesign" style="background: #022E45;">
                                General Data Entry
                            </div>  
                        </a>
                    </div>
                    
                    <div class="col-12">
                        <a href="tank_master.php">
                            <div class="fDesign" style="    background: #F7B103;">
                               Tank Entry
                            </div>  
                        </a>
                    </div>
                    
                    
                    <div class="col-12">
                        <a href="manager_entry_master.php">
                            <div class="fDesign" style="background: #F38100;">
                                Pump Mananger Entry
                            </div>  
                        </a>
                    </div>
                    
                    
                  </div>
                </div>
              </div>
              
            </div>
            <!-- End col --> 
            <!-- Start col -->
            <div class="col-lg-12 col-xl-9">
              <div class="card m-b-30">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-6 col-lg-9">
                      <h5 class="card-title mb-0">Report</h5>
                    </div>
                    <div class="col-6 col-lg-3">
                      <select class="form-control font-12">
                        <option value="class1" selected>Last Week</option>
                        <option value="class2">Last Month</option>
                        <option value="class3">Last Year</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div id="apex-bar-chart"></div>
                </div>
              </div>
            </div>
            <!-- End col --> 
          </div>
          <!-- End row --> 
          <!-- Start row -->
          <div class="row"> 
            <!-- Start col -->
            <div class="col-lg-12 col-xl-9">
              <div class="card m-b-30">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-6 col-lg-9">
                      <h5 class="card-title mb-0">Average Monthly Report</h5>
                    </div>
                    <div class="col-6 col-lg-3">
                      <select class="form-control font-12">
                        <option value="class1" selected>Last Week</option>
                        <option value="class2">Last Month</option>
                        <option value="class3">Last Year</option>
                      </select>
                    </div>
                  </div>
                  <!--<h2>$8,66,587</h2>--->
                </div>
                <div class="card-body p-0">
                  <div id="apex-area-chart"></div>
                </div>
              </div>
            </div>
            <!-- End col --> 
            <!-- Start col -->
            <div class="col-lg-12 col-xl-3">
              <div class="card m-b-30">
                <div class="card-header text-center">
                  <h5 class="card-title mb-0">Tank Status</h5>
                </div>
                <div class="card-body text-center">
                  <div id="apex-stroked-circle-guage-chart"></div>
                </div>
                <div class="card-footer text-center">
                  <div class="row">
                    <div class="col-4 border-right px-0">
                      <p class="my-2">New</p>
                      <h5>589</h5>
                    </div>
                    <div class="col-4 border-right px-0">
                      <p class="my-2">Open Meter</p>
                      <h5>1298</h5>
                    </div>
                    <div class="col-4 px-0">
                      <p class="my-2">Close Meter</p>
                      <h5>1667</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End col --> 
          </div>
          <!-- End row --> 
          <!-- Start row -->
          
   <?php
   
   include("./footer.php");
   
   ?>