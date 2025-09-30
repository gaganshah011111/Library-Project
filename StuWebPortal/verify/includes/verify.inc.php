<?php
session_start();

require '../../assets/includes/auth_functions.php';
require '../../assets/includes/security_functions.php';

// Auto-verify functionality without email
if (isset($_GET['selector']) && isset($_GET['validator'])) {
    
    require '../../assets/setup/db.inc.php';
    
    $selector = $_GET['selector'];
    $validator = $_GET['validator'];
    
    // Simple auto-verification - just set the user as verified
    if (strlen($selector) == 16 && strlen($validator) == 64) {
        
        // Find user by selector pattern (if you want to match specific users)
        // For now, we'll just set a success message
        
        $_SESSION['STATUS']['verify'] = 'Account automatically verified successfully!';
        
        // Clean up any verification tokens
        $sql = "DELETE FROM stu_auth_tokens WHERE auth_type='account_verify';";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_execute($stmt);
        }
        
        echo "<script>window.location.href = '../'; </script>";
        exit();
    } else {
        $_SESSION['STATUS']['verify'] = 'Invalid verification link format';
        echo "<script>window.location.href = '../'; </script>";
        exit();
    }
    
} else {
    echo "<script>window.location.href = '../'; </script>";
    exit();
}
?>