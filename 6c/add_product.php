<?php
  include("koneksi.php");
  $db = "arcademy";
  $con = mysql_connect($host,$user,$pass);
  mysql_select_db($db);
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_category = $_POST['product_category'];
  $product_cashier = $_POST['product_cashier'];

  $sql = "INSERT INTO product (`name`,`price`,`id_category`,`id_cashier`) VALUES ('$product_name','$product_price','$product_category','$product_cashier')";
  $result = mysql_query($sql);
  echo json_encode($product_name);

 ?>
