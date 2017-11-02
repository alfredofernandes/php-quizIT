<?php 
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
        <li class="breadcrumb-item active" aria-current="page">List</li>
    </ol>
</nav>
<?php require_once('Application/Core/Message/DisplayError.php'); ?>

<?php
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

<p class="text-right"><a class="btn btn-primary" href="?link=AdminQuestionAdd&QuizId=<?php echo $quizId; ?>" role="button">Add Question</a></p>

<table class="table table-striped">
<thead>
    <tr>
        <th>Title</th>
        <th>Correct Answer</th>
        <th> </th>
    </tr>
</thead>
<tbody>
    <?php
        while($row = mysqli_fetch_assoc($resultset))
        {
            $id = $row['id'];
            $title = $row['title'];
            $correct_answer = $row['correct_answer'];
    ?>
        <tr>
            <td class="col-1"><?php echo $title; ?></td>
            <td><?php echo $correct_answer; ?></td>
            <td><a class="btn btn-primary" href="?link=AdminQuestionEdit&QuizId=<?php echo $quizId; ?>&id=<?php echo $id; ?>" role="button"><i class="material-icons">mode_edit</i></a></td>
            <td><a class="btn btn-danger" href="?link=AdminQuestionDelete&QuizId=<?php echo $quizId; ?>&id=<?php echo $id; ?>" role="button"><i class="material-icons">delete_forever</i></a></td>
        </tr>
    <?php } ?>
</tbody>
</table>
