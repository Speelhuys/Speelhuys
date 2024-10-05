<?php
require "classes/session.php";
require "classes/user.php";
require "classes/database.php";

// checkt of er een message is doorgegeven
$divError = null;
if (isset($_GET["message"])) {
  $_GET["message"];
}

if (isset($_POST["submit"])) {
  $user = user::validateUser($_POST["username"], $_POST["password"]);
  if ($user == null) {
    // Foutmelding als de inloggegevens onjuist zijn
    $divError = '<div class="error-message"><img src="images/error.png" alt="error" />Voer geldige gegevens in!</div>';
  } else {
    // Nieuwe sessie aanmaken
    $key = md5(uniqid(rand(), true));
    $session = new Session();
    $session->userId = $user->id;
    $session->key = $key;
    $session->start = date("Y-m-d H:i:s");
    $session->end = date("Y-m-d H:i:s", strtotime("+1 month"));
    setcookie("speelhuys-session", $key, strtotime("+1 month"), "/");
    $session->insert();
    header("Location: admin/admin.php?userid=$user->id");
  }
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    body {
      background-image: url('images/background.jpg'); /* Voeg een mooie achtergrondafbeelding toe */
      background-size: cover;
      font-family: 'Arial', sans-serif;
      color: #333;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    h1 {
      color: #fff;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }

    .login-container {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      text-align: center;
      width: 300px;
    }

    .login-container input[type="text"],
    .login-container input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .login-container input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
    }

    .login-container input[type="submit"]:hover {
      background-color: #45a049;
    }

    .error-message {
      color: red;
      font-size: 14px;
      margin-top: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .error-message img {
      margin-right: 10px;
      width: 20px;
      height: 20px;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <h1><strong>Welkom</strong></h1>
    <form method="post">
      <label for="username"><strong>Gebruikersnaam:</strong></label>
      <input type="text" name="username" id="username" value="" required>

      <label for="password"><strong>Wachtwoord:</strong></label>
      <input type="password" name="password" id="password" value="" required>

      <input type="submit" name="submit" value="Login">
      <?php echo $divError; ?>
    </form>
  </div>
</body>

</html>