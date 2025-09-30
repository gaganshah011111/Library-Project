<?php
session_start();

define('TITLE', "Account Verification");
include '../assets/layouts/header.php';
check_logged_out();
?>

<style>
    .prevent-select {
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    body::-webkit-scrollbar {
        width: 8px;
    }
    body::-webkit-scrollbar-track {
        background: grey;
    }
    body::-webkit-scrollbar-thumb {
        background-color: blue;
        border-radius: 15px;
    }
</style>

<body oncontextmenu="return false" class="prevent-select">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="shadow-lg box-shadow col-sm-7 px-5 m-5 bg-light rounded align-self-center verify-message mx-auto">
                    <?php include('../assets/layouts/profile-card.php'); ?>
                    
                    <div class="row">
                        <div class="col-12">
                            <h5 class="text-center mb-5 text-primary">Account Verification</h5>
                            
                            <div class="text-center">
                                <div class="alert alert-success">
                                    <h6>Your account has been automatically verified!</h6>
                                    <p>You can now login with your credentials.</p>
                                </div>
                                
                                <a href="../login/" class="btn btn-primary">
                                    <i class="fas fa-sign-in-alt"></i> Go to Login
                                </a>
                            </div>
                            
                            <small class="form-text text-success">
                                <?php
                                if (isset($_SESSION['STATUS']['verify']))
                                    echo $_SESSION['STATUS']['verify'];
                                ?>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>