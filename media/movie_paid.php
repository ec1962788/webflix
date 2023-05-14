<?php
require '../includes/connect_db.php';

# Retrieve free and paid movies from the database.
$query = "SELECT * FROM movies";
$result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Webflix</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<!--Main Body Starts -->
<body>
<?php include('../includes/header_paid.php'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-danger">Free Movies</h3>
                        <div class="row">
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <?php if ($row['movie_is_free'] == 1): ?>
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img src="<?php echo $row['movie_cover_image']; ?>" class="card-img-top" alt="<?php echo $row['movie_title']; ?>">
                                            <div class="card-body">
                                                <span class="card-text text-danger my-4"><?php echo $row['movie_category']; ?></span>
                                                <h5 class="card-title"><?php echo $row['movie_title'] . ' (' . $row['movie_release_year'];?>)</h5>
                                                <p class="card-text"><?php echo $row['movie_description']; ?></p>
                                                <span class="badge bg-success">Free</span>
                                                <a href="movie_details_paid.php?movie_id=<?php echo $row['movie_id']; ?>" class="btn btn-danger">More Info</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div class="col-md-12 mt-5">
                        <h3 class="text-danger">Paid Movies</h3>
                        <div class="row">
                            <?php mysqli_data_seek($result, 0); // Reset result pointer ?>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <?php if ($row['movie_is_free'] == 0): ?>
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img src="<?php echo $row['movie_cover_image']; ?>" class="card-img-top" alt="<?php echo $row['movie_title']; ?>">
                                            <div class="card-body">
                                                <span class="card-text text-danger my-4"><?php echo $row['movie_category']; ?></span>
                                                <h5 class="card-title"><?php echo $row['movie_title'] . ' (' .$row['movie_release_year']; ?>)</h5>
                                                                                                <p class="card-text"><?php echo $row['movie_description']; ?></p>
                                                <span class="badge bg-danger">Paid</span>
                                                <a href="movie_details_paid.php?movie_id=<?php echo $row['movie_id']; ?>" class="btn btn-danger">More Info</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
mysqli_close($link);
?>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>

