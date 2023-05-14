<?php
require '../includes/connect_db.php';

// Check if a movie ID is provided to delete
if (isset($_GET['delete_movie'])) {
    $delete_id = mysqli_real_escape_string($link, $_GET['delete_movie']);
    $delete_query = "DELETE FROM `movie_list` WHERE `movie_id` = $delete_id";
    mysqli_query($link, $delete_query);
    header("Location: movie_list.php");
    exit();
}

// Check if a TV show ID is provided to delete
if (isset($_GET['delete_tv'])) {
    $delete_id = mysqli_real_escape_string($link, $_GET['delete_tv']);
    $delete_query = "DELETE FROM `tv_list` WHERE `tv_id` = $delete_id";
    mysqli_query($link, $delete_query);
    header("Location: movie_list.php");
    exit();
}

// Fetch data from movie_list and movies tables
$movie_query = "SELECT * FROM `movie_list` INNER JOIN `movies` ON `movie_list`.`movie_id` = `movies`.`movie_id`";
$movie_result = mysqli_query($link, $movie_query);

// Fetch data from tv_list and tvshows tables
$tv_query = "SELECT * FROM `tv_list` INNER JOIN `tvshows` ON `tv_list`.`tv_id` = `tvshows`.`tv_id`";
$tv_result = mysqli_query($link, $tv_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Movie and TV Show List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<!--Main Body Starts -->
<body>
<?php include('../includes/header_free.php'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center mt-5 display-3 text-danger"><strong>My List</strong></h3>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-danger">Movies</h4>
                        <?php if (mysqli_num_rows($movie_result) > 0): ?>
                            <table class="table table-striped bg-white text-black rounded-3 px-5">
                                <thead>
                                <tr>
                                    <th>Watch Full Movie</th>
                                    <th>Title</th>
                                    <th>Release Year</th>
                                    <th>Category</th>
                                    <th>Description</th>
									<th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
    <?php while ($row = mysqli_fetch_assoc($movie_result)): ?>
        <tr>
            <td><a href="movie_full.php?movie_id=<?php echo $row['movie_id']; ?>" class="btn btn-danger btn-block">Watch Full Movie</a></td>
            <td><?php echo $row['movie_title']; ?></td>
            <td><?php echo $row['movie_release_year']; ?></td>
            <td><?php echo $row['movie_category']; ?></td>
            <td><?php echo $row['movie_description']; ?></td>
			<td> <a href="movie_list.php?delete_movie=<?php echo $row['movie_id']; ?>" class="btn btn-danger btn-sm">Remove</a></td>
        </tr>
    <?php endwhile; ?>
 
</tbody>
<tfoot>
    
</tfoot>

</table>
<?php else: ?>
<div class="alert alert-info" role="alert">No movies found in your list.</div>
<?php endif; ?>
</div>
</div>
</div>
<div class="container mt-5">
<div class="row">
<div class="col-md-12">
<h4 class="text-danger">TV Shows</h4>
<?php if (mysqli_num_rows($tv_result) > 0): ?>
<table class="table table-striped bg-white text-black rounded-3 px-5">
<thead>
<tr>
<th>Watch Full Episode</th>
<th>Title</th>
<th>Category</th>
<th>Description</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php while ($row = mysqli_fetch_assoc($tv_result)): ?>
<tr>
<td><a href="tv_full.php?tv_id=<?php echo $row['tv_id']; ?>" class="btn btn-danger btn-block">Watch Full Episode</a></td>
<td><?php echo $row['tv_title']; ?></td>
<td><?php echo $row['tv_category']; ?></td>
<td><?php echo $row['tv_description']; ?></td>
<td><a href="movie_list.php?delete_tv=<?php echo $row['tv_id']; ?>" class="btn btn-danger btn-sm">Remove</a></td>

</tr>
<?php endwhile; ?>
</tbody>
</table>
<?php else: ?>
<div class="alert alert-info" role="alert">No TV shows found in your list.</div>
<?php endif; ?>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>