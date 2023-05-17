<?php
require_once('../includes/connect_db.php');

// Check if form is submitted
if (isset($_POST['add_user'])) {

    // Get form data
    $user_card = $_POST['user_card'];
    $user_country = $_POST['user_country'];
    $user_cvv = $_POST['user_cvv'];
    $user_dob = $_POST['user_dob'];
    $user_email = $_POST['user_email'];
    $user_exp_date = $_POST['user_exp_date'];
    $user_is_admin = $_POST['user_is_admin'];
    $user_join_date = $_POST['user_join_date'];
    $user_name = $_POST['user_name'];
    $user_pass = sha1($_POST['user_pass']);
    $user_phone = $_POST['user_phone'];
    $user_status = $_POST['user_status'];
    $user_surname = $_POST['user_surname'];
    $user_type_paid = $_POST['user_type_paid'];

    // Insert data into database
    $query = "INSERT INTO users (user_card, user_country, user_cvv, user_dob, user_email, user_exp_date, user_is_admin, user_join_date, user_name, user_pass, user_phone, user_status, user_surname, user_type_paid) VALUES ('$user_card', '$user_country', '$user_cvv', '$user_dob', '$user_email', '$user_exp_date', '$user_is_admin', '$user_join_date', '$user_name', '$user_pass', '$user_phone', '$user_status', '$user_surname', '$user_type_paid')";

    $result = mysqli_query($link, $query);

    if ($result) {
        // Redirect back to the users page
        header("Location: ../admin/users.php");
        exit();
    } else {
        echo '<div class="alert alert-danger">Error: Unable to add user.</div>';
    }

    mysqli_close($link);
}

// Check if delete_user query parameter is set
if (isset($_GET['delete_user'])) {
    $delete_user_id = $_GET['delete_user'];

    // Delete the user from the database
    $delete_query = "DELETE FROM users WHERE user_id = $delete_user_id";
    $delete_result = mysqli_query($link, $delete_query);

    // Check if deletion was successful
    if ($delete_result) {
        // Redirect back to the users page
        header("Location: ../admin/users.php");
        exit();
    } else {
        echo '<div class="alert alert-danger">Error: Unable to delete user.</div>';
    }
}

// Check if block_user query parameter is set
if (isset($_GET['block_user'])) {
    $block_user_id = $_GET['block_user'];

    // Block the user in the database
    $block_query = "UPDATE users SET user_blocked = 1 WHERE user_id = $block_user_id";
    $block_result = mysqli_query($link, $block_query);

    // Check if blocking was successful
    if ($block_result) {
        // Redirect back to the users page
        header("Location: ../admin/users.php");
        exit();
    } else {
        echo '<div class="alert alert-danger">Error: Unable to block user.</div>';
    }
}

$query = "SELECT * FROM users";
$result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webflix - Users Management</title>
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include('../includes/header_admin.php'); ?>

        <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <h2 class="text-danger">Users Management</h2>
                <form  class="text-white" method="post" action="" enctype="multipart/form-data">
                    <!-- Form fields for user details -->
                    
                    <div class="form-group">
                        <label for="user_country">Country</label>
                        <input type="text" class="form-control" name="user_country" id="user_country" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="user_dob">Date of Birth</label>
                        <input type="text" class="form-control" name="user_dob" id="user_dob" required>
                    </div>
                    <div class="form-group">
                        <label for="user_email">Email</label>
                        <input type="email" class="form-control" name="user_email" id="user_email" required>
                    </div>
                    <div class="form-group">
                        <label for="user_exp_date">Expiration Date</label>
                        <input type="text" class="form-control" name="user_exp_date" id="user_exp_date" required>
                    </div>
                    <div class="form-group">
                        <label for="user_is_admin">Is Admin?</label>
                        <select class="form-control" name="user_is_admin" id="user_is_admin" required>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user_join_date">Join Date</label>
                        <input type="text" class="form-control" name="user_join_date" id="user_join_date" required>
                    </div>
                    <div class="form-group">
                        <label for="user_name">Name</label>
                        <input type="text" class="form-control" name="user_name" id="user_name" required>
                    </div>
                    <div class="form-group">
                        <label for="user_pass">Password</label>
                        <input type="password" class="form-control" name="user_pass" id="user_pass" required>
                    </div>
                    <div class="form-group">
                        <label for="user_phone">Phone</label>
                        <input type="text" class="form-control" name="user_phone" id="user_phone" required>
                    </div>
                    <div class="form-group">
                        <label for="user_status">Status</label>
                        <input type="text" class="form-control" name="user_status" id="user_status" required>
                    </div>
                    <div class="form-group">
                        <label for="user_surname">Surname</label>
                        <input type="text" class="form-control" name="user_surname" id="user_surname" required>
                    </div>
                    <div class="form-group">
                                               <label for="user_type_paid">Type Paid</label>
                        <input type="text" class="form-control" name="user_type_paid" id="user_type_paid" required>
                    </div>
                    <button type="submit" name="add_user" class="btn btn-danger"><i class="fas fa-plus"></i> Add User</button>
                </form>
</div>
               <!-- Display users table -->
 <div class="table-responsive mt-5" style="color: white !important;">
    <table class="table table-striped table-full-width  text-white">
        <thead>
            <tr>
                <th>Country</th>
                <th>Date of Birth</th>
                <th>Email</th>
                <th>Expiration Date</th>
                <th>Is Admin?</th>
				<th>Is Blocked?</th>
                <th>Join Date</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Surname</th>
                <th>Type Paid</th>
                <th>Delete</th>
				<th>Block</th>
            </tr>
        </thead>
        <tbody class="text-white">
            <?php
            require_once('../includes/connect_db.php');
            $query = "SELECT * FROM users";
            $result = mysqli_query($link, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td class="text-white">' . $row['user_country'] . '</td>';
                    echo '<td class="text-white">' . $row['user_dob'] . '</td>';
                    echo '<td class="text-white">' . $row['user_email'] . '</td>';
                    echo '<td class="text-white">' . $row['user_exp_date'] . '</td>';
                    echo '<td class="text-white">' . ($row['user_is_admin'] ? 'Yes' : 'No') . '</td>';
					  echo '<td class="text-white">' . ($row['user_blocked'] ? 'Yes' : 'No') . '</td>';
                    echo '<td class="text-white">' . $row['user_join_date'] . '</td>';
                    echo '<td class="text-white">' . $row['user_name'] . '</td>';
                    echo '<td class="text-white">' . $row['user_phone'] . '</td>';
                    echo '<td class="text-white">' . $row['user_status'] . '</td>';
                    echo '<td class="text-white">' . $row['user_surname'] . '</td>';
                    echo '<td class="text-white">' . $row['user_type_paid'] . '</td>';
                    echo '<td class="text-white"><a href="../admin/users.php?delete_user=' . $row['user_id'] . '" class="btn btn-danger btn-sm">Delete</a></td>';
					// Display block button
            echo '<td>';
            echo '<a href="../admin/users.php?block_user=' . $row['user_id'] . '" class="btn btn-danger btn-sm">Block</a>';
            echo '</td>';
         
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="12">No users found.</td></tr>';
            }
            mysqli_close($link);
            ?>
        </tbody>
    </table>
</div>


            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>


