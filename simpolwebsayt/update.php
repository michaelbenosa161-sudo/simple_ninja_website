<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>


    <?php
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    
            //$query = "SELECT * FROM `tbinfo` WHERE 'id' = '$id'";
            $query = "SELECT * FROM `tbinfo` WHERE ninja_id = '$id'";


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
        
            if(isset($_POST['update_info'])){

                if(isset($_GET['id_new'])){
                    $idnew = $_GET['id_new'];
                }

                $fname = $_POST['f_name'];
                $lname = $_POST['l_name'];
                $age = $_POST['age'];

                //$query = "UPDATE `tbinfo` SET persnim = '$fname', lasnim = '$lname', age = 'age' WHERE id = 'idnew'";
                 $query = "UPDATE `tbinfo` SET `persnim` = '$fname', `lasnim` = '$lname', `age` = '$age' WHERE `ninja_id` = '$idnew'";

                $result = mysqli_query($connection, $query);

			    if(!$result){
				    die("query Failed".mysqli_error());
			    }
                else{
                    header('location:index.php?update_msg=updated successfully');
                }
            }
        
        ?>


        <form action="update.php?id_new=<?php echo $id; ?>" method="post">
              <div class="form-group">
                    <label for="f_name">First Name</label>
                    <input type="text" name="f_name" class="form-control" value="<?php echo $row['persnim']?>">
                  </div>
                  <div class="form-group">
                    <label for="l_name">Last Name</label>
                    <input type="text" name="l_name" class="form-control" value="<?php echo $row['lasnim']?>">
                  </div>
                  <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" name="age" class="form-control" value="<?php echo $row['age']?>">
              </div>
               <input type="submit" class="btn btn-success" name="update_info" value="UPDATE">
        </form>

<?php include('footer.php'); ?>


