<?php
session_start();

// Redirect user to login page if they're not an admin
// if (!isset($_SESSION['user_is_admin']) || $_SESSION['user_is_admin'] != 1) {
//    header("Location: ../users/user_login.php");
//    exit();
// }

// Open database connection
require '../includes/connect_db.php';

// Get total number of users
$query = "SELECT COUNT(*) as total_users FROM users";
$result = mysqli_query($link, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $total_users = $row['total_users'];
} else {
    $total_users = 0;
}

// Get number of users currently logged in
$query = "SELECT COUNT(*) as logged_in_users FROM users WHERE user_is_logged_in = 1";
$result = mysqli_query($link, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $logged_in_users = $row['logged_in_users'];
} else {
    $logged_in_users = 0;
}

// Get total number of free users
$query = "SELECT COUNT(*) as free_users FROM users WHERE user_type_paid = 0";
$result = mysqli_query($link, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $free_users = $row['free_users'];
} else {
    $free_users = 0;
}

// Get total number of paid users
$query = "SELECT COUNT(*) as paid_users FROM users WHERE user_type_paid = 1";
$result = mysqli_query($link, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $paid_users = $row['paid_users'];
} else {
    $paid_users = 0;
}

 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webflix - Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-vGSgo7s45qIkAg87mzx6pZDqlmJ+g48CFR6UAR7xjcHJ2TACSTYnFDe2N8FLJcGWnIZuN7jIK4f4uX7VJ/4dQA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .card {
            border-radius: 10px;
        }

        .card-body {
            padding: 2rem;
        }

        .metric-icon {
            font-size: 3rem;
            color: #dc3545;
        }

        .metric-value {
            font-size: 2.5rem;
            color: #343a40;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php include('../includes/header_admin.php'); ?>

    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <i class="fas fa-users metric-icon"></i>
                                <h3 class="metric-value text-danger"><?= $total_users ?></h3>
                                <p class="card-text">Total Number of Users</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <i class="fas fa-user-check metric-icon"></i>
                                <h3 class="metric-value text-danger"><?= $logged_in_users ?></h3>
                                <p class="card-text">Number of Users Logged In Now</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <i class="fas fa-users-cog metric-icon"></i>
                                <h3 class="metric-value text-danger text-danger"><?= $free_users ?></h3>
                                <p class="card-text">Total Number of Free Users</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <i class="fas fa-money-bill metric-icon"></i>
                                <h3 class="metric-value text-danger"><?= $paid_users ?></h3>
                                <p class="card-text">Total Number of Paid Users</p>
                            </div>
                        </div>
                    </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
</body>

</html>
