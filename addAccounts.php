<?php
session_start();
include_once 'dbconn.php';

if(isset($_POST["addAccount"])){
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $course=$_POST["course"];
    $year=$_POST["year"];
    $school=$_POST["school"];
    
    insertAccounts($firstname, $lastname,$course,$year, $school);
    header("location:accounts.php");
}

?>