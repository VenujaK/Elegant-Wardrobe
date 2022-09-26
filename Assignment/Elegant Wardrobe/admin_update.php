<?php

@include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_des = $_POST['product_des'];
   $product_qty = $_POST['product_qty'];
   $product_cat= $_POST['product_cat'];
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
   $product_image_folder1 = 'uploaded_img/'.$product_image1;
   $product_image_folder2 = 'uploaded_img/'.$product_image2;
   $product_image_folder3 = 'uploaded_img/'.$product_image3;
   $product_image_folder4 = 'uploaded_img/'.$product_image4;
   $product_image_folder5 = 'uploaded_img/'.$product_image5;

   if (empty($product_name) || empty($product_price) || empty($product_des) || empty($product_qty) || empty($product_cat) || empty($product_image1)) {
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE products SET pname='$product_name', price='$product_price', pqty='$product_qty',category='$product_cat', discription='$product_des', pimage1='$product_image1' , pimage2='$product_image2' , pimage3='$product_image3' , pimage4='$product_image4' , pimage5='$product_image5'   WHERE pid = '$id'";
      $upload = mysqli_query($conn, $update_data);
      // echo $update_data;

      if($upload){
         move_uploaded_file($product_image_tmp_name1, $product_image_folder1);
         move_uploaded_file($product_image_tmp_name2, $product_image_folder2);
         move_uploaded_file($product_image_tmp_name3, $product_image_folder3);
         move_uploaded_file($product_image_tmp_name4, $product_image_folder4);
         move_uploaded_file($product_image_tmp_name5, $product_image_folder5);
         header('location:admin_page.php');
      }else{
         $message[] = 'Something went Wrong!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Update</title>
   <link rel="stylesheet" href="./admin.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="formContainer centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM products WHERE pid = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the product</h3>
      <input type="text" class="box" name="product_name" value="<?php echo $row['pname']; ?>" placeholder="enter the product name" >
      <input type="number" min="0" class="box" name="product_price" value="<?php echo $row['price']; ?>" placeholder="enter the product price">
      <input type="text" class="box" name="product_des" value="<?php echo $row['discription']; ?>" placeholder="enter the product Description">
      <input type="number" class="box" name="product_qty" value="<?php echo $row['pqty']; ?>" placeholder="enter the product Quantity">
      <select name="product_cat" class="box">
               <option value="Mens_Ware">Men's Ware</option>
               <option value="Womens_Ware"> Women's Ware</option>
               <option value="Kids_Ware">Kid's Ware</option>
               <option value="Footware">Footware</option>
            </select>
      <input type="file" class="box" name="product_image1"  accept="image/png, image/jpeg, image/jpg, image/jfif, image/webp" value="<?php echo $row['pimage1']; ?>">
      <input type="file" class="box" name="product_image2"  accept="image/png, image/jpeg, image/jpg, image/jfif, image/webp" value="<?php echo $row['pimage2']; ?>">
      <input type="file" class="box" name="product_image3"  accept="image/png, image/jpeg, image/jpg, image/jfif, image/webp" value="<?php echo $row['pimage3']; ?>">
      <input type="file" class="box" name="product_image4"  accept="image/png, image/jpeg, image/jpg, image/jfif, image/webp" value="<?php echo $row['pimage4']; ?>">
      <input type="file" class="box" name="product_image5"  accept="image/png, image/jpeg, image/jpg, image/jfif, image/webp" value="<?php echo $row['pimage5']; ?>">
      <input type="submit" value="update product" name="update_product" class="btns">
      <a href="admin_page.php" class="btns">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>