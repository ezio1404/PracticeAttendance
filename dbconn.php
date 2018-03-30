<?php

function dbconn(){
  return new PDO("mysql:hostname=locahost;dbname=practice_db","root","");
}

?>