<?php #CONNECT TO MySQL DATABASE.
#Connect on 'localhost' for user to database 'site_db'
$link = mysqli_connect('localhost', 'HNDSOFTS2A13', 'GdPZUFCJ6V', 'HNDSOFTS2A13');

if (!$link)
{

    # Otherwise fail gracefully and explain the error_get_last
    die('Could not connect to MySQL:' . mysqli_error());
}

# echo '<pre><small>Connection OK (HNDSOFTS2A13)</small></pre>';

?>
