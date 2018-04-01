<?php
session_start();
include_once 'dbconn.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MEETINGS Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="w3.css" />
    <style>
    input{
        display:block;
    }
    </style>
</head>
<body>
<?php include_once 'nav.php';?>
<div class="w3-row">
<div class="w3-col s3  w3-center">
<form action="addMeetings.php" method="POST">
    <input class="w3-input w3-animate-input" type="text" placeholder="description" name="description">
    <input class="w3-input w3-animate-input" type="date" placeholder="date" name="date">
    <input class="w3-input w3-animate-input" type="time" placeholder="start_time" name="start_time">
    <input class="w3-input w3-animate-input" type="time"  placeholder="end_time" name="end_time">
    <input class="w3-input w3-animate-input" type="text" placeholder="facilitator" name="facilitator">
    <select class="w3-select"name="status">
        <option value="open">open</option>
        <option value="close">close</option>
    </select>
    <input class="w3-input w3-animate-input" type="submit" name="addMeeting" value="Add">
    </form>

</div>

<div class="w3-col m6 w3-center">
    <table class="w3-table-all">
        <thead>
            <tr>
                <th>Meeting Id</th>
                <th>Description</th>
                <th>Date</th>
                <th>Time Started - Time Ended</th>
                <th>Facilitator</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $meetings=getAllMeetings();
            foreach ($meetings as $m) {   
        ?>
            <tr>
                <td><?php echo $m['meeting_id'];?></td>
                <td><?php echo $m['description'];?></td>
                <td><?php echo $m['date']?></td>
                <td><?php echo $m['start_time'].' - '.$m['end_time'];?></td>
                <td><?php echo $m['facilitator']?></td>
                <td><?php echo $m['status']?></td>

                <td>
                    <a href="updateMeetings.php?id=<?php echo $m['meeting_id'];?>">Update</a>
                    <a href="deleteMeeting.php?id=<?php echo $m['meeting_id'];?>">Delete</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    </div>
    <div class="w3-col m3 w3-center">
    <form method="post" action ="searchMeetings.php">
    <input class="w3-input w3-animate-input" type="text" name="keyword" placeholder="Search..">
    <input class="w3-input w3-animate-input" type="submit" name="search" value="search">
    </form>
    
    <form action="addAttendance.php" method="POST">
        <label for="account_id">Account_id</label>
        <select class="w3-select"name="account_id" id="account_id">
            <?php
                $data=getAllOpenAccount();
                foreach($data as $d){
            ?>
                <option value="<?php echo $d['account_id'];?>"><?php echo  $d['account_id'];?></option>
            <?php
                }
            ?>
        </select>
        <label for="meeting_id">meeting_id</label>
        <select class="w3-select"name="meeting_id" id="meeting_id">
            <?php
                $data=getAllMeetingsOpen();
                foreach($data as $d){
            ?>
                <option value="<?php echo $d['meeting_id'];?>"><?php echo  $d['meeting_id'];?></option>
            <?php
                }
            ?>
        </select>
        <input class="w3-input w3-animate-input" type="submit" name="addAttendance" value="Add Attendee">
    </form>
    </div>
    </div>
</body>
</html>