<?php
    session_start();
    include 'dbconn.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ATTENDANCEW Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="w3.css" />
    <script src="main.js"></script>
</head>
<body>
<?php include_once 'nav.php';?>
<table class="w3-table-all">
        <thead>
            <tr>
                <th>Meeting Id</th>
                <th>Meeting Description</th>
                <th>Date</th>
                <th>Time Started</th>
                <th>Time Ended</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $attendance=getAllAttendance();
            foreach ($attendance as $att) {   
        ?>
            <tr>
                <td><?php echo $att['attendance_id'];?></td>
                <td><?php echo $att['meeting_description'];?></td>
                <td><?php echo $att['date']?></td>
                <td><?php echo $att['start_time'];?></td>
                <td><?php echo $att['end_time'];?></td>
                <td><?php echo "";?></td>

                <td>
                 
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</body>
</html>