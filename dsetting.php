<?php
include 'dbconnect.php';
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
if(isset($_POST['submit'])){

    $title = $_POST['title'];
    $email = $_POST['email'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image1 = $_FILES['image1']['name'];
    $image_size = $_FILES['image1']['size'];
    $image_tmp_name1 = $_FILES['image1']['tmp_name'];
    $image2 = $_FILES['image2']['name'];
    $image_size = $_FILES['image2']['size'];
    $image_tmp_name2 = $_FILES['image2']['tmp_name'];
    $image3 = $_FILES['image3']['name'];
    $image_size = $_FILES['image3']['size'];
    $image_tmp_name3 = $_FILES['image3']['tmp_name'];
    $image4 = $_FILES['image4']['name'];
    $image_size = $_FILES['image4']['size'];
    $image_tmp_name4 = $_FILES['image4']['tmp_name'];
    $image5 = $_FILES['image5']['name'];
    $image_size = $_FILES['image5']['size'];
    $image_tmp_name5 = $_FILES['image5']['tmp_name'];
    $image6 = $_FILES['image6']['name'];
    $image_size = $_FILES['image6']['size'];
    $image_tmp_name6 = $_FILES['image6']['tmp_name'];
    $image7 = $_FILES['image7']['name'];
    $image_size = $_FILES['image7']['size'];
    $image_tmp_name7 = $_FILES['image7']['tmp_name'];

    $image_folder = 'uploaded_img/'.$image;
    $image_folder1 = 'uploaded_img/'.$image1;
    $image_folder2 = 'uploaded_img/'.$image2;
    $image_folder3 = 'uploaded_img/'.$image3;
    $image_folder4 = 'uploaded_img/'.$image4;
    $image_folder5 = 'uploaded_img/'.$image5;
    $image_folder6 = 'uploaded_img/'.$image6;
    $image_folder7 = 'uploaded_img/'.$image7;
    
    $sql = mysqli_query($conn, "UPDATE `setting` SET `title` = '$title',`email` = '$email' ") or die('query failed');

    if(!empty($image)){
        $sql = mysqli_query($conn, "UPDATE `setting` SET `favicon` = '$image'") or die('query failed');
        move_uploaded_file($image_tmp_name, $image_folder);
    }
    if (!empty($image1)) {
        $sql = mysqli_query($conn, "UPDATE `setting` SET `logo` = '$image1'") or die('query failed');
        move_uploaded_file($image_tmp_name1, $image_folder1);
    }
    if (!empty($image2)) {
        $sql = mysqli_query($conn, "UPDATE `setting` SET `profile` = '$image2'") or die('query failed');
        move_uploaded_file($image_tmp_name2, $image_folder2);
    }
    if (!empty($image3)) {
        $sql = mysqli_query($conn, "UPDATE `setting` SET `home` = '$image3'") or die('query failed');
        move_uploaded_file($image_tmp_name3, $image_folder3);
    }
    if (!empty($image4)) {
        $sql = mysqli_query($conn, "UPDATE `setting` SET `language` = '$image4'") or die('query failed');
        move_uploaded_file($image_tmp_name4, $image_folder4);
    }
    if (!empty($image5)) {
        $sql = mysqli_query($conn, "UPDATE `setting` SET `about` = '$image5'") or die('query failed');
        move_uploaded_file($image_tmp_name5, $image_folder5);
    }
    if (!empty($image6)) {
        $sql = mysqli_query($conn, "UPDATE `setting` SET `message` = '$image6'") or die('query failed');
        move_uploaded_file($image_tmp_name6, $image_folder6);
    }
    if (!empty($image7)) {
        $sql = mysqli_query($conn, "UPDATE `setting` SET `footer` = '$image7'") or die('query failed');
        move_uploaded_file($image_tmp_name7, $image_folder7);
    }
}   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harshal Balar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cd742a0dd6.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="css/dsetting.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="main">
    <?php
        include 'dnav.php';
        ?>
        <div class="box1">
            <h1>Settings</h1>
            <h1><?php echo $greetings ?> Harshal!</h1>
            <h3><?php echo $today ?></h3>
            <?php
            $update = mysqli_query($conn, "SELECT * FROM `setting`") or die('query failed'); 
            if(mysqli_num_rows($update) > 0){
             $fetch = mysqli_fetch_assoc($update);
            }
            ?>
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td class="label"><label for="name">Site Title : </label></td>
                        <td class="input"><input type="text" class="textbox" name="title" value="<?php echo $fetch['title']; ?>" id="name" placeholder="Enter the Site Title"></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="name">Webmaster Email : </label></td>
                        <td class="input"><input type="email" class="textbox" name="email" id="name" value="<?php echo $fetch['email']; ?>" placeholder="Enter the Webmaster Email"></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="photo">Favicon</label></td>
                        <td class="input"><input type="file" class="textbox" name="image" accept="image/jpg, image/jpeg, image/png, image/gif" id="photo" class="box"></td>
                        <td class="preview"><img src="uploaded_img/<?php echo $fetch['favicon']; ?>" alt=""></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="photo">Logo</label></td>
                        <td class="input"><input type="file" class="textbox" name="image1" accept="image/jpg, image/jpeg, image/png, image/gif" id="photo" class="box"></td>
                        <td class="preview"><img src="uploaded_img/<?php echo $fetch['logo']; ?>" alt=""></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="photo">Profile</label></td>
                        <td class="input"><input type="file" class="textbox" name="image2" accept="image/jpg, image/jpeg, image/png, image/gif" id="photo" class="box"></td>
                        <td class="preview"><img src="uploaded_img/<?php echo $fetch['profile']; ?>" alt=""></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="photo">Home Banner</label></td>
                        <td class="input"><input type="file" class="textbox" name="image3" accept="image/jpg, image/jpeg, image/png, image/gif" id="photo" class="box"></td>
                        <td class="preview"><img src="uploaded_img/<?php echo $fetch['home']; ?>" alt=""></td>
                    </tr>   
                    <tr>
                        <td class="label"><label for="photo">Language Photo </label></td>
                        <td class="input"><input type="file" class="textbox" name="image4" accept="image/jpg, image/jpeg, image/png, image/gif" id="photo" class="box"></td>
                        <td class="preview"><img src="uploaded_img/<?php echo $fetch['language']; ?>" alt=""></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="photo">About Me </label></td>
                        <td class="input"><input type="file" class="textbox" name="image5" accept="image/jpg, image/jpeg, image/png, image/gif" id="photo" class="box"></td>
                        <td class="preview"><img src="uploaded_img/<?php echo $fetch['about']; ?>" alt=""></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="photo">Message Photo </label></td>
                        <td class="input"><input type="file" class="textbox" name="image6" accept="image/jpg, image/jpeg, image/png, image/gif" id="photo" class="box"></td>
                        <td class="preview"><img src="uploaded_img/<?php echo $fetch['message']; ?>" alt=""></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="photo">Footer </label></td>
                        <td class="input"><input type="file" class="textbox" name="image7" accept="image/jpg, image/jpeg, image/png, image/gif" id="photo" class="box"></td>
                        <td class="preview"><img src="uploaded_img/<?php echo $fetch['footer']; ?>" alt=""></td>
                    </tr>
                </table> 
                <input type="submit" value="Update" name="submit" class="btn">
            </form>
        </div>
    </div>
</body>

</html>