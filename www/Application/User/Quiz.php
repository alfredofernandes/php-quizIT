<?php 
    require_once('Application/Core/Login/LoginCheck.php'); 
    require_once('Application/User/Menu.php'); 

    if (isset($_GET['id'])) 
    {
		$id = $_GET['id'];
	}
	
	if (isset($_COOKIE['current'])) 
	{
		$current = $_COOKIE['current'];

		if (isset($_GET['page']) && ($_GET['page'] >= 0) && ($_GET['page'] <= 9)) 
		{
			$current = $_GET['page'];
			setcookie("current", $current, mktime() + 86400);
		}

    } else {
    	$current = 0;
    	setcookie("current", $current, mktime() + 86400);
	}

	$prevPage = ($current > 0) ? $current - 1 : 0;
	$nextPage = ($current < 9) ? $current + 1 : 9;
	
    if (!isset($_COOKIE['questions'])) 
    {
        //load data for $id
        $sSQL = "SELECT * FROM Questions WHERE quiz_id = '$id' ORDER BY RAND() LIMIT 10";
        $resultSet = mysqli_query($conn, $sSQL);

        while($row = mysqli_fetch_assoc($resultSet))
		{
		    $questions[] = $row;
		}

		setcookie("questions", serialize($questions), mktime() + 86400);

	} else {

		$questions = unserialize($_COOKIE['questions']);
	}
?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">QUIZ - <?php echo $current+1; ?>/10
        </li>
    </ol>
</nav>

<main role="main" class="container">
	<div class="jumbotron">
    	<div >
    		<h1><?php echo $current+1; ?>) <?php echo $questions[$current]['title']; ?><h1/></div>
          	<br>
          	<div> 
	          	<label>
	            	<input type="radio" name="answer1"> A) <?php echo $questions[$current]['answer1']; ?>
	          	</label><br>
	          	<label>
	            	<input type="radio" name="answer2"> B) <?php echo $questions[$current]['answer2']; ?>
	          	</label><br>
	          	<label>
	            	<input type="radio" name="answer3"> C) <?php echo $questions[$current]['answer3']; ?>
	          	</label><br>
	          	<label>
	            	<input type="radio" name="answer3"> D) <?php echo $questions[$current]['answer4']; ?>
	          	</label><br>
          	</div>
    </div>

    <p class="text-center">
    	<?php if ($current < 9) { ?>
        	<a class="btn btn-primary" href="?link=UserQuiz&id=<?php echo $id; ?>&page=<?php echo $prevPage; ?>" role="button">Previous</a>
        	<a class="btn btn-primary" href="?link=UserQuiz&id=<?php echo $id; ?>&page=<?php echo $nextPage; ?>" role="button">Next</a>
        <?php } else { ?>
			<a class="btn btn-primary" href="?link=UserQuizResult" role="button">Finish</a>
		<?php } ?>
    </p>
</main>
