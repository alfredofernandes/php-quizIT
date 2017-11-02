<?php 
    require_once('Application/Administrator/Menu.php'); 
?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?link=AdminUserList">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">Delete</li>
    </ol>
</nav>

<?php
    $confirm = (isset($_GET['confirm'])) ? $_GET['confirm'] : null;
    $id = (isset($_GET['id'])) ? $_GET['id'] : null;

    // checks if user confirms record to delete
    if (!$confirm) { ?>

        <h4 class="text-center">Do you really want to delete?</h4>
        <br>

        <p class="text-center">
            <a class="btn btn-danger" href="?link=AdminUserDelete&id=<?php echo $id; ?>&confirm=yes">Yes</a>
            <a class="btn btn-primary" href="?link=AdminUserList">No</a>
        </p>

<?php } elseif ($confirm == 'yes') {
    
        //execute the command
        $sSQL = "DELETE FROM Users WHERE id = '$id'";
        $isDeleted = mysqli_query($conn, $sSQL);

        if($isDeleted)
        {
            header("Location: ?link=AdminUserList&msg=DeleteSuccess");
        } else {
            header("Location: ?link=AdminUserList&msg=DeleteError");
        }
    }
?>
