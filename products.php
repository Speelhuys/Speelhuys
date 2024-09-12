<?php
require "classes/database.php"; // assuming this handles DB connection
require "classes/user.php";
require "classes/set.php"; // Import the `set` class

// Get filters from the form
$set_id = isset($_GET['set_id']) ? $_GET['set_id'] : '';
$set_name = isset($_GET['set_name']) ? $_GET['set_name'] : '';
$set_brand_id = isset($_GET['set_brand_id']) ? $_GET['set_brand_id'] : '';
$set_age = isset($_GET['set_age']) ? $_GET['set_age'] : '';
$set_price = isset($_GET['set_price']) ? $_GET['set_price'] : '';

// Fetch the filtered sets using the `filterSets` method
$sets = set::filterSets($set_id, $set_name, $set_brand_id, $set_age, $set_price);
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
      top: 80px; /* Adjust to position the filter below the navbar */
      right: 0;
      width: 300px;
      padding: 20px;
      background-color: #f8f9fa;
      box-shadow: -3px 0 5px rgba(0,0,0,0.1);
      height: 100%;
      overflow-y: auto;
    }

    .content {
      margin-right: 320px; /* Add margin to accommodate the filter bar */
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <div class="col-1">
      <img src="images/error.png" style="height: 100%; width: 100%;">
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="products.php">Producten</a></li>
        <li class="nav-item"><a class="nav-link" href="loginpage.php">Inloggen</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">
    <!-- Main content (Products) -->
    <div class="content col-md-9">
      <h3>Products</h3>
      <div class="row">
        <?php if (count($sets) > 0) : ?>
          <?php foreach ($sets as $set) : ?>
            <div class="col-md-4 mb-4">
              <div class="card h-100">
                <img src="images/<?php echo $set->image; ?>" class="card-img-top" alt="<?php echo $set->name; ?>">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $set->name; ?></h5>
                  <p class="card-text"><?php echo $set->description; ?></p>
                  <p><strong>Price: </strong>€<?php echo number_format($set->price, 2); ?></p>
                  <p><strong>Age: </strong><?php echo $set->age; ?>+</p>
                  <p><strong>Pieces: </strong><?php echo $set->pieces; ?></p>
                  <p><strong>Stock: </strong><?php echo $set->stock; ?></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <p>No products found.</p>
        <?php endif; ?>
      </div>
    </div>

    <!-- Sidebar filter bar -->
    <div class="filter-bar" style="height: 100%;">
      <h3>Filters</h3>
      <form action="products.php" method="GET">
        <div class="mb-3">
          <label for="set_id" class="form-label">Set ID</label>
          <input type="text" name="set_id" class="form-control" value="<?php echo $set_id; ?>">
        </div>
        <div class="mb-3">
          <label for="set_name" class="form-label">Set Name</label>
          <input type="text" name="set_name" class="form-control" value="<?php echo $set_name; ?>">
        </div>
        <div class="mb-3">
          <label for="set_brand_id" class="form-label">Brand</label>
          <select name="set_brand_id" class="form-control">
            <option value="">All Brands</option>
            <?php
            // Fetch brands from the database
            $brands = $db->query("SELECT * FROM brands");
            while ($brand = $brands->fetch_assoc()) {
              $selected = ($set_brand_id == $brand['brand_id']) ? 'selected' : '';
              echo "<option value='{$brand['brand_id']}' $selected>{$brand['brand_name']}</option>";
            }
            ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="set_age" class="form-label">Age Range</label>
          <input type="number" name="set_age" class="form-control" value="<?php echo $set_age; ?>">
        </div>
        <div class="mb-3">
          <label for="set_price" class="form-label">Max Price</label>
          <input type="number" step="0.01" name="set_price" class="form-control" value="<?php echo $set_price; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
      </form>
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
