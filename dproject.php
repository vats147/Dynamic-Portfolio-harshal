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
 if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `project` WHERE srno = '$delete_id'") or die('query failed');
    header('location:dproject.php');
 }
 
if(isset($_POST['submit'])){

    $title = $_POST['title'];
    $link = $_POST['link'];
    $description = $_POST['description'];
    $responsive = $_POST['responsive'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;
    
        $add= mysqli_query($conn, "INSERT INTO `project`( `title`,`link`, `image`, `description`,`responsive`) VALUES ('$title','$link', '$image', '$description', '$responsive')") or die('query failed');
        move_uploaded_file($image_tmp_name, $image_folder);
    
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
    <link rel="stylesheet" href="css/dproject.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
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
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td class="label"><label for="title">Title </label></td>
                        <td class="input"><input type="text" class="textbox" name="title" id="title" placeholder="Enter the Title of the Project"></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="link">Link </label></td>
                        <td class="input"><input type="text" class="textbox" name="link" id="link" placeholder="Enter the Project Link"></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="photo">Photo </label></td>
                        <td class="input"><input type="file" class="textbox" name="image" accept="image/jpg, image/jpeg, image/png" id="photo" class="box"></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="desc">Description</label></td>
                        <td class="input"><textarea name="description" id="desc"  cols="130" rows="10"  placeholder="Enter the Description"></textarea></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="responsive">Responsive </label></td>
                        <td class="input"><input type="radio" name="responsive" value="desktop" id="responsive"><span class="material-symbols-outlined">desktop_windows</span> <input type="radio" name="responsive" value="mobile" id="responsive"><span class="material-symbols-outlined">phone_iphone</span> <input type="radio" name="responsive" value="both" id="responsive"><span class="material-symbols-outlined">devices</span></td>
                    </tr>
                </table> 
                <input type="submit" value="Add Project" name="submit" class="btn">
            </form>
            <table id="myTable">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Link</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Responsive</th>
                        <th scope="col">Delete User</th>
                    </tr>
                </thead>
                <tbody>
    
                        <?php
                        $sql = "SELECT * FROM `project`";
                        $result = mysqli_query($conn, $sql);
                        $sno=0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sno=$sno+1;
                        ?><tr>
                            <th scope='row'><?php echo $sno; ?></th>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['link']; ?></td>
                            <td><?php echo $row['image']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['responsive']; ?></td>
                            <td class='delete' onclick="return confirm('Delete this User?');"> <a href="dproject.php?delete=<?php echo $row['srno'];?>" >Delete</a></td>
                        </tr>
                        <?php
                        }
                    ?>
                    </tbody>
            </table>
        </div>

    </div>

    <script>
    function delete() {        
        confirm('Delete this Message?');;
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
</body>

</html>