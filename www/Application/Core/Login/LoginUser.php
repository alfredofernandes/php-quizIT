<?php 
    $username = ((isset($_POST['username']) && $_POST['username'] != null)) ? $_POST['username'] : null;
    $password = ((isset($_POST['password']) && $_POST['password'] != null)) ? $_POST['password'] : null;

    if (($username != null) && ($password != null))
    {
        //load data for $id
        $sSQL = "SELECT * FROM Users WHERE username = '$username' AND password = '$password'";
        $resultSet = mysqli_query($conn, $sSQL);
        $userChecked = mysqli_fetch_assoc($resultSet);

        if($userChecked)
        {
            // sessions
            $_SESSION['userId'] = $userChecked['id'];
            $_SESSION['username'] = $userChecked['username'];
            $_SESSION['userAdmin'] = $userChecked['admin'];

            if ($userChecked['admin'] == 1) {
                header("Location: ?link=AdminHome");
            } else {
                header("Location: ?link=UserHome");
            }

        } else {
            header("Location: ?link=LoginUser&loginChecked=no");
        }
    }
?>

<div class="col-md-4 centered">
    <form class="form-signin" action="?link=LoginUser" method="post">
        <h2 class="form-signin-heading">Please Sign in</h2>

        <?php if (isset($_GET['loginChecked']) && $_GET['loginChecked'] == 'no') { ?>
            <div class="alert alert-danger" role="alert">
                Username/password is incorrect!
            </div>
        <?php } ?>

        <label for="username" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password"class="form-control" placeholder="Password" required>
        <br>
        <div class="checkbox">
            <label>
            <input type="checkbox" name="remember" value="yes" checked="checked"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</div>

<h5 class="centered">You don't have access? <a href="?link=UserSignUp">Create a new here!</a></h5>
