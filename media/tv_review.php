<?php
if (isset($_GET['tv_id'])) {
    $id = $_GET['tv_id'];
}

require('../includes/connect_db.php');

$tv_id = $_GET['tv_id'];
$q = "SELECT user_name, user_surname FROM users WHERE user_id = '{$_SESSION['user_id']}'";
$result = mysqli_query($link, $q);

if ($result && mysqli_num_rows($result) == 1) {
    $user_data = mysqli_fetch_assoc($result);
    $_SESSION['user_name'] = $user_data['user_name'];
    $_SESSION['user_surname'] = $user_data['user_surname'];
}

$strSQL = "SELECT * FROM tvshows WHERE tv_id = '$id'";
$result = mysqli_query($link, $strSQL);

$row = null;
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}

$reviews_sql = "SELECT tv_reviews.*, users.user_name, users.user_surname FROM tv_reviews JOIN users ON tv_reviews.review_user_id = users.user_id WHERE review_tv_id = '$id'";
$reviews_result = mysqli_query($link, $reviews_sql);

if (!$reviews_result) {
    printf("Error: %s\n", mysqli_error($link));
    exit();
}

mysqli_close($link);
?>

<?php
if (isset($_GET['tv_id'])) {
    $id = $_GET['tv_id'];
}

require('../includes/connect_db.php');

$tv_id = $_GET['tv_id'];
$q = "SELECT user_name, user_surname FROM users WHERE user_id = '{$_SESSION['user_id']}'";
$result = mysqli_query($link, $q);

if ($result && mysqli_num_rows($result) == 1) {
    $user_data = mysqli_fetch_assoc($result);
    $_SESSION['user_name'] = $user_data['user_name'];
    $_SESSION['user_surname'] = $user_data['user_surname'];
}

$strSQL = "SELECT * FROM tvshows WHERE tv_id = '$id'";
$result = mysqli_query($link, $strSQL);

$row = null;
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}

$reviews_sql = "SELECT tv_reviews.*, users.user_name, users.user_surname FROM tv_reviews JOIN users ON tv_reviews.review_user_id = users.user_id WHERE review_tv_id = '$id'";
$reviews_result = mysqli_query($link, $reviews_sql);

if (!$reviews_result) {
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
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div>
        <!-- Display review submission form -->
        <form class="px-5" action="post_action2.php" method="post">
            <input type="hidden" name="tv_id" value="<?php echo $tv_id; ?>">
            <div class="form-group">
                <label for="user_name">Name:</label>
                <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $_SESSION['user_name']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="user_surname">Surname:</label>
                <input type="text" class="form-control" id="user_surname" name="user_surname" value="<?php echo $_SESSION['user_surname']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="rating">Rating:</label>
                <div class="form-check">
                    <span><label class="form-check-label"><input type="radio" class="form-check-input" name="rating" value="5"><span class="text-danger">&#9734; &#9734; &#9734; &#9734; &#9734;</span></label></span>
                    <br>
                    <span><label class="form-check-label"><input type="radio" class="form-check-input text-danger" name="rating" value="4"><span class="text-danger">&#9734; &#9734; &#9734; &#9734;</span></label></span>
                    <br>
                    <span><label class="form-check-label"><input type="radio" class="form-check-input text-danger" name="rating" value="3"><span class="text-danger">&#9734; &#9734; &#9734;</span></label></span>
                    <br>
                    <span><label class="form-check-label"><input type="radio" class="form-check-input text-danger" name="rating" value="2"><span class="text-danger">&#9734; &#9734;</span></label></span>
                    <br>
                    <span><label class="form-check-label"><input type="radio" class="form-check-input text-danger" name="rating" value="1"><span class="text-danger">&#9734;</span></label></span>
                </div>
            </div>
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" id="comment" name="comment" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
      <!-- Display tv reviews -->
	  
        <?php if (mysqli_num_rows($reviews_result) > 0): ?>
            <?php while ($review = mysqli_fetch_assoc($reviews_result)): ?>
                 <div class=" mx-5 my-5 alert alert-dark" style="border-color: #D3D3D3; border-style: solid;">	
            <p> <span  class="font-weight-bold text-danger"><?= $review['review_rating'].' &#9734' ?> </span>  from <em><?= $review['user_name'] ?> <?= $review['user_surname'] ?></em> on <em><?= $review['review_date'] ?></em>
            <p class=" small"><?= $review['review_comment'] ?></p>
            
        </div>
		<hr class="bg-dark">
            <?php endwhile; ?>
        <?php else: ?>
            <p>No reviews found for this tv show.</p>
        <?php endif; ?>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
					