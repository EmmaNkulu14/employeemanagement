<?php
$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";
$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);
$sql="";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$query = sqlsrv_query( $con, $sql , $params, $options );
$num_rows = sqlsrv_num_rows($query);
session_start();
$_SESSION['id']=$_GET['id'];
$id=$_SESSION['id'];
require_once "../employee/process.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../manager/css/css.css">
    <link rel="stylesheet" href="../admin/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <script type="text/javascript" src="js/chart.js"></script>
    <script type="text/javascript" src="jquery-3.5.1.js"></script>
    <title>Work</title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark-50 fixed-top" style="background-color: #00838f;">
    <ul class="item-nav navbar-nav  mr-auto">
        <li class="nav-item">
            <?php
            $id=$_GET['id'];

            ?>

            <a class="nav-link" href="myproject.php?id=<?php echo $id ?>">My project</a>

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

            <a class="nav-link" href="news.php?id=<?php echo $id ?>">news</a>
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

            <a class="nav-link" href="..\admin\logout.php">Log out</a>
        </li>
    </ul>
</nav>
<section>
    <div class="cont container-asset">
        <div>
            <ul class="items nav flex-column ">

                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal11">Done</a>

                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal11">Not done</a>

                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal11">In progress</a>

                </li>

            </ul>
        </div>
    </div>
</section>

<section>
    <div class="" style="margin: 8% 25%;">
        <div class="" style="width: 950px;height: 500px;">

            <form action="" method="GET">
                <h2 style="text-align: center">List of tasks</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Task name</th>
                        <th>Start date</th>
                        <th>Status</th>
                        <th>Report</th>

                    </tr>

                    </thead>

                    <tbody>
                    <?php

    $id=$_GET['id'];
    $sql3="select * from part_of_job where part_of_job.id_employee='$id' and status_of_project !='done' ";
    $params = array();

    $options =array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

    $query3 = sqlsrv_query( $con, $sql3 , $params, $options );

    $num_rows = sqlsrv_num_rows($query3);
    while ($emp=sqlsrv_fetch_array($query3,SQLSRV_FETCH_ASSOC)) {

                    ?>
                    <tr>
                        <td><?php echo $emp['project_id']?></td>
                        <td><?php echo $emp['task']?></td>
                        <td><?php echo $emp['status_of_project']?></td>
                        <td><?php
                            $date=$emp['starting_date'];
                            echo date_format($date,"Y-m-d");?></td>
                        <td>
                            <a class="btn get_id" data-toggle="modal" data-target="#myModal"  data-id="<?php echo $emp['project_id']?>" class="edit" style="background-color: black;width: 170px;height: 45px; color: white"  ><i class="fa fa-pen"></i><span>Write report</span></a>
                        </td>

                    </tbody>
                    <?php
                    }
                    sqlsrv_free_stmt($query3);
                    ?>
                </table>
            </form>
            <div class="modal fade" id="myModal" >
                <div class="modal-dialog" style="margin:5% 20%;" >
                    <div class="modal-content" style="width: 1000px; height:615px;float: left;" id="load_data">

                </div>
            </div>




        </div>

    </div>


</section>

</div>
</body>
</html>

<script>
    $(document).ready(function(){
        $(".get_id").click(function () {

            var ids=$(this).data('id');
            $.ajax({
                url:"../employee/request.php",
                method:'POST',
                data:{id:ids},
                success:function (data){
                    $('#load_data').html(data);
                }
            })
        }) ;
    });
</script>