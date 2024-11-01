<?php
if (isset($_GET['folder']) && isset($_GET['file'])) {
    $folder = basename($_GET['folder']); // Get the folder name safely
    $file = basename($_GET['file']); // Get the file name safely
    $path = $folder . "/" . $file; // Construct the path dynamically

    if (file_exists($path)) {
        header('Content-Type: text/plain'); // Set content type to plain text
        echo htmlspecialchars(file_get_contents($path)); // Read and output the file content
    } else {
        echo 'File not found.';
    }
} else {
    echo 'No folder or file specified.';
}
?>