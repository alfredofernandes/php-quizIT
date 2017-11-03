<?php 
    require_once('Application/Core/Login/LoginCheck.php'); 
    require_once('Application/Administrator/Menu.php'); 
?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?link=AdminQuizList">Quizes</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add</li>
    </ol>
</nav>

<?php
    if (!isset($_POST['submit'])) 
    {
?>
    <form class="container" id="needs-validation" method="post" action="?link=AdminQuizAdd" novalidate>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Quiz Title" required>
                <div class="invalid-feedback">
                    Provide quiz title.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="confirm_password">Active</label>
                <select class="custom-select col-md-6" id="active" name="active">
                    <option selected>Select one option</option>
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>
                <div class="invalid-feedback">
                    Provide a valid option.
                </div>
            </div> 
        </div> 

        <p class="text-center">
            <input class="btn btn-primary" type="submit" name="submit" value="Insert">
            <a class="btn btn-secondary" href="?link=AdminQuizList" role="button">Back</a>
        </p>
    </form>

<?php } else { 

        $title = $_POST['title'];
        $active = $_POST['active'];

        // Insert
        $sSQL = "INSERT INTO Quizes (title, active) VALUES ('$title', '$active')";
        $isInserted = mysqli_query($conn, $sSQL);

        if($isInserted)
        {
            header("Location: ?link=AdminQuizList&msg=InsertSuccess");
        } else {
            header("Location: ?link=AdminQuizList&msg=InsertError");
        }
    } ?>
