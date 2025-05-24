<?php


function connetion(){
    $servername = "localhost";
    $username = "root";
    $password = "";

    $connection = new PDO("mysql:host=$servername;dbname=test",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    return $connection;
}


/*
|   database section
*/
function execute($connection,$query){
    
    $connection->exec($query);
}


function select($connection,$query){

    $data = $connection->prepare($query);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);

   return $data->fetchAll();
}