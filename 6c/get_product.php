<?php
  include("koneksi.php");
  $db = "arcademy";
  $con = mysql_connect($host,$user,$pass);
  mysql_select_db($db);
  $product_id = $_GET['product_id'];
  $result = mysql_query("SELECT a.id AS poduct_id, a.name AS n_product, a.price, b.id AS n_cashier, c.id AS n_category FROM product a, cashier b, category c WHERE a.id_category = c.id AND a.id_cashier = b.id AND a.id = '$product_id'");
  // $fetch = mysql_fetch_array($result);
  // $data_toko = array();
  while ($fetch = mysql_fetch_array($result)) {
    $data = array(
      'cashier'=>$fetch['n_cashier'],
      'product_id'=>$fetch['poduct_id'],
      'product'=>$fetch['n_product'],
      'category'=>$fetch['n_category'],
      'price'=>$fetch['price']
    );
    // array_push($data_toko,$data);
  }

  echo json_encode($data);

 ?>
