<?php 
    require_once('Application/Core/Login/LoginCheck.php'); 
	require_once('Application/User/Menu.php'); 

	// Quiz
    if (isset($_GET['id'])) 
    {
		$id = $_GET['id'];
	}
?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">QUIZ</li>
    </ol>
</nav>

<?php 
	//load data for $id
	$sSQL = "SELECT * FROM Questions WHERE quiz_id = '$id' ORDER BY RAND() LIMIT 10";
	$resultSet = mysqli_query($conn, $sSQL);

	while($row = mysqli_fetch_assoc($resultSet)) {
		$questionsArray[] = $row;
	}
?>

<main role="main" class="container">
	<div class="jumbotron">
		<form class="container" id="needs-validation" action="?link=UserQuizResult" method="post" novalidate>

			<div class="tab-content" id="tabContent">
				<?php foreach($questionsArray as $key => $value) { $key++; ?>
					<div class="tab-pane fade show <?php echo ($key==1) ? ' active' : ''; ?>" id="myTab-<?php echo $key; ?>" role="tabpanel" aria-labelledby="myContent-<?php echo $key; ?>">
						
						<div>
							<h1><?php echo $key; ?>) <?php echo $value['title']; ?><h1/>
						</div>
						<br>
						<div> 
							<label>
								<input type="radio" value="a" name="userAnswer[<?php echo $value['id']; ?>]"> A) <?php echo $value['answer1']; ?>
							</label><br>
							<label>
								<input type="radio" value="b" name="userAnswer[<?php echo $value['id']; ?>]"> B) <?php echo $value['answer2']; ?>
							</label><br>
								<label>
							<input type="radio" value="c" name="userAnswer[<?php echo $value['id']; ?>]"> C) <?php echo $value['answer3']; ?>
							</label><br>
								<label>
							<input type="radio" value="d" name="userAnswer[<?php echo $value['id']; ?>]"> D) <?php echo $value['answer4']; ?>
							</label><br>
						</div>
						
						<br>
						<?php if ($key == 10) { ?>
							<p class="text-center">
								<input class="btn btn-primary" type="submit" name="submit" value="Finish">
							</p>
						<?php } ?>
					</div>

				<?php } ?>
			</div>

			<br>
			<ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
				<?php foreach($questionsArray as $key => $value) { $key++; ?>
					<li class="nav-item">
						<a class="nav-link<?php echo ($key==1) ? ' active' : ''; ?>" id="myContent-<?php echo $key; ?>" data-toggle="pill" href="#myTab-<?php echo $key; ?>" role="tab" aria-controls="myTab-<?php echo $key; ?>" aria-selected="<?php echo ($key==1) ? 'true' : 'false'; ?>"><?php echo $key; ?></a>
					</li>
				<?php } ?>
			</ul>
		</form>
    </div>
</main>

<script>
	$('#myTab a').on('click', function (e) {
		e.preventDefault()
		$(this).tab('show')
	})
</script>
