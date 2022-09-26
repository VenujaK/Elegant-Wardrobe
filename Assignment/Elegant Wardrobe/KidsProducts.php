<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kids Products</title>
    <link rel="stylesheet" href="maleproducts.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

    <?php @include('header.php');
    @include('config.php');
    $db = '';
    ?>
    <form method="POST">
        <div class="small-container">
            <h1 class="headings">KID'S PRODUCTS</h1>

            <div class="row">
                <?php
                $sql = "SELECT * FROM products WHERE category='Kids_Ware' ORDER by rand() LIMIT 24";
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
</body>
<script>
    productID = $productID;
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

</html>