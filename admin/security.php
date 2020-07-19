<?php
session_start();
include('database/config.php');


if(!$_SESSION['username'])
{
   header("Location:loginn.php");
}
?>