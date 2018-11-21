<html>
<head>
    <title>Delete Owner</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<body>
<main class="main-container">
<?php
    if(isset($_GET['ownerid'])){
        $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
        if(!$db_server)
            die("Unable to connect to MySQL: " . mysql_error());
        if(!mysql_select_db("ethan_VET"))
            die("Unable to select database: " . mysql_error());
        $owner_id = $_GET['ownerid'];
        
        $query = "DELETE FROM PET_OWNER WHERE OwnerID = $owner_id";

        $result = mysql_query($query);
        if(!$result)
            die("Unable to execute query: " . mysql_error());
        
            mysql_close($db_server);
    }
?>

<form action="deleteowner.php">
    <p><input type="text" name="ownerid"></p>
    <p><input type="submit" value="Remove Owner From Database"></p>
</form>
<p><a href="petowner.php">List Current Owners</a></p>
<p><a href="deleteowner.php">Delete Owner (Blank Form)</a></p>
<p><a href="../index.html">Back to Home</a></p>
</main>
</body>
</html>