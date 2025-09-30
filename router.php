<?php
// Simple routing system to prevent auto-loading of homepage
session_start();

// Get the requested page
$page = isset($_GET['page']) ? $_GET['page'] : '';

// Define allowed pages
$allowed_pages = [
    'home' => 'index.php',
    'library' => 'library.php',
    'admin' => 'adminLib/index.php',
    'sp' => 'adminLib/sp/index.php',
    'student' => 'StuWebPortal/index.php',
    'developers' => 'developers.php'
];

// Route to appropriate page
if (empty($page)) {
    // Show a landing page instead of auto-loading homepage
    include 'landing.php';
} elseif ($page === 'home' || $page === 'homepage') {
    // Only load homepage when explicitly requested
    include 'index.php';
} elseif (array_key_exists($page, $allowed_pages)) {
    include $allowed_pages[$page];
} else {
    // Show 404 or redirect to landing
    http_response_code(404);
    include 'landing.php';
}
?>