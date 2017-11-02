<?php 
    require_once('Application/Core/Login/LoginCheck.php'); 
    require_once('Application/User/Menu.php'); 

    if (isset($_GET['id'])) 
    {
        $id = $_GET['id'];
    }

    if (isset($_COOKIE['count'])) {
    	$count = $_COOKIE['count'];

    	if ($count < 9) {
    		$count += 1;
    		setcookie("count",$count, mktime() + 86400);
    	} 

    } else {
    	$count = 0;
    	setcookie("count",$count, mktime() + 86400);
    }

    if (!isset($_COOKIE['questions'])) 
    {
        //load data for $id
        $sSQL = "SELECT * FROM Questions WHERE quiz_id = '$id' ORDER BY RAND() LIMIT 10";
        $resultSet = mysqli_query($conn, $sSQL);

        while($row = mysqli_fetch_assoc($resultSet))
		{
		    $questions[] = $row;
		}

		setcookie("questions",serialize($questions), mktime() + 86400);

	} else {

		$questions = unserialize($_COOKIE['questions']);
	}

?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">QUIZ - <?php echo $count+1; ?>/10
        </li>
    </ol>
    
</nav>

<main role="main" class="container">
	<div class="jumbotron">
    	<div >
    		<h1><?php echo $questions[$count]['title']; ?><h1/></div>
          	<br>
          	<div> 

	          	<label>
	            	<input type="radio" name="answer1"> <?php echo $questions[$count]['answer1']; ?>
	          	</label><br>

	          	<label>
	            	<input type="radio" name="answer2"> <?php echo $questions[$count]['answer2']; ?>
	          	</label><br>

	          	<label>
	            	<input type="radio" name="answer3"> <?php echo $questions[$count]['answer3']; ?>
	          	</label><br>

	          	<label>
	            	<input type="radio" name="answer3"> <?php echo $questions[$count]['answer4']; ?>
	          	</label><br>

          	</div>
    </div>

    <p class="text-center">
    	<?php if ($count < 9) { ?>
        	<a class="btn btn-primary" href="?link=UserQuiz&id=<?php echo $id; ?>" role="button">Next</a>
        <?php } else { ?>
			<a class="btn btn-primary" href="?link=UserQuizResult" role="button">Finish</a>
		<?php } ?>
    </p>
</main>