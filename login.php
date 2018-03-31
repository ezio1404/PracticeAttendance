<?php
session_start();
include_once 'dbconn.php';
$username="";
$password="";
if(isset($_POST['login'])){
    $username=$_POST["username"];
    $password=$_POST["password"];

    if($username!="" && $password!="" ){

        $user=login($username,$password);
        
        if($user['firstname']==$username ){
            $_SESSION['id']=$user['account_id'];
            $_SESSION['fullname']=$user['lastname'].",".$user['firstname'];
            

            // echo $_SESSION['id'].'<br/>';
            // echo $_SESSION['fullname'].'<br/>';
        
            header("location:test.php");
        }
        else{
            echo "shit 1";
            
        }
    }
    else{
        echo "shit 2    ";

    }

}

?>