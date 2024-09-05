<?php
//hier include ik classes om verschilende functies uit te voeren
include "../classes/database.php";
include "../Classes/blog.php";
include "../Classes/sessie.php";

$image = null;

$Sessie = Session::findActiveSession();

if ($Session = null) {

    header("location: ../index.php");
    exit;
}

if (isset($_POST["plaats"])) {

    if (!empty($_FILES["image"]["name"])) {
        $image = $_FILES["image"]["name"];

        $target = "../upload/" . basename($image);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target);
    }

    $set = new set();
    $set->title = $_POST['titel'];
    $set->image = $image;
    $set->author = $_POST['auteur'];
    $set->content = $_POST['content'];
    $set->insert();

    header("location: admin.php");
}


?>



<html>

<head>
    <title>Plaats blog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../Css/admin.css">
    <link rel="stylesheet" href="../CSS/jquery-te-1.4.0.css">
</head>

<body>
    <div class="container-fluid text-center">
        <div class="row align-items-start" id="rowTop">
            <div class="col text-left">
                <input type="button" id="bekijk" name="bekijk" value="Bekijk">
            </div>
            <div class="col">
                <center>
                    <h1 id="welkom"> Welkom </h1>
                </center>
            </div>
            <div class="col text-right">
                <input type="button" id="loguit" name="loguit" value="Uitloggen">
            </div>
        </div>
        <form method="post" enctype="multipart/form-data">
            <div class="row align-items-start" id="rowMid">
                <div class="col">
                    <div class="row">
                        <div class="col-4">
                            <p id="kleur">Voer titel in</p>
                        </div>
                        <div class="col-8">
                            <input type="text" id="titel" name="titel" placeholder="voer titel in">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p id="kleur">Voer auteur in</p>
                        </div>
                        <div class="col-8">
                            <input type="text" id="auteur" name="auteur" placeholder="Voer auteur in">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <p id="kleur">Voeg afbeelding toe</p>
                        </div>
                        <div class="col-8">
                            <input type="file" id="afbeelding" name="afbeelding" placeholder="voeg afbeelding toe">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                        </div>
                        <div class="col-8">
                            <input type="submit" id="plaats" name="plaats" value="Plaats blog">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <textarea class="jqte" id="content" name="content" required></textarea>
                </div>
            </div>
        </form>
</body>
<footer>

</footer>

</html>

<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="uft-8"></script>
<script type="text/javascript" src="../js/jquery-te-1.4.0.min.js" charset="uft-8"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.cs"></script>

<script>
    $('.jqte').jqte();
</script>