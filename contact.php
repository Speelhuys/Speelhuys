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
  <title>Contact - Speelhuys</title>
</head>
<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <div class="col-1"><img src="images/logo.png" style="height: 100%; width: 100%;" alt="Speelhuys Logo"></div> 
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
          <li class="nav-item">
            <a class="nav-link active" href="contact.php">Contact</a>
          </li>
        </ul>
      </div>
  </nav>

  <div class="container mt-5">
    <h1 class="text-center">Neem Contact Op met Speelhuys</h1>
    <p class="text-center mb-4">Heb je vragen over ons assortiment bouwspeelgoed, of wil je meer weten over een bestelling? Neem gerust contact met ons op via het onderstaande formulier, of bereik ons via de andere contactopties.</p>
    
    <!-- Contact Form -->
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form action="submit_contact.php" method="post">
          <div class="mb-3">
            <label for="name" class="form-label">Naam</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">E-mailadres</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Bericht</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Verstuur Bericht</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Contact Details -->
    <div class="row justify-content-center mt-5">
      <div class="col-md-8 text-center">
        <h4>Onze Contactgegevens</h4>
        <p><strong>Adres:</strong> Speelhuys, Bouwstraat 123, 1234 AB, Speelstad</p>
        <p><strong>Telefoon:</strong> +31 (0)20 123 4567</p>
        <p><strong>E-mail:</strong> <a href="mailto:info@speelhuys.nl">info@speelhuys.nl</a></p>
        <p><strong>Openingstijden:</strong></p>
        <p>Maandag - Vrijdag: 09:00 - 18:00</p>
        <p>Zaterdag: 10:00 - 17:00</p>
        <p>Zondag: Gesloten</p>
      </div>
    </div>

    <!-- Map Section -->
    <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <h4 class="text-center">Vind ons hier</h4>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241317.116099575!2d4.763385466135678!3d52.35462743670956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c60e40dc6f2e8d%3A0xf08e6c2b0ae740f2!2sAmsterdam!5e0!3m2!1sen!2snl!4v1638368561234!5m2!1sen!2snl" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
  </div>

  <!-- Footer Section -->
  <footer class="bg-dark text-white py-4 mt-5">
    <div class="container text-center">
      <p>&copy; 2024 Speelhuys. Alle rechten voorbehouden.</p>
      <a href="https://facebook.com" class="text-white mx-2"><i class="fab fa-facebook"></i></a>
      <a href="https://twitter.com" class="text-white mx-2"><i class="fab fa-twitter"></i></a>
      <a href="../js/contact.php" class="text-white mx-2">Contact</a>
    </div>
  </footer>

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-lpyq1CNQShO7jmK71yZqP2zJ5dHOY1I6qEfNlOTbzqLXNDBey06oxX6vu59aGzqg" crossorigin="anonymous"></script>
</body>
</html>