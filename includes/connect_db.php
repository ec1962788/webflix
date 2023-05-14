<?php
$link = mysqli_connect('localhost', 'root', 'usbw', 'webflix');

if (!$link)
{
   die('Could not connect to MySQL:' . mysqli_error());

}

#echo '<pre><small>Connection OK (WEBFLIX)</small></pre>';

?>