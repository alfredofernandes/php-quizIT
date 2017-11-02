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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
        <title>Quiz IT :: Home</title>
    </head>
    <body>
        <div class="container">
            <?php
                require_once('Application/Core/Database/DBConnect.php');

                // Connect to database
                $conn = DBConnect();
                
                if (isset($_GET['link']) && ($_GET['link'] == 'AdminHome')) {
                    require_once('Application/Administrator/Home.php');
                    
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'AdminUserList')) {
                    require_once('Application/Administrator/UserList.php');
                    
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'AdminUserAdd')) {
                    require_once('Application/Administrator/UserAdd.php');
                    
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'AdminUserEdit')) {
                    require_once('Application/Administrator/UserEdit.php');
                    
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'AdminUserDelete')) {
                    require_once('Application/Administrator/UserDelete.php');
                    
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'AdminQuizList')) {
                    require_once('Application/Administrator/QuizList.php');
                    
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'AdminQuizAdd')) {
                    require_once('Application/Administrator/QuizAdd.php');
                    
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'AdminQuizEdit')) {
                    require_once('Application/Administrator/QuizEdit.php');
                    
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'AdminQuizDelete')) {
                    require_once('Application/Administrator/QuizDelete.php');
                    
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'AdminQuestionList')) {
                    require_once('Application/Administrator/QuestionList.php');
                    
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'AdminQuestionAdd')) {
                    require_once('Application/Administrator/QuestionAdd.php');
                    
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'AdminQuestionEdit')) {
                    require_once('Application/Administrator/QuestionEdit.php');
                    
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'AdminQuestionDelete')) {
                    require_once('Application/Administrator/QuestionDelete.php');
                    
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'AdminTestAttemptList')) {
                    require_once('Application/Administrator/TestAttemptList.php');

                //USER
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'UserHome')) {
                    require_once('Application/User/Home.php');

                } elseif (isset($_GET['link']) && ($_GET['link'] == 'UserProfile')) {
                    require_once('Application/User/Profile.php');

                } elseif (isset($_GET['link']) && ($_GET['link'] == 'UserQuiz')) {
                    require_once('Application/User/Quiz.php');

                } elseif (isset($_GET['link']) && ($_GET['link'] == 'UserQuizResult')) {
                    require_once('Application/User/QuizResult.php');

                } elseif (isset($_GET['link']) && ($_GET['link'] == 'UserResults')) {
                    require_once('Application/User/TestResults.php');
                    
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'UserSignUp')) {
                    require_once('Application/User/SignUp.php');
                    
                } elseif (isset($_GET['link']) && ($_GET['link'] == 'LoginUser')) {
                    require_once('Application/Core/Login/LoginUser.php');

                } else {
                    require_once('Application/Core/Login/LoginUser.php');
                }

                mysqli_close($conn);
            ?>
        </div>
    </body>
</html>
<?php ob_flush(); ?>