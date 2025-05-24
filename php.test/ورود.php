<?php

include "./helper.php";
include "./view/login.html";
session_start();
$connection = connetion();

/*
| request validation
*/
$requestUsername = $_REQUEST['username'] ?? null;
$requestPassword = $_REQUEST['password'] ?? null;

if(empty($requestUsername) 
|| empty($requestPassword)
){

    echo "empty username or password";
    return;
}

/*
| validation 
|
*/
$userData = select($connection,"SELECT * FROM `users` WHERE `username` = '$requestUsername'; ")[0] ?? null;
if(empty($userData)){

    echo "username is not empty";
    return;
}

/*
| logic
*/
$_SESSION['user_id'] = $userData['id'];

header("Location: index.php");
