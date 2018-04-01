<?php
session_start();
include_once 'dbconn.php';

if(isset($_POST["addAttendance"])){
    $account_id=$_POST["account_id"];
    $meeting_id=$_POST["meeting_id"];
    insertAttendance($account_id, $meeting_id);
    header("location:meetings.php");
}
?>