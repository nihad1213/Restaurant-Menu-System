<?php
//    session_start();
?>
<?php include "adminpanel/config/constants.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- FontAwsome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">  
    <!-- Bootstrap link start -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Bootstrap link end -->  
    <!-- Swiper link start -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- Swiper link end -->
    <!-- Favicon link start -->
    <link rel="icon" type="image/x-icon" href="images/logos/favicon.png">
    <!-- Favicon link end -->
    <title>Restaurant Menu System</title>
</head>
  
<body>
<!--Header Sections Start-->
    <header>
        <a href="" class="logo" ><i class="fa fa-cutlery" aria-hidden="true"></i></i>wowFood</a>
    
        <nav class="navbar">
            <a href="#home" class="active">Home</a>
            <a href="#dishes">Dishes</a>
            <a href="#contact">Contact</a>
        </nav>
    
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <i class="fas fa-search" id="search-icon"></i>
            <!--
            <a href='register/userprofile.php' class='fas fa-user'>
            <a href='register/login.php' class='fa fa-user'>
            -->
            <?php
                if(isset($_SESSION["username"])) {
                    echo "<a href='register/userprofile.php' class='fas fa-user'>";
                } 
                else {
                    echo "<a href='register/login.php' class='fa fa-user'>";
                }
            ?>
            <a href="#" class="fas fa-shopping-cart"></a>
        </div>
    
    </header>
<!--Header Sections End-->
    
<!--Search Form Start-->
    <form  id="search-form">
        <input type="search" name="" placeholder="search here..." id="search-box">
        <label for="search-box" class="fas fa-search"></label>
        <i class="fas fa-times" id="close"></i>
    </form>
<!--Search Form End-->
    
<!--Home Start-->
    <section class="home" id="home">
        <div class="swiper-container home-slider">
            <div class="swiper-wrapper wrapper">
                <div class="swiper-slide slide">
                    <div class="content">
                        <span>Our Special Dishes</span>
                        <h3>Spaghetti Tomato Based Sauce</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.In assumenda est facilis</p>
                        <a href="#" class="button">Order Now</a>
                    </div>
                    <div class="image">
                        <img src="images/home images/spaghetti.png" alt="spaghetti">
                    </div>
                </div>
    
                <!--<div class="wrapper">-->
                    <div class="swiper-slide slide">
                        <div class="content">
                            <span>Our Special Dishes</span>
                            <h3>Hot Pizza</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.In assumenda est facilis</p>
                            <a href="#" class="button">Order Now</a>
                        </div>
                        <div class="image">
                            <img src="images/home images/pizza.png" alt="pizza">
                        </div>
                    </div>
    
                   <!-- <div class="wrapper">-->
                        <div class="swiper-slide slide">
                            <div class="content">
                                <span>Our Special Dishes</span>
                                <h3>Mouth Watering Stuffed Burger</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.In assumenda est facilis</p>
                                <a href="#" class="button">Order Now</a>
                            </div>
                            <div class="image">
                                <img src="images/home images/burger.png" alt="burger">
                            </div>
                        </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    
    </section>
    
<!--Home End-->
    
<!--Dishes Start-->
    <section class="categories" id="dishes">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
      
            <?php
            //Create SQL query
            $sql = "SELECT * FROM category WHERE active='Yes' AND featured='Yes'";
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count>0){
                while($row = mysqli_fetch_assoc($res)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                        <a href="menu/<?php echo "$title.php"; ?>">
                            <div class="box-3 float-container">
                                <?php
                                    if($image_name == "") {
                                        echo "Image Not Avaliable";
                                    } else {
                                        ?>

                                        <?php
                                    }
                                ?>
                                <img src="<?php echo SITEURL; ?>images/dishes/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
      
                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>
                    <?php
                }
            } else {
                echo "Category Not Added";
            }
            ?>
            
            <div class="clearfix"></div>
        </div>
      </section>
<!--Dishes End-->

<!--Contact Start-->
<section class="footer" id="contact">
    <div class="box-container">

        <div class="box">
            <h3>Locations</h3>
            <a href="#">Baku</a>
            <a href="#">Khirdalan</a>
            <a href="#">Sumgait</a>
        </div>

        <div class="box">
            <h3>Quick Links</h3>
            <a href="#">Home</a>
            <a href="#">Dishes</a>
        </div>

        
        <div class="box">
            <h3>Contact Info</h3>
            <a href="#">123-456-7890</a>
            <a href="#">234-568-4648</a>
            <a href="#">wowfood@gmail.com</a>            
        </div>

        <div class="box">
            <h3>Follow Us</h3>
            <a href="#">facebook</a>
            <a href="#">twitter</a>
            <a href="#">instagram</a>            
        </div>
    </div>

    <div class="credit">copyright @ 2023 by <span>Nihad Namatli</span></div>
</section>
<!--Contact End-->





<!--JavaScript link-->
<script src="js/script.js" defer></script>
</body>
</html>





