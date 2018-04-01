<?php
session_start();
include_once 'dbconn.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Attendance </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="w3.css">
    <style>
    input{
        display:block;
    }
    </style>
</head>
<body>

<?php include_once 'nav.php';?>
<div class="w3-row">
<div class="w3-col s3  w3-center">
    <form action="addAccounts.php" method="POST">
    <input class="w3-input w3-animate-input" type="text" placeholder="firstname" name="firstname">
    <input class="w3-input w3-animate-input" type="text" placeholder="lastname" name="lastname">
    <input class="w3-input w3-animate-input" type="text" placeholder="course" name="course">
    <input class="w3-input w3-animate-input" type="number"  placeholder="year" name="year">
    <input class="w3-input w3-animate-input" type="text" placeholder="school" name="school">
    <input class="w3-input w3-animate-input" type="submit" name="addAccount" value="Add">
    </form>
</div>
<div class="w3-col m6 w3-center">
    <table class="w3-table-all">
        <thead>
            <tr>
                <th>Idno</th>
                <th>Name</th>
                <th>Course &amp; year</th>
                <th>School</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $accounts=getAllAccounts();
            foreach ($accounts as $a) {   
        ?>
            <tr>
                <td><?php echo $a['account_id'];?></td>
                <td><?php echo $a['lastname'].','.$a['firstname'];?></td>
                <td><?php echo $a['course'].'-'.$a['year'];?></td>
                <td><?php echo $a['school'];?></td>
                <td>
                    <a href="updateAccounts.php?id=<?php echo $a['account_id'];?>">Update</a>
                    <a href="deleteAccount.php?id=<?php echo $a['account_id'];?>">Delete</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    </div>
    <div class="w3-col m3 w3-center">
    <form method="post" action ="searchAccounts.php">
    <input class="w3-input w3-animate-input" type="text" name="keyword" placeholder="Search..">
    <input class="w3-input w3-animate-input" type="submit" name="search" value="search">
    </form>
    </div>
    </div>
</body>
</html>