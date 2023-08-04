
<?php
$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";

$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);

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
    <title>My profile</title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark-50 fixed-top" style="background-color: #00838f;">
    <ul class="item-nav navbar-nav  mr-auto">
        <li class="nav-item ">
            <a class="nav-link " href="homepage.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="managedata.php">Manage data</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="users.php">Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="chat.php">Chat</a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">Log out</a>
        </li>
    </ul>
</nav>

<section>
    <div class="container emp-profile">


        <form method="GET" action="process.php">
            <?php
            $id=$_GET['detail'];
            $sql="select employee_name,employee_date_of_birth,departement_name,employee_lname,employee_phone_num,id_employee,
       employee_grade,employee_email from employee ,department where id_employee='$id' and department.departement_id='$id' ";
            $params = array();

            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

            $query1 = sqlsrv_query( $con, $sql , $params, $options );

            $num_rows = sqlsrv_num_rows($query1);
            while ($row=sqlsrv_fetch_array($query1,SQLSRV_FETCH_ASSOC))
            {

            ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            Username: <?php echo  $row['employee_name']?>
                        </h5>
                        <h6>
                            <!-- Qualification -->
                        </h6>
                        <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class=" col-md-2">
                    <input type="submit" class="profile-edit-btn" name="sendmsg" value="Send message" style="color: black;margin-bottom: 10px;"><br>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>WORK LINK</p>
                        <a href="">Department of :</a><br/>
                        <?php echo  $row['departement_name']?>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo  $row['id_employee'];?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label> Last name</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo  $row['employee_lname'];?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo  $row['employee_email']?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo  $row['employee_phone_num']?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Background</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo  $row['employee_grade'];?></p>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Date of birth</label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <?php
                                        $date=$row['employee_date_of_birth'];
                                        echo date_format($date,"Y-m-d");
                                     ?>
                                    </p>

                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
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

