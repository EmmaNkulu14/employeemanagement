<?php

include_once "connect.php";

$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";
$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <meta name="Description" content="organizations record the working hours of hourly employees and ensure those employees are compensated accurately for their time">
    <meta name="Keywords" content="resource planning,employee management sysem,hrms">

    <title>Home page</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-sm navbar-dark-50 fixed-top" style="background-color: black;">
        <ul class="item-nav navbar-nav  mr-auto">
            <li class="nav-item">
                <?php
                $id=$_GET['id'];

                ?>
                <a  class="nav-link" href="homepage.php?id=<?php echo $id ?>">Home</a></li>
            <li class="nav-item">
                <?php
                $id=$_GET['id'];

                ?>
                <a  class="nav-link" href="achievment.php?id=<?php echo $id ?>">Achievement</a></li>

            <li class="nav-item">
                <?php
                $id=$_GET['id'];

                ?>
                <a  class="nav-link" href="#footer">Contact us</a></li>


        </ul>
        <ul class="navbar-nav">
            <li class="nav-item"><a  class="nav-link" href="login.php">sign out</a></li>

        </ul>
    </nav>
</div>
<section>
    <div id="feedback" class="container-feedback tab-pane active"><br>

        <div class="container mt-3">

            <div class="feedback" style="margin-left: 140px;margin-top:-80px;margin-bottom: 80px;">
                <form method="POST" action="request.php?id=<?php echo $id;?>">
                <textarea style="width: 780px;height:120px;border: 1px solid gray; color: black;border-radius: 1%;" name="feed" placeholder="post your feedback" ></textarea>
                <button type="submit" name="post" class="btn btn-success" style="width: 80px;margin-top: -75px;"><span>Post</span></button>
                </form>
            </div>



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




        </div>

</section>
<section class="ft-pr" id="footer" style="margin-top: 350px;background-color: #212121;color: white">
    <!-- Footer -->
    <footer class="foot page-footer pt-4">


        <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">

                    <!-- Content -->
                    <h5 class="text-uppercase">About us.</h5>
                    <p>Dallia tech is a private company based on the design <br>of new technology and marketing advise <br>we are based in lubumbashi haut atanga .</p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">contact</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">+37512512560</a>
                        </li>
                        <li>
                            <a href="#!">+375295423689</a>
                        </li>
                        <li>
                            <a href="#!">dalliatech@gmail.com</a>
                        </li>

                    </ul>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">Address</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">22,St thoms street,lubumbashi town,<br>haut katanga state,DRC </a>
                        </li>
                                 </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2021 Copyright:
            <a href="https://mdbootstrap.com/">dalliatech.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
    </footer>
</section>
</body>
</html>
