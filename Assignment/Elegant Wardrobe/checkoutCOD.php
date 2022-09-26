<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckoutCOD</title>
    <link rel="stylesheet" href="./checkout.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php @include('header.php') ?>
    <form method="POST">
    <div class="checkoutform">
        <div class="card_number" id="card-container">
            <input type="text" class="input" name="name" placeholder="Your Name" required>
        </div>
        <div class="card_number" id="card-container">
            <input type="text" class="input" name="address" placeholder="Address" required>
        </div>
        <div class="card_number" id="card-container">
            <input type="text" class="input" name="province" placeholder="Province" required>
        </div>
        <div class="card_number" id="card-container">
            <input type="number" class="input" name="no" placeholder="Contact No" required>
        </div>
        <div>
        <button class="btnPay"  name="proceed1">pay</button>
        </div>
        <div class="mt-1">
            Card Payment <a href="./checkout.php">Click Here</a>
        </div>
    </div>
    </form>
    <?php
    if (isset($_POST['proceed1'])) {
      @include('config.php');
      $name=$_POST['name'];
      $address=$_POST['address'];
      $province=$_POST['province'];
      $no=$_POST['no'];
      $message="Please fill all the information or check the data again";
      //to cal the number count = strlen
      if($name==0 && $address==0 && $province==0 && $no==0){
        echo '<span class="message">' . $message . '</span>';
      }else{
        mysqli_query($conn, "INSERT INTO ordertbl (UserID,ProductID,Quantity) SELECT  user_id, pid , qty FROM cart");
        mysqli_query($conn, "ALTER TABLE ordertbl AUTO_INCREMENT = 1");
        mysqli_query($conn, "DELETE From cart");
        echo "<script>window.location = './thanks.php';</script>";
        
      }
    };
  ?>
</body>

</html>