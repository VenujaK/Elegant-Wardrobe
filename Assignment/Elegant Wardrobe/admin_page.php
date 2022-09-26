<?php


@include 'config.php';
// Product insert
if (isset($_POST['add_product'])) {

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_des = $_POST['product_des'];
   $product_qty = $_POST['product_qty'];
   $product_cat = $_POST['product_cat'];
   $product_image1 = $_FILES['product_image1']['name'];
   $product_image2 = $_FILES['product_image2']['name'];
   $product_image3 = $_FILES['product_image3']['name'];
   $product_image4 = $_FILES['product_image4']['name'];
   $product_image5 = $_FILES['product_image5']['name'];
   $product_image_tmp_name1 = $_FILES['product_image1']['tmp_name'];
   $product_image_tmp_name2 = $_FILES['product_image2']['tmp_name'];
   $product_image_tmp_name3 = $_FILES['product_image3']['tmp_name'];
   $product_image_tmp_name4 = $_FILES['product_image4']['tmp_name'];
   $product_image_tmp_name5 = $_FILES['product_image5']['tmp_name'];
   $product_image_folder1 = 'uploaded_img/' . $product_image1;
   $product_image_folder2 = 'uploaded_img/' . $product_image2;
   $product_image_folder3 = 'uploaded_img/' . $product_image3;
   $product_image_folder4 = 'uploaded_img/' . $product_image4;
   $product_image_folder5 = 'uploaded_img/' . $product_image5;

   if (empty($product_name) || empty($product_price) || empty($product_des) || empty($product_qty) || empty($product_cat) || empty($product_image1)) {
      $message[] = 'please fill out all';
   } else {
      $insert = "INSERT INTO products (pname, price, pqty,category, pimage1, pimage2, pimage3, pimage4, pimage5, discription) VALUES('$product_name', '$product_price','$product_qty','$product_cat','$product_image1', '$product_image2', '$product_image3', '$product_image4', '$product_image5' , '$product_des')";
      $upload = mysqli_query($conn, $insert);
      if ($upload) {
         move_uploaded_file($product_image_tmp_name1, $product_image_folder1);
         move_uploaded_file($product_image_tmp_name2, $product_image_folder2);
         move_uploaded_file($product_image_tmp_name3, $product_image_folder3);
         move_uploaded_file($product_image_tmp_name4, $product_image_folder4);
         move_uploaded_file($product_image_tmp_name5, $product_image_folder5);
         $message[] = 'new product added successfully';
      } else {
         $message[] = 'could not add the product';
      }
   }
};
// No stock Option
if (isset($_GET['delete'])) {
   $id = $_GET['delete'];
   mysqli_query($conn, "UPDATE products SET pqty=0 WHERE pid = $id");
   header('location:admin_page.php');
};
// Delete option
if (isset($_GET['del'])) {
   $id = $_GET['del'];
   mysqli_query($conn, "DELETE FROM products  WHERE pid = $id");
   mysqli_query($conn, "ALTER TABLE products AUTO_INCREMENT = 1");
   // ALTER TABLE products AUTO_INCREMENT = 1;
   header('location:admin_page.php');
};
if (isset($_POST['goHome'])) {
   @include('logout.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="./admin.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>


   <?php
   
   if (isset($message)) {
      foreach ($message as $message) {
         echo '<span class="message">' . $message . '</span>';
      }
   }

   ?>

   <div class="container">

      <div class="formContainer">

         <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <h3>add a new product</h3>
            <input type="text" placeholder="enter product name" name="product_name" class="box" >
            <input type="number" placeholder="enter product price" name="product_price" class="box" >
            <input type="text" placeholder="enter product Description" name="product_des" class="box" >
            <input type="number" placeholder="enter product quantity" name="product_qty" class="box" >
            <select name="product_cat" class="box">
               <option value="Mens_Ware">Men's Ware</option>
               <option value="Womens_Ware"> Women's Ware</option>
               <option value="Kids_Ware">Kid's Ware</option>
               <option value="Footware">Footware</option>
            </select>
            <input type="file" accept="image/png, image/jpeg, image/jpg, image/jfif, image/webp" name="product_image1" class="box" required>
            <input type="file" accept="image/png, image/jpeg, image/jpg, image/jfif, image/webp" name="product_image2" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg, image/jfif, image/webp" name="product_image3" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg, image/jfif, image/webp" name="product_image4" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg, image/jfif, image/webp" name="product_image5" class="box">
            <input type="submit" class="buttons" name="add_product" value="add product">
            <a href="index.php" class="buttons" name="goHome">Go to Home page</a>

         </form>

      </div>
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
         <button name="men" class="btns"> Men's Products</button>
         <button name="women" class="btns"> Women's Products</button>
         <button name="kids" class="btns"> Kids Products</button>
         <button name="foot" class="btns"> Footware Products</button>
      </form>


      <?php
      // if (isset($_POST['all'])) {
      //    $select = mysqli_query($conn, "SELECT * FROM products");
         
      // };
   //   Queries
      $select = mysqli_query($conn, "SELECT * FROM products");
      if (isset($_POST['men'])) {
         $select = mysqli_query($conn, "SELECT * FROM products WHERE category='Mens_Ware'");
      };
      if (isset($_POST['women'])) {
         $select = mysqli_query($conn, "SELECT * FROM products WHERE category='Womens_Ware'");
      };
      if (isset($_POST['kids'])) {
         $select = mysqli_query($conn, "SELECT * FROM products WHERE category='Kids_Ware'");
      };
      if (isset($_POST['foot'])) {
         $select = mysqli_query($conn, "SELECT * FROM products WHERE category='Footware'");
      };
      

      ?>
      <!-- Product table -->
      <div class="products">
         <table class="tblproduct">
            <form method="POST">
            <thead>
               <tr>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Manage</th>
               </tr>
            </thead>
            <?php while ($row = mysqli_fetch_assoc($select)) { ?>
               <tr>
                  <td><img src="uploaded_img/<?php echo $row['pimage1']; ?>" height="100" alt=""></td>
                  <td><?php echo $row['pname']; ?></td>
                  <td>Rs.<?php echo $row['price']; ?>/-</td>
                  <td>
                     <a href="admin_update.php?edit=<?php echo $row['pid']; ?>" class="buttons"> <i class="fas fa-edit"></i> Update </a>
                     <a href="admin_page.php?delete=<?php echo $row['pid']; ?>" class="buttons"> <i class="fas fa-ban"></i> No Stock </a>
                     <a href="admin_page.php?del=<?php echo $row['pid']; ?>" class="buttons"> <i class="fas fa-trash"></i> Delete </a>
                  </td>
               </tr>
            <?php } ?>
         </table>
         </form>
      </div>

   </div>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>