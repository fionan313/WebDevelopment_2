<?php
//function to log the user out

//initiate a session
session_start();
//destroy a session
session_destroy();
//redirect to login.php
header("Location: login.php");
?>