<?php


$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";
$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);
require_once 'process.php';


$output='';
$rec=$_POST['id'];

$sql1="select TOP 3 report,report_date from part_of_job,report where part_of_job.project_id=$rec and report.project_id=$rec order by report_date desc ";

$params = array();

$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$query = sqlsrv_query( $con, $sql1 , $params, $options );
$num_rows = sqlsrv_num_rows($query);

echo "<div class='report' style='margin: 0 40%;font-size: 25px;'>
<div class='report-h3'>
<p>Task report</p>
</div>
</div>";

while($row=sqlsrv_fetch_array($query,SQLSRV_FETCH_ASSOC)) {

    $output .= "

<div class='' style = 'height:100px;width: 780px;text-transform: initial;border-radius: 50px;margin-top:5px;background-color:cadetblue;color:white;font-family:Calibri Light; border-radius:2%;float: left;margin-left: 2px;padding: 0;color: white;' >
<span style = 'font-size: 20px;margin-bottom: -4px;text-transform: capitalize' >Report added on    ".date_format($row['report_date'],"Y-m-d") ."</span></br>
 <span style = 'color: white;font-size: 17px;' > " . $row['report'] . "</span >
</div >
    ";
}
echo $output;

echo "

 <div style='margin: 37% 0%; position: fixed' >
<form action='process.php' method='POST'>
                <textarea  style='width:843px;height: 50px;border-color: #6c757d;text-decoration: none' placeholder='type something' name='task_name'></textarea>
<input type='hidden'  name='project_id'>
                <button  value='$rec'  style='float:right;margin-right: 0px;width: 150px;height: 50px;' class='btn btn-info btn-lg' name='save'>Send</button>
<span class='fa fa-send-o'></span> 
                      
               </form>
                
            </div>
";

?>

