<html>
<head>
    <title>Delete Pet</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<body>
<main class="main-container">
<?php
    if(isset($_GET['petname'])){
        $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
        if(!$db_server)
            die("Unable to connect to MySQL: " . mysql_error());
        if(!mysql_select_db("ethan_VET"))
            die("Unable to select database: " . mysql_error());
        $pet_name = $_GET['petname'];
        
        $query = "DELETE FROM PET WHERE PetName = '$pet_name'";

        $result = mysql_query($query);
        if(!$result)
            die("Unable to execute query: " . mysql_error());
        
            mysql_close($db_server);
    }
?>

<form action="deletepet.php">
    <p><input type="text" name="petname"></p>
    <p><input type="submit" value="Delete Pet"></p>
</form>
<p><a href="petlist.php">List Current Pets</a></p>
<p><a href="deletepet.php">Delete Pet (Blank Form)</a></p>
<p><a href="../index.html">Back to Home</a></p>
</main>
</body>
</html>