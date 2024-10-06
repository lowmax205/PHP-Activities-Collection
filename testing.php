<?php
// Manually define the folder names and order
$folders = [
    '1_basicphp',
    '2_programflow',
    '3_arrays',
    '4_functions',
    '5_forms',
    '6_string_manipulation',
    '7_objects',
    '8_files',
    '9_database',
    '10_cookies_sessions',
    '11_mvc_model'
];

$parent_dir = "D:/xampp/htdocs/CS311-Php-Activity/";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity List</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        display: flex;
        justify-content: space-around;
        padding: 10px;
        flex-wrap: wrap;
    }

    .column {
        border: 2px solid black;
        padding: 20px;
        width: 20%;
        margin-bottom: 20px;
    }

    .column h2 {
        text-align: center;
    }

    .column ul {
        list-style-type: none;
        padding: 0;
    }

    .column ul li {
        margin: 10px 0;
    }

    .column ul li a {
        text-decoration: none;
        color: black;
    }

    .column ul li a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <div class="container">
        <?php
        // Loop through each folder in the manually defined order
        foreach ($folders as $folder_name) {
            $folder_path = $parent_dir . $folder_name;

            echo "<div class='column'>";
            echo "<h2>" . ucfirst(str_replace('_', ' ', $folder_name)) . "</h2>";  // Capitalize and format folder name
            echo "<ul>";

            // Scan the folder for files matching the pattern 'activity*.php'
            $activity_files = glob($folder_path . '/activity*.php');

            // Sort files using natural sorting to ensure numeric order
            natsort($activity_files);

            // Loop through and display each activity
            foreach ($activity_files as $activity_file) {
                // Get the activity number from the file name
                preg_match('/activity(\d+)\.php$/', basename($activity_file), $matches);
                if (isset($matches[1])) {
                    $activity_number = $matches[1];
                    echo "<li><a href='" . $folder_name . "/activity$activity_number.php'>Activity #$activity_number</a></li>";
                }
            }
            echo "</ul>";
            echo "</div>";
        }
        ?>
    </div>
</body>

</html>