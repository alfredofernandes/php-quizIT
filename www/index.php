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
        <form class="container" id="needs-validation" novalidate>
            <h1 class="centered">Quiz IT</h1>
            <h3 class="centered">Please, fill this form before proceding to the test:</h3>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="validationCustom01">First name</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="First name" required>
                    <div class="invalid-feedback">
                        Provide your first name.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationCustom02">Last name</label>
                    <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" required>
                    <div class="invalid-feedback">
                        Provide your last name.
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="validationCustom03">Phone</label>
                <input type="text" class="form-control" id="validationCustom03" placeholder="Phone" required>
                    <div class="invalid-feedback">
                        Provide a valid phone.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                <label for="validationCustom04">Address</label>
                <input type="text" class="form-control" id="validationCustom04" placeholder="Address" required>
                    <div class="invalid-feedback">
                        Provide a valid address.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                <label for="validationCustom07">Email</label>
                <input type="email" class="form-control" id="validationCustom07" placeholder="Email" required>
                    <div class="invalid-feedback">
                        Provide a valid email.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom08">Username</label>
                    <input type="text" class="form-control" id="validationCustom08" placeholder="Username" required>
                    <div class="invalid-feedback">
                        Provide a valid username.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom09">Password</label>
                    <input type="password" class="form-control" id="validationCustom09" placeholder="Password" required>
                    <div class="invalid-feedback">
                        Provide a valid password.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom10">Confirm Password</label>
                    <input type="password" class="form-control" id="validationCustom10" placeholder="Confirm Password" required>
                    <div class="invalid-feedback">
                        Provide a valid password.
                    </div>
                </div> 
            </div>
            <h3 class="centered">Ready? Now, choose a test and good luck!</h3>
            <div class="centered">
                <button class="btn btn-primary btn-custom" type="submit">C Quiz</button>
                <button class="btn btn-primary btn-custom" type="submit">C# Quiz</button>
            </div>
        </form>
    </body>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/myscript.js"></script>
</html>

<?php ?>
