<?php

$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";

$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);
$sql_ma="select project_name, manager_name,part_of_manager,project_start_date,project_status
from manager,manager_project,project where manager_project.id_project=project.id_project and manager_project.id_project=manager.id_manager";
$params = array();

$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$query = sqlsrv_query( $con, $sql_ma , $params, $options );

$num_rows = sqlsrv_num_rows($query);


$per_page = 12;   // Per Page

$page  = 1;
require_once 'process.php';
$pr_result=sqlsrv_query($con,$sql_ma);
$total_record=sqlsrv_num_rows($pr_result);
$total_page=ceil($total_record/$per_page);
if(isset($_GET["Page"]))
{
    $page = $_GET["Page"];

}

$prev_page = $page-1;

$next_page = $page+1;

$row_start = (($per_page*$page)-$per_page);

if($num_rows<=$per_page)

{

    $num_pages =1;

}

else if(($num_rows % $per_page)==0)

{

    $num_pages =($num_rows/$per_page) ;

}
else

{

    $num_pages =($num_rows/$per_page)+1;

    $num_pages = (int)$num_pages;

}

$row_end = $per_page * $page;

if($row_end > $num_rows)
{

    $row_end = $num_rows;

}

$sql = " SELECT c.* FROM (
SELECT ROW_NUMBER() OVER(ORDER BY project_id) AS RowID,*  FROM part_of_job
) AS c
WHERE c.RowID > $row_start AND c.RowID <= $row_end

";
$query = sqlsrv_query( $con, $sql_ma );
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
            <a class="nav-link" href="#">Log out</a>
        </li>
    </ul>
</nav>
<section>



    <div class="container cont-task">
        <form action="process.php" method="GET">
            <h2 style="text-align: center">Manager task</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>Project name</th>
                    <th>manager name</th>
                    <th>task</th>
                    <th>Date of Begin</th>
                    <th>Status</th>

                </tr>
                </thead>

                <tbody>
                <?php
                while ($emp =sqlsrv_fetch_array($query,SQLSRV_FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $emp['project_name']?></td>
                    <td><?php echo $emp['manager_name']?></td>
                    <td><?php echo $emp['part_of_manager']?></td>
                    <td><?php
                        $date=$emp['project_start_date'];
                        echo date_format($date,"Y-m-d");?>
                    </td>

                    <td><?php echo $emp['project_status']?></td>
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

