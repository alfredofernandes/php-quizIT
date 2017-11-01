<?php require_once('Application/User/LoginCheck.php'); ?>

<h2>User / Delete</h2>

<?php
    $confirm = (isset($_GET['confirm'])) ? $_GET['confirm'] : null;
    $id = (isset($_GET['id'])) ? $_GET['id'] : null;

    // checks if user confirms record to delete
    if (!$confirm) { ?>

        <h4 class="text-center">Do you really want to delete?</h4>
        <br>

        <p class="text-center">
            <a class="btn btn-danger" href="?link=UserDelete&id=<?php echo $id; ?>&confirm=yes">Yes</a>
            <a class="btn btn-primary" href="?link=UserList">No</a>
        </p>

<?php } elseif ($confirm == 'yes') {
    
        //execute the command
        $sSQL = "DELETE FROM users WHERE id = '$id'";
        $isDeleted = mysqli_query($conn, $sSQL);

        if($isDeleted)
        {
            header("Location: ?link=UserList&msg=DeleteSuccess");
        } else {
            header("Location: ?link=UserList&msg=DeleteError");
        }
    }
?>
