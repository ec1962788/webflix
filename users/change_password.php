<?php
session_start();

// Redirect if not logged in.
if (!isset($_SESSION['user_id'])) {
    header('Location: ../users/user_login.php');
    exit();
}

// Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Connect to the database.
    require('../includes/connect_db.php');

    // Initialize an error array.
    $errors = array();

    // Get submitted passwords.
    $current_password_submit = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Fetch user information from the database.
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Database query failed.");
    }

    $row = mysqli_fetch_array($result);

    // Get current password from database.
    $current_password = $row['user_pass'];

    // Validate submitted passwords.
    if (strcmp(hash('sha256', $current_password_submit), $current_password) !== 0) {
        $errors[] = 'Current password is incorrect.';
    } elseif ($new_password != $confirm_password) {
        $errors[] = 'New password and confirm password do not match.';
    } elseif (strlen($new_password) < 8) {
        $errors[] = 'New password must be at least 8 characters long.';
    } else {
        // Update password in the database.
        $new_password_hash = hash('sha256', $new_password);
        $query = "UPDATE users SET user_pass = '$new_password_hash' WHERE user_id = '$user_id'";
        $result = mysqli_query($link, $query);
        if (!$result) {
            die("Database query failed.");
        }
        header("Location: ../users/user_account.php");
        exit();
    }

    // Report errors.
    if (!empty($errors)) {
        echo '<div class="container"><div class="alert alert-dark alert-dismissible fade show">';
        echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        echo '<h1><strong>Error!</strong></h1><p>The following error(s) occurred:<br>';
        foreach ($errors as $msg) {
            echo " - $msg<br>";
        }
        echo 'Please try again.</div></div>';
    }

    // Close database connection.
    mysqli_close($link);
}
?>
