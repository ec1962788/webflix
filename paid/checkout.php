<?php
require('../includes/connect_db.php');

# Check if user ID is provided.
if (isset($_GET['user_id'])) {
    $user_id = mysqli_real_escape_string($link, $_GET['user_id']);
    
    # Retrieve user data from the database.
    $q = "SELECT * FROM users WHERE user_id = '$user_id' AND user_type_paid = 1";
    $r = mysqli_query($link, $q);

    if (mysqli_num_rows($r) > 0) {
        $row = mysqli_fetch_assoc($r);
    }
}

# Count the number of paid people in the database.
$q2 = "SELECT COUNT(*) AS paid_count FROM users WHERE user_type_paid = 1";
$r2 = mysqli_query($link, $q2);
$row2 = mysqli_fetch_assoc($r2);
$paid_count = $row2['paid_count'];
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <title>Webflix</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="../styles/styles.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   </head>
   <!--Main Body Starts -->
   <body>
      <?php include('../includes/header_index.php'); ?>
      
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
            
                 <div class="container my-5">
    <div class="row justify-content-center mt-2">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card">
                <div class="card-header text-center bg-danger text-white">
                    <h1><strong>Your Ticket</strong></h1>
                </div>
                <div class="card-body text-center">
                    <h5 class="text-secondary">Thank you for buying Webflix Premium. <br class="my-2"> Enjoy this service!</h5>
                    <img class="img-fluid mt-3" src="../img/qrcode.png" alt="QR Code">
                    <ul class="list-group list-group-flush mt-3">
                        <li class="list-group-item border-0">
                            <div class="form-group row border-0">
                                <h2 class="text-danger">
                                    <strong>#WX1000<?php echo $paid_count; ?></strong>
                                </h2>
                            </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="form-group row border-0">
                                <label for="total" class="col-sm-12 col-form-label">
                                    <h4>Total Paid: <span class="text-danger fw-bold">&pound; 99</span></h4>
                                </label>
                            </div>
                        </li>                                          
                    </ul>
					   <a class="alert-link btn btn-danger" href="../users/user_login.php">Log In</a>
                </div>
              
            </div>
        </div>
    </div>
</div>
               
               
            </div>
         </div>
      </div>
      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
   </body>
</html>
