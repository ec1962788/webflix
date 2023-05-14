<?php
require '../includes/connect_db.php';
$query = "SELECT * FROM `tvshows` WHERE `tv_is_free` = 1 AND `tv_season` = 1";

$result = mysqli_query($link, $query);

if ($result === false) {
  die(mysqli_error($link));
}

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
<?php include('../includes/header_free.php'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="container mt-5">
                <div class="row">
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="<?php echo $row['tv_image']; ?>" class="card-img-top" alt="<?php echo $row['tv_title']; ?>">
                                <div class="card-body">
                                    <span class="card-text text-danger my-4"><?php echo $row['tv_category']; ?></span>
                                    <h5 class="card-title"><?php echo $row['tv_title'] . ' (' . $row['tv_release_year'];?>)</h5>
									<h6 class="card-text text-secondary"><?php echo   $row['tv_num_seasons']; ?> Seasons - <?php echo   $row['tv_num_episodes']; ?> episodes total</h6>
                                    <p class="card-text"><?php echo $row['tv_description']; ?></p>
                                    <a href="tv_details_free.php?tv_id=<?php echo $row['tv_id']; ?>" class="btn btn-danger">More Info</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
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