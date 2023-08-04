<?php
$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";
$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);
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
<body><form method="GET" action="request.php">
    <nav class="navbar navbar-expand-sm navbar-dark-50 fixed-top" style="background-color: #00838f;">
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



        </ul>
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link" href="logout.php">Log out</a>
            </li>
        </ul>
    </nav>
</form>

<section>



    <div class="cont-task">


        <div class="column-left col-block">
    <form action="" method="GET">
            <h2>Personnel name</h2>
            <?php
            $sql_se="select * from employee";
            $params = array();

            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

            $query1 = sqlsrv_query( $con, $sql_se , $params, $options );

            $num_rows = sqlsrv_num_rows($query1);
            while ($row=sqlsrv_fetch_array($query1,SQLSRV_FETCH_ASSOC))
            {
                echo "<a href='users.php?detail=".$row['id_employee']."' name='detail' style='font-size: 20px;padding: 10px; text-transform: capitalize;'>".$row['employee_name'].' '.$row['employee_lname']."<br></a>";
            }

            ?>
    </form>

        </div>

        <div class="column-right" >
            <form action="process.php?id=<?php echo $id?>" method="POST">

                <h2 style="text-align: center;margin-left: -150px;">Add tasks</h2>
                <div class="form-inline" >
                    <div class="form-group">

                        <label>Personnel name</label>

                        <select name="employee_name">
                            <?php
                            $sql4="select top 10 * from employee";
                            $params = array();
                            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                            $query4= sqlsrv_query( $con, $sql4 , $params, $options );
                            $num_rows = sqlsrv_num_rows($query4);
                            while ($row4=sqlsrv_fetch_array($query4,SQLSRV_FETCH_ASSOC))
                                echo("<option value='".$row4['id_employee']."'> ".$row4['employee_name'].' '.$row4['employee_lname']."</option>");
                            ?>
                        </select>

                    </div>
                    <div class="form-group" >
                    <label>Choose project</label>

                    <select name="project_name">
                        <?php
                        $sql2_1="select top 10 * from project";
                        $params = array();

                        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                        $query2_1 = sqlsrv_query( $con, $sql2_1 , $params, $options );

                        $num_rows = sqlsrv_num_rows($query2_1);
                        while ($row2_1=sqlsrv_fetch_array($query2_1,SQLSRV_FETCH_ASSOC))
                            echo("<option value='".$row2_1['id_project']."'>" .$row2_1['project_name']."</option>");
                        ?>
                    </select>
                </div>
                <div class="form-group task">
                    <label>Choose manager</label>
                    <select name="manager_name">
                        <?php
                        $sql2="select top 10 * from manager";
                        $params = array();

                        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                        $query2 = sqlsrv_query( $con, $sql2 , $params, $options );

                        $num_rows = sqlsrv_num_rows($query2);
                        while ($row1=sqlsrv_fetch_array($query2,SQLSRV_FETCH_ASSOC))
                             echo("<option value='".$row1['id_manager']."'>".$row1['manager_name']."</option>");
                        ?>
                    </select>
                </div>
                <div class="form-group task">
                    <label>Starting date</label>
                    <input type="date" name="start_date"><br>

                </div>

                    <div class="col-sm-6">
                    <div class="col-sm-6">
                        <div class="form-group  " style="margin-left: -25px;">
                            <label>Status</label>
                            <select name="status">

                                <option>Not done</option>
                               </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="cont-block">
                            <label">Task name</label><br>
                            <textarea name="task_name"  placeholder="Task name"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">

                    <button type="submit" name="save" class="btn btn-success"><span>Add task</span></button>
                </div>
                </div>
            </form>
        </div>
    </div>

</section>
</body>
</html>
