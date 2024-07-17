"use strict";

const first_err = document.getElementById("first_err");
const last_err = document.getElementById("last_err");
const email_err = document.getElementById("email_err");
const pass_err = document.getElementById("pass_err");

// Clear previous errors
function clear_error() {
  first_err.innerText = "";
  last_err.innerText = "";
  email_err.innerText = "";
  pass_err.innerText = "";
}

// User validation
function user_validation(isValid) {
  const first = document.getElementById("first").value;
  const last = document.getElementById("last").value;
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  if (!first) {
    first_err.innerText = "First Name is required";
    isValid = false;
  }
  if (!last) {
    last_err.innerText = "Last Name is required";
    isValid = false;
  }
  if (!email) {
    email_err.innerText = "Email is required";
    isValid = false;
  }
  if (!password) {
    pass_err.innerText = "Password is required";
    isValid = false;
  }
  return isValid;
}

// Register function
function register() {
  // Placeholder for client-side validation
  let isValid = true;
  clear_error();
  if (user_validation(isValid)) {
    // Form submission handled by PHP script
    document.querySelector("form").submit();
  }
}
