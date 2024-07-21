"use strict";

const popUp = document.querySelector(".pop-up-edit");
const popUpDelete = document.querySelector(".pop-up-delete");
const overlay = document.querySelector(".overlay");
const openModal = document.querySelector(".open-modal");
const closeModal = document.querySelector(".close-modal");
const passwordValue = document.querySelectorAll(".password-value");
const editButton = document.querySelectorAll(".editButton");
const deleteButton = document.querySelectorAll(".deleteButton");
const passwordValueBox = document.getElementById("password-box-value");
const passwordIDBox = document.getElementById("password-box-id");
const deleteValueBox = document.getElementById("delete-box-value");
const deleteIDBox = document.getElementById("delete-box-id");

function cancel_change() {
  popUp.classList.remove("active");
  popUpDelete.classList.remove("active");
  overlay.classList.remove("active");
}

function buttonEdit() {
  for (let i = 0; i < editButton.length; i++) {
    editButton[i].addEventListener("click", () => {
      popUp.classList.add("active");
      overlay.classList.add("active");
      passwordValueBox.value = passwordValue[i].getAttribute("data-value");
      passwordIDBox.value = editButton[i].value;
    });
  }
}

function buttonDelete() {
  for (let i = 0; i < deleteButton.length; i++) {
    deleteButton[i].addEventListener("click", () => {
      popUpDelete.classList.add("active");
      overlay.classList.add("active");
      deleteValueBox.value = passwordValue[i].getAttribute("data-value");
      deleteIDBox.value = deleteButton[i].value;
    });
  }
}
