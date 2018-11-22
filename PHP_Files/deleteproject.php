<html>
<head>
    <title>Remove Project Form</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<body>
<main class="main-container">
<?php
    echo "<h1>Delete Project Form</h1>";
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
<?php
    if(isset($_GET['projectname'])){
        $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
        if(!$db_server)
            die("Unable to connect to MySQL: " . mysql_error());
        if(!mysql_select_db("ethan_RYO"))
            die("Unable to select database: " . mysql_error());
        $project_name = $_GET['projectname'];
        
        $query = "DELETE FROM GAME_PROJECT WHERE ProjectName = '$project_name'";

        $result = mysql_query($query);
        if(!$result)
            die("Unable to execute query: " . mysql_error());
        
            mysql_close($db_server);
    }
?>

<form action="deleteproject.php">
    <p><input type="text" name="projectname"></p>
    <p><input type="submit" value="Remove Project From Database"></p>
</form>
<p><a href="gameprojectlist.php">List Current Projects</a></p>
<p><a href="deleteproject.php">Refresh Table on Current Page</a></p>
<p><a href="../index.html">Back to Home</a></p>
</main>
</body>
</html>