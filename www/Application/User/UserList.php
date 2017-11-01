<?php require_once('Application/User/LoginCheck.php'); ?>

<h2>User / List</h2>

	<?php
		//execute the command
		$sSQL = "SELECT * FROM users";
		$resultset = mysqli_query($conn, $sSQL);

		if(!$resultset)
		{
			echo'Could not run query: ' . mysql_error();
			exit;
        }
    ?>
    
    <p class="text-right"><a class="btn btn-primary" href="?link=UserInsert" role="button">Insert User</a></p>

    <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>E-mail</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Username</th>
            <th>Password</th>
            <th> </th>
            <th> </th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row = mysqli_fetch_assoc($resultset))
            {
                $id = $row['id'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $email = $row['email'];
                $phone = $row['phone'];
                $address = $row['address'];
                $username = $row['username'];
                $password = $row['password'];
        ?>
            <th scope="row"><?php echo $id; ?></th>
                <td><?php echo $firstname; ?></td>
                <td><?php echo $lastname; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $phone; ?></td>
                <td><?php echo $address; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $password; ?></td>

                <td><a class="btn btn-primary" href="?link=UserEdit&id=<?php echo $id; ?>" role="button"><i class="material-icons">mode_edit</i></a></td>
                <td><a class="btn btn-danger" href="?link=UserDelete&id=<?php echo $id; ?>" role="button"><i class="material-icons">delete_forever</i></a></td>
            </tr>
        <?php } ?>
    </tbody>
    </table>
