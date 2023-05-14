<?php
// Initialize $errors as an empty array
$errors = array();

// Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Open database connection
    require '../includes/connect_db.php';

    // Get connection, load, and validate functions
    require '../includes/login_tools.php';

    // Check login_tools
    list($check, $data) = validate($link, $_POST['user_email'], $_POST['user_pass']);

    # On success set session data and display logged in page.
    if ($check) {
        # Access session.
        session_start();
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['user_name'] = $data['user_name'];
        $_SESSION['user_surname'] = $data['user_surname'];
        $_SESSION['user_is_admin'] = $data['user_is_admin'];
        $_SESSION['user_type_paid'] = $data['user_type_paid']; // Add this line

        if ($data['user_type_paid']) {
            load('../media/movie_paid.php');
        } else {
            load('../media/movie_free.php');
        }
    }

    // Or on failure set errors
    else {
        $errors = $data;
    }

    mysqli_close($link);
}
?>