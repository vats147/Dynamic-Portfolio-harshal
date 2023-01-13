<?php
$login=false;
session_start(); 
include 'dbconnect.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $pwd = $_POST['pwd'];
    $sql = mysqli_query($conn, "SELECT * FROM `register` WHERE name = '$name' and pwd = '$pwd'") or die('query failed');
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        $login = true;
        $_SESSION['adminid'] = $row['srno'];
        $_SESSION['loggedin'] = true;
        $_SESSION['adminemail'] = $email;
        $_SESSION['admin'] = $row['user'];
        header("location: dashboard.php");
    }
    else{
        echo "Invalid Password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Harshal Balar Login</title>

</head>
<body>
   <div class="box">
    <div class="container">

        <div class="top">
            <header>Login</header>
        </div>
    <form action="" method="post">
        <div class="input-field">
            <input type="text" name="name" class="input" placeholder="Username" id="">
        </div>

        <div class="input-field">
            <input type="Password" name="pwd" class="input" placeholder="Password" id="">
        </div>

        <div class="input-field">
            <input type="submit" name="submit" class="submit" value="Login" id="">
        </div>

        <div class="two-col">
            <div class="one">
               <input type="checkbox" name="" id="check">
               <label for="check"> Remember Me</label>
            </div>
        </div>
    </div>
    </form>
</div>  
</body>
</html>