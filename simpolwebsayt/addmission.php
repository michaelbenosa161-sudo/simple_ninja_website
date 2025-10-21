<?php
	include 'dbcon.php';
	if(isset($_POST['add_mission'])){
		
		$nid = $_POST['ninja_id'];
		$mname = $_POST['mission_name'];
		$status = $_POST['status'];

		if($mname == "" || empty($mname)){
			header('location:index.php?message=yuo need to fill first name!');
		}
		else{
			 $query = "INSERT INTO `tbmissions` (`ninja_id`, `mission_name`, `status`) VALUES ('$nid', '$mname', '$status')";

            $result = mysqli_query($connection, $query);

			if(!$result){
				die("query failed".mysqli_error());
			}

			else{
				header('location:mission.php?insert_msg=succesfully added');
			}
		}
	}


?>