<?php 
    require_once('Application/Core/Login/LoginCheck.php'); 
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
        <li class="breadcrumb-item active" aria-current="page">Delete</li>
    </ol>
</nav>

<h5>Questions of the Quiz: <?php echo $quizRow['title']; ?></h5>

<?php
    $confirm = (isset($_GET['confirm'])) ? $_GET['confirm'] : null;
    $id = (isset($_GET['id'])) ? $_GET['id'] : null;

    // checks if user confirms record to delete
    if (!$confirm) { ?>

        <h4 class="text-center">Do you really want to delete?</h4>
        <br>

        <p class="text-center">
            <a class="btn btn-danger" href="?link=AdminQuestionDelete&QuizId=<?php echo $quizId; ?>&id=<?php echo $id; ?>&confirm=yes">Yes</a>
            <a class="btn btn-primary" href="?link=AdminQuestionList&QuizId=<?php echo $quizId; ?>">No</a>
        </p>

<?php } elseif ($confirm == 'yes') {
    
        //execute the command
        $sSQL = "DELETE FROM Questions WHERE id = '$id'";
        $isDeleted = mysqli_query($conn, $sSQL);

        if($isDeleted)
        {
            header("Location: ?link=AdminQuestionList&QuizId=$quizId&msg=DeleteSuccess");
        } else {
            header("Location: ?link=AdminQuestionList&QuizId=$quizId&msg=DeleteError");
        }
    }
?>
