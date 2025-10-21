<?php include('dbcon.php'); ?>



<?php
	
	if(isset($_GET['m_id'])){
		$m_id = $_GET['m_id'];
	}

	$query = "DELETE FROM `tbmissions` WHERE `m_id` = '$m_id'";

	$result = mysqli_query($connection, $query);

	if(!$result){
		die("query Failed".mysqli_error());
	}

	else{
		header('location:mission.php?delete_msg=record deleted succcessfully.');
	}

?>