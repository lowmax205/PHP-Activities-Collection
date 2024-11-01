<?php
if (isset($_GET['folder']) && isset($_GET['file'])) {
    $folder = basename($_GET['folder']);    
    $file = basename($_GET['file']); 
    $path = $folder . "/" . $file; 

    if (file_exists($path)) {
        header('Content-Type: text/plain'); 
        echo htmlspecialchars(file_get_contents($path)); 
    } else {
        echo 'File not found.';
    }
} else {
    echo 'No folder or file specified.';
}
?>