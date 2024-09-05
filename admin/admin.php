<?php
//hier include ik classes om verschilende functies uit te voeren
include "../classes/database.php";
include "../classes/set.php";
include "../classes/session.php";



?>  

<html>

<head>
    <title>Beheer Producten</title>
    <!-- hier voeg ik mijn css toe en bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../Css/admin.css">
    <link rel="stylesheet" href="../CSS/jquery-te-1.4.0.css">

</head>


<body>
    <div class="container-fluid text-center">
        <div class="row" id="rowTop">
            <div class="col text-left">
                <a href="insert.php" class="button" id="Plaats">Plaats</a>
            </div>
            <div class="col text-center">
                <h1 id="welkom"> Welkom </h1>
            </div>
            <div class="col text-right">

                <a href="index.php" class="button" id="Uitloggen">Uitloggen</a>
            </div>
        </div>
        <div class="col">
            <div class="row">
                
                <?php
                $product = product::FindAll();

                $Sessie = Sessie::vindActieveSessie();

                if ($Sessie == null) {
                    header("location: ../index.php");
                    exit;
                }

                foreach ($products as $product) {

                ?>

                    <div class="col-4" id="afstand">

                    </div>
                <?php } ?>
            </div>
        </div>



</body>


</html>