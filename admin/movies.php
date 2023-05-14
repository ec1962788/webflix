<?php
require_once('../includes/connect_db.php');

// Check if form is submitted
if (isset($_POST['add_movie'])) {

    // Get form data
    $movie_title = $_POST['movie_title'];
    $movie_description = $_POST['movie_description'];
    $movie_duration = $_POST['movie_duration'];
    $movie_release_year = $_POST['movie_release_year'];
    $movie_language = $_POST['movie_language'];
    $movie_long_desc = $_POST['movie_long_desc'];
    $movie_youtube_link = $_POST['movie_youtube_link'];
    $movie_is_free = $_POST['movie_is_free'];
    $movie_cover_image = $_POST['movie_cover_image'];
    $movie_category = $_POST['movie_category'];

    // Insert data into database
    $query = "INSERT INTO movies (movie_title, movie_description, movie_duration, movie_release_year, movie_language, movie_long_desc, movie_youtube_link, movie_is_free, movie_cover_image, movie_category) VALUES ('$movie_title', '$movie_description', '$movie_duration', '$movie_release_year', '$movie_language', '$movie_long_desc', '$movie_youtube_link', '$movie_is_free', '$movie_cover_image', '$movie_category')";

    $result = mysqli_query($link, $query);

    if ($result) {
        // Redirect back to the movies page
        header("Location: ../admin/movies.php");
        exit();
    } else {
        echo '<div class="alert alert-danger">Error: Unable to add movie.</div>';
    }

    mysqli_close($link);
}

// Check if delete_movie query parameter is set
if (isset($_GET['delete_movie'])) {
    $delete_movie_id = $_GET['delete_movie'];

    // Delete the movie from the database
    $delete_query = "DELETE FROM movies WHERE movie_id = $delete_movie_id";
    $delete_result = mysqli_query($link, $delete_query);

    // Check if deletion was successful
    if ($delete_result) {
        // Redirect back to the movies page
        header("Location: ../admin/movies.php");
        exit();
    } else {
        echo '<div class="alert alert-danger">Error: Unable to delete movie.</div>';
    }
}

$query = "SELECT * FROM movies";
$result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webflix - Movies Management</title>
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

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5 text-white">
                <h2 class="text-danger">Movies Management</h2>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="movie_title">Title</label>
						                        <input type="text" class="form-control" name="movie_title" id="movie_title" required>
                    </div>
                    <div class="form-group">
                        <label for="movie_description">Description</label>
                        <textarea class="form-control" name="movie_description" id="movie_description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="movie_duration">Duration (minutes)</label>
                        <input type="number" class="form-control" name="movie_duration" id="movie_duration" required>
                    </div>
                    <div class="form-group">
                        <label for="movie_release_year">Release Year</label>
                        <input type="number" class="form-control" name="movie_release_year" id="movie_release_year" required>
                    </div>
                    <div class="form-group">
                        <label for="movie_language">Language</label>
                        <input type="text" class="form-control" name="movie_language" id="movie_language" required>
                    </div>
                    <div class="form-group">
                        <label for="movie_long_desc">Long Description</label>
                        <textarea class="form-control" name="movie_long_desc" id="movie_long_desc" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="movie_youtube_link">YouTube Link</label>
                        <input type="text" class="form-control" name="movie_youtube_link" id="movie_youtube_link" required>
                    </div>
                    <div class="form-group">
                        <label for="movie_is_free">Is Free?</label>
                        <select class="form-control" name="movie_is_free" id="movie_is_free" required>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="movie_cover_image">Cover Image</label>
                        <input type="text" class="form-control" name="movie_cover_image" id="movie_cover_image" required>
                    </div>
                    <div class="form-group">
                        <label for="movie_category">Category</label>
                        <input type="text" class="form-control" name="movie_category" id="movie_category" required>
                    </div>
                    <button type="submit" name="add_movie" class="btn btn-danger"><i class="fas fa-plus"></i> Add Movie</button>
                </form>

                <div class="table-responsive mt-5 text-white">
                    <table class="table table-striped text-white">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Duration</th>
                                <th>Release Year</th>
                                <th>Language</th>
                                <th>Is Free?</th>
                                <th>Cover Image</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
    <?php
    require_once('../includes/connect_db.php');
    $query = "SELECT * FROM movies";
    $result = mysqli_query($link, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td class="text-white">' . $row['movie_title'] . '</td>';
            echo '<td class="text-white">' . $row['movie_description'] . '</td>';
            echo '<td class="text-white">' . $row['movie_duration'] . '</td>';
            echo '<td class="text-white">' . $row['movie_release_year'] . '</td>';
            echo '<td class="text-white">' . $row['movie_language'] . '</td>';
            echo '<td class="text-white">' . ($row['movie_is_free'] ? 'Yes' : 'No') . '</td>';
            echo '<td class="text-white">' . $row['movie_cover_image'] . '</td>';
            echo '<td class="text-white">' . $row['movie_category'] . '</td>';
            echo '<td><a href="../admin/movies.php?delete_movie=' . $row['movie_id'] . '" class="btn btn-danger btn-sm">Delete</a></td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="9">No movies found.</td></tr>';
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