<?php

// Simplified verification - no email sending required
// Just mark account as ready to use

require '../../assets/setup/db.inc.php';

if (isset($_POST['signupsubmit'])) {
    
    // Instead of sending email, we'll just auto-verify the account
    $sql = "UPDATE stu_users SET verified_at = NOW() WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['ERRORS']['sqlerror'] = 'Account creation completed but verification failed';
        echo "<script>window.location.href = '../'; </script>";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
    }
    
    // Clean up any old verification tokens
    $sql = "DELETE FROM stu_auth_tokens WHERE user_email=? AND auth_type='account_verify';";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
    }
}

mysqli_stmt_close($stmt);
?>