<?php
$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";

$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
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
    <title>Feed back</title>
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
                <a class="nav-link" href="#">Log out</a>
            </li>
        </ul>
    </nav>
</form>

<section>

    <div id="feedback" class="container tab-pane active"><br>

            <div class="media border p-3" style="margin-bottom: 55px;">

                <div class="media-body" >
                    <?php
                    $sql13="select client_name,client_lname,feed,posted from feedback ,client where feedback.id_client=client.id_client order by posted desc";
                    $params = array();

                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                    $query13 = sqlsrv_query( $con, $sql13 , $params, $options );

                    $num_rows = sqlsrv_num_rows($query13);


                    while ($emp13 =sqlsrv_fetch_array($query13,SQLSRV_FETCH_ASSOC)) {
                        ?>
                        <div class="" style="margin-bottom: 55px;">

                            <h4 style="text-transform: capitalize;"><?php echo $emp13['client_name'].' '.$emp13['client_lname']?>

                                <small> <i> Posted on <?php
                                        $date=$emp13['posted'];
                                        echo date_format($date,"Y-m-d H:i:s");
                                        ?></i></small>    <img img src="../src/profile.png" alt="" class="ml-3 mt-3 rounded-circle" style="width:60px;float: right;">
                            </h4>

                            <p style="font-size: 27px;color: black;font-weight: unset"><?php echo $emp13['feed']?></p>

                        </div>
                        <?php
                    }
                    sqlsrv_free_stmt($query13);
                    ?>
                </div>


            </div>


    </div>

</section>
</body>
</html>
