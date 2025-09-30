<?php
include 'header.php';
?>
<title>GNDPC - Welcome</title>

<div class="container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100" style="background:#fff;">
        <div class="col-12 text-center py-5">
            <h1 class="display-4 mb-3 fw-bold">Welcome to GNDPC Library</h1>
            <p class="lead mb-4">Your Gateway to Knowledge and Learning</p>
            <div class="d-flex justify-content-center gap-4 mb-5 flex-wrap">
                <a href="?page=library" class="btn btn-success btn-lg px-5 py-3 rounded-pill d-flex align-items-center gap-2 shadow-sm">
                    <i class="fas fa-book"></i> Library
                </a>
                <a href="?page=admin" class="btn btn-warning btn-lg px-5 py-3 rounded-pill d-flex align-items-center gap-2 shadow-sm">
                    <i class="fas fa-cog"></i> Admin Panel
                </a>
            </div>

            <!-- Student Corner Section -->
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white text-center">
                            <h4 class="mb-0">Student Corner</h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="list-group list-group-flush">
                                <a href="?page=library&library=rules" class="list-group-item list-group-item-action d-flex align-items-center">
                                    <i class="fas fa-arrow-right text-primary me-3"></i>
                                    <span>Rules and Regulations</span>
                                </a>
                                <a href="?page=library&library=books" class="list-group-item list-group-item-action d-flex align-items-center">
                                    <i class="fas fa-arrow-right text-primary me-3"></i>
                                    <span>Book Details</span>
                                </a>
                                <a href="?page=library&library=papers" class="list-group-item list-group-item-action d-flex align-items-center">
                                    <i class="fas fa-arrow-right text-primary me-3"></i>
                                    <span>Question Papers</span>
                                </a>
                                <a href="StuWebPortal/" class="list-group-item list-group-item-action d-flex align-items-center">
                                    <i class="fas fa-arrow-right text-primary me-3"></i>
                                    <span>Student Web Portal</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Developer Card Section -->
            <div class="row justify-content-center mt-5">
                <div class="col-12">
                    <style>
                   

                    .developer-title {
                        font-size: 3rem;
                        font-weight: bold;
                        margin-bottom: 30px;
                        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
                    }

                    .flip-card {
                        background-color: transparent;
                        width: 300px;
                        height: 400px;
                        perspective: 1000px;
                        margin: 20px;
                    }

                    .flip-card-inner {
                        position: relative;
                        width: 100%;
                        height: 100%;
                        text-align: center;
                        transition: transform 0.6s;
                        transform-style: preserve-3d;
                    }

                    .flip-card:hover .flip-card-inner {
                        transform: rotateY(180deg);
                    }

                    .flip-card-front, .flip-card-back {
                        position: absolute;
                        width: 100%;
                        height: 100%;
                        -webkit-backface-visibility: hidden;
                        backface-visibility: hidden;
                        border-radius: 15px;
                        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
                    }

                    .flip-card-front {
                        background: linear-gradient(45deg, #3498db, #2c3e50);
                        color: white;
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        padding: 20px;
                    }

                    .flip-card-back {
                        background: linear-gradient(45deg, #e74c3c, #c0392b);
                        color: white;
                        transform: rotateY(180deg);
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        padding: 20px;
                    }

                    .developer-img {
                        width: 120px;
                        height: 120px;
                        border-radius: 50%;
                        border: 4px solid white;
                        margin-bottom: 20px;
                        object-fit: cover;
                        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
                    }

                    .developer-name {
                        font-size: 1.5rem;
                        font-weight: bold;
                        margin-bottom: 10px;
                    }

                    .developer-role {
                        font-size: 1rem;
                        margin-bottom: 15px;
                        opacity: 0.9;
                    }

                    .developer-info {
                        font-size: 0.9rem;
                        line-height: 1.6;
                    }

                    .social-links {
                        margin-top: 15px;
                    }

                    .social-links a {
                        color: white;
                        font-size: 1.5rem;
                        margin: 0 10px;
                        text-decoration: none;
                        transition: opacity 0.3s;
                    }

                    .social-links a:hover {
                        opacity: 0.7;
                    }

                    .developers-container {
                        display: flex;
                        justify-content: center;
                        flex-wrap: wrap;
                        gap: 20px;
                    }

                    @media (max-width: 768px) {
                        .flip-card {
                            width: 280px;
                            height: 380px;
                            margin: 10px;
                        }
                        
                        .developer-title {
                            font-size: 2rem;
                        }
                    }
                    </style>

                    <div class="developer-card">
                        <h1 class="developer-title">
                            <i class="fas fa-code"></i> DEVELOPERS
                        </h1>
                        
                        <div class="developers-container">
                            <!-- Developer 1 -->
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <img src="img/images/shah.png" alt="Developer 1" class="developer-img" onerror="this.src='https://via.placeholder.com/120x120/3498db/ffffff?text=DEV1'">
                                        <h3 class="developer-name">Gagan Kumar Shah</h3>
                                        <p class="developer-role">Backend Developer</p>
                                        <div class="developer-info">
                                            <i class="fas fa-laptop-code"></i>
                                            <p> Backend Specialist</p>
                                        </div>
                                    </div>
                                    <div class="flip-card-back">
                                        <h3 class="developer-name">Gagan Kumar Shah</h3>
                                        <div class="developer-info">
                                            <p><i class="fas fa-envelope"></i> gaganshah011111@gmail.com</p>
                                            <p><i class="fas fa-phone"></i> 7710665540</p>
                                            <p><i class="fas fa-map-marker-alt"></i> Ludhiana, Punjab</p>
                                            <p><i class="fas fa-graduation-cap"></i> B.Tech CSE</p>
                                            <p><i class="fas fa-code"></i> PHP, JavaScript, MySQL</p>
                                            <div class="social-links">
                                                <a href="https://github.com/gaganshah011111"><i class="fab fa-github"></i></a>
                                                <a href="https://www.linkedin.com/in/shahgagan?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="fab fa-linkedin"></i></a>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Developer 2 -->
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <img src="img/images/abhi.jpg" alt="Developer 2" class="developer-img" onerror="this.src='https://via.placeholder.com/120x120/e74c3c/ffffff?text=DEV2'">
                                        <h3 class="developer-name">Abhishek Pandey</h3>
                                        <p class="developer-role">UI/UX Designer & Frontend Developer</p>
                                        <div class="developer-info">
                                            <i class="fas fa-paint-brush"></i>
                                            <p>Design & Frontend Expert</p>
                                        </div>
                                    </div>
                                    <div class="flip-card-back">
                                        <h3 class="developer-name">Abhishek Pandey</h3>
                                        <div class="developer-info">
                                            <p><i class="fas fa-envelope"></i> critical2315@gmail.com</p>
                                            <p><i class="fas fa-phone"></i> 7528993358</p>
                                            <p><i class="fas fa-map-marker-alt"></i> Ludhiana, Punjab</p>
                                            <p><i class="fas fa-graduation-cap"></i> B.Tech CSE</p>
                                            <p><i class="fas fa-palette"></i> HTML, CSS, Bootstrap, JavaScript</p>
                                            <div class="social-links">
                                                <a href="#"><i class="fab fa-github"></i></a>
                                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <p style="font-size: 1.1rem; opacity: 0.9;">
                                <i class="fas fa-heart" style="color: #ff6b6b;"></i> 
                                Built with passion for GNDPC Library Management System
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>