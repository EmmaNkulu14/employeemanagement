<?php
$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";

$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);

if(isset($_POST['save'])) {
    $_SESSION['id']=$_POST['id'];


    $task = $_POST['task_name'];
    $project_id=$_POST['save'];

    $start_date =date('Y-m-d');
    $sql = "INSERT INTO report(report,report_date,project_id,id_employee)VALUES('$task','$start_date','$project_id','$id') ";
    $stmt= (sqlsrv_query($con,$sql));
    if ( $stmt )
    {
        $something = "Submission successful.";
    }
    else
    {
        $something = "Submission unsuccessful.";
        die( print_r( sqlsrv_errors(), true));
    }
    $output=$something;
    /* Free statement and connection resources. */
    sqlsrv_free_stmt( $stmt);
    sqlsrv_close( $con);
    header("Location: myproject.php?id=");}

?>