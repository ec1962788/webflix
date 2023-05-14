<?php
session_start();
 
require('../includes/connect_db.php');

if (!isset($_SESSION['user_id'])) {
    require('../includes/login_tools.php');
    load();
}

if (isset($_GET['tv_id'])) {
    $id = $_GET['tv_id'];
}

if (isset($_POST['add_to_tv_list'])) {
    $tv_id = $_POST['tv_id'];
    $query = "INSERT INTO `tv_list` (`tv_id`) VALUES ('$tv_id')";
    $result = mysqli_query($link, $query);
    if (!$result) {
        die("Failed to add TV show to list: " . mysqli_error($link));
    }
}

$strSQL = "SELECT * FROM tvshows WHERE tv_id = '$id'";
$result = mysqli_query($link, $strSQL);

$row = null;
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}


// Get the currently displayed title
$currentTitle = $row['tv_title']; // Replace with your actual variable or value

// Fetch related TV shows with the same genre
$genre = $row['tv_category'];

// Fetch related free TV shows with the same genre
$related_tv_sql = "SELECT * FROM tvshows WHERE tv_category = '$genre' AND tv_id != '$id' AND tv_title != '$currentTitle' AND tv_is_free = 1 LIMIT 2";
$related_tv_result = mysqli_query($link, $related_tv_sql);



// Fetch the TV show episodes for the currently displayed title from the database
$query = "SELECT DISTINCT tv_season, tv_id FROM `tvshows` WHERE tv_title = '$currentTitle'";
$result = mysqli_query($link, $query);

// Check for errors in the SQL query
if (!$result) {
    printf("Error: %s\n", mysqli_error($link));
    exit();
}


mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webflix - TV Show Details</title>
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
                        <h1 class="text-white my-3"><?php echo $row['tv_title'] . '  <span class="nav-pill btn border-danger text-danger">' . $row['tv_category']; ?></h1></span></h1>
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $row['tv_youtube_link']; ?>?autoplay=1&mute=1&loop=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <div class="container-fluid">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-12">
                                    <div class="row text-white">
                                        <div class="bg-black col-lg-6 my-1 py-2">
                                            <a href="tv_full.php?tv_id=<?php echo $id; ?>" class="btn btn-danger btn-block mb-3">Watch Full Episode</a>
                                            <p class="py-1"><?php echo $row['tv_long_desc']; ?></p>
                                            <form method="POST" class="my-5">
                                                <input type="hidden" name="tv_id" value="<?php echo $id; ?>">
                                                <button type="submit" name="add_to_tv_list" class="btn btn-danger">Add to TV List</button>
                                            </form>
 
												<!-- Display the TV show seasons in a Bootstrap dropdown -->
<div class="dropdown">
    <button class="btn btn-danger dropdown-toggle" type="button" id="seasonDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        Select Season
    </button>
    <ul class="dropdown-menu" aria-labelledby="seasonDropdown">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <li>
                <a class="dropdown-item" href="../media/tv_details_free.php?tv_id=<?php echo $row['tv_id']; ?>&season=<?php echo $row['tv_season']; ?>">
                    Season <?php echo $row['tv_season']; ?>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
</div>


											<hr class="bg-dark">
                                            <h3 class="display-6 text-white  py-1">Related TV Shows</h3>
                                            <div class="row">
                                                <?php while ($related_tvshow = mysqli_fetch_assoc($related_tv_result)): ?>
                                                    <div class="col-md-3">
                                                        <div class="card mb-4">
                                                            <img src="<?php echo $related_tvshow['tv_image']; ?>" class="card-img-top" alt="<?php echo $related_tvshow['tv_title']; ?>">
                                                            <div class="card-body text-black">
                                                                <h5 class="card-title"><?php echo $related_tvshow['tv_title']; ?></h5>
                                                                <p class="card-text"><?php echo substr($related_tvshow['tv_description'], 0, 100) . '...'; ?></p>
                                                                <a href="tv_details_free.php?tv
_id=<?php echo $related_tvshow['tv_id']; ?>" class="btn btn-danger">View Details</a>
</div>
</div>
</div>
<?php endwhile; ?>
</div>
</div>
<div class="bg-black mx-3 col-lg-4 my-3">


<h3 class="display-6">Reviews & Ratings</h3>
<hr class="bg-dark">
<?php include('../media/tv_review.php'); ?>
</div>
</div>
</div>
</div>
</div>
<?php else: ?>
<p>TV Show not found.</p>
<?php endif; ?>
</section>
</div>
</div>
</div>
<!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

</body>
</html>