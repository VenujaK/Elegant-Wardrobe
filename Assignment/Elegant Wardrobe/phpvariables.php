<?php
$pid = $_POST['txtPID'];
$pname = $_POST['txtPName'];
$price = $_POST['txtPrice'];
$pqty = $_POST['txtqty'];
$discription=$_POST['txtdes'];
$name1 = $_FILES['ProductImage1']['name'];
$name2 = $_FILES['ProductImage2']['name'];
$name3 = $_FILES['ProductImage3']['name'];
$name4 = $_FILES['ProductImage4']['name'];
$name5 = $_FILES['ProductImage5']['name'];
$temp_name1 = $_FILES['ProductImage1']['tmp_name'];
$temp_name2 = $_FILES['ProductImage2']['tmp_name'];
$temp_name3 = $_FILES['ProductImage3']['tmp_name'];
$temp_name4 = $_FILES['ProductImage4']['tmp_name'];
$temp_name5 = $_FILES['ProductImage5']['tmp_name'];
$pimage1 = $name1;
$pimage2 = $name2;
$pimage3 = $name3;
$pimage4 = $name4;
$pimage5 = $name5;
$ext1 = explode(".", $name1);
$ext2 = explode(".", $name2);
$ext3 = explode(".", $name3);
$ext4 = explode(".", $name4);
$ext5 = explode(".", $name5);
// to select the extension corectlly I have exploded the file name by "." and used ($ext-1) to select the last word (extention)
$extArray = array($ext1[sizeof($ext1) - 1], $ext2[sizeof($ext2) - 1], $ext3[sizeof($ext3) - 1], $ext4[sizeof($ext4) - 1], $ext5[sizeof($ext5) - 1]);
// $msg = json_decode($extArray);
// $msg = json_encode($extArray);
$isImagesValid = true;
for ($i = 0; $i < sizeof($extArray); $i++) {
   if (!in_array(strtolower($extArray[$i]), $type)) {
      $msg = "Invalid File Type found at index" . ($i + 1);
      $isImagesValid = false;
      break;
   }
}
?>