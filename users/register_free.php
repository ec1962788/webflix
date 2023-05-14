<?php
# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Connect to the database.
    require('../includes/connect_db.php');
	
	
	# Debugging code to check if card details are received
var_dump($_POST['user_card']);
var_dump($_POST['user_cvv']);
var_dump($_POST['user_exp_date']);
	

    # Initialize an error array.
    $errors = array();

    # Check for a first name.
    if (empty($_POST['user_name'])) {
        $errors[] = 'Enter your first name.';
    } else {
        $fn = mysqli_real_escape_string($link, trim($_POST['user_name']));
    }

    # Check for a last name.
    if (empty($_POST['user_surname'])) {
        $errors[] = 'Enter your last name.';
    } else {
        $ln = mysqli_real_escape_string($link, trim($_POST['user_surname']));
    }

    # Check for Date of Birth.
    if (empty($_POST['user_dob'])) {
        $errors[] = 'Enter your date of birth.';
    } else {
        $dob = mysqli_real_escape_string($link, trim($_POST['user_dob']));
    }

    # Check for an email address.
    if (empty($_POST['user_email'])) {
        $errors[] = 'Enter your email address.';
    } else {
        $e = mysqli_real_escape_string($link, trim($_POST['user_email']));
    }

    # Check for a password and matching input passwords.
    if (!empty($_POST['user_pass'])) {
        if ($_POST['user_pass'] != $_POST['confirm_user_pass']) {
            $errors[] = 'Passwords do not match.';
        } else {
            $p = mysqli_real_escape_string($link, trim($_POST['user_pass']));
        }
    } else {
        $errors[] = 'Enter your password.';
    }

    # Check for a phone number.
    if (empty($_POST['user_phone'])) {
        $errors[] = 'Enter your phone number.';
    } else {
        $phone = mysqli_real_escape_string($link, trim($_POST['user_phone']));
    }

    # Check for a country.
    if (empty($_POST['user_country'])) {
        $errors[] = 'Select your country.';
    } else {
        $country = mysqli_real_escape_string($link, trim($_POST['user_country']));
    }

    # Check if email address already registered.
    if (empty($errors)) {
        $q = "SELECT user_id FROM users WHERE user_email='$e' AND user_pass=SHA2('$p', 256)";
        $r = @mysqli_query($link, $q);
        if (mysqli_num_rows($r) != 0) {
            $errors[] = 'Email address already registered. <a class="alert-link" href="login.php">Sign In Now</a>';
        }
    }

    # On success register user inserting into 'users' database table.
    if (empty($errors)) {
        $q = "INSERT INTO users (user_name, user_surname, user_dob, user_email, user_pass, user_phone, user_country, user_join_date) VALUES ('$fn', '$ln', '$dob', '$e', SHA2('$p', 256), '$phone', '$country', NOW())";
        $r = @mysqli_query($link, $q);
        if ($r) {
            header("Location: success.html");
        }

        # Close database connection.
        mysqli_close($link);

        exit();
    }
    # Or report errors.
    else {
        echo '
          <div class="alert alert-success alert-dismissible bg-danger text-white">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
<h4 class="alert-heading" id="err_msg">The following error(s) occurred:</h4>';
        foreach ($errors as $msg) {
            echo " $msg<br>";
        }
        echo '<p>Please correct your entries and try again.</p></div></div>';
# Close database connection.
        mysqli_close($link);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Webflix</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <!-- Bootstrap CSS -->
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
                                <strong>Register for Free Account</strong>
                            </div>
                            <div class="card-body">
                                <div class="container mt-5">


                                    <!---------------------------------FORM-------------------------------------------->
                                    <div class="container">
                                        <!--h1 class="text-center">Free User Registration</h1-->
                                        <form class="was-validated" action="" method="post">
                                            <!-- Existing fields from the free user registration form -->
                                            <div class="mb-3">
                                                <label for="user_name" class="form-label"><strong>First Name:</strong></label>
                                                <input class="form-control" type="text" class="form-control" id="user_name" name="user_name" required>
                                                <span class="invalid-feedback">Please enter your name, for example <em>John</em></span>
                                            </div>

                                            <!-- Add the rest of the fields from the free user registration form here -->
                                            <div class="mb-3">
                                                <label for="user_surname" class="form-label"><strong>Last Name:</strong></label>
                                                <input class="form-control"  type="text" class="form-control" id="user_surname" name="user_surname" required>
                                                <span class="invalid-feedback">Please enter your surname, for example <em>Smith</em></span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="user_dob" class="form-label"><strong>Date of Birth:</strong></label>
                                                <input class="form-control"  type="date" class="form-control" id="user_dob" name="user_dob" required>
                                                <span class="invalid-feedback">Please enter your DOB, for example <em>10/10/2010</em></span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="user_email" class="form-label"><strong>Email:</strong></strog></label>
                                                <input class="form-control"  type="email" class="form-control" id="user_email" name="user_email" required>
                                                <span class="invalid-feedback">Please enter your e-mail, for example <em>john_smith@gmail.com</em></span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="user_pass" class="form-label"><strong>Password:</strong></label>
                                                <input  class="form-control" type="password" class="form-control" id="user_pass" name="user_pass" required minlength="8">
                                                <span class="invalid-feedback">Use 8+ characters, letters and numbers, for secure password</span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="confirm_user_pass" class="form-label"><strong>Confirm Password:</strong></label>
                                                <input class="form-control" type="password" class="form-control" id="confirm_user_pass" name="confirm_user_pass" required>
                                                <span class="invalid-feedback">Please enter same password again, as above</span>
                                            </div>


                                            <div class="mb-3">
                                                <label for="user_phone" class="form-label"><strong>Phone:</strong></label>
                                                <input class="form-control"  type="tel" class="form-control" id="user_phone" name="user_phone" required maxlength="11">
                                                <span class="invalid-feedback">Please enter your debit or credit card number, 11 numbers long</span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="user_country" class="form-label"><strong>Country: </strong></label>
                                                <select class="form-select form-control" id="user_country" name="user_country" required>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="United States">United States</option>
                                                    <option value="France">France</option>
                                                    <option value="Germany">Germany</option>
                                                </select>
                                                <span class="invalid-feedback">Please enter country you're coming from</span>
                                            </div>
                                           <button type="submit" class="btn btn-danger">Register</button>
                                        </form>
										<br>
											<p>Already have an account? <a href="user_login.php">Login here</a>.</p>

                                    </div>
                                    <!--------------------------------------------------------------------------------------->

                                </div> <!-- container mt-5 -->
                            </div> <!-- card-body -->
                        </div> <!-- card -->
                    </div> <!-- col-md-6 -->
                </div> <!-- row justify-content-center -->
            </div> <!-- container mt-5 -->


        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>