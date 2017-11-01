<h2>Login Check</h2>

<?php 
//$username = $_SESSION['username'];
?>
<?php if (!isset($username)) { 
//     header("Location: ?link=LoginUser");

// } else { ?>

    <h2>Thank you <?php echo $username; ?></h2>
    <a href="?link=Logout">Logout</a>
<?php } ?>
