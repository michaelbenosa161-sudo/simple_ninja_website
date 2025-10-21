<?php
	include 'dbcon.php';
	if(isset($_POST['add_info'])){
		
		$fname = $_POST['f_name'];
		$lname = $_POST['l_name'];
		$age = $_POST['age'];

		if($fname == "" || empty($fname)){
			header('location:index.php?message=yuo need to fill first name!');
		}
		else{
			 $query = "INSERT INTO `tbinfo` (`persnim`, `lasnim`, `age`) VALUES ('$fname', '$lname', '$age')";

            $result = mysqli_query($connection, $query);

			if(!$result){
				die("query failed".mysqli_error());
			}

			else{
				header('location:index.php?insert_msg=succesfully added');
			}
		}
	}


?>