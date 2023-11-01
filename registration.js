let form = document.getElementById("form");
let firstName = document.getElementById("first_name");
let middleInitial = document.getElementById("middle_initial");
let lastName = document.getElementById("last_name");
let dateOfBirth = document.getElementById("date_of_birth");
let gender = document.getElementById("gender");
let areaCode = document.getElementById("area_code");
let phoneNumber = document.getElementById("phone_number");
let streetAddress = document.getElementById("street_address");
let city = document.getElementById("city");
let stateProvince = document.getElementById("state_province");
let postalCode = document.getElementById("postal_code");
let country = document.getElementById("country");
let password = document.getElementById("password");
let passwordRepeat = document.getElementById("passwordRepeat");

let greenOutline = "2px solid #61ba61";
let redOutline = "2px solid #e93e36";

function validateEmail(email) {
  let re =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  return re.test(String(email).toLowerCase());
}

firstName.addEventListener("input", () => {
  if (firstName.value === "") {
    firstName.style.outline = redOutline;
  } else {
    firstName.style.outline = greenOutline;
  }
});

middleInitial.addEventListener("input", () => {
  if (middleInitial.value === "") {
    middleInitial.style.outline = redOutline;
  } else {
    middleInitial.style.outline = greenOutline;
  }
});

lastName.addEventListener("input", () => {
  if (lastName.value === "") {
    lastName.style.outline = redOutline;
  } else {
    lastName.style.outline = greenOutline;
  }
});

dateOfBirth.addEventListener("input", () => {
  let dateOfBirthConverted = new Date(dateOfBirth.value);
  let currentDate = new Date();
  // let convertedDate = currentDate.toISOString().split("T")[0];

  console.log(dateOfBirthConverted);
  console.log(currentDate);

  let duration = currentDate - dateOfBirthConverted;
  console.log(duration);
  let age = Math.floor(Math.abs(duration / 3.154e10));
  console.log(age);

  if (age <= 17 || age === null) {
    dateOfBirth.style.outline = redOutline;
  } else {
    dateOfBirth.style.outline = greenOutline;
  }
});

gender.addEventListener("input", () => {
  if (gender.value === "none") {
    gender.style.outline = redOutline;
  } else {
    gender.style.outline = greenOutline;
  }
});

areaCode.addEventListener("input", () => {
  if (areaCode.value.length > 5 || areaCode.value === "") {
    areaCode.style.outline = redOutline;
  } else {
    areaCode.style.outline = greenOutline;
  }
});

phoneNumber.addEventListener("input", () => {
  if (phoneNumber.value.length > 10 || phoneNumber.value === "") {
    phoneNumber.style.outline = redOutline;
  } else {
    phoneNumber.style.outline = greenOutline;
  }
});

email.addEventListener("input", () => {
  if (email.value === "") {
    email.style.outline = redOutline;
  } else if (!validateEmail(email.value)) {
    email.style.outline = redOutline;
  } else {
    email.style.outline = greenOutline;
  }
});

streetAddress.addEventListener("input", () => {
  if (streetAddress.value === "") {
    streetAddress.style.outline = redOutline;
  } else {
    streetAddress.style.outline = greenOutline;
  }
});

city.addEventListener("input", () => {
  if (city.value === "") {
    city.style.outline = redOutline;
  } else {
    city.style.outline = greenOutline;
  }
});

stateProvince.addEventListener("input", () => {
  if (stateProvince.value === "") {
    stateProvince.style.outline = redOutline;
  } else {
    stateProvince.style.outline = greenOutline;
  }
});

postalCode.addEventListener("input", () => {
  if (postalCode.value.length > 5 || postalCode.value === "") {
    postalCode.style.outline = redOutline;
  } else {
    postalCode.style.outline = greenOutline;
  }
});

country.addEventListener("input", () => {
  if (country.value === "") {
    country.style.outline = redOutline;
  } else {
    country.style.outline = greenOutline;
  }
});

password.addEventListener("input", () => {
  if (
    password.value.length < 8 ||
    password.value.length > 16 ||
    password.value === ""
  ) {
    password.style.outline = redOutline;
  } else {
    password.style.outline = greenOutline;
  }
});

passwordRepeat.addEventListener("input", () => {
  if (password.value !== passwordRepeat.value) {
    passwordRepeat.style.outline = redOutline;
  } else {
    passwordRepeat.style.outline = greenOutline;
  }
});

// form.addEventListener("submit", function (event) {
//   event.preventDefault();
// });

// var complaint_date = new Date("15-JUL-2020");
// var current_date = new Date("21-JUL-2020");
// var duration = current_date - complaint_date;
// console.log(complaint_date); // diff in milliseconds
// console.log(current_date); // diff in milliseconds
// console.log(duration); // diff in milliseconds
// console.log(Math.round(Math.abs(duration / (24 * 60 * 60 * 1000)))); // diff in days
