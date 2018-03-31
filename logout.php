<?php 
session_start();
session_unset($_SESSION);
session_destroy($_SESSION);
header("location: index.php");
