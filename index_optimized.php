<?php
include 'header.php';
include 'cached_functions.php'; // Include our optimized functions
?>
<title>GNDPC HOME</title>

<?php
// Only load data when explicitly requested (lazy loading)
$load_slider = isset($_GET['load_slider']) ? true : false;
$load_news = isset($_GET['load_news']) ? true : false;

if ($load_slider) {
    $slider = getGalleryImagesCached('9','slider','sliderY');
    // Initialize slider array properly
    for ($arr=0; $arr < 1; $arr++) {
        for ($arr1=0; $arr1 < 10; $arr1++) {
            if(!isset($slider[$arr][$arr1])){
                $slider[$arr][$arr1] = '';
            }
        }
    }
} else {
    $slider = array(); // Empty array for placeholder
}

if ($load_news) {
    /*News data call from db*/
    $news = getNewsCached();
    for ($arr=0; $arr < 1; $arr++) {
        for ($arr1=0; $arr1 < 10; $arr1++) {
            if(!isset($news[$arr][$arr1])){
                $news[$arr][$arr1] = '&nbsp;';
            }
        }
    }
} else {
    $news = array(); // Empty array for placeholder
}
/*News data call from db end*/
?>

<!-- Optimized Slider Section -->
<div class="container-fluid">
    <?php if (!$load_news): ?>
    <!-- Lightweight news placeholder -->
    <div class="row m-0 p-0 position-absolute scrollingNewsCont">
        <div class="alert m-0 p-1 scrollingNews">
            <div class="text-center">
                <button onclick="loadNews()" class="btn btn-sm btn-primary">Load Latest News</button>
            </div>
        </div>
    </div>
    <?php else: ?>
    <!-- Full news section -->
    <div class="row m-0 p-0 position-absolute scrollingNewsCont">
        <div class="alert m-0 p-1 scrollingNews">
            <marquee class="w-100">
            <?php 
            foreach (array_reverse($news) as $new) {
                echo '<span class="important">'.$new[3].'</span> ['.dateFormat($new[1]).']  '.$new[2].' <a target="_blank" href="//'.$new[5].'">'.$new[4].'</a>&nbsp;&nbsp;,   ';
            }
            ?>
            </marquee>
        </div>
    </div>
    <?php endif; ?>

    <?php if (!$load_slider): ?>
    <!-- Lightweight slider placeholder -->
    <div class="text-center py-5 bg-light">
        <h3>Image Slider</h3>
        <button onclick="loadSlider()" class="btn btn-primary">Load Image Slider</button>
    </div>
    <?php else: ?>
    <!-- Full slider section -->
    <div id="imageslider" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
        <?php
        $SliderCount=0;
        foreach ($slider as $image) {
            if ($SliderCount==0) {
                echo '<li data-target="#imageslider" data-slide-to="'.$SliderCount.'" class="active"></li>';
            }
            else{
                echo '<li data-target="#imageslider" data-slide-to="'.$SliderCount.'"></li>';
            }
            $SliderCount++;
        }
        ?>
        </ul>
        <div class="carousel-inner">
        <?php
        $SliderCount=0;
        foreach ($slider as $compressedimage) {
            if ($SliderCount==0) {
                echo '<div class="carousel-item active">
                    <img src="img/images/fixSlider.png" style="background:url('.$compressedimage[2].');">
                    <div class="carousel-caption slider-text">
                        <h2>'.$compressedimage[7].'</h2>
                        <p>'.$compressedimage[8].'</p>
                    </div>
                </div>';
            }
            else{
                echo '<div class="carousel-item">
                    <img src="img/images/fixSlider.png" style="background:url('.$compressedimage[2].');">
                    <div class="carousel-caption slider-text">
                        <h2>'.$compressedimage[7].'</h2>
                        <p>'.$compressedimage[8].'</p>
                    </div>
                </div>';
            }
            $SliderCount++;
        }
        ?>
        </div>
        <a class="carousel-control-prev" href="#imageslider" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#imageslider" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <?php endif; ?>
</div>

<script>
function loadNews() {
    window.location.href = '?page=home&load_news=1';
}

function loadSlider() {
    window.location.href = '?page=home&load_slider=1';
}

// Auto-load after 2 seconds if user stays on page (optional)
// setTimeout(function() {
//     if (!<?php echo $load_news ? 'true' : 'false'; ?>) {
//         loadNews();
//     }
// }, 2000);
</script>

<?php
// Continue with the rest of your original index.php content here
// But make sure to load it conditionally or with lazy loading
?>