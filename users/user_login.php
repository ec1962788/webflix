<?php
// Initialize $errors as an empty array
$errors = array();

 
// Check if there was a login attempt
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = require '../includes/login_action.php'; // Update this line
}


// Display error messages, if any
if (isset($errors) && !empty($errors)) {
    echo '<div class="alert alert-danger alert-dismissible bg-danger text-white">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Error!</strong> ';
       echo 'Please try again or <a class="alert-link text-white text-decoration-none" href="register.php">register</a> new account.
    </div>';
}
?>
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
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header text-white bg-danger">
                                <strong>Sign In to Your Account</strong>
                            </div>
                            <div class="card-body">
                                <div class="container mt-5">

                                    <!---------------------------------FORM-------------------------------------------->

<form class="was-validated" action="user_login.php" method="post">
    <label for="user_email"><strong>Email:</strong></label>
    <input class="form-control" type="email" id="user_email" name="user_email" required>
    <br>
    <label for="user_pass"><strong>Password:</strong></label>
    <input class="form-control" type="password" id="user_pass" name="user_pass" required>
    <br>
    <input class="btn btn-danger" type="submit" value="Log In"> 
</form>
                                    <!--------------------------------------------------------------------------------------->

                                </div> 
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