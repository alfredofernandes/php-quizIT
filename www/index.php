<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
        <title>Quiz IT :: Home</title>
    </head>
    <body>
        <form class="container" id="needs-validation" method="post" action="quiz.php" novalidate>
            <h1 class="centered">Quiz IT</h1>
            <h3 class="centered">Please, fill this form before proceding to the test:</h3>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" required>
                    <div class="invalid-feedback">
                        Provide your first name.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="last_name">Last name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name" required>
                    <div class="invalid-feedback">
                        Provide your last name.
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                    <div class="invalid-feedback">
                        Provide a valid phone.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                    <div class="invalid-feedback">
                        Provide a valid address.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    <div class="invalid-feedback">
                        Provide a valid email.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    <div class="invalid-feedback">
                        Provide a valid username.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <div class="invalid-feedback">
                        Provide a valid password.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                    <div class="invalid-feedback">
                        Provide a valid password.
                    </div>
                </div> 
            </div>
            <h3 class="centered">Ready? Now, choose a test and good luck!</h3>
            <div class="centered">
                <input class="btn btn-primary btn-custom" type="submit" value="C Quiz">
                <input class="btn btn-primary btn-custom" type="submit" value="C# Quiz">
            </div>
        </form>
    </body>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/myscript.js"></script>
</html>

<?php ?>