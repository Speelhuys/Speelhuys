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
    $set->image = $image;
    $set = new set();
    $set->id = $_POST['set_id'];
    $set->name = $_POST['set_name'];
    $set->description = $_POST['set_category'];
    $set->brandId = $_POST['set_price'];
    $set->themeId = $_POST['set_themeId'];
    $set->image = $_POST['set_image'];
    $set->price = $_POST['set_price'];
    $set->age = $_POST['set_age'];
    $set->pieces = $_POST['set_pieces'];
    $set->stock = $_POST['set_stock'];
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
                <input type="button" id="bekijk" name="watch" value="watch">
            </div>
            <div class="col">
                <center>
                    <h1 id="welkom"> Welkom </h1>
                </center>
            </div>
            <div class="col text-right">
                <input type="button" id="logout" name="logout" value="Uitloggen">
            </div>
        </div>
        <form method="post" enctype="multipart/form-data">
            <div class="row align-items-start" id="rowMid">
                <div class="col">
                    <div class="row">
                        <div class="col-4">
                            <p id="colour">Voer de naam in</p>
                        </div>
                        <div class="col-8">
                            <input type="text" id="name" name="name" placeholder="voer de naam in in">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p id="kleur">Voer beschrijving in</p>
                        </div>
                        <div class="col-8">
                            <input type="text" id="description" name="description" placeholder="Voer beschrijving in">
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p id="kleur">Voer bran id in</p>
                            </div>
                            <div class="col-8">
                                <input type="text" id="brandId" name="brandId" placeholder="Voer Brand id in">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p id="kleur">Voer theme id in</p>
                            </div>
                            <div class="col-8">
                                <input type="text" id="ThemeId" name="themeId" placeholder="Voer theme id in">
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <p id="kleur">Voer prijs in</p>
                                </div>
                                <div class="col-8">
                                    <input type="text" id="price" name="price" placeholder="Voer prijs  in">
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <p id="kleur">Voer leeftijd in</p>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" id="age" name="age" placeholder="Voer leeftijd in">
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p id="kleur">Voer aantal stenen in</p>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" id="pieces" name="pieces" placeholder="Voer aantal in">
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p id="kleur">Voer vorraad in</p>
                                            </div>
                                            <div class="col-8">
                                                <input type="text" id="stock" name="stock" placeholder="Voer voorraad in">
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