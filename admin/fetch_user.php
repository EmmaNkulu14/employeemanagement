<?php
include_once "connect.php";
$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";
$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);
$sql="select * from login";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$query = sqlsrv_query( $con, $sql , $params, $options );
$num_rows = sqlsrv_num_rows($query);
$output = '
<table class="table table-bordered table-striped">
 <tr>
  <td>Username</td>
  <td>Status</td>
  <td>Action</td>
 </tr>
';
while ($row=sqlsrv_fetch_array($query,SQLSRV_FETCH_ASSOC)) {
    $time=time();
    $status = 'ofline';

    if($row['last_login']> $time)
    {
        $status = '<span class="label" style="color: green">Online</span>';
    }
    else
    {
        $status = '<span class="label label-danger" style="color: red">Offline</span>';
    } $output .= '
 <tr>
  <td>'.$row['username'].'</td>
  <td>'.$status.'</td>
  <td>
  <button type="button" class="btn btn-info btn-xs 
  start_chat" data-touserid="'.$row['id_manager'].'"
   data-tousername="'.$row['username'].'">Start Chat</button></td>
 </tr>
 ';
}
$output .= '</table>';
echo $output;
?>

