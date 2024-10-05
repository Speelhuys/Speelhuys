<?php
include "Classes/database.php";
include "Classes/set.php";
include "Classes/brand.php";
include "Classes/theme.php";
$image = null;

// Gegevens ophalen van verschillende classes
$id = $_GET['id'];
$set = set::getSet($id);
$brand = brand::getBrand($set->brandId);
$theme = theme::getTheme($set->themeId);

if ($set == null) {
    echo "geen set gevonden";
    exit;
}
if ($brand == null) {
    $brand = new stdClass(); // Creeër een leeg object
    $brand->name = 'Geen geldig merk'; // Geeft een basisnaam
}
if ($theme == null) {
    $theme = new stdClass(); // Creeër een leeg object
    $theme->name = 'Geen geldig Thema'; // Geeft een basisnaam
}



?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pagina</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/style.css">
    <style>
        body {
            background-color: #f5f5f5;
        }

        #detail {
            padding: 50px 0;
        }

        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        h1 {
            color: #333;
        }

        .description,
        .author {
            font-size: 18px;
            color: #555;
            margin-top: 20px;
        }

        .price {
            font-size: 24px;
            color: #28a745;
            font-weight: bold;
        }

        img {
            max-width: 100%;
            border-radius: 10px;
        }

        .brand-theme h1 {
            font-size: 20px;
            color: #777;
        }
    </style>
</head>

<body id="detail" style="background-image: url(images/waves.png); background-repeat: no-repeat; background-size: cover; background-position: center top;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <h1 class="mb-4"><?php echo $set->name; ?></h1>

                    <div class="row">
                        <div class="col-md-6 text-left description">
                            <p><?php echo $set->description; ?></p>
                        </div>
                        <div class="col-md-6">
                            <!-- checkt of er een image is -->
                            <?php
                            if ($set->image != null) {
                                echo '<img src="images/sets/' . $set->image . '" class="card-img-top" alt="' . $set->name . '">';
                            } else {
                                echo '<img src="images/noimage.png" class="card-img-top">';
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Secties toevoegen voor Name, Brand, Theme, Age, en Price -->
                    <div class="row brand-theme mt-4">
                        <div class="col-md-6">
                            <h1>Naam: <?php echo $set->name; ?></h1>
                        </div>
                        <div class="col-md-6">
                            <h1>Merk: <?php echo $set->brandId .' ('.$brand->name.')'; ?></h1>
                        </div>
                    </div>

                    <div class="row brand-theme mt-4">
                        <div class="col-md-6">
                            <h1>Thema: <?php echo $set->themeId .' ('.$theme->name.')'; ?></h1>
                        </div>
                        <div class="col-md-6">
                            <h1>Leeftijd: <?php echo $set->age; ?></h1>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <p class="price">Prijs: &euro;<?php echo $set->price; ?></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9CjWj6UFHP8nIJG1HgycsS5hGJXNIpzwTz7vT" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>