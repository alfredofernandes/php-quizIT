<?php

    $server = '192.168.99.100';
    $user = 'root';
    $password = 'secret';
    $database = 'phpquiz';

    $connect = mysqli_connect($server, $user, $password, $database);

    if (mysqli_connect_errno($connect)) {
        echo 'Failed to connect!';
    }

?>