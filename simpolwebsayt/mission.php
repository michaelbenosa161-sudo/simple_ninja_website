<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<div class="container mt-4">
    <h2 class="mb-4">Ninja Missions</h2>

    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Ninja ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Completed Missions </th>
            </tr>
        </thead>
        <tbody>
        <?php
            
            $query = "
                SELECT 
                    tbinfo.ninja_id, 
                    tbinfo.persnim, 
                    tbinfo.lasnim, 
                    tbinfo.age,
                    (
                        SELECT COUNT(*) 
                        FROM tbmissions 
                        WHERE tbmissions.ninja_id = tbinfo.ninja_id
                    ) AS mission_count
                FROM tbinfo
            ";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query Failed: " . mysqli_error($connection));
            }

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['ninja_id']; ?></td>
                        <td><?php echo $row['persnim']; ?></td>
                        <td><?php echo $row['lasnim']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['mission_count']; ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='5'>No records found.</td></tr>";
            }
        ?>
        </tbody>
    </table>
</div>
<a href="index.php" class="btn btn-info">Back To Home</a>
<a href="mission_crud.php" class="btn btn-info">assign Mission</a>
<?php include('footer.php'); ?>
