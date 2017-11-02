<?php 
    require_once('Application/Core/Login/LoginCheck.php'); 
    require_once('Application/User/Menu.php'); 
?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
</nav>
<?php require_once('Application/Core/Message/DisplayError.php'); ?>
<?php
    //execute the command
    $sSQL = "SELECT * FROM Quizes WHERE active = 1";
    $resultset = mysqli_query($conn, $sSQL);

    if(!$resultset)
    {
        echo'Could not run query: ' . mysql_error();
        exit;
    }
?>

<main role="main" class="container">
    <div class="jumbotron">
        <h1>Welcome Quiz IT</h1>
        <p class="lead">Test your knowledge! Choose one of the tests below and see what your score.</br></br>

        	<p class="text-center">
        	<?php
		        while($row = mysqli_fetch_assoc($resultset))
		        {
		            $id = $row['id'];
		            $title = $row['title'];
		    ?>

        	<a class="btn btn-primary" href="?link=UserQuiz&id=<?php echo $id; ?>" role="button"><?php echo $title; ?></a>

        	<?php } ?>
        	</p>
        </p>
    </div>
</main>
