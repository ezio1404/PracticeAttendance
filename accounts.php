<?php
session_start();
include_once 'dbconn.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Attendance </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form action="addAccounts.php">
    <input type="text" placeholder="firstname" name="fname">
    <input type="text" placeholder="lastname" name="lname">
    <input type="text" placeholder="course" name="course">
    <input type="text" placeholder="year" name="year">
    <input type="text" placeholder="school" name="school">
    </form>

    <table>
        <thead>
            <tr>
                <th>Idno</th>
                <th>Name</th>
                <th>Course and year</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</body>
</html>