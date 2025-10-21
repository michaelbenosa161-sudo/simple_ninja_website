<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>
	<div class="box1">
		<h2>All NINJAS</h2>
		<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add Record

    </button>
	

	</div>



	<table class="table table-hover table-bordered table-striped">
		<thread>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Age</th>
				<th>Update</th>
				<th>Delete</th>
			</tr>
		</thread>
		<tbody>
			<?php
		
			$query = "SELECT * FROM `tbinfo`";

			$result = mysqli_query($connection, $query);

			if(!$result){
				die("query Failed".mysqli_error());
			}
			else{

				while($row = mysqli_fetch_assoc($result)){
					?>

					<tr>
						<td><?php echo $row['ninja_id']; ?></td>
						<td><?php echo $row['persnim']; ?></td>
						<td><?php echo $row['lasnim']; ?></td>
						<td><?php echo $row['age']; ?></td>
						<td><a href="update.php?id=<?php echo $row['ninja_id']; ?>" class="btn btn-success">Update</a></td>
						<td><a href="delete.php?id=<?php echo $row['ninja_id']; ?>" class="btn btn-success">Delete</a></td>

					</tr>
					
					<?php
				}

			}
		
			?>

		</tbody>
		
	</table>

	
	<?php
	
		if(isset($_GET['message'])){
			echo "<h6>".$_GET['message']."</h6>";
		}
	
	?>
	<?php
	
		if(isset($_GET['insert_msg'])){
			echo "<h6>".$_GET['insert_msg']."</h6>";
		}
	
	?>

	<?php
	
		if(isset($_GET['delete_msg'])){
			echo "<h6>".$_GET['delete_msg']."</h6>";
		}
	
	?>



<!-- Modal -->
 <form action="add.php" method="POST">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Record</h5>
      
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
          <div class="form-group">
            <label for="f_name">First Name</label>
            <input type="text" name="f_name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="l_name">Last Name</label>
            <input type="text" name="l_name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" class="form-control" required>
          </div>

      </div>
	  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_info" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>
<a href="mission.php" class="btn btn-info">Missions Completed</a>
	<?php include('footer.php'); ?>


<!-- REQUIRED JS FILES (Put before </body> or in footer.php) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>