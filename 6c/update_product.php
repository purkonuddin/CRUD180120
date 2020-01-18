<?php
  include("koneksi.php");
  $db = "arcademy";
  $con = mysql_connect($host,$user,$pass);
  mysql_select_db($db);
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_category = $_POST['product_category'];
  $product_cashier = $_POST['product_cashier'];

  $sql = "UPDATE `product` SET `name`='$product_name',`price`='$product_price',`id_category`='$product_category',`id_cashier`='$product_cashier' WHERE `id`='$product_id'";
  $result = mysql_query($sql);
  echo json_encode($result);

 ?>
