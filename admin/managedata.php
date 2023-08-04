<?php
$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";
$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);
$sql="SELECT employee_name,employee_lname,employee_email,employee_date_of_birth,employee_grade,departement_name  FROM employee ,department where department.departement_id= employee.departement_id";
$params = array();
session_start();
$_SESSION['id']=$_GET['id'];
$id=$_SESSION['id'];
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$query = sqlsrv_query( $con, $sql , $params, $options );
$num_rows = sqlsrv_num_rows($query);
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
    <title>Manage data</title>
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
                <a class="nav-link" href="logout.php">Log out</a>
            </li>
        </ul>
    </nav>
</form>
<section>
    <div class="cont container-asset">
        <div>
            <ul class="items nav flex-column ">
                <li class="nav-item">
                    <?php
                    $id=$_GET['id'];

                    ?>
                    <a class="nav-link " href="tasks.php?id=<?php echo $id ?>">Prepare task</a>
                </li>
                <li class="nav-item">
                    <?php
                    $id=$_GET['id'];

                    ?>

                    <a class="nav-link" href="manager_project.php?id=<?php echo $id ?>">Manager of each project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal12">Project type</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal11">Manager information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal13">Department</a>
                </li>
            </ul>
        </div>
    </div>
</section>

<section>

    <div class="cont-data">
        <div class="cont-box">
            <div class="nav" >
                <!--New project -->

                <div class="pop">
                    <button style="background-color: #66bb6a;" data-toggle="modal" data-target="#myModal"><span class="t-p">Add project<br></span></button>
                    <div class="modal fade" id="myModal" >
                        <div class="modal-dialog"  >
                            <div class="modal-content" style="width: 950px;height: 500px;margin: 0% -15%;">
                                <div class="profile-edit" >
                                </div>
                                <form  method="post" id="userform" action="process.php?id=<?php echo $id ?>">
                                <div class="tab-content">
                                    <div id="home" class="container tab-pane active"><br>
                                        <h3>New project</h3>

                                    </div>

                                    <div class="new-project">
                                      <div class="proj-form">
                                        <label>Project type</label>
                                        <select id="type" name="type">
                                            <?php
                                            $sql15="select * from type_of_project";
                                            $params = array();
                                            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                                            $query15= sqlsrv_query( $con, $sql15 , $params, $options );
                                            $num_rows = sqlsrv_num_rows($query15);
                                            while ($row15=sqlsrv_fetch_array($query15,SQLSRV_FETCH_ASSOC))
                                                echo("<option value='".$row15['id_type']."'>".$row15['type_name']."</option>");
                                            ?>
                                        </select>
                                      </div>
                                        <div class="proj-form">
                                        <label>Client First name</label>
                                        <select id="client" name="client">
                                            <?php
                                            $sql16="select * from client";
                                            $params = array();
                                            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                                            $query16= sqlsrv_query( $con, $sql16 , $params, $options );
                                            $num_rows = sqlsrv_num_rows($query16);
                                            while ($row16=sqlsrv_fetch_array($query16,SQLSRV_FETCH_ASSOC))
                                                echo("<option value='".$row16['id_client']."'>".$row16['client_name'].' '.$row16['client_lname']."</option>");
                                            ?>
                                        </select>
                                        </div>
                                        <div class="proj-form">
                                            <label >Starting date</label>
                                            <input  type="date" id="start_date" name="start_date"><br>
                                        </div>

                                    </div>
                                    <div class="new-project1">


                                        <div class="proj-form" style="margin-left: 25px;">
                                            <label>Project name</label>
                                            <input type="text" id="name" name="name" placeholder="project name" style="margin-left: 35px;">
                                        </div>


                                    </div>

                                    <div class="text-area">
                                        <textarea id="description" name="description" style="width: 600px;height:100px" placeholder="type project description"></textarea>
                                    </div>
                                </div>

                                <div class="btn-pro">
                                    <b id="msg"></b>
                                    <button  class="btn btn-secondary"  id="new-project" name="new-project" style="height: 40px;background-color: #00b8d4;align-content: center;"><span>Save</span></button>

                                </div>
                            </form>
                                <p id="result"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Delete project-->

                <div class="pop">
                    <button style="background-color: #fb8c00;" data-toggle="modal" data-target="#myModal1"><span class="t-p">delete project</span><br><i class="fa fa-list" ></i></button>
                    <div class="modal fade" id="myModal1" >
                        <div class="modal-dialog"  >
                            <div class="modal-content" style="width: 800px;height: inherit;">
                                <div id="list-of-users" class="container tab-pane active"><br>
                                    <form action="process.php?id=<?php echo $id?>" method="POST">
                                    <h3> delete project</h3>

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Project name</th>

                                            <th>Project description</th>
                                            <th>Date of issue</th>


                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $sql1="select * from project";
                                        $params = array();

                                        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                                        $query1 = sqlsrv_query( $con, $sql1 , $params, $options );

                                        $num_rows = sqlsrv_num_rows($query1);


                                        while ($emp1 =sqlsrv_fetch_array($query1,SQLSRV_FETCH_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $emp1['project_name']?></td>

                                            <td><?php echo $emp1['project_description_manager']?></td>
                                            <td>
                                                <?php
                                                $date=$emp1['date_of_issue'];
                                                echo date_format($date,"Y-m-d");
                                                ?></td>
                                            <td>

                                                <button value="<?php echo $emp1['id_project'];?>"  name="project" class="btn btn-secondary" style="height: 40px;background-color: red;align-content: center;"><span>Delete</span></button>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <?php
                                        }
                                        sqlsrv_free_stmt($query1);
                                        ?>

                                    </table>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"  style="height: 40px;background-color: #00b8d4;margin-top: inherit;position:relative" data-dismiss="modal"><span>Close</span></button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <!--Feedback-->

                <div class="pop" style="margin-top: 25px;height: 105px;width: 140px;margin: 5px 5px; border: none;background-color: #26c6da; border: none; color: white;"><br>
                    <a href="feedback.php?id=<?php echo $id ?>"  style="color: white;align-content: center;margin: 25px 0px;"><span class="t-p">Feedback</span><br><i class="fa fa-paper-plane" ></i></a>

                </div>  <div class="pop" style="margin-top: 25px;height: 105px;width: 140px;margin: 5px 5px; border: none;background-color: red; border: none; color: white;"><br>
                    <a href="edit_tasks.php?id=<?php echo $id ?>"  style="color: white;align-content: center;margin: 25px 0px;"><span class="t-p">Update</span><br><i class="fa fa-pen" ></i></a>

                </div>
                <!--Update-->
                <div class="pop">
                    <button style="background-color: #212121;align-content: center;" data-toggle="modal" data-target="#myModal3"><span class="t-p">Post news</span><br><i class="fa fa-plus"></i></button>
                    <div class="modal fade" id="myModal3" >
                        <div class="modal-dialog"  >
                        <form action="process.php?id=<?php echo $id?>" method="POST">
                            <div class="modal-content" style="width: 900px; height: 350px; text-align: center;margin-left: -15%;">

                                <h3>Post</h3>

                                <div class="text-area" style="margin-top: 0%;">
                                    <p style="margin-left: 30%;text-align: left;margin-top: 3%;color: black;">Write down information about holidays and news of the company it willl be availale <br>on the timeline of managers and personnel</p>
                                    <textarea style="width: 600px;height:100px;margin-left:15%;border: 0.01pc solid black;" name="post" placeholder="type project description"></textarea>
                                </div>


                            <div class="btn">
                                <input type="submit" class="btn btn-secondary"  name="new-post" style="width:90px;height: 40px;background-color: #00b8d4;align-content: center;float:left;margin-left: 13%;" value="post">

                            </div>


                            </div>
                        </form>
                        </div>
                    </div>
                </div>

                <!--ici-->




                <div class="pop">
                    <div>
                        <button style="background: #bdbdbd;" data-toggle="modal" data-target="#myModal5"><span class="t-p" style="color: black">Information</span><br></button>
                        <div class="modal fade" id="myModal5" >
                            <div class="modal-dialog"  >
                                <div class="modal-content" style="width: inherit; height: 150px;">
                                    <h3>Information about personel </h3>

                                    <div class="info" style="margin-top: 2%;margin-left: -5%;">
                                        <?php
                                        $sql_count="select count(id_employee) as total from employee ";
                                        $params = array();

                                        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                                        $query_count = sqlsrv_query( $con, $sql_count , $params, $options );

                                        $num_rows = sqlsrv_num_rows($query_count);


                                        while ($count =sqlsrv_fetch_array($query_count,SQLSRV_FETCH_ASSOC)) {
                                            ?>

                                            <p style="margin-left: -10%;">Total number of personnel is <?php echo $count['total'];?></p>
                                            <?php
                                        }
                                        sqlsrv_free_stmt($query_count);
                                        ?>
                                    </div>
                                    <div class="info" style="margin-top: 2%;margin-left: -5%;">
                                        <?php
                                        $sql_count1="select count(id_manager) as total from manager ";
                                        $params = array();

                                        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                                        $query_count1 = sqlsrv_query( $con, $sql_count1 , $params, $options );

                                        $num_rows1 = sqlsrv_num_rows($query_count1);


                                        while ($count1 =sqlsrv_fetch_array($query_count1,SQLSRV_FETCH_ASSOC)) {
                                            ?>

                                            <p style="margin-left: -10%;">Total number of manager is <?php echo $count1['total'];?></p>
                                            <?php
                                        }
                                        sqlsrv_free_stmt($query_count1);
                                        ?>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>



                <!-- Information count -->




            </div>
            <div class="nav nav-1">
                <div class="pop">

                    <button style="background-color: #00b8d4;" data-toggle="modal" data-target="#myModal6">Project list
                        <i class="fa fa-folder"></i>
                    </button>
                    <div class="modal fade" id="myModal6" >
                        <div class="modal-dialog"  >
                            <div class="modal-content" style="width:800px;height:inherit">
                                <div id="list-of-project" class="container tab-pane active"><br>
                                    <h3>Project list</h3>
                                    <table class="table">
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
                                        $sql1="select project_name,type_name ,project_description_manager,date_of_issue, client_name,client_lname from project,client,type_of_project where type_of_project.id_type=project.id_type and client.id_client=project.id_client";
                                        $params = array();

                                        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                                        $query1 = sqlsrv_query( $con, $sql1 , $params, $options );

                                        $num_rows = sqlsrv_num_rows($query1);


                                        while ($emp1 =sqlsrv_fetch_array($query1,SQLSRV_FETCH_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $emp1['project_name']?></td>
                                            <td><?php echo $emp1['type_name']?></td>
                                            <td><?php echo $emp1['project_description_manager']?></td>
                                            <td>
                                                <?php
                                                $date=$emp1['date_of_issue'];
                                                echo date_format($date,"Y-m-d");
                                                ?></td>
                                            <td><?php echo $emp1['client_name'] ,' ', $emp1['client_lname']?></td>
                                        </tr>
                                        </tbody>
                                        <?php
                                        }
                                        sqlsrv_free_stmt($query1);
                                        ?>

                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"  style="height: 40px;background-color: #00b8d4; margin-top: inherit;position:relative" data-dismiss="modal"><span>Close</span></button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Project list-->



                <div class="pop">
                    <button style="background-color: #004d40;" data-toggle="modal" data-target="#myModal7">Personnel list <i class="fa fa-clock"></i> </button>
                    <div class="modal fade" id="myModal7" >
                        <div class="modal-dialog"  >

                            <div class="modal-content" style="width: 750px;height: inherit">
                                <h3>Personnel list</h3>
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
                                    $sqllist=" select top 10 * from employee";
                                    $params = array();

                                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                                    $querylist = sqlsrv_query( $con, $sqllist , $params, $options );

                                    $num_rows_l = sqlsrv_num_rows($querylist);


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




                        </div>
                    </div>
                </div>


                <!--Personnel list-->


                <div class="pop">
                    <button style="background-color: #e65100;" data-toggle="modal" data-target="#myModal8" >Manager task <i class="fa">&#xf19c;</i> </button>
                    <div class="modal fade" id="myModal8" >
                        <div class="modal-dialog"  >
                            <div class="modal-content" style="width: 950px;height: 500px;margin: 0% -15%;">

                                <form  method="post"  action="process.php?id=<?php echo $id ?>">
                                    <div class="tab-content">
                                        <div id="home" class="container tab-pane active"><br>
                                            <h3>New Task</h3>

                                        </div>

                                        <div class="new-project">
                                            <div class="proj-form">
                                                <label>Manager name</label>
                                                <select id="type" name="name">
                                                    <?php
                                                    $sql15="select top 10 * from manager";
                                                    $params = array();
                                                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                                                    $query15= sqlsrv_query( $con, $sql15 , $params, $options );
                                                    $num_rows = sqlsrv_num_rows($query15);
                                                    while ($row15=sqlsrv_fetch_array($query15,SQLSRV_FETCH_ASSOC))
                                                        echo("<option value='".$row15['id_manager']."'>".$row15['manager_name']."</option>");
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="proj-form">
                                                <label>Project </label>
                                                <select id="client" name="p_name">
                                                    <?php
                                                    $sql16="select * from project";
                                                    $params = array();
                                                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                                                    $query16= sqlsrv_query( $con, $sql16 , $params, $options );
                                                    $num_rows = sqlsrv_num_rows($query16);
                                                    while ($row16=sqlsrv_fetch_array($query16,SQLSRV_FETCH_ASSOC))
                                                        echo("<option value='".$row16['id_project']."'>".$row16['project_name']."</option>");
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="proj-form">
                                                <label >Starting date</label>
                                                <input  type="date" id="start_date" name="start_date"><br>
                                            </div>

                                        </div>
                                        <div class="new-project1">


                                            <div class="proj-form" style="margin-left: 25px;">
                                                <label>Description of task </label>
                                                <input type="text" id="name" name="part" placeholder="project name" style="margin-left: 35px;">
                                            </div>

                                            <div class="proj-form" style="margin-left: 5px;">
                                            <label style="margin-left: 5px;">Status</label>
                                            <select style="margin-top: 6px;" name="status">

                                                <option>Not done</option>
                                            </select>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="btn-pro">
                                        <b id="msg"></b>
                                        <button  class="btn btn-secondary"  id="new-task" name="new-task" style="width:170px;height: 40px;background-color: #00b8d4;align-content: center;float: left;margin-left: 40%;"><span>Save</span></button>

                                    </div>
                                </form>




                            </div>

                        </div>
                    </div>
                </div>

                <!--MAnager task-->
                <div class="pop" data-toggle="modal" data-target="#myModal10">
                    <div class="modal fade" id="myModal10" >
                        <div class="modal-dialog"  >
                            <div class="modal-content" style="width: 750px; height: inherit;float: left">


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"  button type="button" class="btn btn-secondary"  style="height: 40px;background-color: #00b8d4;margin-top: inherit;position:relative" data-dismiss="modal"><span>Close</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pop" data-toggle="modal" data-target="#myModal11">
                    <div class="modal fade" id="myModal11" >
                        <div class="modal-dialog"  >
                            <div class="modal-content" style="width: 750px; height: inherit;float: left">
                                <div class="tab-content">
                                    <div id="client-list" class="container tab-pane active"><br>
                                        <h3>Manager information</h3>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Manager ID</th>
                                                <th>Manager name</th>
                                                <th>Manager email</th>
                                                <th>Manager phone number</th>


                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $sql5="select * from manager";
                                            $params = array();

                                            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                                            $query5 = sqlsrv_query( $con, $sql5, $params, $options );

                                            $num_rows = sqlsrv_num_rows($query5);


                                            while ($emp5 =sqlsrv_fetch_array($query5,SQLSRV_FETCH_ASSOC)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $emp5['id_manager'];?></td>

                                                <td><?php echo $emp5['manager_name'];?> days</td>
                                                <td><?php echo $emp5['manager_email'];?> months</td>
                                                <td><?php echo $emp5['manager_phone_number'];?> months</td>
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            sqlsrv_free_stmt($query5);
                                            ?>

                                        </table>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"  button type="button" class="btn btn-secondary"  style="height: 40px;background-color: #00b8d4;margin-top: inherit;position:relative" data-dismiss="modal"><span>Close</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pop" data-toggle="modal" data-target="#myModal12">
                    <div class="modal fade" id="myModal12" >
                        <div class="modal-dialog"  >
                            <div class="modal-content" style="width: 600px; height: inherit;float: left">
                                <div class="tab-content">
                                    <div id="client-list" class="container tab-pane active"><br>
                                        <h3>Project type</h3>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Type id</th>
                                                <th>Project type name</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $sql6="select * from type_of_project";
                                            $params = array();

                                            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                                            $query6 = sqlsrv_query( $con, $sql6, $params, $options );

                                            $num_rows = sqlsrv_num_rows($query6);


                                            while ($emp6 =sqlsrv_fetch_array($query6,SQLSRV_FETCH_ASSOC)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $emp6['id_type'];?></td>

                                                <td><?php echo $emp6['type_name'];?> days</td>
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            sqlsrv_free_stmt($query6);
                                            ?>

                                        </table>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"  button type="button" class="btn btn-secondary"  style="height: 40px;background-color: #00b8d4;margin-top: inherit;position:relative" data-dismiss="modal"><span>Close</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pop" data-toggle="modal" data-target="#myModal13">
                    <div class="modal fade" id="myModal13" >
                        <div class="modal-dialog"  >
                            <div class="modal-content" style="width: 750px; height: inherit;float: left">
                                <div class="tab-content">
                                    <div id="home2" class="container tab-pane active"><br>
                                        <h3>Department</h3>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Department name</th>
                                                <th>phone number</th>
                                                <th>Email</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $sql2="select * from department";
                                            $params = array();

                                            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                                            $query2 = sqlsrv_query( $con, $sql2 , $params, $options );

                                            $num_rows = sqlsrv_num_rows($query2);


                                            while ($emp2 =sqlsrv_fetch_array($query2,SQLSRV_FETCH_ASSOC)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $emp2['departement_name']?></td>
                                                <td><?php echo $emp2['departement_phone']?></td>
                                                <td><?php echo $emp2['departement_email']?></td>
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            sqlsrv_free_stmt($query2);
                                            ?>

                                        </table>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"  button type="button" class="btn btn-secondary"  style="height: 40px;background-color: #00b8d4;margin-top: inherit;position:relative" data-dismiss="modal"><span>Close</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Client list -->

                <div class="pop">
                    <button style="background-color:#d50000; " data-toggle="modal" data-target="#myModal9">Client list <i class="fa ">&#xf0ca;</i> </button>
                    <div class="modal fade" id="myModal9" >
                        <div class="modal-dialog"  >
                            <div class="modal-content" style="width: 800px; height: inherit">
                                <div class="tab-content">
                                    <div id="client-list" class="container tab-pane active"><br>
                                        <h3>Client list</h3>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>First name</th>
                                                <th>Last name</th>
                                                <th>Phone number</th>
                                                <th>Country</th>
                                                <th>City</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $sql3="select client_name,client_lname, client_phone ,country_name, city_name from client,countries,cities where client.id_city=cities.id_city and countries.id_country=cities.id_country";
                                            $params = array();

                                            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                                            $query3 = sqlsrv_query( $con, $sql3 , $params, $options );

                                            $num_rows = sqlsrv_num_rows($query3);


                                            while ($emp3 =sqlsrv_fetch_array($query3,SQLSRV_FETCH_ASSOC)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $emp3['client_name']?></td>
                                                <td><?php echo $emp3['client_lname']?></td>
                                                <td><?php echo $emp3['client_phone']?></td>
                                                <td><?php echo $emp3['country_name']?></td>
                                                <td><?php echo $emp3['city_name']?></td>
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            sqlsrv_free_stmt($query3);
                                            ?>

                                        </table>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"  button type="button" class="btn btn-secondary"  style="height: 40px;background-color: #00b8d4;margin-top: inherit;position:relative" data-dismiss="modal"><span>Close</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
<section>

    <div class="chart-container">
        <div class="row">
            <div class="col col-md-6 col-sm-6 col-xs-12">
                <h3 style="text-align: center">Monthly project</h3>
                <canvas id="lineChart"></canvas>
            </div>
            <div class="col col-md-6 col-sm-6 col-xs-12" style=" border-left: 1px solid black;">
                <h3 style="text-align: center">Client by country</h3>
                <canvas id="doughnutChart"></canvas>
            </div>
        </div>
    </div>

</section>
<section>
    <div class="cont-slogan-manage">
        <div class="text-slogan" >
            <h5>OUR SLOGAN</h5>
            <p>DO IT RIGHT DO IT ONCE </p>
        </div>
    </div>
</section>

<script type="text/javascript">

    //insert





    // $(document).ready(function ()
    // {
    //     $('new-project').click(function () {
    //         var data=$('#userform').serialize()+'&new-project=new-project';
    //         $.ajax({
    //             url:'E:\management_project\admin\process.php',
    //             type:'post',
    //             data:data,
    //             success:function (response) {
    //                $('#msg').text(response);
    //             }
    //         });
    //     });
    //
    // });
    //

    //line
    var ctxL = document.getElementById("lineChart").getContext('2d');
    var myLineChart = new Chart(ctxL, {
        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "My First dataset",
                data: [65, 59, 80, 81, 56, 55, 40],
                backgroundColor: [
                    'rgba(105, 0, 132, .2)',
                ],

                borderColor: [
                    'rgba(200, 99, 132, .7)',
                ],
                borderWidth: 2
            },
                {
                    label: "My Second dataset",
                    data: [28, 48, 40, 19, 86, 27, 90],
                    backgroundColor: [
                        'rgba(0, 137, 132, .2)',
                    ],
                    borderColor: [
                        'rgba(0, 10, 130, .7)',
                    ],
                    borderWidth: 2
                }
            ]
        },
        options: {
            responsive: true
        }
    });
    //doughnut
    var ctxD = document.getElementById("doughnutChart").getContext('2d');
    var LineChart1 = new Chart(ctxD, {
        type: 'doughnut',
        data: {
            labels: ["Belarus", "Russia", "poland", "France", "England"],
            datasets: [{
                data: [300, 50, 100, 40, 120],
                backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
            }]
        },
        options: {
            responsive: true
        }
    });



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
</body>
</html>

