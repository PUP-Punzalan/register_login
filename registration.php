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
    // Check if the user is already logged in
    session_start();
    if (isset($_SESSION["user"])) {
      header("Location: index.php");
    }

    if (isset($_POST["submit"])) {
      $fullname = $_POST["fullname"];
      $username = $_POST["username"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      $passwordRepeat = $_POST["passwordRepeat"];

      $passwordEncrpyt = password_hash($password, PASSWORD_DEFAULT);
      $errors = array();

      // Input fields validator
      if (empty($fullname) OR empty($username) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
        array_push($errors, "All fields are required. Please try again.");
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
      $sql = "SELECT * FROM user_accounts WHERE email = '$email'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        array_push($errors,"Email already exists. Please try again.");
      }

      if (count($errors) > 0) {
        echo "<div class='popup-messages'>";

        foreach ($errors as $error) {
          echo "<div class='popup error fc-01'>$error</div>";
        }

        echo "</div>";
      } else {
        $sql = "INSERT INTO user_accounts(full_name, username, email, password) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        $prepare = mysqli_stmt_prepare($stmt, $sql);

        if ($prepare) {
          mysqli_stmt_bind_param($stmt,"ssss", $fullname, $username, $email, $passwordEncrpyt);
          mysqli_stmt_execute($stmt);
          echo"<div class='popup-messages'><div class='popup success fc-01'>Registration successful. Please log in.</div></div>";
        } else {
          die("ERROR NOT SUCCESS");
        }
      }
    }
  ?>

  <!-- HTML -->
  <div class="container" id="container" onclick="erase()">
    <div class="form-container">
      <div class="title-container">
        <h2 class="fs-lg fw-bold">Registeration</h1>
        <h4 class="fs-sm fw-thin fc-03">Create an account to use full range of functions.</h4>
      </div>
      <form id="form" action="registration.php" method="post">
        <div class="group">
          <label for="fullname">Name</label>
          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <input id="name" type="text" name="fullname" placeholder="Enter full name">
          </div>
        </div>
        <div class="group">
          <label for="username">Username</label>
          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <input id="username" type="text" name="username" placeholder="Enter username">
          </div>
        </div>
        <div class="group">
          <label for="email">Email</label>
          <div class="form-group">
            <i class="fa-solid fa-envelope"></i>
            <input id="email" type="email" name="email" placeholder="Enter email">
          </div>
        </div>
        <div class="group">
          <label for="password">Password</label>
          <div class="form-group">
            <i class="fa-solid fa-lock"></i>
            <input id="password" type="password" name="password" placeholder="Enter password">
          </div>
        </div>
        <div class="group">
          <label for="passwordRepeat">Repeat Password</label>
          <div class="form-group">
            <i class="fa-solid fa-lock"></i>
            <input id="passwordRepeat" type="password" name="passwordRepeat" placeholder="Repeat password">
          </div>
        </div>
        
        <div class="form-btn">
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