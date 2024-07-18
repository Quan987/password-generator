"use strict";

const email = document.getElementById("email");
const password = document.getElementById("password");
const email_err = document.getElementById("email_err");
const password_err = document.getElementById("pass_err");

// Clear previous errors
function clear_error() {
  email_err.innerText = "";
  password_err.innerText = "";
}

// User validation
function user_validation(isValid) {
  if (!email.value) {
    document.getElementById("email_err").innerText = "Email is required";
    isValid = false;
  }
  if (!password.value) {
    document.getElementById("pass_err").innerText = "Password is required";
    isValid = false;
  }
  return isValid;
}

// Login function
function login() {
  let isValid = true;
  clear_error();
  if (user_validation(isValid)) {
    document.querySelector("form").submit();
  }
}
