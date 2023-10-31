<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Styles / CSS -->
  <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./style.css">
  <script defer src="./login.js" ></script>

  <!-- Title -->
  <title>A3 | Login</title>
</head>
<body>
  <!-- PHP -->
  <?php
    // Check if the user is already logged in
    session_start();
    if (isset($_SESSION["user"])) {
      header("Location: index.php");
    }

    if (isset($_POST["login"])) {
      $email = $_POST["email"];
      $password = $_POST["password"];

      require_once("database.php");
      $sql = "SELECT * FROM user_accounts WHERE email = '$email'";
      $result = mysqli_query($conn, $sql);
      $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
      if ($user) {
        if (password_verify($password, $user["password"])) {
          session_start();
          $_SESSION["user"] = "yes";
          header("Location: index.php");
          die("");
        } else {
          echo "<div class='popup-messages'><div class='popup error fc-01'>Incorrect password. Please try again.</div></div>";
        }
      } else {
        echo "<div class='popup-messages'><div class='popup error fc-01'>Invalid email. Please try again.</div></div>";
      }
    }
  ?>

  <!-- HTML -->
  <div class="container" id="container">
    <div class="form-container">
      <div class="title-container">
        <h2 class="fs-lg fw-bold">Login</h1>
        <h4 class="fs-sm fw-thin fc-03">Login to the system</h4>
      </div>
      <form id="form" action="login.php" method="post">
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
        
        <div class="form-btn">
          <input type="submit" name="login" value="Login">
        </div>
      </form>

      <!-- Button -->
      <div class="adn-container">
        <span class="adn">Don't have an account yet? <a href="registration.php" class="adn-btn">Register here</a></span>
      </div>
    </div>
  </div>
</body>
</html>