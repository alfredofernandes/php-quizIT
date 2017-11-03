<?php 
    require_once('Application/Core/Login/LoginCheck.php'); 
	require_once('Application/User/Menu.php'); 


	// Quiz
    if (isset($_GET['id'])) 
    {
		$id = $_GET['id'];
	}

	if (!isset($_SESSION['formQuestions'])) 
	{
        //load data for $id
        $sSQL = "SELECT * FROM Questions WHERE quiz_id = '$id' ORDER BY RAND() LIMIT 10";
        $resultSet = mysqli_query($conn, $sSQL);

        while($row = mysqli_fetch_assoc($resultSet))
		{
		    $formQuestions[$id][] = $row;
		}

		$_SESSION['formQuestions'] = serialize($formQuestions);

	} else {

		$formQuestions = unserialize($_SESSION['formQuestions']);

	}
	
	
	// Pagination
	if (isset($_SESSION['current' . $id])) 
	{
		$current = $_SESSION['current' . $id];

		if (isset($_GET['page']) && ($_GET['page'] >= 0) && ($_GET['page'] <= 9)) 
		{
			$current = $_GET['page'];
			$_SESSION['current' . $id] = $current;
		}

    } else {
    	$current = 0;
		$_SESSION['current' . $id] = $current;
	}

	$prevPage = ($current > 0) ? $current - 1 : 0;
	$nextPage = ($current < 9) ? $current + 1 : 9;

	
	// Answers from user
	$postUserFields = array('id', 'quiz_id', 'correct_answer');
	$formUserData = array();

	foreach ($postUserFields as $key) 
	{
		if (isset($_POST[$key])) {
			$formUserData[$id][$key] = $_POST[$key];
		}
	}

	// save data in a session
	if (!empty($formUserData) && !isset($_SESSION['formUserData'])) {
		$_SESSION['formUserData'] = serialize($formUserData);
	}

	// read saved from session
	if (isset($_SESSION['formUserData']) && !empty($_SESSION['formUserData']) && empty($formUserData)) {
		$formUserData = unserialize($_SESSION['formUserData']);
	}
	
	echo "<pre>";
	// var_dump($_POST);
	// var_dump($formUserData);
	// var_dump($formQuestions);
	// var_dump($current);
	// var_dump($_SESSION['formUserData']);
	echo "</pre>";



	/* Cookies
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
		setcookie("quiz_id", $quiz_id, mktime() + 86400);

	} else {

		$questions = unserialize($_COOKIE['questions']);
	}
	*/
?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">QUIZ - <?php echo $current+1; ?>/10
        </li>
    </ol>
</nav>

<main role="main" class="container">
	<div class="jumbotron">
		<form class="container" id="needs-validation" method="post" novalidate>
			<div>
				<input type="hidden" name="id" value="<?php echo $formQuestions[$id][$current]['id']; ?>">
				<input type="hidden" name="quiz_id" value="<?php echo $formQuestions[$id][$current]['quiz_id']; ?>">
				<h1><?php echo $current+1; ?>) <?php echo $formQuestions[$id][$current]['title']; ?><h1/>
			</div>
          	<br>
          	<div> 
	          	<label>
	            	<input type="radio" value="a" name="correct_answer"> A) <?php echo $formQuestions[$id][$current]['answer1']; ?>
	          	</label><br>
	          	<label>
	            	<input type="radio" value="b" name="correct_answer"> B) <?php echo $formQuestions[$id][$current]['answer2']; ?>
	          	</label><br>
	          	<label>
	            	<input type="radio" value="c" name="correct_answer"> C) <?php echo $formQuestions[$id][$current]['answer3']; ?>
	          	</label><br>
	          	<label>
	            	<input type="radio" value="d" name="correct_answer"> D) <?php echo $formQuestions[$id][$current]['answer4']; ?>
	          	</label><br>
          	</div>

			<p class="text-center">
				<?php if ($current < 9) { ?>
					<input class="btn btn-primary" type="submit" onclick="formSubmit('Previous')" value="Previous">
					<input class="btn btn-primary" type="submit" onclick="formSubmit('Next')" value="Next">
				<?php } else { ?>
					<input class="btn btn-primary" type="submit" onclick="formSubmit('Finish')" value="Finish">
				<?php } ?>
			</p>
		</form>
    </div>

	<script>
		function formSubmit(page) 
		{
			var route = '';
			if (page == 'Previous') {
				$route = '?link=UserQuiz&id=<?php echo $id; ?>&page=<?php echo $prevPage; ?>';
			} else if (page == 'Next') {
				$route = '?link=UserQuiz&id=<?php echo $id; ?>&page=<?php echo $nextPage; ?>';
			} else if (page == 'Finish') {
				$route = '?link=UserQuizResult';
			}
			document.getElementById('needs-validation').action = $route;
			return;
		}
	</script>
</main>
