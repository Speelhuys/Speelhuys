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

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plaats Blog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="stylesheet" href="../CSS/jquery-te-1.4.0.css">
    <style>
        body {
            background-image: url('../images/lego\ \(1\).jpeg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #f5f5f5;
            font-family: 'Arial', sans-serif;
        }

        .container-fluid {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.7);
        }

        h1 {
            font-size: 3rem;
            font-weight: bold;
            text-transform: uppercase;
            color: #f5f5f5;
            text-shadow: 4px 4px 10px rgba(0, 0, 0, 0.8);
            margin-bottom: 30px;
        }

        .form-control {
            background-color: #222;
            color: #f5f5f5;
            border: none;
            border-radius: 5px;
        }

        .form-control::placeholder {
            color: #888;
        }

        .form-control-file {
            color: #f5f5f5;
        }

        label {
            color: #ddd;
            font-size: 1.2rem;
        }

        .btn-primary {
            background-color: #ff6f61;
            border-color: #ff6f61;
            font-size: 1.2rem;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #e65b50;
        }

        #watch, #logout {
            background-color: #ff6f61;
            border: none;
            padding: 10px 20px;
            color: #f5f5f5;
            font-size: 1.1rem;
            border-radius: 5px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        #watch:hover, #logout:hover {
            background-color: #e65b50;
            transform: scale(1.05);
        }

        textarea.jqte {
            background-color: #222;
            color: #f5f5f5;
            border-radius: 5px;
        }

        footer {
            background-color: rgba(0, 0, 0, 0.9);
            color: #888;
            text-align: center;
            padding: 20px;
            margin-top: 30px;
            border-radius: 0 0 15px 15px;
        }
    </style>
</head>

<body>
    <div class="container-fluid text-center">
        <div class="row align-items-start" id="rowTop">
            <div class="col text-left">
                <form method="post">
                    <input type="submit" id="watch" name="watch" value="Bekijk">
                </form>
            </div>
            <div class="col text-center">
                <h1>Welkom</h1>
            </div>
            <div class="col text-right">
                <form method="post">
                    <input type="submit" id="logout" name="logout" value="Uitloggen">
                </form>
            </div>
        </div>

        <form method="post" enctype="multipart/form-data">
            <div class="row align-items-start" id="rowMid">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label for="name">Voer de naam in</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Voer de naam in">
                            </div>
                            <div class="form-group row">
                                <label for="brandId">Voer brand id in</label>
                                <input type="text" class="form-control" id="brandId" name="brandId" placeholder="Voer brand id in">
                            </div>
                            <div class="form-group row">
                                <label for="themeId">Voer theme id in</label>
                                <input type="text" class="form-control" id="themeId" name="themeId" placeholder="Voer theme id in">
                            </div>
                            <div class="form-group row">
                                <label for="price">Voer prijs in</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Voer prijs in">
                            </div>
                            <div class="form-group row">
                                <label for="age">Voer leeftijd in</label>
                                <input type="text" class="form-control" id="age" name="age" placeholder="Voer leeftijd in">
                            </div>
                            <div class="form-group row">
                                <label for="pieces">Voer aantal stenen in</label>
                                <input type="text" class="form-control" id="pieces" name="pieces" placeholder="Voer aantal stenen in">
                            </div>
                            <div class="form-group row">
                                <label for="stock">Voer voorraad in</label>
                                <input type="text" class="form-control" id="stock" name="stock" placeholder="Voer voorraad in">
                            </div>
                            <div class="form-group row">
                                <label for="afbeelding">Voeg afbeelding toe</label>
                                <input type="file" class="form-control-file" id="afbeelding" name="afbeelding">
                            </div>
                        </div>
                        <div class="col-6">
                            <textarea class="jqte" id="content" name="content" style="width: 100%;" placeholder="Schrijf je blog hier..."></textarea>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col-12 text-center">
                            <input type="submit" class="btn btn-primary" id="plaats" name="plaats" value="Plaats blog">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Gruwelijk Design Blog</p>
    </footer>

    <script src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>
    <script src="../js/jquery-te-1.4.0.min.js" charset="utf-8"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $('.jqte').jqte();
    </script>
</body>

</html>
