<?php


$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";
$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);


session_start();
if(isset($_POST['Login']))
{
    if(empty($_POST['username']) || empty($_POST['password']))
    {
        header("location:login.php?Empty= Please Fill in the Blanks");
    }
    else {
        $id = $_POST['id'];

        $name=$_POST['username'];
        $id=$_POST['id'];
        $pass=$_POST['password'];
        $sql="select * from login where username='$name' and password='$pass'";
        $params = array();

        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

        $query = sqlsrv_query( $con, $sql , $params, $options );
        $num_rows = sqlsrv_num_rows($query);
        $row=sqlsrv_fetch_array($query);

        if(isset($row['id_client']) and $row['id_client']>0  ) {
            $_SESSION['username'] = $name;
            if ($row['role'] == "client") {
                header("location:homepage.php?id=" . $row['id_client']);
            }
        }
        else
        {
            header("location:login.php?Invalid= Please Enter Correct User Name and Password ");
        }
    }
}

if(isset($_POST['post']))
{
    $_SESSION['id']=$_GET['id'];
    $id=$_SESSION['id'];
    echo $id;
    $name=$_POST['feed'];
    $date=getdate();
    $sql1="insert into feedback(id_client,feed,posted) values ('$id','$name',getdate())";
    $stmt_post= (sqlsrv_query($con,$sql1));
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
    header("Location:homepage.php?id=$id");
}
?>
