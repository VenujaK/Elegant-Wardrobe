<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-weight: 600;
    }

    header {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    .padding {
        padding: 40px 80px;
    }

    #logo {
        border-radius: 50%;
        border: 2px solid black;
        height: 40px;
        margin: 0 20px;
    }

    .material-icons {
        margin: 10px;
        color: black;
    }

    .wrap {
        flex-wrap: wrap;
        height: min-content;
    }

    .auto-com {
        background-color: white;
        width: 25%;
        /* height: 100px; */
        position: absolute;
        margin-top: 54px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        border: 1px dotted grey;
    }
</style>
<?php
session_start();
$isUserLogged = false;
if (isset($_SESSION['username'])) {
    $isUserLogged = true;
}

// $shouldLogOut = false;
// function logoutUser()
// {
//     global $isUserLogged;
//     if ($isUserLogged) {
//         session_destroy();
//     }
//     // echo "LOGOUT";
//     // header("Location: index.php");
// }
@include('config.php');
?>


<script type="text/javascript">
    // $('#srchtext').click(function() {
    //     console.log('Working ----');
    //     $('#drop-down-container').show();
    //     event.stopPropagation(); // <<<<<<<<
    // });

    $('#clear-btn').click(function() {
        console.log("Working");
        // $('#drop-down-container').hide();
    })
</script>




<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div id="test" class="container-fluid">
            <img src="./IMG/LOGO.png" id="logo" alt="">
            <a class="navbar-brand" href="index.php">Elegant Wardrobe</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./allProducts.php">Products</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./maleproducts.php">Men's Ware</a></li>
                            <li><a class="dropdown-item" href="./WomenProducts.php">Women's Ware</a></li>
                            <li><a class="dropdown-item" href="./KidsProducts.php">Kid's Ware</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="./FootProducts.php">Foot Wear</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " href="./aboutUs.php">About Us</a>
                    </li>
                </ul>
                <form class="d-flex" action="index.php" method="POST">
                    <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="srchtext" id="srchtext">
                    <input class="btn btn-outline-dark" id="search" name="srch" value="Search" type="submit">
                    <div class="auto-com" id="auto-com">
                        <div class="container-fluid" id="drop-down-container">
                            <?php
                            if (isset($_POST['srch'])) {
                                $text = $_POST['srchtext'];
                                $sql = "SELECT * FROM products WHERE pname LIKE '%{$text}%' LIMIT 5";
                                if ($result = mysqli_query($conn, $sql)) {
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<div class="row" style="margin-bottom: 5px; cursor: pointer;">';
                                            echo '<div class="col-md-3">';
                                            echo '<img src="uploaded_img/' . $row['pimage1'] . '" class="img-fluid rounded">';
                                            echo '</div>';
                                            echo '<div class="col-md-9" style="padding-top:20px"><a onclick="loadProduct('.$row['pid'].')">' . $row['pname'] . '</a></div>';
                                            echo '</div>';
                                        }
                                        echo '<button id="clear-btn" class="btn btn-sm btn-primary">Clear</button>';
                                    }
                                } else {
                                    echo '<div class="col-md-9" style="padding-top:20px">Products not found</div>';
                                }
                            }
                            ?>
                            
                        </div>
                    </div>
                    <!-- <select class="my-3" style="border: none;">
                        <option><i class="fas fa-user-circle"></i></option>
                        <option>Login/SignUp</option>
                        <option>Logout</option>
                        
                    </select> -->
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="material-icons ">account_circle</i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Admin</a></li>
                            <li><a class="dropdown-item" href="#">User</a></li>
                        </ul>
                    </li> -->

                    <div class="dropdown">
                        <button style="min-width: 50px;" class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="material-icons ">account_circle</i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <?php
                            if ($isUserLogged) {
                                echo " <li><a class='dropdown-item' href='./logout.php'>Logout</a></li>";
                            } else {
                                echo "<li><a class='dropdown-item' href='./UserLogin.php'>Login</a></li>";
                            }
                            ?>
                            <!-- <li><a class="dropdown-item" href="#">Login</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li> -->

                        </ul>
                    </div>

                    <a href="" class="item">
                        <div class="group">
                            <a href="./cart.php"><i class="material-icons">shopping_cart</i></a>
                        </div>
                    </a>
                </form>
            </div>
        </div>
    </nav>

    <script type="text/javascript">
    function loadProduct(productID) {
        // console.log(productID);
        var origin = window.location.origin;
        window.location.href = origin + "/assignment/Elegant Wardrobe/productinfo.php?product_id=" + productID;
        // console.log(origin);

    }
    
    
    let cartItem = document.querySelector('.search-items-container');

        document.querySelector('#search').onclick = () => {
            cartItem.classList.toggle('active');
            navbar.classList.remove('active');
            searchForm.classList.remove('active');
        }
    </script>



</header>