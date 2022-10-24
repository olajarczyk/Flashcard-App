<?php
ob_start();
session_start();

(!isset($_SESSION['flashcard_user']) ? header("Location: login.php") : "");

if(isset($_GET['logout'])){
    unset($_SESSION['flashcard_user']);
    unset($_SESSION['flashcard']);
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flashcard App</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-default">
        <h3 class="navbar-brand">Flashcard App</h3>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><span class="nav-link">Welcome, <?php echo $_SESSION['flashcard'];?></span></li>
            <li class="nav-item"><a href="#" class="nav-link">Add flashcard</a></li>
            <li class="nav-item"><a href="?logout" class="nav-link">Logout</a></li>
        </ul>
    </nav>