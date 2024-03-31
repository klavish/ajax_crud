<?php
session_start();
require 'layout/header.php';?>

<nav class="bg-blue-600 py-4">
    <ul class="flex justify-center items-center gap-6">
        <?php if(!isset($_SESSION['user_id'])): ?>
        <li><a class="text-white" href="./index.php">Home</a></li>
        <li><a class="text-white" href="./registration.php">Register</a></li>
        <li><a class="text-white" href="./login.php">Login</a></li>
        <?php else: ?>
        <li><a class="text-white" href="./profile.php">My Profile</a></li>
        <li><a class="text-white" href="./logout.php">Logout</a></li>
        <?php  endif; ?>

    </ul>
</nav>
<h1 class="font-bold text-3xl text-center">Welcome To Home Page</h1>
