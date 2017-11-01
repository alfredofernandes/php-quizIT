<?php require_once('Application/User/LoginCheck.php'); ?>

<h2>User / Edit</h2>

<?php
    if (isset($_GET['id'])) 
    {
        $id = $_GET['id'];
    }

    if (!isset($_POST['submit'])) 
    {
        //load data for $id
        $sSQL = "SELECT * FROM users WHERE id = '$id'";
        $resultSet = mysqli_query($conn, $sSQL);
        $row = mysqli_fetch_assoc($resultSet);
?>
    <form class="container" id="needs-validation" method="post" action="?link=UserEdit" novalidate>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"><br>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="firstname">First name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $row['firstname']; ?>" placeholder="First name" required>
                <div class="invalid-feedback">
                    Provide your first name.
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="lastname">Last name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>" placeholder="Last name" required>
                <div class="invalid-feedback">
                    Provide your last name.
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-6 mb-3">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>" placeholder="Phone" required>
                <div class="invalid-feedback">
                    Provide a valid phone.
                </div>
            </div>
            <div class="col-md-6 mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>" placeholder="Address" required>
                <div class="invalid-feedback">
                    Provide a valid address.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Email" required>
                <div class="invalid-feedback">
                    Provide a valid email.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" placeholder="Username" required>
                <div class="invalid-feedback">
                    Provide a valid username.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>" placeholder="Password" required>
                <div class="invalid-feedback">
                    Provide a valid password.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="<?php echo $row['password']; ?>" placeholder="Confirm Password" required>
                <div class="invalid-feedback">
                    Provide a valid password.
                </div>
            </div> 
        </div>

        <p class="text-center">
            <input class="btn btn-primary" type="submit" name="submit" value="Update">
            <a class="btn btn-secondary" href="?link=UserList" role="button">Back</a>
        </p>
    </form>


<?php } else { 

        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        //inset
        $sSQL = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', email = '$email', phone = '$phone', address = '$address', username = '$username', password = '$password' WHERE id = '$id'";
        $isInserted = mysqli_query($conn, $sSQL);

        if($isInserted)
        {
            header("Location: ?link=UserList&msg=EditSuccess");
        } else {
            header("Location: ?link=UserList&msg=EditError");
        }
    } ?>
