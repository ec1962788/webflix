<?php
require('../includes/connect_db.php');

if (isset($_GET['tv_id'])) {
    $tv_id = $_GET['tv_id'];
}

$query = "SELECT tv_youtube_link FROM tvshows WHERE tv_id = '$tv_id'";
$result = mysqli_query($link, $query);

if (!$result) {
    printf("Error: %s\n", mysqli_error($link));
    exit();
}

$youtube_link = '';

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $youtube_link = $row['tv_youtube_link'];
}
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Page</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }
        #video-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        #video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
</head>
<body>
    <div id="video-container">
       <iframe src="<?= 'https://www.youtube.com/embed/' . $youtube_link ?>?autoplay=1&mute=0&controls=1&loop=1&playlist=<?= $youtube_link ?>&modestbranding=1&rel=0&showinfo=0" allowfullscreen></iframe>
    </div>
</body>
</html>
