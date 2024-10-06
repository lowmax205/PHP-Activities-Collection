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
    }

    .column {
        border: 2px solid black;
        padding: 20px;
        width: 13%;
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
                for ($i = 1; $i <= 13; $i++) {
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
                for ($i = 33; $i <= 43; $i++) {
                    echo "<li><a href='functions/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Forms</h2>
            <ul>
                <?php
                for ($i = 43; $i <= 53; $i++) {
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