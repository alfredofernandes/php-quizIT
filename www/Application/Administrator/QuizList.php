<?php 
    require_once('Application/Core/Login/LoginCheck.php'); 
    require_once('Application/Administrator/Menu.php'); 
?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?link=AdminQuizList">Quizes</a></li>
        <li class="breadcrumb-item active" aria-current="page">List</li>
    </ol>
</nav>
<?php require_once('Application/Core/Message/DisplayError.php'); ?>
<?php
    //execute the command
    $sSQL = "SELECT * FROM Quizes";
    $resultset = mysqli_query($conn, $sSQL);

    if(!$resultset)
    {
        echo'Could not run query: ' . mysql_error();
        exit;
    }
?>
    
<p class="text-right"><a class="btn btn-primary" href="?link=AdminQuizAdd" role="button">Add Quiz</a></p>

<table class="table table-striped">
<thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Active</th>
        <th> </th>
        <th> </th>
        <th> </th>
    </tr>
</thead>
<tbody>
    <?php
        while($row = mysqli_fetch_assoc($resultset))
        {
            $id = $row['id'];
            $title = $row['title'];
            $active = $row['active'];
    ?>
        <tr>
            <th scope="row"><?php echo $id; ?></th>
            <td class="col-1"><?php echo $title; ?></td>
            <td>
                <?php if($active == 1) { ?>
                    <span class="badge badge-success">Enable</span>
                <?php } else { ?>
                    <span class="badge badge-secondary">Disable</span>
                <?php } ?>
            </td>
            <td><a class="btn btn-primary" href="?link=AdminQuestionList&QuizId=<?php echo $id; ?>" role="button">Questions <i class="material-icons">library_add</i></a></td>
            <td><a class="btn btn-primary" href="?link=AdminQuizEdit&id=<?php echo $id; ?>" role="button"><i class="material-icons">mode_edit</i></a></td>
            <td><a class="btn btn-danger" href="?link=AdminQuizDelete&id=<?php echo $id; ?>" role="button"><i class="material-icons">delete_forever</i></a></td>
        </tr>
    <?php } ?>
</tbody>
</table>
