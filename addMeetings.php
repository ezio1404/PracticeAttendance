<?php
session_start();
include_once 'dbconn.php';

if(isset($_POST["addMeeting"])){
    $description=$_POST["description"];
    $date=$_POST["date"];
    $start_time=$_POST["start_time"];
    $end_time=$_POST["end_time"];
    $facilitator=$_POST["facilitator"];  
    insertMeetings($description, $date,$start_time,$end_time, $facilitator);
    header("location:meetings.php");
}
?>