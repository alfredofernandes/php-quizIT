<?php 
    require_once('Application/Core/Login/LoginCheck.php'); 
    require_once('Application/User/Menu.php'); 
?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Profile</li>
    </ol>
</nav>
<?php require_once('Application/Core/Message/DisplayError.php'); ?>
<?php
    
    $userID = $_SESSION['id'];
	//$userID = 4;

    if (!isset($_POST['submit'])) 
    {
        //load data for $id
        $sSQL = "SELECT * FROM Users WHERE id = '$userID'";
        $resultSet = mysqli_query($conn, $sSQL);
        $row = mysqli_fetch_assoc($resultSet);
?>
    <form class="container" id="needs-validation" method="post" action="?link=UserProfile" novalidate>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"><br>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="first_name">First name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row['first_name']; ?>" placeholder="First name" required>
                <div class="invalid-feedback">
                    Provide your first name.
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="last_name">Last name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row['last_name']; ?>" placeholder="Last name" required>
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
            <div class="col-md-6 mb-3">
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
        </div>

        <p class="text-center">
            <input class="btn btn-primary" type="submit" name="submit" value="Update">
            <a class="btn btn-secondary" href="?link=UserProfile" role="button">Back</a>
        </p>
    </form>


<?php } else { 

        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        //inset
        $sSQL = "UPDATE Users SET first_name = '$first_name', last_name = '$last_name', email = '$email', phone = '$phone', address = '$address', username = '$username', password = '$password' WHERE id = '$id'";
        $isInserted = mysqli_query($conn, $sSQL);

        if($isInserted)
        {
            header("Location: ?link=UserProfile&msg=EditSuccess");
        } else {
            header("Location: ?link=UserProfile&msg=EditError");
        }
    } ?>
