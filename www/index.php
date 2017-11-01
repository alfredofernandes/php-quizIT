<?php 
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Quiz IT :: Home</title>
    </head>
    <body>
        <div class="container">
            <?php
                require_once('Application/Core/Database/DBConnect.php');
                require_once('Application/Core/Message/DisplayError.php');

                // Connect to database
                $conn = DBConnect();
                
                if (isset($_GET['link']) && ($_GET['link'] == 'UserList')) {
                    require_once('Application/User/UserList.php');
                    
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'UserInsert')) {
                    require_once('Application/User/UserInsert.php');
                    
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'UserEdit')) {
                    require_once('Application/User/UserEdit.php');
                    
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'UserDelete')) {
                    require_once('Application/User/UserDelete.php');
                    
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'LoginUser')) {
                    require_once('Application/User/LoginUser.php');
                    
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'Logout')) {
                    require_once('Application/User/Logout.php');

                } else {
                    require_once('Application/User/Home.php');
                }

                mysqli_close($conn);
            ?>
        </div>
    </body>
</html>
<?php ob_flush(); ?>