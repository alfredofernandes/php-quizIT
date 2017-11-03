<?php 
    require_once('Application/Core/Login/LoginCheck.php'); 
    require_once('Application/Administrator/Menu.php'); 
?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?link=AdminQuizList">Quizes</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
<?php
    if (isset($_GET['id'])) 
    {
        $id = $_GET['id'];
    }

    if (!isset($_POST['submit'])) 
    {
        //load data for $id
        $sSQL = "SELECT * FROM Quizes WHERE id = '$id'";
        $resultSet = mysqli_query($conn, $sSQL);
        $row = mysqli_fetch_assoc($resultSet);
?>
    <form class="container" id="needs-validation" method="post" action="?link=AdminQuizEdit" novalidate>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"><br>
        <div class="row">
            <div class="col-md-6 mb-3">
            <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>" placeholder="First name" required>
                <div class="invalid-feedback">
                    Provide quiz title.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="confirm_password">Active</label>
                <select class="custom-select col-md-3" id="active" name="active">
                    <option>Select one option</option>
                    <option <?php echo ($row['active'] == 1) ? 'selected' : '' ; ?> value="1">Enable</option>
                    <option <?php echo ($row['active'] == 0) ? 'selected' : '' ; ?> value="0">Disable</option>
                </select>
                <div class="invalid-feedback">
                    Provide a valid option.
                </div>
            </div> 
        </div>

        <p class="text-center">
            <input class="btn btn-primary" type="submit" name="submit" value="Update">
            <a class="btn btn-secondary" href="?link=AdminQuizList" role="button">Back</a>
        </p>
    </form>

<?php } else { 

        $id = $_POST['id'];
        $title = $_POST['title'];
        $active = $_POST['active'];

        // Insert
        $sSQL = "UPDATE Quizes SET title = '$title', active = '$active' WHERE id = '$id'";
        $isInserted = mysqli_query($conn, $sSQL);

        if($isInserted)
        {
            header("Location: ?link=AdminQuizList&msg=EditSuccess");
        } else {
            header("Location: ?link=AdminQuizList&msg=EditError");
        }
    } ?>
