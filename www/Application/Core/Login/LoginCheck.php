<?php 
    $userId = $_SESSION['userId'];
    
    if (!isset($userId)) { 
        header("Location: ?link=LoginUser");
    }
