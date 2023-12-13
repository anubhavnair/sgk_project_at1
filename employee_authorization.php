<?php
include("./header.php");
include("./root/dbconnection.php");

$qry_get_emp_data = $db->query("Select * from employee_master") or die("");
$qry_get_module_data = $db->query("Select * from module_master") or die("");
$qry_get_area_data = $db->query("Select * from area_master WHERE e_d_optn=1") or die("");



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
                <div>
                    <p style="text-align:center; padding-top:5px; padding-bottom:5px; background-color:lightgreen; font-weight:bold; display:none; color:black;"
                        id="success_promt">
                        Employee Authorization Added Successfully !....
                    </p>
                    <p style="text-align:center; padding-top:5px; padding-bottom:5px; background-color:lightcoral; font-weight:bold; display:none; color:black;"
                        id="select_module_promt">
                        Please Select the Modules !....
                    </p>
                    <p style="text-align:center; padding-top:5px; padding-bottom:5px; background-color:lightcoral; font-weight:bold; display:none; color:black;"
                        id="select_employee_promt">
                        Please Select Employee !....
                    </p>

                </div>
                <div class="card">


                    <div class="form-group">
                        <label>Select Employee</label>
                        <select class="col-md-12 custom-select " name="select_emp_name" id="select_emp_name">
                            <option value="0">Select Employee</option>
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

                    <div class=" auth_ul form-check form-check-xl mr-auto text-left form-group" id="module_div">


                        <ul class="text-left chk_auth_data">

                            <label>Select Module</label>
                            <?php

                            while ($module = $qry_get_module_data->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <li class="lh-lg">
                                    <input  class="form-check-input checkbox mr-1.8 chk_field_name" type="checkbox"
                                        value="<?php echo $module['id']; ?>"  id="<?php echo $module['id']; ?>" name="select_module">
                                    <span class="ml-2">
                                        <?php echo $module['module_title']; ?>
                                    </span>
                                </li>
                                <?php
                            }

                            ?>

                        </ul>
<br>
                        <ul class="text-left chk_auth_data_area">

                            <label>Select Area</label>
                            <?php

                            while ($area = $qry_get_area_data->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <li class="lh-lg">
                                    <input class="form-check-input checkbox mr-1.8" type="checkbox"
                                        value="<?php echo $area['id']; ?>"  id="<?php echo $area['id']; ?>" name="select_area">
                                    <span class="ml-2">
                                        <?php echo $area['area_name']; ?>
                                    </span>
                                </li>


                                <?php

                            }

                            ?>

                        </ul>

                    </div>
                   


                    <button style="margin-top: 20px;" type="button" class="btn btn-primary mr-2 btn_emp_submit" id="submit">Submit</button>



                </div>


            </div>



        </div>
        <?php
        include("./footer.php");
        ?>
        <script>
 $(".btn_emp_submit").on("click",function(e)
 {
	 
		if($("#select_emp_name option:selected").val()=='s_emp'){
			alert("please Select Employee");
		}
		else{
			
			if($(".chk_auth_data .auth_chk").length==0){
				alert("Please Provide Some Authentication !..");
				}
				
			else if($(".chk_auth_data_area .auth_chk").length==0){
				alert("Please select area !..");
				}
				
			else{
				var empty_chk_val="";
				for(i=0; i<$(".chk_auth_data .auth_chk").length; i++){
					empty_chk_val=empty_chk_val+$(".chk_auth_data .auth_chk:eq('"+i+"')").attr('id');
					empty_chk_val=empty_chk_val+",";}
				empty_chk_val=empty_chk_val.slice(0,-1);
				var emp_id=$("#select_emp_name option:selected").val();
				var auth_values_emp=empty_chk_val;
				//alert("emp val" +auth_values_emp);
				
				
				var empty_chk_val1="";
				
				//alert($(".chk_auth_data_area .auth_chk").length);
				
				for(j=0; j<$(".chk_auth_data_area .auth_chk").length; j++){
					empty_chk_val1=empty_chk_val1+$(".chk_auth_data_area .auth_chk:eq('"+j+"')").attr('id');
					empty_chk_val1=empty_chk_val1+",";}
				empty_chk_val1=empty_chk_val1.slice(0,-1);
				
				var auth_values_area=empty_chk_val1;
				//alert("area val "+auth_values_area);
				
				
				
				$.ajax({
						type:"POST",
						data:{emp_id:emp_id,auth_values_emp:auth_values_emp,auth_values_area:auth_values_area},
						url:"employee_authorization_do.php",
						success: function(r_data){
									alert("Successfully Added"); 
									$("#success_promt").css("display","block");
									location.reload();
									}
				}); 
			}
		}
	});
	
 
$('input:checkbox').change(function(){
		if($(this).is(":checked")){
			$(this).addClass("auth_chk"); }
		else{
			$(this).removeClass("auth_chk");}
	});


$("#select_emp_name").on("change",function(e){
		if($("#select_emp_name option:selected").val()==0){
			alert("please Select Employee");
		}
		else{
			
			var id=$("#select_emp_name option:selected").val();
			fetch_chk_values(id);}
	});



function fetch_chk_values(id){		
		if($(".chk_auth_data .auth_chk").length==0){
		}else{
			for(i=0; i<$(".chk_auth_data .auth_chk").length; i++){
				var chkAttrID=$(".chk_auth_data .auth_chk:eq("+i+")").attr('id');
				$("#"+chkAttrID).removeClass("auth_chk");
				$("#"+chkAttrID).prop('checked', false);
			}
		}		
		var emp_id=id;
		$.ajax({
			type:"POST",
			data:{emp_id:emp_id},
			url:"fetch_checked_auth_detail.php",
			dataType:"json",
			cache:false,
			success: function(r_res){
				
				var cid=r_res[0].auth_id;
				var mainauthid = cid.split(',');
				var mainlength=mainauthid.length;
				
				
				var aid=r_res[0].emp_area_id;
				var mainareauthid = aid.split(',');
				var mainarealength=mainareauthid.length;
				
				
				/*alert(r_res);
				
				alert(r_res[0].auth_id);
				alert(r_res[0].emp_area_id);*/
				
				if(mainlength==0){
					$(".chk_auth_data #"+mainauthid[i]).prop('checked', false);
					$(".chk_auth_data #"+mainauthid[i]).removeClass("auth_chk");
				}
				else{
					for(i=0; i<mainlength; i++){
						console.log(mainlength[i]);
						$(".chk_auth_data #"+mainauthid[i]).prop('checked', true);
						$(".chk_auth_data #"+mainauthid[i]).addClass("auth_chk");	
						}					
				}
				
				
				//for Area
				
				if(mainarealength==0){
					$(".chk_auth_data_area #"+mainareauthid[i]).prop('checked', false);
					$(".chk_auth_data_area #"+mainareauthid[i]).removeClass("auth_chk");
				}
				else{
					for(i=0; i<mainarealength; i++){
						console.log(mainarealength[i]);
						$(".chk_auth_data_area #"+mainareauthid[i]).prop('checked', true);
						$(".chk_auth_data_area #"+mainareauthid[i]).addClass("auth_chk");	
						}					
				}
				
				
			}
		});
	}

	

        </script>