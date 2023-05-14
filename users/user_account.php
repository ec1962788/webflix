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
<!DOCTYPE html><html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Webflix</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../styles/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <!--Main Body Starts -->
  <body> <?php include('../includes/header_free.php'); ?> <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-4 bg-black mx-auto my-5 p-4 text-white rounded-3">
            <h3 class="py-3 px-2 mx-auto"> <?php echo $page_title; ?> </h3>
            <hr>
            <table class="table table-striped bg-white text-black">
              <tbody>
                <tr>
                  <td>
                    <strong>Name:</strong>
                  </td>
                  <td>
                    <strong> <?php echo $row['user_name'] . ' ' . $row['user_surname']; ?> </strong>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>
                    <strong>Joined:</strong>
                  </td>
                  <td> <?php echo $row['user_join_date']; ?> </td>
                  <td></td>
                </tr>
                <tr>
                  <td>
                    <strong>E-mail:</strong>
                  </td>
                  <td> <?php echo $row['user_email']; ?> </td>
                  <td>
                    <a class="link-danger text-decoration-none" href="email.php">Change E-mail</a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <strong>Password:</strong>
                  </td>
                  <td>********</td>
                  <td>
                   <a class="link-danger text-decoration-none" href="password.php">Change Password</a>

                  </td>
                </tr>
                <tr>
                  <td>
                    <strong>Phone:</strong>
                  </td>
                  <td> <?php echo $row['user_phone']; ?> </td>
                  <td>
                    <a class="link-danger text-decoration-none" href="phone.php">Change Phone</a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <strong>Country:</strong>
                  </td>
                  <td> <?php echo $row['user_country']; ?> </td>
                  <td></td>
                </tr>
                <tr>
                  <td>
                    <strong>Date of birth:</strong>
                  </td>
                  <td> <?php echo $row['user_dob']; ?> </td>
                  <td></td>
                </tr>
                <tr>
                  <td>
                    <strong>Subscription type:</strong>
                  </td>
                  <td> <?php if ($row['user_type_paid'] == 1): ?> Paid <?php elseif ($row['user_type_paid'] == 0): ?> Free <?php else: ?> <?php echo $row['user_type_paid']; ?> <?php endif; ?> </td>
                  <td> <?php if ($row['user_type_paid'] == 0): ?> <a class="link-danger text-decoration-none" href="../paid/register_paid.php">Buy Subscription</a> <?php endif; ?> </td>
                </tr>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
	
	
	
    <!-- Email Modal -->
    <div class="modal fade" id="emailModal" aria-labelledby="emailModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="emailModalLabel">Change Email</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="change_email.php">
              <div class="mb-3">
                <label for="current_email" class="form-label">Current Email</label>
              <input type="email" class="form-control" id="current_email" name="current_email" value="<?php echo $row['user_email']; ?>" readonly>
                <div class="mb-3">
                  <label for="new_email" class="form-label">New Email</label>
                  <input type="email" class="form-control" id="new_email" name="user_email" required>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
	
<!-- Password Modal -->
<div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="passwordModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="change_password.php">
          <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
          </div>
          <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
          </div>
          <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm New Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



	
	
	
	
	
	
	
	
	
	
	
	
	
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    </div>
  </body>
</html>