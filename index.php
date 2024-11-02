<?php
session_start();
// Redirect to login if the user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: userLogin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity List</title>
    <link rel="stylesheet" href="css/activty_style.css">
    <link rel="stylesheet" href="css/popup_style.css">
    <script src="js/phpViewer.js"></script>
</head>

<body>
    <header>
        <h1>Activity List</h1>
        <?php if (isset($_SESSION['username'])): ?>
            <p>Welcome <?php echo htmlspecialchars($_SESSION['username']); ?>
                <?php echo htmlspecialchars($_SESSION['role_text']); ?>
            </p>
        <?php endif; ?>
        <form action="server/logout.server.php" method="POST" style="display: inline;">
            <button type="submit">Logout</button>
        </form>
        <?php if ($_SESSION['role_text'] === 'teacher'): ?>
            <form action="userDatabaseDashboard.php" method="GET" style="display: inline;">
                <button type="submit">Database</button>
            </form>
        <?php endif; ?>

    </header>
    <div class="container">
        <div class="column">
            <h2>Basic PHP</h2>
            <ul>
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    echo "<a href='1_basicphp/activity$i.php'><li onmouseover=\"fetchContent('1_basicphp','activity$i.php', event)\" onmouseout=\"hideTooltip()\">Activity #$i</li></a>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Program Flow</h2>
            <ul>
                <?php
                for ($i = 13; $i <= 22; $i++) {
                    echo "<a href='2_programflow/activity$i.php'><li onmouseover=\"fetchContent('2_programflow','activity$i.php', event)\" onmouseout=\"hideTooltip()\">Activity #$i</li></a>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Arrays</h2>
            <ul>
                <?php
                for ($i = 23; $i <= 33; $i++) {
                    echo "<a href='3_arrays/activity$i.php'><li onmouseover=\"fetchContent('3_arrays','activity$i.php', event)\" onmouseout=\"hideTooltip()\">Activity #$i</li></a>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Functions</h2>
            <ul>
                <?php
                for ($i = 34; $i <= 44; $i++) {
                    echo "<a href='4_functions/activity$i.php'><li onmouseover=\"fetchContent('4_functions','activity$i.php', event)\" onmouseout=\"hideTooltip()\">Activity #$i</li></a>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Forms</h2>
            <ul>
                <?php
                for ($i = 45; $i <= 53; $i++) {
                    echo "<a href='5_forms/activity$i.php'><li onmouseover=\"fetchContent('5_forms','activity$i.php', event)\" onmouseout=\"hideTooltip()\">Activity #$i</li></a>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>String Manipulation</h2>
            <ul>
                <?php
                for ($i = 54; $i <= 82; $i++) {
                    echo "<a href='6_string_manipulation/activity$i.php'><li onmouseover=\"fetchContent('6_string_manipulation','activity$i.php', event)\" onmouseout=\"hideTooltip()\">Activity #$i</li></a>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Objects</h2>
            <ul>
                <?php
                for ($i = 83; $i <= 106; $i++) {
                    echo "<a href='7_objects/activity$i.php'><li onmouseover=\"fetchContent('7_objects','activity$i.php', event)\" onmouseout=\"hideTooltip()\">Activity #$i</li></a>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Files</h2>
            <ul>
                <?php
                for ($i = 107; $i <= 131; $i++) {
                    echo "<a href='8_files/activity$i.php'><li onmouseover=\"fetchContent('8_files','activity$i.php', event)\" onmouseout=\"hideTooltip()\">Activity #$i</li></a>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Database</h2>
            <ul>
                <?php
                for ($i = 0; $i <= 0; $i++) {
                    echo "<a href='9_database/activity$i.php'><li onmouseover=\"fetchContent('9_database','activity$i.php', event)\" onmouseout=\"hideTooltip()\">Activity #$i</li></a>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Cookies Session</h2>
            <ul>
                <?php
                for ($i = 0; $i <= 0; $i++) {
                    echo "<a href='10_cookies_session/activity$i.php'><li onmouseover=\"fetchContent('10_cookies_session','activity$i.php', event)\" onmouseout=\"hideTooltip()\">Activity #$i</li></a>";
                }
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>MVC model</h2>
            <ul>
                <?php
                for ($i = 0; $i <= 0; $i++) {
                    echo "<a href='11_mvc_model/activity$i.php'><li onmouseover=\"fetchContent('11_mvc_model','activity$i.php', event)\" onmouseout=\"hideTooltip()\">Activity #$i</li></a>";
                }
                ?>
            </ul>
        </div>
    </div>
    <div id="tooltip" class="tooltip"></div>
</body>

</html>