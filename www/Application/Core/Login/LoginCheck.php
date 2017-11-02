<?php 
    $userId = $_SESSION['userId'];
    $userName = $_SESSION['userName'];
    $userAdmin = $_SESSION['userAdmin'];
    
    if (!isset($userId)) { 
        header("Location: ?link=LoginUser");
    }
