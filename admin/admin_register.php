<?php
# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Connect to the database.
    require ('../includes/connect_db.php');

    # Initialize an error array.
    $errors = array();

    # Check for a first name.
    if (empty($_POST['first_name'])) {
        $errors[] = 'Enter your first name.';
    } else {
        $fn = mysqli_real_escape_string($link, trim($_POST['first_name']));
    }

    # Check for a last name.
    if (empty($_POST['last_name'])) {
        $errors[] = 'Enter your last name.';
    } else {
        $ln = mysqli_real_escape_string($link, trim($_POST['last_name']));
    }

    # Check for an email address.
    if (empty($_POST['email'])) {
        $errors[] = 'Enter your email address.';
    } else {
        $e = mysqli_real_escape_string($link, trim($_POST['email']));
    }

    # Check for a password and matching input passwords.
    if (!empty($_POST['pass1'])) {
        if ($_POST['pass1'] != $_POST['pass2']) {
            $errors[] = 'Passwords do not match.';
        } else {
            $p = mysqli_real_escape_string($link, trim($_POST['pass1']));
        }
    } else {
        $errors[] = 'Enter your password.';
    }

    # Check if email address already registered.
    if (empty($errors)) {
        $q = "SELECT user_id FROM users WHERE email='$e' AND pass=SHA2('$p',256)";
        $r = @mysqli_query($link, $q);
        if (mysqli_num_rows($r) != 0) {
            $errors[] = 'Email address already registered. <a class="alert-link" href="login.php">Sign In Now</a>';
        }
    }

    # On success register admin user, inserting into 'users' database table.
    if (empty($errors)) {
        $q = "INSERT INTO users (user_name, user_surname, user_email, user_pass, user_is_admin, user_join_date) VALUES ('$fn', '$ln', '$e', SHA2('$p',256), 1, NOW())";
        $r = @mysqli_query($link, $q);
        if ($r) {
            header("Location: success.html");
        }

        # Close database connection.
        mysqli_close($link);
        exit();
    } else {
        # Or report errors.
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<!--Main Body Starts -->
<body>
<?php include('../includes/header_index_a.php'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header text-white bg-danger">
                                <strong>Register as An Admin</strong>
                            </div>
                            <div class="card-body">
                                <div class="container mt-5">


                                <!---------------------------------FORM-------------------------------------------->
            <div class="container">
                <!--h1 class="text-center">Free User Registration</h1-->
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="pass1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pass1" name="pass1" required>
                    </div>

                    <div class="mb-3">
                        <label for="pass2" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="pass2" name="pass2" required>
                    </div>

                    <button type="submit" class="btn btn-danger">Register</button>
                </form>
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