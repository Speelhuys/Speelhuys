<?php
//hier include ik classes om verschilende functies uit te voeren
include "../Classes/database.php";
include "../Classes/blog.php";
include "../Classes/sessie.php";



?>  

<html>

<head>
    <title>Bekijk blog</title>
    <!-- hier voeg ik mijn css toe en bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../Css/admin.css">
    <link rel="stylesheet" href="../CSS/jquery-te-1.4.0.css">

</head>


<body>
    <!-- hier onder zie je alles wat op de pagina komt zoals een button -->
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
                //hier word de functie FindAll uitgevoerd en daarmee worden alle blogs opgehaald
                $blogs = blog::FindAll();

                $Sessie = Sessie::vindActieveSessie();

                if ($Sessie == null) {
                  //als je hier niet meer goed bent ingelogd word je terug gestuurd naar de inlog pagina
                    header("location: ../index.php");
                    exit;
                }

                foreach ($blogs as $blog) {

                ?>
                <!--  hier worden de blogs toegevoegd en kan je ze als admin ook bewerken en verwijderen -->
                    <div class="col-4" id="afstand">
                        <div class="card">
                            <img src="<?= "../Upload/" . $blog->image ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title" id="kaardKleur">title: <?php echo $blog->title; ?></h5>
                                <p class="card-text" id="kaardKleur">author: <?php echo $blog->author; ?></p>
                                <a href="delete.php?id=<?php echo $blog->id; ?>" onclick="return confirm('are you sure?')" class="card-link">Verwijder</a>
                               <!-- HIER KOMT EEN MELDING  -->
                                <a href="edit.php?id=<?php echo $blog->id; ?>" class="card-link"> bewerk</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>



</body>


</html>