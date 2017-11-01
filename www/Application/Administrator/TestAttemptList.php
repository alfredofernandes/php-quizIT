<?php 
    // require_once('Application/Core/Login/LoginCheck.php'); 
    require_once('Application/Administrator/Menu.php'); 
?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?link=AdminTestAttemptList">Test Attempts</a></li>
        <li class="breadcrumb-item active" aria-current="page">List</li>
    </ol>
</nav>
<?php require_once('Application/Core/Message/DisplayError.php'); ?>
<?php
    //execute the command
    $sSQL = "SELECT * FROM Results";
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
        <th>Name</th>
        <th>E-mail</th>
        <th>Quiz</th>
        <th>Score</th>
        <th>Result</th>
    </tr>
</thead>
<tbody>
    <?php
        while($row = mysqli_fetch_assoc($resultset))
        {
            $uSQL = "SELECT * FROM Users WHERE id = '$row[user_id]'";
            $uResultSet = mysqli_query($conn, $uSQL);
            $uRow = mysqli_fetch_assoc($uResultSet);

            $qSQL = "SELECT * FROM Quizes WHERE id = '$row[quiz_id]'";
            $qResultSet = mysqli_query($conn, $qSQL);
            $qRow = mysqli_fetch_assoc($qResultSet);

            $date = $row['time'];
            $fullname = $uRow['first_name'] . ' ' . $uRow['last_name'];
            $email = $uRow['email'];
            $quizTitle = $qRow['title'];
            $score = $row['score'];
    ?>
        <tr>
            <th scope="row"><?php echo $date; ?></th>
            <td><?php echo $fullname; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $quizTitle; ?></td>
            <td><?php echo $score . "%"; ?></td>
            <td>
                <?php if($score >= 80) { ?>
                    <span class="badge badge-success">Aproved</span>
                <?php } else { ?>
                    <span class="badge badge-danger">Faild</span>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
</tbody>
</table>
