<?php include "../adminpanel/config/constants.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS link -->
    <link rel="stylesheet" href="../css/pizzas.css">
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
    <link rel="icon" type="image/x-icon" href="../images/logos/drinks-favicon.png">
    <!-- Favicon link end -->
    <title>Restaurant Menu System</title>
</head>
<body>
    <header>
        <a href="../index.php" class="logo" ><i class="fa fa-cutlery" aria-hidden="true"></i></i>wowFood</a>    
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <a href="../register/login.php" class="fas  fa-user"></a>
            <a href="#" class="fas  fa-shopping-cart"></a>
        </div>
    </header>

    <section class="menu" id ="menu">
        <div class="container">
            <div>
                <h2 class="heading">Our Drinks</h2>
            </div> 
        <div class="row justify-content-center">
        <?php 
        $sql2 = "SELECT * FROM food WHERE active='Yes' AND featured='Yes'";
        $res2 = mysqli_query($conn, $sql2);

        $count2 = mysqli_num_rows($res2);

        if($count2>0){
            while($row = mysqli_fetch_assoc($res2)){
                
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];

                ?>
                    <div class="card" style="width: 18rem;">
                    <?php
                    if($image_name == "") {
                        echo "Image Not Avaliable";
                    } else {
                        ?>
                            <img src="<?php echo SITEURL; ?>/images/food/<?php echo $image_name; ?>" class="card-img-top">
                        <?php
                    }
                    ?>
                        
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $title; ?></h5>
                                    <p class="card-text">
                                        <ul>
                                            <?php echo $description; ?>
                                        </ul>
                                    </p>
                        
                                    <a href="#" class="btn">Order</a>
                                    <span class="prices"><?php echo $price; ?>$</span>
                            </div>
                    </div>

                <?php
                }
            
        } else {
            echo "Food Not Added";
        }
        ?>
        </div>
        </div>
    </section>
</body>