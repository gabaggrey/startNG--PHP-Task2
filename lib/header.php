<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Corona International group of schools</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="topnav">
        <a href="index.php">HOME</a>
        <?php
        if (!isset($_SESSION['loggedIn'])) {
        ?>
            <a href="login.php">LOGIN</a>
            <a href="register.php">REGISTER</a>
            <a href="forgot.php">FORGOT PASSWORD</a>
        <?php } else { ?>
            <a href="logout.php">LOGOUT</a>
            <a href="reset.php">RESET PASSWORD</a>
        <?php } ?>
    </nav>
    