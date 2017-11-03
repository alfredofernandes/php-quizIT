<?php 
    require_once('Application/Core/Login/LoginCheck.php'); 
    require_once('Application/User/Menu.php'); 
?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Quiz Result</li>
    </ol>
</nav>
<?php 
    $userId = $_SESSION['userId'];

    if (isset($_POST['userAnswer'])) {

        $answers = $_POST['userAnswer'];
        $score = 0;
        $quiz_id;

        foreach($answers as $quest => $quest_value) 
        {
            $sSQL = "SELECT * FROM Questions WHERE id = '$quest'";
            $resultSet = mysqli_query($conn, $sSQL);

            $correct_answer = mysqli_fetch_assoc($resultSet);

            if($correct_answer)
            {
                $value = $correct_answer['correct_answer'];
                $quiz_id = $correct_answer['quiz_id'];

                if ($value == $quest_value) {
                    $score += 1;
                }
            }

        }

        $score = $score * 10;

        // Insert
        $sSQL = "INSERT INTO Results (user_id, quiz_id, score) VALUES ('$userId', '$quiz_id', '$score')";
        $isInserted = mysqli_query($conn, $sSQL);

        $message = "";
        if ($score >= 80) {
            $message = "You have successfully passed the test. You are now certified!"; 
        } else {
            $message = "Unfortunately you did not pass the test. Please try again later!";
        }
?>

    <main role="main" class="container">
        <div class="jumbotron">

            <div class="col-sm text-center">
                <h1>RESULT<h1/><br>

                <?php if ($score >= 80) { ?>
                    <h1><span class="badge badge-success">Aproved</span><h1/></br>
                <?php } else { ?>
                    <h1><span class="badge badge-danger">Failed</span><h1/></br>
                <?php } ?>

                <h1>Your score was <?php echo $score; ?>%</h1></br></br>
                <p><?php echo $message; ?></p></br></br>

                <p><a class="btn btn-primary" href="?link=UserResults" role="button">See my results</a></p>
            </div>

        </div>
    </main>

<?php } else {
    header("Location: ?link=UserHome");
} ?>
