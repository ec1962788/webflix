<?php
// Initialize $errors as an empty array
$errors = array();

// Check form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Open database connection
    require '../includes/connect_db.php';

    // Get connection, load, and validate functions
    require '../admin/admin_login_tools.php';

    // Check admin_login_tools
    list($check, $data) = validateAdmin($link, $_POST['user_email'], $_POST['user_pass']);

    // On success set session data and display logged-in page
    if ($check) {
        // Access session
        session_start();
        $_SESSION['admin_id'] = $data['user_id'];
        $_SESSION['admin_email'] = $data['user_email'];
        $_SESSION['admin_name'] = $data['user_name'];
        $_SESSION['admin_is_admin'] = $data['user_is_admin'];
        $_SESSION['admin_join_date'] = $data['user_join_date'];

        // Redirect to admin dashboard
        ob_start();
        header("Location: admin_dashboard.php");
        ob_end_flush();
        exit();
    } else {
        // On failure, set errors
        $errors = $data;
    }

    mysqli_close($link);
}
?>
