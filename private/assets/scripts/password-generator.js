"use strict";

const passwordBox = document.getElementById("generate-password-box");

function generatePassword() {
  clearValue();

  // Define character sets based on user selections
  const length = document.getElementById("length").value;
  const lowercase = document.getElementById("lowercase").checked;
  const uppercase = document.getElementById("uppercase").checked;
  const numbers = document.getElementById("numbers").checked;
  const symbols = document.getElementById("symbols").checked;

  let charSet = "";
  if (lowercase) charSet += "abcdefghijklmnopqrstuvwxyz";
  if (uppercase) charSet += "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  if (numbers) charSet += "0123456789";
  if (symbols) charSet += "!@#$%^&*()_+-=[]{};':\"\\|,.<>/?";

  // Validate character selection (at least one type must be chosen)
  if (!charSet.length) {
    alert("Please select at least one character type!");
    return;
  }

  // Generate random password
  let password = "";
  for (let i = 0; i < length; i++) {
    password += charSet.charAt(Math.floor(Math.random() * charSet.length));
  }

  // Display the generated password
  passwordBox.value = password;
}

function clearValue() {
  passwordBox.value = "";
}
