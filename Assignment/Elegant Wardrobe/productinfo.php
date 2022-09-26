<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    @include('config.php');

    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Info</title>
    <link rel="stylesheet" href="./productinfo.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

    <?php @include('header.php');

    $product_id = $_GET['product_id'];
    $productInfo;
    $errorQTYMSG = "";
    $successMSG = "";
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
    }
    if (isset($_POST["add_to_cart_btn"])) {
        $errorQTYMSG = "";
        if (isset($_SESSION['user_id'])) {
            $sql = "SELECT pqty FROM products WHERE pid=$product_id";
            $sqlResult = mysqli_query($conn, $sql);
            $productQTY =  mysqli_fetch_array($sqlResult);

            $inputQTY =  $_POST['qty_input'];
            if ($productQTY['pqty'] >= $inputQTY) {
                $sql = "INSERT INTO cart (pid, user_id ,qty) VALUES('$product_id', '$user_id','$inputQTY')";
                if (mysqli_query($conn, $sql)) {
                    $successMSG = "Product added to cart";
                } else {
                    $errorQTYMSG = "Something went wrong!";
                };
            } else {
                $errorQTYMSG = "Only " . $productQTY['pqty'] . " available";
            }
        } else {
            $errorQTYMSG = "Please login";
        }
    }

    ?>
    <!-- header ends -->
    <!-- product -->

    <form method="POST">
        <?php

        $sql = "SELECT * FROM products WHERE pid=$product_id";
        $sqlResult = mysqli_query($conn, $sql);
        if (mysqli_num_rows($sqlResult)) {
            $productInfo = mysqli_fetch_assoc($sqlResult);
        } else {
            echo "0 results";
        }
        ?>
        <section class="container sproduct my-1 pt-2">
            <div class="row mt-4 ">
                <div class="col-lg-5 col-md-12 col-12">
                    <img class="img-fluid pb-1" width="80%" src="./uploaded_img/<?php echo $productInfo['pimage1'] ?>" id="MainImg" alt="">
                    <div class="small-img-group">
                        <div class="small-img-col">
                            <img src="./uploaded_img/<?php echo $productInfo['pimage2'] ?>" width="80%" class="small-img" alt="">
                        </div>
                        <div class="small-img-col">
                            <img src="./uploaded_img/<?php echo $productInfo['pimage3'] ?>" width="80%" class="small-img" alt="">
                        </div>
                        <div class="small-img-col">
                            <img src="./uploaded_img/<?php echo $productInfo['pimage4'] ?>" width="80%" class="small-img" alt="">
                        </div>
                        <div class="small-img-col">
                            <img src="./uploaded_img/<?php echo $productInfo['pimage5'] ?>" width="80%" class="small-img" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-12 text">
                    <h3 class="py-4"><?php echo $productInfo['pname'];?>(<?php echo $productInfo['category']; ?>)</h3>
                    <h2><?php echo $productInfo['price']; ?> LKR</h2>
                    <input type="number" value="1" name="qty_input">
                    <button class="buy-btn" name="add_to_cart_btn">Add to Cart</button>
                    <p style="color: black; margin: top 10px;">(<?php echo $productInfo['pqty']; ?> Available) </p>
                    <p style="color: red;"><?php echo $errorQTYMSG; ?></p>
                    <p style="color: green;"><?php echo $successMSG; ?></p>
                    <h4 class="mt-5 mb-5">Product Details</h4>
                    <span style="color: grey; text-align:left" class="text"><?php echo $productInfo['discription']; ?></span>
                </div>
    </form>
    </div>
    </section>
    <!-- related products -->
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
    <!-- Footer -->
    <?php @include('footer.php') ?>

    <script>
        // to transfer the product id via url
        function loadProduct(productID) {
            // console.log(productID);
            var origin = window.location.origin;
            window.location.href = origin + "/assignment/Elegant Wardrobe/productinfo.php?product_id=" + productID;
            // console.log(origin);

        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./productinfo.js"></script>
</body>


</html>