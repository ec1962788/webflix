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

    // Get submitted phone numbers.
    $current_phone_submit = $_POST['current_phone'];
    $new_phone = $_POST['new_phone'];
    $confirm_phone = $_POST['confirm_phone'];

    // Fetch user information from the database.
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Database query failed.");
    }

    $row = mysqli_fetch_array($result);

    // Get current phone number from database.
    $current_phone = $row['user_phone'];

    // Validate submitted phone numbers.
    if ($current_phone_submit != $current_phone) {
        $errors[] = 'Current phone number is incorrect.';
    } elseif ($new_phone == $current_phone) {
        $errors[] = 'New phone number cannot be the same as the current phone number.';
    } else {
        // Update phone number in the database.
        $query = "UPDATE users SET user_phone = '$new_phone' WHERE user_id = '$user_id'";
        $result = mysqli_query($link, $query);
        if (!$result) {
            die("Database query failed.");
        }
        header("Location: ../users/user_account.php");
        exit();
    }

    // Report errors.
    if (!empty($errors)) {
        echo '<div class="container"><div class="alert alert-danger alert-dismissible fade show">';
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