<?php
session_start();
include 'dbconn.php';
$id=$_GET['id'];
$user=getMeeting($id);
// print_r($user);
if(isset($_POST['updateMeeting'])){
    $flag=true;
    $meeting_id=$_POST['meeting_id'];
    $description=$_POST['description'];
    $date=$_POST['date'];
    $start_time=$_POST['start_time'];
    $end_time=$_POST['end_time'];
    $facilitator=$_POST['facilitator'];
    $status=$_POST['status'];

    $meetingArr=array($meeting_id, $description,$date,$start_time, $end_time,$facilitator);
    for($i=0;$i<count($meetingArr);$i++){
        if($meetingArr[$i]==""){
            $flag=false;
            break;
        }
    }

    if($flag){
        updateMeetings($description, $date,$start_time,$end_time, $facilitator,$status,$meeting_id);
        header("location:meetings.php");
     }
     else{
        header("location:meetings.php");
     }
 
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update Meeting</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="w3.css" />
<style>
        input {

    display:inline-block;

    }
</style>
</head>
<body>
    <form method="post">
    <input type="text" name="meeting_id" value="<?php echo $user['meeting_id'];?>" hidden>
    <label for="description">description</label>
    <input type="text" name="description" placeholder="description" id="description" value="<?php echo $user['description'];?>">
    <label for="date">date</label>
    <input type="date" name="date" placeholder="date" id="date" value="<?php echo $user['date'];?>">
    <label for="start_time">start_time</label>
    <input type="time" name="start_time" placeholder="start_time" id="start_time" value="<?php echo $user['start_time'];?>">
    <label for="end_time">end_time</label>
    <input type="time" name="end_time" placeholder="end_time" id="end_time" value="<?php echo $user['end_time'];?>">
    <label for="facilitator">facilitator</label>
    <input type="text" name="facilitator" placeholder="facilitator" id="facilitator" value="<?php echo $user['facilitator'];?>">
    <label for="status">status</label>
    <select name="status" id="status">
        <?php if($user['status']=="open"){?>
        <option value="open" selected>open</option>
        <option value="close">close</option>
<?php }else{?>
    <option value="open" >open</option>
        <option value="close" selected>close</option>
<?php }?>
    </select>
    <input type="submit" name="updateMeeting" value="Update">
    </form>
</body>
</html>