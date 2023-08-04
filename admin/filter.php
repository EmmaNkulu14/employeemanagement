<?php
if(isset($_POST["from"], $_POST["to"]))
{

    $servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";

    $connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
    $connect=sqlsrv_connect($servername,$connection);
    $output = '';
    $query = "SELECT project.project_name, project.date_of_issue 
    FROM employee.dbo.project where project.date_of_issue between '".$_POST["from"]."' AND '".$_POST["to"]."'";
    $result = mysqli_query($connect, $query);
    $output .= '  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">ID</th>  
                     <th width="30%">Customer Name</th>  
                     <th width="43%">Item</th>  
                     <th width="10%">Value</th>  
                     <th width="12%">Order Date</th>  
                </tr>  
      ';
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $output .= '  
                     <tr>  
                          <td>'. $row["project_name"] .'</td>  
                          <td>'. $row["date_of_issue"] .'</td>  
                         
                     </tr>  
                ';
        }
    }
    else
    {
        $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';
    }
    $output .= '</table>';
    echo $output;
}
?>