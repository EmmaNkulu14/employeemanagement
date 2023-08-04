<?php
$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";

$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);
session_start();
if(isset($_POST['save'])) {
    $_SESSION['id']=$_GET['id'];
    $id_save=$_SESSION['id'];
    $id_s=$id_save;
    $project_name = $_POST['project_name'];
    $task = $_POST['task_name'];
    $employee_name = $_POST['employee_name'];
    $manager_name = $_POST['manager_name'];
    $status = $_POST['status'];
    $start_date = $_POST['start_date'];
    $sql = "INSERT INTO part_of_job(id_project_manager, id_employee,starting_date, task,status_of_project)VALUES('$manager_name','$employee_name','$start_date','$task','$status') ";
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
    header("Location: edit_tasks.php?id=$id_s" );
}

//DELETE task

if(isset($_POST['delete'])) {
    $_SESSION['id']=$_GET['id'];
    $del=$_SESSION['id'];
    $id_del=$del;

    $project_id=$_POST['delete'];
    $sql1="DELETE  FROM part_of_job where project_id='$project_id' ";
    $stmt1=(sqlsrv_query($con,$sql1));
    if ( $stmt1 )
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
    sqlsrv_free_stmt( $stmt1);
    sqlsrv_close( $con);
    header("Location: edit_tasks.php?id=$id_del");
}

 //add project
if(isset($_POST['new-project']))
{
    $_SESSION['id']=$_GET['id'];
    $id_add=$_SESSION['id'];


    $type=$_POST['type'];
 $client=$_POST['client'];
$name=$_POST['name'];
$date=$_POST['start_date'];
$description=$_POST['description'];
$sql_insert="INSERT INTO PROJECT(id_type,id_client,project_name,date_of_issue,project_description_manager)VALUES('$type','$client','$name','$date','$description')";
    $stmt_insert= (sqlsrv_query($con,$sql_insert));
    if ( $stmt_insert )
    {
        echo "Submission successful.";
    }
    else
    {
        echo "Submission unsuccessful.";
        die( print_r( sqlsrv_errors(), true));
    }

    /* Free statement and connection resources. */
    sqlsrv_free_stmt( $stmt_insert);
    sqlsrv_close( $con);
    header("Location: managedata.php?id=$id_add");
}

// delete project
if(isset($_POST['project'])) {
    $_SESSION['id']=$_GET['id'];
    $id_ad=$_SESSION['id'];
    $id=$id_ad;
    $project=$_POST['project'];

    $sql_delete="DELETE FROM project where id_project='$project' ";
    $stmt_delete=(sqlsrv_query($con,$sql_delete));
    if ( $stmt_delete )
    {

        $something = "Submission successful.";
    }
    else
    {
        $something = "Submission unsuccessful";
        die( print_r( sqlsrv_errors(), true));
    }
    $output=$something;
    /* Free statement and connection resources. */
    sqlsrv_free_stmt( $stmt_delete);
    sqlsrv_close( $con);
    header("Location: managedata.php?id=$id");
}

// new post
if(isset($_POST['new-post']))
{

    $_SESSION['id']=$_GET['id'];
    $id_admin=$_SESSION['id'];
    $post=$_POST['post'];
    $date=getdate();

    $sql_post="INSERT INTO post(id_admin,post,date_post)VALUES('$id_admin','$post',getdate())";
    $stmt_post= (sqlsrv_query($con,$sql_post));
    if ( $stmt_post )
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
    sqlsrv_free_stmt( $stmt_post);
    sqlsrv_close( $con);
    header("Location:managedata.php?id=$id_admin");

}
// task mnanger
if(isset($_POST['new-task']))
{
    $_SESSION['id']=$_GET['id'];
    $id_task=$_SESSION['id'];


    $name=$_POST['name'];
    $p_name=$_POST['p_name'];
    $date=$_POST['start_date'];
    $part=$_POST['part'];
    $state=$_POST['status'];
    $description=$_POST['description'];
    $sql_insert1="INSERT INTO manager_project(id_manager,id_project,part_of_manager,project_status,project_start_date)
    VALUES('$name','$p_name','$part','$state','$date')";
    $stmt_insert1= (sqlsrv_query($con,$sql_insert1));
    if ( $stmt_insert1 )
    {
        echo "Submission successful.";
    }
    else
    {
        echo "Submission unsuccessful.";
        die( print_r( sqlsrv_errors(), true));
    }

    /* Free statement and connection resources. */
    sqlsrv_free_stmt( $stmt_insert1);
    sqlsrv_close( $con);
    header("Location: managedata.php?id=$id_task");
}



?>
