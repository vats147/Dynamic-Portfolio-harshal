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
    <link rel="stylesheet" href="css/testimonials.css">
</head>

<body>

    
    <section id="home">
        <div class="navbar">
            <div class="logoimg">
                <img src="images/logo.png" alt="" class="logo">
            </div>
            <ul>
                <li><a href="index.php">Home</a> >> Testimonials</li>
            </ul>
        </div>
        <div class="banner-text">
            <h1>Testimonials</h1>
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
    <section id="testimonials">
        <div class="title-text">
            <p>Testimonials</p>
            <h1>What Client Say's</h1>
        </div>
        <div class="testimonials-row">
            <?php
                $view = mysqli_query($conn, "SELECT * FROM `testimonials` LIMIT 3;") or die('query failed');
                if(mysqli_num_rows($view) > 0){
                while($fetch = mysqli_fetch_assoc($view)){
            ?>
            <div class="testimonials-col reveal">
                <div class="user">
                    <img src="uploaded_img/<?php echo $fetch['image']; ?>" alt="">
                    <div class="user-info">
                        <h4><?php echo $fetch['name']; ?> <i class="fa-brands fa-twitter"></i></h4>
                        <small>@<?php echo $fetch['username']; ?></small>
                    </div>
                </div>
                <p><?php echo $fetch['about']; ?>
                </p>
            </div>
            <?php
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