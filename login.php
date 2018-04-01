<?php
session_start();
include_once 'dbconn.php';
// $username="";
// $password="";
if(isset($_POST['login'])){
    $username=$_POST["username"];
    $password=$_POST["password"];

    if($username!="" && $password!="" ){

        $user=login($username,$password);
        
        if($user['firstname']==$username &&($user['course'].$user['year'])==$password ||( $username=="admin" && $password=="admin")){
            if($username!="admin"){
            $_SESSION['id']=$user['account_id'];
            $_SESSION['fullname']=$user['lastname'].",".$user['firstname'];
            }
            else{
                $_SESSION['id']="1404";
                $_SESSION['fullname']="Admin";

            }
            // echo $_SESSION['id'].'<br/>';
            // echo $_SESSION['fullname'].'<br/>';
            header("location:accounts.php");
        }
        else{
            header("location:index.php?invalid_Credentials");  
        }
    }
    else{
        header("location:index.php?input_fields_missing");

    }

}

?>