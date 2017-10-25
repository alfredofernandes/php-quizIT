
<?php 
	include 'db_setup.php';
	include 'db_add_user.php';

	// Checking Insertion
	if(mysqli_affected_rows($connect) === 0){
		echo "<p>User Added</p>";
		echo "<a href=\"index.php\">Go Back</a>";
	} else {
		echo "Error: user not added<br />";
		echo mysqli_error ($connect);
	}

?>