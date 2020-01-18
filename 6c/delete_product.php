<?php
  include("koneksi.php");
  $db = "arcademy";
  $con = mysql_connect($host,$user,$pass);
  mysql_select_db($db);
  $product_id = $_POST['kode'];

  $sql = "DELETE FROM `product` WHERE `id`='$product_id'";
  $result = mysql_query($sql);
  echo json_encode($result);

 ?>
