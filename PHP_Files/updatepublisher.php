<html>
<head>
    <title>Update Publisher Form</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<body>
<main class="main-container">
<?php
    echo "<h1>Update Publisher Information Form</h1>";
?>
<?php
    $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
    if(!$db_server)
        die("Unable to connect to MySQL: " . mysql_error());
    if(!mysql_select_db('ethan_RYO'))
        die('Unable to select database: ' . mysql_error());
    $query = "SELECT * FROM GAME_PROJECT";

    $result = mysql_query($query);
    if(!result)
        die("Unable to execute query: " . mysql_error());
    
    echo "<table border=\"1\">";
    echo "<tr><th>PublisherName</th><th>DeveloperName</th><th>StartDate</th><th>EndDate</th></tr>\n";

    $rows = mysql_num_rows($result);
    for($r = 0; $r < $rows; $r++){
        echo "<tr>";
        for($c = 0; $c < 4; $c++){
            echo "<td>" . mysql_result($result, $r, $c) . "</td>";
        }
        echo "</tr>\n";
    }
    echo "</table>\n";
?>
<?php
if (isset($_GET['publishername']))
{
    //Connect to Server
    $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
    if(!$db_server)
        die("Unable to connect to MySQL: " . mysql_error());

    if(!mysql_select_db('ethan_RYO'))
        die("Unable to select database: " . mysql_error());

    $publisher_name = $_GET['publishername'];
    $new_publisher_name = $_GET['newpublishername'];
    $new_location = $_GET['newlocation'];
    $new_employees = $_GET['newemployees'];

    //Build SQL Query
    //Update Fields entered on the Form
    //Include commas to separate the fields
    //Initialize Query Counter
    $count = 0;
    $query = "UPDATE PUBLISHER SET ";
    if ($new_publisher_name != "") {
        $query .= "PublisherName='$new_publisher_name'";
        $count++;
    }
    if ($new_location != "") {
        if($count > 0) $query .= ", ";
        $query .= "Location='$new_location'";
        $count++;
    }
    if ($new_employees != "") {
        if ($count > 0) $query .= ", ";
        $query .= "Employees=$new_employees;";
    }
    $query .= " WHERE PublisherName= '$publisher_name'";
    echo "<p>Debug SQL Query:  " . $query . "</p>";

    //Execute Query
    $result = mysql_query($query);
    if(!$result)
        die("Unable to execute query " . mysql_error());
    //Close DB Server
    mysql_close($db_server);
}
?>
<form action="updatepublisher.php" method="get">
    <p>Enter Publisher Name to Select Publisher:</p>
    <p><input type="text" name="publishername"></p>
    <p>Enter one or more fields to update table</p>
    <p>New Publisher Name: <input type="text" name="newpublishername"></p>
    <p>New Location: <input type="text" name="newlocation"></p>
    <p>New Employee Count: <input type="text" name="newemployees"></p>
    <p><input type="submit" value="Update Publisher Information"></p>
</form>

<p><a href="publisherlist.php">List Current Publishers</a></p>
<p><a href="updatepublisher.php">Refresh Table on Current Page</a></p>
<p><a href="../index.html">Back to Home</a></p>
</main>
</body>
</html>
