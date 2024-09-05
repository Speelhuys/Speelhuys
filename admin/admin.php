<?php

include "../classes/database.php";
include "../classes/set.php";
include "../classes/session.php";

if (isset($_POST['btnAdd'])) {
    header("Location:setAdd.php");
}
?>

<html>

<head>
    <title>Beheer Producten</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../Css/admin.css">
    <link rel="stylesheet" href="../CSS/jquery-te-1.4.0.css">

</head>


<body>
    <div class="container-fluid text-center">
        <div class="col text-right">

            <a href="../index.php" class="button" id="Uitloggen">Uitloggen</a>
        </div>
        <div class="row" id="rowTop">
            <div class="col text-center">
                <h1 id="welkom"> Welkom </h1>
            </div>
        </div>
        <br />
        <div class="col">
            <div class="row">

                <?php
                $set = new set;
                $sets = $set->getSets();

                foreach ($sets as $set) {
                    echo '<div class="col-4" id="afstand"><label>' . $set->name . '</label></div>';
                } ?>
            </div>
        </div>
        <form method="POST">
            <input type="submit" name="btnAdd" id="btnAdd">
        </form>



</body>


</html>