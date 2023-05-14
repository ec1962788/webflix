<?php
require_once('../includes/connect_db.php');

// Check if form is submitted
if (isset($_POST['add_tvshow'])) {

    // Get form data
    $tvshow_title = $_POST['tv_title'];
    $tvshow_description = $_POST['tv_description'];
    $tvshow_num_episodes = $_POST['tv_num_episodes'];
    $tvshow_num_seasons = $_POST['tv_num_seasons'];
    $tvshow_release_year = $_POST['tv_release_year'];
    $tvshow_language = $_POST['tv_language'];
    $tvshow_long_desc = $_POST['tv_long_desc'];
    $tvshow_youtube_link = $_POST['tv_youtube_link'];
    $tvshow_is_free = $_POST['tv_is_free'];
    $tvshow_image = $_POST['tv_image'];
    $tvshow_category = $_POST['tv_category'];
    $tvshow_season = $_POST['tv_season'];

    // Insert data into database
    $query = "INSERT INTO tvshows (tv_title, tv_description, tv_num_episodes, tv_num_seasons, tv_release_year, tv_language, tv_long_desc, tv_youtube_link, tv_is_free, tv_image, tv_category, tv_season) VALUES ('$tvshow_title', '$tvshow_description', '$tvshow_num_episodes', '$tvshow_num_seasons', '$tvshow_release_year', '$tvshow_language', '$tvshow_long_desc', '$tvshow_youtube_link', '$tvshow_is_free', '$tvshow_image', '$tvshow_category', '$tvshow_season')";

    $result = mysqli_query($link, $query);

    if ($result) {
        // Redirect back to the TV shows page
        header("Location: ../admin/tvshows.php");
        exit();
    } else {
        echo '<div class="alert alert-danger">Error: Unable to add TV show.</div>';
    }

    mysqli_close($link);
}

// Check if delete_tvshow query parameter is set
if (isset($_GET['delete_tvshow'])) {
    $delete_tvshow_id = $_GET['delete_tvshow'];

    // Delete the TV show from the database
    $delete_query = "DELETE FROM tvshows WHERE tv_id = $delete_tvshow_id";
    $delete_result = mysqli_query($link, $delete_query);

    // Check if deletion was successful
    if ($delete_result) {
        // Redirect back to the TV shows page
        header("Location: ../admin/tvshows.php");
        exit();
    } else {
        echo '<div class="alert alert-danger">Error: Unable to delete TV show.</div>';
    }
}

$query = "SELECT * FROM tvshows";
$result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webflix - TV Shows Management</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
	
	<div class="container text-white">
    <div class="row">
        <div class="col-md-8 mx-auto mt-5">
            <h2 class="text-danger">TV Shows Management</h2>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="tv_title">Title</label>
                    <input type="text" class="form-control" name="tv_title" id="tv_title" required>
                </div>
                <div class="form-group">
                    <label for="tv_description">Description</label>
                    <textarea class="form-control" name="tv_description" id="tv_description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="tv_num_episodes">Number of Episodes</label>
                    <input type="number" class="form-control" name="tv_num_episodes" id="tv_num_episodes" required>
                </div>
                <div class="form-group">
                    <label for="tv_num_seasons">Number of Seasons</label>
                    <input type="number" class="form-control" name="tv_num_seasons" id="tv_num_seasons" required>
                </div>
                <div class="form-group">
                    <label for="tv_release_year">Release Year</label>
                    <input type="number" class="form-control" name="tv_release_year" id="tv_release_year" required>
                </div>
                <div class="form-group">
                    <label for="tv_language">Language</label>
                    <input type="text" class="form-control" name="tv_language" id="tv_language" required>
                </div>
                <div class="form-group">
                    <label for="tv_long_desc">Long Description</label>
                    <textarea class="form-control" name="tv_long_desc" id="tv_long_desc" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="tv_youtube_link">YouTube Link</label>
                    <input type="text" class="form-control" name="tv_youtube_link" id="tv_youtube_link" required>
                </div>
                <div class="form-group">
                    <label for="tv_is_free">Is Free?</label>
                    <select class="form-control" name="tv_is_free" id="tv_is_free" required>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tv_image">Cover Image</label>
                    <input type="text" class="form-control" name="tv_image" id="tv_image" required>
                </div>
                <div class="form-group">
                    <label for="tv_category">Genre</label>
                    <input type="text" class="form-control" name="tv_category" id="tv_category" required>
                </div>
                <div class="form-group">
                    <label for="tv_season">Current Season</label>
                    <input type="text" class="form-control" name="tv_season" id="tv_season" required>
                </div>
                <button type="submit" name="add_tvshow" class="btn btn-danger"><i class="fas fa-plus"></i> Add TV Show</button>
            </form>
			
			</div>

            <div class="table-responsive mt-5" style="color: white !important;">
    <table class="table table-striped table-full-width  text-white">
        <!-- The rest of the code remains the same -->

                    <thead>
                        <tr>
                            <th>Title</th>
<th>Description</th>
<th>Number of Episodes</th>
<th>Number of Seasons</th>
<th>Release Year</th>
<th>Language</th>
<th>Long Description</th>
<th>YouTube Link</th>
<th>Is Free?</th>
<th>Cover Image</th>
<th>Genre</th>
<th>Current Season</th>
<th>Actions</th>
</tr>
</thead>
<tbody >
<?php
                         require_once('../includes/connect_db.php');
                         $query = "SELECT * FROM tvshows";
                         $result = mysqli_query($link, $query);
                         if ($result && mysqli_num_rows($result) > 0) {
                             while ($row = mysqli_fetch_assoc($result)) {
                                 echo '<tr>';
                                 echo '<td class="text-white">' . $row['tv_title'] . '</td>';
                                 echo '<td class="text-white">' . $row['tv_description'] . '</td>';
                                 echo '<td class="text-white">' . $row['tv_num_episodes'] . '</td>';
                                 echo '<td class="text-white">' . $row['tv_num_seasons'] . '</td>';
                                 echo '<td class="text-white">' . $row['tv_release_year'] . '</td>';
                                 echo '<td class="text-white">' . $row['tv_language'] . '</td>';
                                 echo '<td class="text-white">' . $row['tv_long_desc'] . '</td>';
                                 echo '<td class="text-white">' . $row['tv_youtube_link'] . '</td>';
                                 echo '<td class="text-white">' . ($row['tv_is_free'] ? 'Yes' : 'No') . '</td>';
                                 echo '<td class="text-white">' . $row['tv_image'] . '</td>';
                                 echo '<td class="text-white">' . $row['tv_category'] . '</td>';
                                 echo '<td class="text-white">' . $row['tv_season'] . '</td>';
                                 echo '<td class="text-white"><a href="../admin/tvshows.php?delete_tvshow=' . $row['tv_id'] . '" class="btn btn-danger btn-sm">Delete</a></td>';
                                 echo '</tr>';
                             }
                         } else {
                             echo '<tr><td colspan="13">No TV shows found.</td></tr>';
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


