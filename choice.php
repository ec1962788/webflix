<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Webflix</title>
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
 

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #dc1a22 !important;">
<div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="img/logo1.jpg" alt="Webflix Logo" height="40"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link btn btn-dark text-white px-3" href="users/user_login.php">Sign In</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <!-- Hero Section -->
    <section class="hero bg-black" style="background-image: url(img/hero.jpg); background-size: cover;   background-position: center;">
      <div class="container-fluid">
        <div class="row justify-content-center align-items-center vh-100">
          <div class="col-12 col-md-10 col-lg-8 text-center text-white">
            <h1 class="mb-4 text-danger">Welcome to Webflix!</h1>
            <p class="lead mb-5">Choose your subscription plan to get started.</p>
            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="card h-100">
                  <div class="card-body my-5">
                    <h2 class="card-title text-danger">Free Plan</h2>
                    <p class="card-text text-black">With the free plan, you'll get access to a limited selection of movies and TV shows.</p>
                    <a href="users/register_free.php" class="btn btn-danger">Register as Free User</a>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="card h-100">
                  <div class="card-body my-5">
                    <h2 class="card-title text-danger">Paid Plan</h2>
                    <p class="card-text text-black">With the paid plan, you'll get unlimited access to our entire library of movies and TV shows.</p>
                    <a href="paid/plan_details.php" class="btn btn-danger">Register as Paid User</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	
<?php include('includes/footer.php'); ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>
