<?php
session_start();
include 'dbconn.php';

if(isset($_POST['search'])){
    $keyword=$_POST['keyword'];
    
    if($keyword!=""){
        $searched=searchMeeting($keyword);
        // print_r($searched);
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
    <title>Search result</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="w3.css" />
    <script src="main.js"></script>
</head>
<body>
     <table class="w3-table-all">
        <thead>
            <tr>
            <th>Meeting Id</th>
                <th>Description</th>
                <th>Date</th>
                <th>Time Started - Time Ended</th>
                <th>Facilitator</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
         if (count($searched)!=0){
            foreach ($searched as $m) {   
               
        ?>
            <tr>
            <td><?php echo $m['meeting_id'];?></td>
                <td><?php echo $m['description'];?></td>
                <td><?php echo $m['date']?></td>
                <td><?php echo $m['start_time'].' - '.$m['end_time'];?></td>
                <td><?php echo $m['facilitator']?></td>
                <td><?php echo $m['status']?></td>
            </tr>
            <?php }
                }
                else{
                ?>
                <h1>No results Found , Please go <a href="meetings.php">back</a></h1>
            <?php }?>
        </tbody>
    </table>
    <a href="meetings.php">Back to Meetings</a>
</body>
</html>