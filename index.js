const password = document.getElementById("password");
const password2 = document.getElementById("password2");
const email = document.getElementById("email");
const email_regex = "[a-z0-9]+@[a-z]+.[a-z]{2,3}";
const password_regex = `(?=.{8,})`;
const loginUser = document.getElementById("loginUser");
const loginPassword = document.getElementById("loginPassword");

function validation() {
  if (emailValidation() && passValidation() && matchingPassword()) {
    return true;
  } else {
    return false;
  }
}
// function loginValidation(){
//  const emailMsgError=document.getElementById("emailMsgError");
// const passMsgError=document.getElementById("passMsgError");
// if(loginUser.value===)
// }

function emailValidation() {
  const emailMsg = document.getElementById("emailMsg");
  if (email.value.match(email_regex)) {
    emailMsg.innerText = "Valid";
    emailMsg.style.color = "green";
    return true;
  } else {
    emailMsg.innerText = "Invalid";
    emailMsg.style.color = "red";
    return false;
  }
}

function passValidation() {
  const passwordMsg = document.getElementById("passwordMsg");
  if (password.value.match(password_regex)) {
    passwordMsg.innerText = "Valid";
    passwordMsg.style.color = "green";
    return true;
  } else {
    passwordMsg.innerText = "Invalid";
    passwordMsg.style.color = "red";
    return false;
  }
}

function matchingPassword() {
  const matchMsg = document.getElementById("matchMsg");
  if (password.value === password2.value) {
    matchMsg.innerText = "Matched";
    matchMsg.style.color = "green";
    return true;
  } else {
    matchMsg.innerText = "Doesn't Match";
    matchMsg.style.color = "red";
    return false;
  }
}
