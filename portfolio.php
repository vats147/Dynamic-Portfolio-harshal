<?php
 include 'dbconnect.php';
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
    <link rel="stylesheet" href="css/portfolio.css">
</head>

<body>

    
    <section id="home">
        <div class="navbar">
            <div class="logoimg">
                <img src="images/logo.png" alt="" class="logo">
            </div>
            <ul>
                <li><a href="index.php">Home</a> >> Portfolio</li>
            </ul>
        </div>
        <div class="banner-text">
            <h1>Portfolio</h1>
        </div>
        <div class="custom-shape-divider-bottom-1668688985">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </section>
    <section id="service">
        <div class="title-text">
            <p>Portfolio</p>
            <h1>My Recent Works</h1>
        </div>


        <div class="service-box ">
            <?php
            $row_num=0;
                $view = mysqli_query($conn, "SELECT * FROM `project`") or die('query failed');
                if(mysqli_num_rows($view) > 0){
                while($fetch = mysqli_fetch_assoc($view)){
                    if(($row_num % 2) == 0){
            ?>
            <div class="single-service reveal">
                <a href="<?php echo $fetch['link']; ?>"><img src="uploaded_img/<?php echo $fetch['image']; ?>" alt=""></a>
                <div class="info">
                    <h1><?php echo $fetch['title']; ?></h1>
                    <div class="icon">
                    <?php
                    if ($fetch['responsive'] == "both") {
                        echo "<span class='material-symbols-outlined'>desktop_windows</span>";
                        echo "<span class='material-symbols-outlined'>phone_iphone</span>";
                    }
                    elseif ($fetch['responsive'] == "desktop") {
                        echo "<span class='material-symbols-outlined'>desktop_windows</span>";
                    }
                    else {
                        echo "<span class='material-symbols-outlined'>phone_iphone</span>";
                    }
                    ?>
                    </div>
                    <p><?php echo $fetch['description']; ?></p> 
                    <!-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda, odit.</p> -->
                    <br>
                    <a href="<?php echo $fetch['link']; ?>">View Demo</a>
                </div>
            </div>
            <?php 
            }else {     
            ?>
            <div class="single-service reveal">
                
                <div class="info">
                    <h1><?php echo $fetch['title']; ?></h1>
                    <div class="icon">
                    <?php
                    if ($fetch['responsive'] == "both") {
                        echo "<span class='material-symbols-outlined'>desktop_windows</span>";
                        echo "<span class='material-symbols-outlined'>phone_iphone</span>";
                    }
                    elseif ($fetch['responsive'] == "desktop") {
                        echo "<span class='material-symbols-outlined'>desktop_windows</span>";
                    }
                    else {
                        echo "<span class='material-symbols-outlined'>phone_iphone</span>";
                    }
                    ?>
                    </div>
                    <p><?php echo $fetch['description']; ?></p> 
                    <!-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda, odit.</p> -->
                    <br>
                    <a href="<?php echo $fetch['link']; ?>">View Demo</a>
                </div>
                <a href="<?php echo $fetch['link']; ?>"><img src="uploaded_img/<?php echo $fetch['image']; ?>" alt=""></a>
            </div>
            <?php
            }
            $row_num++;
            }
        }
        else{
            echo "No Result Found";
        }
            ?>
        </div>
    </section>
    <script type="text/javascript"> 
    window.addEventListener('scroll', reveal); 
    function reveal(){ 
        var reveals = document.querySelectorAll('.reveal');
        for(var i = 0; i < reveals.length; i++){ 
             var windowheight = window.innerHeight; 
             var revealtop = reveals[i].getBoundingClientRect().top; 
             var revealpoint = 150; 
             if(revealtop < windowheight - revealpoint){ 
                reveals[i].classList.add('active'); 
             }else{ 
                reveals[i].classList.remove('active');
             }
        } 
        } 
    </script>
</body>

</html>