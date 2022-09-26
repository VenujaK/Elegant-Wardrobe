<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start(); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Wardrobe</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php @include('header.php');
    @include('config.php') ?>

    <!-- header ends -->
    <!-- Banner -->
    <div>
        <div class="banner">
            <img src="./IMG/svg.svg">
            <h1 class="banTxt">New Arrivals</h1>
            <p class="banTxt">Lorem ipsum dolor sit deleniti tempore iure eum atque facere hic <br> qui saepe eaque commodi molestiae error quam natus? </p>
            <input type="submit" id="bnrbtn" class="btns" onclick="allproduct()" value="Explore">
            <!-- <div class="banTxt mr"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div> -->
            <div class="banTxt mr"><a href="https://www.instagram.com"><i class="icon ion-social-instagram"></i></a><a href="https://www.snapchat.com/"><i class="icon ion-social-snapchat"></i></a><a href="https://twitter.com"><i class="icon ion-social-twitter"></i></a><a href="https://www.facebook.com"><i class="icon ion-social-facebook"></i></a></div>
        </div>
    </div>
    <hr>

    <!-- Services  -->
    <div class="headings">

        <h1 class="headings">OUR SERVICES</h1>
        <section id="Services" class="padding">
            <div class="se-box">
                <img src="IMG/features/f1.png" alt="">
                <h6>Online Delivery</h6>
            </div>
            <div class="se-box">
                <img src="IMG/features/f2.png" alt="">
                <h6>Fast Shipping</h6>
            </div>
            <div class="se-box">
                <img src="IMG/features/f3.png" alt="">
                <h6>Discounts</h6>
            </div>
            <div class="se-box">
                <img src="IMG/features/f4.png" alt="">
                <h6>Promotions</h6>
            </div>
            <div class="se-box">
                <img src="IMG/features/f6.png" alt="">
                <h6>24/7 Support</h6>
            </div>
        </section>
    </div>
    <hr>
    <!-- Recent Products -->
    <form method="POST">
        <div class="small-container">
            <h1 class="headings">RECENT PRODUCTS</h1>

            <div class="row">
                <?php
                $sql = "SELECT * FROM `products` ORDER by rand() LIMIT 3";
                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo ' <div class="col-4">';
                            echo ' <img src="./uploaded_img/' . $row['pimage1'] . '" alt="">';
                            echo ' <h4>' . $row['pname'] . '</h4>';
                            echo '<div class="ratings">';
                            echo '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fas fa-star-half-alt"></i>';
                            echo '</div>';
                            echo '<p>' . $row['price'] . ' LKR</p>';
                            echo ' <button type="button" class="btns" onclick="loadProduct(' . $row['pid'] . ')">Explore</button>';
                            echo '</div>';
                        }
                    } else {
                        echo "No Products found";
                    }
                } else {
                    echo "Products not found";
                }

                ?>
                
            </div>
        </div>
    </form>
    <!-- Promotions-->
    <div class="banner-container">

        <div class="banner">
            <div class="shoe">
                <img src="./IMG/banner shoe.png" alt="">
            </div>
            <div class="content">
                <span>upto</span>
                <h3>50% 0ff</h3>
                <p>offer ends after 5 days</p>
                <a href="./productinfo.php?product_id=21" class="btns">view offer</a>
            </div>
            <div class="women">
                <img src="./IMG/banner girl.png" alt="">
            </div>
        </div>

    </div>
    <!-- Featured products -->

    <form method="POST">
        <div class="small-container">
            <h1 class="headings">FEATURED PRODUCTS</h1>

            <div class="row">
                <?php
                $sql = "SELECT * FROM `products` ORDER by rand() LIMIT 6";
                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo ' <div class="col-4">';
                            echo ' <img src="./uploaded_img/' . $row['pimage1'] . '" alt="">';
                            echo ' <h4>' . $row['pname'] . '</h4>';
                            echo '<div class="ratings">';
                            echo '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fas fa-star-half-alt"></i>';
                            echo '</div>';
                            echo '<p>' . $row['price'] . ' LKR</p>';
                            echo ' <button type="button" class="btns" onclick="loadProduct(' . $row['pid'] . ')">Explore</button>';
                            echo '</div>';
                        }
                    } else {
                        echo "No Products found";
                    }
                } else {
                    echo "Products not found";
                }

                ?>
                
            </div>
        </div>
    </form>
    <hr>
    <!-- Footer -->
    <?php @include('footer.php') ?>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<script>
    // to transfer the product id via url
    function loadProduct(productID) {
        // console.log(productID);
        var origin = window.location.origin;
        window.location.href = origin + "/assignment/Elegant Wardrobe/productinfo.php?product_id=" + productID;
        // console.log(origin);

    }
    function allproduct(){
        
               window.location = "./allProducts.php";
    }
</script>
</html>