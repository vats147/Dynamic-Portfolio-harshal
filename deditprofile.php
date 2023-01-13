<?php
session_start();
$adminid = $_SESSION['adminid'];

if(!isset($adminid)){
   header('location: login.php');
}

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}  
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
include 'dbconnect.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $npwd = $_POST['npwd'];
    if (count($_POST) > 0) {
        if($_POST['npwd'] == $_POST['cpwd']){
            $sql = mysqli_query($conn, "UPDATE `register` SET `pwd` = '$npwd' where `name` = '$name'") or die('query failed');
        }  
    }
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
    <link rel="stylesheet" href="css/deditprofile.css">
    
</head>

<body>
    <div class="main">
    <?php
        include 'dnav.php';
        ?>
        <div class="box1">
            <h1>PROJECT</h1>
            <h1><?php echo $greetings ?> Harshal!</h1>
            <h3><?php echo $today ?></h3>
            <form action="" method="post" class="form">
                <table>
                    <tr>
                        <td class="label"><label for="name">Name : </label></td>
                        <td class="input"><input type="text" class="textbox" name="name" id="name" placeholder="Enter the Username"></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="pwd">Password : </label></td>
                        <td class="input"><input type="password" class="textbox" name="npwd" id="pwd" placeholder="Enter the password"></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="cpwd">Confirm Password : </label></td>
                        <td class="input"><input type="password" class="textbox" name="cpwd" id="cpwd" placeholder="Enter the Confirm Password"></td>
                    </tr>
                </table> 
                <input type="submit" value="submit" name="submit" class="btn">
            </form>
        </div>
    </div>
</body>

</html>