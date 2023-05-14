<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <title>Webflix</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   </head>
   <!--Main Body Starts -->
   <body>
      <?php include('../includes/header_index.php'); ?>
	  
      
	    <!-- Hero Section -->
    <section class="hero bg-black" style="background-image: url(../img/hero.jpg); background-size: cover; background-position: center;">
      <div class="container-fluid">
        <div class="row justify-content-center align-items-center vh-100">
          <div class="col-12 col-md-10 col-lg-8 text-center text-white">
            <div class="col-lg-6 mx-auto">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center mx-2 mb-4">Webflix Premium</h5>
            <h1 class="card-price text-center text-danger">£99/month</h1>
            <hr>
            <ul class="fa-ul text-black" style="list-style-type: none; padding-left: 0;">
              <li><h4>1 User</h4></li>
              <li>Larger video library </li>
              <li> More recent releases </li>
              <li>Dedicated admin support </li>
            </ul>
            <a href="register_paid.php" class="btn btn-lg btn-danger mb-3">Let's Get Started</a>
          </div>
        </div>
      </div>
        </div>
      </div>
    </section>
      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
   </body>
</html>