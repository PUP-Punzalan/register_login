<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Styles / CSS -->
  <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./style.css">
  <script defer src="./script.js" ></script>

  <!-- Title -->
  <title>A3 | Login</title>
</head>
<body>
  <div class="container">
    <!-- PHP -->
    <?php

    ?>

    <!-- HTML -->
    <div id="test"></div>
    <div class="form-container">
      <div class="title-container">
        <h2 class="fs-lg fw-bold">Login</h1>
        <h4 class="fs-sm fw-thin fc-03">Login to use full range of functions.</h4>
      </div>
      <form id="form" action="registration.php" method="post">
        <div class="group">
          <label for="username">Username</label>
          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <input id="username" type="text" name="username" placeholder="Enter username">
          </div>
          <!-- <i class="fa-solid fa-circle-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <div id="error">Error</div> -->
        </div>
        <div class="group">
          <label for="email">Email</label>
          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <input id="email" type="email" name="email" placeholder="Enter email">
          </div>
          <!-- <i class="fa-solid fa-circle-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <div id="error">Error</div> -->
        </div>
        <div class="group">
          <label for="password">Password</label>
          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <input id="password" type="password" name="password" placeholder="Enter password">
          </div>
          <!-- <i class="fa-solid fa-circle-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <div id="error">Error</div> -->
        </div>
        
        
        <div class="form-btn">
          <input type="submit" name="submit" value="Login">
        </div>
      </form>
    </div>
  </div>
</body>
</html>