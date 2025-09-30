<?php

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Set up proper paths based on current working directory
$base_path = '';
if (getcwd() !== dirname(__FILE__)) {
    // We're being included from a parent directory (routing system)
    $base_path = 'adminLib/';
}

// Include required files with proper paths
require $base_path . 'assets/setup/env.php';
require $base_path . 'assets/setup/db.inc.php';
require $base_path . 'assets/includes/auth_functions.php';

// Check authentication and redirect accordingly
if (isset($_SESSION['auth'])) {
    // User is authenticated, redirect to admin home
    if ($base_path) {
        // Accessed through routing system
        echo "<script> window.location.href = 'adminLib/home/'; </script>";
    } else {
        // Accessed directly
        echo "<script> window.location.href = 'home/'; </script>";
    }
    exit();
} else {
    // User not authenticated, redirect to login
    if ($base_path) {
        // Accessed through routing system
        echo "<script> window.location.href = 'adminLib/login/'; </script>";
    } else {
        // Accessed directly
        echo "<script> window.location.href = 'login/'; </script>";
    }
    exit();
}
