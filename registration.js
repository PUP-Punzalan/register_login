let form = document.getElementById("form");
let fullname = document.getElementById("name");
let username = document.getElementById("username");
let email = document.getElementById("email");
let password = document.getElementById("password");
let passwordRepeat = document.getElementById("passwordRepeat");

let greenOutline = "2px solid #61ba61";
let redOutline = "2px solid #e93e36";

function validateEmail(email) {
  let re =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  return re.test(String(email).toLowerCase());
}

fullname.addEventListener("input", () => {
  if (fullname.value === "") {
    fullname.parentElement.style.outline = redOutline;
  } else {
    fullname.parentElement.style.outline = greenOutline;
  }
});

username.addEventListener("input", () => {
  if (username.value === "") {
    username.parentElement.style.outline = redOutline;
  } else {
    username.parentElement.style.outline = greenOutline;
  }
});

email.addEventListener("input", () => {
  if (email.value === "") {
    email.parentElement.style.outline = redOutline;
  } else if (!validateEmail(email.value)) {
    email.parentElement.style.outline = redOutline;
  } else {
    email.parentElement.style.outline = greenOutline;
  }
});

password.addEventListener("input", () => {
  if (
    password.value.length < 8 ||
    password.value.length > 16 ||
    password.value === ""
  ) {
    password.parentElement.style.outline = redOutline;
  } else {
    password.parentElement.style.outline = greenOutline;
  }
});

passwordRepeat.addEventListener("input", () => {
  if (password.value !== passwordRepeat.value) {
    passwordRepeat.parentElement.style.outline = redOutline;
  } else {
    passwordRepeat.parentElement.style.outline = greenOutline;
  }
});

// form.addEventListener("submit", function (event) {
//   event.preventDefault();
// });
