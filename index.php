<?php
include 'dbconnect.php';
if(isset($_POST['submit'])){
    $name =$_POST['name'];
    $tel =$_POST['tel'];
    $email =$_POST['email'];
    $msg =$_POST['msg'];

    $sql = "INSERT INTO `message` ( `name`,`tel` ,`email`,`msg`) VALUES ( '$name','$tel','$email', '$msg')";
    $result = mysqli_query($conn, $sql);
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
    <link rel="stylesheet" href="css/1.css">
</head>
<style>

#footer {
    width: 100%;
    padding: 100px 0 20px;
    background-image: linear-gradient(rgba(0, 0, 0, 0.66), rgba(0, 0, 0, 0.616)), url(images/contact.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    color: #fff;
    position: relative;
}
#home {
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), #fc60609e), url(images/back1.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100vh;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    flex-direction: column;
}

</style>
<body>
    <!-- <div id="loader">

    </div> -->
    <section id="home">
        <div class="navbar">
            <div class="logoimg">
                <img src="images/logo.png" alt="" class="logo">
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#aboutme">About</a></li>
                <li><a href="#service">Portfolio</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
                <li><a href="#message">Contact Us</a></li>
            </ul>
        </div>
        <div class="banner-text">
            <h1>I'M</h1>
            <h1>HARSHAL BALAR</h1>
            <p>This is my official Portfolio website to showcase my all works related to web development and web design.
            </p>
            <div class="banner-btn">
                <a href=""><span></span>Find Out</a>
                <a href=""><span></span>Read More</a>
            </div>
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
    <div id="sidenav">
        <div class="profile">
            <img src="images/p1.jpg" class="profilephoto" alt="">
            <img src="images/logo.png" alt="" class="logo1">
            <p>Frontend Developer</p>
        </div>
        <nav>
            <ul>
                <li><a href="#home"><i class="fa-solid fa-house-user"></i> Home</a></li>
                <li><a href="#features"><i class="fa-solid fa-business-time"></i> Features</a></li>
                <li><a href="#service"><i class="fa-solid fa-bell-concierge"></i> Services</a></li>
                <li><a href="#testimonials"><i class="fa-solid fa-mug-hot"></i> Testimonials</a></li>
                <li><a href="#footer"><i class="fa-solid fa-address-book"></i> Contact Us</a></li>
            </ul>
        </nav>
        <div class="media">
            <a href="https://www.instagram.com/harshalbalar/"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://twitter.com/HarshalBalar"><i class="fa-brands fa-twitter"></i></a>
            <a href="https://www.facebook.com/profile.php?id=100069695062193"><i
                    class="fa-brands fa-facebook-f"></i></a>
            <a href="https://www.linkedin.com/in/harshal-balar-a37b24235/"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
    </div>
    <div id="menubtn">
        <img src="images/menu.png" alt="" id="menu">
    </div>
    <div id="pushup">
        <a href="#home"><i class="fa-solid fa-angles-up"></i></a>
    </div>
    <section id="features">
        <div class="title-text">
            <p>Languages</p>
            <h1>Why Choose me</h1>
        </div>
        <div class="feature-box reveal" >
            <div class="feature-img">
                <img src="images/code.gif" alt="">
            </div>
            <div class="feature">
                <div class="feature-icon">
                    <h1>HTML</h1>
                    <i class="devicon-html5-plain colored"></i>
                </div>
                <div class="feature-icon">
                    <h1>CSS</h1>
                    <i class="devicon-css3-plain colored"></i>
                </div>
                <div class="feature-icon">
                    <h1>JavaScript</h1>
                    <i class="devicon-javascript-plain colored"></i>
                </div>
                <div class="feature-icon">
                    <h1>Php</h1>
                    <i class="devicon-php-plain colored"></i>
                </div>
                <div class="feature-icon">
                    <h1>MySQL</h1>
                    <i class="devicon-mysql-plain colored"></i>
                </div>
                <div class="feature-icon">
                    <h1>Linux</h1>
                    <i class="devicon-linux-plain colored"></i>
                </div>
                <div class="feature-icon">
                    <h1>Tailwindcss</h1>
                    <i class="devicon-tailwindcss-plain colored"></i>
                </div>
                <div class="feature-icon">
                    <h1>Bootstrap</h1>
                    <i class="devicon-bootstrap-plain colored"></i>
                </div>
                <div class="feature-icon">
                    <h1>Python</h1>
                    <i class="devicon-python-plain colored"></i>
                </div>
            </div>
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
    <!-- <div class="hr"><hr></div> -->
    <section id="aboutme">
        <div class="title-text">
            <p>About</p>
            <h1>About me</h1>
        </div>
        <div class="about-box reveal">
            <?php
                $update = mysqli_query($conn, "SELECT * FROM `about`") or die('query failed');
                if(mysqli_num_rows($update) > 0){
                while($fetch = mysqli_fetch_assoc($update)){
            ?>
            <div class="about">
                <h1><?php echo $fetch['name']; ?></h1>
                <h3><i class="fa-solid fa-map-pin"></i><?php echo $fetch['nationality']; ?></h3>
                <h3><i class="fa-solid fa-laptop"></i><?php echo $fetch['position']; ?></h3>
                <p><?php echo $fetch['about']; ?></p>
                <p><?php echo $fetch['detail']; ?></p>
                <div class="button">
                    <div class="read-btn">
                        <a href="portfolio.php"><span></span>Download CV</a>
                    </div>
                    <a href="https://www.buymeacoffee.com/balarharshal" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-red.png" alt="Buy Me A Coffee" style="height: 48px !important;width: 150px !important;" ></a>
                </div>
            </div>
            <?php
            }
            }
            ?>
            <div class="about-img">
                <img src="images/p1.jpg" alt="">
            </div>
        </div>
    </section>
    <!-- <div class="hr"><hr></div> -->
    <section id="service">
        <div class="title-text">
            <p>Portfolio</p>
            <h1>My Recent Works</h1>
        </div>
        
        
        <div class="service-box reveal">
            <?php
                $view = mysqli_query($conn, "SELECT * FROM `project` LIMIT 4;") or die('query failed');
                if(mysqli_num_rows($view) > 0){
                while($fetch = mysqli_fetch_assoc($view)){
            ?>
        
            <div class="single-service">
                <a href="<?php echo $fetch['link']; ?>"><img src="uploaded_img/<?php echo $fetch['image']; ?>" alt="">
                    <div class="overlay"></div>
                    <div class="service-desc">
                        <h3><?php echo $fetch['title']; ?></h3>
                    </div>
                </a>
            </div>
            <?php
            }
            
            }
            else{
                echo "No Result Found";
            }
            ?>
        </div>
        <div class="read-btn reveal">
                <a href="portfolio.php"><span></span>Read more</a>
            </div>
    </section>
    <!-- <div class="hr"><hr></div> -->
    <section id="testimonials">
        <div class="title-text">
            <p>Testimonials</p>
            <h1>What Client Say's</h1>
        </div>
        <div class="testimonials-row reveal">
            <?php
                $view = mysqli_query($conn, "SELECT * FROM `testimonials` LIMIT 3;") or die('query failed');
                if(mysqli_num_rows($view) > 0){
                while($fetch = mysqli_fetch_assoc($view)){
            ?>
            <div class="testimonials-col">
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
        <div class="read-btn reveal">
            <a href="testimonials.php"><span></span>Read more</a>
        </div>
    </section>
    <!-- <div class="hr"><hr></div> -->
    <section id="message">
        <div class="title-text">
            <p>Feedback</p>
            <h1>Say something</h1>
        </div>
        <div id="volunteer" class="reveal">
            <form action="#" method="post" class="volform">
                <input type="text" name="name" id="Name" placeholder="Your Name" autocomplete="off" class="input"><br>
                <input type="tel" name="tel" id="tel" placeholder="Your Phone Number" autocomplete="off" class="input"><br>
                <input type="email" name="email" id="email" placeholder="Your Email" autocomplete="off" class="input"> <br>
                <input type="text" name="msg" id="Message" placeholder="Message" autocomplete="off" class="input"><br>
                <input type="submit" value="Send message" name="submit" class="btn"> 
            </form>
            <div class="message-img">
                <img src="images/chat.gif" alt="">
            </div>
        </div>
    </section>


    <section id="footer">
        <div class="title-text">
            <p>Contact</p>
            <h1>Reach out for a new Project</h1>
        </div>
        <div class="footer-row">
            <div class="footer-left">
                <h1>Services</h1>
                <p><i class="fa-solid fa-laptop-code"></i>Web development</p>
                <p><i class="fa-solid fa-code"></i></i>Web design</p>
                <p><i class="fa-solid fa-chalkboard"></i>Photoshop</p>
            </div>
            <div class="footer-mid">
                <nav>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#service">Services</a></li>
                        <li><a href="#testimonials">Testimonials</a></li>
                        <li><a href="#footer">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class="footer-right">
                <h1>Get In Touch</h1>
                <p><a
                        href="https://www.google.com/maps/place/Surat,+Gujarat/@21.1978328,72.7400817,12.46z/data=!4m5!3m4!1s0x3be04e59411d1563:0xfe4558290938b042!8m2!3d21.1702401!4d72.8310607">
                        Surat, Gujarat, India.<i class="fa-solid fa-location-dot"></i></a></p>
                <p><a href="mailto:balarharshal2002@gmail.com"> balarharshal2002@gmail.com<i
                            class="fa-solid fa-inbox"></i></a></p>
                <p><a href="tel:905-432-2156">+91 9054322156<i class="fa-solid fa-phone"></i></a></p>
            </div>
        </div>
        <div class="social-links">
            <a href="https://www.instagram.com/harshalbalar/"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://twitter.com/HarshalBalar"><i class="fa-brands fa-twitter"></i></a>
            <a href="https://www.facebook.com/profile.php?id=100069695062193"><i
                    class="fa-brands fa-facebook-f"></i></a>
            <a href="https://www.linkedin.com/in/harshal-balar-a37b24235/"><i class="fa-brands fa-linkedin-in"></i></a>
            <p>Copyright www.harshalbalar.com</p>
        </div>

    </section>

    <script>
        var manubtn = document.getElementById("menubtn");
        var sidenav = document.getElementById("sidenav");
        var menu = document.getElementById("menu");
        var preloader = document.getElementById("loader");
        sidenav.style.right = "-300px";
        menubtn.onclick = function () {
            if (sidenav.style.right == "-300px") {
                sidenav.style.right = "0";
                menu.src = "images/close.png";
            }
            else {
                sidenav.style.right = "-300px";
                menu.src = "images/menu.png";
            }
        }
        window.addEventListener("load", function () {
            preloader.style.display = "none";

        })

    </script>
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