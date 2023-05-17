<?php # LOGIN HELPER FUNCTIONS.

# Function to load specified or default URL.
function load($page = '../admin/admin_login.php')
{
    # Begin URL with protocol, domain, and current directory.
    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

    # Remove trailing slashes then append page name to URL.
    $url = rtrim($url, '/\\');
    $url .= '/' . $page;

    # Execute redirect then quit.
    header("Location: $url");
    exit();
}

# Function to check email address and password.
function validateAdmin($link, $email = '', $pwd = '')
{
    # Initialize errors array.
    $errors = array();

    # Check email field.
    if (empty($email)) {
        $errors[] = 'Enter your email address.';
    } else {
        $e = mysqli_real_escape_string($link, trim($email));
    }

    # Check password field.
    if (empty($pwd)) {
        $errors[] = 'Enter your password.';
    } else {
        $p = mysqli_real_escape_string($link, trim($pwd));
    }

    # On success retrieve admin data from 'users' table.
    if (empty($errors)) {
        $q = "SELECT user_id, user_email, user_name, user_surname, user_is_admin, user_join_date FROM users WHERE user_email='$e' AND user_pass=SHA2('$p', 256) AND user_is_admin = 1";
        $r = mysqli_query($link, $q);
        if (@mysqli_num_rows($r) == 1) {
            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
            return array(true, $row);
        } else {
            $errors[] = 'Wrong email or wrong password.';
        }
    }

    return array(false, $errors);
}
?>
