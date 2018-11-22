<html>
<head>
    <title>Remove Publisher Form</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<body>
<main class="main-container">
<?php
    echo "<h1>Remove Publisher Form</h1>";
?>
<?php
    $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
    if(!$db_server)
        die("Unable to connect to MySQL: " . mysql_error());
    if(!mysql_select_db('ethan_RYO'))
        die('Unable to select database: ' . mysql_error());
    $query = "SELECT * FROM PUBLISHER";

    $result = mysql_query($query);
    if(!result)
        die("Unable to execute query: " . mysql_error());
    
    echo "<table border=\"1\">";
    echo "<tr><th>PublisherName</th><th>Location</th><th>Employees</th></tr>\n";

    $rows = mysql_num_rows($result);
    for($r = 0; $r < $rows; $r++){
        echo "<tr>";
        for($c = 0; $c < 3; $c++){
            echo "<td>" . mysql_result($result, $r, $c) . "</td>";
        }
        echo "</tr>\n";
    }
    echo "</table>\n";

    mysql_close($db_server);
?>
<?php
    if(isset($_GET['publishername'])){
        $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
        if(!$db_server)
            die("Unable to connect to MySQL: " . mysql_error());
        if(!mysql_select_db("ethan_RYO"))
            die("Unable to select database: " . mysql_error());
        $publisher_name = $_GET['publishername'];
        
        $query = "DELETE FROM PUBLISHER WHERE PublisherName = $publisher_name";

        $result = mysql_query($query);
        if(!$result)
            die("Unable to execute query: " . mysql_error());
        
            mysql_close($db_server);
    }
?>
<form action="deletepublisher.php">
    <p>Publisher Name: <input type="text" name="publishername"></p>
    <p><input type="submit" value="Remove Publisher From Table"></p>
</form>
<p><a href="publisherlist.php">List Current Publishers</a></p>
<p><a href="deletepublisher.php">Refresh Table on Current Page</a></p>
<p><a href="../index.html">Back to Home</a></p>
</main>
</body>
</html>