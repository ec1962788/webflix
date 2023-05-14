<?php
# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Connect to the database.
    require('../includes/connect_db.php');

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

    # Check for a card number.
    if (empty($_POST['user_card'])) {
        $errors[] = 'Enter your card number.';
    } else {
        $cardNumber = $_POST['user_card'];
        $hashedCardNumber = hash('sha256', $cardNumber);
    }

    # Check for CVV.
    if (empty($_POST['user_cvv'])) {
        $errors[] = 'Enter your CVV.';
    } else {
        $cvv = mysqli_real_escape_string($link, trim($_POST['user_cvv']));
    }

    # Check for card expiry date.
    if (empty($_POST['user_exp_date'])) {
        $errors[] = 'Enter your card expiry date.';
    } else {
        $expiryDate = mysqli_real_escape_string($link, trim($_POST['user_exp_date']));
    }

    # Check if email address already registered.
if (empty($errors)) {
    $q = "SELECT user_id FROM users WHERE user_email='$e' AND user_pass=SHA2('$p', 256)";
    $r = @mysqli_query($link, $q);
    if (mysqli_num_rows($r) != 0) {
        $errors[] = 'Email address already registered. <a class="alert-link" href="login.php">Sign In Now</a>';
    }
}

# On success, register the user by inserting into the 'users' database table.
if (empty($errors)) {
    $q = "INSERT INTO users (user_name, user_surname, user_dob, user_email, user_pass, user_phone, user_country, user_join_date, user_card, user_cvv, user_exp_date, user_type_paid) VALUES ('$fn', '$ln', '$dob', '$e', SHA2('$p', 256), '$phone', '$country', NOW(), '$hashedCardNumber', '$cvv', '$expiryDate', 1)";
    $r = @mysqli_query($link, $q);
    if ($r) {
        header("Location: checkout.php");
        exit();
    } else {
        $errors[] = 'Error occurred during registration. Please try again.';
    }

    # Close the database connection.
    mysqli_close($link);
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

    # Close the database connection.
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
                                <strong>Register for Paid Account</strong>
                            </div>
                            <div class="card-body">
                                <div class="container mt-5">

                                    <!---------------------------------FORM-------------------------------------------->
                                    <div class="container">
                                        <form class="was-validated" action="" method="post">
                                            <!-- Existing fields from the free user registration form -->
                                            <div class="mb-3">
                                                <label for="user_name" class="form-label"><strong>First Name:</strong></label>
                                                <input class="form-control" type="text" id="user_name" name="user_name" required>
                                                <div class="invalid-feedback">Please enter your first name.</div>

                                            </div>
                                            <div class="mb-3">
                                                <label for="user_surname" class="form-label"><strong>Last Name:</strong></label>
                                                <input class="form-control" type="text" id="user_surname" name="user_surname" required>
                                                <div class="invalid-feedback">Please enter your last name.</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="user_dob" class="form-label"><strong>Date of Birth:</strong></label>
                                                <input class="form-control" type="date" id="user_dob" name="user_dob" required>
                                                <div class="invalid-feedback">Please enter your date of birth.</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="user_email" class="form-label"><strong>Email:</strong></label>
                                                <input class="form-control" type="email" id="user_email" name="user_email" required>
                                                <div class="invalid-feedback">Please enter your email address.</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="user_pass" class="form-label"><strong>Password:</strong></label>
                                                <input class="form-control" type="password" id="user_pass" name="user_pass" required>
                                                <div class="invalid-feedback">Please enter your password.</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="confirm_user_pass" class="form-label"><strong>Confirm Password:</strong></label>
                                                <input class="form-control" type="password" id="confirm_user_pass" name="confirm_user_pass" required>
                                                <div class="invalid-feedback">Please confirm your password.</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="user_phone" class="form-label"><strong>Phone:</strong></label>
                                                <input class="form-control" type="tel" id="user_phone" name="user_phone" required>
                                                <div class="invalid-feedback">Please enter your phone number.</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="user_country" class="form-label"><strong>Country:</strong></label>
                                                <select class="form-select" id="user_country" name="user_country" required>
                                                    <option value="">Select your country</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="United States">United States</option>
                                                    <option value="France">France</option>
                                                    <option value="Germany">Germany</option>
                                                </select>
                                                <div class="invalid-feedback">Please select your country.</div>
                                            </div>
                                            <!-- New fields for card payment -->
                                            <div class="mb-3">
                                                <label for="user_card" class="form-label"><strong>Card Number:</strong></label>
                                                <input class="form-control" type="text" id="user_card" name="user_card" pattern="[0-9]*" inputmode="numeric" required maxlength="16">
                                                <div class="invalid-feedback">Please enter your card number.</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="user_cvv" class="form-label"><strong>CVV:</strong></label>
                                                <input class="form-control" type="text" id="user_cvv" name="user_cvv" pattern="[0-9]*" inputmode="numeric" required maxlength="3">
                                                <div class="invalid-feedback">Please enter your CVV.</div>
                                            </div>
                                                                                       <div class="mb-3">
                                                <label for="user_exp_date" class="form-label"><strong>Card Expiry Date:</strong></label>
                                                <input class="form-control" type="month" id="user_exp_date" name="user_exp_date" required>
                                                <div class="invalid-feedback">Please enter your card expiry date.</div>
                                            </div>
                                            <!-- End of new fields for card payment -->
                                            <button type="submit" class="btn btn-danger">Register</button>
                                        </form>
                                        <br>
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