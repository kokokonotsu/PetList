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
    $db_server = mysql_connect('localhost', 'userid', 'password');
    if(!$db_server)
        die("Unable to connect to MySQL: " . mysql_error());

    if(!mysql_select_db('user_VET'))
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
</body>
</html>