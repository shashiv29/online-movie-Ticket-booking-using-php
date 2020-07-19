<?php

$conn = new mysqli("localhost","rohit","cQux5}-o,wV@","mthmk");

if($conn->connect_error){
    die("Could NOt Connect to the Databse".$conn->connect_error);
}


?>