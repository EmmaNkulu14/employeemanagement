<?php
session_start();
$servername = "DESKTOP-0G0R3RG\\SQLEXPRESS";

$connection= array('Database' => "employee","UID"=>"employee","PWD"=>"1111" );
$con=sqlsrv_connect($servername,$connection);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet"
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <script type="text/javascript" src="js/chart.js"></script>
    <script type="text/javascript" src="jquery-3.5.1.js"></script>
    <title>Chat</title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark-50 fixed-top" style="background-color: #00838f;">
    <ul class="item-nav navbar-nav  mr-auto">
        <li class="nav-item ">
            <a class="nav-link " href="homepage.php?id=">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="profile.php?id=">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="managedata.php?id=">Manage data</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="users.php?id=">Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="chat.php?id=">Chat</a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">Log out</a>
        </li>
    </ul>
</nav>
<section>
    <div class="container-message">
        <h3 class=" text-center">Messaging</h3>
        <div class="messaging">
            <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading" style="margin-top: 10px;">
                            <h4>Recent</h4>
                        </div>
                        <div class="srch_bar">
                            <div class="stylish-input-group">
                                <input type="text" class="search-bar"  placeholder="Search" >
                                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
                        </div>
                    </div>
                    <form action="" method="post">
                    <div class="inbox_chat">
                        <div class="chat_list active_chat">
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5><span class="chat_date">Dec 25</span></h5>
                                    <p>new message</p>
                                    <?php
                                                       $id=$_GET['id'];
                                                       $v=$id;
                                                       $sql="select username,id_credential from login where login.id_credential='$v' ";
                                                       $params = array();

                                                       $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                                                       $query1 = sqlsrv_query( $con, $sql , $params, $options );

                                                       $num_rows = sqlsrv_num_rows($query1);
                                                       while ($row=sqlsrv_fetch_array($query1,SQLSRV_FETCH_ASSOC)) {
                                                        echo $row['username'];

                                                       }
                                                       ?>

                                </div>
                                                          </div>
                        </div>

                    </div>
                    </form>
                </div>
                <div class="mesgs">
                    <div class="msg_history">
                        <div class="incoming_msg">
                            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>



                                                       <div class="received_msg">
                                                         <div class="received_withd_msg">
                                                               <p>Test which is a new approach to have all
                                                                  solutions</p>
                                                               <span class="time_date"> 11:01 AM    |    June 9</span></div>                          </div>
                                       </div>
                                                   <div class="outgoing_msg">
                                                       <div class="sent_msg">
                                                          <p>Test which is a new approach to have all
                                                               solutions</p>
                                                           <span class="time_date"> 11:01 AM    |    June 9</span> </div>
                                                   </div>
                                                    <div class="incoming_msg">
                                                     <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                                        <div class="received_msg">
                                                            <div class="received_withd_msg">
                                                               <p>Test, which is a new approach to have</p>
                                                               <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
                                                      </div>
                                                    </div>
                                                   <div class="outgoing_msg">
                                                        <div class="sent_msg">
                                                            <p>Apollo University, Delhi, India Test</p>
                                                          <span class="time_date"> 11:01 AM    |    Today</span> </div>
                                                    </div>-->
                                                    <div class="incoming_msg">
                                                       <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                                        <div class="received_msg">
                                                            <div class="received_withd_msg">
                                                                <p>We work directly with our designers and suppliers,
                                                                    and sell direct to you, which means quality, exclusive                                                                    products, at a price anyone can afford.</p>
                                                                <span class="time_date"> 11:01 AM    |    Today</span></div>
                                                        </div>
                        </div>
                 </div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <input type="text" class="write_msg" placeholder="Type a message" />
                            <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>



</section>
</body>
</html>
