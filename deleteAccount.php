<?php 
include 'dbconn.php';
$id = $_GET["id"];
deleteAccount($id);
header("location:accounts.php");