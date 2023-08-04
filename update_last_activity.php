<?php

$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";

$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);

session_start();
$sql="UPDATE login_details SET last_login=now() WHERE login_details_id=";


$params = array();

$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$query = sqlsrv_query( $con, $sql, $params, $options );

$num_rows = sqlsrv_num_rows($query);

?>