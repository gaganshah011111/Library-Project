<link rel="icon" type="image/x-icon" href="../assets/images/logo.png">
<link rel="stylesheet" type="text/css" href="signupcustom.css">


<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Set your lock password here
$lock_password = 'AdminLib@2025!';
// Expire unlock on every refresh (except when submitting password form)
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['sp_lock_submit'])) {
    unset($_SESSION['sp_unlocked']);
}
if (!isset($_SESSION['sp_unlocked'])) {
    if (isset($_POST['sp_lock_submit'])) {
        if (isset($_POST['sp_lock_password']) && $_POST['sp_lock_password'] === $lock_password) {
            $_SESSION['sp_unlocked'] = true;
        } else {
            $sp_lock_error = 'Incorrect password.';
        }
    }
}

if (!isset($_SESSION['sp_unlocked'])) {
    ?>
    <html>
    <head>
        <title>Protected Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <style>
            body {
                background: linear-gradient(135deg, #e0e7ef 0%, #f8fafc 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .lock-card {
                background: #fff;
                border-radius: 1.5rem;
                box-shadow: 0 8px 32px rgba(44,62,80,0.10);
                padding: 2.5rem 2.5rem 2rem 2.5rem;
                min-width: 340px;
                max-width: 95vw;
                text-align: center;
            }
            .lock-icon {
                font-size: 2.8rem;
                color: #3498db;
                margin-bottom: 1rem;
            }
            .form-control {
                border-radius: 2rem;
                padding: 0.75rem 1.25rem;
                font-size: 1.1rem;
            }
            .btn-primary {
                border-radius: 2rem;
                font-weight: 600;
                padding: 0.7rem 2.5rem;
                font-size: 1.1rem;
                margin-top: 0.5rem;
            }
            .lock-error {
                color: #e74c3c;
                margin-bottom: 1rem;
                font-weight: 500;
            }
            .show-password-toggle {
                position: absolute;
                right: 1.5rem;
                top: 50%;
                transform: translateY(-50%);
                background: none;
                border: none;
                color: #888;
                font-size: 1.2rem;
                cursor: pointer;
                z-index: 2;
            }
            .password-group {
                position: relative;
            }
        </style>
    </head>
    <body>
        <form method="post" class="lock-card animate__animated animate__fadeInDown">
            <div class="lock-icon"><i class="fas fa-lock"></i></div>
            <h3 class="mb-3">Admin Registration Locked</h3>
            <p class="mb-4 text-muted">This page is protected. Please enter the access password to continue.</p>
            <div class="form-group mb-3 password-group">
                <input type="password" name="sp_lock_password" id="sp_lock_password" class="form-control text-center" placeholder="Enter access password" required autofocus />
                <button type="button" class="show-password-toggle" onclick="togglePassword()" tabindex="-1"><i class="fas fa-eye" id="eyeIcon"></i></button>
            </div>
            <?php if (!empty($sp_lock_error)) echo '<div class="lock-error">'.$sp_lock_error.'</div>'; ?>
            <button type="submit" name="sp_lock_submit" class="btn btn-primary w-100">Unlock</button>
        </form>
        <script>
        function togglePassword() {
            var input = document.getElementById('sp_lock_password');
            var icon = document.getElementById('eyeIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
        </script>
    </body>
    </html>
    <?php
    exit;
}

define('TITLE', "Admin Signup");
include '../assets/layouts/header.php';
check_logged_out();
?>

<body oncontextmenu="return false">

    <div class="container">
        <div class="row">
            <div class="col-sm-2">

            </div>
            <div class="col-sm-8">
                <form class="form-auth" action="includes/signup.inc.php" method="post" autocomplete="off">

                    <?php insert_csrf_token(); ?>

                    <div class="text-center">
                        <img class="mb-1" src="../assets/images/logo.png" alt="" width="90" height="90">
                    </div>
                    <h6 class="h3 mt-3 mb-3 font-weight-normal text-muted text-center">Admin Registration</h6>
                    <h6 class="h5 mt-3 mb-3 font-weight-normal text-muted text-center">Create Admin Account</h6>

                    <div class="text-center mb-3">
                        <small class="text-success font-weight-bold">
                            <?php
                            if (isset($_SESSION['STATUS']['signupstatus']))
                                echo $_SESSION['STATUS']['signupstatus'];
                            ?>
                        </small>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name" class="font-weight-bold">First Name:</label>
                                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name" required autofocus>
                                <sub class="text-danger">
                                    <?php
                                    if (isset($_SESSION['ERRORS']['first_name']))
                                        echo $_SESSION['ERRORS']['first_name'];
                                    ?>
                                </sub>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name" class="font-weight-bold">Last Name:</label>
                                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name" required>
                                <sub class="text-danger">
                                    <?php
                                    if (isset($_SESSION['ERRORS']['last_name']))
                                        echo $_SESSION['ERRORS']['last_name'];
                                    ?>
                                </sub>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="font-weight-bold">Username:</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                        <sub class="text-danger">
                            <?php
                            if (isset($_SESSION['ERRORS']['username']))
                                echo $_SESSION['ERRORS']['username'];
                            ?>
                        </sub>
                    </div>

                    <div class="form-group">
                        <label for="email" class="font-weight-bold">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required>
                        <sub class="text-danger">
                            <?php
                            if (isset($_SESSION['ERRORS']['email']))
                                echo $_SESSION['ERRORS']['email'];
                            ?>
                        </sub>
                    </div>

                    <div class="form-group">
                        <label for="password" class="font-weight-bold">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                        <sub class="text-danger">
                            <?php
                            if (isset($_SESSION['ERRORS']['password']))
                                echo $_SESSION['ERRORS']['password'];
                            ?>
                        </sub>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password" class="font-weight-bold">Confirm Password:</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                        <sub class="text-danger">
                            <?php
                            if (isset($_SESSION['ERRORS']['confirm_password']))
                                echo $_SESSION['ERRORS']['confirm_password'];
                            ?>
                        </sub>
                    </div>

                    <div class="form-group">
                        <label for="gender" class="font-weight-bold">Gender:</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="">Select Gender</option>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="o">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="headline" class="font-weight-bold">Headline (Optional):</label>
                        <input type="text" id="headline" name="headline" class="form-control" placeholder="Brief headline about yourself">
                    </div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit" value="signupsubmit" name="signupsubmit">Create Account</button>

                    <p class="mt-3 text-muted text-center">Already have an account? <a href="../login/" style="text-decoration: none;">Login Here</a></p>

                </form>
            </div>
            <div class="col-sm-2">

            </div>
        </div>
    </div>
</body>

<?php
include '../assets/layouts/footer.php'
?>