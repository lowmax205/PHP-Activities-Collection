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
    <style>
    /* Add styles for the tooltip */
    .tooltip {
        display: none;
        position: absolute;
        background-color: black;
        /* Change background to black */
        color: white;
        /* Change text color to white */
        border: 1px solid #ccc;
        padding: 10px;
        z-index: 1000;
        white-space: pre-wrap;
        /* Preserve whitespace for code */
        min-width: 300px;
        /* Set minimum width */
        min-height: 300px;
        /* Set minimum height */
        overflow: auto;
        /* Allow scrolling if content is too long */
    }
    </style>
    <script>
    function showTooltip(event, content) {
        const tooltip = document.getElementById('tooltip');
        tooltip.innerHTML = content;
        tooltip.style.display = 'block';
        tooltip.style.left = event.pageX + 'px';
        tooltip.style.top = event.pageY + 'px';
    }

    function hideTooltip() {
        const tooltip = document.getElementById('tooltip');
        tooltip.style.display = 'none';
    }

    function fetchContent(folder, file, event) {
        fetch(`fetch_activity.php?folder=${folder}&file=${file}`)
            .then(response => response.text())
            .then(data => {
                showTooltip(event, data);
            })
            .catch(error => console.error('Error fetching content:', error));
    }
    </script>
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
                    echo "<li><a href='1_basicphp/activity$i.php' onmouseover=\"fetchContent('1_basicphp', 'activity$i.php', event)\" onmouseout=\"hideTooltip()\">Activity #$i</a></li>";
                }
                ?>
            </ul>
        </div>
        <!-- Additional columns can be added here -->
    </div>
    <div id="tooltip" class="tooltip"></div>
</body>

</html>