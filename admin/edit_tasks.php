<?php

$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";
$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);
$sql="select * from part_of_job";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$query = sqlsrv_query( $con, $sql , $params, $options );
session_start();
$_SESSION['id']=$_GET['id'];
$id=$_SESSION['id'];
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <meta name="Description" content="organizations record the working hours of hourly employees and ensure those employees are compensated accurately for their time">
    <meta name="Keywords" content="resource planning,employee management sysem,hrms">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prepare task</title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark-50 fixed-top" style="background-color: #00838f;position: absolute;">
    <ul class="item-nav navbar-nav  mr-auto">

        <li class="nav-item ">
            <?php
            $id=$_GET['id'];

            ?>
            <a class="nav-link " href="homepage.php?id=<?php echo $id ?>">Home</a>
        </li>
        <li class="nav-item">
            <?php
            $id=$_GET['id'];

            ?>
            <a class="nav-link" href="profile.php?id=<?php echo $id ?>">Profile</a>
        </li>
        <li class="nav-item">
            <?php
            $id=$_GET['id'];

            ?>
            <a class="nav-link" href="managedata.php?id=<?php echo $id ?>">Manage data</a>
        </li>
        <li class="nav-item">
            <?php
            $id=$_GET['id'];

            ?>
            <a class="nav-link" href="online.php?id=<?php echo $id ?>">Online</a>
        </li>

    </ul>
    <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link" href="logout.php">Log out</a>
        </li>
    </ul>
</nav>
<section>

    <div class="cont-task">
    <form action="process.php?id=<?php echo $id?>" method="POST">
        <h2 style="text-align: center">List of tasks</h2>
        <table class="table">
            <thead>
            <tr>

                <th>Project id</th>
                <th>Task</th>
                <th>Start date</th>
                <th>Status</th>

                <th>Edit</th>
                <th>Delete</th>

            </tr>

            </thead>

            <tbody>
            <?php
            while ($emp =sqlsrv_fetch_array($query,SQLSRV_FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $emp['project_id']?></td>
                <td><?php echo $emp['task']?></td>
                <td><?php
                    $date=$emp['starting_date'];
                    echo date_format($date,"Y-m-d");?></td>
                <td><?php echo $emp['status_of_project']?></td>

                <td>
                    <button class="edit btn" data-toggle="modal" ><i class="fa fa-pen"></i><span>Edit</span></button>
                </td>
                <td><button value="<?php echo $emp['project_id'];?>"  name="delete" class="delete btn"><i class="fa fa-trash"></i><span>Delete</span></button></td>
            </tr>

            </tbody>
            <?php
            }
            sqlsrv_free_stmt($query);
            ?>
        </table>
</form>
    </div>
</section>
</body>
</html>