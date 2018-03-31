<?php

function dbconn(){
  return new PDO("mysql:hostname=locahost;dbname=practice_db","root","");
}

function login($username,$pass){
    $dbconn=dbconn();
    $sql="SELECT * FROM tbl_accounts WHERE firstname = ? AND CONCAT(course,year)=? ";
    $stmt=$dbconn->prepare($sql);
    $stmt->execute(array($username,$pass));
    $user=$stmt->fetch();
    $dbconn=null;
    return $user;
}

function insertAccounts($a,$b,$c,$d,$e){
 $dbconn=dbconn();
 $sql="INSERT INTO tbl_accounts(firstname,lastname,course,year,school) VALUES(?,?,?,?,?)";
 $stmt=$dbconn->prepare($sql);
 $stmt->execute(array($a,$b,$c,$d,$e));
 $dbconn=null;
}

function insertMeetings($a,$b,$c,$d,$e,$f){
    $dbconn=dbconn();
    $sql="INSERT INTO tbl_meetings(description,date,start_time,end_time,facilitator,status) VALUES(?,?,?,?,?,?)";
    $stmt=$dbconn->prepare($sql);
    $stmt->execute(array($a,$b,$c,$d,$e,$f));
    $dbconn=null;
   }
   function insertAttendance($a,$b){
    $dbconn=dbconn();
    $sql="INSERT INTO tbl_attendance(account_id,meeting_id) VALUES(?,?)";
    $stmt=$dbconn->prepare($sql);
    $stmt->execute(array($a,$b));
    $dbconn=null;
   }
   //---------------------------------------------------------
   //---------------------------------------------------------
   function getAllAccounts(){
    $dbconn= dbconn();
    $sql="SELECT * FROM tbl_accounts";
    $stmt=$dbconn->prepare($sql);
    $stmt->execute();
    $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbconn=null;
    return $row;
   }
   function getAllMeetings(){
    $dbconn= dbconn();
    $sql="SELECT * FROM tbl_meetings";
    $stmt=$dbconn->prepare($sql);
    $stmt->execute();
    $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbconn=null;
    return $row;
   }
   function getAllAttendance(){
    $dbconn= dbconn();
    $sql="SELECT * FROM tbl_attendance";
    $stmt=$dbconn->prepare($sql);
    $stmt->execute();
    $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbconn=null;
    return $row;
   }
   //---------------------------------------------------------
   //---------------------------------------------------------
   function getAccount($a){
    $dbconn=dbconn();
    $sql="SELECT * FROM tbl_accounts where account_id=?";
    $stmt=$dbconn->prepare($sql);
    $stmt->execute(array($a));
    $account=$stmt->fetch();
    $dbconn=null;
    return $account;
   }
   //---------------------------------------------------------
   //---------------------------------------------------------
   function updateAccounts($a,$b,$c,$d,$e,$f){
    $dbconn=dbconn();
    $sql="UPDATE tbl_accounts SET firstname = ? , lastname=?, course = ? , year= ? , school= ? where account_id= ?";
    $stmt=$dbconn->prepare($sql);
    $stmt->execute(array($a,$b,$c,$d,$e,$f));
    $dbconn=null;
   }
    //---------------------------------------------------------
   //---------------------------------------------------------
   function deleteAccount($a){
    $dbconn=dbconn();
    $sql="DELETE FROM tbl_accounts WHERE account_id=?";
    $stmt=$dbconn->prepare($sql);
    $stmt->execute(array($a));
    $dbconn=null;
   }
    //---------------------------------------------------------
   //---------------------------------------------------------
   function searchAccount($keyword){
    $dbconn= dbconn();
    $sql="SELECT * FROM tbl_accounts WHERE CONCAT(firstname,'',lastname,'',course,'',year,'',school) LIKE '%".$keyword."%' ";
    $stmt=$dbconn->prepare($sql);
    $stmt->execute();
    $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbconn=null;
    return $row;

   }
?>