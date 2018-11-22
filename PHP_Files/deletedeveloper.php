<html>
<head>
    <title>Remove Developer Form</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<body>
<main class="main-container">
<?php
    echo "<h1>Remove Developer Form</h1>";
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
<?php
    if(isset($_GET['developername'])){
        $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
        if(!$db_server)
            die("Unable to connect to MySQL: " . mysql_error());
        if(!mysql_select_db("ethan_RYO"))
            die("Unable to select database: " . mysql_error());
        $developer_name = $_GET['developername'];
        
        $query = "DELETE FROM DEVELOPER WHERE DeveloperName = $developer_name";

        $result = mysql_query($query);
        if(!$result)
            die("Unable to execute query: " . mysql_error());
        
            mysql_close($db_server);
    }
?>
<form action="deletedeveloper.php">
    <p>Developer Name: <input type="text" name="developername"></p>
    <p><input type="submit" value="Remove Developer From Database"></p>
</form>
<p><a href="developerlist.php">List Current Developers</a></p>
<p><a href="deletedeveloper.php">Refresh Table on Current Page</a></p>
<p><a href="../index.html">Back to Home</a></p>
</main>
</body>
</html>