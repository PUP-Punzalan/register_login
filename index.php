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
  <div class="container" id="container">
    <!-- PHP -->
    <?php
      session_start();
      if (!isset($_SESSION["user"])) {
        header("Location: login.php");
      }
    ?>

    <div class="dashboard">
      <h1 class="fc-01">welcome</h1>
      <div class="form-btn">
        <a href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</body>
</html>