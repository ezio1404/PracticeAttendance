<?php


session_start();
include_once 'dbconn.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <label for="name"> <?php echo $_SESSION['id']?></label>
    <label for="name"> <?php echo $_SESSION['fullname']?></label>
</body>
</html>