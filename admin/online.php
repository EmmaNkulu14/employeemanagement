<?php
session_start();
$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";

$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);
include_once "E:\management_project\admin\connect.php";
include_once "E:\management_project\admin\update_last_activity.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Online users</title>
</head>
<body>
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
        <li class="nav-item">
            <?php
            $id=$_GET['id'];

            ?>

            <a class="nav-link" href="online.php?id=<?php echo $id ?>">Online</a>
        </li>

    </ul>
    <ul class="navbar-nav">
        <li class="nav-item">
            <?php
            $id=$_GET['id'];

            ?>

            <a class="nav-link" href="logout.php?id=<?php echo $id ?>" name="logout">Log out</a>
        </li>
    </ul>
</nav>


<section>

    <div class="container emp-profile cont-task" id="user_details">
        <form method="GET" action="process.php">

            <?php
            $time=time();
            $id=$_GET['id'];
            $sql="select * from login where id_credential!='$id' ";
            $params = array();
            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
            $query = sqlsrv_query( $con, $sql , $params, $options );
            $num_rows = sqlsrv_num_rows($query);

            while ($row=sqlsrv_fetch_array($query,SQLSRV_FETCH_ASSOC)) {

                $status = '<span class="label" style="height: 15px; width: 15px;  background: red; float: right; border-radius: 50%;"></span>';

                if ($row['last_login'] > $time) {
                    $status = '<span class="label" style="height: 15px; width: 15px;  background-color: green; float: right; border-radius: 50%;"></span>';
                } else {
                    $status = '<span class="label" style="height:15px; width: 15px;  background-color: red;  float: right; border-radius: 50%;"></span>';
                }
                echo "<a href='chat.php?id=".$row['id_credential']."' name='detail' style='font-size: 20px;padding: 10px; text-transform: capitalize;'>".$row['username'].' '.$status."<br></a>";

            }
            ?>



        </form>
    </div>



</section>

<section>
    <div class="cont-slogan" style="margin-top: -450px;">
        <div class="text-slogan">
            <h5>OUR SLOGAN</h5>
            <p>DO IT RIGHT DO IT ONCE </p>
        </div>
    </div>
</section>
<section class="ft-pr" style="margin-top: 25px;">
    <!-- Footer -->
    <footer class="foot page-footer font-small bg-dark pt-4">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">

                    <!-- Content -->
                    <h5 class="text-uppercase">Footer Content</h5>
                    <p>Here you can use rows and columns to organize your footer content.</p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
    </footer>
</section>

</body>
</html>
<script>
    $(document).ready(function(){


        function update_last_activity()
        {
            $.ajax({
                url:"update_last_activity.php",
                success:function()
                {

                }
            });
        }
        setInterval(function(){
            update_last_activity();

        }, 5000);

    });

</script>