<?php
//hier include je classes om verschilende functies uit te voeren
include "../classes/session.php";
include "../classes/user.php";
include "../classes/database.php";

$key = md5(uniqid(rand(), true));

$divError = "";
if (isset($_POST["submit"])) {
    $user = user::validateUser($_POST["username"], $_POST["password"]);
    if ($user == null) {
      //hier wordt een foutmelding gegeven in het geval dat de gegevens niet correct zijn
      $divError = '<br /><img src="error.png" width="20px" height="20px"">Voer geldige gegevens in!</img>';
    } else {
      //hier wordt een nieuwe sessie gecreërd
      $key = md5(uniqid(rand(), true));
      $session = new Session();
      $session->userId = $user->id;
      $session->key = $key;
      $session->start = date("Y-m-d H:i:s");
      $session->end = date("Y-m-d H:i:s", strtotime("+1 month"));
      setcookie("speelhuys-session", $key, strtotime("+1 month"), "/");
      $session->insert();
      header("Location: admin/admin.php");
    }
  }

?>

<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="../Css/admin.css">
</head>

<body id="center">
    <h2>Inloggen</h2>
    <form method="POST">
        <label for="username">Gebruikersnaam:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Wachtwoord:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Inloggen">
    </form>
</body>

</html>
<?php

