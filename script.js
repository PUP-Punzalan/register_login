let form = document.getElementById("form");
let fullname = document.getElementById("name");
let username = document.getElementById("username");
let email = document.getElementById("email");
let password = document.getElementById("password");
let passwordRepeat = document.getElementById("passwordRepeat");

function validateEmail(email) {
  let re =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  return re.test(String(email).toLowerCase());
}

fullname.addEventListener("input", () => {
  if (fullname.value === "") {
    fullname.parentElement.style.outline = "2px solid red";
  } else {
    fullname.parentElement.style.outline = "2px solid green";
  }
});

username.addEventListener("input", () => {
  if (username.value === "") {
    username.parentElement.style.outline = "2px solid red";
  } else {
    username.parentElement.style.outline = "2px solid green";
  }
});

email.addEventListener("input", () => {
  if (email.value === "") {
    email.parentElement.style.outline = "2px solid red";
  } else if (!validateEmail(email.value)) {
    email.parentElement.style.outline = "2px solid red";
  } else {
    email.parentElement.style.outline = "2px solid green";
  }
});

password.addEventListener("input", () => {
  if (
    password.value.length < 8 ||
    password.value.length > 16 ||
    password.value === ""
  ) {
    password.parentElement.style.outline = "2px solid red";
  } else {
    password.parentElement.style.outline = "2px solid green";
  }
});

passwordRepeat.addEventListener("input", () => {
  if (password.value !== passwordRepeat.value) {
    passwordRepeat.parentElement.style.outline = "2px solid red";
  } else {
    passwordRepeat.parentElement.style.outline = "2px solid green";
  }
});

form.addEventListener("submit", function (event) {
  event.preventDefault();
});
