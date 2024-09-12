<?php
require "classes/database.php";
require "classes/user.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Garage</title>
</head>
<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <div class="col-1"><img src="images/error.png" style="height: 100%; width: 100%;"></div> 
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">Producten</a>
          </li>
          <li class="nav-item">
          </li>
          <li class="nav-item">
            <a class="nav-link" href="loginpage.php">Inloggen</a>
          </li>
        </ul>
      </div>
  </nav>
  <div class="container-fluid your-class">
    <div class="content">
    <h1 class="neonText" style="text-align: center;">Welkom!</h1>
     </div>
  </div>
</div>
</body>
</html>