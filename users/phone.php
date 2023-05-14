<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Phone</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <?php include('../includes/header_paid.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4 bg-black mx-auto my-5 p-4 text-white rounded-3">
                    <form method="post" action="../users/change_phone.php">
                        <div class="mb-3">
                            <label for="current_phone" class="form-label">Current Phone</label>
                            <input type="text" class="form-control" id="current_phone" name="current_phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_phone" class="form-label">New Phone</label>
                            <input type="text" class="form-control" id="new_phone" name="new_phone" required>
                        </div>
                        <button type="submit" class="btn btn-danger">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
