<?php
session_start();
include "./helper.php";
include_once "./view/register.php";

$connection = connetion();

$_SEESSION['error'] = "test222";


/*
| request 
*/
$requestUsername  = $_REQUEST['username'] ?? null;
$requestEmail     = $_REQUEST['email'] ?? null;
$requestPhone     = $_REQUEST['phone'] ?? null;
$requestPassword  = $_REQUEST['password'] ?? null;

if(empty($requestUsername) 
|| empty($requestPassword)
|| empty($requestEmail)
|| empty($requestPhone)
){

    echo "empty username or password";
    return;
}

$userData = select($connection,"SELECT * FROM `users` WHERE `username` = '$requestUsername'; ")[0] ?? null;
if(!empty($userData)){
    
    echo "username is not unique";
    return;
}


/*
| logic
*/
if(!empty(select($connection,"SELECT * FROM `users` WHERE `username` = '$requestUsername'; ")[0] ?? NULL)){
    return;
}

execute($connection,
"INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`) 
              VALUES (NULL, '$requestUsername', $requestPassword, '$requestEmail', '$requestPhone'); " 
);