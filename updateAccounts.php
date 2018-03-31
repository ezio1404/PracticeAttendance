<?php
session_start();
include 'dbconn.php';
$id=$_GET['id'];
$user=getAccount($id);
// print_r($user);
if(isset($_POST['updateAccount'])){
    $flag=true;
    $account_id=$_POST['account_id'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $course=$_POST['course'];
    $year=$_POST['year'];
    $school=$_POST['school'];

    $accountArr=array($account_id, $firstname,$lastname,$course, $year,$school);
    for($i=0;$i<count($accountArr);$i++){
        if($accountArr[$i]==""){
            $flag=false;
            break;
        }
    }

    if($flag){
        updateAccounts($firstname, $lastname,$course,$year, $school,$account_id);
        header("location:accounts.php");
     }
     else{
        header("location:accounts.php");
     }
 
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update Account</title>
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
    <input type="text" name="account_id" value="<?php echo $user['account_id'];?>" hidden>
    <label for="firstname">firstname</label>
    <input type="text" name="firstname" placeholder="firstname" id="firstname" value="<?php echo $user['firstname'];?>">
    <label for="lastname">lastname</label>
    <input type="text" name="lastname" placeholder="lastname" id="lastname" value="<?php echo $user['lastname'];?>">
    <label for="course">course</label>
    <input type="text" name="course" placeholder="course" id="course" value="<?php echo $user['course'];?>">
    <label for="year">year</label>
    <input type="text" name="year" placeholder="year" id="year" value="<?php echo $user['year'];?>">
    <label for="school">school</label>
    <input type="text" name="school" placeholder="school" id="school" value="<?php echo $user['school'];?>">
    <input type="submit" name="updateAccount" value="Update">
    </form>
</body>
</html>