<?php
session_start();

if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
    // User is authenticated, redirect to home
    header("Location: home/");
    exit();
} else {
    // User is not authenticated, redirect to login
    header("Location: login/");
    exit();
}
