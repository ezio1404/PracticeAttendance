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
</head>
<body>
    <form action="addAccounts.php" method="POST">
    <input type="text" placeholder="firstname" name="firstname">
    <input type="text" placeholder="lastname" name="lastname">
    <input type="text" placeholder="course" name="course">
    <input type="number"  placeholder="year" name="year">
    <input type="text" placeholder="school" name="school">
    <input type="submit" name="addAccount" value="Add">
    </form>

    <table class="w3-table w3-striped">
        <thead>
            <tr>
                <th>Idno</th>
                <th>Name</th>
                <th>Course &amp; year</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $accounts=getAllAccounts();
            foreach ($accounts as $a) {   
        ?>
            <tr>
                <td><?php echo $a["account_id"];?></td>
                <td><?php echo $a["lastname"].','.$a["firstname"];?></td>
                <td><?php echo $a["course"].'-'.$a["year"];?></td>
                <td>

                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</body>
</html>