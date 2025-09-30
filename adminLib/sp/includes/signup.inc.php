<?php

session_start();

require '../../assets/includes/auth_functions.php';
require '../../assets/includes/datacheck.php';
require '../../assets/includes/security_functions.php';

check_logged_out();

if (!isset($_POST['signupsubmit'])) {
    echo "<script> window.location.href = '../'; </script>";
    exit();
} else {

    /*
    * -------------------------------------------------------------------------------
    *   Securing against Header Injection
    * -------------------------------------------------------------------------------
    */

    foreach ($_POST as $key => $value) {
        $_POST[$key] = _cleaninjections(trim($value));
    }

    /*
    * -------------------------------------------------------------------------------
    *   Verifying CSRF token
    * -------------------------------------------------------------------------------
    */

    if (!verify_csrf_token()) {
        $_SESSION['STATUS']['signupstatus'] = 'Request could not be validated';
        echo "<script> window.location.href = '../'; </script>";
        exit();
    }

    require '../../assets/setup/db.inc.php';

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $gender = $_POST['gender'];
    $headline = $_POST['headline'];

    // Validation
    $errors = array();

    // Check empty fields
    if (empty($first_name) || empty($last_name) || empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $errors['empty'] = 'All required fields must be filled';
    }

    // Validate first name
    if (!empty($first_name) && !preg_match("/^[a-zA-Z ]*$/", $first_name)) {
        $errors['first_name'] = 'Only letters and spaces allowed in first name';
    }

    // Validate last name
    if (!empty($last_name) && !preg_match("/^[a-zA-Z ]*$/", $last_name)) {
        $errors['last_name'] = 'Only letters and spaces allowed in last name';
    }

    // Validate username
    if (!empty($username)) {
        if (strlen($username) < 3) {
            $errors['username'] = 'Username must be at least 3 characters long';
        } elseif (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
            $errors['username'] = 'Username can only contain letters, numbers, and underscores';
        } elseif (usernameExists($conn, $username)) {
            $errors['username'] = 'Username already exists';
        }
    }

    // Validate email
    if (!empty($email)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format';
        } elseif (emailExists($conn, $email)) {
            $errors['email'] = 'Email already exists';
        }
    }

    // Validate password
    if (!empty($password)) {
        if (strlen($password) < 6) {
            $errors['password'] = 'Password must be at least 6 characters long';
        } elseif ($password !== $confirm_password) {
            $errors['confirm_password'] = 'Passwords do not match';
        }
    }

    // If there are errors, redirect back with errors
    if (!empty($errors)) {
        $_SESSION['ERRORS'] = $errors;
        echo "<script> window.location.href = '../'; </script>";
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $sql = "INSERT INTO admin_users (username, email, password, first_name, last_name, gender, headline, created_at, verified_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['STATUS']['signupstatus'] = 'Database error occurred';
        echo "<script> window.location.href = '../'; </script>";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "sssssss", $username, $email, $hashed_password, $first_name, $last_name, $gender, $headline);
        
        if (mysqli_stmt_execute($stmt)) {
            // Clear any existing errors
            unset($_SESSION['ERRORS']);
            
            // Set success message
            $_SESSION['STATUS']['signupstatus'] = 'Account created successfully! You can now login.';
            
            // Redirect to login page after a short delay
            echo "<script>
                setTimeout(function() {
                    window.location.href = '../login/';
                }, 2000);
            </script>";
            echo "<div style='text-align: center; margin-top: 50px;'>
                    <h3>Account Created Successfully!</h3>
                    <p>Redirecting to login page...</p>
                  </div>";
            exit();
        } else {
            $_SESSION['STATUS']['signupstatus'] = 'Error creating account. Please try again.';
            echo "<script> window.location.href = '../'; </script>";
            exit();
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

?>