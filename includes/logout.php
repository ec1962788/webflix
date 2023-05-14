<?php # LOG OUT PAGE SCRIPT 

#Access session
session_start();

# Statement to redirect if 
if(!isset($_SESSION['user_id'])){require('../includes/login_tools.php'); load();}

#Clear existing variables
$_SESSION = array();

#Destroy the session_cache_expire
session_destroy();

header("Location: ../users/user_login.php");
die();
# ?>

 