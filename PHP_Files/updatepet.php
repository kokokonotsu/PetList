<html>
<head>
    <title>Update Pet Information</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<body>
<main class="main-container">
<?php
    echo "<h1>Update Pet Information Form</h1>";
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
<?php
if(isset($_GET['petname'])){
    $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
    if(!$db_server)
        die("Unable to connect to MySQL: " . mysql_error());
    if(!mysql_select_db('ethan_VET'))
        die("Unable to select database: " . mysql_error());
    $pet_name = $_GET['petname'];
    $new_name = $_GET['newname'];
    $new_type = $_GET['newtype'];
    $new_breed = $_GET['newbreed'];
    $new_dob = $_GET['newdob'];
    $new_owner = $_GET['newowner'];

    //Build SQL Query
    //Update Fields entered on the Form
    //Include commas to separate the fields
    //Initialize Query Counter
    $count = 0;
    //Instantiate Query variable
    $query = "UPDATE PET SET ";
    if($new_name != ""){
        $query .= "PetName='$new_name'";
        $count++;
    }
    if($new_type != ""){
        if($count > 0) $query .= ", ";
        $query .= "PetType='$new_type'";
        $count++;
    }
    if($new_breed != ""){
        if($count > 0) $query .= ", ";
        $query .= "PetBreed='$new_breed'";
        $count++;
    }
    if($new_dob != ""){
        if($count > 0) $query .= ", ";
        $query .= "PetDOB='$new_dob'";
        $count++;
    }
    if($new_owner != ""){
        if($count > 0) $query .= ", ";
        $query .= "OwnerID=$new_owner";
    }
    $query .= " WHERE PetName= '$pet_name'";
    echo "<p>Debug SQL Query:  " . $query . "</p>";

    //Execute Query
    $result = mysql_query($query);
    if(!$result)
        die("Unable to execute query " . mysql_error());
    //Close DB Server
    mysql_close($db_server);
}
?>
<form action="updatepet.php" method="get">
    <p>Enter Pet Name to Select the Pet:</p>
    <input type="text" name="petname">
    <p>New Name: <input type="text" name="newname"></p>
    <p>New Type: <input type="text" name="newtype"></p>
    <p>New Breed: <input type="text" name="newbreed"></p>
    <p>New DOB: <input type="text" name="newdob"></p>
    <p>New Owner: <input type="text" name="newowner"></p>
    <p><input type="submit" value="Update Pet"></p>
</form>

<p><a href="petlist.php">List Current Pets</a></p>
<p><a href="updatepet.php">Refresh Table on Current Page</a></p>
<p><a href="../index.html">Back to Home</a></p>
</main>
</body>
</html>