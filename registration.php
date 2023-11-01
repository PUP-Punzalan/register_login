<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Styles / CSS -->
  <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./style.css">
  <script defer src="./registration.js" ></script>

  <!-- Title -->
  <title>A3 | Register</title>
</head>
<body>
  <!-- PHP -->
  <?php
    // $_POST = array();

    // Check if the user is already logged in
    session_start();
    if (isset($_SESSION["user"])) {
      header("Location: index.php");
    }

    if (isset($_POST["submit"])) {
      // Storing data to variables
      $firstName = $_POST["first_name"];
      $middleInitial = $_POST["middle_initial"];
      $lastName = $_POST["last_name"];
      $dateOfBirth = date('Y-m-d', strtotime($_POST["date_of_birth"]));
      $gender = $_POST["gender"];
      $areaCode = $_POST["area_code"];
      $phoneNumber = $_POST["phone_number"];
      $email = $_POST["email"];
      $streetAddress = $_POST["street_address"];
      $city = $_POST["city"];
      $stateProvince = $_POST["state_province"];
      $postalCode = $_POST["postal_code"];
      $country = $_POST["country"];
      $password = $_POST["password"];
      $passwordRepeat = $_POST["passwordRepeat"];

      // Additional required variables
      $passwordEncrpyt = password_hash($password, PASSWORD_DEFAULT); # Password encryption
      $errors = array(); # Error message variable

      
      // Empty input field validator, except for the middle initial
      if (empty($firstName) OR empty($lastName) OR empty($dateOfBirth) OR empty($areaCode) OR empty($phoneNumber) OR empty($email) OR empty($streetAddress) OR empty($city) OR empty($stateProvince) OR empty($postalCode) OR empty($country)) {
        array_push($errors, "All fields are required. Please try again.");
      }

      // Age calculator
      $dateOfBirthConverted = new DateTime($dateOfBirth); # Converting the date entered by the user
      $currentDate = new DateTime(date('Y/m/d')); # Getting the current date
      $dateInterval = $currentDate -> diff($dateOfBirthConverted); # Subtracting the current date to the date entered by the user
      $age = $dateInterval -> y; # Storing the year to the age variable

      // Date of birth validator
      if ($age < 18) {
        array_push($errors, "You must be at least 18 years old to register.");
      }
      
      // Gender validator
      if ($gender === "none") {
        array_push($errors, "Select a gender or decline to answer.");
      }

      // Email validator
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Invalid email. Please try again.");
      }

      // Password lenght validator
      if (strlen($password) < 8) {
        array_push($errors, "Password must be 8 characters long.");
      } else if (strlen($password) > 16) {
        array_push($errors, "Password must be at most 16 characters long.");
      }

      // Repeat password validator
      if ($password != $passwordRepeat) {
        array_push($errors, "Password does not match. Please try again.");
      }
      
      // Existing email validator
      require_once "database.php";
      $sql_email = "SELECT * FROM user_accounts WHERE email = '$email'";
      $result_email = mysqli_query($conn, $sql_email);
      if (mysqli_num_rows($result_email) > 0) {
        array_push($errors,"Email already exists. Please try again.");
      }

      // Phone number validator
      $sql_phoneNumber = "SELECT * FROM user_accounts WHERE phone_number = '$phoneNumber'";
      $result_phoneNumber = mysqli_query($conn, $sql_phoneNumber);
      if (mysqli_num_rows($result_phoneNumber) > 0) {
        array_push($errors,"Phone number already exists. Please try again.");
      }

      // Error printer
      if (count($errors) > 0) {
        echo "<div class='popup-messages'>";
        foreach ($errors as $error) {
          echo "<div class='popup error fc-01'>$error</div>";
        }
        echo "</div>";
      } else { # Storing it to the database
        $sql = "INSERT INTO user_accounts(first_name, middle_name, last_name, date_of_birth, gender, area_code, phone_number, email, street_address, city, state_province, postal_code, country, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        $prepare = mysqli_stmt_prepare($stmt, $sql);

        if ($prepare) {
          mysqli_stmt_bind_param($stmt,"ssssssssssssss", $firstName, $middleInitial, $lastName, $dateOfBirth, $gender, $areaCode, $phoneNumber, $email, $streetAddress, $city, $stateProvince, $postalCode, $country, $passwordEncrpyt);
          mysqli_stmt_execute($stmt);
          echo"<div class='popup-messages'><div class='popup success fc-01'>Registration successful. Please log in.</div></div>";
        } else {
          die("ERROR NOT SUCCESS");
        }
      }
    }
  ?>

  <!-- HTML -->
  <div class="container" id="container">
    <div class="form-container">
      <div class="title-container">
        <h2 class="fs-lg fw-bold">Registeration</h1>
        <h4 class="fs-sm fw-thin fc-03">Create an account to use full range of functions.</h4>
      </div>
      <form id="form" action="registration.php" method="post" autocomplete="off">

        <!-- Full name -->
        <p class="title">Full name</p>
        <div class="group">
          <div class="input-group input-flex">
            <div class="input">
              <input id="first_name" type="text" name="first_name" placeholder="Enter first name">
              <label for="first_name">First Name</label>
            </div>
            <div class="input">
              <input id="middle_initial" type="text" name="middle_initial" placeholder="Enter middle initial">
              <label for="middle_initial">Middle Initial (optional)</label>
            </div>
            <div class="input">
              <input id="last_name" type="text" name="last_name" placeholder="Enter last name">
              <label for="last_name">Last Name</label>
            </div>
          </div>
        </div>

        <!-- Date of birth -->
        <p class="title">Date of Birth</p>
        <div class="group">
          <div class="input-group input-flex">
            <div class="input">
              <input id="date_of_birth" type="date" name="date_of_birth">
              <label for="date_of_birth">* (must be at least 18 years old)</label>
            </div>
          </div>
        </div>

        <!-- Gender -->
        <p class="title">Gender</p>
        <div class="group">
          <div class="input-group input-flex">
            <div class="input">
              <select name="gender" id="gender">
                <option value="none">--Select Gender--</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
                <option value="decline">Decline to answer</option>
              </select>
              <label for="gender">Gender</label>
            </div>
          </div>
        </div>

        <!-- Phone number -->
        <p class="title">Phone number</p>
        <div class="group">
          <div class="input-group input-flex">
            <div class="input">
              <input id="area_code" type="number" name="area_code" placeholder="Enter area code">
              <label for="area_code">Area Code</label>
            </div>
            <div class="input">
              <input id="phone_number" type="number" name="phone_number" placeholder="Enter phone number">
              <label for="phone_number">Phone number</label>
            </div>
          </div>
        </div>

        <!-- Email -->
        <p class="title">Email</p>
        <div class="group">
          <div class="input-group input-flex">
            <div class="input">
              <input id="email" type="email" name="email" placeholder="Enter email">
              <label for="email">Email</label>
            </div>
          </div>
        </div>

        <!-- Address -->
        <p class="title">Mailing Address</p>
        <div class="group">
          <div class="input-group input-flex">
            <div class="input">
              <input id="street_address" type="text" name="street_address" placeholder="Enter street address">
              <label for="street_address">Street Address</label>
            </div>
          </div>
          <div class="input-group input-flex">
            <div class="input">
              <input id="city" type="text" name="city" placeholder="Enter city">
              <label for="city">City</label>
            </div>
            <div class="input">
              <input id="state_province" type="text" name="state_province" placeholder="Enter state / province">
              <label for="state_province">State / Province</label>
            </div>
          </div>
          <div class="input-group input-flex">
            <div class="input">
              <input id="postal_code" type="number" name="postal_code" placeholder="Enter postal code">
              <label for="postal_code">Postal Code</label>
            </div>
            <div class="input">
              <input id="country" type="text" name="country" placeholder="Enter country">
              <label for="country">Country</label>
            </div>
          </div>
        </div>

        <!-- Password -->
        <p class="title">Password</p>
        <div class="group">
          <div class="input-group input-flex">
            <div class="input">
              <input id="password" type="password" name="password" placeholder="Enter password">
              <label for="password">Password (min. of 8, max. of 16 characters)</label>
            </div>
            <div class="input">
              <input id="passwordRepeat" type="password" name="passwordRepeat" placeholder="Repeat password">
              <label for="passwordRepeat">Repeat Password</label>
            </div>
          </div>
        </div>

        <div class="submit-button">
          <input type="submit" name="submit" value="Register">
        </div>
      </form>

      <!-- Button -->
      <div class="adn-container">
        <span class="adn">Already have an account? <a href="login.php" class="adn-btn">Login here</a></span>
      </div>
    </div>
  </div>
</body>
</html>