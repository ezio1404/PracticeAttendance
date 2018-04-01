<?php 
include 'dbconn.php';
$id = $_GET["id"];
deleteMeeting($id);
header("location:meetings.php");