<?php
session_start();

$page_name = basename($_SERVER['PHP_SELF']); 

if (!isset($_SESSION['username']))
{
    header("Location: login.php");
}

?>
    <!DOCTYPE html>
    <html>
    <head>

      <title>PHP Phone Book</title>

      <?php include('style.php'); ?>

    </head>
    <body class="bg-light custom_gradient_color">
