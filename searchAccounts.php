<?php
session_start();
include 'dbconn.php';

if(isset($_POST['search'])){
    $keyword=$_POST['keyword'];
    
    if($keyword!=""){
        $searched=searchAccount($keyword);
        // print_r($searched);
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
    <title>Search result</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="w3.css" />
    <script src="main.js"></script>
</head>
<body>
     <table class="w3-table w3-striped">
        <thead>
            <tr>
                <th>Idno</th>
                <th>Name</th>
                <th>Course &amp; year</th>
                <th>School</th>
            </tr>
        </thead>
        <tbody>
        <?php
         if (count($searched)!=0){
            foreach ($searched as $a) {   
               
        ?>
            <tr>
                <td><?php echo $a['account_id'];?></td>
                <td><?php echo $a['lastname'].','.$a['firstname'];?></td>
                <td><?php echo $a['course'].'-'.$a['year'];?></td>
                <td><?php echo $a['school'];?></td>
            </tr>
            <?php }
            
                }
                else{
                ?>
                <h1>No results Found , Please go <a href="accounts.php">back</a></h1>
    <?php }?>
        </tbody>
    </table>
    
</body>
</html>