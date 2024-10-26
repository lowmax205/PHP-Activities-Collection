<?php
session_start();

// Redirect to login if the user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Display success message if present
if (isset($_GET['success'])) {
    $success_message = htmlspecialchars($_GET['success']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity List</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        header {
            background: linear-gradient(90deg, #4caf50, #81c784);
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 2em;
        }

        header form {
            display: inline;
            margin-left: 20px;
        }

        header button {
            background-color: #e53935;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        header button:hover {
            background-color: #d32f2f;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .column {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .column:hover {
            transform: translateY(-5px);
        }

        .column h2 {
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 10px;
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
            color: #4caf50;
            transition: color 0.3s ease;
        }

        .column ul li a:hover {
            text-decoration: underline;
            color: #388e3c;
        }
    </style>
</head>

<body>
    <header>
        <h1>Activity List</h1>
        <form action="logout.php" method="POST" style="display: inline;">
            <button type="submit">Logout</button>
        </form>
    </header>
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
                for ($i = 54; $i <= 82; $i++) {
                    echo "<li><a href='6_string_manipulation/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Objects</h2>
            <ul>
                <?php
                for ($i = 82; $i <= 106; $i++) {
                    echo "<li><a href='7_objects/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Files</h2>
            <ul>
                <?php
                for ($i = 0; $i <= 0; $i++) {
                    echo "<li><a href='8_files/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Database</h2>
            <ul>
                <?php
                for ($i = 0; $i <= 0; $i++) {
                    echo "<li><a href='9_database/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Cookies Session</h2>
            <ul>
                <?php
                for ($i = 0; $i <= 0; $i++) {
                    echo "<li><a href='10_cookies_sessions/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>MVC model</h2>
            <ul>
                <?php
                for ($i = 0; $i <= 0; $i++) {
                    echo "<li><a href='11_mvc_model/activity$i.php'>Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</body>

</html>