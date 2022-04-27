<!doctype html>
<!-- http://ec2-44-202-10-232.compute-1.amazonaws.com/assets/php/login/logout.php -->

<?php
session_start();
// Destroy session
if(session_destroy()) {
    // Redirecting To Home Page
    header("Location: /index.php");
}
?>
