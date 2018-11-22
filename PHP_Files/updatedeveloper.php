<html>
<head>
    <title>Update Developer Form</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<body>
<main class="main-container">
<?php
    echo "<h1>Update Developer Information Form</h1>";
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
?>
<?php
if (isset($_GET['developername']))
{
    //Connect to Server
    $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
    if(!$db_server)
        die("Unable to connect to MySQL: " . mysql_error());

    if(!mysql_select_db('ethan_RYO'))
        die("Unable to select database: " . mysql_error());

    $developer_name = $_GET['developername'];
    $new_developer_name = $_GET['newdevelopername'];
    $new_location = $_GET['newlocation'];
    $new_employees = $_GET['newemployees'];
    $new_publisher = $_GET['newpublisher'];

    //Build SQL Query
    //Update Fields entered on the Form
    //Include commas to separate the fields
    //Initialize Query Counter
    $count = 0;
    $query = "UPDATE DEVELOPER SET ";
    if ($new_developer_name != "") {
        $query .= "DeveloperName='$new_developer_name'";
        $count++;
    }
    if ($new_location != "") {
        if($count > 0) $query .= ", ";
        $query .= "Location='$new_location'";
        $count++;
    }
    if ($new_employees != "") {
        if ($count > 0) $query .= ", ";
        $query .= "Employees=$new_employees";
        $count++;
    }
    if($new_publisher != ""){
        if($count > 0) $query .= ", ";
        $query .= "PublisherName='$new_publisher'";
    }
    $query .= " WHERE DeveloperName= '$developer_name'";
    echo "<p>Debug SQL Query:  " . $query . "</p>";

    //Execute Query
    $result = mysql_query($query);
    if(!$result)
        die("Unable to execute query " . mysql_error());
    //Close DB Server
    mysql_close($db_server);
}
?>
<form action="updatedeveloper.php" method="get">
    <p>Enter Developer Name to Select Developer:</p>
    <p><input type="text" name="developername"></p>
    <p>Enter one or more fields to update table</p>
    <p>New Developer Name: <input type="text" name="newdevelopername"></p>
    <p>New Location: <input type="text" name="newlocation"></p>
    <p>New Employee Count: <input type="text" name="newemployees"></p>
    <p>New Publisher Name: <input type="text" name="newpublisher"></p>
    <p><input type="submit" value="Update Publisher Information"></p>
</form>

<p><a href="developerlist.php">List Current Developers</a></p>
<p><a href="updatedeveloper.php">Refresh Table on Current Page</a></p>
<p><a href="../index.html">Back to Home</a></p>
</main>
</body>
</html>
