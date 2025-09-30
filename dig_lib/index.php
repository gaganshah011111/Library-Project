<?php
include '../header.php';
?>
<title>GNDPC - Digital Library</title>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="text-center py-5">
                <h1 class="display-4 text-primary">Digital Library</h1>
                <p class="lead">Access digital resources and online materials</p>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="fas fa-book-open text-primary fa-3x mb-3"></i>
                                    <h5 class="card-title">E-Books</h5>
                                    <p class="card-text">Access thousands of digital books across various subjects</p>
                                    <a href="home/?section=ebooks" class="btn btn-primary">Browse E-Books</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="fas fa-newspaper text-success fa-3x mb-3"></i>
                                    <h5 class="card-title">Online Journals</h5>
                                    <p class="card-text">Latest research papers and academic journals</p>
                                    <a href="home/?section=journals" class="btn btn-success">View Journals</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="fas fa-video text-warning fa-3x mb-3"></i>
                                    <h5 class="card-title">Video Lectures</h5>
                                    <p class="card-text">Educational videos and online courses</p>
                                    <a href="home/?section=videos" class="btn btn-warning">Watch Videos</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="fas fa-database text-info fa-3x mb-3"></i>
                                    <h5 class="card-title">Digital Archives</h5>
                                    <p class="card-text">Historical documents and archived materials</p>
                                    <a href="home/?section=archives" class="btn btn-info">Explore Archives</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <a href="../" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Main Library
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../footer.php';
            
            const timer = setInterval(function() {
                countdown--;
                countdownElement.textContent = countdown;
                
                if (countdown <= 0) {
                    clearInterval(timer);
                    window.location.href = "home/";
                }
            }, 1000);
        </script>
    </body>
    </html>
    <?php
} else {
    // Show digital library landing page instead of auto-redirect
    ?>
    <html>
    <head>
        <title>Digital Library</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>Digital Library</h1>
                    <p class="lead">Welcome to the Digital Library System</p>
                    <a href="home/" class="btn btn-primary btn-lg">Enter Digital Library</a>
                    <a href="../" class="btn btn-outline-secondary btn-lg">Back to Main Site</a>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
}
?>