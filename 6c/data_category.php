<?php
  include("koneksi.php");
  $db = "arcademy";
  $con = mysql_connect($host,$user,$pass);
  mysql_select_db($db);
  $result = mysql_query("SELECT * FROM `category`");
  // $fetch = mysql_fetch_array($result);
  $data_toko = array();
  while ($fetch = mysql_fetch_array($result)) {
    $data = array(
      'category'=>$fetch['name'],
      'category_id'=>$fetch['id'],
      // 'product'=>$fetch['n_product'],
      // 'category'=>$fetch['n_category'],
      // 'price'=>$fetch['price']
    );
    array_push($data_toko,$data);
  }

  echo json_encode($data_toko);

 ?>
