<html>
<head>
    <title>Add New Publisher</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<body>
<main class="main-container">
<?php
    echo "<h1>Add New Publisher Form</h1>"
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
?>
<?php
    if(isset($_GET['publishername'])){
        $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
        if(!$db_server)
        die("Unable to connect to MySQL: " . mysql_error());
        if(!mysql_select_db('ethan_RYO'))
        die("Unable to select database: " . mysql_error());

        $publisher_name = $_GET['publishername'];
        $location = $_GET['location'];
        $employees = $_GET['employees'];
        //Build Query
        $query = "INSERT INTO PUBLISHER(PublisherName, Location, Employees)
        VALUES('$publisher_name', '$location', '$employees')";
        //Execute Query
        $result = mysql_query($query);
        if(!$result)
            die("Unable to execute query: " . mysql_error());
        //Close Database Server
        mysql_close($db_server);
    }
?>
<form action="insertpublisher.php" method="get">
    <p>Publisher Name: <input type="text" name="publishername"></p>
    <p>Location: <input type="text" name="location"></p>
    <p>Employee Count: <input type="text" name="employees"></p>
    <p><input type="submit" value="Add New Publisher"></p>
</form>
<p><a href="publisherlist.php">Current Publisher List</a></p>
<p><a href="insertpublisher.php">Refresh Table on Current Page</a></p>
<p><a href="../index.html">Back to Home</a></p>
</main>
</body>
</html>