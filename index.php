<?php
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
        <div class="column">
            <h2>Basic PHP</h2>
            <ul>
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    echo "<li><a href='1_basicphp/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Program Flow</h2>
            <ul>
                <?php
                for ($i = 13; $i <= 22; $i++) {
                    echo "<li><a href='programflow/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Arrays</h2>
            <ul>
                <?php
                for ($i = 23; $i <= 33; $i++) {
                    echo "<li><a href='arrays/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Functions</h2>
            <ul>
                <?php
                for ($i = 34; $i <= 44; $i++) {
                    echo "<li><a href='functions/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Forms</h2>
            <ul>
                <?php
                for ($i = 45; $i <= 53; $i++) {
                    echo "<li><a href='forms/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>String Manipulation</h2>
            <ul>
                <?php
                for ($i = 53; $i <=77 ; $i++) {
                    echo "<li><a href='string_manipulation/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</body>

</html>