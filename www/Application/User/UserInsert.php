<h2>User / Insert</h2>

<?php
    if (!isset($_POST['submit'])) 
    {
        // create a form to allow users to add new user
?>
    <form class="container" id="needs-validation" method="post" action="?link=UserInsert" novalidate>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="firstname">First name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" required>
                <div class="invalid-feedback">
                    Provide your first name.
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="lastname">Last name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" required>
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

        <p class="text-center">
            <input class="btn btn-primary" type="submit" name="submit" value="Insert">
            <a class="btn btn-secondary" href="?link=UserList" role="button">Back</a>
        </p>
    </form>

<?php } else { 

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        //inset
        $sSQL = "INSERT INTO users (firstname, lastname, email, phone, address, username, password) VALUES ('$firstname', '$lastname', '$email', '$phone', '$address', '$username', '$password')";
        $isInserted = mysqli_query($conn, $sSQL);

        if($isInserted)
        {
            header("Location: ?link=UserList&msg=InsertSuccess");
        } else {
            header("Location: ?link=UserList&msg=InsertError");
        }
    } ?>
