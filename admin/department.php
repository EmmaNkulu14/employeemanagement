<?php
$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";

$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);
$sql="select * from department";
$params = array();

$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$query = sqlsrv_query( $con, $sql , $params, $options );

$num_rows = sqlsrv_num_rows($query);


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
<form method="GET" action="request.php">
    <nav class="navbar navbar-expand-sm navbar-dark-50 fixed-top" style="background-color: #00838f;">
        <ul class="item-nav navbar-nav  mr-auto">

            <li class="nav-item ">
                <a class="nav-link " href="homepage.php">Home</a>
            </li>
            <li class="nav-item">
                <?php
                $id=$_GET['id'];

                ?>
                <a class="nav-link" href="profile.php?id=<?php echo $id ?>">Profile</a>
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
</form>
<section>
    <div class="container" style="margin:10%; ">
    <table class="table">
        <thead>
        <tr>
            <th>Department name</th>
            <th>Phone number</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row =sqlsrv_fetch_array($query,SQLSRV_FETCH_ASSOC)) {
        ?>
            <tr>
                <td><?php echo $row['departement_name'];?></td>
                <td><?php echo $row['departement_phone'];?></td>
                <td><?php echo $row['departement_email'];?></td>
            </tr>
        </tbody>
        <?php
        }
        sqlsrv_free_stmt($query);
        ?>
    </table>
    </div>
</section>
</body>
</html>
