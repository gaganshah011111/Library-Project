<?php
// Additional performance optimizations
// Add to your admin/functions.php or create as separate file

/**
 * Database connection with connection pooling
 */
function getOptimizedConnection() {
    static $connection = null;
    
    if ($connection === null) {
        $connection = mysqli_connect("localhost", "root", "", "gndpolyo_web");
        
        if (!$connection) {
            throw new Exception("Database connection failed: " . mysqli_connect_error());
        }
        
        // Set charset for security
        mysqli_set_charset($connection, "utf8");
        
        // Optimize MySQL settings for this connection
        mysqli_query($connection, "SET SESSION query_cache_type = ON");
        mysqli_query($connection, "SET SESSION query_cache_size = 1048576"); // 1MB
    }
    
    return $connection;
}

/**
 * Paginated results function
 */
function getPaginatedResults($table, $page = 1, $per_page = 10, $where_clause = "") {
    $connection = getOptimizedConnection();
    
    $offset = ($page - 1) * $per_page;
    $where = $where_clause ? "WHERE $where_clause" : "";
    
    $query = "SELECT * FROM $table $where LIMIT $per_page OFFSET $offset";
    $result = mysqli_query($connection, $query);
    
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    // Get total count for pagination
    $count_query = "SELECT COUNT(*) as total FROM $table $where";
    $count_result = mysqli_query($connection, $count_query);
    $total = mysqli_fetch_assoc($count_result)['total'];
    
    return [
        'data' => $data,
        'total' => $total,
        'page' => $page,
        'per_page' => $per_page,
        'total_pages' => ceil($total / $per_page)
    ];
}

/**
 * Compressed image loading
 */
function getCompressedImage($image_path, $max_width = 800, $quality = 80) {
    $cache_dir = 'cache/images/';
    if (!file_exists($cache_dir)) {
        mkdir($cache_dir, 0755, true);
    }
    
    $filename = basename($image_path);
    $cached_file = $cache_dir . $max_width . '_' . $quality . '_' . $filename;
    
    if (file_exists($cached_file)) {
        return $cached_file;
    }
    
    // Create compressed version (requires GD library)
    if (function_exists('imagecreatefromjpeg')) {
        $source = imagecreatefromjpeg($image_path);
        $width = imagesx($source);
        $height = imagesy($source);
        
        if ($width > $max_width) {
            $new_width = $max_width;
            $new_height = ($height * $max_width) / $width;
            
            $compressed = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($compressed, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            
            imagejpeg($compressed, $cached_file, $quality);
            
            imagedestroy($source);
            imagedestroy($compressed);
            
            return $cached_file;
        }
    }
    
    return $image_path;
}
?>