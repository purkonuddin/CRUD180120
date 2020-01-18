cek_kata("ini adalah sebuah kata") //4/4
cek_kata("2 pasang sandal hilang") //3/4
cek_kata("33") //Parameter harus string!

function cek_kata(kata) {
  var arrKata = [];
  arrKata = kata.split(" ");
  // console.log(arrKata);
  panjang = arrKata.length;
  // console.log(panjang);
  var hitung = 0;
  for (var i = 0; i < arrKata.length; i++) {
    var Regex = /[a-zA-z]/;
    if (Regex.test(arrKata[i])) {
      hitung = hitung+1;
    }else {
      hitung = 0;
    }
  }
  if (hitung>0) {
    console.log(hitung + "/" +panjang);
  }else {
    console.log("Parameter harus string!");
  }

}
