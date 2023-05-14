<?php
session_start();
$page_title = 'User Account';
require('../includes/connect_db.php');

// Fetch user information from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($link, $query);

if (!$result) {
  die("Database query failed.");
}

$row = mysqli_fetch_array($result);
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
			   
			 <div class="col-md-4 bg-black mx-auto my-5 p-4 text-white rounded-3">
<form method="post" action="change_email.php">
				  <div class="mb-3">
					 <label for="current_email" class="form-label">Current Email</label>
					 <input type="email" class="form-control" id="current_email" name="current_email" value="<?php echo $row['user_email']; ?>" readonly>
				  </div>
				  <div class="mb-3">
					 <label for="new_email" class="form-label">New Email</label>
					 <input type="email" class="form-control" id="new_email" name="user_email" required>
				  </div>
				  <div class="mb-3">
				 
				  </div>
				  <button type="submit" class="btn btn-danger">Save Changes</button>
			   </form>

				</div>
			   
			  		   
			   
            </div>
         </div>
      </div>

    

      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

 
      </script>
   </body>
