<?php
session_start();

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
