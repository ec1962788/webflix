<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    require('../login/login_tools.php');
    load();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('../includes/connect_db.php');

    $q = "INSERT INTO movie_reviews(review_user_id, review_movie_id, review_rating, review_comment, review_date)
VALUES('{$_SESSION['user_id']}',
'{$_POST['movie_id']}',
'{$_POST['rating']}',
'{$_POST['comment']}', NOW())";
    $r = mysqli_query($link, $q);

     if (mysqli_affected_rows($link) != 1) {
        echo '<p>Error</p>' . mysqli_error($link);
    } else {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
?>
