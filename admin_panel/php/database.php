<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "resturant";

$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn){
    echo "database issue";
}

?>