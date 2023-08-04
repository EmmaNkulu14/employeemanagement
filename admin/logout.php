<?php
$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";
$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);

//logout.php
if(isset($_POST['logout'])) {

    $_SESSION=$_POST["id"];

    $sql="UPDATE login SET last_login='0' where id_credential='1'";
    $params = array();

    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

    $query = sqlsrv_query( $con, $sql , $params, $options );
    $num_rows = sqlsrv_num_rows($query);
    $row=sqlsrv_fetch_array($query);

}
unset($_SESSION['id']);
header('location:login.php');
die();

?>
