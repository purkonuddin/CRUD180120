console.log(usernameValidity("fiona_mareta")); //return true
console.log(usernameValidity("fionamareta99")); //return true
console.log(usernameValidity("FIONA-mareta")); //return false
console.log(passwordValidity("1WORLD!")); //return true
console.log(passwordValidity("1worl!")); //return false

function usernameValidity(username) {
  const regex = /^([a-z])[A-Za-z_0-9]{5,12}$/;
  if(regex.test(username)){
     return true
  }else {
    return false
  }

}

function passwordValidity(password) {
  const regex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Z0-9!@#$%^&*]{7}$/;
  if(regex.test(password)){
    return true
  }else {
    return false
  }
}
