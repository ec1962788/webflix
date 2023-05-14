<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    require('../login/login_tools.php');
    load();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('../includes/connect_db.php');
    $errors = array();

    $current_email = mysqli_real_escape_string($link, trim($_POST['current_email']));
    $new_email = mysqli_real_escape_string($link, trim($_POST['user_email']));

    if (empty($new_email)) {
        $errors[] = 'Enter your new email address.';
    }

    if (empty($errors)) {
        $user_id = $_SESSION['user_id'];

        // Check if new email is already registered
        $email_check_query = "SELECT * FROM users WHERE user_email='$new_email'";
        $email_check_result = @mysqli_query($link, $email_check_query);
        if (mysqli_num_rows($email_check_result) != 0) {
            $errors[] = 'The new email address is already in use.';
        } else {
            // Update the email address
            $update_email_query = "UPDATE users SET user_email='$new_email' WHERE user_id='$user_id'";
            $update_email_result = @mysqli_query($link, $update_email_query);
            if ($update_email_result) {
                header("Location: user_account.php");
                exit();
            } else {
                echo "Error updating record: " . $link->error;
            }
        }
    }

    if (!empty($errors)) {
        echo '<div class="container"><div class="alert alert-dark alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h1><strong>Error!</strong></h1><p>The following error(s) occurred:<br>';
        foreach ($errors as $msg) {
            echo " - $msg<br>";
        }
        echo 'Please try again.</div></div>';
    }

    mysqli_close($link);
}
?>
