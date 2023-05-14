<?php
session_start();
 
require('../includes/connect_db.php');

if (!isset($_SESSION['user_id'])) {
    require('../includes/login_tools.php');
    load();
}

if (isset($_GET['movie_id'])) {
    $id = $_GET['movie_id'];
}

if (isset($_POST['add_to_list'])) {
    $movie_id = $_POST['movie_id'];
    $query = "INSERT INTO `movie_list` (`movie_id`) VALUES ('$movie_id')";
    $result = mysqli_query($link, $query);
    if (!$result) {
        die("Failed to add movie to list: " . mysqli_error($link));
    }
}

$strSQL = "SELECT * FROM movies WHERE movie_id = '$id'";
$result = mysqli_query($link, $strSQL);

$row = null;
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}

// Fetch related movies with the same genre
$genre = $row['movie_category'];
// Fetch related free movies with the same genre
$related_movies_sql = "SELECT * FROM movies WHERE movie_category = '$genre' AND movie_id != '$id' AND movie_is_free = 1  LIMIT 4";
$related_movies_result = mysqli_query($link, $related_movies_sql);

// Fetch the TV show episodes from the database
$query = "SELECT * FROM `tvshows`";
$result = mysqli_query($link, $query);

// Check for errors in the SQL query
if (!$related_movies_result) {
    printf("Error: %s\n", mysqli_error($link));
    exit();
 
}
 
mysqli_close($link);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Webflix</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <style>
        .hero {
            height: calc(100vh - 56px); /* subtract navbar height from viewport height */
        }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

  <?php include('../includes/header_free.php'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <section class="hero">
			

                <?php if ($row !== null): ?>

                    <h1 class="text-white my-3"><?php echo $row['movie_title'] . '  <span class="nav-pill btn border-danger text-danger">' . $row['movie_category']; ?></h1></span></h1> 


                    <p class="text-white"><?php echo $row['movie_description']; ?></p>
                <?php endif; ?>

                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $row['movie_youtube_link']; ?>?autoplay=1&mute=1&loop=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                
                <div class="container-fluid">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-12">
						
                            <?php if ($row !== null): ?>
                                <div class="row text-white">
                                    <div class="bg-black col-lg-6 my-1 py-3">
									<a href="movie_full.php?movie_id=<?php echo $id; ?>" class="btn btn-danger btn-block">Watch Full Movie</a>

								<br>
								
 
 

									<br>
                                        <p><?php echo $row['movie_long_desc']; ?></p>
										
										
										
										 <form method="POST" class=" my-5">
    <input type="hidden" name="movie_id" value="<?php echo $id; ?>">
    <button type="submit" name="add_to_list" class="btn btn-danger">Add to List</button>
</form>


										
										
										<hr class="bg-dark">

                                        <h3 class="display-6 text-white">Related Movies</h3>
                                        <!-- Related Movies -->
                                        <div class="row">
                                            <?php while ($related_movie = mysqli_fetch_assoc($related_movies_result)): ?>
                                                <div class="col-md-3">
                                                    <div class="card mb-4">
                                                        <img src="<?php echo $related_movie['movie_cover_image']; ?>" class="card-img-top" alt="<?php echo $related_movie['movie_title']; ?>">
                                                        <div class="card-body text-black">
                                                            <h5 class="card-title"><?php echo $related_movie['movie_title']; ?></h5>
                                                            <p class="card-text"><?php echo substr($related_movie['movie_description'], 0, 100) . '...'; ?>
															
															</p>
															
																																												

                                                            <a href="movie_details_free.php?movie_id=<?php echo $related_movie['movie_id']; ?>" class="btn btn-danger">View Details</a>

                                                        </div>
														
                                                    </div>
                                                </div>
		
                                            <?php endwhile; ?>
                                        </div>
                                    </div>
                                    <div class="bg-black mx-3 col-lg-4 my-3 py-3">
                                        <h3 class="display-6">Reviews &amp; Ratings</h3>
											<hr class="bg-dark">
											<?php include('../media/movie_review.php'); ?>
                                         
                                    </div>
                                </div>
                            <?php else: ?>
                                <p>Movie not found.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>