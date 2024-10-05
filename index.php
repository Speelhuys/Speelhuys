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
  <title>Speelhuys - Bouwspeelgoed</title>
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="col-2"><img src="images/logos/Speelhuys.png" style="height: 100%; width: 100%;" alt="Speelhuys Logo"></div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products.php">Producten</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="loginpage.php">Inloggen</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid mt-5">
    <div class="content text-center">
      <h1 class="neonText">Welkom bij Speelhuys!</h1>
      <p class="intro-text">Ontdek een wereld vol creativiteit met LEGO, DUPLO en ander bouwspeelgoed. Van iconische sets tot unieke stukken, wij hebben alles voor de kleine en grote bouwers.</p>
      <div class="d-flex justify-content-center mt-4">
        <a href="products.php" class="btn btn-primary mx-2">Bekijk Ons Aanbod</a>
        <a href="contact.php" class="btn btn-outline-primary mx-2">Neem Contact Op</a>
      </div>
    </div>
  </div>


  <section class="features py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card feature-card">
            <a href="products.php?legoId=1"> <img src="images/lego.jpeg" class="card-img-top" alt="LEGO Bouwsets"></a>
            <div class="card-body">
              <h5 class="card-title">LEGO Bouwsets</h5>
              <p class="card-text">Verken onze uitgebreide collectie LEGO-sets voor bouwers van alle leeftijden.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card feature-card">
            <a href="products.php?duploId= 3"> <img src="images/duplo.jpeg" class="card-img-top" alt="DUPLO Sets"></a>
            <div class="card-body">
              <h5 class="card-title">DUPLO voor de Kleintjes</h5>
              <p class="card-text">DUPLO sets zijn perfect voor de jongste bouwers om hun verbeelding te laten groeien.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card feature-card">
            <a href="products.php"> <img src="images/uniek.jpeg" class="card-img-top" alt="Bouwspeelgoed Collectie"></a>
            <div class="card-body">
              <h5 class="card-title">Uniek Bouwspeelgoed</h5>
              <p class="card-text">Naast LEGO en DUPLO bieden wij ook andere unieke bouwsets en accessoires, bekijk alles bij onze producten!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="bg-dark text-white py-4">
    <div class="container text-center">
      <p>&copy; 2024 Speelhuys. Alle rechten voorbehouden.</p>
      <a href="https://facebook.com" class="text-white mx-2"><i class="fab fa-facebook"></i></a>
      <a href="https://twitter.com" class="text-white mx-2"><i class="fab fa-twitter"></i></a>
      <a href="contact.php" class="text-white mx-2">Contact</a>
    </div>
  </footer>

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-lpyq1CNQShO7jmK71yZqP2zJ5dHOY1I6qEfNlOTbzqLXNDBey06oxX6vu59aGzqg" crossorigin="anonymous"></script>
</body>

</html>