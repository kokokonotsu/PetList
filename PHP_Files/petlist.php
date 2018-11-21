<html>
<head>
    <title>Page Title</title>
</head>
<body>
<p>This is an HTML Paragraph</p>
<?php
    echo "<p>This is a PHP script.</p>";
?>

<?php
    $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
    if(!$db_server)
        die("Unable to connect to MySQL: " . mysql_error());

    if(!mysql_select_db('ethan_VET'))
        die("Unable to select a database: " . mysql_error());

    $query = "SELECT PetName, PetType, PetBreed, OwnerFirstName, OwnerLastName
    FROM PET, PET_OWNER
    WHERE PET.OwnerID = PET_OWNER.OwnerID";

    $result = mysql_query($query);
    if(!$result)
        die("Unable to execute query: " . mysql_error());

    echo "<table border=\"1\">";
    echo "<tr><th>Pet</th><th>Type</th><th>Breed</th><th>First</th><th>Last</th></tr>\n";

    $rows = mysql_num_rows($result);
    for($r = 0; $r < $rows; $r++){
        echo "<tr>";
        for($c = 0; $c < 5; $c++){
            echo "<td>" . mysql_result($result, $r, $c) . "</td>";
        }
        echo "</tr>\n";
    }
    echo "</table>\n";

    mysql_close($db_server);
?>

<p><a href="insertpet.php">Insert New Pet</a></p>
<p><a href="updatepet.php">Update Pet Information</a></p>
<p><a href="deletepet.php">Remove Pet From Database</a></p>
<p><a href="../index.html">Back to Home</a></p>
</body>
</html>