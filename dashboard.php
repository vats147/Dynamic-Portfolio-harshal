<?php
date_default_timezone_set('Asia/Calcutta');
$time = date("H");
if ($time >= "0" && $time < "12") {
    $greetings = "Good morning";
} else
if ($time >= "12" && $time < "17") {
    $greetings = "Good afternoon";
} else
if ($time >= "17" && $time <= "24") {
    $greetings = "Good evening";
} 
 $today = date("j F Y");   
session_start();
$adminid = $_SESSION['adminid'];

if(!isset($adminid)){
   header('location: login.php');
}

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}  
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cd742a0dd6.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="css/dashboard.css">
    
</head>

<body>
    <div class="main">
    <?php
        include 'dnav.php';
        ?>
        <div class="box1">
            <h1>Dashboard</h1>
            <h1><?php echo $greetings ?> Harshal!</h1>
            <h3><?php echo $today ?></h3>
            <div id="dashboard">
                <div class="analysis">
                    <a href="admin_offer.php"><div class="box">
                        <div class="icon">
                            <i class="fa-solid fa-chart-pie"></i>
                        </div>
                        <div class="count">
                        <?php 
                    $select_messages = mysqli_query($conn, "SELECT * FROM `offers`") or die('query failed');
                    $number_of_offers = mysqli_num_rows($select_messages);
                 ?>
                            <h2><?php echo $number_of_offers; ?></h2>
                            <p>Total Offers</p>
                        </div>
                    </div></a>
                    <a href=""><div class="box">
                        <div class="icon">
                            <i class="fa-solid fa-chart-simple"></i>
                        </div>
                        <div class="count">
                        <?php 
                                $query = "SELECT SUM(paid_amount) AS sum FROM `payment`"; 
                                $query_result = mysqli_query($conn , $query);
                                while($row = mysqli_fetch_assoc ($query_result)) { 
                                    $output =$row[ 'sum' ];
                                }
                            ?>
                            <h2>₹<?php echo $output;?></h2>
                            <p>Completed payments</p>
                        </div>
                    </div></a>
                    <a href="admin_offer.php"><div class="box">
                        <div class="icon">
                            <i class="fa-solid fa-arrows-left-right-to-line"></i>
                        </div>
                        <div class="count">
                        <?php 
                    $select_messages = mysqli_query($conn, "SELECT * FROM `offers` WHERE `user_type` = 'admin'") or die('query failed');
                    $number_of_offers = mysqli_num_rows($select_messages);
                 ?>
                            <h2><?php echo $number_of_offers; ?></h2>
                            <p>Strike Offers</p>
                        </div>
                    </div></a>
                    <a href="admin_message.php"><div class="box">
                        <div class="icon">
                            <i class="fa-solid fa-magnifying-glass-chart"></i>
                        </div>
                        <div class="count">
                            <?php 
                    $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
                    $number_of_messages = mysqli_num_rows($select_messages);
                 ?>
                 <h2><?php echo $number_of_messages; ?></h2>
                            <p>Messages</p>
                        </div>
                    </div></a>
                    <a href="admin_user.php?type=staff"><div class="box">
                        <div class="icon">
                            <i class="fa-solid fa-chart-bar"></i>
                        </div>
                        <div class="count">
                        <?php 
                    $select_admins = mysqli_query($conn, "SELECT * FROM `register` WHERE user_type = 'staff'") or die('query failed');
                    $number_of_suser = mysqli_num_rows($select_admins);
                 ?>  
                            <h2><?php echo $number_of_suser; ?></h2>
                            <p>Staff Users</p>
                        </div>
                    </div></a>
                    <a href="admin_user.php?type=customer"><div class="box">
                        <div class="icon">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <div class="count">
                        <?php 
                    $select_admins = mysqli_query($conn, "SELECT * FROM `register` WHERE user_type = 'customer'") or die('query failed');
                    $number_of_nuser = mysqli_num_rows($select_admins);
                 ?>  
                            <h2><?php echo $number_of_nuser; ?></h2>
                            <p>Normal Users</p>
                        </div>
                    </div></a>
                    <a href="admin_user.php?type=admin"><div class="box">
                        <div class="icon">
                            <i class="fa-solid fa-chart-area"></i>
                        </div>
                        <div class="count">
                        <?php 
                    $select_admins = mysqli_query($conn, "SELECT * FROM `register` WHERE user_type = 'admin'") or die('query failed');
                    $number_of_admins = mysqli_num_rows($select_admins);
                 ?>
                            <h2><?php echo $number_of_admins; ?></h2>
                            <p>Admin Users</p>
                        </div>
                    </div></a>
                    <a href="admin_user.php"><div class="box">
                        <div class="icon">
                            <i class="fa-solid fa-bars-progress"></i>
                        </div>
                        <div class="count">
                        <?php 
                    $select_messages = mysqli_query($conn, "SELECT * FROM `register`") or die('query failed');
                    $number_of_messages = mysqli_num_rows($select_messages);
                 ?>
                 <h2><?php echo $number_of_messages; ?></h2>
                            <p>Total Accounts</p>
                        </div>
                    </div></a>
                    
                </div>
            </div>
        </div>
    </div>
</body>

</html>