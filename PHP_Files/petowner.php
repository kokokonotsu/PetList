<html>
<head>
    <title>Pet Owners List</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<body>
<main class="main-container">
<?php
    $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
    if(!$db_server)
        die("Unable to connect to MySQL: " . mysql_error());
    if(!mysql_select_db('ethan_VET'))
        die('Unable to select database: ' . mysql_error());
    $query = "SELECT * FROM PET_OWNER";

    $result = mysql_query($query);
    if(!result)
        die("Unable to execute query: " . mysql_error());
    
    echo "<table border=\"1\">";
    echo "<tr><th>OwnerID</th><th>OwnerLastName</th><th>OwnerFirstName</th><th>OwnerPhone</th><th>OwnerEmail</th></tr>\n";

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
<p><a href="insertowner.php">Insert New Owner</a></p>
<p><a href="updateowner.php">Update Owner Information</a></p>
<p><a href="deleteowner.php">Remove Owner From Database</a></p>
<p><a href="../index.html">Back to Home</a></p>
</main>
</body>
</html>