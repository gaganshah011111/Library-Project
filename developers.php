<?php
include '/header.php';
?>
<title>GNDPC - Developers</title>
<style>
.developer-card {
    background: #fff; /* white background */
    padding: 40px 20px;
    margin: 40px 0;
    border-radius: 20px;
    color: #222;
    text-align: center;
    box-shadow: 0 4px 24px rgba(0,0,0,0.08); /* subtle shadow for card */
}

.developer-title {
    font-size: 3rem;
    font-weight: bold;
    margin-bottom: 30px;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    color: #333;
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
    background: #222; /* solid black */
    color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
    border: 2px solid #444;
}

.flip-card-back {
    background: #333; /* dark gray */
    color: #fff;
    transform: rotateY(180deg);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
    border: 2px solid #555;
}

.developer-img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 4px solid #eee;
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
    opacity: 0.85;
}

.developer-info {
    font-size: 0.95rem;
    line-height: 1.6;
}

.social-links {
    margin-top: 15px;
}

.social-links a {
    color: #fff;
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

<div class="container-fluid" style="background:#fff !important; min-height:100vh;">
    <div class="developer-card">
        <h1 class="developer-title">
            <i class="fas fa-code"></i> DEVELOPERS
        </h1>
        <div class="developers-container">
            <!-- Developer 1 -->
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="img/images/person.jpg" alt="Developer 1" class="developer-img"
                             onerror="this.src='https://via.placeholder.com/120x120/222/ffffff?text=DEV1'">
                        <h3 class="developer-name">Rajesh Kumar</h3>
                        <p class="developer-role">Lead Full Stack Developer</p>
                        <div class="developer-info">
                            <i class="fas fa-laptop-code"></i>
                            <p>Frontend & Backend Specialist</p>
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <h3 class="developer-name">Rajesh Kumar</h3>
                        <div class="developer-info">
                            <p><i class="fas fa-envelope"></i> rajesh.kumar@gndpoly.org</p>
                            <p><i class="fas fa-phone"></i> +91 98765 43210</p>
                            <p><i class="fas fa-map-marker-alt"></i> Ludhiana, Punjab</p>
                            <p><i class="fas fa-graduation-cap"></i> B.Tech CSE</p>
                            <p><i class="fas fa-code"></i> PHP, JavaScript, MySQL</p>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-github"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Developer 2 -->
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="img/images/default1.jpg" alt="Developer 2" class="developer-img"
                             onerror="this.src='https://via.placeholder.com/120x120/333/ffffff?text=DEV2'">
                        <h3 class="developer-name">Priya Sharma</h3>
                        <p class="developer-role">UI/UX Designer & Frontend Developer</p>
                        <div class="developer-info">
                            <i class="fas fa-paint-brush"></i>
                            <p>Design & Frontend Expert</p>
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <h3 class="developer-name">Priya Sharma</h3>
                        <div class="developer-info">
                            <p><i class="fas fa-envelope"></i> priya.sharma@gndpoly.org</p>
                            <p><i class="fas fa-phone"></i> +91 98765 43211</p>
                            <p><i class="fas fa-map-marker-alt"></i> Ludhiana, Punjab</p>
                            <p><i class="fas fa-graduation-cap"></i> B.Tech IT</p>
                            <p><i class="fas fa-palette"></i> HTML, CSS, Bootstrap, React</p>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-github"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <p style="font-size: 1.1rem; opacity: 0.8; color: #666;">
                <i class="fas fa-heart" style="color: #ff6b6b;"></i> 
                Built with passion for GNDPC Library Management System
            </p>
        </div>
    </div>
</div>
<?php
include 'footer.php';