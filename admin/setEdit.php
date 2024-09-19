<?php
include "../classes/database.php";
include "../Classes/set.php";
include "../Classes/session.php";

$image = null;

$Session = Session::findActiveSession();
if (isset($_GET['id'])) {
$id = $_GET['id'];
$set = set::getSet($id);
if (isset($_POST['btnEdit'])) {
    $set = new set;
    $set->id = $id;
    $set->name = $_POST['name'];
    $set->description = $_POST['description'];
    $set->brandId = $_POST['brandId'];  
    $set->themeId = $_POST['themeId'];
    $set->price = $_POST['price'];
    $set->age = $_POST['age'];
    $set->pieces =$_POST['pieces'];
    $set->stock =$_POST['stock'];
    $set->image = $image;
    $set->update();
    header("Location: products.php?message= Product successvol aangepast");
}
}

if (isset($_POST['logout'])) {
    header("location: ../index.php");
    exit;
}
if (isset($_POST['watch'])) {
    header("location: ../products.php");
    exit;
}

if ($Session == null) { 

    header("location: ../index.php");
    exit;
}

if (isset($_POST["plaats"])) {

    if (!empty($_FILES["image"]["name"])) {
        $image = $_FILES["image"]["name"];

        $target = "../image/sets/" . basename($image);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target);
    }
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
            <form method="post" enctype="multipart/form-data">
                <div class="row align-items-start" id="rowMid">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="name" value="<?php echo $set->name ?>">Voer de naam in</label>

                                    <input type="text" class="form-control" style="width: 30%;" id="name" name="name" placeholder="Voer de naam in">

                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="brandId" value=" <?php echo $set->brandId ?>">Voer brand id in</label>

                                    <input type="text" class="form-control" style="width: 30%;" id="brandId" name="brandId" placeholder="Voer brand id in">

                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="themeId" value="<?php echo $set->themeId ?>">Voer theme id in</label>

                                    <input type="text" class="form-control" style="width: 30%;" id="themeId" name="themeId" placeholder="Voer theme id in">

                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="price" value="<?php echo $set->price ?>">Voer prijs in</label>

                                    <input type="text" class="form-control" style="width: 30%;" id="price" name="price" placeholder="Voer prijs in">

                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="age" value="<?php echo $set->age?>">Voer leeftijd in</label>

                                    <input type="text" class="form-control" style="width: 30%;" id="age" name="age" placeholder="Voer leeftijd in">

                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="pieces" value="<?php echo $set->pieces?>">Voer aantal stenen in</label>

                                    <input type="text" class="form-control" style="width: 30%;" id="pieces" name="pieces" placeholder="Voer aantal in">

                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="stock"value="<?php echo $set->stock ?>">Voer voorraad in</label>

                                    <input type="text" class="form-control" style="width: 30%;" id="stock" name="stock" placeholder="Voer voorraad in">

                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="afbeelding" value="<?php echo $set->image ?>">Voeg afbeelding toe</label>

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
    </form>
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