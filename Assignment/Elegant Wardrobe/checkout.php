<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
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
      <input type="text" class="input" id="card" name="crd" placeholder="0000 0000 0000 0000" required>
    </div>
    <div class="card_grp">
      <div class="exdate">
        <input type="text" name="exday1" class="exday" placeholder="00" required>
        <input type="text" name="exday2" class="exday" placeholder="00" required>
      </div>
      <div class="cvv">
        <input type="text" class="cvv_input" name="cno" placeholder="000" required>
      </div>
    </div>
    <div >
    <button class="btnPay"  name="proceed">pay</button>
    </div>
    <div class="mt-1">
      Cash On Delivery <a href="./checkoutCOD.php">Click Here</a>
    </div>
  </div>
  </form>
  <?php
    if (isset($_POST['proceed'])) {
      @include('config.php');
      $crdno=$_POST['crd'];
      $crdday1=$_POST['exday1'];
      $crdday2=$_POST['exday2'];
      $cvv=$_POST['cno'];
      $message="Please fill all the information or check the data again";
      //to cal the number count = strlen
      if(strlen($crdno)==2 && strlen($crdday1)==2 && strlen($crdday2)==2 && strlen($cvv)==3){
        mysqli_query($conn, "INSERT INTO ordertbl (UserID,ProductID,Quantity) SELECT  user_id, pid , qty FROM cart");
        mysqli_query($conn, "ALTER TABLE ordertbl AUTO_INCREMENT = 1");
        mysqli_query($conn, "DELETE From cart");
        echo "<script>window.location = './thanks.php';</script>";
      }else{
        echo '<span class="message">' . $message . '</span>';
      }
    };
  ?>
  <script>
    function thanks() {

      // var crdno = document.getElementById('card').length;
      // var crdday1 = document.getElementsById('exday1').length;
      // var crdday2 = document.getElementsById('exday2').length;
      // var crdcvv = document.getElementById('cno').length;

      // if (crdno == 1 && crdday1 == 2 && crdday2 == 2 && crdcvv == 3) {
      //   mysqli_query($conn, "INSERT INTO ordertbl (OrderID,Username,Product,Quantity) SELECT id, pid, user_id , qty FROM cart");
      //   window.open('thanks.php');
      //   return
      // }

      // alert("Please fill all the information");

    }
  </script>
</body>

</html>