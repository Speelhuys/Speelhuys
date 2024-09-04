<?php
//hier include ik classes om verschilende functies uit te voeren
include "../Classes/sessie.php";
include "../Classes/gebruiker.php";
include "../Classes/database.php";

$key = md5(uniqid(rand(), true));

// hier word gecheckt of de gebruiker wel in de database staat
$error = "";
if (isset($_POST["username"])) {
    // hier word een nieuwe sessie gemaakt
    $sessie = new Sessie();
    $gebruikers = gebruiker::getByUsernameAndPassword($_POST['username'], $_POST['password']);
    
    if (count($gebruikers) > 0) {
        foreach ($gebruikers as $gebruiker) {
            $sessie->userId = $gebruiker->userId;
            $sessie->key = $key;
            $sessie->start = date("Y-m-d H:i:s");
            $sessie->end = date("Y-m-d H:i:s", strtotime("+1 month"));
            $sessie->insert();
        }

         // hier word een cookie gemaakt voor 1 maand je gebruikt een cookie om gegevens op teslaan van de ingelogde gebruiker
        setcookie("keukenprins-session", $key, strtotime("+1 month"), "/");
        header("location: admin.php");
    } else {
        $error = "er is geen juiste gebruiker gevonden";
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
        <?php
        echo "<br>";
        echo $error;
        ?>
    </form>
</body>

</html>
<?php

