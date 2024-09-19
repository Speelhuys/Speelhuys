<?php
require "../classes/database.php";
require "../classes/user.php";
require "../classes/session.php";
require "../classes/set.php";
require "../classes/brand.php";
require "../classes/theme.php";

$session = session::findActiveSession();
$user = user::findById($session->userId);
$brand = new brand;
$brands = $brand->getBrands();
$theme = new theme;
$themes = $theme->getThemes();

$id = isset($_GET['set_id']) ? $_GET['set_id'] : '';
$name = isset($_GET['set_name']) ? $_GET['set_name'] : '';
$brandid = isset($_GET['set_brand_id']) ? $_GET['set_brand_id'] : '';
$themeid = isset($_GET['set_theme_id']) ? $_GET['set_theme_id'] : '';
$age = isset($_GET['set_age']) ? $_GET['set_age'] : '';
$price = isset($_GET['set_price']) ? $_GET['set_price'] : '';

// Fetch the filtered sets using the `filterSets` method
$sets = set::filterSets($id, $name, $brandid, $themeid, $age, $price);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage - Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Custom styling to move the filter bar to the right side */
        .filter-bar {
            position: fixed;
            top: 80px;
            /* Adjust to position the filter below the navbar */
            right: 0;
            width: 300px;
            padding: 20px;
            background-color: #f8f9fa;
            box-shadow: -3px 0 5px rgba(0, 0, 0, 0.1);
            height: 100%;
            overflow-y: auto;
        }

        .content {
            margin-right: 320px;
            /* Add margin to accommodate the filter bar */
        }
    </style>
</head>

<body style="background-image: url(../images/brickwall.png); background-position: fixed; background-size: 100%;">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="col-1">
                <img src="../images/error.png" style="height: 100%; width: 100%;">
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Uitloggen</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <h3 style="color: limegreen;">Admin</h3>
        <br />
        <div class="mb-3">
                <form method="POST" action="setAdd.php"><button type="submit" class="btn btn-primary">Maak een nieuwe blog</button></form>
            <br />
        </div>
        <div class="row">
            <!-- Main content (Products) -->
            <div class="content col-md-9">
                <div class="row">
                    <?php if (count($sets) > 0) : ?>
                        <?php foreach ($sets as $set) : ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <img src="../images/sets/<?php echo $set->image; ?>" class="card-img-top" alt="<?php echo $set->name; ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $set->name; ?></h5>
                                        <p class="card-text"><?php echo $set->description; ?></p>
                                        <p><strong>Prijs: </strong>€<?php echo number_format($set->price, 2); ?></p>
                                        <p><strong>Leeftijd: </strong><?php echo $set->age; ?>+</p>
                                        <p><strong>Stukken: </strong><?php echo $set->pieces; ?></p>
                                        <p><strong>Voorraad: </strong><?php echo $set->stock; ?></p>
                                        <br />
                                        <a href="setEdit.php?id= <?php echo $set->id; ?>">Edit</a>
                                        <?php
                                        if ($user->role == "admin") {
                                            echo '<a href="setDelete.php?id= <?php echo $set->id; ?>" style="color: red; float: right;">Delete</a>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No products found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Sidebar filter bar -->
        <div class="filter-bar" style="height: 100%; background-image: url(images/brick.png);">
      <h3>Filters</h3>
      <form action="admin.php" method="GET">
        <div class="mb-3">
          <input type="text" name="set_search" class="form-control" placeholder="Typ hier uw zoekopdracht in">
        </div>
        <div class="mb-3">
          <strong><label for="set_brand_id" class="form-label">Merk</label></strong>
          <select name="set_brand_id" class="form-control" style="color:darkblue">
            <option value="">Alle Merken</option>
            <?php
            foreach ($brands as $brand) {
              echo '<option value="' . $brand->id . '">' . $brand->name . '</option>';
            }
            ?>
          </select>
        </div>
        <div class="mb-3">
          <strong><label for="set_theme_id" class="form-label">Thema</label></strong>
          <select name="set_theme_id" class="form-control" style="color:darkred">
            <option value="">Alle Themas</option>
            <?php

            foreach ($themes as $theme) {
              echo '<option value="' . $theme->id . '">' . $theme->name . '</option>';
            }
            ?>
          </select>
        </div>
        <strong><label for="set_age" class="form-label">Minimum Leeftijd</label></strong>
        <div class="slidecontainer">
          <input type="range" name="set_age" min="1" max="8" value="1" class="slider" id="ageRange">
          <p style="text-align: center;"><span id="ageValue"></span></p>
        </div>
        <div class="mb-3">
          <strong><label for="set_price" class="form-label" style="background-color: transparent;">Max Price (€)</label></strong>
          <input type="number" step="0.01" name="set_price" class="form-control" placeholder="">
        </div>
        <br />
        <button type="submit" class="btn btn-primary">Zoeken!</button>
      </form>
    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var slider = document.getElementById("ageRange");
        var output = document.getElementById("ageValue");
        output.innerHTML = slider.value;
        slider.oninput = function() {
            output.innerHTML = this.value;
        }
    </script>
</body>

</html>