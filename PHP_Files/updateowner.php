<html>
<head>
    <title>Update Pet</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<body>
<main class="main-container">
<h1>Update Pet Form</h1>
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
<?php
if(isset($_GET['ownerid'])){
    $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
    if(!$db_server)
        die("Unable to connect to MySQL: " . mysql_error());
    if(!mysql_select_db('ethan_VET'))
        die("Unable to select database: " . mysql_error());
    $owner_id = $_GET['ownerid'];
    $new_first_name = $_GET['newfirstname'];
    $new_last_name = $_GET['newlastname'];
    $new_phone = $_GET['newphone'];
    $new_email = $_GET['newemail'];

    //Build SQL Query
    //Update Fields entered on the Form
    //Include commas to separate the fields
    //Initialize Query Counter
    $count = 0;
    //Instantiate Query variable
    $query = "UPDATE PET_OWNER SET ";
    if($new_last_name != ""){
        $query .= "OwnerLastName='$new_last_name'";
        $count++;
    }
    if($new_first_name != ""){
        if($count > 0) $query .= ", ";
        $query .= "OwnerFirstName='$new_first_name;";
        $count++;
    }
    if($new_phone != ""){
        if($count > 0) $query .= ", ";
        $query .= "OwnerPhone='$new_phone'";
        $count++;
    }
    if($new_email != ""){
        if($count > 0) $query .= ", ";
        $query .= "OwnerEmail='$new_email'";
    }
    $query .= " WHERE OwnerID= '$owner_id'";
    echo "<p>Debug SQL Query:  " . $query . "</p>";

    //Execute Query
    $result = mysql_query($query);
    if(!$result)
        die("Unable to execute query " . mysql_error());
    //Close DB Server
    mysql_close($db_server);
}
?>
<form action="updateowner.php" method="get">
    <p>Enter Owner ID to Select the Owner:</p>
    <input type="text" name="ownerid">
    <p>Enter one or more fields to update database:</p>
    <p>New First Name: <input type="text" name="newfirstname"></p>
    <p>New Last Name: <input type="text" name="newlastname"></p>
    <p>New Phone: <input type="text" name="newphone"></p>
    <p>New Email: <input type="text" name="newemail"></p>
    <p><input type="submit" value="Update Owner Information"></p>
</form>

<p><a href="petowner.php">List Current Owners</a></p>
<p><a href="updateowner.php">Update Owner (Blank Form)</a></p>
<p><a href="../index.html">Back to Home</a></p>
</main>
</body>
</html>