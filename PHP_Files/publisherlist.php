<html>
<head>
    <title>Publisher List</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<body>
<main class="main-container">
<?php
    echo "<h1>Publisher List</h1>";
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
<p><a href="insertpublisher.php">Add New Publisher</a></p>
<p><a href="updatepublisher.php">Update Publisher Information</a></p>
<p><a href="deletepublisher.php">Remove Publisher From Database</a></p>
<p><a href="../index.html">Back to Home</a></p>
</main>
</body>
</html>