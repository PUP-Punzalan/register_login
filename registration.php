<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Styles / CSS -->
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/> -->
  <!-- <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script> -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
  <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./style.css">
  <script src="./script.js" defer></script>

  <!-- Title -->
  <title>A3 | Register</title>
</head>
<body>
  <div class="container">
    <!-- PHP -->
    <?php
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
        array_push($errors, "Your password is too short. Must be at least 8 characters long.");
      } else if (strlen($password) > 16) {
        array_push($errors, "Your password is too long. Maximum of 16 characters only.");
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
        foreach ($errors as $error) {
          echo "<div class='error-message fc-01'>$error</div>";
        }
      } else {
        $sql = "INSERT INTO user_accounts(full_name, username, email, password) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        $prepare = mysqli_stmt_prepare($stmt, $sql);

        if ($prepare) {
          mysqli_stmt_bind_param($stmt,"ssss", $fullname, $username, $email, $passwordEncrpyt);
          mysqli_stmt_execute($stmt);
          echo"<div class='fc-01'>REGISTRATION SUCCESSFUL!</div>";
        } else {
          die("ERROR NOT SUCCESS");
        }
      }
    }


    ?>

    <!-- HTML -->
    <div class="form-container">
      <div class="title-container">
        <h2 class="fs-lg fw-bold">Registeration</h1>
        <h4 class="fs-sm fw-thin fc-03">Create an account to use full range of functions.</h4>
      </div>
      <form action="registration.php" method="post">
        <div class="group">
          <label for="fullname">Name</label>
          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="fullname" placeholder="Enter name">
          </div>
          <i class="fa-solid fa-circle-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <div id="error">Error</div>
        </div>
        <div class="group">
          <label for="username">Username</label>
          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="username" placeholder="Enter username">
          </div>
          <i class="fa-solid fa-circle-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <div id="error">Error</div>
        </div>
        <div class="group">
          <label for="email">Email</label>
          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <input type="email" name="email" placeholder="Enter email">
          </div>
          <i class="fa-solid fa-circle-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <div id="error">Error</div>
        </div>
        <div class="group">
          <label for="password">Password</label>
          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <input type="password" name="password" placeholder="Enter password">
          </div>
          <i class="fa-solid fa-circle-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <div id="error">Error</div>
        </div>
        <div class="group">
          <label for="passwordRepeat">Repeat Password</label>
          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <input type="password" name="passwordRepeat" placeholder="Repeat password">
          </div>
          <i class="fa-solid fa-circle-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <div id="error">Error</div>
        </div>
        
        <div class="form-group">
          <input type="submit" name="submit" value="Register">
        </div>
      </form>
    </div>
  </div>
</body>
</html>