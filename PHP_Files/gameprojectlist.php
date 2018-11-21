<html>
<head>
    <title>Game Project List</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<body>
<main class="main-container">
<?php
    echo "<h1>Game Project List</h1>";
?>
<?php
    $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
    if(!$db_server)
        die("Unable to connect to MySQL: " . mysql_error());
    if(!mysql_select_db('ethan_RYO'))
        die('Unable to select database: ' . mysql_error());
    $query = "SELECT ProjectName, StartDate, EndDate, DEVELOPER.DeveloperName, PUBLISHER.PublisherName FROM PUBLISHER, DEVELOPER, GAME_PROJECT WHERE DEVELOPER.PublisherName = PUBLISHER.PublisherName AND GAME_PROJECT.DeveloperName = DEVELOPER.DeveloperName";

    $result = mysql_query($query);
    if(!result)
        die("Unable to execute query: " . mysql_error());
    
    echo "<table border=\"1\">";
    echo "<tr><th>ProjectName</th><th>StartDate</th><th>EndDate</th><th>DeveloperName</th><th>PublisherName</th></tr>\n";

    $rows = mysql_num_rows($result);
    for($r = 0; $r < $rows; $r++){
        echo "<tr>";
        for($c = 0; $c < 5; $c++){
            echo "<td>" . mysql_result($result, $r, $c) . "</td>";
        }
        echo "</tr>\n";
    }
    echo "</table>\n";
?>
<p><a href="insertproject.php">Add New Project</a></p>
<p><a href="updateproject.php">Update Project Information</a></p>
<p><a href="deleteproject.php">Remove Project From Database</a></p>
<p><a href="../index.html">Back to Home</a></p>
</main>
</body>
</html>