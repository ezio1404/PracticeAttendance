<?php

function dbconn(){
  return new PDO("mysql:hostname=locahost;dbname=practice_db","root","");
}

function insertAccounts($a,$b,$c,$d,$e){
 $dbconn=dbconn();
 $sql="INSERT INTO tbl_accounts(firstname,lastname,course,year,school) VALUES(?,?,?,?,?)";
 $stmt=$dbconn->prepare($sql);
 $stmt->excute(array($a,$b,$c,$d,$e));
 $dbconn=null;
}

function insertMeetings($a,$b,$c,$d,$e,$f){
    $dbconn=dbconn();
    $sql="INSERT INTO tbl_meetings(description,date,start_time,end_time,facilitator,status) VALUES(?,?,?,?,?,?)";
    $stmt=$dbconn->prepare($sql);
    $stmt->excute(array($a,$b,$c,$d,$e,$f));
    $dbconn=null;
   }
   function insertAttendance($a,$b){
    $dbconn=dbconn();
    $sql="INSERT INTO tbl_attendance(account_id,meeting_id) VALUES(?,?)";
    $stmt=$dbconn->prepare($sql);
    $stmt->excute(array($a,$b));
    $dbconn=null;
   }
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
   
?>