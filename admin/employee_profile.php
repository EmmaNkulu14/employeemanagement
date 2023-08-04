<?php
$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";

$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);
$sql="select * from employee";
$params = array();

$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$query = sqlsrv_query( $con, $sql , $params, $options );
$stmt= (sqlsrv_query($con,$sql));

$num_rows = sqlsrv_num_rows($query);
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

    </ul>
    <ul class="navbar-nav">


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

    <div class="cont-profile">
        <h6 style="text-align: center;font-size: 20px; font-weight: bold;margin-bottom: 40px;">Employee profile</h6>
        <img src="img/pngtree-business-male-icon-vector-png-image_4187852.jpg" class="image">
        <div class="edit-link">
            <span><a data-toggle="modal" data-target="#myModal" href="" style="padding-left: 3px;" >Send message <i class='far fa-mail-forward' style='font-size:17px;color:dodgerblue;'></i></a></span>
            <div class="modal fade" id="myModal" >
                <div class="modal-dialog"  >
                    <div class="modal-content" style="width: 600px;">
                        <div class="modal-header">
                            <h4 class="modal-title">Chat</h4>

                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="profile-edit" >
                            

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="d-lg-block profile_labels">
            <?php
            $id=$_GET['detail'];
            $sql="select * from employee where id_employee='$id' ";
            $params = array();

            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

            $query1 = sqlsrv_query( $con, $sql , $params, $options );

            $num_rows = sqlsrv_num_rows($query1);
            while ($row=sqlsrv_fetch_array($query1,SQLSRV_FETCH_ASSOC))
            {

            ?>
            <div class="d-inline-block">
                <label>First name :<?php echo $row['employee_name'];?></label>
                <label>Last name : <?php echo $row['employee_lname'];?></label>
                <label>Phone number :<?php echo $row['employee_phone_num'];?></label>
                <label>Email :<?php echo $row['employee_email'];?></label>
                <label style="position: static;">Status :</label>
            <label>Date of birth :</label></br>
            <label>Department: </label></br>
            </div>
            <?php
            }
            ?>
            ?>
        </div>

    </div>


    </div>


</section>

</body>
</html>
