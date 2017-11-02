<?php 
    require_once('Application/Core/Login/LoginCheck.php'); 
    require_once('Application/User/Menu.php'); 
?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Test Results</li>
    </ol>
</nav>
<?php
    $userId = $_SESSION['userId'];

    //execute the command
    $sSQL = "SELECT * FROM Results WHERE user_id = '$userId'";
    $resultset = mysqli_query($conn, $sSQL);

    if(!$resultset)
    {
        echo'Could not run query: ' . mysql_error();
        exit;
    }
?>

<table class="table table-striped">
<thead>
    <tr>
        <th>Date</th>
        <th>Quiz</th>
        <th>Score</th>
        <th>Result</th>
    </tr>
</thead>
<tbody>
    <?php
        while($row = mysqli_fetch_assoc($resultset))
        {
            $qSQL = "SELECT * FROM Quizes WHERE id = '$row[quiz_id]'";
            $qResultSet = mysqli_query($conn, $qSQL);
            $qRow = mysqli_fetch_assoc($qResultSet);

            $date = $row['time'];
            $quizTitle = $qRow['title'];
            $score = $row['score'];
    ?>
        <tr>
            <th scope="row"><?php echo $date; ?></th>
            <td><?php echo $quizTitle; ?></td>
            <td><?php echo $score . "%"; ?></td>
            <td>
                <?php if($score >= 80) { ?>
                    <span class="badge badge-success">Aproved</span>
                <?php } else { ?>
                    <span class="badge badge-danger">Failed</span>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
</tbody>
</table>
