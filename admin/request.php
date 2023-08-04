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
    else
    {
        $id=$_POST['id'];


        $name=$_POST['username'];
        $id=$_POST['id'];
        $pass=$_POST['password'];
        $sql="select * from login where username='$name' and password='$pass'";
        $params = array();

        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

        $query = sqlsrv_query( $con, $sql , $params, $options );
        $num_rows = sqlsrv_num_rows($query);
        $row=sqlsrv_fetch_array($query);

        if(isset($row['id_credential']) and $row['id_credential']>0  )
        {
            $_SESSION['username']=$name;
                if($row['role'] == "manager-a") {
                    header("location:homepage.php?id=" . $row['id_manager']);
                }
                else if($row['role'] == "manager")
                {
                    header("location:../manager/homepage.php?id=" . $row['id_manager']);
                }
                else
                {
                    header("location:../employee/myproject.php?id=" . $row['id_employee']);
                }

        }
        else
        {
            header("location:login.php?Invalid= Please Enter Correct User Name and Password ");
        }
    }
}


?>
