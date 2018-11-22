<html>
<head>
    <title>Developer List</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<body>
<main class="main-container">
<?php
    echo "<h1>Developer List</h1>";
?>
<?php
    $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
    if(!$db_server)
        die("Unable to connect to MySQL: " . mysql_error());
    if(!mysql_select_db('ethan_RYO'))
        die('Unable to select database: ' . mysql_error());
    $query = "SELECT * FROM DEVELOPER";

    $result = mysql_query($query);
    if(!result)
        die("Unable to execute query: " . mysql_error());
    
    echo "<table border=\"1\">";
    echo "<tr><th>DeveloperName</th><th>Location</th><th>Employees</th><th>PublisherName</th></tr>\n";

    $rows = mysql_num_rows($result);
    for($r = 0; $r < $rows; $r++){
        echo "<tr>";
        for($c = 0; $c < 4; $c++){
            echo "<td>" . mysql_result($result, $r, $c) . "</td>";
        }
        echo "</tr>\n";
    }
    echo "</table>\n";

    mysql_close($db_server);
?>
<p><a href="insertdeveloper.php">Add New Developer</a></p>
<p><a href="updatedeveloper.php">Update Developer Information</a></p>
<p><a href="deletedeveloper.php">Remove Developer From Database</a></p>
<p><a href="../index.html">Back to Home</a></p>
</main>
</body>
</html>