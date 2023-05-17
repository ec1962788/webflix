<?php # LOG OUT PAGE SCRIPT 

#Access session
session_start();

# Statement to redirect if 
if(!isset($_SESSION['user_id'])){require('../admin/admin_login_tools.php'); load();}

#Clear existing variables
$_SESSION = array();

#Destroy the session_cache_expire
session_destroy();

header("Location: ../admin/admin_login.php");
die();
# ?>

 