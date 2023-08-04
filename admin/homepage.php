<?php
session_start();

$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";
$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);
$sql="select * from manager";

$params = array();

$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$query = sqlsrv_query( $con, $sql , $params, $options );

$num_rows = sqlsrv_num_rows($query);

include_once "E:\management_project\admin\update_last_activity.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
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
    <title>Admin home</title>
</head>
<body>
<form method="GET" action="request.php">
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
                <a class="nav-link" id="logout" href="logout.php">Log out</a>
            </li>
        </ul>
    </nav>
</form>

<section>
    <div class="cont container-asset bg-dark">
        <div>
            <ul class="items nav flex-column ">
                <li class=" nav-item">
                    <?php
                    $id=$_GET['id'];

                    ?>
                    <a class="nav-link " href="tasks.php?id=<?php echo $id ?>">Prepare task</a>
                </li>


            </ul>
        </div>
    </div>
</section>

<section>
    <div class="cont container-tabs">
        <div class="container">
            <ul class="cont-nav nav nav-tabs"  role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">View project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu1">Manager list</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu2">Personnel list</a>
                </li>


            </ul>
            <div class="tab-content">

                <div id="home" class="container tab-pane active"><br>


                        <h3>Project list</h3>
                        <table class="table" style="margin-top: 3%">
                            <thead>
                            <tr>
                                <th>Project name</th>
                                <th>Type of project</th>
                                <th>Project description</th>
                                <th>Date of issue</th>
                                <th>Owner name</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sqlpr="select project_name,type_name ,project_description_manager,date_of_issue, client_name,client_lname from project,client,type_of_project where type_of_project.id_type=project.id_type and client.id_client=project.id_client";
                            $params = array();

                            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                            $querypr = sqlsrv_query( $con, $sqlpr , $params, $options );

                            $num_rowspr = sqlsrv_num_rows($querypr);


                            while ($pr =sqlsrv_fetch_array($querypr,SQLSRV_FETCH_ASSOC)) {
                            ?>
                            <tr>
                                <td><?php echo $pr['project_name']?></td>
                                <td><?php echo $pr['type_name']?></td>
                                <td style="width: 255px;"><?php echo $pr['project_description_manager']?></td>
                                <td>
                                    <?php
                                    $date=$pr['date_of_issue'];
                                    echo date_format($date,"Y-m-d");
                                    ?></td>
                                <td><?php echo $pr['client_name'] ,' ', $pr['client_lname']?></td>
                            </tr>
                            </tbody>
                            <?php
                            }
                            sqlsrv_free_stmt($querypr);
                            ?>

                        </table>
                </div>

                <div id="menu1" class="container tab-pane fade"><br>
                    <h3>List of managers</h3>

                    <table class="table">
                        <thead>
                        <tr>

                            <th>Manager name</th>
                            <th>Manager email</th>
                            <th>Manager phone number</th>

                        </tr>
                        </thead>

                        <tbody>
                        <?php
                            $sql_manager="select * from manager";
                        $query = sqlsrv_query( $con, $sql_manager , $params, $options );
                        while ($emp =sqlsrv_fetch_array($query,SQLSRV_FETCH_ASSOC)) {
                        ?>
                        <tr>


                            <td>
                                <?php echo $emp['manager_name']?>
                            </td>
                            <td>
                                <?php echo $emp['manager_email']?>
                            </td>
                            <td>
                                <?php echo $emp['manager_phone_number']?>
                            </td>
                        </tr>
                        </tbody>
                        <?php
                        }
                        sqlsrv_free_stmt($query);
                        ?>

                    </table>

                </div>
                <div id="menu2" class="container tab-pane fade"><br>
                    <h3>List of personnel</h3>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Background</th>
                            <th>Phone number</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sqllist="select top 10 * from employee";
                        $params = array();

                        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                        $querylist = sqlsrv_query( $con, $sqllist , $params, $options );

                        $num_rowsl = sqlsrv_num_rows($querylist);


                        while ($list =sqlsrv_fetch_array($querylist,SQLSRV_FETCH_ASSOC)) {
                        ?>
                        <tr>
                            <td><?php echo $list['employee_name']?></td>
                            <td><?php echo $list['employee_lname']?></td>
                            <td><?php echo $list['employee_grade']?></td>
                            <td><?php echo $list['employee_phone_num']?></td>

                        </tr>
                        </tbody>
                        <?php
                        }
                        sqlsrv_free_stmt($querylist);
                        ?>

                    </table>
                </div>
                <div id="menu3" class="container tab-pane fade"><br>
                    <h2>Menu 3</h2>

                </div>
            </div>
        </div>

    </div>
</section>
    </div>
</section>
<section>
    <div class="cont-slogan">
        <div class="text-slogan">
            <h5>OUR SLOGAN</h5>
            <p>DO IT RIGHT DO IT ONCE </p>
        </div>
    </div>
</section>




<section>
    <!-- Footer -->


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

    });

</script>
