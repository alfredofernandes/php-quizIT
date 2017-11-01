<h1 class="centered">Quiz IT</h1>

<div class="container">
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
        <div class="checkbox">
            <label>
            <input type="checkbox" value="remember" name="yes" checked="checked"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</div>

<h5 class="centered">You don't have access? <a href="?link=UserInsert">Create a new here!</a></h5>
