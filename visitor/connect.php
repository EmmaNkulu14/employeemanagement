<?php

$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";

$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );

$conn=sqlsrv_connect($servername,$connection);


function fetch_user_last_activity($id, $conn)
{
    $id = $_GET['id'];
    echo $id;
    $sql_status = " SELECT * FROM login_detail  WHERE id_credential= '$id'";

    $params = array();

    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

    $query_status = sqlsrv_query( $conn, $sql_status , $params, $options );

    $num_rows = sqlsrv_num_rows($query_status);

    $value=array();
    while ($row=sqlsrv_fetch_array($query_status,SQLSRV_FETCH_ASSOC)) {
        $value=$row['last_login'];
    }
    return $value;
}
?>