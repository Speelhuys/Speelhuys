<?php
include "../classes/database.php";
include "../Classes/set.php";
include "../Classes/session.php";

$image = null;
$Session = Session::findActiveSession();

//checkt voor sessie
if ($Session == null) { 
    header("location: ../index.php");
    exit;
}

// Voegt ingevulde gegevens toe aan de database
if (isset($_POST["btnAdd"])) {

    if (!empty($_FILES["image"]["name"])) {
        $image = $_FILES["image"]["name"];

        $target = "../images/sets/" . basename($image);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target);
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

    header("location: admin.php?message=Product successvol toegevoegd");
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
            </div>
            <center>
                <h1> welkom </h1>
            </center>
            <div class="col">
            </div>
        </div>
        <strong>
            <form method="post" enctype="multipart/form-data" style="color:white;">
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
                                    <input type="file" id="image" name="image" placeholder="voeg afbeelding toe">
                                </div>
                            </div>
                            <div class="col-6">
                                <textarea class="jqte" id="description" name="description" required></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <input type="submit" class="btn btn-primary" style="margin-left: 500px;" id="btnAdd" name="btnAdd" value="Plaats blog">
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