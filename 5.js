 sequence(5,3);
 sequence(16,5);
 sequence(3,5); // parameter x harus lebih besar dibanding y

function sequence(x,y) {
  // jika x<y => parameter x harus lebih besar dibanding y
  if (x<=y) {
    console.log("parameter x harus lebih besar dibanding y");
  }else {
    var arrResult = [y];
    var c =y
    while (c>1) {
      var c= Math.pow(c,2)%x;
      x=x+1;
      arrResult.push(c);
    }

    console.log("array : ");
    console.log(arrResult);
    console.log("count : "+ arrResult.length);
  }
}
