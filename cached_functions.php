<?php
// Optimized functions with caching
// Add these functions to your admin/functions.php or create a separate cached_functions.php

/**
 * Get gallery images with caching
 */
function getGalleryImagesCached($length, $place, $tOrf, $cache_duration = 300) {
    $cache_key = "gallery_{$place}_{$tOrf}_{$length}";
    $cache_file = "cache/{$cache_key}.json";
    
    // Check if cache exists and is still valid
    if (file_exists($cache_file) && (time() - filemtime($cache_file)) < $cache_duration) {
        return json_decode(file_get_contents($cache_file), true);
    }
    
    // If no valid cache, fetch from database
    global $conngndpc;
    $qry = "SELECT * FROM gallery WHERE $place='$tOrf' LIMIT 10"; // Add limit for performance
    $exe = mysqli_query($conngndpc, $qry);
    $array = array();
    $i = 0;
    
    while ($cont = mysqli_fetch_array($exe)) {
        for ($j = 0; $j < $length; $j++) {
            $array[$i][$j] = $cont[$j];
        }
        $i++;
    }
    
    // Save to cache
    if (!file_exists('cache')) {
        mkdir('cache', 0755, true);
    }
    file_put_contents($cache_file, json_encode($array));
    
    return $array;
}

/**
 * Get news with caching
 */
function getNewsCached($cache_duration = 300) {
    $cache_key = "news_data";
    $cache_file = "cache/{$cache_key}.json";
    
    // Check if cache exists and is still valid
    if (file_exists($cache_file) && (time() - filemtime($cache_file)) < $cache_duration) {
        return json_decode(file_get_contents($cache_file), true);
    }
    
    // If no valid cache, fetch from database
    global $conngndpc;
    $qry = "SELECT * FROM gndpcnews ORDER BY id DESC LIMIT 20"; // Add limit and order for performance
    $exe = mysqli_query($conngndpc, $qry);
    $array = array();
    $i = 0;
    
    while ($cont = mysqli_fetch_array($exe)) {
        for ($j = 0; $j < 6; $j++) {
            $array[$i][$j] = $cont[$j];
        }
        $i++;
    }
    
    // Save to cache
    if (!file_exists('cache')) {
        mkdir('cache', 0755, true);
    }
    file_put_contents($cache_file, json_encode($array));
    
    return $array;
}

/**
 * Clear all cache files
 */
function clearCache() {
    $cache_dir = 'cache';
    if (is_dir($cache_dir)) {
        $files = glob($cache_dir . '/*.json');
        foreach ($files as $file) {
            unlink($file);
        }
    }
}
?>