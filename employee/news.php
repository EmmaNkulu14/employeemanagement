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
    <title>News</title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark-50 fixed-top" style="background-color: #00838f;color: white;">
    <ul class="item-nav navbar-nav  mr-auto" style="color:white;">
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
    <div class="media border p-3" style="margin:5% auto;width: 900px; height: inherit;">

        <div class="media-body" >
            <?php
            $sql13="select * from post order by date_post desc";
            $params = array();

            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

            $query13 = sqlsrv_query( $con, $sql13 , $params, $options );

            $num_rows = sqlsrv_num_rows($query13);


            while ($emp13 =sqlsrv_fetch_array($query13,SQLSRV_FETCH_ASSOC)) {
                ?>
                <div class="" style="margin-bottom: 15px;">

                    <h4 style="text-transform: capitalize;">Admin

                        <small> <i> Posted on <?php
                                $date=$emp13['date_post'];
                                echo date_format($date,"Y-m-d H:i:s");
                                ?></i></small>    <img img src="../src/profile.png" alt="" class="ml-3 mt-3 rounded-circle" style="width:60px;float: right;">
                    </h4>

                    <p style="font-size: 27px;color: black;font-weight: unset"><?php echo $emp13['post']?></p>

                </div>
                <?php
            }
            sqlsrv_free_stmt($query13);
            ?>
        </div>


    </div>

</section>
</body>
</html>
