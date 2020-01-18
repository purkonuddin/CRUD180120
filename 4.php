<?php
  function cetak_gambar($value)
  {
    $pesan = "";
    // $Regex = /[0-9]/;
    if (preg_match("/[0-9]/",$value)) {
      if ($value%2==0) {
        $pesan = "harus ganjil";
      }else {
        $pesan = "ok";
      }
    }else {
      $pesan = "harus angka";
    }

    if ($pesan === "ok") {
      $arrGambar = [
                     ["*","=","=","=","*"],
                     ["*","=","=","=","*"],
                     ["*","*","*","*","*"],
                     ["*","=","=","=","*"],
                     ["*","=","=","=","*"]
                   ];

       echo '<table>';
       echo "<th colspan ='5'>--- Panjang --- </th>";
       for ($i=0;$i<$value;$i++){
         echo '<tr>';
         for ($j=0;$j<$value;$j++){
           echo '<td>';
           echo $arrGambar[$i][$j];
           echo '</td>';
         }
       echo '</tr>';
       }
       echo '</table>';
    }else {
      echo "Parameter harus angka dan ganjil!";
    }
  }

  cetak_gambar(5);
 ?>
