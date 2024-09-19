<?php
// Include classes for different functionalities
include "../classes/database.php";
include "../Classes/set.php";
include "../Classes/session.php";

$image = null;

$Session = Session::findActiveSession();

if (isset($_POST['logout'])) {
    header("location: ../index.php");
    exit;
}
if (isset($_POST['watch'])) {
    header("location: ../products.php");
    exit;
}

if ($Session == null) { // Corrected comparison operator

    header("location: ../index.php");
    exit;
}

if (isset($_POST["plaats"])) {

    if (!empty($_FILES["afbeelding"]["name"])) {
        $image = $_FILES["afbeelding"]["name"];

        $target = "../upload/" . basename($image);
        move_uploaded_file($_FILES["afbeelding"]["tmp_name"], $target);
    }

    $set = new Set();
    $set->id = $_POST['set_id'];
    $set->name = $_POST['name'];
    $set->description = $_POST['description'];
    $set->brandId = $_POST['brandId'];
    $set->themeId = $_POST['themeId'];
    $set->price = $_POST['price'];
    $set->age = $_POST['age'];
    $set->pieces = $_POST['pieces'];
    $set->stock = $_POST['stock'];
    $set->image = $image; // Corrected to use uploaded image
    $set->insert();

    header("location: admin.php");
    exit;
}
?>

<html>

<head>
    <title>Plaats blog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="stylesheet" href="../CSS/jquery-te-1.4.0.css">
</head>

<body style="background-image: url(../images/lego\ \(1\).jpeg);">
    <div class="container-fluid text-center">
        <div class="row align-items-start" id="rowTop">
            <div class="col text-left">
                <form method="post">
                    <input type="submit" id="watch" name="watch" value="watch">
                </form>
            </div>
            <center>
                <h1> welkom </h1>
            </center>
            <div class="col">
                <form method="post">
                    <div class="col text-right">
                        <input type="submit" id="logout" name="logout" value="Uitloggen">
                    </div>
                </form>
            </div>
        </div>
            <strong><form method="post" enctype="multipart/form-data" style="color:white;">
                <div class="row align-items-start" id="rowMid">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="name">Voer de naam in</label>

                                    <input type="text" class="form-control" style="width: 30%;" id="name" name="name" placeholder="Voer de naam in">

                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="brandId">Voer brand id in</label>

                                    <input type="text" class="form-control" style="width: 30%;" id="brandId" name="brandId" placeholder="Voer brand id in">

                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="themeId">Voer theme id in</label>

                                    <input type="text" class="form-control" style="width: 30%;" id="themeId" name="themeId" placeholder="Voer theme id in">

                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="price">Voer prijs in</label>

                                    <input type="text" class="form-control" style="width: 30%;" id="price" name="price" placeholder="Voer prijs in">

                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="age">Voer leeftijd in</label>

                                    <input type="text" class="form-control" style="width: 30%;" id="age" name="age" placeholder="Voer leeftijd in">

                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="pieces">Voer aantal stenen in</label>

                                    <input type="text" class="form-control" style="width: 30%;" id="pieces" name="pieces" placeholder="Voer aantal in">

                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="stock">Voer voorraad in</label>

                                    <input type="text" class="form-control" style="width: 30%;" id="stock" name="stock" placeholder="Voer voorraad in">

                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="afbeelding">Voeg afbeelding toe</label>

                                    <input type="file" class="form-control-file" id="afbeelding" name="afbeelding">

                                </div>
                            </div>
                            <div class="col-6">
                            <textarea class="jqte" id="content" name="content" style="width: 70%;" required></textarea>
                        </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <input type="submit" class="btn btn-primary" style="margin-left: 500px;" id="plaats" name="plaats" value="Plaats blog">
                                </div>
                            </div>
                        </div>
                        

                    </div>
                </div>

        </div>
    </div>
    </form></strong>
    </div>
</body>
<footer></footer>

</html>

<script src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>
<script src="../js/jquery-te-1.4.0.min.js" charset="utf-8"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $('.jqte').jqte();
</script>