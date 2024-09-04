<?php
//hier include je classes om verschilende functies uit te voeren
include "classes/session.php";
include "classes/user.php";
include "classes/database.php";

$key = md5(uniqid(rand(), true));

$divError = "";
if (isset($_POST["submit"])) {
    $user = user::validateUser($_POST["username"], $_POST["password"]);
    if ($user == null) {
      //hier wordt een foutmelding gegeven in het geval dat de gegevens niet correct zijn
      $divError = '<br /><img src="images/error.png" width="20px" height="20px"">Voer geldige gegevens in!</img>';
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
    <link rel="stylesheet" href="css/admin.css">
</head>
<body style="background-image: url();">  <!-- hier nog een achtergrondplaatje (tenzij we gewoon een kleur doen) -->
  <h1 style="text-align:center;"><strong>Welkom</strong></h1> 
  <div style="text-align:center;">
    <br />
    <form method="post">
      <strong>Gebruikersnaam:</strong> <br /><input type="text" name="username" value="" required><br /><br /><br />
      <strong>Wachtwoord:</strong> <br /><input type="password" name="password" value="" required><br /><br />
      <input type="submit" name="btnSubmit" value="Login" style="width: 100px;">
      <?php echo $divError; ?>
    </form>
  </div>
</body>

</html>
<?php

