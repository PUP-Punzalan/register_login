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

      require_once("database.php");

      $key = $_SESSION["result"];
      $new_sql = "SELECT * FROM user_accounts WHERE email = '$key'";

      $statement = $conn->prepare($new_sql);
      $statement->execute();
      $data = $statement->get_result();

    ?>

    <div class="dashboard">
      <h1 class="fc-01">Welcome </h1>
      <div class="data-container">
        <?php 
          while ($row = $data->fetch_assoc()) {
            echo $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'];
          }
        ?>

      </div>
      <div class="form-btn">
        <a href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</body>
</html>