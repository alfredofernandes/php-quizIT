<?php

    // Creating Variables
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Executing Query
    mysqli_query($connect, "INSERT INTO users (firstname, lastname, phone, address, email, username, password) 
                            VALUES ('$first_name', '$last_name', '$phone', '$address', '$email', '$username', '$password')");

?>