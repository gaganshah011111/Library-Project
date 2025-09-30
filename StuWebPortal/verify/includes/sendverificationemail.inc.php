<?php
session_start();

require '../../assets/includes/auth_functions.php';
require '../../assets/includes/security_functions.php';

if (isset($_POST['verifysubmit'])) {
    
    /*
    * -------------------------------------------------------------------------------
    *   Verifying CSRF token
    * -------------------------------------------------------------------------------
    */

    if (!verify_csrf_token()) {
        $_SESSION['STATUS']['verify'] = 'Request could not be validated';
        echo "<script>window.location.href = '../'; </script>";
        exit();
    }

    require '../../assets/setup/db.inc.php';
    
    // Since we're removing email verification, we'll just redirect to login
    $_SESSION['STATUS']['verify'] = 'No verification needed - accounts are automatically activated';
    echo "<script>window.location.href = '../../login/'; </script>";
    exit();
    
} else {
    echo "<script>window.location.href = '../'; </script>";
    exit();
}
?>