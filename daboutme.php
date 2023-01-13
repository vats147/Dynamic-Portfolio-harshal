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
    $nationality = $_POST['nationality'];
    $position = $_POST['position'];
    $about = $_POST['about'];
    $detail = $_POST['detail'];
 
    $sql = mysqli_query($conn, "UPDATE `about` SET `name` = '$name',`nationality` = '$nationality' , `position` = '$position', `about` = '$about', `detail` = '$detail'") or die('query failed');
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
    <link rel="stylesheet" href="css/daboutme.css">
    
</head>

<body>
    <div class="main">
        <?php
        include 'dnav.php';
        ?>
        <div class="box1">
            <h1>About Me</h1>
            <h1><?php echo $greetings ?> Harshal!</h1>
            <h3><?php echo $today ?></h3>
            <?php
            $update = mysqli_query($conn, "SELECT * FROM `about`") or die('query failed'); 
            if(mysqli_num_rows($update) > 0){
             $fetch = mysqli_fetch_assoc($update);
            }
            ?>
            
            <form action="" method="post" class="form">
                <table>
                    <tr>
                        <td class="label"><label for="name">Name </label></td>
                        <td class="input"><input type="text" class="textbox" name="name" id="name" value="<?php echo $fetch['name']; ?>" placeholder="Enter the Name"></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="nationality">Nationality </label></td>
                        <td class="input"><input type="text" class="textbox" name="nationality" id="nationality" value="<?php echo $fetch['nationality']; ?>" placeholder="Enter the Nationality"></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="position">Position </label></td>
                        <td class="input"><input type="text" class="textbox" name="position" id="position" value="<?php echo $fetch['position']; ?>" placeholder="Enter the Position"></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="about">About Me</label></td>
                        <td class="input"><textarea name="about" maxlength="255" id="about"  cols="130" rows="10" placeholder="Enter the About me"><?php echo $fetch['about']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="detail">Detail </label></td>
                        <td class="input"><input type="text" class="textbox" maxlength="255" name="detail" id="detail" value="<?php echo $fetch['detail']; ?>" placeholder="Enter the Detail"></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="resume">Resume </label></td>
                        <td class="input"><input type="file" class="textbox" name="resume" accept="image/jpg, image/jpeg, image/png" id="resume" class="box"></td>
                    </tr>
                </table> 
                <div class="button">
                    <input type="submit" value="Update" name="submit" class="btn">
                </div>
            </form>
        </div>
    </div>
</body>

</html>