let email = document.getElementById("email");
let password = document.getElementById("password");

let greenOutline = "2px solid #61ba61";
let redOutline = "2px solid #e93e36";

function validateEmail(email) {
  let re =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  return re.test(String(email).toLowerCase());
}

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
