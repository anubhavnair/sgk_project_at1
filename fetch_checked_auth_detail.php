<?php


	require("root/dbconnection.php");

	$emp_id=$_REQUEST['emp_id'];
	$q=$db->query("SELECT id,auth_id,emp_area_id FROM `employee_master` where e_d_optn=1 and id=$emp_id") or die("");
	if($q->rowCount()==0)
	{
		echo json_encode("");
	}
	else
	{
		while($res=$q->fetch(PDO::FETCH_ASSOC))
		{
			$resArray[]=$res;
		}
		echo json_encode($resArray);
	}

?>