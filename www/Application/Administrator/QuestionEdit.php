<?php 
    // require_once('Application/Core/Login/LoginCheck.php'); 
    require_once('Application/Administrator/Menu.php'); 

    if (isset($_GET['QuizId'])) 
    {
        $quiz_id = $_GET['QuizId'];
    }

    // load data quiz
    $sSQL = "SELECT * FROM Quizes WHERE id = '$quiz_id'";
    $resultSet = mysqli_query($conn, $sSQL);
    $quizRow = mysqli_fetch_assoc($resultSet);
    $quizId = $quizRow['id'];
?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?link=AdminQuestionList&QuizId=<?php echo $quizId; ?>">Questions</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
<?php require_once('Application/Core/Message/DisplayError.php'); ?>

<?php
    if (isset($_GET['id'])) 
    {
        $id = $_GET['id'];
    }

    // load data questions
    $sSQL = "SELECT * FROM Questions WHERE quiz_id = '$quizId'";
    $resultset = mysqli_query($conn, $sSQL);

    if(!$resultset)
    {
        echo'Could not run query: ' . mysql_error();
        exit;
    }
?>

<h5>Questions of the Quiz: <?php echo $quizRow['title']; ?></h5>
<br>

<?php
    if (!isset($_POST['submit'])) 
    {
        //load data for $id
        $sSQL = "SELECT * FROM Questions WHERE id = '$id'";
        $resultSet = mysqli_query($conn, $sSQL);
        $row = mysqli_fetch_assoc($resultSet);
?>
    <form class="container" id="needs-validation" method="post" action="?link=AdminQuestionEdit&QuizId=<?php echo $quizId; ?>" novalidate>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="quiz_id" value="<?php echo $quizId; ?>"><br>
        <div class="row">
            <div class="col-md-8 mb-3">
            <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>" placeholder="Title" required>
                <div class="invalid-feedback">
                    Provide question title.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mb-3">
            <label for="title">Answer A</label>
                <input type="text" class="form-control" id="answer1" name="answer1" value="<?php echo $row['answer1']; ?>" placeholder="Enter the answer" required>
                <div class="invalid-feedback">
                    Provide answer A.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mb-3">
            <label for="title">Answer B</label>
                <input type="text" class="form-control" id="answer2" name="answer2" value="<?php echo $row['answer2']; ?>" placeholder="Enter the answer" required>
                <div class="invalid-feedback">
                    Provide answer B.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mb-3">
            <label for="title">Answer C</label>
                <input type="text" class="form-control" id="answer3" name="answer3" value="<?php echo $row['answer3']; ?>" placeholder="Enter the answer" required>
                <div class="invalid-feedback">
                    Provide answer C.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mb-3">
            <label for="title">Answer D</label>
                <input type="text" class="form-control" id="answer4" name="answer4" value="<?php echo $row['answer4']; ?>" placeholder="Enter the answer" required>
                <div class="invalid-feedback">
                    Provide answer D.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
            <label for="title">Correct Answer</label>
                <input type="text" class="form-control" id="correct_answer" name="correct_answer" value="<?php echo $row['correct_answer']; ?>" placeholder="Correct answer" required>
                <div class="invalid-feedback">
                    Provide correct answer.
                </div>
            </div>
        </div>

        <p class="text-center">
            <input class="btn btn-primary" type="submit" name="submit" value="Update">
            <a class="btn btn-secondary" href="?link=AdminQuestionList&QuizId=<?php echo $quizId; ?>" role="button">Back</a>
        </p>
    </form>

<?php } else { 

        $id = $_POST['id'];
        $title = $_POST['title'];
        $answer1 = $_POST['answer1'];
        $answer2 = $_POST['answer2'];
        $answer3 = $_POST['answer3'];
        $answer4 = $_POST['answer4'];
        $correct_answer = $_POST['correct_answer'];

        //inset
        $sSQL = "UPDATE Questions SET title = '$title', answer1 = '$answer1', answer2 = '$answer2', answer3 = '$answer3', answer4 = '$answer4', correct_answer = '$correct_answer' WHERE id = '$id'";
        $isInserted = mysqli_query($conn, $sSQL);

        if($isInserted)
        {
            header("Location: ?link=AdminQuestionList&QuizId=$quizId&msg=EditSuccess");
        } else {
            header("Location: ?link=AdminQuestionList&QuizId=$quizId&msg=EditError");
        }
    } ?>
