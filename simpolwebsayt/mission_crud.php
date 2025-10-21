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
				<th>Ninja ID</th>
				<th>Mission Name</th>
				<th>Status</th>
				<th>Update</th>
				<th>Delete</th>
			</tr>
		</thread>
		<tbody>
			<?php
		
			$query = "SELECT * FROM `tbmissions`";

			$result = mysqli_query($connection, $query);

			if(!$result){
				die("query Failed".mysqli_error());
			}
			else{

				while($row = mysqli_fetch_assoc($result)){
					?>

					<tr>
						<td><?php echo $row['m_id']; ?></td>
						<td><?php echo $row['ninja_id']; ?></td>
						<td><?php echo $row['mission_name']; ?></td>
						<td><?php echo $row['status']; ?></td>					
						<td><a href="updatemission.php?m_id=<?php echo $row['m_id']; ?>" class="btn btn-success">Update</a></td>
						<td><a href="deletemission.php?m_id=<?php echo $row['m_id']; ?>" class="btn btn-success">Delete</a></td>

					</tr>
					
					<?php
				}

			}
		
			?>

		</tbody>
		
	</table>

	
	



<!-- Modal -->
 <form action="addmission.php" method="POST">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Mission</h5>
      
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
          <div class="form-group">
            <label for="ninja_id">Ninja ID</label>
            <input type="text" name="ninja_id" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="mission_name">Mission Name</label>
            <input type="text" name="mission_name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" class="form-control" required>
          </div>

      </div>
	  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_mission" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>
<a href="mission.php" class="btn btn-info">View Completed Mission</a>
	<?php include('footer.php'); ?>


<!-- REQUIRED JS FILES (Put before </body> or in footer.php) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>