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
                    echo "<li><a href='2_programflow/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Arrays</h2>
            <ul>
                <?php
                for ($i = 23; $i <= 33; $i++) {
                    echo "<li><a href='3_arrays/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Functions</h2>
            <ul>
                <?php
                for ($i = 34; $i <= 44; $i++) {
                    echo "<li><a href='4_functions/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Forms</h2>
            <ul>
                <?php
                for ($i = 45; $i <= 53; $i++) {
                    echo "<li><a href='5_forms/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>String Manipulation</h2>
            <ul>
                <?php
                for ($i = 54; $i <=82 ; $i++) {
                    echo "<li><a href='6_string_manipulation/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Objects</h2>
            <ul>
                <?php
                for ($i = 0; $i <=0 ; $i++) {
                    echo "<li><a href='7_objects/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Files</h2>
            <ul>
                <?php
                for ($i = 0; $i <=0 ; $i++) {
                    echo "<li><a href='8_files/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Database</h2>
            <ul>
                <?php
                for ($i = 0; $i <=0 ; $i++) {
                    echo "<li><a href='9_database/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Cookies Session</h2>
            <ul>
                <?php
                for ($i = 0; $i <=0 ; $i++) {
                    echo "<li><a href='10_cookies_sessions/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>MVC model</h2>
            <ul>
                <?php
                for ($i = 0; $i <=0 ; $i++) {
                    echo "<li><a href='11_mvc_model/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</body>

</html>