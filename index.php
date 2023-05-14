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
  <body style="width: 100%">
  
<?php include('includes/header_index.php'); ?>

	    <!-- Hero Section -->
    <section class="hero bg-black" style="background-image: url(img/hero.jpg); background-size: cover; background-position: center;">
      <div class="container-fluid">
        <div class="row justify-content-center align-items-center vh-100">
          <div class="col-12 col-md-10 col-lg-8 text-center text-white">
            <h1 class="display-3 mb-3">Now you can watch what you want, when you want with who you want to. Or alone.</h1>
            <p class="mb-5">Want to try?</p>
            <a href="choice.php" class="btn btn-lg btn-danger">Let's Get Started</a>
          </div>
        </div>
      </div>
    </section>

	 
	 <section class="two-column my-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 col-md-6 my-5">
        <h2 class="mt-5 text-danger">Many Choices</h2>
        <p>Enjoy many of movies on any device with Webflix! Whether you're a free user or a premium member, you'll have access to an extensive library of films to stream at your convenience. Sign up for Webflix Free to enjoy a selection of movies for no cost, or upgrade to Webflix Premium for unlimited access to all of our titles.</p>
      </div>
      <div class="col-12 col-md-6">
        <img src="img/left.jpg">
      </div>
    </div>
  </div>
</section>

<br>
<section class="two-column my-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 col-md-6">
        <img src="img/right.jpg">
      </div>
      <div class="col-12 col-md-6">
        <h2 class="mt-5 text-danger">On All Devices</h2>
        <p>Stream movies on all of your devices and enjoy the latest blockbusters, classic favorites, and award-winning movies from the comfort of your home. Whether you prefer to watch on your TV, laptop, tablet or smartphone, we've got you covered with our extensive library of movies. Start streaming today and enjoy unlimited access to our vast selection of titles.</p>
      </div>
    </div>
  </div>
</section>

<section class="accordion-faq">
  <div class="container">
    <h2 class="text-danger my-5">Frequently Asked Questions</h2>
    <div class="accordion" id="faqAccordion">
      <div class="accordion-item">
        <h3 class="accordion-header" id="faqHeading1">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="false" aria-controls="faqCollapse1">
           <strong> Can I watch for free?</strong>
          </button>
        </h3>
        <div id="faqCollapse1" class="accordion-collapse collapse" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Yes, you can register as a free user and enjoy a limited selection of movies and TV shows.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h3 class="accordion-header" id="faqHeading2">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
            <strong> How much is Premium subscription?</strong>
          </button>
        </h3>
        <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Premium subscription is £99 per year.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h3 class="accordion-header" id="faqHeading3">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
            <strong>May I cancel anytime?</strong>
          </button>
        </h3>
        <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Yes, you can cancel but in such case you won't get refund.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="scroll-top my-5 ">
  <div class="container">
    <a href="#" class="btn btn-lg btn-danger mx-auto">Back to Top</a>
  </div>
</section>


<?php include('includes/footer.php'); ?>

	 
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>
