<?php
$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";
$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);

$_SESSION=$_GET["id"];
$v=$_SESSION;

$time=time()+10;
$sql="UPDATE login SET last_login=$time where id_credential='$v'";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$query = sqlsrv_query( $con, $sql , $params, $options );
$num_rows = sqlsrv_num_rows($query);



?>

