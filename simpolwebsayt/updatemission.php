<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>


    <?php
    
    if(isset($_GET['m_id'])){
        $m_id = $_GET['m_id'];
    
            //$query = "SELECT * FROM `tbinfo` WHERE 'id' = '$id'";
            $query = "SELECT * FROM `tbmissions` WHERE m_id = '$m_id'";


			$result = mysqli_query($connection, $query);

			if(!$result){
				die("query Failed".mysqli_error());
			}
			else{

				$row = mysqli_fetch_assoc($result);

               
            }
    }
    ?>


        <?php
        
            if(isset($_POST['update_mission'])){

                if(isset($_GET['id_new'])){
                    $m_idnew = $_GET['id_new'];
                }

                $ninja_id = $_POST['ninja_id'];
                $mission_name = $_POST['mission_name'];
                $status = $_POST['status'];


                 $query = "UPDATE `tbmissions` SET `ninja_id` = '$ninja_id', `mission_name` = '$mission_name', `status` = '$status' WHERE `m_id` = '$m_idnew'";

                $result = mysqli_query($connection, $query);

			    if(!$result){
				    die("query Failed".mysqli_error());
			    }
                else{
                    header('location:mission_crud.php?update_msg=updated successfully');
                }
            }
        
        ?>


        <form action="updatemission.php?id_new=<?php echo $m_id; ?>" method="post">
              <div class="form-group">
                    <label for="ninja_id">Ninja Name</label>
                    <input type="text" name="ninja_id" class="form-control" value="<?php echo $row['ninja_id']?>">
                  </div>
                  <div class="form-group">
                    <label for="mission_name">Mission Name</label>
                    <input type="text" name="mission_name" class="form-control" value="<?php echo $row['mission_name']?>">
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" name="status" class="form-control" value="<?php echo $row['status']?>">
              </div>
               <input type="submit" class="btn btn-success" name="update_mission" value="UPDATE">
        </form>

<?php include('footer.php'); ?>


