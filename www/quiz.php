
<?php 
	include 'db_setup.php';
	include 'db_add_user.php';

	// Checking Insertion
	if(mysqli_affected_rows($connect) > 0){
		
		// C Test Choosen
		if (isset($_POST['c_test'])) {
			echo "You chose the C Test.";

		// C# Test Choosen	
		} else if (isset($_POST['c_sharp_test'])) {
			echo "You chose the C# Test.";

		}
		
	} else {
		// Error
		echo "Error: user not added<br>";
		echo mysqli_error($connect);
	}

?>